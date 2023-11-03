<?php

namespace App\Services\Entry;

use App\Http\Resources\EntryResource;
use App\Models\TEntry;

class IndexService
{
    public function execIndex(array $request)
    {
        $data = TEntry::with(['phaseRelation', 'statusRelation', 'sourceRelation'])->get();

        // フェーズIDがあれば絞り込む
        if (!empty($request)) {
            $data = $data->where('phase_id', $request['phase_id']);
        }

        return EntryResource::collection($data);
    }
}
