<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)->create([
            'username' => 'admin',
            'email'    => 'admin@admin.com',
        ])->each(function ($u) {
            $u->newsArticles()->saveMany(factory(App\NewsArticle::class, rand(0, 50))->create(['user_id' => $u->id]));
        });

        factory(\App\User::class, 50)->create()->each(function ($u) {
            $u->newsArticles()->saveMany(factory(App\NewsArticle::class, rand(0, 50))->create(['user_id' => $u->id]));
        });
    }
}
