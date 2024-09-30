<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/12/20, 8:23 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->unsignedBigInteger('pattern_id')->nullable();
            $table->unsignedBigInteger('gateway_id')->nullable();
            $table->string('mid')->nullable();
            $table->string('type')->nullable()->default('other');
            $table->string('method')->nullable()->default('plain');
            $table->string('sender')->nullable();
            $table->longText('receiver')->nullable();
            $table->string('receiver_type')->nullable();
            $table->longText('message')->nullable();
            $table->string('message_type')->nullable();
            $table->string('status')->nullable()->default('processing');
            $table->longText('logs')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
        });
        Schema::table('sms_messages', function($table) {
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('pattern_id')->references('id')->on('sms_patterns');
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
        Schema::dropIfExists('sms_messages');
    }
}
