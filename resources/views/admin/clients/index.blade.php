@extends('app')
@section('content')

	<div class="container">
		<h3>Clients</h3><br>

		<a href="{{ route('admin.clients.create') }}" class="btn btn-primary">Novo cliente</a><br><br>
		
		<table class="table table-bordered table-striped table-hover">

			<thead>
				
				<tr>
					
					<th>ID</th>
					<th>NOME</th>
					<th>AÇÃO</th>

				</tr>

			</thead>
		
			<tbody>
				@foreach($clients as $client)
				<tr>
					
					<td>{{ $client->id }}</td>
					<td>{{ $client->user->name }}</td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('admin.clients.edit', ['id'=> $client->id]) }}">Editar</a>
					</td>

				</tr>
				@endforeach
			</tbody>

		</table>
	<!-- Paginação dos dados -->
	{!! $clients->render() !!}
		
	</div>
	
	

@endsection