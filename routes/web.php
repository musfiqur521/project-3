<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\PropertyTypeController;





// Route::get('/', function () {
//     return view('welcome');
// });

//User Frontend All Routes
Route::get('/', [UserController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
 
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');

    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');

});

require __DIR__.'/auth.php';

// Middleware Start ----------------------------------------------------------------
//Admin Group Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
   
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
   
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    
    Route::get('/admin/chenge/password', [AdminController::class, 'AdminChengePassword'])->name('admin.chenge.password');

    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');




}); // End Admin Group Middleware

//Agent Group Middleware
Route::middleware(['auth', 'role:agent'])->group(function (){

    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');

}); // End Agent group Middleware


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');





//Admin Group Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
   
    /// Property Type All Routes
Route::controller(PropertyTypeController::class)->group(function(){

    Route::get('/all/type','AllType')->name('all.type');

});



}); // End Admin Group Middleware

