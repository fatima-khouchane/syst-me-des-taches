<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ]);

        $create = User::create([
            'name' => 'create',
            'email' => 'create@gmail.com',
            'password' => Hash::make('password')
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password')
        ]);
        $admin->roles()->attach([1, 2]);
        $create->roles()->attach([2]);
        $user->roles()->attach([3]);
    }
}
