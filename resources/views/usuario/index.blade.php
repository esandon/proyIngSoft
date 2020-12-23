@extends('layouts.ap')



@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('home')}}"class="btn btn-primary float-left">Volver</a>
                     Lista de Usuarios
                     <a href ="{{route('register')}}"class="btn btn-success float-right">Agregar Usuario</a>
                </div>
                

            </div>
        </div>
    </div>
</div>


@endsection