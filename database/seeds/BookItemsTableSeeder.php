<?php

use Illuminate\Database\Seeder;

class BookItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

        for($i = 1; $i <= 10; $i++){
        	for($j=0;$j<10;$j++){
        		DB::table('book_items')->insert([
        		'book_id'         => $i,
        		'created_at'      => Carbon\Carbon::now()
        	]);
        	}       	
        }
    }
}
