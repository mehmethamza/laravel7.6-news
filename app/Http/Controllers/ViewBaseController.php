<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contents;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

function select($categories , $sayi){
    foreach ($categories  as  $category) {

        if (count($category -> contents) >= $sayi) {

            return $category;
        }

    }
}
function getCategories(){
    return Category::where("pid",0)->with("child") -> get();
}

function getBlockWrapper1(){
    if (Auth::guard("user") -> check() ) {
        $user = Auth::guard("user")-> user();
        return  Contents::inRandomOrder()->where("payment_type","<=",$user -> payment_type)->  limit(4) -> get();

    }
  return  Contents::inRandomOrder()->where("payment_type",0)-> limit(4) -> get();
}

function getBlockWrapper21(){
    if (Auth::guard("user") -> check() ) {
        $user = Auth::guard("user")-> user();
        return  Contents::inRandomOrder()->where("payment_type","<=",$user -> payment_type)->  limit(4) -> get();

    }
    return  Contents::inRandomOrder()->where("payment_type",0)-> limit(4) -> get();

}
function getBlockWrapper22(){
   return select(Category::inRandomOrder() ->get(),2);
}

function getBlockWrapper23(){
    if (Auth::guard("user") -> check() ) {
        $user = Auth::guard("user")-> user();
        return  Contents::inRandomOrder()->where("payment_type","<=",$user -> payment_type)->  limit(4) -> get();

    }
     return  Contents::inRandomOrder()->where("payment_type",0)-> limit(4) -> get();
}

function getBlockWrapper3(){
    if (Auth::guard("user") -> check() ) {
        $user = Auth::guard("user")-> user();
        return  Contents::orderBy('created_at', 'DESC')->where("payment_type","<=",$user -> payment_type)->  limit(4) -> get();

    }
  return  Contents::orderBy('created_at', 'DESC')->where("payment_type",0)-> limit(4) -> get();

 }

function getSetting(){
    return Setting::first();
}

function getBlockWrapper2Right(){
    if (Auth::guard("user") -> check() ) {
        $user = Auth::guard("user")-> user();
        return  Contents::inRandomOrder()->where("payment_type","<=",$user -> payment_type)->  limit(3) -> get();

    }
  return  Contents::inRandomOrder()->where("payment_type",0)-> limit(3) -> get();
}

class ViewBaseController extends Controller
{
    public function __construct()

    {
        view()->share([
            "block_wrapper_1" => getBlockWrapper1(),
            "block_wrapper_2_1" => getBlockWrapper21(),
            "categories" => getCategories(),
            "block_wrapper_2_2" => getBlockWrapper22(),
            "block_wrapper_2_3" => getBlockWrapper23(),
            "block_wrapper_2_right" => getBlockWrapper2Right(),
            "block_wrapper_3" => getBlockWrapper3(),
            "setting" => getSetting(),
            "color" =>  ["orange","pink","purple","green"],




        ]);

    }
}
