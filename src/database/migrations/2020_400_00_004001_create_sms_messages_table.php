<?php

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
            $table->unsignedInteger('creator_id')->nullable();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->unsignedInteger('pattern_id')->nullable();
            $table->foreign('pattern_id')->references('id')->on('sms_patterns');
            $table->string('gate')->nullable();
            $table->string('mid');
            $table->string('type')->nullable();
            $table->string('method')->nullable()->default('plain');
            $table->string('sender')->nullable();
            $table->longText('receiver')->nullable();
            $table->longText('receiver_type')->nullable();
            $table->string('message')->nullable();
            $table->string('message_type')->nullable();
            $table->string('status')->nullable()->default('processing');
            $table->longText('logs')->nullable();
            $table->timestamp('send_at')->nullable();
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
        Schema::dropIfExists('sms_messages');
    }
}
