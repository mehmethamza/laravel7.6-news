<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contents;
use App\Models\Setting;
use Illuminate\Http\Request;

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
  return  Contents::all() -> random(4);
}

function getBlockWrapper21(){
   return Contents::all() -> random(4) ;
}
function getBlockWrapper22(){
   return select(Category::inRandomOrder() ->get(),2);
}

function getBlockWrapper23(){
   return Contents::all() -> random(4);
}

function getBlockWrapper3(){
    return Contents::orderBy('created_at', 'DESC') -> take(4) -> get();
 }

function getSetting(){
    return Setting::first();
}

function getBlockWrapper2Right(){
    return  Contents::all() -> random(3);
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
