<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('video_id')->unsigned()->nullable();
            $table->integer('parent_id')->unsigned()->nullable();;
            $table->string('comment_date')->nullable();
            $table->text('comment_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('comments', function($table) {
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
        Schema::dropIfExists('comments');
    }
}
