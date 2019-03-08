@extends('layouts.adm-dashboard')
@section('title', 'Funcionários')

@section('content')
	<div class="row">
		<div class="col-12 mb-2">
			 <a href="{{Route('exibircadfuncionario')}}" class="btn btn-primary">Novo Funcionario</a>
		</div>
		<div class="col-12 col-md-10">
			<table class="table table-bordered table-responsive-md table-striped table-hover">
				<thead class="thead-light">
					<tr>
						<th scope="col" >Cód</th>
						<th scope="col" >Nome</th>
						<th scope="col" >E-mail</th>
						<th scope="col" >Cargo</th>
						<th scope="col" >Celular</th>
					</tr>
				</thead>
				<tbody>
					@foreach($funcionarios as $f)
						<tr>
							<th>{{$f->id}}</th>
							<th>{{$f->nome}}</th>
							<th>{{$f->email}}</th>
							<th>{{$f->cargo}}</th>
							<th>{{$f->celular}}</th>
						</tr>
					@endforeach
				</tbody>
					
			</table>
			{{ $funcionarios->links() }}
		</div>

		<div class="col-12 col-md-2 text-center">
			<div class="bg-info text-white p-4">
				<small class="p-0 m-0 text-uppercase">Total de</small>
				<h1 class="m-0 p-0">{{$funcionarios->count()}}</h1>
				<small class="m-0 p-0 text-uppercase">funcionários!</small>
			</div>
		</div>
	</div>

@endsection