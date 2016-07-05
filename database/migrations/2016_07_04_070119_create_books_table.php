<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id',10);
            $table->string('name',100);
            $table->integer('category_id',10)->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('admin_user_id',10)->unsigned();
            $table->foreign('admin_user_id')->references('id')->on('admin_users')->onDelete('cascade');
            $table->string('author');
            $table->integer('quantity')->default(0);
            $table->string('image',100)->nullable();
            $table->string('publish_year',10);
            $table->integer('number_of_page');
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
        Schema::drop('books');
    }
}
