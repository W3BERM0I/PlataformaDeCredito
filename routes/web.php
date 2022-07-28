<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DiretorController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\FachadaController;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('credeasy', [FachadaController::class, 'index'])->name('credeasy');
Route::get('entrar', [LoginController::class, 'index'])->name('entrar');
Route::post('entrar', [LoginController::class, 'validaLogin'])->name('validaLogin');
Route::get('cadastrar', [ClienteController::class, 'create']);
Route::post('cadastrar', [ClienteController::class, 'store'])->name('efetua.cadastro');

Route::middleware('auth')->group(function () {
    Route::get('home', [PrincipalController::class, 'index'])->name('home');
    Route::get('deslogar', [LoginController::class, 'destroy'])->name('deslogar');
    Route::get('emprestimos', [EmprestimoController::class, 'index'])->name('emprestimo.index');
    Route::post('emprestimos', [EmprestimoController::class, 'search'])->name('emprestimo.search');
    Route::get('emprestimo/criar', [EmprestimoController::class, 'create'])->name('emprestimo.create');
    Route::post('emprestimo/criar', [EmprestimoController::class, 'store'])->name('emprestimo.store');
    Route::get('/emprestimo/{id}', [EmprestimoController::class, 'show'])->name('emprestimo.show');
    Route::put('emprestimo/{id}', [EmprestimoController::class, 'cancelarSolicitacao'])->name('emprestimo.cancela');
    Route::put('parcela/{id}', [ClienteController::class, 'pagarParcela'])->name('parcela.pagar');
    Route::post('emprestimo/salvar', [EmprestimoController::class, 'store']);
    Route::post('/emprestimo/{id}', [EmprestimoController::class, 'destroy'])->name('emprestimo.destroy');
    Route::get('cliente', [ClienteController::class, 'show'])->name('cliente.index');
    Route::put('cliente', [ClienteController::class, 'edit'])->name('atualiza.cliente');
    Route::get('diretor', [DiretorController::class, 'index'])->name('diretor.index');
    Route::put('diretor', [DiretorController::class, 'promoverUser'])->name('diretor.promover');
    Route::get('gestor', [GestorController::class, 'index'])->name('gestor.index');
    Route::get('gestor/{id}', [GestorController::class, 'show'])->name('gestor.show');
    Route::put('gestor/{id}', [GestorController::class, 'processaEmprestimo'])->name('processa.emprestimo');
});
