@extends('layouts.layout')

@section('content')
<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <a href ="{{route('home')}}"class="btn btn-primary float-left">Volver</a>
                    ESTUDIANTE
                </div>
 
                <nav class="navbar navbar-light float-right">
                    <form class="form-inline">

                        <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search">

                        <input name="buscarporRut" class="form-control mr-sm-2" type="search" placeholder="Buscar por rut" aria-label="Search">
                       <!-- <input class="form-control" type="text" id="rut" name="rut" required  placeholder="Ingrese RUT">-->
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>

                    </form>
                </nav>

                <div class ="card-body text-center">
                    <table class = "table table-striped table-hover" class="btn btn-primary float-left" >
                        <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>RUT</th>
                                <th>OPCIÓN</th>
                                <th colspan="10px">&nbsp;</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach ($Estudiante  as $Estudiante)
                            <tr>
                                <td>{{$Estudiante->nombre}}</td>
                                <td>{{$Estudiante->rut}}</td>
                                <td with="10px">
                                <!-- Editar-->
                                <td with="10px">
                                <a href="{{route('estudiante.edit', $Estudiante->id)}}"  class="btn btn-primary float-left"> Editar </a>
                                </td >
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>

            </div>
        </div>
    </div>
</div>


<script>
function searchEstudente() {
 
    var search = prompt("Nombre del estudiante - Rut sin puntos y sin guión");
    if (search != null || search != "") {
        find(search)
    } 
}

function checkRut(rut) {
        // Despejar Puntos
        var valor = rut.value.replace('.','');
        // Despejar Guión
        valor = valor.replace('-','');
        
        // Aislar Cuerpo y Dígito Verificador
        cuerpo = valor.slice(0,-1);
        dv = valor.slice(-1).toUpperCase();
        
        // Formatear RUN
        rut.value = cuerpo + '-'+ dv
        
        // Si no cumple con el mínimo ej. (n.nnn.nnn)
        if(cuerpo.length < 7) { 
            rut.setCustomValidity("RUT Incompleto"); 
            return false;
        }
        
        // Calcular Dígito Verificador
        suma = 0;
        multiplo = 2;
        
        // Para cada dígito del Cuerpo
        for(i=1;i<=cuerpo.length;i++) {
        
            // Obtener su Producto con el Múltiplo Correspondiente
            index = multiplo * valor.charAt(cuerpo.length - i);
            
            // Sumar al Contador General
            suma = suma + index;
            
            // Consolidar Múltiplo dentro del rango [2,7]
            if(multiplo < 7){ 
                multiplo = multiplo + 1; 
            } 
            else{ 
                multiplo = 2;
            }
    
        }
        
        // Calcular Dígito Verificador en base al Módulo 11
        dvEsperado = 11 - (suma % 11);
        
        // Casos Especiales (0 y K)
        dv = (dv == 'K')?10:dv;
        dv = (dv == 0)?11:dv;
        
        // Validar que el Cuerpo coincide con su Dígito Verificador
        
        if(dvEsperado != dv) { 
            rut.setCustomValidity("RUT Inválido");
            $("#rut").attr('class', "form-control is-invalid");
            return false; 
        }
        $("#rut").attr('class', "");
        $("#rut").attr('class', "form-control");
        
        // Si todo sale bien, eliminar errores (decretar que es válido)
        rut.setCustomValidity('');
    }
</script>
@endsection
