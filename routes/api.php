<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SleepController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/** ------------------------Public------------------------ */
Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);

/** ----------------------Protected----------------------- */
Route::group(['middleware' => ['auth:sanctum']],function () {

    /** ----------USER---------- */
    Route::post('logout', [AuthController::class, 'logout']);

    /** ----------SLEEP---------- */
    Route::post('sleep', [SleepController::class, 'index']);
    Route::post('sleep/add', [SleepController::class, 'index']);

});
