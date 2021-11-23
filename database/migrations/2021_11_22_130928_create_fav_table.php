<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fav', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger("kullanici_id");
            $table -> unsignedBigInteger("contents_id");
            $table->foreign('kullanici_id')->references('id')->on('kullanici')->onDelete('cascade');
            $table->foreign('contents_id')->references('id')->on('contents')->onDelete('cascade');
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
        Schema::dropIfExists('fav');
    }
}
