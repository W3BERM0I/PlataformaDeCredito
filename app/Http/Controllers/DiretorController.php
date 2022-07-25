<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Repositories\ClienteRepository;
use Illuminate\Http\Request;

class DiretorController extends Controller
{
    public function __construct(private ClienteRepository $repository)
    {
    }

    public function index()
    {
        $usuarios = $this->repository->all();
        return view('diretor.index', ['usuarios' => $usuarios]);
    }

    public function promoverUser(Request $request)
    {
        Cliente::whereId($request->id)->update(['tipo_usuario' => $request->tipo_usuario]);
        return to_route('diretor.index');
    }
}
