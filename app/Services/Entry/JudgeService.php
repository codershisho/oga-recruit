<?php

namespace App\Services\Entry;

use App\Http\Resources\JudgeResource;
use App\Models\TEntryPhase;

class JudgeService
{
    /**
     * エントリーIDに紐づくフェーズ情報を返す
     *
     * @param integer $entryId
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function execSearch(int $entryId)
    {
        $data = TEntryPhase::with('phaseRelation')->where('entry_id', $entryId)->get();
        return JudgeResource::collection($data);
    }

    /**
     * エントリーフェーズIDに紐づく情報を更新
     *
     * @param int $entryPhasesId
     * @param array $request
     * @return void
     */
    public function execUpdate(int $entryPhasesId, array $request)
    {
        TEntryPhase::find($entryPhasesId)->update($request);
    }
}
