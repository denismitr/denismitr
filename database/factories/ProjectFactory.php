<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description_en' => 'English: '.$faker->text,
        'description_ru' => 'Русский: '.$faker->text,
        'picture' => $faker->imageUrl(),
        'url' => $faker->url,
        'color' => $faker->hexColor,
        'priority' => $faker->numberBetween(1, 10),
    ];
});

$factory->state(\App\Models\Project::class, 'published', function (Faker $faker) {
    return [
        'published_at' => now()->subDays(mt_rand(1, 100)),
    ];
});

$factory->state(\App\Models\Project::class, 'unpublished', function (Faker $faker) {
    return [
        'published_at' => null,
    ];
});
