<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('seat',[UserController::class,'seatView'])->name('seat');
Route::get('signup',[UserController::class,'signUp'])->name('signup');
Route::get('signin',[UserController::class,'signIn'])->name('signin');
Route::get('verify',[UserController::class,'verify'])->name('verify');
Route::get('selectSeat',[UserController::class,'selectSeat'])->name('selectSeat');

Route::post('userverification',[UserController::class,'verification'])->name('userverification');
Route::get('sourcetodest',[UserController::class,'sourcetodest'])->name('sourcetodest');
Route::post('schedulesearchresults',[UserController::class,'schedulesearchresults'])->name('schedulesearchresults');
Route::post('signin@verify',[UserController::class,'signInVerify'])->name('signinVerify');

Route::post('store-user-info', [UserController::class,'storeUserInfo'])->name('storeUserInfo');
