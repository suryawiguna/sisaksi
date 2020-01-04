<?php

use Faker\Generator as Faker;

$factory->define(App\Saksi::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('id_ID');
    $gender = $faker->randomElement(['L', 'P']);
    return [
        'user_id'           => $faker->unique()->numberBetween(App\User::count()+1, App\User::count()+1),
        'koor_id'           => $faker->numberBetween(1, App\Koor::count()),
        'partai_id'         => $faker->numberBetween(1, App\Partai::count()),
        'tps'               => $faker->numberBetween(1, 50),
        'nama'              => $faker->name($gender),
        'gender'            => $gender,
        'alamat'            => $faker->address,
        'no_hp'             => $faker->numerify('08##########'),
        'foto_ktp'          => $faker->image('public/storage/saksi/foto_ktp',600,300, null, false),
        'foto_diri'         => $faker->image('public/storage/saksi/foto_diri',300,500, null, false)
    ];
});
