<?php

namespace App\Services\Discussion;

use App\Events\MessageReceived;
use App\Models\TEntryDiscussion;
use App\Models\TEntryWatcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreService
{
    public function execStore(int $entryId, array $request)
    {
        try {
            DB::beginTransaction();

            $userId = Auth::id();
            $userName = Auth::user()->name;

            $m = TEntryDiscussion::create([
                'entry_id' => $entryId,
                'user_id' => $userId,
                'message' => $request['message'],
            ])->toArray();


            DB::commit();

            $m['user_name'] = $userName;
            // $m->put("user_name", $userName);
            // $service = new SearchService();
            // $data = $service->execSearch($entryId);

            event(new MessageReceived($m));
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
