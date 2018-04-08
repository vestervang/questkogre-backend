<?php

use Illuminate\Database\Seeder;
use App\User;

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
	
	    User::create([
		    'username' => 'admin',
		    'password' => bcrypt('admin'),
		    'email' => 'admin@admin.com',
		    'runescape_name' => 'admin',
		    'member' => 1
	    ]);
	
	    $i = 0;
	    for($i; $i < 19; $i++)
	    {
		    User::create([
			    'username' => $faker->userName,
			    'password' => bcrypt('test'),
			    'email' => $faker->email,
			    'runescape_name' => $faker->name,
			    'member' => $faker->boolean($chanceOfGettingTrue = 50)
		    ]);
	    }
    }
}
