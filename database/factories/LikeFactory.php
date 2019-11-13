<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Like;
	use App\Twitt;
	use App\User;
	use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
        //
	    'user_id' => User::inRandomOrder()->first()->id,
	    'twit_id' => Twitt::inRandomOrder()->first()->id,
    ];
});
