<?php

use Illuminate\Database\Seeder;
use App\Book;

class BookItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
    	$faker = Faker\Factory::create();

        for($i = 1; $i <= 10; $i++){
        	for($j=0;$j<10;$j++){
        		DB::table('book_items')->insert([
        		'book_id'         => $i,
        		'created_at'      => Carbon\Carbon::now()
        	]);
        	}       	
=======
        $faker = Faker\Factory::create();
        $books = Book::all();

        foreach ($books as $book) {
            for($i = 1; $i <= 5; $i++){
                DB::table('book_items')->insert([
                    'book_id' => $book->id,
                    'created_at' => Carbon\Carbon::now(),
                    'updated_at' => Carbon\Carbon::now()
                ]);
            }
>>>>>>> ceeec4a8e06b3b90ac9afdae620e99d49b7b6d8b
        }
    }
}
