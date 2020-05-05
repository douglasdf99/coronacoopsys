<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CoopProduto;
use Faker\Generator as Faker;

$factory->define(CoopProduto::class, function (Faker $faker) {

    return [
        'produto_id' => $faker->word,
        'coop_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
