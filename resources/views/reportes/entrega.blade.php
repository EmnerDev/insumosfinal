@extends('reportes.plantilla')
@section('contenido')
<br> 
<h5 align="center" style="margin:0;padding:0;color:blue;text-transform: uppercase;">REPORTE ENTREGA DE INSUMOS</h5><br>
	<table class="table">
		<thead>
			<tr>
				<th>N°</th>
				<th>Usuario</th>
				<th>producto</th>
				<th>Cantidad</th>
                <th>Presentacion</th>
                <th>Descripcion</th>
                <th>Fecha</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pivot as $key => $e)
			<tr>
				<td align="center">{{ ($key+1) }}</td>
				<td align="center">{{ $e->entrega->user->nombres }}</td>
				<td align="center">{{ $e->salidaproducto->producto->nombre }}</td>
				<td align="center">{{ $e->salidaproducto->cantidad }}</td>
                <td align="center">{{ $e->salidaproducto->producto->presentacion->nombre}}</td>
                <td align="center">{{ $e->descripcion}}</td>
                <td align="center">{{ $e->created_at}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
    @endsection