<?php

use App\Http\Controllers\AnasayfaController;
use App\Models\Category;
use App\Models\Contents;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AnasayfaController::class ,"anasayfa"]);

Route::get('/deneme', function () {
   $categories =  Category::where("pid",0) ->with("child") ->get();

    return view("deneme",compact("categories"));
});

Route::get('/deneme2', function () {

    $categories = Category::inRandomOrder() ->get();


    foreach ($categories  as  $category) {
        echo count($category -> contents);
        if (count($category -> contents) >= 2) {
            echo "<br>";
            echo "büyük";
            break;
        }
        echo "<br>";
    }



 });

Route::get("/content",function(){
    $categories =  Category::where("pid",0) ->with("child") ->get();
return view("content",compact("categories"));
});
