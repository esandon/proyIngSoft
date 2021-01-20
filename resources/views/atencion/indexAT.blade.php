@extends('layouts.app')

@section('content')


<div class="row">
            <div class="col-12">
                <div class="panel-heading">
                    <div class="card">
                        <br>
                        <br>
                        <h1>Registro de atencion</h1>
                        <br>
                        <br>
                    </div>
                    <div class="panel-body">
                        <div class="card-body">
                            <form action="{{ route('registrarAtencion') }}" method="POST">
                            @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <input type="date" name="fecha_publicacion" class="form-control" required>
                                        <br>
                                        <br>
                                        Rut:
                                        <br>
                                        <br>
                                        <input type="number" name="rut_estudiante" class="form-control" placeholder="RUT sin puntos ni guion" required>
                                        <br>
                                        <br>
                                        Descipcion:
                                        <br>
                                        <br>
                                        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese una descipcion" required>
                                        <br>
                                        <br>
                                        Medio de atencion:
                                        <br>
                                        <br>    
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="medio_atencion">
                                            <option selected></option>
                                            <option value="Otro">Otro</option>
                                            <option value="Entrevista personal">Entrevista personal</option>
                                            <option value="Correo electronico">Correo electronico</option>
                                         </select>
                                        <br>
                                        <br>
                                        <button class="btn btn-success">Registrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection