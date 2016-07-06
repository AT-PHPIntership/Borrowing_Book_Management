<?php

use Illuminate\Database\Seeder;

class BorrowDetailsTableSeeder extends Seeder
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
       	    for($j = 0; $j < 50; $i+=10){
            DB::table('borrow_details')->insert([
                'borrow_id'       => $i,
                'book_item_id'    => $j,
                'status'          => rand(0,1),
                'expiretime'      => $faker->date,
                'created_at'      => Carbon\Carbon::now(),

            ]);
        }
        }       
    }
}
