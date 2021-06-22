<!-- Modal ingreso de insumos-->
<div class="modal fade" id="nuevo_insumo_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Insumos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formulario_nuevo" method="POST">
        <div class="form-group">
            
            <label for="producto_inventario" class="col-sm-12 col-form-label">Producto</label>
            <div class="col-sm-12">
            <select class="form-control" data-live-search="true" id="nuevo_producto" name="producto_id">
            <option>Abre y selecciona una opcion</option>   
            @foreach($productos as $t)
             
                <option value="{{$t->id}}">{{$t->nombre}} - {{$t->presentacion->nombre}}</option>                     
                @endforeach                
                </select>
            </div>
        </div>  
            <div class="form-group">
            
                <label for="cantidad_inventario" class="col-sm-6 col-form-label">Cantidad</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="nuevo_cantidad" name="cantidad">
                </div>
            </div>
            
            <div class="form-group">
                <label for="descripcion_inventario" class="col-sm-6 col-form-label">Descripcion(opcional)</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="nuevo_descripcion" name="descripcion">
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
        <button type="button" class="btn btn-primary" onclick="guardar_nuevo_insumo('ingresoinsumos','formulario_nuevo')">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal de insumos-->

<div class="modal fade" id="agregar_insumo_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Insumos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formulario_nuevo2" method="POST">
        <div class="form-group">
            
                <label for="nombre_producto" class="col-sm-12 col-form-label">Producto</label>
              <div class="col-sm-12">
                    <input type="text" class="form-control" id="agregar_producto" name="nombre" >
              </div>
        </div>
            
        <div class="form-group">
                        <div class="col-md-12">
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
            
                <label for="cantidad_producto" class="col-sm-6 col-form-label">Cantidad</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="agregar_cantidad" name="cantidad">
                </div>
            </div>
            
            <div class="form-group">
                <label for="descripcion_producto" class="col-sm-6 col-form-label">Descripcion(opc)</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="agregar_descripcion" name="descripcion">
                </div>
            </div>              
        </form>         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="guardar_nuevo_insumo('insumos','formulario_nuevo2')">Guardar</button>
      </div>
    </div>
  </div>
</div>


