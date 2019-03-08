<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class ProjetosController extends Controller
{
    public function exibirCadastro(Request $request){

    	$resp = new \App\Models\Responsavel();
    	$responsaveis = $resp->listarResponsaveis();

		return view('adm/projeto-cadastro', ['responsaveis' => $responsaveis]);
	}



	public function cadastrar(Request $request){

		$mensagens = [
            'required' => 'O atributo :attribute é obrigatório',
            'unique' => ':attribute já cadastrado',
        ];

        $request->validate([
            'nome' => 'required|unique:projeto',
            'Descricao' => 'required',
            'Status' => 'required',
            'Id_resp' => 'required',
            'Dt_cadastrado' => 'required',
        ], $mensagens);

		$dados['nome'] = $request->input('nome');
		$dados['descricao'] = $request->input('Descricao');
		$dados['status'] = $request->input('Status');
		$dados['id_resp'] = $request->input('Id_resp');
		$dados['dt_cadastrado'] = $request->input('Dt_cadastrado');
		
		
		$resp = new \App\Models\Projetos();
		$resp->cadastrarProjeto($dados);

		return redirect(Route('fichaprojeto', ['id' => $resp->id]));

	}


	public function listar(Request $request){

		$resp = new \App\Models\Projetos();
		$result = $resp->listarProjetos();

		return view('adm/projetos-lista', ['projetos' => $result]);

	}



	public function exibirficha(Request $request, $id){

		$resp = new \App\Models\Projetos();
		$result = $resp->exibirFicha($id);

		$dads = new \App\Models\Dados();
		$resultdado = $dads->listarDados();

		$dp = new \App\Models\DadosProjeto();
		$infos = $dp->listarDadosProjetos($id);
		

		return view('adm/ficha-projeto', ['projeto' => $result, 'tipodados'=>$resultdado, 'informacoes' => $infos]);

	}

}
