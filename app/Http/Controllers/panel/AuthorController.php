<?php

namespace App\Http\Controllers\panel;


use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\panel\Author as PanelAuthor;
use Illuminate\Http\Request;

use Illuminate\Support\Str;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $authors = Author::all();
        return view('panel.author.list', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories = Category::where("pid",0) -> get();
        return view('panel.author.create',compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $item = new PanelAuthor();
        $item->name = $request->name;
        $item->facebook = $request->facebook;
        $item->twitter = $request->twitter;
        $item->linkedin = $request->linkedin;
        $item->google = $request->google;
        $item->statement = $request->statement;
        $item->cinsiyet = $request->cinsiyet;
        switch ($request -> cinsiyet) {
            case 'erkek':
                $item -> image = "/images/avater/author2.png";

                break;
            case 'kadin':
                $item -> image = "/images/avater/author.png";


                break;

            default:
                # code...
                break;
        }



        $save = $item->save();
        if( $save ){
            return redirect()->route('author.index')->with('success', 'Kayıt Eklendi');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $item = Author::find($id);
        return view('panel.author.update', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id){
        $item = Author::find($id);
        $item->name = $request->name;
        $item->facebook = $request->facebook;
        $item->twitter = $request->twitter;
        $item->linkedin = $request->linkedin;
        $item->google = $request->google;
        $item->statement = $request->statement;
        $item->cinsiyet = $request->cinsiyet;
        switch ($request -> cinsiyet) {
            case 'erkek':
                $item -> image = "/images/avater/author2.png";

                break;
            case 'kadin':
                $item -> image = "/images/avater/author.png";


                break;

            default:
                # code...
                break;
        }



        $save = $item->save();
        if( $save ){
            return redirect()->route('author.index')->with('success', 'Kayıt Güncellendi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Author::destroy($id);
        return redirect()->route('author.index')->with('success', 'Kayıt Silindi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function status($id, Request $request){
        $data = $request->data === 'true' ? 1 : 0;
        Category::where('id', $id)->update(['status' => $data]);
    }
}
