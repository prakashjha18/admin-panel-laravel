<?php

$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        "client_name" => $faker->name,
        "client_address" => $faker->name,
        "client_gstin" => $faker->name,
        "client_emailid" => $faker->name,
        "client_mobileno" => $faker->name,
        "payment_status" => $faker->randomNumber(2),
        "start_date" => $faker->date("Y-m-d", $max = 'now'),
    ];
});
