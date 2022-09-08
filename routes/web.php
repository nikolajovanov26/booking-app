<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
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

Route::view('/', 'welcome')->name('home');
Route::view('/properties', 'properties.index')->name('properties.index');
Route::view('/properties/1', 'properties.show')->name('properties.show');
Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
Route::view('/admin/properties', 'admin.properties.index')->name('admin.properties.index');
Route::view('/admin/properties/1/show', 'admin.properties.show')->name('admin.properties.show');
Route::view('/admin/properties/create', 'admin.properties.create')->name('admin.properties.create');
Route::view('/admin/properties/1/edit', 'admin.properties.edit')->name('admin.properties.edit');
Route::view('/admin/properties/1/rooms', 'admin.properties.rooms.index')->name('admin.properties.rooms.index');
Route::view('/admin/properties/1/rooms/create', 'admin.properties.rooms.create')->name('admin.properties.rooms.create');
Route::view('/admin/properties/1/rooms/1/edit', 'admin.properties.rooms.edit')->name('admin.properties.rooms.edit');
Route::view('/admin/notifications', 'admin.notifications')->name('admin.notifications');





/*
 * Auth Routes
 */
Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
