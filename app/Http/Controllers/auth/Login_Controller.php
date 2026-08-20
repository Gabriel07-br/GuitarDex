<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login_Controller extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // Lógica de autenticação do usuário
        // Você pode usar o Auth::attempt() para verificar as credenciais do usuário
        // Exemplo:
        // if (Auth::attempt(['email' => $email, 'password' => $password])) {
        //     // Autenticação bem-sucedida
        //     return redirect()->intended('/dashboard');
        // } else {
        //     // Falha na autenticação
        //     return redirect()->back()->withErrors(['message' => 'Credenciais inválidas']);
        // }

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => ' required|min:6',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        } 
         return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
        
    }
}
