<?php

$factory->define(App\Supplier::class, function (Faker\Generator $faker) {
    return [
        "supplier_name" => $faker->name,
        "billing_address" => $faker->name,
        "shipping_address" => $faker->name,
        "mobile" => $faker->name,
        "phone" => $faker->name,
        "email" => $faker->safeEmail,
        "trn" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
        "created_by_team_id" => factory('App\Team')->create(),
    ];
});
