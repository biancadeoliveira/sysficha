<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Projetos extends Model
{
    public $id;
	public $nome;
	public $descricao;
	public $dt_cadastrado;
	public $status;
	public $id_resp;


	private function setProjeto($dados, $id = null){
		$this->nome = $dados['nome'];
		$this->descricao = $dados['descricao'];
		$this->status = $dados['status'];
		$this->id_resp = $dados['id_resp'];
		

		if(array_key_exists('dt_cadastrado', $dados)){
			$this->dt_cadastrado = $dados['dt_cadastrado'];
		} else{
			$this->dt_cadastrado = date('Y-m-d');	
		}

		if($id != null){
			$this->id = $id;			
		}
	}

	public function cadastrarProjeto($dados){

		$this->setProjeto($dados);
		$id_projeto = $this->inserir();

		$this->id = $id_projeto;

	}


	//Função que insere um novo projeto no banco de dados e retorna o Id
	private function inserir(){

		$id_projeto = DB::table('projeto')->insertGetId([
		    'nome' => $this->nome,
		    'descricao' => $this->descricao,
		    'dt_cadastrado' => $this->dt_cadastrado,
		    'status' => $this->status,
		    'id_resp' => $this->id_resp,
		]);

		return $id_projeto;

	}



	public function listarProjetos(){

		$projetos = DB::table('projeto')
            ->join('responsavel', 'projeto.id_resp', '=', 'responsavel.id')
            ->select('projeto.*', 'responsavel.nome AS nomeResp')
            ->paginate(15);
		return $projetos;

	}


	public function buscarProjetos($termo){

		$projetos = DB::table('projeto')
            ->join('responsavel', 'projeto.id_resp', '=', 'responsavel.id')
            ->select('projeto.*', 'responsavel.nome AS nomeResp')
            ->where('projeto.nome', 'like', '%'.$termo.'%')
            ->paginate(15);
		return $projetos;

	}


	public function exibirFicha($id){

		$projeto = DB::table('projeto')
            ->join('responsavel', 'projeto.id_resp', '=', 'responsavel.id')
            ->where('id_projeto', '=', $id)
            ->select('projeto.*', 'responsavel.nome AS nomeResp', 'responsavel.email', 'responsavel.skype', 'responsavel.telefone', 'responsavel.celular')
            ->first();
		return $projeto;

	}
	
}
