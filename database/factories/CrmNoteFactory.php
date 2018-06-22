<?php

$factory->define(App\CrmNote::class, function (Faker\Generator $faker) {
    return [
        "customer_id" => factory('App\CrmCustomer')->create(),
        "note" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
        "created_by_team_id" => factory('App\Team')->create(),
    ];
});
