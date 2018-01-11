<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'avatar' => $faker->image(public_path('uploads'), 100, 100)
    ];
});
