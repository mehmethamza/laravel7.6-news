<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contents;
use App\Models\Setting;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category($slug){
        $categories = Category::where("pid",0)->get();
        $contents = Category::where("slug",$slug) -> with("contents") -> first()  ;
        $color = ["orange","pink","purple","green"];
        //return $contents;
        $setting = Setting::first();
        $block_wrapper_2_right = Contents::all() -> random(3);

        return view("category",compact("categories","contents","color","setting","block_wrapper_2_right","color"));
    }
}
