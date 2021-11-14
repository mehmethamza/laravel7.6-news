<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contents;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function content($slug){

        $categories =  Category::where("pid",0) ->with("child") ->get();

        $content = Contents::where("slug",$slug) ->firstOrFail();
        return view("content",compact("categories","content"));
    }
}
