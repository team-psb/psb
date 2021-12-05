<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AcademyYearController;
use App\Http\Controllers\Admin\QnaController;
use App\Http\Controllers\Admin\SchduleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestIqController;
use App\Http\Controllers\Admin\TestPersonalController;
use App\Http\Controllers\Admin\BiodataController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ScoreController;
use App\Http\Controllers\Admin\PassController;
use App\Http\Controllers\Admin\InterviewController;
use App\Http\Controllers\Admin\VideoController as AdminVideoController;
use App\Http\Controllers\Exam\TestController;
use App\Http\Controllers\Exam\VideoController;
use App\Http\Controllers\Exam\BiodataOneController;
use App\Http\Controllers\Exam\BiodataTwoController;
use App\Http\Controllers\User\UserDashboardController;

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
})->name('home');

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'register']], function(){
    Route::get('home', [UserDashboardController::class, 'index'])->name('user-dashboard');
    
    Route::get('profile', function () {
        return view('front.pages.profile.index');
    })->name('user-profile');
    
    Route::get('qna', function () {
        return view('front.pages.qna.index');
    })->name('user-qna');
    
    Route::get('informasi', function () {
        return view('front.pages.information.index');
    })->name('user-informasi');
    
    Route::get('success', function () {
        return view('screens.success');
    })->name('success');
    
    Route::get('tes/tahap-pertama', [BiodataTwoController::class, 'index'])->name('user-first-tes');
    Route::post('tes/tahap-pertama/store', [BiodataTwoController::class, 'store'])->name('first-tes.store');
    
    Route::get('tes/tahap-kedua', function () {
        return view('front.pages.tesIq.index');
    })->name('user-second-tes');
    
    Route::get('tes/tahap-ketiga', function () {
        return view('exam.pages.tesPersonality.index');
    })->name('user-third-tes');
    
    Route::get('tes/tahap-keempat', function () {
        return view('exam.pages.video.index');
    })->name('user-fourth-tes');
    
    Route::get('/tes/tahap-kelima', function () {
        return view('exam.pages.wawancara.index');
    })->name('user-fifth-tes');
});

// Auth
Route::group(['prefix' => ''], function () {
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/login-proses',[AuthController::class,'loginProses'])->name('login-proses');
    Route::get('/register',[AuthController::class,'register'])->name('register');
    Route::post('/register-proses',[AuthController::class,'registerProses'])->name('register-proses');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    // Route::get('/forget-password', [ForgotPasswordController::class, 'getEmail'])->name('password-getemail');
    // Route::post('/forget-password',[ForgotPasswordController::class, 'postEmail'])->name('pasword-postemail');
    // Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'getPassword'])->name('getPassword');
    // Route::post('/reset-password', [ForgotPasswordController::class, 'updatePassword'])->name('update-password');
});

// Process selection
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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('biodatas', [BiodataController::class, 'index'])->name('biodatas.index');
    Route::get('biodatas/{id}', [BiodataController::class, 'show'])->name('biodatas.show');
    Route::get('biodatas/edit/{id}', [BiodataController::class, 'edit'])->name('biodatas.edit');
    Route::post('biodatas/edit/{id}', [BiodataController::class, 'update'])->name('biodatas.update');
    Route::post('biodatas/delete/{id}', [BiodataController::class, 'delete'])->name('biodatas.delete');
    Route::post('biodatas/delete', [BiodataController::class, 'deleteAll'])->name('biodatas.deleteAll');
    Route::post('biodatas/pass/all', [BiodataController::class, 'passAll'])->name('biodatas.passAll');
    Route::post('biodatas/nonpass/all', [BiodataController::class, 'nonpassAll'])->name('biodatas.nonpassAll');
    
    Route::get('scores', [ScoreController::class, 'index'])->name('scores.index');
    Route::post('scores/delete/{id}', [ScoreController::class, 'delete'])->name('scores.delete');
    Route::post('scores/delete', [ScoreController::class, 'deleteAll'])->name('scores.deleteAll');
    Route::post('scores/pass/all', [ScoreController::class, 'passAll'])->name('scores.passAll');
    Route::post('scores/nonpass/all', [ScoreController::class, 'nonpassAll'])->name('scores.nonpassAll');
    
    Route::get('videos', [AdminVideoController::class, 'index'])->name('videos.index');
    Route::post('videos/delete/{id}', [AdminVideoController::class, 'delete'])->name('videos.delete');
    Route::post('videos/delete', [AdminVideoController::class, 'deleteAll'])->name('videos.deleteAll');
    Route::post('videos/pass/all', [AdminVideoController::class, 'passAll'])->name('videos.passAll');
    Route::post('videos/nonpass/all', [AdminVideoController::class, 'nonpassAll'])->name('videos.nonpassAll');
    
    Route::get('interviews', [InterviewController::class, 'index'])->name('interviews.index');
    Route::post('interviews/delete/{id}', [InterviewController::class, 'delete'])->name('interviews.delete');
    Route::post('interviews/delete', [InterviewController::class, 'deleteAll'])->name('interviews.deleteAll');
    Route::post('interviews/pass/all', [InterviewController::class, 'passAll'])->name('interviews.passAll');
    Route::post('interviews/nonpass/all', [InterviewController::class, 'nonpassAll'])->name('interviews.nonpassAll');
    
    Route::get('passes', [PassController::class, 'index'])->name('passes.index');
    Route::post('passes/delete/{id}', [PassController::class, 'delete'])->name('passes.delete');
    Route::post('passes/delete', [PassController::class, 'deleteAll'])->name('passes.deleteAll');
    
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