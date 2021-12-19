<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    protected $table = "category";
    protected $guarded = [];

    public function child(){
        return $this-> hasMany("App\Models\Category","pid");
    }

    public function parent(){
        return $this-> belongsTo("App\Models\Category","pid");
    }

    public function contents(){
        if (Auth::guard("user") -> check() ) {
            $user = Auth::guard("user")-> user();
            // print_r($user -> payment_type) ;
            $contents =   $this -> belongsToMany("App\Models\Contents","caco");
            $contents = $contents->where("payment_type","<=",$user -> payment_type);
            return $contents;



        }
        return $this -> belongsToMany("App\Models\Contents","caco")->where("payment_type",0);

        // return $this -> belongsToMany("App\Models\Contents","caco") ;
    }
}
