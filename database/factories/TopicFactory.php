<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Topic::class, function (Faker $faker) {
    $word = $faker->words(2, true);

    return [
        'name' => $word,
        'slug' => str_slug($word),
    ];
});
