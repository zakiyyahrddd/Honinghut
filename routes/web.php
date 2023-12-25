<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'register' => false,
    'reset' => true,
    'verify' => false
]);

Route::group([
    'prefix' => 'cp',
    // 'namespace' => 'Cp',
    'middleware' => ['auth'],
    'as' => 'cp.'

], function () {
    Route::get('/', [App\Http\Controllers\Cp\DashboardController::class, 'index'])->name('dashboard');
    Route::get('profiles', [App\Http\Controllers\Cp\ProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('profiles/update', [App\Http\Controllers\Cp\ProfileController::class, 'update'])->name('profiles.update');
    Route::get('passwords', [App\Http\Controllers\Cp\PasswordController::class, 'edit'])->name('passwords.edit');
    Route::put('passwords/update', [App\Http\Controllers\Cp\PasswordController::class, 'update'])->name('passwords.update');
    Route::post('/upload', [App\Http\Controllers\Cp\UploadController::class, 'store'])->name('upload');
    Route::resource('clients', App\Http\Controllers\Cp\ClientController::class);
    Route::resource('contents', App\Http\Controllers\Cp\ContentController::class);
    Route::resource('settings', App\Http\Controllers\Cp\SettingController::class);
    Route::resource('users', App\Http\Controllers\Cp\UserController::class);
    Route::resource('roles', App\Http\Controllers\Cp\RoleController::class);
    Route::resource('privilege-codes', App\Http\Controllers\Cp\PrivilegeCodeController::class);
    Route::resource('permissions', App\Http\Controllers\Cp\PermissionController::class);
    Route::resource('external-apps', App\Http\Controllers\Cp\ExternalAppController::class);
	Route::delete('delete-file', [App\Http\Controllers\Cp\AjaxController::class, 'destroyFile'])->name('delete-file');
});


Route::get('/', function () {
    return redirect('/login');
});



