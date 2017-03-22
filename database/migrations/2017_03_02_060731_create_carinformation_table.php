<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('carinformation', function (Blueprint $table) {
            $table->increments('id'); //Primary key
            $table->integer('user_id')->unique(); //CarInformation(userId) is a foreign key to Users(id);
            $table->string('make');
            $table->string('model');
            $table->integer('year');
            $table->string('licensePlate')->unique();
            $table->integer('numberOfSeats');
            $table->string('hasAirConditioning');
            $table->integer('efficiency');
            $table->string('efficiencyUnits');
            //Removed visibility option as every driver's car information should be visible
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carinformation');
    }
}
