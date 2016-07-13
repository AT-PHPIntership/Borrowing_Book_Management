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
        $faker = Faker\Factory::create();
        $books = Book::all();

        foreach ($books as $book) {
            for($i = 1; $i <= 5; $i++){
                DB::table('book_items')->insert([
                    'book_id'    => $book->id,
                    'created_at' => Carbon\Carbon::now(),
                    'updated_at' => Carbon\Carbon::now()
                ]);
            }
        }
    }
}
