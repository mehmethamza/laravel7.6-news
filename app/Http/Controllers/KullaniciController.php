<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Contents;
use App\Models\Kullanici;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KullaniciController extends Controller
{
    public function login(){
        if (Auth::guard("user") -> check()) {
            return redirect()-> route("kullanici.index");
        }
        $categories = Category::where("pid",0)->with("child") -> get();
        $setting = Setting::first();
        $color = ["orange","pink","purple","green"];
        return view("user.user_login",compact("categories","setting","color"));
    }

    public function logout(){
        Auth::guard("user") -> logout();


        return redirect()-> route("kullanici.login");
    }

    public function register(){
        $categories = Category::where("pid",0)->with("child") -> get();
        $setting = Setting::first();
        $color = ["orange","pink","purple","green"];
        return view("user.user_register",compact("categories","setting","color"));
    }

    public function add(Request $request){
        $kullanici = new Kullanici();
        $kullanici ->name = $request -> name;
        $kullanici ->surname = $request -> surname;
        $kullanici ->email = $request -> email;
        $kullanici ->password = Hash::make($request -> password) ;
        $kullanici -> save();

        return redirect() -> route("kullanici.login");
    }

    public  function sign(Request $request){
        $credentials = [
            'email'       => $request -> email,
            'password'    => $request -> password,

        ];

        if (Auth::guard('user')->attempt($credentials)) {
            return redirect() -> route("kullanici.index");
        } else {
            return redirect() -> route("kullanici.login");
        }
    }

    public function index(){
        if (Auth::guard("user") -> check()) {
            $user = Auth::guard("user") -> user();
            $categories = Category::where("pid",0)->with("child") -> get();
            $setting = Setting::first();
            $color = ["orange","pink","purple","green"];
           return view("user.panel",compact("categories","setting","color","user"));
        }

    }

    public function fav(){
        if (Auth::guard("user") -> check()) {
            $search = "aasd";
            $contents = Auth::guard("user") -> user() -> content;
            $categories = Category::where("pid",0)->get();

            $color = ["orange","pink","purple","green"];
            $setting = Setting::first();
            $block_wrapper_2_right = Contents::all() -> random(3);



            return view("user.fav",compact("categories","contents","color","search","setting","block_wrapper_2_right"));
        }
    }

    public function comment(){
        return Comment::where("mail",Auth::guard("user")->user()->email) -> get();
        if (Auth::guard("user") -> check()) {

            $search = "aasd";
            $contents = Auth::guard("user") -> user() -> content;
            $categories = Category::where("pid",0)->get();

            $color = ["orange","pink","purple","green"];
            $setting = Setting::first();
            $block_wrapper_2_right = Contents::all() -> random(3);



            return view("user.fav",compact("categories","contents","color","search","setting","block_wrapper_2_right"));
        }
    }

    public function edit(Request  $request){
        if (Auth::guard("user") -> check()) {

            $kullanici = Kullanici::find( Auth::guard("user")->user() -> id);
            $kullanici ->name = $request -> name;
            $kullanici ->surname = $request -> surname;
            $kullanici ->email = $request -> email;

            if (!empty($request->lastpassword)) {
                if (Hash::check($request -> lastpassword, Auth::guard("user")-> user() ->password, [])) {
                    if (!empty($request->password)) {
                    $kullanici -> password = Hash::make($request -> password) ;
                    }
                }
            }
            $kullanici -> save();
            return redirect() -> route("kullanici.panel");

        }

    }

}
