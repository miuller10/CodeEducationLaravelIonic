@extends('app')
@section('content')

	<div class="container">
		<h3>Cupons</h3><br>

		<a href="{{ route('admin.cupoms.create') }}" class="btn btn-primary">Novo cupom</a>
		
		<table class="table">

			<thead>
				
				<tr>
					
					<th>ID</th>
					<th>Código</th>
					<th>Valor</th>
					<th>AÇÃO</th>

				</tr>

			</thead>
		
			<tbody>
				@foreach($cupoms as $cupom)
				<tr>
					
					<td>{{ $cupom->id }}</td>
					<td>{{ $cupom->code }}</td>
					<td>{{ $cupom->value }}</td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('admin.cupoms.edit', ['id'=> $cupom->id]) }}">Editar</a>
					</td>

				</tr>
				@endforeach
			</tbody>

		</table>
	<!-- Paginação dos dados -->
	{!! $cupoms->render() !!}
		
	</div>
	
	

@endsection