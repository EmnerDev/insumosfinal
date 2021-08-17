<!-- Full width modal content -->
<div id="modal_vista" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header bg-primary" >
               <h4 class="modal-title text-white"id="fullWidthModalLabel">Insumos</h4>
               <button type="button" class="close btn-light" data-dismiss="modal"
               aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                 <!-- ============================================================== -->
                    <!-- Example -->
                    <!-- ============================================================== -->
                    <div class="col-12">
                        <div class="card">
                            <!-- Inicio de los Tabs -->
                            <div class="card-body">                              
                             
                                <div class="table-responsive ">
                                    <table class="table table-hover table-bordered col-md-12" id="tabla_insumos">
                                        <thead class="" style="background-color:#ffcccc;">
                                        <tr>
                                            <th>N°</th>
                                            <th>Cantidad</th>
                                            <th>Producto</th>
                                        </tr>
                                        </thead>
                                       
                                        <tbody>
                                        @foreach($pivot as $key => $e)
                                          <tr>
                                              <td>{{ ($key+1) }}</td>
                                              <td>{{ $e->salidaproducto->cantidad }}</td>
                                              <td>{{ $e->salidaproducto->producto->nombre}} - {{$e->salidaproducto->producto->presentacion->nombre }}</td>
                                          </tr>
                                          @endforeach
                                        </tbody>
                                       
                                    </table>
                                </div>  
                            </div>
                            
                        </div>
                    </div>              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
            </div>
         </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
   {{-- Modal End --}}