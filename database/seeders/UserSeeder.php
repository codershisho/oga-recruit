<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();

        DB::table('users')->insert([
            [
                'name'              => 'admin',
                'email'             => 'admin@example.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('password1234'),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'pikimaru',
                'email'             => 'pikimaru@example.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('password1234'),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
