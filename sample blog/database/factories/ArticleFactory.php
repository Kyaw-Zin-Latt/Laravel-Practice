<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use App\User;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10),
        'description' => $faker->paragraph(50),
        'user_id' => User::all()->random()->id,
    ];
});
