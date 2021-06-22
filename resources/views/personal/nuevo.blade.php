<!-- Modal -->
<div class="modal" id="nuevo_personal_modal" tabindex="-1" role="dialog" aria-labelledby="..." aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Personal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formulario_nuevo" method="POST">
            <div class="form-group">
                
                <label for="dni_personal" class="col-sm-6 col-form-label">DNI</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="nuevo_dni" name="dni">
                </div>
            </div>    
            <div class="form-group ">
            
                <label for="nombre_personal" class="col-sm-6 col-form-label">Nombre</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="nuevo_nombre" name="nombres">
                </div>
            </div>
            <div class="form-group ">
                <label for="apellidos_personal" class="col-sm-6 col-form-label">Apellidos</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="nuevo_apellidos" name="apellidos">
                </div>
            </div>         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="guardar_nuevo('formulario_nuevo')">Guardar</button>
      </div>
    </div>
  </div>
</div>