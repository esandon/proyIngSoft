@extends('layouts.ap')

@section('content')

<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">

                    <a href ="{{route('usuario.index')}}"class="btn btn-primary float-left">Volver</a>
                    EDITAR DATOS USUARIO: {{$User->name}}
                    
                    <div class="div">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    </div>
                    
                    <div class ="card-body text-left">
                    {!! Form::model($User,['route' =>['usuario.update',$User->id],'method' => 'PUT']) !!}
                    @include('usuario.partials.form')
                    {!!Form::close()!!}
                    </div>
                </div>
                <!-- aca hacemos el llamado al form que se encargara de recibir los datos y guardarlos-->
            </div>
        </div>
    </div>
</div>   
  
@endsection
