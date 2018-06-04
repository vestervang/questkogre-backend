<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Skill::class, function (Faker $faker) {
    $iconSImage     = $faker->image(storage_path('app/public/images/skills'), 222, 125);
    $iconBImage     = $faker->image(storage_path('app/public/images/skills'), 222, 125);
    $thumbnailImage = $faker->image(storage_path('app/public/images/skills'), 222, 125);


    $iconSImagePath = explode('/', $iconSImage);
    $iconSImageName = end($iconSImagePath);

    $iconBImagePath = explode('/', $iconBImage);
    $iconBImageName = end($iconBImagePath);

    $thumbnailImagePath = explode('/', $thumbnailImage);
    $thumbnailImageName = end($thumbnailImagePath);

    return [
        'name'      => $faker->name,
        'max_level' => $faker->numberBetween(99, 120),
        'member'    => $faker->boolean(),
        'icon_s'    => 'storage/images/skills/' . $iconSImageName,
        'icon_b'    => 'storage/images/skills/' . $iconBImageName,
        'thumbnail' => 'storage/images/skills/' . $thumbnailImageName,
    ];
});
