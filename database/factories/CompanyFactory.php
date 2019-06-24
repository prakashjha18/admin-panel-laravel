<?php

$factory->define(App\Company::class, function (Faker\Generator $faker) {
    return [
        "company_name" => $faker->name,
        "company_address" => $faker->name,
        "gst_in" => $faker->name,
        "company_email" => $faker->name,
        "company_mobileno" => $faker->name,
    ];
});
