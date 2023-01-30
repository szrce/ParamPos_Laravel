<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentAPIController;


Route::post('customer/AddCardPayment', [PaymentAPIController::class, 'AddCardPayment']);
Route::post('customer/DeleteCardPayment', [PaymentAPIController::class, 'DeleteCardPayment']);
Route::post('customer/GetCardPaymentList', [PaymentAPIController::class, 'GetCardPaymentList']);
