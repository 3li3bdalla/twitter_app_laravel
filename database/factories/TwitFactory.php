<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Twitt,\App\User;
use Faker\Generator as Faker;

$factory->define(Twitt::class, function (Faker $faker) {
    return [
        //
        'user_id' => User::inRandomOrder()->first()->id,
        'content' => $faker->sentence(30)
    ];
});
