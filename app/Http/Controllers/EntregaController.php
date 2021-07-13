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
        
          $q = new SalidaProducto;
          $q->producto_id = $request->producto_id;
          $q->cantidad = $request->cantidad;
          $q->save();
     
        // para guardar en dos tablas distintas; se guarda de uno en uno muestra la vista
         $k = new PivotEntregaSalida;
         $k->entrega_id = $request->entrega_id;//este valor lo estás enviando desde el formulario
         $k->salida_id =  $q->id; //este lo acabas de generar con SalidaProducto
         $k->save();
        return redirect()->route("entrega",[$request->entrega_id]);
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
        //   return $t;
        //  $s=PivotEntregaSalida::findOrFail($id);
        //  $s=PivotEntregaSalida::destroy($id);   
        //  $s->delete();

        // 
         PivotEntregaSalida::destroy($r->id);
        //  SalidaProducto::destroy($r->$id);

          return redirect()->route("entrega",[$r->id]); 
    }
}
