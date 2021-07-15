<!-- Modal -->
<div class="modal fade" id="editar_insumo_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Insumos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editar_ingreso_insumo" method="POST">
        <div class="form-group row">
            
        <label for="producto_inventario" class="col-sm-12 col-form-label">Producto</label>
            <div class="col-sm-12">
            <select class="form-control" data-live-search="true" id="editar_producto" name="producto_id">
            <option>Abre y selecciona una opcion</option>   
            @foreach($productos as $t)
             
                <option value="{{$t->id}}">{{$t->nombre}} - {{$t->presentacion->nombre}}</option>                     
                @endforeach                
                </select>
            </div>
        </div>  
            <div class="form-group row">
            
                <label for="cantidad_editar" class="col-sm-6 col-form-label">Cantidad</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="editar_cantidad" name="cantidad">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="descripcion_editar" class="col-sm-6 col-form-label">Descripcion(opcional)</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="editar_descripcion" name="descripcion">
                </div>
            </div>
            <!-- <div class="form-group row">
                <label for="area_personal" class="col-sm-3 col-form-label">Area</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="area_personal" name="area">
                </div>
            </div> -->
            <!-- <div class="form-group row">
                <label for="descripcion_personal" class="col-sm-3 col-form-label">Descripción</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nuevo_descripcion" name="descripcion">
                </div>
            </div> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="e_btn_editar_ingreso">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->

<div class="modal fade" id="editar_registro_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Insumos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editar_registro_insumo" method="POST">
        <div class="form-group">
            
                <label for="nombre_producto" class="col-sm-6 col-form-label">Producto</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="editar_nombre" name="nombre">
                </div>
            </div>
            <div class="col-md-12">
                        <div class="form-group">
                            <label for="location1" >Presentacion :</label>
                            <select class="custom-select form-control" id="location1" name="presentacion_id">
                                <option value="">*Seleccione una opcion*</option>
                                <option value="1">Docena(s)</option>
                                <option value="2">Unidad(es)</option>
                                <option value="3">Paquete(s)</option>
                                <option value="4">Galon(es)</option>
                            </select>
            </div>
        </div>  
            <div class="form-group">
            
                <label for="cantidad_editar" class="col-sm-6 col-form-label">Cantidad</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="editar2_cantidad" name="cantidad">
                </div>
            </div>
            
            <div class="form-group">
                <label for="descripcion_editar" class="col-sm-6 col-form-label">Descripcion(opc)</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="editar2_descripcion" name="descripcion">
                </div>
            </div>
            <!-- <div class="form-group row">
                <label for="area_personal" class="col-sm-3 col-form-label">Area</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="area_personal" name="area">
                </div>
            </div> -->
            <!-- <div class="form-group row">
                <label for="descripcion_personal" class="col-sm-3 col-form-label">Descripción</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nuevo_descripcion" name="descripcion">
                </div>
            </div> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="e_btn_editar_registro">Guardar</button>
      </div>
    </div>
  </div>
</div>