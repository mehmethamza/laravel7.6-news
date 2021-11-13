<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCacoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caco', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger("category_id");
            $table -> unsignedBigInteger("contents_id");
            $table-> foreign("category_id")->references("id")->on("category")->onDelete("cascade");
            $table-> foreign("contents_id")->references("id")->on("contents")->onDelete("cascade");
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
        Schema::dropIfExists('caco');
    }
}
