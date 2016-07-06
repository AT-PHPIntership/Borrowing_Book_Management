<?php

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
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
        	DB::table('admin_users')->insert([
        		'username'        => $faker-> username,
        		'password'        => bcrypt('123456'),
        		'fullname'        => $faker-> name,
        		'created_at'      => Carbon\Carbon::now()






        	]);
        }
    }
}
