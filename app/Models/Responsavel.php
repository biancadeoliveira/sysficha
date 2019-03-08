<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    
	public $id;
	public $nome;
	public $email;
	public $skype;
	public $telefone;
	public $celular;
	public $dt_cadastro;
	public $dt_inicio;


	private function setResponsavel($dados, $id = null){
		$this->nome = $dados['nome'];
		$this->email = $dados['email'];
		$this->skype = $dados['skype'];
		$this->telefone = $dados['telefone'];
		$this->celular = $dados['celular'];
		$this->dt_cadastro = date('Y-m-d');


		if(array_key_exists('dt_inicio', $dados) && !is_null($dados['dt_inicio'])){
			$this->dt_inicio = $dados['dt_inicio'];
		} else{
			$this->dt_inicio = date('Y-m-d');	
		}

		

		if($id != null){
			$this->id = $id;			
		}
	}

	public function cadastrarResponsavel($dados){

		$this->setResponsavel($dados);
		$id_responsavel = $this->inserir();

		$this->id = $id_responsavel;

	}


	//Função que insere um novo responsável no banco de dados e retorna o Id
	private function inserir(){

		$id_responsavel = DB::table('responsavel')->insertGetId([
		    'nome' => $this->nome,
		    'email' => $this->email,
		    'skype' => $this->skype,
		    'telefone' => $this->telefone,
		    'celular' => $this->celular,
		    'dt_cadastrado' => $this->dt_cadastro,
		    'dt_inicio' => $this->dt_inicio
		]);

		return $id_responsavel;

	}



	public function listarResponsaveis(){

		$responsaveis = DB::table('responsavel')->paginate(15);
		return $responsaveis;

	}
	

}
