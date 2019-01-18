@extends('layout')

@section('content')

<div class="container">
    <div class="col m12">

        <h2 class="header">Producto #{{ $product->id }}</h2>
        <div class="card horizontal">
            <div class="card-image">
                <img src="{{ asset('img/producto.jpg') }}">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <h2 class="header">{{ $product->name }}</h2>
                    <p><strong>{{ $product->description }}</strong></p>
                    <p>Stock: {{ $product->quantity }}</p>
                    <p>Precio: {{ $product->price }} Bs.S</p>
                </div>
                <div class="card-action">
                    <a href="{{ route('product.edit',$product) }}">Editar</a>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection