<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('subscribe_status')->nullable();
            $table->integer('subscriber_id');
            $table->string('subscribe_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
         Schema::table('subscriptions', function($table) {
           $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
           //$table->foreign('video_id')->references('id')->on('videos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
