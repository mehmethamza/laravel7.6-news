<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contents;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\http\controllers\ViewBaseController;





new ViewBaseController();

class AnasayfaController extends Controller
{



    public function anasayfa(){



        return view("welcome");
    }
}
