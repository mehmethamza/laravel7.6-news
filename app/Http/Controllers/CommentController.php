<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\YorumOnay;
use App\Models\Contents;

class CommentController extends Controller
{

    public function store(Request $request){
        //return decrypt($request -> pid);

        $comment = new Comment();
        $comment -> content_id = decrypt($request -> content_id);
        $comment -> name = $request -> name;
        $comment -> mail = $request -> mail;
        $comment -> web = $request -> web;
        $comment -> comment = $request -> comment;
        $comment -> pid = decrypt($request -> pid);

        switch ($request -> cinsiyet) {
            case 'erkek':
                $comment -> image = "/images/avater/author2.png";
                break;

            case 'kadin':
                $comment -> image = "/images/avater/author.png";
                break;

            default:
                # code...
                break;
        }

        $comment -> onay_kodu = mt_rand(1,9999999999999999);
        $comment -> durum = "pasif";
        $comment -> save();
        Mail::to("{{$comment -> mail}}") ->send(new YorumOnay($comment));

        return  back();

    }

    public function index() {}




    public function edit($onay_kodu){
        $comment = Comment::where("onay_kodu",$onay_kodu) -> first();
        $comment -> durum = "aktif";
        $comment -> onay_kodu = "";
        $comment -> save();
        $content = Contents::where("id",$comment -> content_id) -> first();
        return redirect() -> route("content",$content -> slug);
    }
}
