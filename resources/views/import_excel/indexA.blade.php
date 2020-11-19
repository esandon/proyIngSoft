<!DOCTYPE html>
<html lang="en">
<head>
    <title>Importar Archivo </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importar asignaturas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Laravel 6 Importar excel 
            </div>
                @if ($errors->any())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif
            <div class="card-body">
                <form action="{{ url('import-excelA') }}" method="POST" name="importform" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="import_file" class="form-control">
                    <br>
                    <button class="btn btn-success">Importar archivo</button>
                </form>
            </div>
        </div>
        <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">Datos asignaturas</h3>
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped">
        
        @foreach($asignaturas as $c)
        <tr>
            <td>{{ $c->codigo }}</td>
            <td>{{ $c->NRC }}</td>
            <td>{{ $c->asignatura }}</td>
        </tr>
        @endforeach
        </table>
        </div>
        </div>
    </div>

</div>
    
</body>
</html>
