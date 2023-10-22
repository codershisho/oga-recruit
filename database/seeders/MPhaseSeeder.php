<?php

namespace Database\Seeders;

use App\Models\MPhase;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MPhaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MPhase::truncate();

        $now = Carbon::now();

        $data = [
            ['name' => '書類選考', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '適性検査', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '一次面接', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '二次面接', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '最終面接', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '内定', 'sort_order' => 6, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '入社決定', 'sort_order' => 7, 'created_at' => $now, 'updated_at' => $now],
        ];

        MPhase::insert($data);
    }
}
