<?php

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

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\CookiesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImprintController;
use App\Http\Controllers\ThxController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('front.home');
Route::get('/nagrody', [HomeController::class, 'index'])->name('front.home.awards');
Route::get('/kontakt', [HomeController::class, 'index'])->name('front.home.contact');
Route::get('/zasady-konkursu', [HomeController::class, 'index'])->name('front.home.rules');
Route::get('/wez-udzial', [HomeController::class, 'index'])->name('front.home.take');
Route::get('/zgloszenia', [HomeController::class, 'index'])->name('front.home.applications');
Route::get('/zgloszenia-tygodnia', [HomeController::class, 'index'])->name('front.home.week');
Route::get('/poradnik', [HomeController::class, 'index'])->name('front.home.tips');
Route::get('/produkty', [HomeController::class, 'index'])->name('front.home.products');
Route::get('/cookies', [CookiesController::class, 'index'])->name('front.cookies');
Route::get('/imprint', [ImprintController::class, 'index'])->name('front.imprint');
Route::get('/formularz', [ApplicationController::class, 'form'])->name('front.application.form');
Route::post('/formularz/zapisz', [ApplicationController::class, 'store'])->name('front.application.save');

Route::get('/podziekowania/rejestracja', [ThxController::class, 'form'])->name('front.thx.form');
Route::get('/podziekowania/konkurs', [ThxController::class, 'contest'])->name('front.thx.contest');
Route::get('/podziekowania/promocja', [ThxController::class, 'promotion'])->name('front.thx.promotion');

Route::get('/potwierdzam/{application}/{token}', [ConfirmController::class, 'application'])->name('front.confirm.application');
