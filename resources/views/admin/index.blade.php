@extends('adminlte::page')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">   

@endsection  
@section('content')

<div class="container">
    
                        
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">


            
                 <div class="card-header">Entrega de Insumos:   
                    <button class="btn btn-primary btn-sm mb-2" style="background-color:#009999;" data-toggle="modal" data-target="#modal_nuevo">Agregar</button>
                    <!-- <div class="btn-group" style="float: right;">
                        <button type="button" class="btn btn-outline-danger dropdown-toggle " data-toggle="dropdown">
                        Reportes
                        </button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('reportes.total')}}">Lista de Insumos</a>
                        <a class="dropdown-item" href="{{route('reportes.entrada')}}">Entrada de Insumos</a>
                        <a class="dropdown-item" href="{{route('reportes.salida')}}">Salida de Insumos</a> 
                        </div>
                    </div> 
                    <div class="btn-group">
                    <button type="button" class="btn btn-default">Action</button>
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div> -->
                </div>
                <div class="card-body">   

                
                              
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table-responsive">

                                <table id="zero_config" class="table table-striped data_table">
                                    <thead class="text-white"style="background-color:#009999;">
                                        <tr>
                                            <th>Personal</th>
                                            <th>Entrega</th>                                            
                                            <th>Descripcion</th>                                                                                        
                                            <th>Fecha</th>
                                             <!-- <th>Editar</th>
                                            <th>Eliminar</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                       
                    </div>

                </div>
                
            </div>
            
        </div>
        
    </div>

    
</div>

@include('admin.modals')
@endsection
@section('js')

<!-- <script src="{{ asset('js/dni.js') }}"></script> -->
<script src = "https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
 <!-- <script src="{{ asset('js/datatable.js') }}"></script> -->
 <script src="{{ asset('js/admin.js') }}"></script>
 <!-- <script src="{{ asset('js/mi-script.js') }}"></script> -->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
<script>
    $('#nuevo_personalxx').select2();
    //$('#js-example-basic-single').select2();

    //$("#nuevo_personal1").select2({ dropdownParent: "#modal_nuevo" });
</script>
@endsection
