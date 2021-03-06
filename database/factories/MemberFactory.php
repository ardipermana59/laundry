<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Member;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
	$gender = ['L','P','L','P'];
    return [
        'name' => $faker->name,
		'address' => $faker->address,
		'gender' => $gender[array_rand($gender)],
		'tlp' => $faker->phoneNumber,
    ];
});
