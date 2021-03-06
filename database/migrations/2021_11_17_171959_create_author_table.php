<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author', function (Blueprint $table) {
            $table->id();
            $table -> string("name");
            $table -> string("twitter") -> nullable();
            $table -> string("facebook") -> nullable();
            $table -> string("google") -> nullable();
            $table -> string("linkedin") -> nullable();
            $table -> string("statement") -> nullable();
            $table -> string("cinsiyet") -> nullable();
            $table -> string("image") -> nullable();

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
        Schema::dropIfExists('author');
    }
}
