<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contents;
use App\Models\Setting;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(){
        $search = request("query");
        $contents = Contents::where("title","like", '%'.$search.'%')-> orWhere("content","like", '%'.$search.'%') -> get();
        $categories = Category::where("pid",0)->get();

        $color = ["orange","pink","purple","green"];
        $setting = Setting::first();
        $block_wrapper_2_right = Contents::all() -> random(3);



        return view("search",compact("categories","contents","color","search","setting","block_wrapper_2_right"));
    }
}
