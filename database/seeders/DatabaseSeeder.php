<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);

        $this->call(MPhaseSeeder::class);
        $this->call(MPositionSeeder::class);
        $this->call(MSourceSeeder::class);
        $this->call(MStatusSeeder::class);
        $this->call(MReasonSeeder::class);
    }
}
