<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DadosProjeto extends Model
{

	public $id;
	public $valor;
	public $senha;
	public $observacao;
	public $fk_id_dado;
	public $fk_id_projeto;


    private function setDadoProjeto($dados, $id = null){
		$this->valor = $dados['valor'];
		$this->senha = $dados['senha'];
		$this->fk_id_dado = $dados['id_dado'];
		$this->fk_id_projeto = $dados['id_projeto'];
		
		if($dados['observacao'] != null){
			$this->observacao = $dados['observacao'];			
		} else {
			$this->observacao = 'Sem observações';			
		}
	}

	public function cadastrarDadoProjeto($dados){

		$this->setDadoProjeto($dados);
		$id_dado_projeto = $this->inserir();

		$this->id = $id_dado_projeto;

	}


	//Função que insere um novo projeto no banco de dados e retorna o Id
	private function inserir(){

		$id_projeto = DB::table('dados_projeto')->insertGetId([
		    'valor' => $this->valor,
		    'senha' => $this->senha,
		    'observacoes' => $this->observacao,
		    'fk_id_dado' => $this->fk_id_dado,
		    'fk_id_projeto' => $this->fk_id_projeto,
		]);

		return $id_projeto;

	}



	public function listarDadosProjetos($id){

		$dadosp = DB::table('dados_projeto')
		    ->join('dados', 'dados_projeto.fk_id_dado', '=', 'dados.id_dado')
		    ->where('dados_projeto.fk_id_projeto', '=', $id)
            ->select('dados_projeto.*', 'dados.nome AS tipo')
            ->get();
		return $dadosp;

	}
}
