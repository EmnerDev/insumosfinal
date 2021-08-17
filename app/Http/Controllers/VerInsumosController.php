<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Producto;
use App\model\Entrega;
use App\model\SalidaProducto;
use App\model\PivotEntregaSalida;
use App\User;
use DB;

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
            $entrega = Entrega::where('user_id',$insumos->id)->orderBy("id", "desc")->get();  
            $productos = Producto::get();        
            $pivot = PivotEntregaSalida::where('entrega_id',$entrega[0]->id)->get();
         
                return view('welcome.datos',['entrega' => $entrega],compact('productos','pivot'));
                       
        }
        return view('welcome.datos2');


    }
   
    public function ver_insumos($var2){

        
              
       $pivot = PivotEntregaSalida::join('salida_productos','pivot_entrega_salidas.salida_id','=','salida_productos.id')
      ->join('productos','salida_productos.producto_id','=','productos.id')
      ->select('productos.nombre','salida_productos.cantidad')
      ->get();
      
      //where('entrega_id',$var2)->get();
     
           // return view('welcome.datos',['entrega' => $entrega],compact('productos','pivot'));

    }
 }
