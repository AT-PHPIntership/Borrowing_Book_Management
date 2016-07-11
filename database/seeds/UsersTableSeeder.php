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
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++){
        	DB::table('users')->insert([
        		'username'        => $faker-> username,  
        		'password'        => bcrypt('456789'),
                'admin_user_id'   => rand(1,10),
         		'fullname'        => $faker-> name,
        		'birthday'        => $faker-> date,
        		'phone'           => $faker-> phonenumber,
        		'address'         => $faker-> address,
        		'expiretime'      => $faker-> date,
        		'image'           => $faker-> image, 
        		'created_at'      => Carbon\Carbon::now()
        	]);
        }
    }
}
