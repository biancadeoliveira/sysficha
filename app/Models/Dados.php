<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dados extends Model
{
    public $id;
	public $nome;
	public $descricao;

	private function setDados($dados, $id = null){
		
		$this->nome = $dados['nome'];
		$this->descricao = $dados['descricao'];
		
		if($id != null){
			$this->id = $id;			
		}

	}


	public function cadastrarDados($dados){
		$this->setDados($dados);
		$id_dado = $this->inserir();

		$this->id = $id_dado;
	}


	//Função que insere um novo responsável no banco de dados e retorna o Id
	private function inserir(){

		$id_dado = DB::table('dados')->insertGetId([
		    'nome' => $this->nome,
		    'descricao' => $this->descricao,
		]);

		return $id_dado;

	}


	//Lista todos os dados cadastrados no sistema
	public function listarDados(){

		$dados = DB::table('dados')->paginate(8);
		return $dados;

	}
}
