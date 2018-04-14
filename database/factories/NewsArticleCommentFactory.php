<?php

use Faker\Generator as Faker;

$factory->define(App\NewsArticleComment::class, function (Faker $faker) {
    return [
        'news_article_id' => $faker->numberBetween(1),
        'comment'         => $faker->paragraphs(3, true),
        'user_id'         => $faker->numberBetween(1)
    ];
});
