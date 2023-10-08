<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\MasterFactory;
use Illuminate\Http\Request;

class MasterApi
{
    public function index(Request $request)
    {
        $model = MasterFactory::createModel($request->all());
        $data = $model->all();
        return response()->json($data);
    }
}
