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

            $watchers = TEntryWatcher::where('entry_id', $entryId)->get();

            $watchers->each(function ($watcher) use ($entryId, $request) {
                TEntryDiscussion::create([
                    'entry_id' => $entryId,
                    'user_id' => $watcher['user_id'],
                    'message' => $request['message'],
                ]);
            });

            DB::commit();

            $service = new SearchService();
            $data = $service->execSearch($entryId);

            event(new MessageReceived($data));
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
