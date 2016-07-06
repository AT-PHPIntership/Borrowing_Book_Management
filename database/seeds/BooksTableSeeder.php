<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $quantity = 5;

        for($i = 0; $i < 10; $i++){
        	DB::table('books')->insert([
        		'name'            => $faker-> name,
        		'category_id'     => rand(1,5),
        		'admin_user_id'   => rand(1,10),
        		'author'          => $faker-> name,
        		'quantity'        => $quantity,
        		'image'           => $faker-> image,
        		'publish_year'    => $faker-> date,
                'number_of_page'  => $faker-> randomDigit,
        		'created_at'      => Carbon\Carbon::now()
        		
        	]);
        }
    }
}
