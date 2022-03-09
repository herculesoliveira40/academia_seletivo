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
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;


Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/localization', function () {
    return view('localization');
});

        // Rotas Usuarios
Route::get('/users/create', [UserController::class, 'create'])->middleware('auth');
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/dashboard', [UserController::class, 'dashboard'])->middleware('auth');

Route::get('/users/edit/{id}', [UserController::class, 'edit'])->middleware('auth');
Route::put('/users/update/{id}', [UserController::class, 'update'])->middleware('auth');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware('auth');


        // Rotas Categorias
Route::get('/categories/create', [CategoryController::class, 'create'])->middleware('auth');
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/dashboard', [CategoryController::class, 'dashboard'])->middleware('auth');

Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->middleware('auth');
Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->middleware('auth');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->middleware('auth');


        // Rotas Clients
Route::get('/clients/create', [ClientController::class, 'create'])->middleware('auth');
Route::post('/clients', [ClientController::class, 'store']);

Route::get('/clients/dashboard', [ClientController::class, 'dashboard'])->middleware('auth');

Route::get('/clients/{id}', [ClientController::class, 'show'])->middleware('auth');
Route::get('/clients/edit/{id}', [ClientController::class, 'edit'])->middleware('auth');
Route::put('/clients/update/{id}', [ClientController::class, 'update'])->middleware('auth');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->middleware('auth');





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
