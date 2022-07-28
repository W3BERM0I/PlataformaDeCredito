<?php

namespace App\Http\Controllers;

use App\Repositories\ClienteRepository;
use App\Repositories\EmprestimoRepository;
use App\Repositories\ParcelaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GestorController extends Controller
{
    public function __construct(private EmprestimoRepository $emprestimoRepository, private ClienteRepository $clienteRepository, private ParcelaRepository $parcelaRepository)
    {
    }

    public function index()
    {
        // if (Auth::user()->tipo_usuario !== "GESTOR" || Auth::user()->tipo_usuario !== "DIRETOR")
        //     return back();
        $emprestimos = $this->emprestimoRepository->buscaEmprestimosSolicitados();
        return view('gestor.index', ['emprestimos' => $emprestimos]);
    }

    public function analizaEmprestimo(Request $request)
    {

        return to_route('home');
    }

    public function show($id)
    {
        $emprestimo = $this->emprestimoRepository->buscaEmprestimoPorId($id);
        $cliente = $emprestimo->cliente;
        return view('gestor.show', ['emprestimo' => $emprestimo, 'cliente' => $cliente]);
    }

    public function processaEmprestimo(int $id, Request $request)
    {
        if ($request->status == 'REJEITADO') {
            $this->emprestimoRepository->rejeitaEmprestimo($id);
        } else {
            $taxa = explode("%", $request->taxa);
            $this->emprestimoRepository->aprovaEmprestimo($id, $taxa[0]);
            $this->parcelaRepository->addParcelasPorEmprestimo($id);
        }
        return to_route('gestor.index');
    }
}
