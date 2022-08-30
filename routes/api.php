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
Route::post('/cadastrar', [UserController::class, 'store']);
Route::post('emailECpf', [UserController::class, 'emailECpf']);
Route::post('/recuperarConta', [UserController::class, 'recuperarConta']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = Auth::User();
    return response()->json($user, 200);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('listaEmprestimosSolicitados', [EmprestimoController::class, 'listaEmprestimosSolicitados']);
    Route::get('emprestimo/cliente', [EmprestimoController::class, 'BuscaEmprestimoPorCliente']);
    Route::post('emprestimo', [EmprestimoController::class, 'store']);
    Route::patch('emprestimo/cancelar', [EmprestimoController::class, 'cancelarSolicitacao']);
    Route::get('usuarios', [UserController::class, 'all']);
    Route::patch('diretor/edit/user', [UserController::class, 'alterarTipoUsuario']);
    Route::put('parcela/pagar', [EmprestimoController::class, 'pagarParcela']);
    Route::get('emprestimo/{id}', [EmprestimoController::class, 'show']);
    Route::get('emprestimo/analisar/{id}', [EmprestimoController::class, 'analisar']);
    Route::put('emprestimo/analisar/{id}', [EmprestimoController::class, 'respostaEmprestimo']);
});
