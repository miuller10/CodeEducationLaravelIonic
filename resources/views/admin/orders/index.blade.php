@extends('app')
@section('content')

	<div class="container">
		<h3>Pedidos</h3><br>
		
		<table class="table table-hover table-striped table-bordered">

			<thead>
				
				<tr>
					
					<th>ID</th>
					<th>Total</th>					
					<th>Data</th>
					<th>Itens</th>					
					<th>Entregador</th>
					<th>Status</th>
					<th>AÇÃO</th>

				</tr>

			</thead>
		
			<tbody>
				@foreach($orders as $order)
				<tr>
					
					<td>#{{ $order->id }}</td>
					<td>R$ {{ $order->total }}</td>
					<td>{{ $order->created_at }}</td>

					<td>
					<ul>
						@foreach($order->items as $item)

							<li>{{ $item->product->name }}</li>	

						@endforeach
					</ul>
					</td>

					<td>
						@if($order->deliveryman)
							{{ $order->deliveryman->name }}
							@else
								--
						@endif
					</td>

					<td>{{ $order->status }}</td>

					<td>
						<a class="btn btn-success btn-sm" href="{{ route( 'admin.orders.edit', ['id' => $order->id] ) }}">Editar</a>
					</td>

				</tr>
				@endforeach
			</tbody>

		</table>
	<!-- Paginação dos dados -->
	{!! $orders->render() !!}
		
	</div>
	
	

@endsection
