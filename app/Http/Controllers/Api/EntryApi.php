<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TEntryDoc;
use App\Services\Entry\IndexService;
use App\Services\Entry\JudgeService;
use App\Services\Entry\ShowService;
use App\Services\Entry\StoreService;
use App\Services\Entry\UpdateService;
use App\Services\Entry\UploadService;
use App\Services\Entry\WatchersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntryApi extends Controller
{
    /**
     * 一覧検索
     *
     * @param Request $request フェーズIDがあれば絞り込む
     * @param IndexService $service
     * @return void
     */
    public function index(Request $request, IndexService $service)
    {
        $data = $service->execIndex($request->all());
        return response()->json($data);
    }

    public function show(int $id, ShowService $service)
    {
        $data = $service->execShow($id);
        return response()->json($data);
    }

    public function store(Request $request, StoreService $service)
    {
        $service->execStore($request->all());
        return response()->json();
    }

    public function update(int $id, Request $request, UpdateService $service)
    {
        $service->execUpdate($id, $request->all());
        return response()->json();
    }

    /**
     * ウォッチャー一覧を返す
     *
     * @return void
     */
    public function wathcers($id, WatchersService $service)
    {
        $data = $service->execIndex($id);
        return response()->json($data);
    }

    /**
     * ウォッチャーの更新
     *
     * @param integer $id
     * @param integer $userId
     * @param WatchersService $service
     * @return void
     */
    public function wathcersUpd(int $id, int $userId, WatchersService $service)
    {
        $service->execUpd($id, $userId);
        return response()->json();
    }

    /**
     * アップロードされた書類の検索
     *
     * @param [type] $id
     * @return void
     */
    public function uploaded($id, UploadService $service)
    {
        $data = $service->execSearchDocs($id);
        return response()->json($data);
    }

    /**
     * 書類のアップロード
     *
     * @param [type] $id
     * @param Request $request
     * @return void
     */
    public function upload($id, Request $request)
    {
        $resumeFile = $request->resumeFile;
        $cvFile = $request->cvFile;
        $path = '/uploads/entry/' . $id;

        $resumeFilePath = null;
        if (!empty($resumeFile)) {
            $resumeFilePath = $resumeFile->storeAs($path, 'resume.pdf', 'public');
        }

        $cvFilePath = null;
        if (!empty($cvFile)) {
            $cvFilePath = $cvFile->storeAs($path, 'cv.pdf', 'public');
        }

        try {
            DB::beginTransaction();

            // TEntryDoc::upsert([
            //     ['entry_id' => $id, 'resume_path' => $resumeFilePath, 'cv_path' => $cvFilePath]
            // ], ['entry_id'], ['resume_path', 'cv_path']);

            TEntryDoc::updateOrCreate(
                [
                    'entry_id' => $id
                ],
                [
                    'resume_path' => $resumeFilePath,
                    'cv_path' => $cvFilePath,
                ]
            );

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return response()->json();
    }

    /**
     * エントリーIDに紐づく評価情報を返す
     *
     * @param int $id
     * @param JudgeService $service
     * @return void
     */
    public function judges(int $id, JudgeService $service)
    {
        $data = $service->execSearch($id);
        return response()->json($data);
    }

    /**
     * エントリーフェーズIDに紐づく情報を更新
     *
     * @param int $entryPhasesId
     * @param Request $request
     * @param JudgeService $service
     * @return void
     */
    public function updateJudge(int $entryPhasesId, Request $request, JudgeService $service)
    {
        $service->execUpdate($entryPhasesId, $request->all());
        return response()->json();
    }
}
