<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function add(Request $request){
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


        $comment -> save();

    }
}
