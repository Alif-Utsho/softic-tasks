<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\StripepaymentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'paymentForm']);
Route::get('/payment/list', [FrontendController::class, 'paymentList'])->name('payment.list');

Route::post('/payment/submit', [StripepaymentController::class, 'paymentSubmit'])->name('payment.submit');
Route::get('/payment/success/{tansaction_id}', [StripepaymentController::class, 'paymentSuccess'])->name('success');
Route::get('/payment/cancel/{tansaction_id}', [StripepaymentController::class, 'paymentCancel'])->name('cancel');