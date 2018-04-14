<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'username'       => $faker->userName,
        'password'       => bcrypt('secret'),
        'email'          => $faker->email,
        'runescape_name' => $faker->name,
        'member'         => $faker->boolean($chanceOfGettingTrue = 50)
    ];
});
