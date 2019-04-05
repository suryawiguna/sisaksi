<?php

use Illuminate\Database\Seeder;
use App\Kabupaten;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kabupaten::insert([
            array('nama' => 'Badung'),
            array('nama' => 'Bangli'),
            array('nama' => 'Buleleng'),
            array('nama' => 'Denpasar'),
            array('nama' => 'Gianyar'),
            array('nama' => 'Jembrana'),
            array('nama' => 'Karangasem'),
            array('nama' => 'Klungkung'),
            array('nama' => 'Tabanan'),
        ]);
    }
}
