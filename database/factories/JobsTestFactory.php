<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\JobsTest;
use Faker\Generator as Faker;

$factory->define(JobsTest::class, function (Faker $faker) {
    return [
        'job_name' => $faker->text,
        'job_description' => $faker->text
    ];
});
