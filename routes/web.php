<?php

use App\Http\Controllers\Admin\AcademyYearController;
use App\Http\Controllers\Admin\QnaController;
use App\Http\Controllers\Admin\SchduleController;
use App\Http\Controllers\Admin\SettingController;
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
Route::get('/home', function () {
    return view('front.index');
});

Route::get('/', function () {
    return view('admin.index');
});

Route::get('/iq', function () {
    return view('admin.pages.questionIq.index');
});

Route::get('/iq-create', function () {
    return view('admin.pages.questionIq.create');
});

Route::get('/personality', function () {
    return view('admin.pages.questionPersonal.index');
});

Route::get('/personality-create', function () {
    return view('admin.pages.questionPersonal.create');
});

Route::get('/academy-years', function () {
    return view('admin.pages.academyYear.index');
});

// Route::get('/qna', function () {
//     return view('admin.pages.qna.index');
// });

// Route::get('/qna-create', function () {
//     return view('admin.pages.qna.create');
// });

Route::get('/informasi', function () {
    return view('admin.pages.schdule.index');
});

Route::get('/informasi-create', function () {
    return view('admin.pages.schdule.create');
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


Route::resource('qna', QnaController::class);
Route::resource('schdules', SchduleController::class);
Route::resource('academies', AcademyYearController::class);

Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');