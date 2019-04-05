<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::insert([
        array('name' => 'Pimpinan'),
        array('name' => 'Komisi Saksi'),
        array('name' => 'Koordinator Saksi'),
        array('name' => 'Saksi'),
      ]);
    }
}
