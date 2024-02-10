<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolePermissionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('roles', RoleController::class);
    Route::get('roles/{role}/assign-permissions', [RolePermissionController::class, 'index'])->name('roles.show');
    Route::post('roles/{role}/assign-permissions', [RolePermissionController::class, 'assign'])->name('roles.assign-permissions');

    Route::resource('permissions', PermissionController::class);
    Route::get('/assign-role', [UserRoleController::class, 'index'])->name('user_roles.index');
    Route::get('{user}/assign-role', [UserRoleController::class, 'create'])->name('user_roles.create');
    Route::post('/{user}/assign-role', [UserRoleController::class, 'assignRoles'])->name('user_roles.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
