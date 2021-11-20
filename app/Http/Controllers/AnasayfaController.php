<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contents;
use App\Models\Setting;
use Illuminate\Http\Request;

class AnasayfaController extends Controller
{
    public function select($categories , $sayi){
        foreach ($categories  as  $category) {

            if (count($category -> contents) >= $sayi) {

                return $category;
            }

        }
    }
    public function anasayfa(){

        $categories = Category::where("pid",0)->with("child") -> get();
        $block_wrapper_1 = Contents::all() -> random(4) ;
        $block_wrapper_2_1 = Contents::all() -> random(4) ;
        $block_wrapper_2_2 = $this -> select(Category::inRandomOrder() ->get(),2) ;
        $block_wrapper_2_3 = Contents::all() -> random(4) ;

        $block_wrapper_3 = Contents::orderBy('created_at', 'DESC') -> take(4) -> get() ;

        $setting = Setting::first();
        $block_wrapper_2_right = Contents::all() -> random(3);

        return view("welcome",compact("categories","block_wrapper_1","block_wrapper_2_1","block_wrapper_2_2","block_wrapper_2_3","block_wrapper_3","setting","block_wrapper_2_right","block_wrapper_2_right"));
    }
}
