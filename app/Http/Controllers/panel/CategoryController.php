<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $items = Category::all();
        return view('panel.category.list', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('panel.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $item = new Category;
        $item->name = $request->name;
        $item->slug =  Str::slug($request->name);
        $item->rank = $request->rank;
        $item->status = $request->status ? 1 : 0;
        $save = $item->save();
        if( $save ){
            return redirect()->route('category.index')->with('success', 'Kayıt Eklendi');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $item = Category::find($id);
        return view('panel.category.update', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $item = Category::find($id);
        $item->name = $request->name;
        $item->slug =  Str::slug($request->name);
        $item->rank = $request->rank;
        $item->status = $request->status ? 1 : 0;
        $save = $item->save();
        if( $save ){
            return redirect()->route('category.index')->with('success', 'Kayıt Güncellendi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Category::destroy($id);
        return redirect()->route('category.index');
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
