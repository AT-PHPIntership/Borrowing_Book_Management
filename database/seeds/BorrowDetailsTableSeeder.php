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

        for($i = 0; $i < 50; $i++){
            DB::table('borrow_details')->insert([
                'borrow_id'       => rand(1,10),
                'book_item_id'    => rand(1,100),
                'status'          => rand(0,1),
                'expiretime'      => $faker->date,
                'created_at'      => Carbon\Carbon::now(),              
            ]);
        }
    }
}
