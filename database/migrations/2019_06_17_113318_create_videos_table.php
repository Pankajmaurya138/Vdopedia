<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->string('title');
            $table->integer('likes')->default('0')->nullable();
            $table->integer('dis_likes')->default('0')->nullable();
            $table->string('video_file');
            $table->string('image_file');
            $table->string('meta_description')->nullable();
            $table->string('upload_date')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('videos', function($table) {
           $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
