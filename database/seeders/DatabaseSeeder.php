<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Truncate table
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('konfigurasi')->truncate();
        Schema::enableForeignKeyConstraints();

        // Runnung any seeder
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            KonfigurasiSeeder::class,
        ]);
    }
}
