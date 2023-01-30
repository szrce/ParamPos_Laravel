<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentAPIController;


Route::post('payment/AddCardPayment', [PaymentAPIController::class, 'AddCardPayment']);
Route::post('payment/DeleteCardPayment', [PaymentAPIController::class, 'DeleteCardPayment']);
Route::post('payment/GetCardPaymentList', [PaymentAPIController::class, 'GetCardPaymentList']);
