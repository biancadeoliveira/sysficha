<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class DadosProjetoController extends Controller
{
    public function cadastrar(Request $request){

		$dados['id_projeto'] = $request->input('id_projeto');
		$dados['id_dado'] = $request->input('id_dado');
		$dados['valor'] = $request->input('valor');
		$dados['senha'] = $request->input('senha');
		$dados['observacao'] = $request->input('observacao');
		
		
		$dp = new \App\Models\DadosProjeto();
		$dp->cadastrarDadoProjeto($dados);

		return redirect(Route('fichaprojeto', ['id' => $request->input('id_projeto')]));

	}
}
