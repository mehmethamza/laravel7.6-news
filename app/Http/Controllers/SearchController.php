<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contents;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($search){

        $contents = Contents::where("title","like", '%'.$search.'%')-> orWhere("content","like", '%'.$search.'%') -> get();
        $categories = Category::where("pid",0)->get();

        $color = ["orange","pink","purple","green"];


        return view("search",compact("categories","contents","color","search"));
    }
}
