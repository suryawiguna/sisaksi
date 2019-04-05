<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Pengumuman::class, 10)->create();

        // factory(App\User::class, 1)->create()->each(function ($u) {
        //     $u->koor()->save(factory(App\Koor::class)->make());
        // });
        
        $this->call([
            RolesSeeder::class,
            UsersSeeder::class,
            KabupatenSeeder::class,
            KecamatanSeeder::class,
            KelurahanSeeder::class,
            PartaiSeeder::class,
            TargetSeeder::class,
        ]);
    }
}
