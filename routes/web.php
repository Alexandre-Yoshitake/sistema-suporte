<?php

use App\Http\Controllers\ChamadosController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chamados', [ChamadosController::class, 'index']);
Route::get('/chamados/create', [ChamadosController::class, 'create']);
Route::post('/chamados', [ChamadosController::class, 'store']);
Route::get('/chamados/{id}', [ChamadosController::class, 'show']);
Route::get('/chamados/edit/{id}', [ChamadosController::class, 'edit']);
Route::put('/chamados/update/{id}', [ChamadosController::class, 'update']);
Route::delete('/chamados/{id}', [ChamadosController::class, 'destroy']);

Route::get('/equipe', [UsersController::class, 'index']);
Route::get('/equipe/edit/{id}', [UsersController::class, 'edit']);
Route::post('/equipe/update/{id}', [UsersController::class, 'update']);
Route::delete('/equipe/{id}', [UsersController::class, 'destroy']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
