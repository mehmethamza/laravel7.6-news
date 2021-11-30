<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKullaniciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kullanici', function (Blueprint $table) {
            $table->id();
            $table -> string("email")->nullable();
            $table -> string("password")->nullable();
            $table -> string("name")->nullable();
            $table -> string("surname")->nullable();
            $table -> string("gender") -> nullable();
            $table -> string("ip") -> nullable();
            $table -> string("country") -> nullable();
            $table -> string("continent") -> nullable();
            $table -> string("region") -> nullable();
            $table -> string("zip") -> nullable();
            $table -> string("payment") -> nullable();
            $table -> string("payment_code") -> nullable();
            $table->rememberToken() -> nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kullanici');
    }
}
