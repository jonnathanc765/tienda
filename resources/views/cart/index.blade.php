@extends('layout')

@section('content')
    

    <div class="container">
        <div class="row">
            <div class="col m12">
                <h2>Carrito Actual</h2>

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
                                    <select name="product_id" form="carform">
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>    
                                        @endforeach
                                    </select>
                                </td>
                                <td>25 Bs.S</td>
                                <td>
                                    <button type="submit"class="btn waves-effect waves-light tooltipped" data-position="top" data-tooltip="Agregar Producto"><i class="fas fa-check"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>23</td>
                                <td colspan="3">Total: 2500 Bs.S</td>
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
    @if ($errors->first('quantity'))
        <p class="error">
            {{ $errors->first('insufficient') }}
        </p>
        <script>
            M.toast({'html': $('p.error').text()});
        </script>
    @endif
@endsection