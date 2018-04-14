<?php

use Faker\Generator as Faker;

$factory->define(App\NewsArticle::class, function (Faker $faker) {
    return [
        'user_id'  => 1,
        'headline' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'slug'     => substr(md5($faker->shuffle($faker->sentence())), 0, 150),
        'article'  => $faker->text($maxNbChars = 500)
    ];
});