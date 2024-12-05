<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserSystemController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\Auth;

//for account monitoring
Route::get('/monitor-accounts', [UserSystemController::class, 'monitorAccountsss'])->name('monitor');
Route::put('/update-role/{id}', [UserSystemController::class, 'updateRole'])->name('update.role');



Route::get('/view_cv/{id}', [CVController::class, 'viewCV'])->name('view_cv_after_creation');

Route::get('/list-of-cvs', [CVController::class, 'index'])->name('list_of_cvs');

Route::get('/create_cv', [UserSystemController::class, 'createCv'])->name('CreateCv');
Route::post('/create_cv', [CVController::class, 'store'])->name('store-cv');

// Registration routes
Route::get('/register', [UserSystemController::class, 'create'])->name('register_user_view');
Route::post('/register', [UserSystemController::class, 'register_users'])->name('register_user');

// Login routes
Route::get('/login', [UserSystemController::class, 'loginForm'])->name('user.loginForm');
Route::post('/login', [UserSystemController::class, 'processLogin'])->name('user.processLogin');
Route::get('/logout', [UserSystemController::class, 'logout'])->name('user.logout');

Route::get('/dashboard', function () {
    $user = session('user');

    // Redirect to login if not logged in
    if (!$user) {
        return redirect()->route('user.loginForm')->withErrors(['login_error' => 'Please login first!']);
    }

   

    return app(\App\Http\Controllers\CVController::class)->dashboard();
})->name('dashboard');


Route::get('/userdashboard', function () {
    $user = session('user');

    // Redirect to login if not logged in
    if (!$user) {
        return redirect()->route('user.loginForm')->withErrors(['login_error' => 'Please login first!']);
    }


    return app(\App\Http\Controllers\CVController::class)->userdashboard();
})->name('userdashboard');




Route::put('/cv/{id}/status', [CVController::class, 'updateStatus'])->name('update_cv_status');


Route::get('/cv/edit/{id}', [CVController::class, 'edit'])->name('edit_cv');
Route::put('/cv/{id}/update', [CVController::class, 'update'])->name('cv.update');


Route::put('/cvs/{id}/assign-link', [CVController::class, 'assignLink'])->name('assign-link');


//for user system--------------

//edit
Route::get('/cv/edituser/{id}', [CVController::class, 'edituser'])->name('edit_cvs');
Route::put('/cv/{id}/updateuser', [CVController::class, 'updateuser'])->name('cv.updates');


//create

Route::get('/create_cv_user', [CVController::class, 'usercreates'])->name('UserCreateCv');
Route::post('/create_cv_user', [CVController::class, 'store_cv_user'])->name('store_cv_user');


//viewcv
Route::get('/viewCVUser/{id}', [CVController::class, 'viewCVUser'])->name('viewCVUser');




// Redirect to login as default
Route::get('/', function () {
    return redirect()->route('user.loginForm');
});









