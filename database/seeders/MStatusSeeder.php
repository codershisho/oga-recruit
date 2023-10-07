<?php

namespace Database\Seeders;

use App\Models\MStatus;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MStatus::truncate();

        $now = Carbon::now();

        $data = [
            ['name' => '未着手', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '調整中', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '確認中', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '保留', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '終了', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '却下', 'sort_order' => 6, 'created_at' => $now, 'updated_at' => $now],
        ];

        MStatus::insert($data);
    }
}
