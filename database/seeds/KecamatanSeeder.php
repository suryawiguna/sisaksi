<?php

use Illuminate\Database\Seeder;
use App\Kecamatan;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Kecamatan::insert([

        // BADUNG
        array('user_id' => 1, 'kab_id' => 1, 'nama' => 'Abiansemal'),
        array('user_id' => 2, 'kab_id' => 1, 'nama' => 'Kuta'),
        array('user_id' => 3, 'kab_id' => 1, 'nama' => 'Kuta Selatan'),
        array('user_id' => 4, 'kab_id' => 1, 'nama' => 'Kuta Utara'),
        array('user_id' => 5, 'kab_id' => 1, 'nama' => 'Mengwi'),
        array('user_id' => 6, 'kab_id' => 1, 'nama' => 'Petang'),

        // BANGLI
        array('user_id' => 7, 'kab_id' => 2, 'nama' => 'Bangli'),
        array('user_id' => 8, 'kab_id' => 2, 'nama' => 'Kintamani'),
        array('user_id' => 9, 'kab_id' => 2, 'nama' => 'Susut'),
        array('user_id' => 10,'kab_id' => 2, 'nama' => 'Tembuku'),

        // BULELENG
        array('user_id' => 11, 'kab_id' => 3, 'nama' => 'Banjar'),
        array('user_id' => 12, 'kab_id' => 3, 'nama' => 'Buleleng'),
        array('user_id' => 13, 'kab_id' => 3, 'nama' => 'Busungbiu'),
        array('user_id' => 14, 'kab_id' => 3, 'nama' => 'Gerokgak'),
        array('user_id' => 15, 'kab_id' => 3, 'nama' => 'Kubutambahan'),
        array('user_id' => 16, 'kab_id' => 3, 'nama' => 'Sawan'),
        array('user_id' => 17, 'kab_id' => 3, 'nama' => 'Seririt'),
        array('user_id' => 18, 'kab_id' => 3, 'nama' => 'Sukasada'),
        array('user_id' => 19, 'kab_id' => 3, 'nama' => 'Tejakula'),

        // DENPASAR
        array('user_id' => 20, 'kab_id' => 4, 'nama' => 'Denpasar Barat'),
        array('user_id' => 21, 'kab_id' => 4, 'nama' => 'Denpasar Selatan'),
        array('user_id' => 22, 'kab_id' => 4, 'nama' => 'Denpasar Timur'),
        array('user_id' => 23, 'kab_id' => 4, 'nama' => 'Denpasar Utara'),

        // GIANYAR
        array('user_id' => 24, 'kab_id' => 5, 'nama' => 'Blahbatuh'),
        array('user_id' => 25, 'kab_id' => 5, 'nama' => 'Gianyar'),
        array('user_id' => 26, 'kab_id' => 5, 'nama' => 'Payangan'),
        array('user_id' => 27, 'kab_id' => 5, 'nama' => 'Sukawati'),
        array('user_id' => 28, 'kab_id' => 5, 'nama' => 'Tampak Siring'),
        array('user_id' => 29, 'kab_id' => 5, 'nama' => 'Tegallalang'),
        array('user_id' => 30, 'kab_id' => 5, 'nama' => 'Ubud'),

        // JEMBRANA
        array('user_id' => 31, 'kab_id' => 6, 'nama' => 'Jembrana'),
        array('user_id' => 32, 'kab_id' => 6, 'nama' => 'Melaya'),
        array('user_id' => 33, 'kab_id' => 6, 'nama' => 'Mendoyo'),
        array('user_id' => 34, 'kab_id' => 6, 'nama' => 'Negara'),
        array('user_id' => 35, 'kab_id' => 6, 'nama' => 'Pekutatan'),

        // KARANGASEM
        array('user_id' => 36, 'kab_id' => 7, 'nama' => 'Abang'),
        array('user_id' => 37, 'kab_id' => 7, 'nama' => 'Bebandem'),
        array('user_id' => 38, 'kab_id' => 7, 'nama' => 'Karang Asem'),
        array('user_id' => 39, 'kab_id' => 7, 'nama' => 'Kubu'),
        array('user_id' => 40, 'kab_id' => 7, 'nama' => 'Manggis'),
        array('user_id' => 41, 'kab_id' => 7, 'nama' => 'Rendang'),
        array('user_id' => 42, 'kab_id' => 7, 'nama' => 'Selat'),
        array('user_id' => 43, 'kab_id' => 7, 'nama' => 'Sidemen'),

        // KLUNGKUNG
        array('user_id' => 44, 'kab_id' => 8, 'nama' => 'Banjarangkan'),
        array('user_id' => 45, 'kab_id' => 8, 'nama' => 'Dawan'),
        array('user_id' => 46, 'kab_id' => 8, 'nama' => 'Klungkung'),
        array('user_id' => 47, 'kab_id' => 8, 'nama' => 'Nusapenida'),

        // TABANAN
        array('user_id' => 48, 'kab_id' => 9, 'nama' => 'Baturiti'),
        array('user_id' => 49, 'kab_id' => 9, 'nama' => 'Kediri'),
        array('user_id' => 50, 'kab_id' => 9, 'nama' => 'Kerambitan'),
        array('user_id' => 51, 'kab_id' => 9, 'nama' => 'Marga'),
        array('user_id' => 52, 'kab_id' => 9, 'nama' => 'Penebel'),
        array('user_id' => 53, 'kab_id' => 9, 'nama' => 'Pupuan'),
        array('user_id' => 54, 'kab_id' => 9, 'nama' => 'Selemadeg Barat'),
        array('user_id' => 55, 'kab_id' => 9, 'nama' => 'Selemadeg Timur'),
        array('user_id' => 56, 'kab_id' => 9, 'nama' => 'Selemadeg'),
        array('user_id' => 57, 'kab_id' => 9, 'nama' => 'Tabanan')

      ]);
    }
}
