<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class ResponsavelController extends Controller
{
    

	public function exibirCadastro(Request $request){
		return view('adm/responsavel-cadastro');
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
            'email' => 'required|unique:responsavel|email',
            'celular' => 'required|numeric',
        ], $mensagens);

		$dados['nome'] = $request->input('nome');
		$dados['email'] = $request->input('email');
		$dados['skype'] = $request->input('skype');
		$dados['telefone'] = $request->input('telefone');
		$dados['celular'] = $request->input('celular');
		$dados['dt_inicio'] = $request->input('dt_cadastrado');
		
		$resp = new \App\Models\Responsavel();
		$resp->cadastrarResponsavel($dados);

		return redirect('responsaveis')->with('status', $resp->nome.' cadastrado com sucesso');

	}


	public function listar(Request $request){

		$resp = new \App\Models\Responsavel();
		$result = $resp->listarResponsaveis();

		return view('adm/responsavel-lista', ['responsavel' => $result]);

	}

}
