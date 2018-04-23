<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

use Carbon\Carbon;

$factory->define(App\Events::class, function (Faker\Generator $faker) {
    $date_start = $faker->dateTimeThisYear();
    $date_end = new Carbon($date_start->format('r'));
    return [
        'title' => $faker->sentence(4),
        'start' =>  $date_start,
        'end' =>  $date_end->addHours($faker->numberBetween(1, 35)),
        'color' => $faker->hexColor
    ];
});
