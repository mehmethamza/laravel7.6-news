<?php

namespace App\Http\Controllers;

use App\Mail\AbonelikOnay;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function store(Request $request){
        $subscriber =  new Subscribers();
        $subscriber -> mail = $request -> mail;
        $subscriber -> onay_kodu = encrypt(mt_rand(1,999999));
        $subscriber -> iptal_kodu = encrypt(mt_rand(1,999999));
        $subscriber -> durum = "pasif";

        $subscriber -> save();
        Mail::to("{{$subscriber -> mail}}") ->send(new AbonelikOnay($subscriber));
        return back();


    }

    public function edit($onay_kodu){
        $subscriber = Subscribers::where("onay_kodu",$onay_kodu) -> first();
        $subscriber -> durum = "aktif";
        $subscriber -> onay_kodu = "";
        $subscriber -> save();

        return redirect() -> route("anasayfa");


    }

    public function bilgilendir(){

    }
}
