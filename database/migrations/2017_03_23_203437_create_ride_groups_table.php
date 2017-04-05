<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRideGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ride_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('driver_id'); // store the driver id
            $table->integer('offer_id')->nullable(); // store the ride offer id
            $table->integer('carpooler_id'); // store the carpooler id
            $table->integer('request_id'); // store the carpooler id
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
        Schema::dropIfExists('ride_groups');
    }
}
