<?php

namespace App\Services\Entry;

use App\Models\TEntry;
use App\Models\TEntryPhase;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UpdateService
{
    public function execUpdate(int $id, array $request)
    {
        try {
            DB::beginTransaction();

            TEntry::find($id)->update($request);

            $data = [
                'entry_id' => $request['id'],
                'phase_id' => $request['phase_id'],
                'next_action_day' => $request['next_action_day'] ?? Carbon::now(),
                'message' => $request['message'] ?? '',
            ];

            TEntryPhase::where('entry_id', $request['id'])
                ->where('phase_id', $request['phase_id'])
                ->update($data);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
