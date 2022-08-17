<?php

namespace App\Http\Controllers;

use App\Repositories\EmprestimoRepository;
use App\Repositories\ParcelaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmprestimoController extends Controller
{
    public function __construct(private EmprestimoRepository $repository, private ParcelaRepository $parcelaRepository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emprestimos = $this->repository->listaEmprestimos();
        if (Auth::user()->tipo_usuario == 'GESTOR' || Auth::user()->tipo_usuario == 'DIRETOR')
            $emprestimos = $this->repository->all();
        return view('emprestimo.index')->with('emprestimos', $emprestimos);
    }

    public function search(Request $request)
    {
        $emprestimos = $this->repository->FiltroDeEmprestimo($request->search);
        if (is_null($emprestimos)) {
            $emprestimos = $this->repository->all();
        }
        return view('emprestimo.index', ['emprestimos' => $emprestimos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emprestimo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->add($request->all());
        return to_route('home', 302);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $parcelas = $this->parcelaRepository->buscaParcelasPorEmprestimo($id);
        $emprestimo = $this->repository->buscaEmprestimoPorId($id);
        return view('emprestimo.show', ['parcelas' => $parcelas, 'emprestimo' => $emprestimo]);
        // return response()->json(['parcelas' => $parcelas, 'emprestimo' => $emprestimo], 200);
    }

    public function cancelarSolicitacao(int $id)
    {
        $this->repository->cancelaEmprestimo($id);
        return to_route('emprestimo.index');
    }

    public function destroy($id)
    {
        $this->repository->destroy($id);
        return to_route('home');
    }
}
