<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. EL ADMIN (Tú para gestionar la tienda)
        User::create([
            'name'     => 'Admin Amatist',
            'email'    => 'admin@amatist.test',
            'password' => Hash::make('admin123'), 
            'role'     => 'admin', 
        ]);

        // 2. EL USUARIO DE PRUEBA (Para simular compras)
        User::create([
            'name'     => 'Pepe Cliente',
            'email'    => 'pepe@pepe.com',
            'password' => Hash::make('user123'), 
            'role'     => 'user',
        ]);

        echo "Usuarios de prueba creados con éxito. \n";
    }
}