<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ClienteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(private ClienteRepository $repository)
    {
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function validaLogin(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $user = Auth::user();
            $token = $user->createToken('token');
            Auth::user()->setRememberToken($token->plainTextToken);

            return response()->json(['token' => $token->plainTextToken, 'usuario' => $user], 200);
        }
        return response()->json('Usuario invalido', 401);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        Auth::logout();
        return response()->json([], 204);
    }


    public function store(Request $request)
    {
        $this->repository->add($request);
        return response()->json([], 302);
    }

    public function alterarTipoUsuario(Request $request)
    {
        if (Auth::user()->tipo_usuario !== 'DIRETOR')
            return response()->json('Acesso negado', 401);
        $this->repository->atualizarTipoUsuario($request->id, $request->tipo_usuario);
        return response()->json('Tipo de asuario atualizado', 201);
    }
}
