@extends('layouts.adm-dashboard')
@section('title', 'Responsáveis')

@section('content')
	<div class="row">
		
		<div class="col-12 col-md-4 text-center">
			<p class="text-muted">Cadastre aqui os rótulos dos dados</p>
			<hr>
		    <form method="POST" action="{{Route('cadastrardado')}}">
		    	@csrf
				<div class="form-group">
					<label>Nome</label>
					<input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" value="{{old('nome')}}">
					@if($errors->has('nome'))
						<div class="invalid-feedback">
							{{ $errors->first('nome') }}
						</div>
					@endif
				</div>
				<div class="form-group">
					<label>Descrição</label>
					<textarea class="form-control {{ $errors->has('desc') ? 'is-invalid' : '' }}" type="text" name="desc">{{old('desc')}}</textarea>

					@if($errors->has('desc'))
						<div class="invalid-feedback">
							{{ $errors->first('desc') }}
						</div>
					@endif
				</div>
				
				<div class="col-12 col-md-12 float-left text-center mt-3">
					<input class="btn btn-primary" type="submit" value="Cadastrar">
				</div>
				
			</form>
			@if(session('status'))
                <div class="d-block">
					<div class="alert alert-light shadow-sm shadow text-success" role="alert">
                        {{ session('status') }}
                    </div>
                </div>
            @endif
		</div>

		<div class="col-12 col-md-8">
			<table class="table table-bordered table-responsive-md table-striped table-hover">
				<thead class="thead-dark">
					<tr>
						<th scope="col" >Id</th>
						<th scope="col" >Nome</th>
						<th scope="col" >Descrição</th>
					</tr>
				</thead>
				<tbody>
					@foreach($dados as $d)
						<tr>
							<th>{{$d->id_dado}}</th>
							<th>{{$d->nome}}</th>
							<th>{{$d->descricao}}</th>
						</tr>
					@endforeach
				</tbody>
					
			</table>
			{{ $dados->links() }}
		</div>

		
	</div>

@endsection