<?php

namespace App\Services\Entry;

use App\Models\TEntry;
use App\Models\TEntryPhase;
use Illuminate\Support\Facades\DB;

class StoreService
{
    public function execStore(array $request)
    {
        try {
            DB::beginTransaction();

            $m = TEntry::create($request);

            TEntryPhase::create([
                "entry_id" => $m->id,
                "phase_id" => $request['phase_id'],
                "status_id" => $request['status_id'],
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
