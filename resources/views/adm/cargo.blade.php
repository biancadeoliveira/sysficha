@extends('layouts.adm-dashboard')
@section('title', 'Novo cargo')

@section('content')
	<div class="row">
		<div class="col-12 col-md-4">

			<h3> Cadastrar novo Cargo </h3>

	  		<p class="text-muted">Cadastre aqui os cargos que serão atribuidos aos funcionários</p>
			<small class="text-muted">Ex. Designer, Programador, Secretaria... </small>
			  		
	  		<hr>
	    	<form>
				<div class="form-group">
					<label>Nome</label>
					<input class="form-control" type="text" name="Nome">
				</div>
				<div class="form-group">
					<label>Descrição</label>
					<textarea class="form-control" rows="3"></textarea>
				</div>
					<input class="btn btn-primary" type="submit" value="Cadastrar">
			</form>
		</div>

		<div class="col-12 col-md-8">
			<table class="table table-bordered table-responsive-md table-striped table-hover">
				<thead class="thead-dark">
					<tr>
						<th scope="col" >Cód</th>
						<th scope="col" >Nome</th>
						<th scope="col" >Descrição</th>
						<th scope="col" >#</th>	
					</tr>
				</thead>
					
			</table>
		</div>

	</div>

@endsection