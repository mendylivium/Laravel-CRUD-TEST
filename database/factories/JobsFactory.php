<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Jobs;
use Faker\Generator as Faker;

$factory->define(Jobs::class, function (Faker $faker) {
    return [
        'job_name' => $faker->text,
        'job_description' => $faker->text
    ];
});
