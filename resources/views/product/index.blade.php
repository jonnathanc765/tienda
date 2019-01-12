@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col m12">
            <h2>Productos Registrados</h2>

            <a class="btn-floating btn-large waves-effect waves-light red" href="{{ route('product.create') }}"><i class="material-icons"><i class="fas fa-plus"></i></i></a> Agregar Nuevo Producto
            
            <table class="highlight">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            {{ csrf_field() }}
                            <input value="{{ route('product.destroy', $product) }}" class="route" type="hidden">
                            {{ method_field('DELETE') }}
                            <button href="#" class="btn waves-light waves-effect tooltipped delete" data-position="top" data-tooltip="Borrar"><i class="fas fa-trash-alt"></i></button>
                            <a href="{{ route('product.edit', $product) }}" class="btn waves-effect waves-light tooltipped" data-position="top" data-tooltip="Editar"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection

@section('additional-scripts')
    <script>
        $(document).ready(function() {
            $('button.delete').click(function() {
                 $(this).parents('tr').fadeOut(400);
                 $(this).siblings('input.route').val();
                 $.ajax({
                    url : $(this).siblings('input.route').val(),
                    type: "POST",
                    data : {
                        _token: $(this).siblings('input[name="_token"]').val(),
                        _method: $(this).siblings('input[name="_method"]').val(),
                    }
                })
                .done(function(data) {
                    M.toast({html: 'Producto Borrado con exito'}) 
                })
                .fail(function(data) {
                    alert( "error" );
                });
            });
        });
    </script>
@endsection