@extends('layouts.ap')



@section('content')

@guest

@else

    @if(Auth::user()->rol == 'ADMINISTRADOR')

    @else

    @endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href ="{{route('usuario.index')}}"class="btn btn-primary float-left">Volver</a>
            <div class="card">
           
                <div class="card-header text-center font-weight-bold">
               

                    <div class="card-header">{{ __('Registrar Usuario') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <script>
                               function estadoCarrera(){
                                   var rol = document.getElementById('rol');
                                   var es = document.getElementById('carrera');

                                   if(rol.value == "JEFE DE CARRERA"){
                                        es.disabled = false;

                                   }else {
                                       es.disabled = true;
                                   }
                               }
                            </script>

                            <div class="form-group row">
                                <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                                <div class="col-md-6">
                                    <!--<input id="rol" type="text" class="form-control @error('rol') is-invalid @enderror" name="rol" value="{{ old('rol') }}" required autocomplete="rol" autofocus>-->
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Rol</label>
                                    </div>
                                    <select class="custom-select @error('rol') is-invalid @enderror" id="rol" name="rol"  required autofocus onchange='estadoCarrera();'>
                                        <option selected>Seleccionar Rol</option>
                                        <option value="SECRETARIA">SECRETARIA</option>
                                        <option value="JEFE DE CARRERA">JEFE DE CARRERA </option>
                                        <option value="PROFESOR">PROFESOR</option>
                                        <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                    </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect02">CARRERA</label>
                                            </div>
                                            <select class="custom-select " id="carrera" name="carrera" required autofocus >
                                                <option selected>Seleccione Carrera</option>
                                                <option value="ienci">INGENIERÍA EN COMPUTACIÓN E INFORMATICA</option>
                                                <option value="icci">INGENIERÍA CIVIL EN COMPUTACIÓN E INFORMATICA</option>
                                            </select>

                                        @error('rol')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
@endguest

@endsection
