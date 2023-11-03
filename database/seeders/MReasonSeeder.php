<?php

namespace Database\Seeders;

use App\Models\MReason;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MReason::truncate();

        $now = Carbon::now();

        $data = [
            ['name' => '問題なし', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '適性検査問題あり', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '本人辞退', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'ヒューマンスキル未達', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'テクニカルスキル未達', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'その他不安要素あり', 'sort_order' => 6, 'created_at' => $now, 'updated_at' => $now],
        ];

        MReason::insert($data);
    }
}
