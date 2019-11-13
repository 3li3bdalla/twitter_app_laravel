<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BlockedKeyword;
use Faker\Generator as Faker;

$factory->define(BlockedKeyword::class, function (Faker $faker) {
    return [
        //
	    'keyword' => $faker->word
    ];
});
