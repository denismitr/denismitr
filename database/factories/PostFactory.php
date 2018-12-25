<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    $name = $faker->unique()->words(mt_rand(2, 4), true);

    return [
        'name' => ucfirst($name),
        'slug' => str_slug($name),
        'body' => $faker->realText(2000),
        'claps' => $faker->numberBetween(0, 2000),
        'lang' => array_random(['en', 'ru']),
        'parent_id' => null,
        'part' => 1,
    ];
});

$factory->state(\App\Models\Post::class, 'child', function (Faker $faker) {
    return [
        'part' => mt_rand(2, 6),
        'parent_id' => function() {
            return factory(\App\Models\Post::class)->create()->id;
        }
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
