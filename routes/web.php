<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\DonerController;
use App\Http\Controllers\Backend\StockController;
use App\Http\Controllers\Backend\DonationController;
use App\Http\Controllers\Backend\DashboardController;

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



Route::get('/' ,[FrontController::class  , 'index'])->name('home');
Route::get('/doner/request' ,[FrontController::class  , 'donerRequest'])->name('doner.request');
Route::post('/doner/request' ,[FrontController::class  , 'storeRequest'])->name('request.store');
Route::get('/doner/MyRequest' ,[FrontController::class  , 'showRequest'])->name('doner.MyRequest');
Route::get('/doner/AllRequest' ,[FrontController::class  , 'showAllRequest'])->name('doner.AllRequest');
Route::get('/filter' ,[FrontController::class  , 'filter'])->name('request.filter');

/******************* DashBoard Routes **********************************/
Route::group(['prefix' => 'dashboard' , 'middleware' => ['auth' , 'IsAdmin']] , function(){
    Route::get('/', [DashboardController::class  , 'index'])->name('dashboard');

    /******************* Doner Routes *****************/
    Route::resource('doner', DonerController::class);

    /******************* Donation Routes *****************/
    Route::get('donation/approve/{id}' ,[DonationController::class  , 'approve'])->name('donation.approve');
    Route::get('donation/reject/{id}' ,[DonationController::class  , 'reject'])->name('donation.reject');
    Route::resource('donation', DonationController::class);

    /******************* Stock Routes *****************/
    Route::resource('stock', StockController::class);



});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
