<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contents;
use App\Models\Setting;
use Illuminate\Http\Request;

new ViewBaseController();

function getContents($slug){

    return Category::where("slug",$slug) -> with("contents") -> first() ;
}

class CategoryController extends Controller
{
    public function category($slug){

        $contents = getContents($slug)  ;


        return view("category",compact("contents"));
    }
}
