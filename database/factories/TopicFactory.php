<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Topic::class, function (Faker $faker) {
    $word = $faker->unique()->words(2, true);

    return [
        'name' => ucfirst($word),
        'slug' => str_slug($word),
    ];
});
