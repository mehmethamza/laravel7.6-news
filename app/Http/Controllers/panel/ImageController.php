<?php

namespace App\Http\Controllers\panel;


use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic::class;

class ImageController extends Controller
{
    public function index(){
        return view('panel.image.list');
    }

    public function show ($name, $size, $category, $cat_id){
        $items = Image::where([ 'category' => $category, 'cat_id' => $cat_id ])->orderBy('rank', 'asc')->get();
        return view('panel.image.list', compact('items', 'name', 'size', 'category', 'cat_id'));
    }

    public function store(Request $request){
        for ($i = 1; $i < 100; $i++) {
            if( ! Storage::exists('public/'.$request->name.'.'.$request->file->extension()) ){
                $fileName = $request->name.'.'.$request->file->extension();
                break;
            } else if ( ! Storage::exists('public/'.$request->name.'-'.$i.'.'.$request->file->extension())) {
                $fileName = $request->name.'-'.$i.'.'.$request->file->extension();
                break;
			}
        }

        $isCover = Image::where('category', $request->category)->where('cat_id', $request->cat_id)->where('cover', 1)->first();
        $cover = $isCover ? 0 : 1;

        $size = explode('x', $request->size);

        $item = new Image();
        $item->url = $fileName;
        $item->category = $request->category;
        $item->cat_id = $request->cat_id;
        $item->rank = 0;
        $item->status = '1';
        $item->cover = $cover;
        $save = $item->save();
        if( $save ){
            $path = Storage::putFileAs('public', $request->file('file'), $fileName);
            $img = ImageManagerStatic::make(Storage::get('public/'.$fileName));
            $img->fit($size['0'], $size['1']);
            $img->save('../storage/app/public/'.$fileName, 100);
        }
        return $path;
    }

    public function status($id, Request $request){
        $data = $request->data === 'true' ? 1 : 0;
        Image::where('id', $id)->update(['status' => $data]);
    }

    public function cover($id, $category, $cat_id, Request $request){
        $data = $request->data === 'true' ? 1 : 0;
        Image::where('category', $category)->where('cat_id', $cat_id)->update(['cover' => 0]);
        Image::where('id', $id)->update(['cover' => $data]);
    }

    public function rank( Request $request ){
        $data = $request->data;
        parse_str($data, $order);
        $items = $order['ord'];
        foreach( $items as $rank => $id ){
            Image::where('id', $id)->where('rank', '<>', $rank )->update(['rank' => $rank]);
        }
    }

    public function destroy($id, $name){
        Image::destroy($id);
        Storage::delete('public/'.$name);
        return back();
    }
}
