<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\YorumOnay;
use App\Models\Contents;
use Illuminate\Support\Facades\Auth;

new ViewBaseController();

function setGenderImage($gender){

    switch ($gender) {
        case 'erkek':
            return "/images/avater/author2.png";
            break;

        case 'kadin':
            return "/images/avater/author.png";
            break;

        default:
            # code...
            break;
    }

}

function createVerificationCode(){
    return random_int(1,9999999999999999);
}

function sendCommentEmail($comment){
    Mail::to("{{$comment -> mail}}") ->send(new YorumOnay($comment));
}

function storeLoggedInUserComment($request){

    $comment = new Comment();
    $comment -> content_id = decrypt($request -> content_id);
    $user = Auth::guard("user") -> user();
    $comment -> name = $user -> name;
    $comment -> mail = $user -> email;
    $comment -> comment = $request -> comment;
    $comment -> pid = decrypt($request -> pid);
    $comment -> image = setGenderImage($user->gender);
    $comment -> durum = "aktif";
    $comment -> save();


}

function storeUnLoggedInUserComment($request){

    $comment = new Comment();
    $comment -> content_id = decrypt($request -> content_id);
    $comment -> name = $request -> name;
    $comment -> mail = $request -> mail;
    $comment -> web = $request -> web;
    $comment -> comment = $request -> comment;
    $comment -> pid = decrypt($request -> pid);
    $comment -> image = setGenderImage($request->cinsiyet);
    $comment -> onay_kodu = createVerificationCode();
    $comment -> durum = "pasif";
    $comment -> save();
    sendCommentEmail($comment);

}



class CommentController extends Controller
{

    public function store(Request $request){
        //return decrypt($request -> pid);



        if (Auth::guard("user") -> check()) {

            storeLoggedInUserComment($request);
        }
        else {

            storeUnLoggedInUserComment($request);
        }

        return  back();

    }




    public function edit($onay_kodu){
        $comment = Comment::where("onay_kodu",$onay_kodu) -> first();
        $comment -> durum = "aktif";
        $comment -> onay_kodu = "";
        $comment -> save();
        $content = Contents::where("id",$comment -> content_id) -> first();
        return redirect() -> route("content",$content -> slug);
    }
}
