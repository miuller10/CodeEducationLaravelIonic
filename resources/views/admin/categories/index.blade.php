@extends('app')
@section('content')

	<div class="container">
		<h3>Categorias</h3><br>

		<a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Nova categoria</a>
		
		<table class="table">

			<thead>
				
				<tr>
					
					<th>ID</th>
					<th>NOME</th>
					<th>AÇÃO</th>

				</tr>

			</thead>
		
			<tbody>
				@foreach($categories as $category)
				<tr>
					
					<td>{{ $category->id }}</td>
					<td>{{ $category->name }}</td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('admin.categories.edit', ['id'=> $category->id]) }}">Editar</a>
					</td>

				</tr>
				@endforeach
			</tbody>

		</table>
	<!-- Paginação dos dados -->
	{!! $categories->render() !!}
		
	</div>
	
	

@endsection