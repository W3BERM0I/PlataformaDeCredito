<?php

use App\Http\Controllers\API\EmprestimoController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('listaEmprestimosSolicitados', [EmprestimoController::class, 'listaEmprestimosSolicitados'])->name('emprestimos');
Route::get('emprestimo/cliente', [EmprestimoController::class, 'BuscaEmprestimoPorCliente'])->name('emprestimo.cpf');
Route::get('usuarios', [UserController::class, 'all'])->name('all');
