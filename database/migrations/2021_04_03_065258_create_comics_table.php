<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shelf_id')->unsigned();
            $table->string('title', 100);
            $table->date('release_date');
            $table->integer('purchase_status')->length(2)->default(1);
            $table->timestamps();

            $table->foreign('shelf_id')->references('id')->on('shelves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
}
