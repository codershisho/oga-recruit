<?php

namespace Database\Seeders;

use App\Models\MPosition;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MPosition::truncate();

        $now = Carbon::now();

        $data = [
            ['name' => '【本社】WEBショップ企画・運営（サプリ）', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【本社】WEBショップ企画・運営（コスメ）', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【本社】WEBショップ企画・運営（食品・雑貨）', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【本社】WEBショップ企画・運営（食品・雑貨）リーダー候補', 'sort_order' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【本社】WEBデザイナー', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【本社】システムエンジニア', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【本社】コンシェルジュ（サプリ・コスメ）', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【本社】コンシェルジュ（食品・雑貨）', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【本社】事務（経理労務）', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【本社】情報管理', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【本社】SNSマーケティング（食品・雑貨）', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【本社】採用育成', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【国分】商品製造発送（サプリ・コスメ）', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【加治木】PB商品開発', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【加治木】商品製造発送（食品・雑貨）', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【鹿児島】WEBショップ企画・運営（サプリ）', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【鹿児島】WEBショップ企画・運営（食品・雑貨）', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【鹿児島】PB商品開発', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【鹿児島】システムエンジニア', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【鹿児島】飲食店店長', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【東京】WEBショップ企画・運営（食品・雑貨）', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '【東京】ECソリューション事業', 'sort_order' => 5, 'created_at' => $now, 'updated_at' => $now],
        ];

        MPosition::insert($data);
    }
}
