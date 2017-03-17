<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'category_id' => random_int(1, 4),
        'title' => $faker->words(random_int(3, 5), true),
        'content' => $faker->text(random_int(150, 300)),
        'updated_at' => null,
        'created_at' => $faker->dateTime,
    ];
});
