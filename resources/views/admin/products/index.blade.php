@extends('app')
@section('content')

	<div class="container">
		<h3>Produtos</h3><br>

		<a href="{{ route('admin.products.create') }}" class="btn btn-primary">Novo Produto</a><br>
		
		<table class="table" style="margin-top:40px;">

			<thead>
				
				<tr>
					
					<th>ID</th>
					<th>NOME</th>
					<th>Categoria</th>
					<th>Preço</th>
					<th>AÇÃO</th>

				</tr>

			</thead>
		
			<tbody>
				@foreach($products as $product)
				<tr>
					
					<td>{{ $product->id }}</td>
					<td>{{ $product->name }}</td>
					<td>{{ $product->category->name }}</td>
					<td>{{ $product->price }}</td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('admin.products.edit', ['id'=> $product->id]) }}">Editar</a>
						<a class="btn btn-danger btn-sm" href="{{ route('admin.products.destroy', ['id'=> $product->id]) }}">Deletar</a>
					</td>

				</tr>
				@endforeach
			</tbody>

		</table>
	<!-- Paginação dos dados -->
	{!! $products->render() !!}
		
	</div>	

@endsection