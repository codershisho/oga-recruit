<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Entry\IndexService;
use App\Services\Entry\ShowService;
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
}
