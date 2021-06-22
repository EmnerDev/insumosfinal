<!-- Modal -->
<div class="modal fade" id="modal_nuevo" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo</h5>
        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="guardar_nueva_producto">   
              <div class="form-group">
                <label for="personal_nuevo" class="col-sm-12 col-form-label">Personal</label>
                <div class="col-sm-12">
                    <select class="form-control" data-live-search="true" id="nuevo_personal1" name="nombre"  >
                      <option >Abre y selecciona personal</option>   
                        @foreach($users as $t)
                          <option value="{{$t->id}}">{{$t->dni}} {{$t->nombres}}</option>                     
                        @endforeach                
                    </select>
                </div>
              </div>  
              <div class="form-group">
                <label for="personal_nuevo" class="col-sm-12 col-form-label">Producto</label>
                <div class="col-sm-12">
                    <select class="form-control" id="id_producto" name="producto">
                      <option >Abre y selecciona producto</option>   
                        @foreach($productos as $t)
                          <option value="{{$t->id}}">{{$t->nombre}} - {{$t->presentacion->nombre}}</option>                     
                        @endforeach                
                    </select>
                </div>
              </div>  

            <div class="form-group">
                <label for="p_cantidad" class="col-sm-12 col-form-label">Cantidad</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="p_cantidad" name="cantidad">
                </div>
            </div>        

            <div class="form-group row">
                <label for="p_descripcion" class="col-sm-12 col-form-label">Descripcion/observación (opcional)</label>
                <div class="col-sm-12">
                    <textArea  class="form-control" id="p_descripcion" name="descripcion"></textArea>
                </div>
            </div>
            
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="guardar('productos','guardar_nuevo_producto')">Guardar</button>
       
      </div>
    </div>
  </div>
</div>
