<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_titles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('video_id')->unsigned();
            $table->string('title_name')->nullable();
            $table->string('title_slug_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('meta_titles', function($table) {
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
        Schema::dropIfExists('meta_titles');
    }
}
