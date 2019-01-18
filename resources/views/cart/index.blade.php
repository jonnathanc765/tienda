@extends('layout')

@section('content')
    

    <div class="container">
        <div class="row">
            <div class="col m12">
                <h2>Carrito Actual</h2>
                <a class="btn-floating btn-large waves-effect waves-light red tooltipped" data-tooltip="Vaciar el carrito actual" data-position="top"><i class="material-icons"><i class="far fa-trash-alt"></i></i></a> Vaciar Carrito
                <table class="highlight centered">
                    <thead>
                      <tr>
                          <th>Cantidad</th>
                          <th>Nombre</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th>Acción</th>
                      </tr>
                    </thead>
            
                    <tbody>
                        @foreach ($cart->details as $detail)
                        <tr>
                          <td>{{ $detail->quantity }}</td>
                          <td>{{ $detail->product->name }}</td>
                          <td>{{ $detail->product->price }} Bs.S</td>
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
                            <a data-target="deleteModal-{{ $detail->id }}" class="btn waves-effect waves-light tooltipped modal-trigger" data-position="top" data-tooltip="Eliminar"><i class="fas fa-times"></i></a>
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
                                <td><span id="total"></span> Bs.S</td>
                                <td>
                                    <button type="submit"class="btn waves-effect waves-light tooltipped" data-position="top" data-tooltip="Agregar Producto"><i class="fas fa-check"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>23</td>
                                <td colspan="3">Total: {{ $total }} Bs.S</td>
                                <td><a href="#" class="btn waves-effect waves-light tooltipped" data-position="top" data-tooltip="Procesar"><i class="fas fa-file-invoice-dollar"></i></a></td>
                            </tr>
                        </form>
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
            $('#total').text($('input[type=number]').val()*$(x[0]).attr('id'));
            $('input[type=number]').change(function() {
                var pos = parseInt($('select').val())-1;
                
                var price = $(x[pos]).attr('id');
                
                $('#total').text($(this).val()*price);
            }); 
            $('select').change(function() {
                var pos = parseInt($('select').val())-1;
                console.log('pos: ' + pos);
                var price = $(x[pos]).attr('id');
                console.log('price: ' + price);
                $('#total').text($('input[type=number]').val()*price);
            });            
        });

    </script>
@endsection

