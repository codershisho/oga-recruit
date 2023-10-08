<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Models\MPhase;
use App\Models\MPosition;
use App\Models\MSource;
use App\Models\MStatus;
use Illuminate\Support\Arr;

class MasterFactory
{
    private static array $models = [
        "m_phases" => MPhase::class,
        "m_positions" => MPosition::class,
        "m_sources" => MSource::class,
        "m_statuses" => MStatus::class
    ];

    public static function createModel(array $request): Model
    {
        $table = $request['table'];
        $model = Arr::get(self::$models, $table);
        return new $model();
    }
}
