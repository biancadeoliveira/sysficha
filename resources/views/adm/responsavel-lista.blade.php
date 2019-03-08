@extends('layouts.adm-dashboard')
@section('title', 'Responsáveis')

@section('content')
	<div class="row">
		<div class="col-12 mb-2">
			 <a href="{{Route('exibircadresponsavel')}}" class="btn btn-primary">Novo Responsável</a>
		</div>
		<div class="col-12 col-md-12">
			@if(session('status'))
                <div class="d-block">
					<div class="alert alert-light shadow-sm shadow text-success" role="alert">
                        {{ session('status') }}
                    </div>
                </div>
            @endif
			<table class="table table-bordered table-responsive-md table-striped table-hover">
				<thead class="thead-dark">
					<tr>
						<th scope="col" >Nome</th>
						<th scope="col" >E-mail</th>
						<th scope="col" >Skype</th>
						<th scope="col" >Telefone</th>
						<th scope="col" >Celular</th>	
						<th scope="col" >Desde</th>	
					</tr>
				</thead>
				<tbody>
					@foreach($responsavel as $r)
						<tr>
							<th>{{$r->nome}}</th>
							<th>{{$r->email}}</th>
							<th>{{$r->skype}}</th>
							<th>{{$r->telefone}}</th>
							<th>{{$r->celular}}</th>
							<th>{{$r->dt_inicio}}</th>	
						</tr>
					@endforeach
				</tbody>
					
			</table>
			{{ $responsavel->links() }}
		</div>

		<div class="col-12 col-md-2 text-center">
			
		</div>
	</div>

@endsection