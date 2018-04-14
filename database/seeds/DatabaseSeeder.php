<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(NewsArticlesTableSeeder::class);
        $this->call(NavigationTableSeeder::class);
        $this->call(CircusTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
    }
}
