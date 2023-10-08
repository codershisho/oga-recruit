<?php

namespace App\Services\Entry;

use App\Http\Resources\WatcherResource;
use App\Models\TEntryWatcher;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class WatchersService
{
    /**
     * watcherの一覧検索
     *
     * @param [type] $entryId
     * @return void
     */
    public function execIndex($entryId)
    {
        $data = User::with([
            'watchersRelation' => function ($q) use ($entryId) {
                $q->where('entry_id', $entryId);
            }
        ])
            ->get();

        // return $data;
        return WatcherResource::collection($data);
    }

    /**
     * watcherの状況を更新
     *
     * @param [type] $entryId
     * @param [type] $userId
     * @return void
     */
    public function execUpd($entryId, $userId)
    {
        try {
            DB::beginTransaction();

            $data = TEntryWatcher::withTrashed()
                ->where('entry_id', $entryId)
                ->where('user_id', $userId)
                ->first();

            if (empty($data)) {
                // create
                TEntryWatcher::create([
                    'entry_id' => $entryId,
                    'user_id' => $userId,
                ]);
            } else if ($data->trashed()) {
                // restore
                $data->restore();
            } else {
                // delete
                $data->delete();
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
