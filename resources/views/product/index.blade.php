@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col m12">
            <h2>Productos Registrados</h2>

            <a class="btn-floating btn-large waves-effect waves-light red" href="{{ route('product.create') }}"><i class="material-icons"><i class="fas fa-plus"></i></i></a> Agregar Nuevo Producto
            
            <table class="striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection