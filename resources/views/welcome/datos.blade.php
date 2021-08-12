
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


@endsection  


<div class="container">
    
                        
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

               
                 <h5 class="text-dark"style="background-color:#b3ff99;">INSUMOS RECIBIDOS                  
				</h5>
              
                <div class="card-body">   
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table-responsive">

                                <table id="zero_config" class="table table-striped data_table">
                                    <thead class="text-white"style="background-color:#009999;">
                                        <tr>
                                            <th>Fecha</th>
											<th>DNI</th>											
                                            <th>Usuario</th> 											                                         
                                            <th>Descripción</th> 											                                                                                      
                                            <th>Acciones</th>
											
                                        </tr>
                                    </thead>
									@foreach($entrega as $e)
                                    <tbody>
										
											<td>{{$e->fecha}}</td>
											<td>{{$e->user->dni}}</td>
											<td>{{$e->user->nombres}} {{$e->user->apellidos}}</td>  
											<td>{{$e->descripcion}}</td> 
											<td>
											<button class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#modal_vista">Ver Insumos</button>
											
											</td>
										
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                       
                    </div>

                </div>
                
            </div>
            
        </div>
        
    </div>

    
</div>

@include('welcome.vista')
@section('js')

<!-- <script src="{{ asset('js/dni.js') }}"></script> -->
<script src = "https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
 <!-- <script src="{{ asset('js/datatable.js') }}"></script> -->
 <script src="{{ asset('js/welcome.js') }}"></script>
 <!-- <script src="{{ asset('js/mi-script.js') }}"></script> -->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('#personal').select2({ dropdownParent: "#modal_nuevo" });
    //$('#js-example-basic-single').select2();

    //$("#nuevo_personal1").select2({ dropdownParent: "#modal_nuevo" });
</script>
@endsection
       
