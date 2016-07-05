<?php

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
            $table->string('username',100)->unique();
            $table->string('fullname',100);
            $table->string('password',100);
            $table->enum('gender', ['male', 'female', 'unisex'])->default('unisex');
            $table->date('birthday')->nullable();
            $table->string('phone',11)->nullable();
            $table->string('address',100)->nullable();
            $table->date('expiretime')->nullable();
            $table->string('image',100)->nullable();
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
        Schema::drop('users');
    }
}
