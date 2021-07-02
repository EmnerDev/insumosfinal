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
      <form id="guardar_nueva_producto" method="POST" action="{{route('nueva_entrega')}}"> 
      @csrf 
        <div class="modal-body">
        
              <h5 class="card-title">DATOS GENERALES</h5>
              <div class="form-group">
                  <label for="personal_nuevo" class="col-sm-12 col-form-label">Personal</label>
                  <div class="col-sm-12">
                      <select class="form-control" id="personal" name="user_id" required>
                          <option value="">Seleccione una opción</option>   
                          @foreach($personal as $p)
                              <option value="{{$p->id}}">{{$p->dni}} - {{$p->nombres}} {{$p->apellidos}}</option>                     
                          @endforeach                
                      </select>
                      </div>
              </div> 

              <div class="form-group">
                  <label class="col-sm-12 col-form-label">Fecha de entrega</label>
                  <div class="col-sm-12">
                      <input type="date" name="fecha" value="{{date('Y-m-d')}}" required>
                  </div>
              </div>  

              <div class="form-group">
                  <label  class="col-sm-12 col-form-label">Observaciones</label>
                  <div class="col-sm-12">
                  <textArea placeholder="escribir aquí" class="form-control" name="descripcion"></textArea>
                  </div>
              </div>  

        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button class="btn btn-primary" >Guardar</button>
        </div>
      </form> 
    </div>
  </div>
</div>
