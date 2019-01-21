@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col m12">
			<h2 class="center-align">Productos Vendidos</h2>
			<table class="centered striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Cantidad</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($carts->details as $detail)
					<tr>
						<td>{{ $detail->product->id }}</td>
						<td>{{ $detail->product->name }}</td>
						<td>{{ $detail->quantity }}</td>
						<td>Bs.S {{ $detail->price }}</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="3">Venta Total:</td>
						<td>Bs.S {{ $total }}</td>
					</tr>
				</tbody>
			</table>
			<a href="#" class="btn waves-effect waves-light">Ver Venta Completa</a>
			<a href="{{ url()->previous() }}" class="btn waves-effect waves-light blue">Volver al carrito</a>
			<a href="#" class="btn waves-effect waves-light red right-align">Generar PDF</a>
		</div>
	</div>
</div>
@endsection