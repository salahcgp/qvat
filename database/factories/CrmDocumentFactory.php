<?php

$factory->define(App\CrmDocument::class, function (Faker\Generator $faker) {
    return [
        "customer_id" => factory('App\CrmCustomer')->create(),
        "name" => $faker->name,
        "description" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
        "created_by_team_id" => factory('App\Team')->create(),
    ];
});
