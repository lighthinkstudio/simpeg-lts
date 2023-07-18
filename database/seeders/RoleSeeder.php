<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role seeder
        $roles = [
            [
                'kode'  => 'admin',
                'nama'  => 'Administrator',
                'group' => 'simpeg'
            ],
            [
                'kode'  => 'user',
                'nama'  => 'User',
                'group' => 'simpeg'
            ],

        ];

        foreach($roles as $data)
        {
            Role::create([
                'kode'  => $data['kode'],
                'nama'  => $data['nama'],
                'group' => $data['group']
            ]);
        }
    }
}
