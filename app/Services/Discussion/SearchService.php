<?php

namespace App\Services\Discussion;

use App\Http\Resources\DiscusssionResource;
use App\Models\TEntryDiscussion;
use Illuminate\Support\Facades\Auth;

class SearchService
{
    public function execSearch($entryId)
    {
        $data = TEntryDiscussion::with(['userRelation'])
            ->where('entry_id', $entryId)
            ->orderBy('created_at', 'asc')
            ->get();

        return DiscusssionResource::collection($data);
    }
}
