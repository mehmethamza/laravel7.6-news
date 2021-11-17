<?php

use App\Http\Controllers\AnasayfaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\panel\CategoryController as PanelCategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\panel\LoginController;
use App\Http\Controllers\panel\NewsController;

use App\Http\Controllers\panel\ImageController;
use App\Models\Category;
use App\Models\Contents;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;


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

    $category = Category::find(11);
    return $category -> parent -> name;


 });




Route::get("/content/{slug}",[ContentController::class,"content"])->name("content");



Route::get("/category/{slug}",[CategoryController::class,"category"]) -> name("category");
Route::get("/search/{search}",[SearchController::class,"search"]) -> name("search");






Route::get("/olustur",function(){

    return Hash::make("12345678");
});
Route::group(["prefix" => "yonetim", "namespace" => "panel"] ,function () {

    Route::get('/', [LoginController::class, 'login'])->name('panel.login');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/login-auth', [LoginController::class, 'auth'])->name('login.auth');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::name('category.')->middleware('auth')->group(function () {
        Route::get('category', [PanelCategoryController::class, 'index'])->name('index');
        Route::get('category/create', [PanelCategoryController::class, 'create'])->name('create');
        Route::post('category/store', [PanelCategoryController::class, 'store'])->name('store');
        Route::get('category/edit/{id}', [PanelCategoryController::class, 'edit'])->name('edit');
        Route::post('category/update/{id}', [PanelCategoryController::class, 'update'])->name('update');
        Route::get('category/destroy/{id}', [PanelCategoryController::class, 'destroy'])->name('destroy');
        Route::post('category/status/{id}', [PanelCategoryController::class, 'status'])->name('status');
    });
    Route::name('news.')->middleware('auth')->group(function () {
        Route::get('news', [NewsController::class, 'index'])->name('index');
        Route::get('news/create', [NewsController::class, 'create'])->name('create');
        Route::post('news/store', [NewsController::class, 'store'])->name('store');
        Route::get('news/edit/{id}', [NewsController::class, 'edit'])->name('edit');
        Route::post('news/update/{id}', [NewsController::class, 'update'])->name('update');
        Route::get('news/destroy/{id}', [NewsController::class, 'destroy'])->name('destroy');
        Route::post('news/status/{id}', [NewsController::class, 'status'])->name('status');
    });
    Route::name('user.')->middleware('auth')->group(function () {
        Route::get('user', [UserController::class, 'index'])->name('index');
        Route::get('user/create', [UserController::class, 'create'])->name('create');
        Route::post('user/store', [UserController::class, 'store'])->name('store');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('user/update/{id}', [UserController::class, 'update'])->name('update');
        Route::get('user/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
        Route::post('user/status/{id}', [UserController::class, 'status'])->name('status');
    });
    Route::name('image.')->middleware('auth')->group(function () {
        Route::get('image', [ImageController::class, 'index'])->name('index');
        Route::get('image/show/{name}/{size}/{category}/{cat_id}', [ImageController::class, 'show'])->name('show');
        Route::post('image/store', [ImageController::class, 'store'])->name('store');
        Route::post('image/status/{id}', [ImageController::class, 'status'])->name('status');
        Route::post('image/cover/{id}/{category}/{cat_id}', [ImageController::class, 'cover'])->name('cover');
        Route::post('image/rank', [ImageController::class, 'rank'])->name('rank');
        Route::get('image/destroy/{id}/{name}', [ImageController::class, 'destroy'])->name('destroy');
    });
});
