<?php

$factory->define(App\SalesInvoice::class, function (Faker\Generator $faker) {
    return [
        "company_id" => factory('App\CreateCompany')->create(),
        "invoice_no" => $faker->randomNumber(2),
        "invoice_date" => $faker->date("d/m/Y", $max = 'now'),
        "customer_id" => factory('App\Customer')->create(),
        "quantity" => $faker->randomNumber(2),
        "price" => $faker->randomNumber(2),
        "vat" => $faker->randomNumber(2),
        "discount" => $faker->randomNumber(2),
        "amount_before_vat" => $faker->randomNumber(2),
        "transaction_total" => $faker->randomNumber(2),
        "created_by_id" => factory('App\User')->create(),
        "created_by_team_id" => factory('App\Team')->create(),
    ];
});
