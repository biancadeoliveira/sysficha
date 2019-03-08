<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'AutenticacaoController@login')->name('login');
Route::post('/', 'AutenticacaoController@autenticarFunc')->name('validarlogin');



Route::group(['middleware' => ['funcionario']], function () {
   	
   	Route::get('/funcionarios', 'FuncionarioController@listar')->name('funcionarios');
	Route::get('/novo/funcionario', 'FuncionarioController@exibirCadastro')->name('exibircadfuncionario');
	Route::post('/novo/funcionario', 'FuncionarioController@cadastrar')->name('cadastrarfuncionario');


	Route::get('/responsaveis', 'ResponsavelController@listar')->name('responsaveis');
	Route::get('/novo/responsavel', 'ResponsavelController@exibirCadastro')->name('exibircadresponsavel');
	Route::post('/novo/responsavel', 'ResponsavelController@cadastrar')->name('cadastrarresponsavel');


	Route::get('/dados', 'DadosController@exibirDash')->name('dados');
	Route::post('/novo/dado', 'DadosController@cadastrar')->name('cadastrardado');


	Route::get('/projetos', 'ProjetosController@listar')->name('projetos');
	Route::get('/novo/projeto', 'ProjetosController@exibirCadastro')->name('exibircadprojeto');
	Route::post('/novo/projeto', 'ProjetosController@cadastrar')->name('cadastrarprojeto');
	Route::post('/buscar/projetos', 'ProjetosController@buscar')->name('buscarprojetos');

	Route::get('/projetos/{id}', 'ProjetosController@exibirficha')->name('fichaprojeto');
	Route::post('/novo/info-projeto}', 'DadosProjetoController@cadastrar')->name('cadastrarinfoprojeto');

	Route::get('/logout', 'AutenticacaoController@logout')->name('logout');

});