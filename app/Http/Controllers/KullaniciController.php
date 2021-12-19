<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Contents;
use App\Models\Fav;
use App\Models\Kullanici;
use App\Models\panel\Author;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

new ViewBaseController();

function getAuthUserComments(){
    return  Auth::guard("user")->user()-> comments;

}

function getIpAdressInformation($ip){
    $ip = "95.70.214.215";
    $access_key = "0b1cab6c57a6dd134dae856eb1ba784a";
    $ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $json = curl_exec($ch);
    curl_close($ch);
    $api_result = json_decode($json,false);
    return $api_result;

}

class KullaniciController extends Controller
{
    public function login(){


        if (Auth::guard("user") -> check()) {
            return redirect()-> route("kullanici.index");
        }


        return view("user.user_login");
    }

    public function logout(){
        Auth::guard("user") -> logout();


        return redirect()-> route("kullanici.login");
    }

    public function register(){

        return view("user.user_register");
    }

    public function add(Request $request){


        $ip_information = getIpAdressInformation("31.223.108.56");

        $kullanici = new Kullanici();
        $kullanici ->name = $request -> name;
        $kullanici ->surname = $request -> surname;
        $kullanici ->email = $request -> email;
        $kullanici ->gender = $request -> gender;
        $kullanici ->password = Hash::make($request -> password) ;
        $kullanici -> ip = "31.223.108.56";
        $kullanici -> country = $ip_information -> country_name;
        $kullanici -> continent = $ip_information -> continent_name;
        $kullanici -> region = $ip_information -> region_name;
        $kullanici -> zip = $ip_information -> zip;
        $kullanici -> payment = "passive";
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

        $user = Auth::guard("user") -> user();
        return view("user.panel",compact("user"));


    }

    public function fav(){


        $contents = Auth::guard("user") -> user() -> favContents;



        return view("user.fav",compact("contents"));

    }

    public function comment(){


         $comments = getAuthUserComments()->unique('content_id');
        // $comments = $comments  ->unique('content_id');
        return view("user.comment",compact("comments"));

    }

    public function edit(Request  $request){


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
        return redirect() -> route("kullanici.index");



    }

    public function addfav(Request $request)
    {
        $fav = new Fav();
        $fav -> kullanici_id = Auth::guard("user")->user()-> id;
        $fav -> contents_id = decrypt($request -> content_id);
        $save = $fav -> save();

        if( $save ){
            new ContentController();
            return  response()->json([
                'success' => true,
               ]) ;
            //  ->with([
            //     'status'=>200,
                // "fav" => $content.getFavItem($content.getContent($request->slug)),]
        }

    }

    public function subtractfav(Request $request){
        $fav = Fav::where("contents_id",decrypt($request -> content_id))-> where("kullanici_id",Auth::guard("user") -> user() -> id) -> first();
        $fav -> delete();
        return  response()->json([
            'success' => true,
           ]) ;
    }

}
