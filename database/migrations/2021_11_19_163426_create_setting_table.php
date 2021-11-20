<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table -> string("braking") -> nullable();
            $table -> string("logo") -> nullable();
            $table -> string("facebook") -> nullable();
            $table -> string("twitter") -> nullable();
            $table -> string("pinterest") -> nullable();
            $table -> string("google") -> nullable();
            $table -> string("ad1") -> nullable();
            $table -> string("ad2") -> nullable();
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
        Schema::dropIfExists('setting');
    }
}
