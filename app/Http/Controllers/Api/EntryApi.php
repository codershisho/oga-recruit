<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Entry\IndexService;
use Illuminate\Http\Request;

class EntryApi extends Controller
{
    public function index(IndexService $service)
    {
        $data = $service->execIndex();
        return response()->json($data);
    }
}
