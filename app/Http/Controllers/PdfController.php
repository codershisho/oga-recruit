<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    /**
     * リダイレクトを用いてPDFを表示する
     *
     * @return redirect|file_url
     */
    public function showResume($id)
    {
        $disk = 'public';
        $storage = Storage::disk($disk);
        $file_name = '/resume.pdf';
        $pdf_path = 'uploads/entry/' . $id . $file_name;
        $file = $storage->get($pdf_path);
        return response($file, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . $file_name . '"');
    }

    public function showCv($id)
    {
        $disk = 'public';
        $storage = Storage::disk($disk);
        $file_name = '/cv.pdf';
        $pdf_path = 'uploads/entry/' . $id . $file_name;
        $file = $storage->get($pdf_path);
        return response($file, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . $file_name . '"');
    }
}
