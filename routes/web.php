<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     // sleep(2);
//     return Inertia::render('Home');
// })->name('home');

Route::inertia('/','Home')->name('home');
Route::get('/about', function () {
    return Inertia::render('About', ['user' => 'Mike']);
})->name('about');

Route::middleware('guest')->group(function () {
    Route::inertia('/register','Auth/Register')->name('register');
    Route::post('register', [AuthController::class, 'register']);
    Route::inertia('/login','Auth/Login')->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::inertia('/dashboard','Dashboard')->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
