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
		</div>
	</div>
</div>
    <h2>lista de productos vendidos</h2>
    @foreach ($carts->details as $detail)
        {{ $detail->product->name }} <br>
    @endforeach
        Venta total: {{ $total }}
@endsection