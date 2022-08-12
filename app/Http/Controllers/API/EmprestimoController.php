<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ClienteRepository;
use App\Repositories\EmprestimoRepository;
use App\Repositories\ParcelaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmprestimoController extends Controller
{
    public function __construct(private EmprestimoRepository $repository, private ParcelaRepository $parcelaRepository, private ClienteRepository $clienteRepository)
    {
    }

    public function listaEmprestimosSolicitados()
    {
        return $this->repository->buscaEmprestimosSolicitados();
    }

    public function BuscaEmprestimoPorCliente()
    {
        $id = Auth::user()->id;
        return $this->repository->listaEmprestimosIdCliente($id);
    }

    public function store(Request $request)
    {
        dd($request);
        $emprestimo = $this->repository->add($request);
        return $emprestimo;
    }

    public function show($id)
    {
        $parcelas = $this->parcelaRepository->buscaParcelasPorEmprestimo($id);
        $emprestimo = $this->repository->buscaEmprestimoPorId($id);
        return response()->json(['parcelas' => $parcelas, 'emprestimo' => $emprestimo], 200);
    }

    public function analisar(int $id)
    {
        $emprestimo = $this->repository->buscaEmprestimoPorId($id);
        $cliente = $this->clienteRepository->buscaClientePorId($emprestimo->cliente_id);
        return response()->json(['cliente' => $cliente, 'emprestimo' => $emprestimo], 200);
    }
}
