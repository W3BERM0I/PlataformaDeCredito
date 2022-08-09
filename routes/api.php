<?php

use App\Http\Controllers\API\EmprestimoController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::post('/entrar', [UserController::class, 'validaLogin'])->name('valida.login');
Route::get('/deslogar', [UserController::class, 'logout'])->name('logout');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = Auth::User();
    return response()->json($user, 200);
});


Route::middleware('auth:sanctum')->group(function () {
});
Route::get('listaEmprestimosSolicitados', [EmprestimoController::class, 'listaEmprestimosSolicitados'])->name('emprestimos');
Route::get('emprestimo/cliente', [EmprestimoController::class, 'BuscaEmprestimoPorCliente'])->name('emprestimo.cpf');
Route::get('usuarios', [UserController::class, 'all'])->name('all');
