<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ClienteRepository;
use Illuminate\Http\Client\Request;
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


    /**
     * @param Request $request
     * @return User
     */
    public function validaLogin(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $token = auth()->user()->createToken('auth_token');

            return response()->json($token->plainTextToken, 200);
        }
        return response()->json('Usuario invalido', 401);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([], 204);
    }
}
