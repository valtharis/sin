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


$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->words(random_int(3,6), true),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pl_PL\Text($faker));
    return [
        'title' => $faker->realText(random_int(32, 64), true),
        'content' => $faker->realText(random_int(2500, 7500), true),
        'category_id' => \App\Category::inRandomOrder()->first()->id
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'article_id' => \App\Article::inRandomOrder()->first()->id,
        'author' => $faker->firstName." ".$faker->lastName,
        'content' => $faker->sentences(random_int(2, 6), true),
        'likes_count' => random_int(0, 30)
    ];
});