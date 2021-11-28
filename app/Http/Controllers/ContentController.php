<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Contents;
use App\Models\Fav;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\http\Controllers\AnasayfaController;
use Illuminate\Contracts\Auth\Guard;

new ViewBaseController();

function getContent($slug){
    return  Contents::where("slug",$slug) ->firstOrFail();
}

function getContentSliders(){
    return Contents::all() -> random(7);
}

function getComments($content){
  return  Comment::where("content_id" ,$content -> id) -> where("durum","aktif")  -> where("pid",0) -> with("child")  -> get();
}

function getFavItem($content){
    Fav::where("kullanici_id",Auth::guard("user")->user()->id) -> where("contents_id",$content->id) -> first();
}

function getCheckedCompact(){
    return [
        "content","content_sliders","comments","fav",
    ];
}

function getUnCheckedCompact(){
    return [
        "content","content_sliders","comments"
    ];
}

class ContentController extends Controller
{
    public function content($slug){


        $content =getContent($slug);
        $content_sliders =getContentSliders();
        $comments = getComments($content);



        if (Auth::guard("user")->check()) {
            $fav = getFavItem($content);


            return view("content",compact(getCheckedCompact()));

        }
        return view("content",compact(getUnCheckedCompact()));
    }
}
