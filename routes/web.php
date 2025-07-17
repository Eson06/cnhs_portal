<?php

use App\Models\User;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\UserManagement;
use App\Livewire\Admin\ActvityLog;
use App\Livewire\Admin\FormRequest;
use App\Http\Controllers\AuthController;
use App\Livewire\Admin\AnnouncementForm;
use App\Livewire\Admin\ClassMonitoring;
use App\Livewire\Admin\Enrollment;
use App\Livewire\Student\StudentDashboard;
use App\Livewire\Teacher\MyRecord;
use App\Livewire\Teacher\MySubject;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware('guest:web')->group(function(){

    // Route::get('/', function () {
    //     return view('back.pages.auth.login');
    // });

    Route::get('/', function () {
        return view('back.pages.auth.login');
    })->name('login');

    Route::post('/custom-login', [AuthController::class,'customLogin'])->name('custom.login');
});



Route::middleware(['auth:web'],['revalidate'])->group(function() {


    #admin access only
    Route::prefix('admin-panel')->name('admin.')->group(function(){
        Route::get('/user-management', UserManagement::class)->name('user-management');
        Route::get('/activity-log', ActvityLog::class)->name('activity-log');
        Route::get('/form-request', FormRequest::class)->name('form-request');
        Route::get('/class-monitoring', ClassMonitoring::class)->name('class-monitoring');
        Route::get('/announcement-form', AnnouncementForm::class)->name('announcement-form');
        Route::get('/enrollment', Enrollment::class)->name('enrollment');
    });

    Route::prefix('student-panel')->name('student.')->group(function(){
        Route::get('/student-dashboard', StudentDashboard::class)->name('student-dashboard');
    });

    Route::prefix('teacher-panel')->name('teacher.')->group(function(){
        Route::get('/record', MyRecord::class)->name('my-record');
        Route::get('/subject', MySubject::class)->name('my-subject');
    });


    Route::get('/dashboard', Dashboard::class)->name('dashboard');

});