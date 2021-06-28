<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\model\Producto;
use App\model\Entrega;

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
        //
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
