<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 1/24/21, 9:08 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_methods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('creator_id')->nullable()->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('provider')->nullable();
            $table->string('number')->nullable();
            $table->string('number_pattern')->nullable();
            $table->longText('token')->nullable();
            $table->text('description')->nullable();
            $table->integer('property')->nullable();
            $table->text('footer')->nullable();
            $table->boolean('default')->default(0)->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
        Schema::table('sms_methods', function($table) {
            $table->foreign('creator_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms_methods');
    }
}
