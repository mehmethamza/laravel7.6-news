<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect()->route('news.index');
        }else{
            return view('panel.login');
        }
    }
    public function auth(Request $request){
        $request->flash();
        
        $messages = [
            'required' => ':attribute alanı boş geçilemez.',
            'email' => 'E-posta adresinizi doğru giriniz..',
        ];
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('panel.login')->withErrors($validator)->withInput();
        }
        

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('news.index');
        }else{
            return redirect()->route('panel.login')->with('error', 'Sistemde Kayıtlı Bilgi Bulunamadı');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('panel.login');
    }
}
