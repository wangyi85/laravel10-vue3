<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubjectController;

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

Route::get('/', function() {
    return view('app');
});

Route::get('/dashboard', function() {
    return view('app');
});

Route::get('/login', function() {
    return view('app');
});

Route::get('/api/login', [AuthController::class, 'login'])->name('login');

Route::get('/api/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/api/subject/get', [SubjectController::class, 'get'])->name('subjects');

// Route::controller(AuthController::class)->group(function() {
//     Route::get('/api/login', 'login')->name('login');
//     Route::get('/api/logout', 'logout')->name('logout');
// });