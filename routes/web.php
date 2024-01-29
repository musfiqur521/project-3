<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Agent\AgentPropertyController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\PropertyController;
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
    
    Route::get('/agent/logout', [AgentController::class, 'AgentLogout'])->name('agent.logout');
    
    Route::get('/agent/profile', [AgentController::class, 'AgentProfile'])->name('agent.profile');
    
    Route::post('/agent/profile/store', [AgentController::class, 'AgentProfileStore'])->name('agent.profile.store');


}); // End Agent group Middleware


Route::get('/agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login')->middleware(RedirectIfAuthenticated::class);

Route::post('/agent/register', [AgentController::class, 'AgentRegister'])->name('agent.register');

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);





//Admin Group Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
   
    /// Property Type All Routes
Route::controller(PropertyTypeController::class)->group(function(){

    Route::get('/all/type','AllType')->name('all.type');
    Route::get('/add/type','AddType')->name('add.type');
    Route::post('/store/type','StoreType')->name('store.type');
    Route::get('/edit/type/{id}','EditType')->name('edit.type');
    Route::post('/update/type','UpdateType')->name('update.type');
    Route::get('/delete/type/{id}','DeleteType')->name('delete.type');

});

    /// Amenitie Type All Routes
    Route::controller(PropertyTypeController::class)->group(function(){

        Route::get('/all/amenitie','AllAmenitie')->name('all.amenitie');
        Route::get('/add/amenitie','AddAmenitie')->name('add.amenitie');
        Route::post('/store/amenitie','StoreAmenitie')->name('store.amenitie');
        Route::get('/edit/amenitie/{id}','EditAmenitie')->name('edit.amenitie');
        Route::post('/update/amenitie','UpdateAmenitie')->name('update.amenitie');
        Route::get('/delete/amenitie/{id}','DeleteAmenitie')->name('delete.amenitie');
    
    });

    /// Property All Routes
    Route::controller(PropertyController::class)->group(function(){

        Route::get('/all/property','AllProperty')->name('all.property');

        Route::get('/add/property','AddProperty')->name('add.property');
        
    
    });



     /// Agent All Routes
     Route::controller(AdminController::class)->group(function(){

        Route::get('/all/agent','AllAgent')->name('all.agent');
        Route::get('/add/agent','AddAgent')->name('add.agent');
        Route::post('/store/agent','StoreAgent')->name('store.agent');
        Route::get('/edit/agent/{id}','EditAgent')->name('edit.agent');
        Route::post('/update/agent','UpdateAgent')->name('update.agent');
        Route::get('/delete/agent/{id}','DeleteAgent')->name('delete.agent');

        Route::get('/changeStatus','changeStatus');
        
    
    });


}); // End Admin Group Middleware

//Agent Property Group Middleware
Route::middleware(['auth', 'role:agent'])->group(function (){

   /// Agent All Property 
   Route::controller(AgentPropertyController::class)->group(function(){

    Route::get('/agent/all/agent','AgentAllProperty')->name('agent.all.property');
   
    

});
    
   

}); // End Agent Property group Middleware

