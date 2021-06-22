<!-- Modal -->
<div class="modal fade" id="editar_personal_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formulario_editar" method="POST">
            <div class="form-group ">
                
                <label for="dni_personal" class="col-sm-6 col-form-label">DNI</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="editar_dni" name="dni">
                </div>
            </div>    
            <div class="form-group">
            
                <label for="nombre_personal" class="col-sm-6 col-form-label">Nombre</label>
                <input type="hidden" id="editar_id" >
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="editar_nombre" name="nombres">
                </div>
            </div>
            <div class="form-group">
                <label for="apellidos_personal" class="col-sm-6 col-form-label">Apellidos</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="editar_apellidos" name="apellidos">
                </div>
            </div>
            <!-- <div class="form-group row">
                <label for="area_personal" class="col-sm-3 col-form-label">Area</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="area_personal" name="area">
                </div>
            </div> -->           
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="guardar_cambios('guardar_cambios')">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>