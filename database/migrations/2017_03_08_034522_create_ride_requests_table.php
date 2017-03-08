<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRideRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ride_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('start_address');
            $table->string('destination_address');
            $table->string('arrival_time'); // stored as string currently, may be changed in future
            // days that this information applies to not stored... TODO
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
        Schema::dropIfExists('ride_requests');
    }
}
