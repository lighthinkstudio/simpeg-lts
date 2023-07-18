<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nip'       => '198800000000000001',
            'nama'      => 'Muslim',
            'email'     => 'dmooez.dev@gmail.com',
            'password'  => Hash::make('password'),
            'role'      => 'admin',
            'status'    => 'active',
        ]);

        User::create([
            'nip'       => '198800000000000002',
            'nama'      => 'Piedrosa Imoes',
            'email'     => 'dmooez.admin@gmail.com',
            'password'  => Hash::make('password'),
            'role'      => 'user',
            'status'    => 'inactive',
        ]);

        User::create([
            'nip'       => '198800000000000003',
            'nama'      => 'Imoes Piedrosa',
            'email'     => 'dmooez.research@gmail.com',
            'password'  => Hash::make('password'),
            'role'      => 'user',
            'status'    => 'blocked',
        ]);
    }
}
