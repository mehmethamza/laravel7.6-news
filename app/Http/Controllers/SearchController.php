<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contents;
use App\Models\Setting;
use Illuminate\Http\Request;

new ViewBaseController();

class SearchController extends Controller
{
    public function search(){
        $search = request("query");
        $contents = Contents::where("title","like", '%'.$search.'%')-> orWhere("content","like", '%'.$search.'%') -> get();





        return view("search",compact("contents","search"));
    }
}
