<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmprestimoFormRequest;
use App\Repositories\ClienteRepository;
use App\Repositories\EmprestimoRepository;
use App\Repositories\ParcelaRepository;
use DomainException;
use Exception;
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

    public function store(EmprestimoFormRequest $request)
    {
        $emprestimo = $this->repository->add($request->all());
        return response()->json(['emprestimo' => $emprestimo], 201);
    }

    public function show(int $id)
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

    public function respostaEmprestimo(Request $request)
    {
        if ($request->status == 'REJEITADO') {
            $this->repository->rejeitaEmprestimo($request->emprestimoid);
            $msg = "EMPRESTIMO REJEITADO";
            return response()->json(['msg' => $msg], 202);
        }

        try {
            $this->repository->aprovaEmprestimo($request->emprestimoid, $request->taxa);
            $this->parcelaRepository->addParcelasPorEmprestimo($request->emprestimoid);
            $msg = "SUCESSO";
        } catch (Exception $e) {
            $msg = "erro";
            return response()->json(['msg' => $msg], 304);
        }
        return response()->json(['msg' => $msg], 202);
    }

    public function cancelarSolicitacao(Request $request)
    {
        $this->repository->cancelaEmprestimo($request->id);
        return response()->json('Emprestimo cancelado com sucesso', 200);
    }

    public function pagarParcela(Request $request)
    {
        $id = $request->id;
        try {
            $this->parcelaRepository->pagarParcela($id);
        } catch (DomainException $e) {
            return response()->json('Favor pagar parcela anterior antes', 401);
        }
        return response()->json('Parcela paga com sucesso', 200);
    }
}
