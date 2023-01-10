<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SslCommerzPaymentController;

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
    return view('PaymentEasycheckout');
});



/////////////////////////////////////// SSLCOMMERZ Start ////////////////////////////////////////////////////////

Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::get('/success_', [SslCommerzPaymentController::class, 'successPage']);
Route::get('/fail_', [SslCommerzPaymentController::class, 'failurePage']);
Route::get('/cancel_', [SslCommerzPaymentController::class, 'cancelPage']);


Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);

/////////////////////////////////////// SSLCOMMERZ END //////////////////////////////////////////////////////////

/////////////////////////////////////// END_USER Start //////////////////////////////////////////////////////

Route::post('seat',[UserController::class,'seatView'])->name('seat');
Route::get('signup',[UserController::class,'signUp'])->name('signup');
Route::get('signin',[UserController::class,'signIn'])->name('signin');
Route::get('verify',[UserController::class,'verify'])->name('verify');

Route::post('selectSeat',[UserController::class,'selectSeat'])->name('selectSeat');

Route::post('userverification',[UserController::class,'verification'])->name('userverification');
Route::get('sourcetodest',[UserController::class,'sourcetodest'])->name('sourcetodest');
Route::post('schedulesearchresults',[UserController::class,'schedulesearchresults'])->name('schedulesearchresults');
Route::post('signin@verify',[UserController::class,'signInVerify'])->name('signinVerify');

Route::post('store-user-info', [UserController::class,'storeUserInfo'])->name('storeUserInfo');
