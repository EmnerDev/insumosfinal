@extends('adminlte::page')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@endsection  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                

                <!-- <div class="card-header">Entrega de Insumos
                    <button type="button" class="btn btn-sm btn-primary  float-end" >Añadir</button> 
                </div> -->
                <div class="card-body">
                    
                @include('inventario.nuevo')
                @include('inventario.editar')
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"> Insumos</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ingreso de Insumos</a>
                        </li>
                          <li class="nav-item" role="presentation">
                            <a class="nav-link" id="salida-tab" data-toggle="tab" href="#salida" role="tab" aria-controls="salida" aria-selected="true">Salida de Insumos</a>
                        </li>
                    </ul><br>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <button class="btn btn-primary btn-sm mb-2" style="background-color:#009999;" data-toggle="modal" data-target="#agregar_insumo_modal">Agregar</button>
                            <div class="table-responsive">

                                <table id="insumos2" class="table table-striped data_table" data-url="/inventario/data/1">
                                    <thead class="text-white"style="background-color:#009999;">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Presentacion</th>
                                            <th>Descripcion</th> 
                                            <th>Fecha</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>                                            
                                                                                                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> 
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" > 
                            <button class="btn btn-primary btn-sm mb-2" style="background-color:#009999;"  data-toggle="modal" data-target="#nuevo_insumo_modal">Agregar</button>
                                <div class="table-responsive">
                                    <table id="ingreso_insumos" class="table table-striped data_table" width="100%"  data-url="/inventario/data/2" >
                                        <thead class="text-white"style="background-color:#009999;" >
                                            <tr>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Presentacion</th>  
                                            <th>Descripcion</th>
                                            <th>fecha</th> 
                                            <th>Editar</th>
                                            <th>Eliminar</th>  

                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        <div class="tab-pane fade" id="salida" role="tabpanel" aria-labelledby="salida-tab">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">                            
                                <div class="table-responsive" >
                                    <table id="salida_insumos" class="table table-striped data_table" width="100%" data-url="/inventario/data/3">
                                        <thead class="text-white"style="background-color:#009999;">
                                            <tr>
                                            <th>Nombres</th>
                                            <th>Cantidad</th>
                                            <th>Presentacion</th>  
                                            <th>Descripcion</th>
                                            <th>fecha</th>  

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
</div>

@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- <script src="{{ asset('js/dni.js') }}"></script> -->
<script src = "https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/datatable.js') }}"></script>
<script src="{{ asset('js/inventario.js') }}"></script> 

@endsection
