<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear usuario administrador
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'roles_idroles' => 1, // Asumiendo que 1 es el ID del rol de administrador
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Crear usuario publicador
        DB::table('users')->insert([
            'name' => 'Publisher User',
            'email' => 'publisher@example.com',
            'password' => Hash::make('password'),
            'roles_idroles' => 2, // Asumiendo que 2 es el ID del rol de publicador
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Crear usuarios visitantes
        $visitors = [
            ['name' => 'Visitor1', 'email' => 'visitor1@example.com', 'password' => Hash::make('password'), 'roles_idroles' => 3],
            ['name' => 'Visitor2', 'email' => 'visitor2@example.com', 'password' => Hash::make('password'), 'roles_idroles' => 3],
            ['name' => 'Visitor3', 'email' => 'visitor3@example.com', 'password' => Hash::make('password'), 'roles_idroles' => 3],
        ];

        foreach ($visitors as $visitor) {
            DB::table('users')->insert(array_merge($visitor, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
