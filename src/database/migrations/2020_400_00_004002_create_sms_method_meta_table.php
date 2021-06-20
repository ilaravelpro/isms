<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 1/24/21, 9:08 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsMethodMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_method_meta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('method_id')->nullable()->unsigned();
            $table->string('type')->nullable();
            $table->string('key')->index();
            $table->longText('value')->nullable();
            $table->timestamps();
        });
        Schema::table('sms_method_meta', function($table) {
            $table->foreign('method_id')->references('id')->on('sms_methods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms_method_meta');
    }
}
