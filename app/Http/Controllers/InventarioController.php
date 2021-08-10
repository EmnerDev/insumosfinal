<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\model\Producto;
use App\model\Presentacion;
use App\model\IngresoProducto;
use App\model\SalidaProducto;
use DB;

use Carbon\Carbon;

class InventarioController extends Controller
{
    public function __construct()
    {
        $this->data_null = '{
            "sEcho": 1,
            "iTotalRecords": "0",
            "iTotalDisplayRecords": "0",
            "aaData": []
        }';
    }

    public function entrada_productos()
    {
        //aqui debe actualizar tambien
        $this->actualizar_todo();
        $productos = Producto::all();
        return view('inventario.ingreso', compact('productos'));
    }

    public function data($tipo)
    {
        switch ($tipo) {

            case "1":

                $query = Producto::orderBy("id", "desc")->get();

                if ($query->count() < 1) return $this->data_null;
                foreach ($query as $key => $d) {

                    $vdatos = $d->id . ',"insumos"';

                    $fecha = Carbon::parse($d->created_at)->format('d/m/Y - H:i:s');

                    $editar = "<button class='btn btn-sm btn-success' onclick='editar_registro_insumo($d->id)'>Editar</button>";
                    $eliminar = "<button class='btn btn-sm btn-danger' onclick='eliminar_insumos( $vdatos)'>Eliminar</button>";


                    $data['aaData'][] = [$d->nombre, $d->cantidad, $d->presentacion->nombre, $d->descripcion, $fecha, $editar, $eliminar];
                }
                return json_encode($data, true);
                break;

            case "2":

                $query = IngresoProducto::orderBy("id", "desc")->get();

                if ($query->count() < 1) return $this->data_null;
                foreach ($query as $key => $d) {

                    $vdatos = $d->id . ',"ingresoinsumos"';
                    $fecha = Carbon::parse($d->created_at)->format('d/m/Y - H:i:s');

                    $editar = "<button class='btn btn-sm btn-success' onclick='editar_ingreso_insumo($d->id)'>Editar</button>";
                    $eliminar = "<button class='btn btn-sm btn-danger' onclick='eliminar_insumos($vdatos)'>Eliminar</button>";


                    $data['aaData'][] = [$d->producto->nombre, $d->cantidad, $d->producto->presentacion->nombre, $d->descripcion, $fecha, $editar, $eliminar];
                }
                return json_encode($data, true);
                break;

            case "3":

                $query = SalidaProducto::orderBy("id", "desc")->get();

                if ($query->count() < 1) return $this->data_null;
                foreach ($query as $key => $d) {

                    $fecha = Carbon::parse($d->created_at)->format('d/m/Y - H:i:s');

                    $data['aaData'][] = [$d->producto->nombre, $d->cantidad, $d->producto->presentacion->nombre, $d->descripcion, $fecha];
                }
                return json_encode($data, true);
                break;

            default:
                break;
        }
    }

    public function store(Request $r, $tipo)
    {
        //  return [$r,$tipo];

        switch ($tipo) {


            case "insumos";

                //  Producto::create($r->all());
                $q = new Producto;
                $q->nombre = $r->nombre;
                $q->cantidad = $r->cantidad;
                $q->presentacion_id = $r->presentacion_id;
                $q->descripcion = $r->descripcion;
                $q->save();




                //    $this->actualizar_cantidad($r->producto_id);

                break;
            case "ingresoinsumos";

                IngresoProducto::create($r->all());
                // $q = new IngresoProducto;
                // $q->nombre = $r->producto;
                // $q->cantidad=$r->cantidad;                
                // $q->descripcion = $r->descripcion;
                // $r->save();
                $this->actualizar_cantidad($r->producto_id);

                break;

            default:
                break;
        }
    }

    public function show($id)
    {
    }

    public function edit($id, $tipo)
    {
        switch ($tipo) {
            case "insumos":
                return Producto::find($id);
                break;
            case "ingresoinsumos";
                return IngresoProducto::find($id);
                break;
            default:
                break;
        }
    }


    public function update(Request $r, $id, $tipo)
    {
        switch ($tipo) {
            case "insumos":
                $q = Producto::find($id);
                $q->nombre = $r->nombre;
                $q->cantidad = $r->cantidad;
                $q->presentacion_id = $r->presentacion_id;
                $q->descripcion = $r->descripcion;
                $q->save();
                break;
            case "ingresoinsumos";
                $q = IngresoProducto::find($id);
                $q->producto_id = $r->producto_id;
                $q->cantidad = $r->cantidad;
                $q->descripcion = $r->descripcion;

                $q->save();
                break;
            default:
                break;
        }
    }


    public function destroy(Request $r, $tipo)
    {
        switch ($tipo) {
            case "insumos":
                Producto::destroy($r->id);
                break;
            case "ingresoinsumos";
                IngresoProducto::destroy($r->id);
                break;
            default:
                break;
        }
        return ['tipo' => $tipo, 'r' => $r];
    }
    public function actualizar_todo(){
        $query = Producto::all();
        foreach($query as $valor){
            $this->actualizar_cantidad($valor->id);
        }
    }
    public function actualizar_cantidad($id)
    {

        //  $ingreso = IngresoProducto::sum('cantidad')->groupBy('producto_id')->get();

        //  $salida= DB::table('salida_productos')
        //  ->select(DB::raw('sum("cantidad") as total'))
        //  ->groupBy('cantidad')
        //  ->first();

        //  $total= $ingreso->total- $salida->total; 
        //  $producto=Producto::find($idproducto);
        //  $producto->cantidad=$total;
        //  $producto->save();
        //  return $salida;


        //  $total=Producto::where('id','=',$id)->sum('cantidad');
        $ingreso = IngresoProducto::where('producto_id', '=', $id)->sum('cantidad');
        $salida = SalidaProducto::where('producto_id', '=', $id)->sum('cantidad');

        $total = $ingreso - $salida;
        $producto = Producto::find($id);
        $producto->cantidad = $total;
        $producto->save();

        //  $totalingreso= $total+$ingreso;
        //  $totalsalida= $total-$salida;
        // return $total; 

    }
}
