@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2>Editar producto #{{ $product->id }}</h2>
                <form action="{{ route('product.update', $product) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="input-field">
                        <input type="text" id="name" class="validate" name="name" value="{{ old('name',$product->name) }}">
                        <label for="name">Nombre</label>
                        @if ($errors->has('name'))
                            <span class="helper-text" data-error="wrong" data-success="right"> {{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="input-field">
                        <textarea name="description" id="description" class="materialize-textarea validate">{{ old('description',$product->description) }}</textarea>
                        <label for="description">Descripcion</label>
                        @if ($errors->has('description'))
                            <span class="helper-text" data-error="wrong" data-success="right"> {{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="input-field col m6">
                        <textarea name="price" id="price" class="materialize-textarea validate">{{ old('price',$product->price) }}</textarea>
                        <label for="price">Precio</label>
                        @if ($errors->has('price'))
                            <span class="helper-text" data-error="wrong" data-success="right"> {{ $errors->first('price') }}</span>
                        @endif
                    </div>
                    <div class="input-field col m6">
                        <input type="number" id="quantity" name="quantity" class="validate" value="{{ old('quantity',$product->quantity) }}">
                        <label for="quantity">Cantidad</label>
                        @if ($errors->has('quantity'))
                        <span class="helper-text" data-error="wrong" data-success="right"> {{ $errors->first('quantity') }}</span>
                    @endif
                    </div>
                    <button type="submit" class="btn waves-effect waves-light">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection