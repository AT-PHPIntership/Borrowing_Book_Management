<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 5; $i++){
        	DB::table('categories')->insert([
        		'name'             => $faker-> name,
        		'admin_user_id'    => rand(1,5),
        		'created_at'  => Carbon\Carbon::now()
        	]);
        }        
    }
}
