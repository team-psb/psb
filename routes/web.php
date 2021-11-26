<?php

use App\Http\Controllers\Admin\AcademyYearController;
use App\Http\Controllers\Admin\QnaController;
use App\Http\Controllers\Admin\SchduleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestIqController;
use App\Http\Controllers\Admin\TestPersonalController;
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

Route::get('/', function () {
    return view('admin.index');
});


Route::get('/registrant', function () {
    return view('admin.pages.biodata.index');
});

Route::get('/scores', function () {
    return view('admin.pages.score.index');
});

Route::get('/videos', function () {
    return view('admin.pages.video.index');
});

Route::get('/interviews', function () {
    return view('admin.pages.interview.index');
});

Route::get('/passes', function () {
    return view('admin.pages.pass.index');
});


Route::resource('iqs', TestIqController::class);

Route::resource('personals', TestPersonalController::class);

Route::resource('qna', QnaController::class);

Route::resource('schdules', SchduleController::class);

Route::resource('academies', AcademyYearController::class);
Route::get('academies/{id}/set-status', [AcademyYearController::class, 'setStatus'])->name('academies.status');


Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');