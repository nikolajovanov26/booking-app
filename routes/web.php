<?php

use App\Http\Controllers\Admin\CountryController as AdminCountryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\FeatureController as AdminFeatureController;
use App\Http\Controllers\Admin\PaymentMethodController as AdminPaymentMethodController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\PropertyTypeController as AdminPropertyTypeController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\RoomTypeController as AdminRoomTypeController;
use App\Http\Controllers\Admin\RoomViewController as AdminRoomViewController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PropertyController as DashboardPropertyController;
use App\Http\Controllers\Dashboard\RoomController as DashboardRoomController;
use App\Http\Controllers\Dashboard\NotificationController as DashboardNotificationController;
use App\Http\Controllers\Dashboard\SwitchToUserController;
use App\Http\Controllers\Dashboard\TransactionController as DashboardTransactionController;
use App\Http\Controllers\Dashboard\ReviewController as DashboardReviewController;
use App\Http\Controllers\Dashboard\BookingController as DashboardBookingController;
use App\Http\Controllers\Dashboard\ProfileController as DashboardProfileController;

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BecomeOwnerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PropertyController;
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

Route::get('/', [PropertyController::class, 'index'])->name('home');

Route::controller(PropertyController::class)->name('properties.')->prefix('properties')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/trending', 'trending')->name('trending');
    Route::get('/{property:slug}', 'show')->name('show');
});

Route::middleware('auth')->group(function () {
    /**
     * Admin Routes
     */
    Route::prefix('admin/')->name('admin.')->group(function () {
        Route::get('dashboard', AdminDashboardController::class)->name('dashboard');
        Route::get('bookings', [AdminBookingController::class, 'index'])->name('bookings');
        Route::get('countries', AdminCountryController::class)->name('countries');
        Route::get('features', AdminFeatureController::class)->name('features');
        Route::get('payment-methods', AdminPaymentMethodController::class)->name('paymentMethods');
        Route::get('property-types', AdminPropertyTypeController::class)->name('propertyTypes');
        Route::get('room-types', AdminRoomTypeController::class)->name('roomTypes');
        Route::get('room-views', AdminRoomViewController::class)->name('roomViews');

        Route::get('transactions', [AdminTransactionController::class, 'index'])->name('transactions');
        Route::get('reviews', [AdminReviewController::class, 'index'])->name('reviews');

        Route::resource('properties', AdminPropertyController::class);
        Route::resource('properties/{property}/rooms', AdminRoomController::class)->except('show');

        Route::get('users', [AdminUserController::class, 'index'])->name('users');
        Route::get('/settings', [AdminProfileController::class, 'edit'])->name('settings');
    });

    /**
     * Owner Routes
     */
    Route::prefix('dashboard/')->name('dashboard.')->group(function () {
        Route::get('/', DashboardController::class)->name('index');

        Route::get('properties/favorite', [DashboardPropertyController::class, 'favorite'])->name('properties.favorite');
        Route::resource('properties/{property}/rooms', DashboardRoomController::class)->except('show');
        Route::resource('properties', DashboardPropertyController::class);

        Route::controller(DashboardNotificationController::class)->name('notifications.')->prefix('notifications')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::put('/{notification}', 'toggleRead')->name('toggleRead');
            Route::delete('/{notification}', 'delete')->name('delete');
        });

        Route::get('transactions', [DashboardTransactionController::class, 'index'])->name('transactions');
        Route::get('reviews', [DashboardReviewController::class, 'index'])->name('reviews');
        Route::get('bookings', [DashboardBookingController::class, 'index'])->name('bookings');

        Route::get('/settings', [DashboardProfileController::class, 'edit'])->name('settings');
        Route::get('/switch-to-user', SwitchToUserController::class)->name('switchToUser');
    });

    /**
     * User Routes
     */
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/become-owner', BecomeOwnerController::class)->name('becomeOwner');
    Route::get('/favorite', [PropertyController::class, 'favorite'])->name('favorite');
    Route::post('/favorite/{property}', [PropertyController::class, 'toggleFavorite'])->name('toggleFavorite');
});

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

    Route::get('logout', LogoutController::class)
        ->name('logout');
});
