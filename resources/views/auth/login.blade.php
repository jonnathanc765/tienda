@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col m12">
            <h2 class="center-align">Bienvenidos a la tienda Virtual</h2>
            <br>
            <div class="card">
                <form method="POST" action="{{ route('login') }}" class="card-content">
                    @csrf
    
                    <div class="input-field col m12 s12">
                        <label for="email" >{{ __('E-Mail') }}</label>
                        <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required autofocus>
    
                        @if ($errors->has('email'))
                        <span class="helper-text" data-error="Error en el email" data-success="Pinta bien">
                            {{ $errors->first('email') }}
                        </span>
                        @endif
                    </div>
    
                    <div class="input-field col m12 s12">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="validate" name="password" required>
                        
                        @if ($errors->has('password'))
                        <span class="helper-text" data-error="Error en la contraseña" data-success="Pinta bien">
                            {{ $errors->first('password') }}
                        </span>
                        @endif
                    </div>
    
                    <p>
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span>Recuerdame</span>
                        </label>
                    </p>
                    <br>
                    <p class="center-align">
                        <button type="submit" class="btn waves-effect waves-light blue">
                            {{ __('Entrar') }}
                        </button>
                        <a href="{{ route('register') }}" class="btn waves-effect waves-light blue">Registrarse</a>
                        @if (Route::has('password.request'))
                            <a class="btn waves-effect waves-light red" href="{{ route('password.request') }}">
                                {{ __('¿Has olvidado tu contraseña?') }}
                            </a>
                        @endif
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
