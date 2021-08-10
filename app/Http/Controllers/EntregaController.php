<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\model\Producto;
use App\model\Entrega;
use App\model\SalidaProducto;
use App\model\PivotEntregaSalida;

class EntregaController extends Controller
{

    public function index($id)
    {
        $entrega = Entrega::find($id);
        $productos = Producto::get();
        $pivot = PivotEntregaSalida::where('entrega_id',$id)->get();
        return view('admin.entrega.index',compact('entrega','productos','pivot'));
    }

    public function create()
    {
             
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
        
        $cantidad=Producto::find($request->producto_id)->cantidad;
        // $cantidad2=SalidaProducto::find($request->cantidad);

        if($cantidad >= $request->cantidad ) {

            $q = new SalidaProducto;
            $q->producto_id = $request->producto_id;
            $q->cantidad = $request->cantidad;
            $q->save();
       
          // para guardar en dos tablas distintas; se guarda de uno en uno
           $k = new PivotEntregaSalida;
           $k->entrega_id = $request->entrega_id;//este valor se envia desde el formulario
           $k->salida_id =  $q->id; //este lo acabas de generar con SalidaProducto
           $k->save();
          app(\App\Http\Controllers\InventarioController::class)->actualizar_cantidad($request->producto_id);
        
          return redirect()->route("entrega",[$request->entrega_id]);
        } else {
            return back()->with('flash', 'Stock insuficiente para realizar la entrega');
        }
      
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
    public function destroy(Request $r)
    {
        //   return $r;
       
          $salida=PivotEntregaSalida::find($r->id);
          SalidaProducto::destroy($salida->salida_id);
          PivotEntregaSalida::destroy($r->id);
     
    
    }
}
