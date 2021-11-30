<?php

use App\Http\Controllers\AnasayfaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\IyzicoController;
use App\Http\Controllers\KullaniciController;
use App\Http\Controllers\panel\CategoryController as PanelCategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\panel\LoginController;
use App\Http\Controllers\panel\NewsController;
use App\Http\Controllers\panel\AuthorController;
use App\Http\Controllers\panel\Auth;

use App\Http\Controllers\panel\ImageController;
use App\Http\Controllers\panel\SettingController;
use App\Http\Controllers\panel\UserController;
use App\Http\Controllers\SubscriberController;
use App\Mail\AbonelikOnay;
use App\Mail\Bilgilendir;
use App\Models\Category;

use App\Models\Contents;
use App\Models\Setting;
use App\Models\Subscribers;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


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

Route::get('/', [AnasayfaController::class ,"anasayfa"]) -> name("anasayfa");

Route::get('/deneme', function () {
   $categories =  Category::where("pid",0) ->with("child") ->get();

    return view("deneme",compact("categories"));
});

Route::get('/deneme2', function () {

    $category = Category::find(11);
    return $category -> parent -> name;


});

Route::get('/deneme3', function () {

    $category = Contents::find(11);
    return $category -> author ;

});



Route::get("/content/{slug}",[ContentController::class,"content"])->name("content");



Route::get("/category/{slug}",[CategoryController::class,"category"]) -> name("category");
Route::get("/search/",[SearchController::class,"search"]) -> name("search");

Route::resource('comment', 'CommentController')->except(['show', 'destroy']);



Route::resource("subscriber","SubscriberController");
Route::post("/subscriber/bilgilendir",[SubscriberController::class,"bilgilendir"]);

 Route::name("kullanici.")-> group(function (){

        Route::get("/kullanici/login",[KullaniciController::class,"login"]) -> name("login");
        Route::get("/kullanici/register",[KullaniciController::class,"register"]) -> name("register");
        Route::post("/kullanici/add",[KullaniciController::class,"add"]) -> name("add");
        Route::post("/kullanici/sign",[KullaniciController::class,"sign"]) -> name("sign");

        Route::group(["prefix" => "/kullanici" , "middleware" => "user"],function (){

            Route::post("/edit",[KullaniciController::class,"edit"]) -> name("edit");


            Route::get('/panel', [KullaniciController::class, 'index'])->name('index');
            Route::get('/favoriler', [KullaniciController::class, 'fav'])->name('fav');
            Route::get('/comment', [KullaniciController::class, 'comment'])->name('comment');
            Route::get('/logout', [KullaniciController::class, 'logout'])->name('logout');

            Route::post('/add/favori', [KullaniciController::class, 'addfav'])->name('addfav');
            Route::post('/subtract/favori', [KullaniciController::class, 'subtractfav'])->name('subtractfav');

    });





 });



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
    Route::name('setting.')->middleware('auth')->group(function () {
        Route::get('setting', [SettingController::class, 'index'])->name('index');
        // Route::get('setting/create', [SettingController::class, 'create'])->name('create');
        // Route::post('setting/store', [SettingController::class, 'store'])->name('store');
        Route::get('setting/edit/{id}', [SettingController::class, 'edit'])->name('edit');
        Route::post('setting/update/', [SettingController::class, 'update'])->name('update');
        // Route::get('setting/destroy/{id}', [SettingController::class, 'destroy'])->name('destroy');
        // Route::post('setting/status/{id}', [SettingController::class, 'status'])->name('status');
    });
    Route::name('author.')->middleware('auth')->group(function () {
        Route::get('author', [AuthorController::class, 'index'])->name('index');
        Route::get('author/create', [AuthorController::class, 'create'])->name('create');
        Route::post('author/store', [AuthorController::class, 'store'])->name('store');
        Route::get('author/edit/{id}', [AuthorController::class, 'edit'])->name('edit');
        Route::post('author/update/{id}', [AuthorController::class, 'update'])->name('update');
        Route::get('author/destroy/{id}', [AuthorController::class, 'destroy'])->name('destroy');
        Route::post('author/status/{id}', [AuthorController::class, 'status'])->name('status');
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
        // Route::get('user/create', [UserController::class, 'create'])->name('create');
        // Route::post('user/store', [UserController::class, 'store'])->name('store');
        // Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('edit');
        // Route::post('user/update/{id}', [UserController::class, 'update'])->name('update');
        // Route::get('user/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
        // Route::post('user/status/{id}', [UserController::class, 'status'])->name('status');
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





Route::get("/test",function(){



        $search = "aasd";
        $contents = FacadesAuth::guard("user") -> user() -> content;
        $categories = Category::where("pid",0)->get();

        $color = ["orange","pink","purple","green"];
        $setting = Setting::first();
        $block_wrapper_2_right = Contents::all() -> random(3);



        return view("user.fav",compact("categories","contents","color","search","setting","block_wrapper_2_right"));
});

Route::get("/check",[IyzicoController::class,"check"]) -> name("check");


// // Route::post("/payment",[IyzicoController::class,"paymentSuccess"]) -> name("payment");
// // Route::post("/payment",[IyzicoController::class,"paymentSuccess"]) ;
Route::match(['get', 'post'] ,"/payment/{user_id}",[IyzicoController::class,"paymentSuccess"]) -> name("payment");

