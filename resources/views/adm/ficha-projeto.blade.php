@extends('layouts.adm-dashboard')
@section('title', 'Ficha do Projeto')

@section('content')
	<div class="row">
		<div class="col-12 mb-2 text-right p-4">
			<a href="{{Route('projetos')}}" class="text-info">Voltar para projetos</a>
		</div>
		<div class="col-12 col-md-4">
			<div class="jumbotron jumbotron-fluid p-4">
				 <small class="text-muted">nome do projeto: </small>
				 <h2 class="font-weight-bold text-info">{{$projeto->nome}}</h2>
				 <p>Status: {{$projeto->status}}</p>
				 <hr>
				 <p><b>Data de cadastro: {{date('d-m-Y', strtotime($projeto->dt_cadastrado))}}</b></p>
				 <p><b>{{$projeto->descricao}}</b></p>
			</div>

			<div class="jumbotron jumbotron-fluid bg-light p-4">
				 <small class="text-muted">dados do responsável: </small>
				 <h2 class="font-weight-bold">{{$projeto->nomeResp}}</h2>
				 <hr>
				 <p>
				 @if ($projeto->email != null)
				 	<b>E-mail:</b> {{$projeto->email}}<br>
				 @endif
				 @if($projeto->skype != null)
				 	<b>Skype:</b> {{$projeto->skype}}</br>
				 @endif
				 @if($projeto->telefone != null)
				 	<b>Telefone:</b> {{$projeto->telefone}}<br>
				 @endif
				 @if($projeto->celular != null)
				 	<b>Celular:</b> {{$projeto->celular}}
				 @endif
				 </p>
				 
			</div>
		</div>

		<div class="col-12 col-md-8 p-4 border border-left">
			<div class="col-12 ">
				<p>Ficha do Projeto - veja todas as informações registradas.</p>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadinfo">
					Cadastrar
				</button>
			</div>

			
				@foreach ($informacoes as $info)
				<div class="col-12 col-md-4 float-left mt-3">	
				<div class="card text-center">
				  	<div class="card-header bg-dark text-light">
				    	{{$info->tipo}}
				  	</div>
				  	<div class="card-body">
				    	<p class="card-text">
							<b>{{$info->valor}}</b><br>
							<span class="text-muted">{{$info->senha}}</span>
				    	</p>
				  	</div>
				  	<div class="card-footer text-muted">
				    	@if($info->observacoes != null)
							<small>{{$info->observacoes}}</small>
				    	@endif
				  	</div>
				</div>
				</div>
				@endforeach
			

		</div>






		<!-- Modal -->
		<div class="modal fade" id="cadinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			    	<div class="modal-header bg-dark text-light">
			        	<h5 class="modal-title">Cadastrar nova informação</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
			      	</div>
			    	<div class="modal-body p-5">
        				<form method="POST" action="{{Route('cadastrarinfoprojeto')}}">
        					@csrf
        					<input type="hidden" name="id_projeto" value="{{$projeto->id_projeto}}">
							<div class="form-group">
								<label>Tipo</label>
								<select class="form-control" name="id_dado">
									@foreach($tipodados as $td)
										<option value="{{$td->id_dado}}">{{$td->nome}}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label>Valor</label>
								<input class="form-control" type="text" name="valor">
							</div>

							<div class="form-group">
								<label>Senha</label>
								<input class="form-control" type="password" name="senha">
							</div>

							<div class="form-group">
								<label>Observações</label>
								<textarea class="form-control" type="text" name="observacao"> </textarea>
							</div>

							<input type="submit" class="btn btn-primary" value="Salvar">
				        </form>
						
      				</div>
      				<div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				    </div>
				</div>
			</div>
		</div>

	</div>

@endsection