@extends('layouts.adm-dashboard')
@section('title', 'Novo Funcionário')

@section('content')
	
	<div class="row">
		<div class="col-12 col-md-12">

			   	<h3> Cadastrar novo Responsável </h3>
			  	
			  	<p class="text-muted">Cadastre aqui os pessoas a serem responsáveis de projetos</p>
				<hr>
			    <form method="POST" action="{{Route('cadastrarresponsavel')}}">
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

					<div class="form-group col-12 col-md-6 float-left">
						<label>E-mail</label>
						<input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" value="{{old('email')}}">
						@if($errors->has('email'))
							<div class="invalid-feedback">
								{{ $errors->first('email') }}
							</div>
						@endif
					</div>

					<div class="form-group col-12 col-md-4 float-left">
						<label>Skype</label>
						<input class="form-control {{ $errors->has('skype') ? 'is-invalid' : '' }}" type="text" name="skype" value="{{old('skype')}}">
						@if($errors->has('skype'))
							<div class="invalid-feedback">
								{{ $errors->first('skype') }}
							</div>
						@endif
					</div>

					<div class="form-group  col-12 col-md-4 float-left">
						<label>Telefone</label>
						<input class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}" type="text" name="telefone" value="{{old('telefone')}}">
						@if($errors->has('telefone'))
							<div class="invalid-feedback">
								{{ $errors->first('telefone') }}
							</div>
						@endif
					</div>

					<div class="form-group  col-12 col-md-4 float-left">
						<label>Celular</label>
						<input class="form-control {{ $errors->has('celular') ? 'is-invalid' : '' }}" type="text" name="celular" value="{{old('celular')}}">
						@if($errors->has('celular'))
							<div class="invalid-feedback">
								{{ $errors->first('celular') }}
							</div>
						@endif
					</div>

					<div class="form-group  col-12 col-md-4 float-left">
						<label>Data de vinculo</label>
						<input class="form-control {{ $errors->has('dt_inicio') ? 'is-invalid' : '' }}" type="date" name="dt_inicio" value="{{old('dt_inicio')}}">
						@if($errors->has('dt_inicio'))
							<div class="invalid-feedback">
								{{ $errors->first('dt_inicio') }}
							</div>
						@endif
					</div>

					<div class="col-12 col-md-12 float-left text-center mt-3">
						<input class="btn btn-primary" type="submit" value="Cadastrar">
						<a class="pl-2" href="{{Route('responsaveis')}}"> Voltar para Responsáveis</a>	
					</div>
					
				</form>

		</div>
	</div>

@endsection