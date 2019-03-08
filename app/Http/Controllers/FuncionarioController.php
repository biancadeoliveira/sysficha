<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class FuncionarioController extends Controller
{
    public function exibirCadastro(Request $request){
		return view('adm/funcionario-cadastro');
	}



	public function cadastrar(Request $request){

		$mensagens = [
            'required' => 'O atributo :attribute é obrigatório',
            'unique' => ':attribute já cadastrado',
            'email' => 'Digite um :attribute válido',
            'numeric' => 'Só números são permitidos',
        ];

        $request->validate([
            'nome' => 'required',
            'email' => 'required|unique:funcionarios|email',
            'celular' => 'required|numeric',
            'cargo' => 'required',
            'senha' => 'required'  
        ], $mensagens);


		$dados['nome'] = $request->input('nome');
		$dados['email'] = $request->input('email');
		$dados['password'] = $request->input('senha');
		$dados['cargo'] = $request->input('cargo');
		$dados['celular'] = $request->input('celular');
		
		$resp = new \App\Models\Funcionario();
		$resp->cadastrarFuncionario($dados);

		return redirect('funcionarios');

	}


	public function listar(Request $request){

		$resp = new \App\Models\Funcionario();
		$result = $resp->listarFuncionarios();

		return view('adm/funcionario-lista', ['funcionarios' => $result]);

	}
}
