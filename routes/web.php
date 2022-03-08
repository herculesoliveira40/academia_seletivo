<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('home');
});



        // Rotas Usuarios
Route::get('/users/create', [UserController::class, 'create'])->middleware('auth');
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/dashboard', [UserController::class, 'dashboard'])->middleware('auth');

Route::get('/users/edit/{id}', [UserController::class, 'edit'])->middleware('auth');
Route::put('/users/update/{id}', [UserController::class, 'update'])->middleware('auth');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware('auth');





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
