<?php

use Faker\Generator as Faker;

$factory->define(App\Pengumuman::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('id_ID');
    return [
        'user_id'           => App\User::where('role_id', 1)->value('id'),
        'judul'             => $faker->realText($maxNbChars = 50, $indexSize = 1),
        'isi'               => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'lampiran'          => $faker->image('public/storage/pengumuman/lampiran',600,300, null, false),
        'status'            => $faker->randomElement([1, 0]),
    ];
});
