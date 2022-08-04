<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\EmprestimoRepository;

class EmprestimoController extends Controller
{
    public function __construct(private EmprestimoRepository $repository)
    {
    }

    public function listaEmprestimosSolicitados()
    {
        return $this->repository->buscaEmprestimosSolicitados();
    }

    public function BuscaEmprestimoPorCliente()
    {
        return $this->repository->listaEmprestimosIdCliente('3');
    }
}
