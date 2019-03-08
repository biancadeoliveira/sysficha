<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class DadosController extends Controller
{
    
    //Exibe tela de gerenciamento de dados, ou seja listagem e cadastro
    public function exibirDash(Request $request){
		
		$dads = new \App\Models\Dados();
		$result = $dads->listarDados();

		return view('adm/dados', ['dados' => $result]);
	}



	public function cadastrar(Request $request){

		$mensagens = [
            'required' => 'O atributo :attribute é obrigatório',
            'unique' => ':attribute já cadastrado',
        ];

        $request->validate([
            'nome' => 'required|unique:dados',
            'desc' => 'required',
        ], $mensagens);

		$dados['nome'] = $request->input('nome');
		$dados['descricao'] = $request->input('desc');
		
		$dads = new \App\Models\Dados();
		$dads->cadastrarDados($dados);

		return redirect('dados')->with('status', $dads->nome.' cadastrado com sucesso');
	}


}
