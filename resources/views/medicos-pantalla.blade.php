<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>DOCTORES</h1>
    <x-navegacion/>    
    <div class="row mt-3">
        <div class="col-12, col-lg-5">
            <x-doctorTabla/>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-lg-8 offset-0 offset-lg-2">
            <table class="table table-bordered table-hover">
                <thead class="table table-primary">
                    <tr>
                        <td>ID</td>
                        <td>Medico</td>
                        <td>Especialidad</td>
                        <td>Estado</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mediquillo as $med)
                        <tr>
                            <td>{{$med->id}}</td>
                            <td>{{$med->medico}}</td>
                            <td>{{$med->especialidad}}</td>
                            <td>
                                @if($med->activo == 1)
                                    <span class="badge bg-success">Activo</span>
                                @else   
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                            <td>
                            <x-comp-docs.update-doc :med="$med"/>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>