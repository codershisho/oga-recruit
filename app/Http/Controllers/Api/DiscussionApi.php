<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Discussion\SearchService;
use App\Services\Discussion\StoreService;
use Illuminate\Http\Request;

class DiscussionApi extends Controller
{
    public function search($id, Request $request, SearchService $service)
    {
        $data = $service->execSearch($id);
        return response()->json($data);
    }

    public function store($id, Request $request, StoreService $service)
    {
        $service->execStore($id, $request->all());
        return response()->json();
    }
}
