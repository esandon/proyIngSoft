@extends('layouts.layout')

@section('content')
<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('estudiante.index')}}"class="btn btn-primary float-left">Volver</a>
                    EDITAR CORREO ELECTRONICO: {{$correo_electronicoFormateado}}.

                    <div class = "card-body texr-left">
                    {!! Form::model($Estudiante,['route' =>['estudiante.update',$Estudiante->rut],'method' => 'PUT']) !!}
                    @include('Estudiante.partials.form')s
                    {!!Form::close()!!}
                    </div>
                </div>
                <!-- aca hacemos el llamado al form que se encargara de recibir los datos y guardarlos-->
            </div>
        </div>
    </div>
</div>
@endsection