@extends('reportes.plantilla')
@section('contenido')
<br> 
<h5 align="center" style="margin:0;padding:0;color:blue;text-transform: uppercase;">REPORTE DE ENTRADA DE INSUMOS</h5><br>
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
			@foreach($ingreso_productos as $key => $i)
			<tr>
				<td align="center">{{ ($key+1) }}</td>
				<td align="center">{{ $i->producto->nombre }}</td>
				<td align="center">{{ $i->cantidad }}</td>
                <td align="center">{{ $i->producto->presentacion->nombre}}</td>
                <td align="center">{{ $i->descripcion}}</td>
                <td align="center">{{ $i->created_at}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
    @endsection