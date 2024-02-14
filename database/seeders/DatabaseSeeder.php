<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Usuario',
            'email' => 'inmobiliaria@gmail.com',
            'password' => Hash::make('password'),
            'telefono' => '+52 766 115 2096'
        ]);
        \App\Models\User::factory(100)->create();
        \App\Models\Inmueble::factory(100)->create();
    }
}
