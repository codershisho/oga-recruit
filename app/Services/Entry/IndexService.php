<?php

namespace App\Services\Entry;

use App\Http\Resources\EntryResource;
use App\Models\TEntry;

class IndexService
{
    public function execIndex()
    {
        $data = TEntry::with(['phaseRelation', 'statusRelation', 'sourceRelation'])->get();
        return EntryResource::collection($data);
    }
}
