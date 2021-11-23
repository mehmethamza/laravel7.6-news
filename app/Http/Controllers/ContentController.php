<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Contents;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function content($slug){

        $categories =  Category::where("pid",0) ->with("child") ->get();

        $content = Contents::where("slug",$slug) ->firstOrFail();
        $setting = Setting::first();
        $block_wrapper_2_right = Contents::all() -> random(3);
        $content_sliders = Contents::all() -> random(7);
        $comments = Comment::where("content_id" ,$content -> id) -> where("durum","aktif")  -> where("pid",0) -> with("child")  -> get() ;
        $color = ["orange","pink","purple","green"];


        return view("content",compact("categories","content","setting","block_wrapper_2_right","content_sliders","comments","color"));
    }
}
