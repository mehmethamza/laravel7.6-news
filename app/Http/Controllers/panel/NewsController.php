<?php

namespace App\Http\Controllers\panel;

use App\Mail\Bilgilendir;
use App\Models\Caco;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Contents;
use App\Models\panel\News;
use App\Models\Subscribers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $items = Contents::all();
        return view('panel.news.list', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories = Category::get();
        return view('panel.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $item = new Contents;
        $caco = new Caco;
        $caco ->category_id = $request->category_id;
        $item->title = $request->title;
        $item->slug =  Str::slug($request->title);

        $image = request()-> file("image");
        $image_name = $image-> hashName();
        if ($image -> isValid() ) {
            $move_name = "/uploads/news/".$image_name;
            $image -> move("uploads/news",$image_name);
        }
        $item->image =  $move_name ;

        $item->content = $request->content;
        $item -> payment_type -> $request -> payment_type;



        $save = $item->save();
        $caco -> contents_id = $item -> id;
        $caco -> save();
        $sub = Subscribers::where("durum","aktif")->get();
        foreach ($sub as $su) {
            # code...

        Mail::to($su-> mail) ->send(new Bilgilendir($item));
        }
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
        $item = Contents::find($id);
        $categories = Category::get();
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
        $item = Contents::find($id);

        Caco::where("contents_id",$id)-> delete();
        $caco = new Caco;

        $item->title = $request->title;
        $item->slug =  Str::slug($request->title);

        $item->content = $request->content;
        $item -> payment_type  = $request -> payment_type;

        if ( !empty(request() -> file("image"))) {
            try {
                unlink(trim($item -> image,"/"));
            } catch (\Throwable $th) {

            }
            $image = request()-> file("image");
            $image_name = $image-> hashName();
            if ($image -> isValid() ) {
                $move_name = "/uploads/news/".$image_name;
                $image -> move("uploads/news",$image_name);
            }
            $item->image =  $move_name ;

        }
        else
        {

        }
        $save = $item->save();

        $caco -> contents_id = $item -> id;
        $caco -> category_id = $request -> category_id;
        $caco -> save();
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
        echo $id;
        $item = Contents::find($id);
        $image = $item -> image;

        try {
            unlink(trim($image,"/"));
        } catch (\Throwable $th) {

        }

        Contents::destroy($id);
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
