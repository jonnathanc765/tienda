@extends('layout')

@section('content')

<style>
    @media (max-width: 600px) {
        .form {
            display: flex;
            flex-direction: row;
            justify-content: space-between;

        }
    }
</style>

<div class="container">
    <div class="row">
        <div class="col m12 s12">
            <h2 class="center-align">Lista de Facturas</h2>

            <form action="" method="GET">
                <div class="col m6 s12 form">
                    <p>
                        <label>
                            <input type="radio" name="range" value="yesterday"
                            @if($time_array == 'yesterday')
                                checked="true" 
                            @endif />
                            <span>Ayer</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input type="radio" name="range" value="today"
                            @if($time_array == 'today')
                                checked="true" 
                            @endif />
                            <span>Hoy</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input type="radio" name="range" value="month"
                            @if($time_array == 'month')
                                checked="true" 
                            @endif/>
                            <span>Mes</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input type="radio" name="range" value="range" 
                            @if($time_array == 'range')
                                checked="true" 
                            @endif/>
                            <span>Rango</span>
                        </label>
                    </p>
                </div>

                <div class="col m6 s12">
                
                        <p>Seleccione el rango</p>
                        <div class="input-field">
                            <input id="desde" type="text" class="datepicker" name="from" disabled>
                            <label for="desde">Desde</label>
                        </div>
                        <div class="input-field">
                            <input id="hasta" type="text" class="datepicker" name="to" disabled>
                            <label for="hasta">Hasta</label>
                        </div>
                        <button type="submit" class="btn waves-effect waves-light blue" disabled>Consultar</button>
                    
                </div>
            </form>
          


            


            <table class="centered highlight">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Fecha</th>
                      <th>Total Factura</th>
                      <th>Acciones</th>
                  </tr>
                </thead>
        
                <tbody>
                @foreach ($carts as $cart)
                
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ date_format($cart->created_at, 'g:ia \o\n l jS F Y') }}</td>
                  <td>{{ $cart->total }} Bs.S</td>
                  <td><a href="#" class="btn waves-effect waves-light tooltipped blue" data-tooltip="Ver detalles de la factura" data-position="top"><i class="far fa-eye"></i></a></td>
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
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                format: 'yyyy-mm-dd',
                showClearBtn: true,
                autoClose: true,
            });
        });

        $(document).ready(function () {

            
             
            $('input[name=range]').change(function() {
                if ($(this).val() == 'range') {
                    $('.datepicker').removeAttr('disabled');
                    $('button').removeAttr('disabled');
                } else {
                    $('.datepicker').val('');
                    $('.datepicker').attr('disabled');
                    $('form').submit();
                }
            });
        });
    </script>
@endsection
