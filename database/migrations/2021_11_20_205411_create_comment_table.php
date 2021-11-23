<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table -> integer("pid");
            $table -> unsignedBigInteger("content_id");
            $table->foreign('content_id')->references('id')->on('contents');
            $table -> string("name") -> nullable();
            $table -> string("mail") -> nullable();
            $table -> string("web") -> nullable();
            $table -> text("comment") -> nullable();
            $table -> string("image") -> nullable();
            $table -> string("durum") -> nullable();
            $table -> text("onay_kodu") -> nullable();
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
        Schema::dropIfExists('comment');
    }
}
