<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 100)->unique();
            $table->string('first_name', 55);
            $table->string('last_name', 55);
            $table->string('email', 120)->unique();
            $table->string('phone_number', 100);
            $table->enum('account_type', ['Mechanic', 'User', 'Admin']);
            $table->string('password');
            $table->string('image_location');
            $table->string('identification_number'); //there might be no need to store this in the database if is really sensitive information
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
