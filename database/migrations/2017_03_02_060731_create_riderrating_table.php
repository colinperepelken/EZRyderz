<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiderRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riderrating', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->default(-1); //Rating(userId) is a foreign key to Users(id);
            $table->float('riderRating');       //rating receved as a driver
            //$table->float('passengerRating')->default(-1);    //rating receved as a passenger
            $table->string('commentASrider', 250)->default('Write a comment.');    //comments receved by the user as a driver
            //$table->string('commentASpassenger', 250)->default('Write a comment.'); //comments receved by the user as a passenger
            $table->timestamps(); //created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating');
    }
}
