<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Producto;
use App\model\Entrega;
use App\model\SalidaProducto;
use App\model\PivotEntregaSalida;
use App\User;

class VerInsumosController extends Controller
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
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //  public function index($id)
    //  {
    //      $entrega = Entrega::find($id);
    //      $productos = Producto::get();
    //      $pivot = PivotEntregaSalida::where('entrega_id',$id)->get();
    //      return view('welcome.datos',compact('entrega','productos','pivot'));
    //  }

    public function search_insumos($dni){

        $insumos = User::where('dni',$dni)->first();
        if($insumos) {
            $entrega = Entrega::where('user_id',$insumos->id)->get();  
            // $productos = Producto::get();        
            $pivot = PivotEntregaSalida::where('entrega_id',$insumos->id)->get();
           
                return view('welcome.datos',['entrega' => $entrega],['pivot' => $pivot] );
                       
        }
        return view('welcome.datos2');


    }
//     public function insumos_data(){

//        // return $tipo;
//        $query = Entrega::orderBy("id", "desc")->get();
//        if($query->count()<1)
//        return $this->data_null;
       

//        // return $query;
//        foreach ($query as $dato) {
            
               
//                            $personal = $dato->user->nombres.' '.$dato->user->apellidos ;
//                            $fecha = $dato->fecha;
//                            $descripcion = $dato->descripcion;

                      

//                            //1. se usa {{estos corchetes cuando estás en HTML }}
//                            //2. No puedes tenr unas comillas sobre otras '''', se usan las otras ' " " '
//                            //En este caso, como necesitamos generar la ruta, podrias hacerlo antes de ingresarlo al HTML o generarlo manualmente
//                            $ruta = route("entrega",$dato->id); //listo tengo ootras dudas :v 
//                            $ruta2 = route("reportes.entrega",$dato->id);
//                            $editar = "<a href='$ruta' class='btn btn-sm btn-success'>Editar</a> <a href='$ruta2' class='btn btn-sm btn-warning'>Reporte</a>";
//                            // $ver= "<a href='$ruta2' class='btn btn-sm btn-success'>Ver Insumos</a>";
//                            // $eliminar = "<button class='btn btn-sm btn-danger' onclick='eliminar_personal($dato->id)'>Eliminar</button>";

//                            // $data['aaData'][] = [  $usuarios_all, $producto, $cantidad, $presentacion,  $descripcion,$fecha];
                          
//                            $data['aaData'][] = [  $fecha, $personal, $descripcion, $editar];
                           
//        }
//        return json_encode($data, true);      
//    }

 }
