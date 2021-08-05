@extends('reportes.plantilla')
@section('contenido')
<br> 
<h5 align="center" style="margin:0;padding:0;color:blue;text-transform: uppercase;">REPORTE SALIDA DE INSUMOS</h5><br>
	<table class="table">
		<thead>
			<tr>
				<th>N°</th>
				<th>Nombre</th>
				<th>Cantidad</th>
                <th>Presentacion</th>
                <th>Descripcion</th>
                <th>Fecha</th>
			</tr>
		</thead>
		<tbody>
			@foreach($salida_productos as $key => $s)
			<tr>
				<td align="center">{{ ($key+1) }}</td>
				<td align="center">{{ $s->producto->nombre }}</td>
				<td align="center">{{ $s->cantidad }}</td>
                <td align="center">{{ $s->producto->presentacion->nombre}}</td>
                <td align="center">{{ $s->descripcion}}</td>
                <td align="center">{{ $s->created_at}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
    @endsection