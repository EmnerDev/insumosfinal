@extends('reportes.plantilla')

@section('css')
<style>
.i-tabla{
  border-spacing: 10px;
  border-collapse: collapse;  
  width:100%;
}
.i-tabla td, .i-tabla th{
  padding:5px;
  border: 1px solid #AED6F1;
  border-collapse: collapse; 
  width:100%;
 }
.i-tabla-cabecera{
  background-color:#0044cc;
  color:#ffffff;
  border:#009999;
}
.i-tabla-th{
  background-color:#b3ccff;
  font-size:12px;
}
.i-tabla-td{
  font-size:12px;
}
.i-tabla-td-dj{
  font-size:10px;
}
</style>
@endsection

@section('contenido')
<br> 
<h5 align="center" style="margin:0;padding:0;color:blue;text-transform: uppercase;">INSUMOS RECIBIDOS</h5><br>
	<table class="i-tabla">
		<tbody>	
     
			
		</tbody>
	</table>
	<br>
	     <!-- insumos -->

	<table class="i-tabla">
  	<tbody>
    <tr>
        <th colspan="4" style="background-color:#0044cc;color:#ffffff;">PRODUCTOS RECIBIDOS</th>        
    </tr>
    <tr>		<th class="i-tabla-th">N°</th>
				<th class="i-tabla-th">Insumos</th>
				<th class="i-tabla-th">Cantidad</th>
                     
    </tr>   
	@foreach($pivot as $key => $e)
			<tr>
				<td class="i-tabla-td">{{ ($key+1) }}</td>				
				<td class="i-tabla-td">{{ $e->salidaproducto->producto->nombre}} - {{$e->salidaproducto->producto->presentacion->nombre }}</td>
				<td class="i-tabla-td">{{ $e->salidaproducto->cantidad }}</td>
                                            
			</tr>		
    @endforeach
  </tbody>                                            
</table>
    @endsection