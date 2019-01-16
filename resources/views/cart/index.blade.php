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
                          <th>Acción</th>
                      </tr>
                    </thead>
            
                    <tbody>
                        @foreach ($cart->details as $detail)
                        <tr>
                          <td>{{ $detail->quantity }}</td>
                          <td>{{ $detail->product_id }}</td>
                          <td>2.25 Bs.S</td>
                          <td>
                              <a href="#" class="btn waves-effect waves-light tooltipped" data-position="top" data-tooltip="Eliminar"><i class="fas fa-times"></i></a>
                          </td>
                        </tr>       
                        @endforeach
                        <tr>
                            <td><input type="number" style="width: 45px;"></td>
                            <td colspan="2">
                                <select name="" id="">
                                    @foreach ($products as $product)
                                    <option value="">{{ $product->name }}</option>    
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <a href="" class="btn waves-effect waves-light"><i class="fas fa-check"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td colspan="2">Total: 2500 Bs.S</td>
                            <td><a href="#" class="btn waves-effect waves-light tooltipped" data-position="top" data-tooltip="Procesar"><i class="fas fa-file-invoice-dollar"></i></a></td>
                        </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>


@endsection