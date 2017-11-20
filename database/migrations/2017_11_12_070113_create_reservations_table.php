<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('customer_name');
            $table->integer('mechanic_id')->unsigned()->nullable(true);
            $table->string('mechanic_name')->nullable(true);
            $table->double('cost')->nullable(true);
            $table->string('description');
//            $table->date('date');
            $table->string('date');
            $table->boolean('assigned')->default(false);
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
        //
    }
}
