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
        'username' => $faker->username,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
    ];
});

$factory->define(App\Card::class, function(Faker $faker){
    return [
        'title'=> $faker->sentence
    ];
});

$factory->define(App\Note::class,function(Faker $faker){
    return[
        'user_id' => factory(App\User::class)->create()->id,
        'card_id' => factory(App\Card::class)->create()->id,
        'body' => $faker-> paragraph
     ];
});