<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Funcionario extends Model
{
    
    public $id;
	public $nome;
	public $email;
	public $password;
	public $cargo;
	public $celular;


	private function setFuncionario($dados, $id = null){

		$this->nome = $dados['nome'];
		$this->email = $dados['email'];
		$this->password = Hash::make($dados['password']);
		$this->cargo = $dados['cargo'];
		$this->celular = $dados['celular'];

		if($id != null){
			$this->id = $id;			
		}

	}

	public function cadastrarFuncionario($dados){

		$this->setFuncionario($dados);
		$id = $this->inserir();

		$this->id = $id;

	}


	//Função que insere um novo responsável no banco de dados e retorna o Id
	private function inserir(){

		$id = DB::table('funcionarios')->insertGetId([
		    'nome' => $this->nome,
		    'email' => $this->email,
		    'password' => $this->password,
		    'cargo' => $this->cargo,
		    'celular' => $this->celular,
		]);

		return $id;

	}



	public function listarFuncionarios(){

		$funcionarios = DB::table('funcionarios')->paginate(15);
		return $funcionarios;

	}
}
