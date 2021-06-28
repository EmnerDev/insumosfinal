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
             
                
                            $personal = $dato->user->nombres;
                            $fecha = $dato->fecha;
                            $descripcion = $dato->descripcion;

                            // $usuarios_all = $dato->nombre.' '.$dato->apellidos;
                            // $producto=$dato->nombre;
                            // $cantidad=$dato->cantidad ; 
                            // $presentacion=$dato->presentacion->nombre ;   
                            // $descripcion=$dato->descripcion; 
                            // $fecha=$dato->created_at; 

                            
                            // $editar = "<button class='btn btn-sm btn-success' onclick='editar($dato->id)'>Editar</button>"; 
                            // $eliminar = "<button class='btn btn-sm btn-danger' onclick='eliminar_personal($dato->id)'>Eliminar</button>";

                            // $data['aaData'][] = [  $usuarios_all, $producto, $cantidad, $presentacion,  $descripcion,$fecha];

                            $data['aaData'][] = [  $fecha, $personal, $descripcion, 'boton'];
        }
        return json_encode($data, true);      
    }


public function index_nuevo(Request $r){
   
    
     
}
}
