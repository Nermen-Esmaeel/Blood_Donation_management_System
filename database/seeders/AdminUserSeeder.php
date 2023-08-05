<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firsName' =>'Nermen' ,
             'lastName' => 'Es',
             'userName' => 'NermenEs',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678@') ,
            'email_verified_at' => now(),
            'status' => 'admin',
           ]);
    }
}