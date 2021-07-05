<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\model\Producto;
use App\model\Entrega;
use App\model\SalidaProducto;

class EntregaController extends Controller
{

    public function index($id)
    {
         $entrega = Entrega::find($id);
        $productos = Producto::get();
        return view('admin.entrega.index',compact('entrega','productos'));
    }

    public function create()
    {

                $query=SalidaProducto::orderBy("id","desc")->get();

                if( $query->count() < 1 )return $this->data_null;
                foreach($query as $key => $d){

                    // $vdatos=$d->id.',"insumos"';

                    // $fecha = Carbon::parse($d->created_at)->format('d/m/Y - H:i:s');
                    $accion='ss';

                    // $editar = "<button class='btn btn-sm btn-success' onclick='editar_registro_insumo($d->id)'>Editar</button>";
                    // $eliminar = "<button class='btn btn-sm btn-danger' onclick='eliminar_insumos( $vdatos)'>Eliminar</button>";


                    $data['aaData'][] = [ $d->producto->nombre, $d->cantidad, $accion];
                }
                return json_encode($data, true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $q = new Entrega;
       $q->user_id = $request->user_id;
       $q->fecha = $request->fecha;
       $q->descripcion = $request->descripcion;
       $q->save();
        return redirect()->route("entrega",[$q->id]);
    }
    public function nuevo(Request $request)
    {

        // return 'eres';
        // $k = PivotEntregaSalida::find($q->id);

        //  $q = new SalidaProducto;
        //  $q->producto_id = $request->producto_id;
        //  $q->cantidad = $request->cantidad;
        //  $q->descripcion = $request->descripcion;
        //  $q->save();

        // $k = new PivotEntregaSalida;
        // $k->entrega_id = $q->id;
        // $k->salida_id =  $q->id;
        //    return redirect()->route("entrega",[$q->id]);

    SalidaProducto::create($request->all());
        // $datos = $request->all();
        // return response()->json($datos);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
