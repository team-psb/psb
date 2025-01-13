<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AcademyYearController;
use App\Http\Controllers\Admin\AdminController;
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
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\ScoreIqController;
use App\Http\Controllers\Admin\ScorePersonalController;
use App\Http\Controllers\Admin\VideoController as AdminVideoController;
use App\Http\Controllers\Exam\TestController;
use App\Http\Controllers\Exam\VideoController;
use App\Http\Controllers\Exam\BiodataOneController;
use App\Http\Controllers\Exam\BiodataTwoController;
use App\Http\Controllers\Exam\TesIqController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Exam\TesPersonalController;
use App\Http\Controllers\LandingController;

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

// Login dan Registrasi Halaman Page Sendiri
// Route::get('/masuk', function () {
//     return view('auth.login');
// })->name('login');
// Route::get('/daftar', function () {
//     return view('auth.register');
// })->name('register');


//landingpage
Route::group(['prefix' => '', 'middleware' => ['guest']], function () {
    Route::get('/', [LandingController::class, 'index'])->name('home');
    Route::get('/informasi-penerimaan-santri-baru/{id}', [LandingController::class, 'information'])->name('information');
});

//user
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'register']], function(){
    Route::get('home', [UserDashboardController::class, 'index'])->name('user-dashboard');

    Route::get('profile', [UserDashboardController::class, 'profile'])->name('user-profile');

    Route::get('qna', [UserDashboardController::class, 'qna'])->name('user-qna');

    Route::get('informasi', [UserDashboardController::class, 'information'])->name('user-informasi');
    Route::get('informasi-penerimaan-santri-baru/{id}', [UserDashboardController::class, 'information_detail'])->name('user-informasi-detail');

    Route::get('success', function () {
        return view('screens.success');
    })->name('success');

    Route::get('tes/tahap-pertama', [BiodataTwoController::class, 'index'])->name('user-first-tes');
    Route::post('tes/tahap-pertama/store', [BiodataTwoController::class, 'store'])->name('first-tes.store');
    Route::post('tes/tahap-pertama/clone', [BiodataTwoController::class, 'clone'])->name('first-tes.clone');

    Route::get('tes/tahap-kedua', [TesIqController::class, 'iq'])->name('user-second-tes');
    Route::post('tes/tahap-kedua-store', [TesIqController::class, 'iqStore'])->name('second-tes.store');

    Route::get('tes/tahap-ketiga', [TesPersonalController::class, 'personal'])->name('user-third-tes');
    Route::post('tes/tahap-ketiga-store', [TesPersonalController::class, 'personalStore'])->name('third-tes.store');

    Route::get('tes/tahap-keempat', [VideoController::class, 'index'])->name('user-fourth-tes');
    Route::post('tes/tahap-keempat-store', [VideoController::class, 'videoStore'])->name('fourth-tes.store');

    Route::get('tes/tahap-kelima', function () {
        return view('front.pages.interview.index');
    })->name('user-fifth-tes');
});

// Auth
Route::group(['prefix' => ''], function () {
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/login-proses',[AuthController::class,'loginProses'])->name('login-proses');
    Route::get('/register',[AuthController::class,'register'])->name('register');
    Route::post('/register-proses',[AuthController::class,'registerProses'])->name('register-proses');
    Route::get('/token/{wa}', [AuthController::class, 'getToken'])->name('get-token');
    Route::post('/token/{wa}', [AuthController::class, 'postToken'])->name('post-token');
    Route::get('/token-resend/{wa}', [AuthController::class, 'resendToken'])->name('resend-token');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'getWhatsapp'])->name('password-getwhatsapp');
    Route::post('/forgot-password',[ForgotPasswordController::class, 'postWhatsapp'])->name('pasword-postwhatsapp');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'getPassword'])->name('getPassword');
    Route::post('/reset-password', [ForgotPasswordController::class, 'updatePassword'])->name('update-password');
});


