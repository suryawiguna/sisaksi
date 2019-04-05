<?php

use Illuminate\Database\Seeder;
use App\Target;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Target::insert([
            array('kab_id' => 1,    'target_koor' => 116,  'target_saksi' => 1168),
            array('kab_id' => 2,    'target_koor' => 93,   'target_saksi' => 934),
            array('kab_id' => 3,    'target_koor' => 217,  'target_saksi' => 2174),
            array('kab_id' => 4,    'target_koor' => 163,  'target_saksi' => 1634),
            array('kab_id' => 5,    'target_koor' => 154,  'target_saksi' => 1544),
            array('kab_id' => 6,    'target_koor' => 99,   'target_saksi' => 998),
            array('kab_id' => 7,    'target_koor' => 189,  'target_saksi' => 1890),
            array('kab_id' => 8,    'target_koor' => 70,   'target_saksi' => 700),
            array('kab_id' => 9,    'target_koor' => 156,  'target_saksi' => 1560),
        ]);
    }
}
