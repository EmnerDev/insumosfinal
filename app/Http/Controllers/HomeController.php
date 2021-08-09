<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Producto;
use App\model\Entrega;
use App\model\SalidaProducto;
use App\model\PivotEntregaSalida;

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
            $search = PivotEntregaSalida::where('entrega_id',$insumos->id)->first();
            if( (boolean) $search){
                return view('welcome.datos',compact('search'));
            }
           
        }
        return view('welcome.datos2');


    }
}
