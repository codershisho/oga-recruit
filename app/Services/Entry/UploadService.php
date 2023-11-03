<?php

namespace App\Services\Entry;

use App\Models\TEntryDoc;
use Illuminate\Support\Facades\DB;

class UploadService
{
    public function execSearchDocs(int $entryId)
    {
        $data = TEntryDoc::where('entry_id', $entryId)->first();
        return $data;
    }
}
