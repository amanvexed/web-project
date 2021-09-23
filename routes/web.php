<?php

use App\Http\Controllers\VTPassController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [VTPassController::class, 'index']);

Route::get('/process', [VTPassController::class, 'processService']);

Route::get('/serviceId/{serviceId}', [App\Http\Controllers\ServiceController::class, 'serviceID'])->name(('serviceId.serviceID'));

Route::get('/service-variation/{serviceId}', [App\Http\Controllers\ServiceController::class, 'serviceVariation'])->name(('serviceId.serviceVariation'));

//Route::post('/buyproduct', [App\Http\Controllers\BuyProductsController::class, 'buyProducts']);//->name('service.product');
Route::post('/productService', [App\Http\Controllers\BuyProductsController::class, 'buyProducts'])->name('buyproduct.service');

Route::post('/purchaseProduct', [App\Http\Controllers\BuyProductsController::class, 'purchaseProduct'])->name('purchase.product');

Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');

Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback']);


