@extends('layouts.adm-dashboard')
@section('title', 'Projetos')

@section('content')
	<div class="row">
		<div class="col-12 mb-2">
			 <a href="{{Route('exibircadprojeto')}}" class="btn btn-primary">Novo Projeto</a>
		</div>
		<div class="col-12 col-md-12">
			@if(session('status'))
                <div class="d-block">
					<div class="alert alert-light shadow-sm shadow text-success" role="alert">
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            <div class="col-12 col-md-4 m-auto">
            	<form method="POST" class="mt-2 mb-2" action="{{Route('buscarprojetos')}}">
            	@csrf
            	<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="digite o nome do projeto..." name="buscar">
				  	<div class="input-group-append">
				    	<input class="btn btn-secondary" type="submit" id="button-addon2" value="Buscar">
				  	</div>
				</div>


            	</form>
            </div>
            
			<table class="table table-bordered table-responsive-md table-striped table-hover">
				<thead class="thead-dark">
					<tr>
						<th scope="col" >Nome</th>
						<th scope="col" >Descricao</th>
						<th scope="col" >Status</th>
						<th scope="col" >Responsável</th>
						<th scope="col" >-</th>
					</tr>
				</thead>
				<tbody>
					@foreach($projetos as $p)
						<tr>
							<th>{{$p->nome}}</th>
							<th>{{$p->descricao}}</th>
							<th>{{$p->status}}</th>
							<th><a href="">{{$p->nomeResp}}</a></th>
							<th><a href="{{Route('fichaprojeto', ['id' => $p->id_projeto])}}" class="btn btn-info btn-sm text-light">Acessar</a></th>
						</tr>
					@endforeach
				</tbody>
					
			</table>
			{{ $projetos->links() }}
		</div>

	</div>

@endsection