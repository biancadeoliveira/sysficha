<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AutenticacaoController extends Controller
{
    public function login(Request $request){
        return view('login');
    }


    public function autenticarFunc(Request $request)
    {
        //Armazena os dados enviados pelo formulário para realizar login
        $email = $request->email;
        $senha = $request->senha;

        $credenciais = ['email' => $email, 'password' => $senha];

        $auth = new \App\Models\Autenticacao();
        
        if($auth->autenticarFuncionario($credenciais)){
            return redirect()->route('projetos');
        }else{
            $result = "Dados incorretos, por favor, tente novamente";
            return redirect()->route('login')->with('status', $result);
        }


    }


    public function logout(Request $request)
    {

        Auth::logout();
        Auth::guard('web')->logout();
        $result = "Você foi desconectado";
        return redirect()->route('login')->with('status', $result);
     
    }
}
