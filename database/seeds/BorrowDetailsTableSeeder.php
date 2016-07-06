<?php

use Illuminate\Database\Seeder;
use App\Borrow;
use App\BorrowDetail;


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

        $borrows = Borrow::all();

        foreach ($borrows as $borrow) {
            for($i = 0; $i < 5; $i++){
                BorrowDetail::insert([
                    'borrow_id'       => $borrow->id,
                    'book_item_id'    => rand(1,10),
                    'status'          => rand(0,1),
                    'expiretime'      => $faker->date,
                    'created_at'      => Carbon\Carbon::now()           
                ]);
            }
        }
    }
}
