@extends('layouts.adm-dashboard')
@section('title', 'Novo Funcionário')

@section('content')
	
	<div class="row">
		<div class="col-12 col-md-12">

			   	<h3> Cadastrar novo Projeto </h3>
			  	
			  	<p class="text-muted">Cadastre aqui um novo projeto de sua agência</p>
				<hr>
			    <form method="POST" action="{{Route('cadastrarprojeto')}}">
			    	@csrf
					<div class="form-group col-12 col-md-6 float-left">
						<label>Nome</label>
						<input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" value="{{old('nome')}}">
						@if($errors->has('nome'))
							<div class="invalid-feedback">
								{{ $errors->first('nome') }}
							</div>
						@endif
					</div>

					<div class="form-group col-12 col-md-4 float-left">
						<label>Status</label>
						<select class="form-control {{ $errors->has('Status') ? 'is-invalid' : '' }}" type="text" name="Status">
							<option value="Ativo"   {{ old('Status') == 'Ativo' ? 'selected=selected' : '' }}>Ativo</option>
							<option value="Inativo" {{ old('Status') == 'Inativo' ? 'selected=selected' : '' }}>Inativo</option>
							<option value="Pausado" {{ old('Status') == 'Pausado' ? 'selected=selected' : '' }}>Pausado</option>
						</select>
						@if($errors->has('Status'))
							<div class="invalid-feedback">
								{{ $errors->first('Status') }}
							</div>
						@endif
					</div>

					<div class="form-group col-12 col-md-6 float-left" style="clear: left">
						<label>Descrição</label>
						<textarea class="form-control {{ $errors->has('Descricao') ? 'is-invalid' : '' }}" type="text" rows="5" name="Descricao">{{old('Descricao')}}</textarea>
						@if($errors->has('Descricao'))
							<div class="invalid-feedback">
								{{ $errors->first('Descricao') }}
							</div>
						@endif
					</div>
					<div class="form-group  col-12 col-md-4 float-left">
						<label>Data de Cadastro</label>
						<input class="form-control {{ $errors->has('Dt_cadastrado') ? 'is-invalid' : '' }}" type="date" name="Dt_cadastrado" value="{{old('Dt_cadastrado')}}">
						@if($errors->has('Dt_cadastrado'))
							<div class="invalid-feedback">
								{{ $errors->first('Dt_cadastrado') }}
							</div>
						@endif
					</div>
					
					<div class="form-group  col-12 col-md-4 float-left">
						<label>Responsável pelo projeto</label>
						<select class="form-control" type="text" name="Id_resp">
						@foreach($responsaveis as $r)
							<option value="{{$r->id}}" {{ old('Id_resp') == $r->id ? 'selected=selected' : '' }}>{{$r->nome}}</option>
						@endforeach
						</select>
						@if($errors->has('Id_resp'))
							<div class="invalid-feedback">
								{{ $errors->first('Id_resp') }}
							</div>
						@endif
					</div>
					

					<div class="col-12 col-md-12 float-left text-center mt-3">
						<input class="btn btn-primary" type="submit" value="Cadastrar">
						<a class="pl-2" href="{{Route('projetos')}}"> Voltar para projetos</a>	
					</div>
					
				</form>

		</div>
	</div>

@endsection