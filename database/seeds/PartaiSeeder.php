<?php

use Illuminate\Database\Seeder;
use App\Partai;

class PartaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Partai::insert([
        array('nama' => 'Berkarya', 'deskripsi' => 'Partai Berkarya'),
        array('nama' => 'Demokrat', 'deskripsi' => 'Partai Demokrat'),
        array('nama' => 'Garuda',   'deskripsi' => 'Partai Gerakan Perubahan Indonesia'),
        array('nama' => 'Gerindra', 'deskripsi' => 'Partai Gerakan Indonesia Raya'),
        array('nama' => 'Golkar',   'deskripsi' => 'Partai Golongan Karya'),
        array('nama' => 'Hanura',   'deskripsi' => 'Partai Hati Nurani Rakyat'),
        array('nama' => 'NasDem',   'deskripsi' => 'Partai Nasional Demokrat'),
        array('nama' => 'PAN',      'deskripsi' => 'Partai Amanat Nasional'),
        array('nama' => 'PBB',      'deskripsi' => 'Partai Bulan Bintang'),
        array('nama' => 'PDIP',     'deskripsi' => 'Partai Demokrasi Indonesia Perjuangan'),
        array('nama' => 'Perindo',  'deskripsi' => 'Partai Persatuan Indonesia'),
        array('nama' => 'PKB',      'deskripsi' => 'Partai Kebangkitan Bangsa'),
        array('nama' => 'PKPI',     'deskripsi' => 'Partai Keadilan dan Persatuan Indonesia'),
        array('nama' => 'PKS',      'deskripsi' => 'Partai Keadilan Sejahtera'),
        array('nama' => 'PPP',      'deskripsi' => 'Partai Persatuan Pembangunan'),
        array('nama' => 'PSI',      'deskripsi' => 'Partai Solidaritas Indonesia'),
      ]);
    }
}
