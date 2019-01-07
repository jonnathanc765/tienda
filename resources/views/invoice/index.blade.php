@extends('layout')

@section('content')
<style>
input[type="number"] {
    max-width: 50px;
}

</style>
    <div class="container">
        <div class="row">
            <div class="col m12 col s12">
                <h2>Factura</h2>
                <p>En esta sección se muestra la factura actual, para terminar con esta la puede dar como vendida, o la puede eliminar</p>
                <table class="highlight centered responsive-table">
                    <thead>
                        <tr>
                            <th>Codigo Producto</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Sub-Total</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice->details as $details)                        
                        <tr>
                            <td>{{ $details->product->id }}</td>
                            <td>{{ $details->product->name }}</td>
                            <td>{{ $details->quantity }}</td>
                            <td>Bs. {{ $details->subtotal }}</td>
                            <td>Bs. {{ $details->total }}</td>
                            <td>
                                <form action="{{ route('detail.destroy', $details) }}" method="POST" id="destroy-form">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a class="btn waves-effect waves-light btn-destroy"><i class="fas fa-trash"></i></a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td><input type="number" value="1" id="product-quantity"></td>
                            <td colspan="2">
                                <select name="product" id="product">
                                    <option value="0">Agregar Nuevo Producto</option>
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            {{-- <td></td> --}}
                            <td colspan="2"><span id="Total">Bs. 250000</span></td>
                            <td>
                                <a href="#" class="btn waves-effect waves-light"><i class="fas fa-check"></i></a>
                                <a href="#" class="btn waves-effect waves-light"><i class="fas fa-times"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                   
                

            </div>
        </div>
    </div>
@endsection

@section('additional-scripts')

<script>
    $(document).ready(function() {
        var i = $('select#product').val();
        if (i > 0 ) {
            $('#total').text($('#product-value').val()*$('#product-quantity').val());
        } else {
            $('#total').text('Bs. 0');
        }
        $('select#product').change(function() {
            var i = $('select#product').val();
            if (i != 0 ) {
                $('#total').text('Bs. ' + $('#product-value').val()*$('#product-quantity').val());
            } else {
                $('#total').text('Bs. 0');
            }
        });

        $('.btn-destroy').click(function() {
            var data = $(this).parent('form').serialize();
            $(this).attr('disabled');
            $(this).parents('tr').fadeOut(500);
            $.ajax({
                url : $(this).parent('form').attr('action'),
                type: "POST",
                data : data
            })
            .fail(function(data) {
                alert( "Error al conectar a la base de datos" );
            })
        });






    });
</script>
    
@endsection