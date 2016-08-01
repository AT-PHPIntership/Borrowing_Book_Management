<?php

use Illuminate\Database\Seeder;
use App\User;

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
        $users = User::all();
        $quantity = 2;
        foreach($users as $user){
        for($i=0;$i<2;$i++){
        	DB::table('borrows')->insert([
                'user_id'         => $user->id,
                'admin_user_id'   => rand(1,5),
                'quantity'        => $quantity,
                'created_at'      => Carbon\Carbon::now()
            ]);
        }
            
        
        }
        
    }
}
