<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('video_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('slug_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('tags', function($table) {
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
        Schema::dropIfExists('tags');
    }
}
