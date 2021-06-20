<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/2/20, 11:13 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsDraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_drafts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->unsignedBigInteger('term_id')->nullable();
            $table->longText('message')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
        Schema::table('sms_drafts', function($table) {
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('term_id')->references('id')->on('sms_terms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms_drafts');
    }
}
