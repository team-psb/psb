<?php

use App\Http\Controllers\Admin\AcademyYearController;
use App\Http\Controllers\Admin\BiodataController;
use App\Http\Controllers\Admin\InterviewController;
use App\Http\Controllers\Admin\PassController;
use App\Http\Controllers\Admin\QnaController;
use App\Http\Controllers\Admin\SchduleController;
use App\Http\Controllers\Admin\ScoreController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestIqController;
use App\Http\Controllers\Admin\TestPersonalController;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Exam\BiodataOneController;
use App\Http\Controllers\Exam\BiodataTwoController;
use App\Http\Controllers\Exam\TestController;
use App\Http\Controllers\Exam\VideoController;

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
    return view('landingpage_2.BizLand.index');
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
Route::group(['prefix' => 'user','middleware'=>['auth','register']],function () {
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

// process selection
Route::group(['prefix' => 'test','middleware'=>['auth','register']], function () {
    Route::get('/step-one',[BiodataOneController::class,'index'])->name('step-one');
    Route::post('/step-one',[BiodataOneController::class,'store'])->name('step-one-store');
    Route::get('/step-two',[BiodataTwoController::class,'index'])->name('step-two');
    Route::post('/step-two',[BiodataTwoController::class,'store'])->name('step-two-store');
    Route::get('/step-tree/test-iq',[TestController::class,'iq'])->name('step-tree-iq');
    Route::post('/step-tree/test-iq',[TestController::class,'iqstore'])->name('iq-store');
    Route::get('/step-tree/test-personal',[TestController::class,'personal'])->name('step-tree-personal');
    Route::post('/step-tree/test-personal',[TestController::class,'personalstore'])->name('personal-store');
    Route::get('/step-four/link-video',[VideoController::class,'video'])->name('step-four-video');
    Route::post('/step-four/link-video',[VideoController::class,'videostore'])->name('step-four-video.store');
    Route::get('/step-five/interview',[VideoController::class,'interview'])->name('step-five-interview');
});

//Admin
Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::get('biodatas', [BiodataController::class, 'index'])->name('biodata.index');
    Route::get('biodatas/{id}', [BiodataController::class, 'show'])->name('biodata.show');
    Route::get('biodatas/edit/{id}', [BiodataController::class, 'edit'])->name('biodata.edit');
    Route::post('biodatas/edit/{id}', [BiodataController::class, 'update'])->name('biodata.update');
    Route::post('biodatas/delete/{id}', [BiodataController::class, 'delete'])->name('biodata.delete');
    Route::post('biodatas/delete', [BiodataController::class, 'deleteAll'])->name('biodata.deleteAll');
    Route::post('biodatas/pass/all', [BiodataController::class, 'passAll'])->name('biodata.passAll');
    Route::post('biodatas/nonpass/all', [BiodataController::class, 'nonpassAll'])->name('biodata.nonpassAll');
    
    Route::get('scores', [ScoreController::class, 'index'])->name('scores.index');
    Route::post('scores/delete/{id}', [ScoreController::class, 'delete'])->name('score.delete');
    Route::post('scores/delete', [ScoreController::class, 'deleteAll'])->name('score.deleteAll');
    Route::post('scores/pass/all', [ScoreController::class, 'passAll'])->name('score.passAll');
    Route::post('scores/nonpass/all', [ScoreController::class, 'nonpassAll'])->name('score.nonpassAll');
    
    Route::get('videos', [VideoController::class, 'index'])->name('videos.index');
    
    Route::get('interviews', [InterviewController::class, 'index'])->name('interviews.index');
    
    Route::get('passes', [PassController::class, 'index'])->name('passes.index');
    
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
