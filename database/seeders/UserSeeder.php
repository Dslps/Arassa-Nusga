<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создание пользователя
        User::create([
            'name' => 'Admin', // Имя пользователя
            'email' => 'admin@gmail.com', // Email пользователя
            'password' => Hash::make('123456789'), // Хэшируем пароль
        ]);
    }
}
