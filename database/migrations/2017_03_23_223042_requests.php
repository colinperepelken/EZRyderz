<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Requests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_id'); // store the driver id
            $table->integer('receiver_id'); // store the ride offer id
            $table->string('subject');
            $table->string('msg');
            $table->string('start_address');
            $table->string('arrival_time');
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
           Schema::dropIfExists('requests');
    }
}
