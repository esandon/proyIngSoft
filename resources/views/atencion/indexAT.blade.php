<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<!-- Styles -->
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin-left: 100px;
        margin-top: 50px
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
    .button{
        text-decoration: none;
    padding: 3px;
    padding-left: 10px;
    padding-right: 10px;
    font-family: helvetica;
    font-weight: 300;
    font-size: 25px;
    font-style: italic;
    color: #004505;
    background-color: #82b085;
    border-radius: 15px;
    border: 3px double #006505;
    }

</style>
    <title>Document</title>
</head>
<body>

    <div class="container">
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
                            <form action="{{ route('registrar_atencion')}}" method="POST">
                                <div class="form-row">
                                    <div class="col">
                                        <input type="date" name="fecha_publicacion" class="form-control">
                                        <br>
                                        <br>
                                        Rut:
                                        <br>
                                        <br>
                                        <input type="number" name="rut_estudiante" class="form-control" placeholder="RUT sin puntos ni guion">
                                        <br>
                                        <br>
                                        Descipcion:
                                        <br>
                                        <br>
                                        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese una descipcion">
                                        <br>
                                        <br>
                                        Medio de atencion:
                                        <br>
                                        <br>    
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="medio_atencion">
                                            <option selected></option>
                                            <option value="#"></option>
                                            <option value="Entrevista personal">Entrevista personal</option>
                                            <option value="Correo electronico">Correo electronico</option>
                                            <option value="Otro">Otro</option>
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
    
</body>
</html>