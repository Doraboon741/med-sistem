<div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Registrar nuevo medico
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">NUEVO MEDICO</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!--Aqui va el formulario, rellenele-->
    <form action="{{route('medicos.create')}}" method="POST">    
        @csrf
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nombre del medico</label>
        <input name="inputMedico" class="form-control" id="exampleFormControlInput1" placeholder="Ej: Juan Perez">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Especialidad</label>
        <input name="inputEspecialidad" class="form-control" id="exampleFormControlInput1" placeholder="Ej: Cardiología">
        </div>
        <div class="mb-3">
            <label for="inputActivo" class="form-label">Estado del medico</label>
            <select class="form-select" id="inputActivo" name="inputActivo" required aria-label="Default select example">
            <option selected>Seleccione una opción</option>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
            </select>
        </div>
    <button type="submit" class="btn btn-success">Save changes</button>    
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
</div>