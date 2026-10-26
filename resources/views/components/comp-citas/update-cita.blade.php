@props([
    'cita',
    'medicos'
])
<div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{$cita->id}}">
  Modificar cita
</button>

<!-- Modal -->
<div class="modal fade" id="editModal{{$cita->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea cambiar su cita?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="{{ route('citas.update', $cita->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="mb-3">
        <label class="form-label">Nombre del Paciente</label>
        <input type="text" name="paciente" class="form-control" value="{{$cita->paciente}}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Médico Asignado</label>
        <select name="medico_id" class="form-select" required>
            @foreach($medicos as $med)
                <!-- Ajusta $med->medico según el nombre de la columna en la BD de médicos -->
                <option value="{{ $med->id }}" {{ $cita->medico_id == $med->id ? 'selected' : '' }}>
                    {{ $med->medico }} - {{ $med->especialidad }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Consultorio</label>
        <input type="text" name="consultorio" class="form-control" value="{{$cita->consultorio}}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha y Hora</label>
        <input type="datetime-local" name="fecha_hora" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Programar Cita</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
</div>