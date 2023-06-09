<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'is_publish' => $faker->boolean,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
