@extends('layout')

@section('content')
    

    <div class="container">
        <div class="row">
            <div class="col m12">
                <h2>Carrito Actual</h2>

                <table>
                    <thead>
                      <tr>
                          <th>Name</th>
                          <th>Item Name</th>
                          <th>Item Price</th>
                      </tr>
                    </thead>
            
                    <tbody>
                        @foreach ($cart->details as $detail)
                        <tr>
                          <td>{{ $detail->quantity }}</td>
                          <td>Eclair</td>
                          <td>$0.87</td>
                        </tr>       
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>


@endsection