<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contents;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category($slug){
        $categories = Category::where("pid",0)->get();
        $contents = Category::where("slug",$slug) -> with("contents") -> first()  ;
        $color = ["orange","pink","purple","green"];
        //return $contents;
        return view("category",compact("categories","contents","color"));
    }
}
