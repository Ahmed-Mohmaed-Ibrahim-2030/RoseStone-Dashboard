<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    // Login...
Route::post('student/login',[\App\Http\Controllers\Api\login\loginController::class,'login']);

Route::post('student/create',[\App\Http\Controllers\Api\login\loginController::class,'registration']);
//Route::post('student/logout',[\App\Http\Controllers\Api\login\loginController::class,'logout'])->middleware('auth:sanctum');
Route::post('/logout', [\App\Http\Controllers\Api\login\loginController::class,'logout'])->middleware('auth:sanctum');
