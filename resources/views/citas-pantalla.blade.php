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
    <h1>CITAS MEDICAS</h1>
    <x-navegacion/>
    <form action="{{ route('citas.store') }}" method="POST">
    @csrf
    
    <div class="mb-3">
        <label class="form-label">Nombre del Paciente</label>
        <input type="text" name="paciente" class="form-control" placeholder="Ej: María López" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Médico Asignado</label>
        <select name="medico_id" class="form-select" required>
            <option value="">Seleccione un médico</option>
            @foreach($medicos as $med)
                <!-- Ajusta $med->medico según el nombre de la columna en tu BD de médicos -->
                <option value="{{ $med->id }}">{{ $med->medico }} - {{ $med->especialidad }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Consultorio</label>
        <input type="text" name="consultorio" class="form-control" placeholder="Ej: Consultorio 3" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha y Hora</label>
        <input type="datetime-local" name="fecha_hora" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Programar Cita</button>
</form>

<hr class="my-4">
<h3 class="mb-3">Citas Programadas</h3>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Paciente</th>
            <th>Médico</th>
            <th>Consultorio</th>
            <th>Fecha y Hora</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach($citas as $cita)
            <tr>
                <td>{{ $cita->id }}</td>
                <td>{{ $cita->paciente }}</td>
                <!-- Usamos la relación para mostrar el nombre del médico -->
                <td>{{ $cita->medico->medico ?? 'Sin médico' }}</td>
                <td>{{ $cita->consultorio }}</td>
                <td>{{ $cita->fecha_hora }}</td>
                <td>
                    <x-comp-citas.update-cita :cita="$cita" :medicos="$medicos" />
            <!--Pa cancelar -->
            <form action="/citas-pantalla/{{ $cita->id }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de cancelar esta cita?');">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-danger">Cancelar</button>
            </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>