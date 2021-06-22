<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\model\Rol;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PersonalController extends Controller
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
   public function personal(){

        // $roles= Rol::where('id','<>',1)->pluck('nombre','id');
        return view('personal.index');
    }

    public function data(){

        $query = User::where("id","<>",1)->get();
        if($query->count()<1)
        return $this->data_null;

        // return $query;
        foreach ($query as $dato) {
            
                
                            //$usuarios_all = $dato->name.' '.$dato->apellidos;
                            $apellidos=$dato->apellidos;
                            $nombres=$dato->nombres;
                            $dni=$dato->dni;
                            $area=$dato->area='';      
                            
                            
                            
                            $editar = "<button class='btn btn-sm btn-success' onclick='editar($dato->id)'>Editar</button>"; 
                            $eliminar = "<button class='btn btn-sm btn-danger' onclick='eliminar_personal($dato->id)'>Eliminar</button>";

                            $data['aaData'][] = [$dni,$nombres,$apellidos, $area, $editar, $eliminar];
        }
        return json_encode($data, true);      
    }

       
    public function store(Request $request)
    {
         $v = Validator::make($request->all(), [
             'dni' =>'required|unique:users',
            // 'email' =>'required|unique:users',
            //  'password' =>'required|confirmed|min:8',
         ]);

         if ($v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
         }  
                
        $Usuario = new User();
        $Usuario->dni = $request->dni;
        $Usuario->nombres =  strtoupper($request->nombres);
        $Usuario->apellidos = strtoupper($request->apellidos);        
        // $Usuario->email = $request->email;
        // $Usuario->password = Hash::make($request->password);
        $Usuario->save();
    }

    public function edit($id)
    {
        return User::find($id);
    }
    
    public function update(Request $request, $id)
    {
        $query = User::find($id);
        $query->dni = $request->dni;
        $query->nombres = $request->nombres;
        $query->apellidos = $request->apellidos;
        $query->save();
    }

    public function destroy(Request $r){
       
        User::destroy($r->id);
    }
}