//Admin
Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/biodatas', [BiodataController::class, 'index'])->name('biodatas.index');
    Route::get('/biodatas/{id}', [BiodataController::class, 'show'])->name('biodatas.show');
    Route::get('/biodatas/{id}/set-status', [BiodataController::class, 'setStatus'])->name('biodatas.status');
    Route::get('/biodatas/{id}/edit', [BiodataController::class, 'edit'])->name('biodatas.edit');
    Route::post('/biodatas/{id}/edit', [BiodataController::class, 'update'])->name('biodatas.update');
    Route::post('/biodatas/delete/{id}', [BiodataController::class, 'delete'])->name('biodatas.delete');
    Route::post('/biodatas/delete', [BiodataController::class, 'deleteAll'])->name('biodatas.deleteAll');
    Route::post('/biodatas/pass/all', [BiodataController::class, 'passAll'])->name('biodatas.passAll');
    Route::post('/biodatas/nonpass/all', [BiodataController::class, 'nonpassAll'])->name('biodatas.nonpassAll');
    Route::get('/biodatas/filter/reset', [BiodataController::class, 'filterreset'])->name('biodatas.filter-reset');
    Route::get('/biodatas/export/data', [BiodataController::class, 'export'])->name('biodatas.export');

    Route::get('/registers', [RegisterController::class, 'index'])->name('registers.index');
    Route::get('/registers/{id}', [RegisterController::class, 'show'])->name('registers.show');
    // Route::get('/registers/{id}/set-status', [RegisterController::class, 'setStatus'])->name('registers.status');
    Route::get('/registers/{id}/edit', [RegisterController::class, 'edit'])->name('registers.edit');
    Route::post('/registers/{id}/biodata-one', [RegisterController::class, 'update'])->name('registers.update');
    Route::post('/registers/{id}/biodata-two', [RegisterController::class, 'updateTwo'])->name('registers.updateTwo');
    Route::post('/registers/delete/{id}', [RegisterController::class, 'delete'])->name('registers.delete');
    Route::post('/registers/delete', [RegisterController::class, 'deleteAll'])->name('registers.deleteAll');
    // Route::post('/registers/pass/all', [RegisterController::class, 'passAll'])->name('registers.passAll');
    // Route::post('/registers/nonpass/all', [RegisterController::class, 'nonpassAll'])->name('registers.nonpassAll');
    // Route::get('/registers/filter/reset', [RegisterController::class, 'filterreset'])->name('registers.filter-reset');
    Route::get('/registers/export/data', [RegisterController::class, 'export'])->name('registers.export');

    Route::get('/scores', [ScoreController::class, 'index'])->name('scores.index');
    Route::get('/scores/{id}/set-status', [ScoreController::class, 'setStatus'])->name('scores.status');
    Route::post('/scores/delete', [ScoreController::class, 'deleteAll'])->name('scores.deleteAll');
    Route::post('/scores/delete/{id}', [ScoreController::class, 'delete'])->name('scores.delete');
    Route::post('/scores/pass/all', [ScoreController::class, 'passAll'])->name('scores.passAll');
    Route::post('/scores/nonpass/all', [ScoreController::class, 'nonpassAll'])->name('scores.nonpassAll');
    Route::get('/scores/filter/reset', [ScoreController::class, 'filterreset'])->name('scores.filter-reset');
    Route::get('/scores/export', [ScoreController::class, 'export'])->name('scores.export');

    Route::get('/scoreIq', [ScoreIqController::class, 'index'])->name('scoreIq.index');
    Route::get('/scoreIq/{id}/question-answers', [ScoreIqController::class, 'answer'])->name('scoreIq.answer');
    Route::get('/scoreIq/{id}/set-status', [ScoreIqController::class, 'setStatus'])->name('scoreIq.status');
    Route::post('/scoreIq/delete', [ScoreIqController::class, 'deleteAll'])->name('scoreIq.deleteAll');
    Route::post('/scoreIq/delete/{id}', [ScoreIqController::class, 'delete'])->name('scoreIq.delete');
    Route::post('/scoreIq/pass/all', [ScoreIqController::class, 'passAll'])->name('scoreIq.passAll');
    Route::post('/scoreIq/nonpass/all', [ScoreIqController::class, 'nonpassAll'])->name('scoreIq.nonpassAll');
    Route::get('/scoreIq/filter/reset', [ScoreIqController::class, 'filterreset'])->name('scoreIq.filter-reset');
    Route::get('/scoreIq/export', [ScoreIqController::class, 'export'])->name('scoreIq.export');

    Route::get('/scorePersonal', [ScorePersonalController::class, 'index'])->name('scorePersonal.index');
    Route::get('/scorePersonal/{id}/question-answers', [ScorePersonalController::class, 'answer'])->name('scorePersonal.answer');
    Route::get('/scorePersonal/{id}/set-status', [ScorePersonalController::class, 'setStatus'])->name('scorePersonal.status');
    Route::post('/scorePersonal/delete', [ScorePersonalController::class, 'deleteAll'])->name('scorePersonal.deleteAll');
    Route::post('/scorePersonal/delete/{id}', [ScorePersonalController::class, 'delete'])->name('scorePersonal.delete');
    Route::post('/scorePersonal/pass/all', [ScorePersonalController::class, 'passAll'])->name('scorePersonal.passAll');
    Route::post('/scorePersonal/nonpass/all', [ScorePersonalController::class, 'nonpassAll'])->name('scorePersonal.nonpassAll');
    Route::get('/scorePersonal/filter/reset', [ScorePersonalController::class, 'filterreset'])->name('scorePersonal.filter-reset');
    Route::get('/scorePersonal/export', [ScorePersonalController::class, 'export'])->name('scorePersonal.export');

    Route::get('/videos', [AdminVideoController::class, 'index'])->name('videos.index');
    // Route::get('videos/{id}/set-status', [AdminVideoController::class, 'setStatus'])->name('videos.status');
    Route::post('/videos/lolos/{id}',[AdminVideoController::class,'lolos'])->name('videos.lolos');
    Route::post('/videos/tidak-lolos/{id}',[AdminVideoController::class,'tidaklolos'])->name('videos.tidak-lolos');
    Route::post('/videos/delete', [AdminVideoController::class, 'deleteAll'])->name('videos.deleteAll');
    Route::post('/videos/delete/{id}', [AdminVideoController::class, 'delete'])->name('videos.delete');
    Route::post('/videos/pass/all', [AdminVideoController::class, 'passAll'])->name('videos.passAll');
    Route::post('/videos/nonpass/all', [AdminVideoController::class, 'nonpassAll'])->name('videos.nonpassAll');
    Route::get('/videos/filter/reset', [AdminVideoController::class, 'filterreset'])->name('videos.filter-reset');
    Route::get('/videos/export', [AdminVideoController::class, 'export'])->name('videos.export');


    Route::get('/interviews', [InterviewController::class, 'index'])->name('interviews.index');
    Route::get('/interviews/{id}/set-status', [InterviewController::class, 'setStatus'])->name('interviews.status');
    Route::post('/interviews/delete/{id}', [InterviewController::class, 'delete'])->name('interviews.delete');
    Route::post('/interviews/delete', [InterviewController::class, 'deleteAll'])->name('interviews.deleteAll');
    Route::post('/interviews/pass/all', [InterviewController::class, 'passAll'])->name('interviews.passAll');
    Route::post('/interviews/nonpass/all', [InterviewController::class, 'nonpassAll'])->name('interviews.nonpassAll');
    Route::get('/interviews/filter/reset', [InterviewController::class, 'filterreset'])->name('interviews.filter-reset');
    Route::get('/interviews/export', [InterviewController::class, 'export'])->name('interviews.export');


    Route::get('/passes', [PassController::class, 'index'])->name('passes.index');
    Route::get('/passes/{id}', [PassController::class, 'show'])->name('passes.show');
    Route::post('/passes/delete', [PassController::class, 'deleteAll'])->name('passes.deleteAll');
    Route::post('/passes/delete/{id}', [PassController::class, 'delete'])->name('passes.delete');
    Route::get('/passes/filter/reset', [PassController::class, 'filterreset'])->name('passes.filter-reset');
    Route::get('/passes/export/data', [PassController::class, 'export'])->name('passes.export');


    Route::resource('/iqs', TestIqController::class);
    Route::get('/iqs/make/questioniq', [TestIqController::class, 'questionCreate'])->name('iqs.questionCreate');
    Route::post('/iqs/delete/{id}', [TestIqController::class, 'destroy'])->name('iqs.delete');
    Route::post('/iqs/delete', [TestIqController::class, 'deleteAll'])->name('iqs.deleteAll');
    Route::post('/iqs/import', [TestIqController::class, 'import'])->name('iqs.import');
    Route::get('/iqs/template/download', [TestIqController::class, 'downloadtemplate'])->name('iqs.template');

    Route::resource('/personals', TestPersonalController::class);
    Route::get('/personals/make/questionpersonal', [TestPersonalController::class, 'questionCreate'])->name('personals.questionCreate');
    Route::post('/personals/delete/{id}', [TestPersonalController::class, 'destroy'])->name('personals.delete');
    Route::post('/personals/delete', [TestPersonalController::class, 'deleteAll'])->name('personals.deleteAll');
    Route::post('/personals/import', [TestPersonalController::class, 'import'])->name('personals.import');
    Route::get('/personals/template/download', [TestPersonalController::class, 'downloadtemplate'])->name('personals.template');

    Route::resource('qna', QnaController::class);
    Route::get('qna/make/qna', [QnaController::class, 'createPage'])->name('qna.make');
    Route::post('qna/delete/{id}', [QnaController::class, 'destroy'])->name('qna.delete');
    Route::post('qna/delete', [QnaController::class, 'deleteAll'])->name('qna.deleteAll');

    Route::resource('schdules', SchduleController::class);
    Route::get('schdules/make/schdule', [SchduleController::class, 'create'])->name('schdules.make');
    Route::post('schdules/delete/{id}', [SchduleController::class, 'destroy'])->name('schdules.delete');
    Route::post('schdules/delete', [SchduleController::class, 'deleteAll'])->name('schdules.deleteAll');

    Route::resource('academies', AcademyYearController::class);
    Route::get('academies/{id}/set-status', [AcademyYearController::class, 'setStatus'])->name('academies.status');
    Route::post('academies/delete/{id}', [AcademyYearController::class, 'destroy'])->name('academies.delete');
    Route::post('academies/delete', [AcademyYearController::class, 'deleteAll'])->name('academies.allDelete');
    Route::post('academies/active/all', [AcademyYearController::class, 'activeAll'])->name('academies.activeAll');
    Route::post('academies/nonActive/all', [AcademyYearController::class, 'nonActiveAll'])->name('academies.nonActiveAll');


    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings/stage', [SettingController::class, 'stageStore'])->name('settings.stage-store');
    Route::post('/settings/iq', [SettingController::class, 'iqValue'])->name('settings.iq-value');
    Route::post('/settings/personal', [SettingController::class, 'personalValue'])->name('settings.personal-value');
    Route::post('/settings/announcement', [SettingController::class, 'announcValue'])->name('settings.announcement');
    Route::post('/settings/no-message', [SettingController::class, 'noMessage'])->name('settings.no-message');
    Route::post('/settings/biodata-pass', [SettingController::class, 'biodataPass'])->name('settings.biodata-pass');
    Route::post('/settings/biodata-pass-sm', [SettingController::class, 'biodataPassSm'])->name('settings.biodata-pass-sm');
    Route::post('/settings/biodata-failed', [SettingController::class, 'biodataFailed'])->name('settings.biodata-failed');
    Route::post('/settings/iq-pass', [SettingController::class, 'iqPass'])->name('settings.iq-pass');
    Route::post('/settings/iq-failed', [SettingController::class, 'iqFailed'])->name('settings.iq-failed');
    Route::post('/settings/personal-pass', [SettingController::class, 'personalPass'])->name('settings.personal-pass');
    Route::post('/settings/personal-failed', [SettingController::class, 'personalFailed'])->name('settings.personal-failed');
    Route::post('/settings/video-pass', [SettingController::class, 'videoPass'])->name('settings.video-pass');
    Route::post('/settings/video-failed', [SettingController::class, 'videoFailed'])->name('settings.video-failed');
    Route::post('/settings/interview-pass', [SettingController::class, 'interviewPass'])->name('settings.interview-pass');
    Route::post('/settings/student-pass', [SettingController::class, 'studentPass'])->name('settings.student-pass');
    Route::post('/settings/student-failed', [SettingController::class, 'studentFailed'])->name('settings.student-failed');
    Route::post('/settings/complete-tahap1', [SettingController::class, 'completeTahap1'])->name('settings.complete-tahap1');
    Route::post('/settings/complete-tahap1-sm', [SettingController::class, 'completeTahap1Sm'])->name('settings.complete-tahap1-sm');
    Route::post('/settings/complete-tahap2', [SettingController::class, 'completeTahap2'])->name('settings.complete-tahap2');
    Route::post('/settings/complete-tahap3', [SettingController::class, 'completeTahap3'])->name('settings.complete-tahap3');
    Route::post('/settings/complete-tahap4', [SettingController::class, 'completeTahap4'])->name('settings.complete-tahap4');

    Route::get('/settings/stage/{id}', [SettingController::class, 'stageEdit'])->name('settings.stage-edit');
    Route::post('/settings/stage/{id}', [SettingController::class, 'stageUpdate'])->name('settings.stage-update');
    Route::delete('/settings/stage/{id}', [SettingController::class, 'stageDelete'])->name('settings.stage-delete');

    Route::get('account', [AdminController::class, 'index'])->name('admins.index');
    Route::get('account/{id}/edit', [AdminController::class, 'edit'])->name('admins.edit');
    Route::post('account/{id}', [AdminController::class, 'update'])->name('admins.update');
});