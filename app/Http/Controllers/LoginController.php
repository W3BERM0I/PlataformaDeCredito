<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login.index');
    }

    public function validaLogin(Request $request)
    {
        // $senha = password_verify(string $request->password, string $hash);
        // dd($request->only(['email', 'password']));
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back();
        }

        $cliente = Cliente::query()->where('email', $request->email)->first();
        $cliente = $cliente->toArray();
        $fullName = explode(" ", $cliente['nome']);
        $nome = $fullName[0];

        session()->put('nome', $nome);
        session()->put('id', $cliente['id']);
        return to_route('home');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        return to_route('entrar');
    }
}
