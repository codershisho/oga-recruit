<?php

namespace Database\Seeders;

use App\Models\MSource;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MSource::truncate();

        $now = Carbon::now();

        $data = [
            ['name' => 'オーガランドホームページ', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'ハローワーク', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'indeed', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'engage', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'SNS（Twitter,Instagram,Facebookなど）', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '友人・知人', 'sort_order' => 6, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '家族', 'sort_order' => 7, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'その他', 'sort_order' => 8, 'created_at' => $now, 'updated_at' => $now],
        ];

        MSource::insert($data);
    }
}
