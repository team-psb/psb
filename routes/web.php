<?php

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

Route::get('/personality', function () {
    return view('admin.pages.questionPersonal.index');
});

Route::get('/academy-years', function () {
    return view('admin.pages.academyYear.index');
});

Route::get('/qna', function () {
    return view('admin.pages.qna.index');
});

// john
Route::get('/registrant', function () {
    return view('admin.pages.registration.index');
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