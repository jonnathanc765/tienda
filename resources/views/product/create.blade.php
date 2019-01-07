@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2>Agrega un nuevo producto</h2>
                <form action="{{ route('product.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="input-field">
                        <input type="text" id="name" class="validate" name="name" value="{{ old('name') }}">
                        <label for="name">Nombre</label>
                        @if ($errors->has('name'))
                            <span class="helper-text" data-error="wrong" data-success="right"> {{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="input-field">
                        <textarea name="description" id="description" class="materialize-textarea validate">{{ old('description') }}</textarea>
                        <label for="description">Descripcion</label>
                        @if ($errors->has('description'))
                            <span class="helper-text" data-error="wrong" data-success="right"> {{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="input-field">
                        <input type="number" id="quantity" name="quantity" class="validate" value="{{ old('quantity') }}">
                        <label for="quantity">Cantidad</label>
                        @if ($errors->has('quantity'))
                            <span class="helper-text" data-error="wrong" data-success="right"> {{ $errors->first('quantity') }}</span>
                        @endif
                    </div>
                    <div class="input-field">
                        <input type="text" id="value" name="value" class="validate" value="{{ old('value') }}">
                        <label for="value">Precio</label>
                        @if ($errors->has('value'))
                            <span class="helper-text" data-error="wrong" data-success="right"> {{ $errors->first('value') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn waves-effect waves-light">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection