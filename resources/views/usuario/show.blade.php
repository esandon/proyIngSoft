@extends('layouts.layout')

@section('content')
<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('estudiante.index')}}"class="btn btn-primary  float-left">Volver</a>
                    ESTUDIANTE
                </div>
                    <div class ="card-body text-left">
                            <p><strong>Nombre: </strong>{{$Estudiante->name}}</p>
                            <p><strong>Rut: </strong>{{$Estudiante->rut}}</p>
                            <p><strong>E-mail: </strong>{{$Estudiante->email}}</p>
                            @if($Estudiante->correo_electronico != null)
                                <p><strong>Correo electronico: </strong>{{$Estudiante->correo_electronico}}</p>
                            @else
                                <p><strong>Correo electronico: </strong>No registra correo electronico</p>
                            @endif
                    </div>
                </div>
                <!-- aca solo mostramos lo que se recibe como parametro $type y sus atributos-->
            </div>
        </div>
    </div>
</div>
@endsection