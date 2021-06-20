<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 12:38 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsPatternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_patterns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->unsignedBigInteger('gateway_id')->nullable();
            $table->string('title')->nullable();
            $table->longText('value')->nullable();
            $table->string('type')->nullable()->default('custom');
            $table->longText('variables')->nullable();
            $table->boolean('change')->default(1);
            $table->string('status')->default('active');
            $table->timestamps();
        });
        Schema::table('sms_patterns', function($table) {
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('gateway_id')->references('id')->on('sms_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms_patterns');
    }
}
