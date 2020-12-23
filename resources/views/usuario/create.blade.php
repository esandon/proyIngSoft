@extends('layouts.ap')

@section('content')
<form>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                <a href ="{{route('usuario.index')}}"class="btn btn-primary  float-left">Volver</a>
                CREAR USUARIO
                <div class ="card-body text-left">
                
                    <form action="{{route('usuario.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                                <label for="name">NOMBRE</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                           

                            <div class="form-group row">
                            <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                            <div class="col-md-6">
                                <!--<input id="rol" type="text" class="form-control @error('rol') is-invalid @enderror" name="rol" value="{{ old('rol') }}" required autocomplete="rol" autofocus>-->
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Rol</label>
                                </div>
                                <select class="custom-select @error('rol') is-invalid @enderror" id="rol" name="rol"  required autofocus>
                                    <option selected>Seleccionar Rol</option>
                                    <option value="1">SECRETARIA</option>
                                    <option value="2">JEFE DE CARRER</option>
                                    <option value="3">PROFESOR</option>
                                    <option value="4">ADMINISTRADOR</option>
                                </select>
                                </div>

                                @error('rol')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             </div>


                            <div class="form-group">
                                <label for="email">CORREO ELECTRONICO</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">CONTRASEÑA</label>
                                <input type="email" class="form-control" id="password" name="password">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Crear usuario</button>  

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

