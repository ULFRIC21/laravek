<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * для создания тестовых пользователей 
 * Запуск: php artisan db:seed --class=RoleUsersSeeder
 *
 *   admin@localhost  — админ,   пароль: admin123
 *   driver@localhost — водитель, пароль: admin123
 *   loader@localhost — грузчик,  пароль: admin123
 */
class RoleUsersSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Администратор',
                'email' => 'admin@localhost',
                'role' => 'admin',
                'password' => 'admin123',
            ],
            [
                'name' => 'Водитель',
                'email' => 'driver@localhost',
                'role' => 'driver',
                'password' => 'admin123',
            ],
            [
                'name' => 'Грузчик',
                'email' => 'loader@localhost',
                'role' => 'loader',
                'password' => 'admin123',
            ],
        ];

        foreach ($users as $data) {
            if (User::where('email', $data['email'])->exists()) {
                continue;
            }
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'role' => $data['role'],
                'password' => Hash::make($data['password']),
            ]);
        }
    }
}
