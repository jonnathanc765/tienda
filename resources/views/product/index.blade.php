@extends('layout')

@section('product-nav')
active
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col m12 s12">
                <div class="container">
                    <nav>
                        <div class="nav-wrapper blue darken-3">
                            <form>
                            <div class="input-field">
                                <input id="search" type="search" required>
                                <label class="label-icon" for="search">
                                    <i class="material-icons">
                                        <i class="fas fa-search"></i>
                                    </i></label>
                                <i class="material-icons"><i class="fas fa-times"></i></i>
                            </div>
                            </form>
                        </div>
                    </nav
                </div>
            <h2>Productos Registrados</h2>
      

            <a class="btn-floating btn-large waves-effect waves-light red" href="{{ route('product.create') }}"><i class="material-icons"><i class="fas fa-plus"></i></i></a> Agregar Nuevo Producto
            
            <table class="highlight centered">
                <thead>
                    <tr>
                        <th class="hide-on-small-only">ID</th>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td class="hide-on-small-only">{{ $product->id }}</td>
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
                            <button data-target="deleteModal{{ $product->id }}" class="btn red waves-light waves-effect tooltipped modal-trigger" data-position="top" data-tooltip="Borrar"><i class="fas fa-trash-alt"></i></button>
                            <a href="{{ route('product.edit', $product) }}" class="btn waves-effect waves-light tooltipped" data-position="top" data-tooltip="Editar"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('product.show', $product) }}" class="btn waves-effect waves-light amber tooltipped" data-position="top" data-tooltip="Ver"><i class="far fa-eye"></i></a>
                            <a class="btn waves-effect waves-light tooltipped green modal-trigger" data-position="top" data-tooltip="Agregar al carrito actual" href="#modal-add-{{ $product->id }}"><i class="fas fa-plus"></i></a>
                            <div id="modal-add-{{ $product->id }}" class="modal">
                                <form action="{{ route('detail.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="modal-content">
                                        <h4>Agregar la Factura Actual</h4>
                                        <p>Ingrese la cantidad que de <h5>{{ $product->name }}</h5> que desea añadir al carrito</p>
                                        <div class="input-field">
                                            <p class="range-field">
                                                <input type="range" min="1" max="{{ $product->quantity }}" name="quantity" />
                                            </p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn waves-effcet waves-light green">Aceptar</button>
                                        <button class="btn waves-effect waves-light red modal-close">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>

            {{ $products->links() }}
            
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