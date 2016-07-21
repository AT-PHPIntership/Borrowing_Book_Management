<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('borrow_id')->unsigned();
            $table->foreign('borrow_id')->references('id')->on('borrows')->onDelete('cascade');
            $table->integer('book_item_id')->unsigned();
            $table->foreign('book_item_id')->references('id')->on('book_items');
            $table->string('status',45);
            $table->date('expiretime');
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
        Schema::drop('borrow_details');
    }
}
