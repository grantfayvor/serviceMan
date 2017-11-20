<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMechanicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mechanics', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->enum('status', ['Ready', 'Unavailable'])->default('Ready');
//            $table->string('identification_number');
            $table->integer('current_reservation_id')->unsigned()->nullable(true);
            $table->integer('reservation_ids')->unsigned()->nullable(true);
            $table->integer('number_of_reservations')->default(0);
            $table->string('location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
