@extends('layout')

@section('product-nav')
active
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col m12">
            <h2>Productos Registrados</h2>

            <a class="btn-floating btn-large waves-effect waves-light red" href="{{ route('product.create') }}"><i class="material-icons"><i class="fas fa-plus"></i></i></a> Agregar Nuevo Producto
            
            <table class="highlight centered">
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
                            <div id="deleteModal{{ $product->id }}" class="modal delete">
                                <div class="modal-content">
                                    <h4>Confirmación</h4>
                                    <p>¿Esta seguro que desea eliminar el producto <strong>{{ $product->name }}</strong>? <br><span class="red-text text-darken-2">Nota: Esta accion no se puede revertir</span></p>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat delete">Aceptar</a>
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <input value="{{ route('product.destroy', $product) }}" class="route" type="hidden">
                            {{ method_field('DELETE') }}
                            <button data-target="deleteModal{{ $product->id }}" class="btn waves-light waves-effect tooltipped modal-trigger" data-position="top" data-tooltip="Borrar"><i class="fas fa-trash-alt"></i></button>
                            <a href="{{ route('product.edit', $product) }}" class="btn waves-effect waves-light tooltipped" data-position="top" data-tooltip="Editar"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('product.show', $product) }}" class="btn waves-effect waves-light tooltipped" data-position="top" data-tooltip="Ver"><i class="far fa-eye"></i></a>
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
            $('a.delete').click(function() {
                var a = $(this);
                 $.ajax({
                    url : $(this).parents('.modal.delete').siblings('input.route').val(),
                    type: "POST",
                    data : {
                        _token: $(this).parents('.modal.delete').siblings('input[name="_token"]').val(),
                        _method: $(this).parents('.modal.delete').siblings('input[name="_method"]').val(),
                    }
                })
                .done(function(data) {
                    M.toast({html: 'Producto Borrado con exito'});
                    $(a).parents('tr').fadeOut(400);
                })
                .fail(function(data) {
                    M.toast({html: 'No se ha podido borrar el producto'});
                });
            });
        });
    </script>
@endsection