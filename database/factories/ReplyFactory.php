<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reply;
use App\User;
use \App\Twitt;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        //
        //
        'user_id' => User::inRandomOrder()->first()->id,
        'twit_id' => Twitt::inRandomOrder()->first()->id,
        'content' => $faker->sentence(10),
    ];
});
