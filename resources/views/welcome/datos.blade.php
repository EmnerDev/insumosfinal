<br><h5> {{$entrega->user->dni}} - {{$entrega->user->nombres}} {{$entrega->user->apellidos}} <br><b>{{$entrega->fecha}} </b></h5>
<br>

            <table class="table">
          
        	<tbody>
    <tr>
        <th colspan="4" style="background-color:#009999;color:#ffffff;">PRODUCTOS ENTREGADOS</th>        
    </tr>
    <tr>		<th class="i-tabla-th">N°</th>
				<th class="i-tabla-th">Insumos</th>
				<th class="i-tabla-th">Cantidad</th>
                     
    </tr>   
	@foreach($pivot as $key => $e)
			<tr>
				<td class="i-tabla-td">{{ ($key+1) }}</td>				
				<td class="i-tabla-td">{{$e->salidaproducto->producto->nombre}} - {{$e->salidaproducto->producto->presentacion->nombre}}</td>
				<td class="i-tabla-td">{{$e->salidaproducto->cantidad}}</td>
                                            
			</tr>		
    @endforeach
    </tbody>                                                
</table>