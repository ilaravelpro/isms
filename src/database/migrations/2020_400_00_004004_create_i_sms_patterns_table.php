<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 12:38 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateISmsPatternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_sms_patterns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('creator_id')->nullable();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->string('type')->nullable()->default('custom');
            $table->string('gate')->nullable();
            $table->string('title')->nullable();
            $table->longText('value')->nullable();
            $table->longText('variables')->nullable();
            $table->boolean('change')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('i_sms_patterns');
    }
}
