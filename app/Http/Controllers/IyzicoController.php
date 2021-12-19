<?php

namespace App\Http\Controllers;

use App\Models\Kullanici;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Iyzipay\Model\Address;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\CheckoutFormInitialize;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Options;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;

new ViewBaseController();

function activeUserAccount($id,$checkoutForm)
    {
        // $checkoutForm->getPaymentItems()[0] -> getItemId()
       $user = Kullanici::find($id);
       $user -> payment = "active";
       $user -> payment_code = $checkoutForm -> getPaymentId();
       $user -> payment_type =  $checkoutForm->getPaymentItems()[0] -> getItemId();
       $user -> save();


        Auth::guard("user")-> login($user);
      return view("user.payment_success") ;


    }



class IyzicoController extends Controller
{


    public function check(Request $request)
    {

        $options = new Options();
        $options->setApiKey('sandbox-7nSYCFxJW7Ws2DNHWEjDDlmVBdGsZwtQ');
        $options->setSecretKey('V0aZiQtBgzW5thy9RRRZ22xkQA1Bc4Ma');
        $options->setBaseUrl('https://sandbox-api.iyzipay.com');

        $user = Auth::guard("user")->user();

        $request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        if (request()-> type == "silver") {
            $request->setPrice("50");
            $request->setPaidPrice("50");
        }
        elseif (request() -> type == "gold") {
            $request->setPrice("100");
            $request->setPaidPrice("100");
        }

        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setBasketId($user -> id);
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setCallbackUrl("http://127.0.0.1:8000/payment/".encrypt($user->id));
        $request->setEnabledInstallments(array(2, 3, 6, 9));

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId($user -> id);
        $buyer->setName($user -> name);
        $buyer->setSurname($user -> surname);
        $buyer->setGsmNumber("+900000000000");
        $buyer->setEmail($user -> email);
        $buyer->setIdentityNumber("00000000000");
        $buyer->setLastLoginDate("".$user -> 	created_at ."");
        $buyer->setRegistrationDate("".Carbon::today()."");
        $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $buyer->setIp($user -> ip);
        $buyer->setCity($user -> region);
        $buyer->setCountry($user -> country);
        $buyer->setZipCode($user -> zip);

        $request->setBuyer($buyer);
        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName("Jane Doe");
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName("Jane Doe");
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);

        $basketItems = array();
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        if (request() -> type == "silver") {
            $firstBasketItem->setId(1);
            $firstBasketItem->setName("Silver");
            $firstBasketItem->setCategory1("Member");
            // $firstBasketItem->setCategory2("Accessories");
            $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            $firstBasketItem->setPrice("50");
        }
        elseif (request() -> type == "gold") {
            $firstBasketItem->setId(2);
            $firstBasketItem->setName("Gold");
            $firstBasketItem->setCategory1("Member");
            // $firstBasketItem->setCategory2("Accessories");
            $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            $firstBasketItem->setPrice("100");
        }

        $basketItems[0] = $firstBasketItem;



        $request->setBasketItems($basketItems);

        $checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, $options);
        print_r($checkoutFormInitialize->getCheckoutFormContent());
        // ->getCheckoutFormContent();


        // return view('user.payment',compact('checkoutFormInitialize'));
    }

    public function paymentSuccess(Request $request,$user_id)
    {
        $options = new Options();
        $options->setApiKey('sandbox-7nSYCFxJW7Ws2DNHWEjDDlmVBdGsZwtQ');
        $options->setSecretKey('V0aZiQtBgzW5thy9RRRZ22xkQA1Bc4Ma');
        $options->setBaseUrl('https://sandbox-api.iyzipay.com');
        # create request class
        $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setToken($_POST['token']);

        # make request
        $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request,$options);

        // print_r($checkoutForm->getPaymentItems()[0] -> getItemId());
        # print result
        // return $checkoutForm -> getPaymentId(); buda iyziconun oluşturduğu ödeme id si
        // return $checkoutForm -> getBasketId();  B67832 şeklinde döndü dewfault templatede
        return activeUserAccount(decrypt($user_id) ,$checkoutForm );
    }
}
