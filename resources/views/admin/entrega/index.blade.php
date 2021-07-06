@extends('adminlte::page')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection  
@section('content')

<div class="container">
    <br>
    <h5 class="col-sm-12">ENTREGA DE INSUMOS AL PERSONAL</h5>
                            
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">DATOS GENERALES</h5>
            
                <div class="form-group">
                    <label for="personal_nuevo" class="col-sm-12 col-form-label">Personal</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" value="{{$entrega->user->dni}} - {{$entrega->user->nombres}} {{$entrega->user->apellidos}}" disabled>
                    </div>
                </div>  
                <div class="form-group">
                    <label for="personal_nuevo" class="col-sm-12 col-form-label">Fecha de entrega</label>
                    <div class="col-sm-12">
                        <input type="date" value="{{$entrega->fecha}}" disabled>
                    </div>
                </div>  

                <div class="form-group">
                    <label for="personal_nuevo" class="col-sm-12 col-form-label">Observaciones</label>
                    <div class="col-sm-12">
                    <textArea placeholder="escribir aquí" class="form-control">{{$entrega->descripcion}}</textArea>
                    </div>
                </div>  
        </div>
   
    </div>   

 
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">INSUMOS</h5><br><br>
           
                <div class="form-group row">
                    <input type="number" placeholder="Cant" name="cantidad" id="id_cantidad" class="col-sm-2 form-control"> 
                 
                    <select class="form-control col-sm-7" id="id_producto" name="producto_id">
                        <option >Abre y selecciona producto</option>   
                            @foreach($productos as $t)
                        <option value="{{$t->id}}">{{$t->nombre}} - {{$t->presentacion->nombre}}</option>                     
                        @endforeach                
                    </select>
                    <button class="btn btn-success col-sm-2 " id="agregar"> Agregar</button>
                </div> <hr>

                <table class="table" id="tabla_insumos">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cant.</th>
                        <th scope="col">Insumo</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
                
        </div>
    </div>

    <button class="btn btn-success"> Guardar</button><br><br>
    
</div>

 
@endsection
@section('js')

<!-- <script src="{{ asset('js/dni.js') }}"></script> -->
<script src = "https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
 <!-- <script src="{{ asset('js/datatable.js') }}"></script> -->
 <script src="{{ asset('js/admin.js') }}"></script>
 <!-- <script src="{{ asset('js/mi-script.js') }}"></script> -->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
<script>
    var tabla_insumos = ['2','222'];
    $('#personal').select2();
    $("#agregar").click(function(){
        // alert('holaaaaa');
        if( $("#id_cantidad").val()=="" || $("#id_producto").val()==""){
            alert("Hay campo(s) vacio(s)");
            return false;
        }
        var datos=$("#tabla_insumos").serialize();

        var list = { id_cantidad, id_producto};
        console.log(list);


        // alert('Datos serializados: '+datos);       
        var route = "/admin/entrega/nuevo";
           
        $.ajax({
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
                data: datos,
                url:   route,
                type: 'POST',
            beforeSend: function () {
                console.log('enviando....');
            },
            success:  function (){
                Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'Se registró Correctamente',
                    showConfirmButton: false,
                    timer: 1500
                }) 
                 $('#data_table').DataTable().ajax.reload();                               
                $("#cantidad").val("");      
                $("#producto_id").val("");  

            },
            error: function (response){
                console.log("Error",response.data);
                Swal.fire({
                    title: "¡Error!",
                    text: response.responseJSON.message,
                    icon: "error",
                    timer: 3500,
                })
            }
        });
    })

    function set_tabla(){
        $("#tabla_insumos tbody").html("");
    }
    set_tabla();
</script>
@endsection
