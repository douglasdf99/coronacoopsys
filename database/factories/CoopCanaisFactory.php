<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CoopCanais;
use Faker\Generator as Faker;

$factory->define(CoopCanais::class, function (Faker $faker) {

    return [
        'canai_id' => $faker->word,
        'coop_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
