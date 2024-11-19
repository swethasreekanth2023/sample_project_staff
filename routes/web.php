<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/staff/create', [StaffController::class, 'create'])->name('staff.create');
    
    // Route::post('/admin/staff/store', [StaffController::class, 'store'])->name('staff.store');
    Route::post('/admin/staff/store', [StaffController::class, 'store'])->name('admin.staff.store');

    Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/admin/staff', [StaffController::class, 'index'])->name('staff.index');
/////////////////


Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

});
Auth::routes();
// Route::get('/', function () {
//     return view('welcome');
// });

