<?php

use App\Events\MessageReceived;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/ogarec{any}', function () {
    return view('welcome');
})->where('any', '.*');

Route::get('/uploads/pdf/resume/{id}', [PdfController::class, 'showResume'])->name('pdf.show.resume');
Route::get('/uploads/pdf/cv/{id}', [PdfController::class, 'showCv'])->name('pdf.show.cv');
