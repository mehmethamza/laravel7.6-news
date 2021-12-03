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

function activeUserAccount($id,$payment_code)
    {
       $user = Kullanici::find($id);
       $user -> payment = "active";
       $user -> payment_code = $payment_code;
       $user -> save();

    Auth::guard("user")-> login($user);
      return redirect() -> route("kullanici.index") ;


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
        $request->setPrice("50");
        $request->setPaidPrice("50");
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
        $firstBasketItem->setId($user -> id);
        $firstBasketItem->setName("MemberShip");
        $firstBasketItem->setCategory1("Member");
        // $firstBasketItem->setCategory2("Accessories");
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("50");
        $basketItems[0] = $firstBasketItem;



        $request->setBasketItems($basketItems);

        $checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, $options)->getCheckoutFormContent();


        return view('user.payment',compact('checkoutFormInitialize'));
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

        # print result
        // return $checkoutForm -> getPaymentId(); buda iyziconun oluşturduğu ödeme id si
        // return $checkoutForm -> getBasketId();  B67832 şeklinde döndü dewfault templatede
        return activeUserAccount(decrypt($user_id) ,$checkoutForm -> getPaymentId());
    }
}
