<?php

use Faker\Generator as Faker;

$factory->define(App\Koor::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('id_ID');
    $gender = $faker->randomElement(['L', 'P']);
    return [
        'komisisaksi_id'    => $faker->numberBetween(1, 57),
        'user_id'           => $faker->unique()->numberBetween(App\User::count()+1, App\User::count()+1),
        'kel_id'            => $faker->numberBetween(1, App\Kelurahan::count()),
        'nama'              => $faker->name($gender),
        'gender'            => $gender,
        'alamat'            => $faker->address,
        'no_hp'             => $faker->numerify('08##########'),
        'foto_ktp'          => $faker->image('public/storage/koor/foto_ktp',600,300, null, false),
        'foto_diri'         => $faker->image('public/storage/koor/foto_diri',300,500, null, false)
    ];
});
