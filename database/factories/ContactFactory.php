<?php

use App\Models\Contact;
use Faker\Generator as Faker;

$factory->define(\App\Models\Contact::class, function (Faker $faker) {
    return [
        'ip' => $faker->ipv4,
        'hash' => md5($faker->unique()->word),
        'name' => $faker->name,
        'body' => $faker->text,
        'email' => $faker->email,
    ];
});

$factory->state(Contact::class, Contact::STATUS_PENDING, function (Faker $faker) {
    return [
        'status' => Contact::STATUS_PENDING,
    ];
});

$factory->state(Contact::class, Contact::STATUS_SENDING, function (Faker $faker) {
     return [
         'status' => Contact::STATUS_SENDING,
     ];
});

$factory->state(Contact::class, Contact::STATUS_SENT, function (Faker $faker) {
    return [
        'status' => Contact::STATUS_SENT,
    ];
});

$factory->state(Contact::class, Contact::STATUS_PROCESSED, function (Faker $faker) {
    return [
        'status' => Contact::STATUS_PROCESSED,
    ];
});

$factory->state(Contact::class, Contact::STATUS_ARCHIVED, function (Faker $faker) {
    return [
        'status' => Contact::STATUS_ARCHIVED,
    ];
});