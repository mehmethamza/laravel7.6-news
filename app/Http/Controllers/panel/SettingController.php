<?php

namespace App\Http\Controllers\panel;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\panel\Category as PanelCategory;
use App\Models\Setting;
use Illuminate\Support\Str;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $item = Setting::first();
        return view('panel.setting.update', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){

        $item = Setting::first();
        $item -> braking = $request -> braking;
        $item -> facebook = $request -> facebook;
        $item -> twitter = $request -> twitter;
        $item -> pinterest = $request -> pinterest;
        $item -> google = $request -> google;
        $save = $item->save();
        if( $save ){
            return redirect()->route('setting.index')->with('success', 'Kayıt Güncellendi');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */

}
