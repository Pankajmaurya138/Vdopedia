<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('category_id');
            $table->string('category_name')->nullable();
            $table->string('category_slug_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('user_categories', function($table) {
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
        Schema::dropIfExists('user_categories');
    }
}
