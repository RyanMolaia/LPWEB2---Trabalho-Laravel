<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{

    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@admin.com'], 
            [
                'name' => 'Administrador',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin1234'),
                'is_admin' => 1,
            ]
        );
    }
}
