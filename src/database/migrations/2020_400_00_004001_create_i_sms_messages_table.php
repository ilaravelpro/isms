<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/12/20, 8:23 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateISmsMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_sms_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->unsignedBigInteger('pattern_id')->nullable();
            $table->foreign('pattern_id')->references('id')->on('i_sms_patterns');
            $table->string('gate')->nullable();
            $table->string('mid')->nullable();
            $table->string('type')->nullable()->default('other');
            $table->string('method')->nullable()->default('plain');
            $table->string('sender')->nullable();
            $table->longText('receiver')->nullable();
            $table->string('receiver_type')->nullable();
            $table->string('message')->nullable();
            $table->string('message_type')->nullable();
            $table->string('status')->nullable()->default('processing');
            $table->longText('logs')->nullable();
            $table->timestamp('sent_at')->nullable();
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
        Schema::dropIfExists('i_sms_messages');
    }
}
