<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BuyEventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified', 'roles'])->name('dashboard');
Route::get('/dashboard/old', function () {
    return view('dashboard');
});

require __DIR__.'/auth.php';


// Route::get('/loginAs', [LoginController::class, 'index'])->name('login.role');
// Route::get('/login/seller', [LoginController::class, 'loginSeller'])->name('login.seller');
// Route::get('/login/buyer', [LoginController::class, 'loginBuyer'])->name('login.buyer');
// Route::get('/register/seller', [LoginController::class, 'registerSeller'])->name('register.seller');
// Route::get('/register/buyer', [LoginController::class, 'registerBuyer'])->name('register.buyer');

// Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/auth/google/', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback/', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback'); 

Route::get('/search', [HomeController::class, 'search'])->name('home.search');
Route::post('/search', [HomeController::class, 'search'])->name('home.search');

// Route::post('/search/categories', [HomeController::class, 'search_category'])->name('home.search.categories');

Route::get('/event/{slug}', [EventController::class, 'showEvent'])->name('show.event');

Route::get('/user/premium/{id}', [UserController::class, "joinPremium"])->name('user.joinpremium');
Route::get('/user/stoppremium/{id}', [UserController::class, "stopPremium"])->name('user.stoppremium');

Route::middleware(['auth'])->group(function () {
    Route::prefix('/user/event')->group(function () {
        Route::get('/like/{id}', [UserController::class, 'eventLike'])->name('user.event.like');
        Route::get('/notlike/{id}', [UserController::class, 'eventNotLike'])->name('user.event.not.like');
        Route::post('/createOrder/{id}', [BuyEventController::class, 'createOrderData'])->name('event.createOrderData');
        Route::get('/personal/{id}', [BuyEventController::class, 'toPersonalData'])->name('event.buy');
        Route::get('/checkout/{id}/{order}', [BuyEventController::class, 'toCheckout'])->name('event.checkout');
        Route::get('/redirect', [BuyEventController::class, 'redirect'])->name('event.redirect');
        Route::post('/buy', [BuyEventController::class, 'save_data'])->name('event.buy.save');        
    });
});

Route::get('/transaction/success', [BuyEventController::class, 'transaction_success'])->name('transaction.success');
Route::post('/transaction/notification', [BuyEventController::class, 'transaction_notification'])->name('transaction.notification');
Route::post('/transaction/save', [BuyEventController::class, 'transaction_save'])->name('transaction.save');


Route::resource('orders', OrderController::class)->only(['index', 'show']);


Route::middleware(['auth'])->group(function () {
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'home'])->name('dashboard');
        Route::get('/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
        Route::get('/event/ongoing', [DashboardController::class, 'ongoingEvent'])->name('dashboard.ongoingEvent');
        Route::get('/event/ended', [DashboardController::class, 'endedEvent'])->name('dashboard.endedEvent');
        Route::get('/event/drafted', [DashboardController::class, 'draftedEvent'])->name('dashboard.draftedEvent');
        Route::post('/event/draft/{id}', [DashboardController::class, 'draftEvent'])->name('dashboard.draftEvent');
        Route::get('/event/favorited', [DashboardController::class, 'favoritedEvent'])->name('dashboard.favoritedEvent');
        Route::post('/profile/update', [UserController::class, 'update'])->name('dashboard.updateProfile');
        Route::get('/order_data/{id}', [DashboardController::class, 'orderData'])->name('dashboard.orderData');
        Route::get('/order_data_detail/{order_id}', [DashboardController::class, 'orderDataDetail'])->name('dashboard.orderDataDetail');
        Route::get('/change_password', [UserController::class, 'edit_password'])->name('dashboard.changePassword');
        Route::post('/change_password', [UserController::class, 'updatePassword'])->name('dashboard.updatePassword');
        Route::get('/history', [DashboardController::class, 'event_history'])->name('dashboard.history');
        Route::get('/history/detail', [DashboardController::class, 'event_history_detail'])->name('dashboard.history.detail');
    });
});


Route::middleware(['auth'])->group(function () {
    Route::prefix('/profile/event')->group(function () {
        Route::get('/create', [EventController::class, 'create'])->name('create.event');
        Route::get('/list', [EventController::class, 'list'])->name('list.event');
        Route::post('/store', [EventController::class, 'store'])->name('store.event');        
    });
});


Route::get('/profile/{slug}', [UserController::class, 'show'])->name('user.profile');

Route::get('/redirect', function () {
    return redirect()->back();
});


// Route::get('/auth/google/', [GoogleController::class, 'redirectToGoogleBuyer'])->name('loginbuyer');
// Route::get('/auth/google/callback/seller', [GoogleController::class, 'handleGoogleCallbackSeller'])->name('google.callbackSeller'); 
// Route::get('/auth/google/callback/', [GoogleControllerBuyer::class, 'handleGoogleCallback'])->name('google.callbackBuyer'  ;