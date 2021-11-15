<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $items = News::all();
        return view('panel.news.list', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories = Category::where('status', '1')->get();
        return view('panel.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $item = new News;
        $item->category_id = $request->category_id;
        $item->title = $request->title;
        $item->slug =  Str::slug($request->title);
        $item->post_summery = $request->post_summery;
        $item->desc = $request->desc;
        $item->video = $request->video;
        $item->rank = $request->rank;
        $item->status = $request->status ? 1 : 0;
        $save = $item->save();
        if( $save ){
            return redirect()->route('news.index')->with('success', 'Kayıt Eklendi');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $item = News::find($id);
        $categories = Category::where('status', '1')->get();
        return view('panel.news.update', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $item = News::find($id);
        $item->category_id = $request->category_id;
        $item->title = $request->title;
        $item->slug =  Str::slug($request->title);
        $item->post_summery = $request->post_summery;
        $item->desc = $request->desc;
        $item->video = $request->video;
        $item->rank = $request->rank;
        $item->status = $request->status ? 1 : 0;
        $save = $item->save();
        if( $save ){
            return redirect()->route('news.index')->with('success', 'Kayıt GÜncellendi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        News::destroy($id);
        return redirect()->route('news.index');
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
        News::where('id', $id)->update(['status' => $data]);
    }
}
