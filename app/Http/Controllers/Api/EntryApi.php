<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TEntryDoc;
use App\Services\Entry\IndexService;
use App\Services\Entry\ShowService;
use App\Services\Entry\WatchersService;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntryApi extends Controller
{
    public function index(IndexService $service)
    {
        $data = $service->execIndex();
        return response()->json($data);
    }

    public function show($id, ShowService $service)
    {
        $data = $service->execShow($id);
        return response()->json($data);
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

        if (!empty($resumeFile)) {
            $resumeFilePath = $resumeFile->storeAs($path, 'resume.pdf', 'public');
        }

        if (!empty($cvFile)) {
            $cvFilePath = $cvFile->storeAs($path, 'cv.pdf', 'public');
        }

        try {
            DB::beginTransaction();

            TEntryDoc::upsert([
                ['entry_id' => $id, 'resume_path' => $resumeFilePath, 'cv_path' => $cvFilePath]
            ], ['entry_id'], ['resume_path', 'cv_path']);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return response()->json();
    }
}
