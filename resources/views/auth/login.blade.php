@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col m12">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-field">
                    <label for="email" >{{ __('E-Mail') }}</label>
                    <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                    <span class="helper-text" data-error="Error en el email" data-success="Pinta bien">
                        {{ $errors->first('email') }}
                    </span>
                    @endif
                </div>

                <div class="input-field">
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
                    
                <button type="submit" class="btn waves-effect waves-light">
                    {{ __('Entrar') }}
                </button>
                @if (Route::has('password.request'))
                    <a class="btn waves-effect waves-light" href="{{ route('password.request') }}">
                        {{ __('¿Has olvidado tu contraseña?') }}
                    </a>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
