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
        factory(App\User::class)->create([
            'username' => 'admin',
            'email' => 'admin@admin.com',
        ]);
        
        factory(\App\User::class, 50)->create()->each(function ($u){
            //Do additional stuff if needed
        });
    }
}
