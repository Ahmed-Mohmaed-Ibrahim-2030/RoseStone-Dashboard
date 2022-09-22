<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);
