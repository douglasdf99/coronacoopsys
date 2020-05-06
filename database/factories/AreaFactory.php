<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Area;
use Faker\Generator as Faker;

$factory->define(Area::class, function (Faker $faker) {

    return [
        'tipo' => $faker->word,
        'endereco_padrao' => $faker->randomDigitNotNull,
        'endereco' => $faker->word,
        'cidade' => $faker->word,
        'estado' => $faker->word,
        'coop_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
