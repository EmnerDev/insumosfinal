<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Producto;
use App\model\Entrega;
use App\model\SalidaProducto;
use App\model\PivotEntregaSalida;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function search_insumos($dni){

        $insumos = User::where('dni',$dni)->first();
        if($insumos) {
            $entrega = Entrega::where('user_id',$insumos->id)->first();  
            $productos = Producto::get();        
            $pivot = PivotEntregaSalida::where('entrega_id',$insumos->id)->get();
           
                return view('welcome.datos',compact('entrega','productos','pivot'));
                       
        }
        return view('welcome.datos2');


    }
}
