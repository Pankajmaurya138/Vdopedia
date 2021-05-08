<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('video_id')->unsigned();
            $table->enum('favorate',['no','yes']);
            $table->timestamps();
            $table->softDeletes();
        });
         Schema::table('favorates', function($table) {
           $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
           $table->foreign('video_id')->references('id')->on('videos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorates');
    }
}
