@extends('layouts.adm-dashboard')
@section('title', 'Novo Funcionário')

@section('content')
	
	<div class="row">
		<div class="col-12 col-md-12">

			   	<h3> Cadastrar novo Funcionário </h3>
			  	
			  	<p class="text-muted">Cadastre aqui os funcionários da sua agências</p>
				<hr>
			    <form method="POST" action="{{Route('cadastrarfuncionario')}}">
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
						<label>Cargo</label>
						<input class="form-control {{ $errors->has('cargo') ? 'is-invalid' : '' }}" type="text" name="cargo" value="{{old('cargo')}}">	
						@if($errors->has('cargo'))
							<div class="invalid-feedback">
								{{ $errors->first('cargo') }}
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
						<label>Senha</label>
						<input class="form-control {{ $errors->has('senha') ? 'is-invalid' : '' }}" type="password" name="senha">
						@if($errors->has('senha'))
							<div class="invalid-feedback">
								{{ $errors->first('senha') }}
							</div>
						@endif
					</div>

					<div class="col-12 col-md-12 float-left text-center mt-3">
						<input class="btn btn-primary" type="submit" value="Cadastrar">
						<a class="pl-2" href="{{Route('funcionarios')}}"> Voltar para funcionários</a>	
					</div>
					
				</form>

		</div>
	</div>

@endsection