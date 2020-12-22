<div class="form-group">

    {{ Form::label('nombre','NOMBRE')}}
    {{ Form::text('nombre',$Estudiante->nombre, ['class'=>'form-control','readonly','id' =>'nombre']) }}
    <br>
    {{ Form::label('rut','RUT')}}
    {{ Form::text('rut',$Estudiante->rut, ['class'=>'form-control','readonly','id' =>'rut']) }}
    <br>
    {{ Form::label('correo_electronico','CORREO ELECTRONICO')}}
    {{ Form::email('correo_electronico',$Estudiante->correo_electronico, ['class'=>'form-control', 'type' =>'email','id' =>'correo_electronico']) }}
    <br>
    {{ Form::label('codigo_carrera','CARRERA')}}
    {{ Form::number('codigo_carrera',$Estudiante->codigo_carrera, ['class'=>'form-control','readonly','id' =>'codigo_carrera']) }}
    <br>
    
</div>



<div class="form-group text-center">
    {{
      Form::submit('Guardar Datos',['class'=>'btn btn-success'])
    }}
</div>
