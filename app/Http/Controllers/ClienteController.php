<?php

namespace App\Http\Controllers;

use App\Repositories\ClienteRepository;
use App\Repositories\ParcelaRepository;
use DomainException;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function __construct(private ClienteRepository $repository, private ParcelaRepository $parcelaRepository)
    {
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        $this->repository->add($request);
        return to_route('entrar', 302);
    }

    public function show()
    {
        return view('cliente.index');
    }

    public function pagarParcela(int $id)
    {
        try {
            $this->parcelaRepository->pagarParcela($id);
        } catch (DomainException $e) {
            return to_route('home');
        }
        return to_route('emprestimo.index');
    }

    public function edit(Request $request)
    {
        $this->repository->alteraUsuario($request);
        to_route('home');
    }
}
