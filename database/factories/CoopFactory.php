<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Coop;
use Faker\Generator as Faker;

$factory->define(Coop::class, function (Faker $faker) {

    return [
        'cnpj' => $faker->word,
        'razao' => $faker->word,
        'matriz' => $faker->word,
        'site' => $faker->word,
        'email' => $faker->word,
        'logo' => $faker->word,
        'telefone' => $faker->word,
        'whatsapp' => $faker->word,
        'estado' => $faker->word,
        'cidade' => $faker->word,
        'numero' => $faker->word,
        'complemento' => $faker->word,
        'bairro' => $faker->word,
        'compartilhamento' => $faker->randomDigitNotNull,
        'sell' => $faker->randomDigitNotNull,
        'ramo_id' => $faker->word,
        'catalogo' => $faker->word,
        'ativo' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
