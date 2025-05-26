<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@outlook.com',
            'password' => bcrypt('4dm1n0821'), // Cambia esta contraseña
            'role' => 'admin',
            'avatar' => 'https://ui-avatars.com/api/?name=Admin&color=7F9CF5&background=EBF4FF'
        ]);
    }
}