<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/2/20, 11:13 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_terms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('status')->default('active');
            $table->timestamps();
        });
        Schema::table('sms_terms', function($table) {
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('parent_id')->references('id')->on('sms_terms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms_terms');
    }
}
