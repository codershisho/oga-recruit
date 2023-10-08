<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Entry\IndexService;
use App\Services\Entry\ShowService;
use App\Services\Entry\WatchersService;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;

class EntryApi extends Controller
{
    public function index(IndexService $service)
    {
        $data = $service->execIndex();
        return response()->json($data);
    }

    public function show($id, ShowService $service)
    {
        $data = $service->execShow($id);
        return response()->json($data);
    }

    /**
     * ウォッチャー一覧を返す
     *
     * @return void
     */
    public function wathcers($id, WatchersService $service)
    {
        $data = $service->execIndex($id);
        return response()->json($data);
    }

    /**
     * ウォッチャーの更新
     *
     * @param integer $id
     * @param integer $userId
     * @param WatchersService $service
     * @return void
     */
    public function wathcersUpd(int $id, int $userId, WatchersService $service)
    {
        $service->execUpd($id, $userId);
        return response()->json();
    }
}
