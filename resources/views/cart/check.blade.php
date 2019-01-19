@extends('layout')

@section('content')
    <h2>lista de productos vendidos</h2>
    @foreach ($carts->details as $detail)
        {{ $detail->product->name }} <br>
    @endforeach
        Venta total: {{ $total }}
@endsection