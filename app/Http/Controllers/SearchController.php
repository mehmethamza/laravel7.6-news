<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contents;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
new ViewBaseController();

class SearchController extends Controller
{
    public function search()
    {
        $search = request("query");

        if (Auth::guard("user") -> check() )
        {
            $user = Auth::guard("user")-> user();
            // return  Contents::inRandomOrder()->where("payment_type",null)->where("payment_type","<=",$user -> payment_type)->  limit(4) -> get();
            $contents = Contents::where("title","like", '%'.$search.'%')->  orWhere("content","like", '%'.$search.'%') ->  get();
            $contents =  $contents -> where("payment_type","<=",$user -> payment_type);

        }
        else
        {
        $contents = Contents::where("payment_type",0) ->where("title","like", '%'.$search.'%')->orWhere("content","like", '%'.$search.'%') -> get();
        }




        return view("search",compact("contents","search"));
    }
}
