<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrivacyToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_image')->after('sex')->nullable();
            $table->string('background_image')->after('profile_image')->nullable();
            $table->enum('privacy',['no','yes'])->after('background_image')->nullable();
            $table->text('bio_description')->after('privacy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_image')->after('sex')->nullable();
            $table->string('background_image')->after('profile_image')->nullable();
            $table->enum('privacy',['no','yes'])->after('background_image')->nullable();
            $table->text('bio_description')->after('privacy')->nullable();

        });
    }
}
