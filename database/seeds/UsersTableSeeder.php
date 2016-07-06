<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        
=======
        $faker = Faker\Factory::create();

        for($i = 0; $i < 3; $i++){
        	DB::table('users')->insert([
        		'username'        => $faker-> username,
        		'password'        => bcrypt('456789'),
        		'fullname'        => $faker-> name,
        		'birthday'        => $faker-> date,
        		'phone'           => $faker-> phonenumber,
        		'address'         => $faker-> address,
        		'expiretime'      => $faker-> date,
        		'image'           => $faker-> image, 
        		'created_at'      => Carbon\Carbon::now()
        	]);
        }
>>>>>>> bc9780ccebb96e18d07ee8cfe3fa2b422f05610b
    }
}
