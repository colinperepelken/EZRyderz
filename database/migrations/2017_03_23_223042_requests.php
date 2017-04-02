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
            $table->integer('sender_id'); 
            $table->integer('receiver_id');
            $table->integer('request_id');
            $table->longtext('subject');
            $table->longtext('msg');
            $table->longtext('start_address');
            $table->longtext('arrival_time');
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
