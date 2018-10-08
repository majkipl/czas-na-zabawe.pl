<?php

use App\Http\Controllers\Api\ApplicationController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['myauth:api'])->group(function () {
    Route::get('/application', [ApplicationController::class, 'index'])->name('api.application');
});
