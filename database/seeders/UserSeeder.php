<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => "Jeremias",
            'email' => "jeremiiias@hotmail.com",
            'password' => Hash::make('123456', ['rounds' => 12])
        ]);
    }
}
