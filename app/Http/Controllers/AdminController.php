<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  
use App\model\Producto;
use App\model\Presentacion;
use App\model\IngresoProducto;
use App\model\SalidaProducto;
use App\model\Entrega;

use DB;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->data_null='{
            "sEcho": 1,
            "iTotalRecords": "0",
            "iTotalDisplayRecords": "0",
            "aaData": []
        }';
    }   
    public function index(){
        $personal= User::all();
        $productos= Producto::all();
        return view('admin.index',compact('personal','productos') );
    }

    public function index_data(){

       // return $tipo;
        $query = Entrega::get();
        if($query->count()<1)
        return $this->data_null;
        

        // return $query;
        foreach ($query as $dato) {
             
                
                            $personal = $dato->user->nombres.' '.$dato->user->apellidos ;
                            $fecha = $dato->fecha;
                            $descripcion = $dato->descripcion;

                       

                            //1. se usa {{estos corchetes cuando estás en HTML }}
                            //2. No puedes tenr unas comillas sobre otras '''', se usan las otras ' " " '
                            //En este caso, como necesitamos generar la ruta, podrias hacerlo antes de ingresarlo al HTML o generarlo manualmente
                            $ruta = route("entrega",$dato->id); //listo tengo ootras dudas :v 
                             $editar = "<a href='$ruta' class='btn btn-sm btn-success'>Editar</a>"; 
                            // $eliminar = "<button class='btn btn-sm btn-danger' onclick='eliminar_personal($dato->id)'>Eliminar</button>";

                            // $data['aaData'][] = [  $usuarios_all, $producto, $cantidad, $presentacion,  $descripcion,$fecha];

                            $data['aaData'][] = [  $fecha, $personal, $descripcion, $editar];
        }
        return json_encode($data, true);      
    }


public function index_nuevo(Request $r){
   
    $q = new Producto;
    $q->producto_id = $request->producto_id;
    $q->cantidad = $request->cantidad;
 //    $q->descripcion = $request->descripcion;
    $q->save();
     return redirect()->route("productos",[$q->id]);   
     
}
}
