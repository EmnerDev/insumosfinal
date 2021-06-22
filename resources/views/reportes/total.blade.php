@extends('reportes.plantilla')
@section('contenido')
<br> 

<h5 align="center" style="margin:0;padding:0;color:blue;text-transform: uppercase;">REPORTE DEL TOTAL DE INSUMOS</h5><br>
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
			@foreach($productos as $key => $p)
			<tr>
				<td align="center">{{ ($key+1) }}</td>
				<td align="center">{{ $p->nombre }}</td>
				<td align="center">{{ $p->cantidad }}</td>
                <td align="center">{{ $p->presentacion->nombre}}</td>
                <td align="center">{{ $p->descripcion}}</td>
                <td align="center">{{ $p->created_at}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endsection