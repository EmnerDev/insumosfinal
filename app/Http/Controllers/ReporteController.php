<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\model\Producto;
use App\model\Presentacion;
use App\model\IngresoProducto;
use App\model\SalidaProducto;

class ReporteController extends Controller
{
    public function generar(){
        $productos = Producto::get();
    	$pdf   = PDF::loadView('reportes.total', compact('productos'));

    	return $pdf->stream('productos-list.pdf');
    }
    public function reporte_ingreso(){
        $ingreso_productos = IngresoProducto::get();
    	$pdf   = PDF::loadView('reportes.entrada', compact('ingreso_productos'));   

    	return $pdf->stream('productos-list.pdf');

    }
    public function reporte_salida(){
        $salida_productos = SalidaProducto::get();
    	$pdf   = PDF::loadView('reportes.salida', compact('salida_productos'));   

    	return $pdf->stream('productos-list.pdf');

    }
}
