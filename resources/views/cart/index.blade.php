@extends('layout')
@section('cart-nav')
active
@endsection

@section('content')
    

    <div class="container">
        <div class="row">
            <div class="col m12 s12">
                <h2>Carrito Actual</h2>
                @if ($errors->any()) 
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                    
                @endif
                <a  class="btn-floating btn-large waves-effect waves-light red tooltipped modal-trigger" href="#modal1" data-tooltip="Vaciar el carrito actual" data-position="top"><i class="material-icons"><i class="far fa-trash-alt"></i></i></a> Vaciar Carrito
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4>Confirmación</h4>
                        <p>¿Esta seguro que desea vaciar todo el carrito? <br>Nota: Esta operacion no se puede deshacer</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('detail.empty') }}" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <table class="highlight centered">
                    <thead>
                      <tr>
                          <th>Cantidad</th>
                          <th>Nombre</th>
                          <th class="hide-on-small-only">Precio</th>
                          <th>Total</th>
                          <th>Acción</th>
                      </tr>
                    </thead>
            
                    <tbody>
                        @foreach ($cart->details as $detail)
                        <tr>
                          <td>{{ $detail->quantity }}</td>
                          <td>{{ $detail->product->name }}</td>
                          <td class="hide-on-small-only">{{ $detail->product->price }} Bs.S</td>
                          <td>{{ $detail->price }} Bs.S</td>
                          <td>
                            <div id="deleteModal-{{ $detail->id }}" class="modal delete">
                                <div class="modal-content">
                                    <h4>Confirmación</h4>
                                    <p>¿Esta seguro que desea eliminar el producto <strong>{{ $detail->product->name }}?</strong> <br><span class="red-text text-darken-2">Nota: Esta accion no se puede revertir</span></p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('detail.destroy', $detail) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="modal-close waves-effect waves-green btn-flat">Aceptar</button>
                                    </form>
                                </div>
                            </div>
                            <a data-target="deleteModal-{{ $detail->id }}" class="btn waves-effect waves-light tooltipped modal-trigger red" data-position="top" data-tooltip="Eliminar"><i class="fas fa-times"></i></a>
                          </td>
                        </tr>       
                        @endforeach
                        <form action="{{ route('detail.store') }}" method="POST" id="carform">
                            {{ csrf_field() }}
                            <tr>
                                <td><input type="number" style="width: 45px;" value="1" name="quantity"></td>
                                <td colspan="2">
                                    <div class="input-field">
                                        <select name="product_id" form="carform" class="" style="max-width:270px;">
                                            @foreach ($products as $product)
                                            <option value="{{ $product->id }}" id="{{ $product->price }}">{{ $product->name }} ====== Stock: {{ $product->quantity }}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </td>
                                <td class="hide-on-small-only"><span class="total"></span> Bs.S</td>
                                <td>
                                    <button type="submit"class="btn waves-effect waves-light tooltipped blue" data-position="top" data-tooltip="Agregar Producto"><i class="fas fa-check"></i></button>
                                </td>
                            </tr>
                        </form>
                            <div class="hide-on-small">
                                <tr>
                                    <td colspan="2">Total producto:</td>
                                    <td colspan="2"><span class="total"></td>
                                </tr>
                            </div>
                            <tr>
                                <td></td>
                                <td class="hide-on-small-only"></td>
                                <td colspan="2">Total: {{ $total }} Bs.S</td>
                                <td><a href="#check" class="btn waves-effect waves-light tooltipped green modal-trigger" data-position="top" data-tooltip="Procesar"><i class="fas fa-file-invoice-dollar"></i></a></td>
                                <div id="check" class="modal">
                                    <form action="{{ route('cart.check') }}" method="POST">
                                        <div class="modal-content">
                                            <h4>Confirmación</h4>
                                            <p>¿Esta seguro que desea procesar esta compra? <br>Nota: revise bien todos los productos</p>
                                        </div>
                                        <div class="modal-footer">
                                            {{ csrf_field() }}
                                            <button type="submit" class="modal-close btn waves-effect waves-light">Aceptar</button>
                                            <a class="modal-close btn waves-effect waves-light red">Cancelar</a>
                                        </div>
                                    </form>
                                </div>
                            </tr>
                        
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    


@endsection

@section('additional-scripts')
<script>

        @if ($errors->first('insufficient'))
            var error = "{{ $errors->first('insufficient') }}";
            M.toast({html: error});
        @endif
        @if ($errors->first('quantity'))
            var error = "{{ $errors->first('quantity') }}";
            M.toast({html: error});
        @endif

        $(document).ready(function() {
            var x = $('select option');
            $('.total').text($('input[type=number]').val()*$(x[0]).attr('id'));
            $('input[type=number]').change(function() {
                var pos = parseInt($('select').val())-1;
                
                var price = $(x[pos]).attr('id');
                
                $('.total').text($(this).val()*price);
            }); 
            $('select').change(function() {
                var pos = parseInt($('select').val())-1;
                console.log('pos: ' + pos);
                var price = $(x[pos]).attr('id');
                console.log('price: ' + price);
                $('.total').text($('input[type=number]').val()*price);
            });            
        });

    </script>
@endsection

