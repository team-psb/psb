<?php

use App\Http\Controllers\Admin\AcademyYearController;
use App\Http\Controllers\Admin\BiodataController;
use App\Http\Controllers\Admin\QnaController;
use App\Http\Controllers\Admin\SchduleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestIqController;
use App\Http\Controllers\Admin\TestPersonalController;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Auth\AuthController;

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
    return view('welcome');
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


// Auth
// Route::get('/', [AuthController::class, 'login'])->name('login');
// Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('auth');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::group(['prefix', ''], function (){
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/login-proses',[AuthController::class,'loginProses'])->name('login-proses');
    Route::get('/register',[AuthController::class,'register'])->name('register');
    Route::post('/register-proses',[AuthController::class,'registerProses'])->name('register-proses');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});

// User
Route::group(['prefix' => '{name} => Auth::user()->name','middleware'=>['auth','register']],function () {
    Route::get('/home', function () {
        return view('front.index');
    })->name('dash-user');
    
    Route::get('/profile', function () {
        return view('front.pages.profile.index');
    });
    
    Route::get('/qna', function () {
        return view('front.pages.qna.index');
    });
    
    Route::get('/information', function () {
        return view('front.pages.information.index');
    });
    
    Route::get('/testiq', function () {
        return view('front.pages.tesIq.index');
    });
});

//Admin
Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::get('biodatas', [BiodataController::class, 'index'])->name('biodata.index');
    
    Route::resource('iqs', TestIqController::class);
    Route::post('iqs/delete/{id}', [TestIqController::class, 'destroy'])->name('iqs.delete');
    Route::post('iqs/delete', [TestIqController::class, 'deleteAll'])->name('iqs.deleteAll');

    Route::resource('personals', TestPersonalController::class);
    Route::post('personals/delete/{id}', [TestPersonalController::class, 'destroy'])->name('personals.delete');
    Route::post('personals/delete', [TestPersonalController::class, 'deleteAll'])->name('personals.deleteAll');

    Route::resource('qna', QnaController::class);
    Route::post('qna/delete/{id}', [QnaController::class, 'destroy'])->name('qna.delete');
    Route::post('qna/delete', [QnaController::class, 'deleteAll'])->name('qna.deleteAll');

    Route::resource('schdules', SchduleController::class);
    Route::post('schdules/delete/{id}', [SchduleController::class, 'destroy'])->name('schdules.delete');
    Route::post('schdules/delete', [SchduleController::class, 'deleteAll'])->name('schdules.deleteAll');

    Route::resource('academies', AcademyYearController::class);
    Route::get('academies/{id}/set-status', [AcademyYearController::class, 'setStatus'])->name('academies.status');
    Route::post('academies/delete/{id}', [AcademyYearController::class, 'destroy'])->name('academies.delete');
    Route::post('academies/delete', [AcademyYearController::class, 'deleteAll'])->name('academies.allDelete');
    Route::post('academies/active/all', [AcademyYearController::class, 'activeAll'])->name('academies.activeAll');
    Route::post('academies/nonActive/all', [AcademyYearController::class, 'nonActiveAll'])->name('academies.nonActiveAll');


    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
});
