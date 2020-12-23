<div class="form-group">

    {{ Form::label('name','NOMBRE')}}
    {{ Form::text('name',$User->name, ['class'=>'form-control','id' =>'name']) }}
    <br>
    {{ Form::label('email','CORREO ELECTRONICO')}}
    {{ Form::email('email',$User->email, ['class'=>'form-control', 'type' =>'email','id' =>'email']) }}
    <br>
    {{ Form::label('rol','ROL')}}
    
</div>

<div class="input-group mb-3"> 
  <button class="btn btn-outline-secondary" type="button">ROL</button>
  <select class="form-select" id="rol" name="rol" aria-label="Example select with button addon" required>
    <option selected>Opciones</option>
    <option value="SECRETARIA">SECRETARIA</option>
    <option value="JEFE DE CARRERA">JEFE DE CARRERA</option>
    <option value="PROFESOR">PROFESOR</o ption>
  </select>
</div>


<div class="form-group text-center">
    {{
      Form::submit('Guardar Datos',['class'=>'btn btn-success'])
    }}
</div>

<div class="form-group text-center">
    {{
      Form::reset('Cancelar',['class'=>'btn btn-success'])
    }}
</div>
