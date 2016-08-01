<?php

use Illuminate\Database\Seeder;


class BorrowDetailsTableSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 $faker = Faker\Factory::create();
    	
            DB::table('borrow_details')->insert([
                'borrow_id'         => 1,
                'book_item_id'   => 1,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);

            DB::table('borrow_details')->insert([
                'borrow_id'         => 1,
                'book_item_id'   => 6,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);
    	    
    	    DB::table('borrow_details')->insert([
                'borrow_id'         => 2,
                'book_item_id'   => 2,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);

            DB::table('borrow_details')->insert([
                'borrow_id'         => 2,
                'book_item_id'   => 7,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);

            DB::table('borrow_details')->insert([
                'borrow_id'         => 3,
                'book_item_id'   => 11,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);

            DB::table('borrow_details')->insert([
                'borrow_id'         => 3,
                'book_item_id'   => 16,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);
			
			DB::table('borrow_details')->insert([
                'borrow_id'         => 4,
                'book_item_id'   => 12,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);
            DB::table('borrow_details')->insert([
                'borrow_id'         => 4,
                'book_item_id'   => 17,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);

            DB::table('borrow_details')->insert([
                'borrow_id'         => 5,
                'book_item_id'   => 21,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);

            DB::table('borrow_details')->insert([
                'borrow_id'         => 5,
                'book_item_id'   => 26,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);

            DB::table('borrow_details')->insert([
                'borrow_id'         => 6,
                'book_item_id'   => 22,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);

            DB::table('borrow_details')->insert([
                'borrow_id'         => 6,
                'book_item_id'   => 27,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);

            DB::table('borrow_details')->insert([
                'borrow_id'         => 7,
                'book_item_id'   => 31,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);

            DB::table('borrow_details')->insert([
                'borrow_id'         => 7,
                'book_item_id'   => 36,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);

            DB::table('borrow_details')->insert([
                'borrow_id'         => 8,
                'book_item_id'   => 32,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);

            DB::table('borrow_details')->insert([
                'borrow_id'         => 8,
                'book_item_id'   => 37,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);

            DB::table('borrow_details')->insert([
                'borrow_id'         => 9,
                'book_item_id'   => 41,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);

            DB::table('borrow_details')->insert([
                'borrow_id'         => 9,
                'book_item_id'   => 46,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);

            DB::table('borrow_details')->insert([
                'borrow_id'         => 10,
                'book_item_id'   => 42,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);

            DB::table('borrow_details')->insert([
                'borrow_id'         => 10,
                'book_item_id'   => 47,
                'status'        => 0,
                'expiretime' => $faker-> date,
                'created_at'      => Carbon\Carbon::now()
            ]);
	}
}