<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Circus::class, function (Faker $faker) {

    $imageDownload = $faker->image(storage_path('app/public/images/activities/circus'), 200, 200);

    $imagePath = explode('/', $imageDownload);
    $imageName = end($imagePath);

    return [
        'location' => $faker->city,
        'image'    => 'storage/images/activities/circus/' . $imageName,
    ];
});
