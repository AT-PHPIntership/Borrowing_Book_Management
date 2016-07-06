<?php

use Illuminate\Database\Seeder;

class BorrowsTableSeeder extends Seeder
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
        	DB::table('borrows')->insert([
        		'user_id'         => rand(1,10),
        		'admin_user_id'   => rand(1,10),
        		'quantity'        => $quantity,
        		'created_at'      => Carbon\Carbon::now()
        	]);
        }        
    }
}
