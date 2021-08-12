<!-- Modal -->
<div class="modal fade" id="modal_vista" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insumos Recibidos</h5>
        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>     
     
        <div class="modal-body">
        
        <table>
        <thead class="">
    <tr>
        <th colspan="10" style="background-color:#009999;color:#ffffff;">PRODUCTOS ENTREGADOS</th>        
    </tr>
    <tr>	
      	<th>N°</th>
				<th>Insumos</th>
				<th>Cantidad</th>                     
    </tr>   
	@foreach($pivot as $key => $e)
			<tr>
				<td>{{ ($key+1) }}</td>				
				<td>{{ $e->salidaproducto->producto->nombre}} - {{$e->salidaproducto->producto->presentacion->nombre }}</td>
				<td>{{ $e->salidaproducto->cantidad }}</td>
                                            
			</tr>		
    @endforeach
    </thead>  
  </tbody>                                            
</table>

        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        
        </div>
      </form> 
    </div>
  </div>
</div>