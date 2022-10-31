<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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
    return view('welcome');
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lw', 'HomeController@lw')->name('lw');
Route::get('/test', 'HomeController@test')->name('test');
Route::get('sk', 'HomeController@socket_ms')->name('sk');
Route::view('/skt', 'skt');
Route::get('lcz', 'HomeController@lcz')->name('lcz');

Route::get('ct', 'HomeController@claseTest')->name('ct');

//Route Hooks - Do not delete//
Route::view('cat_estatus', 'livewire.cat-estatuss.index')->middleware('auth');

Route::view('/calculator', 'livewire.calculator.index')->name('calculator')->middleware('auth');

Route::get('user-auth', [HomeController::class, 'authTF'])->name('auth.tf');



Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware(['guest'])
                ->name('login');

    // $limiter = config('fortify.limiters.login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
            ->middleware(['guest']);

// Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])
//         ->middleware(['guest'])
//         ->name('two-factor.login');

// Route::post('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store'])
//             ->middleware(['guest']);                