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
            $table->string('mobile');
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('user_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('city');
            $table->string('state');
            $table->text('address');
            $table->string('activation_code');
            $table->enum('user_status',['0','1']);
            $table->enum('user_type',['1','2'])->comment = "1=>admin,2=>user";
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
        Schema::dropIfExists('user_informations');
    }
}
