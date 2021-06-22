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

                

                <div class="card-header">Lista de Usuarios
                 
                 <!-- <button class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="/">Actualzar Tabla</button> -->
                    <button class="btn btn-primary btn-sm mb-2" style="background-color:#009999;" data-toggle="modal" data-target="#nuevo_personal_modal">Agregar</button>
                  </div>
                        <div class="card-body"> 
                    
                            @include('personal.nuevo')
                            @include('personal.editar')
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"> Personal</a>
                            </li>
                        
                            </ul><br>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="table-responsive">

                                        <table id="zero_config" class="table table-striped data_table">
                                            <thead class="text-white"style="background-color:#009999;">
                                                <tr>
                                                    <th>DNI</th>
                                                    <th>Nombre</th>
                                                    <th>Apellidos</th>
                                                    <th>Area</th>                                                    
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')

<!-- <script src="{{ asset('js/dni.js') }}"></script> -->
<script src = "https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <!-- <script src="{{ asset('js/datatable.js') }}"></script> -->
 <script src="{{ asset('js/usuario.js') }}"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection