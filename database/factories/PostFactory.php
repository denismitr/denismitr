<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    $name = $faker->words(2, true);

    return [
        'name' => $name,
        'slug' => str_slug($name),
        'body' => $faker->text,
        'claps' => $faker->numberBetween(0, 2000),
        'lang' => array_random(['en', 'ru']),
    ];
});

$factory->state(\App\Models\Post::class, 'published', function (Faker $faker) {
    return [
        'published_at' => now()->subDays(mt_rand(0, 350)),
    ];
});

$factory->state(\App\Models\Post::class, 'unpublished', function (Faker $faker) {
    return [
        'published_at' => null,
    ];
});
