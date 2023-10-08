<?php

namespace App\Services\Entry;

use App\Http\Resources\EntryResource;
use App\Models\TEntry;

class ShowService
{
    public function execShow($id)
    {
        $data = TEntry::with(['phaseRelation', 'statusRelation', 'sourceRelation'])
            ->where('id', $id)
            ->first();
        return new EntryResource($data);
    }
}
