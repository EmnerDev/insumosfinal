function actualizar(){
    location.reload();
}
guardar_nuevo_insumo = function (tipo,form_id){  
    if( $("#nuevo_producto").val()=="" || $("#nuevo_cantidad").val()=="" || $("#nuevo_descripcion").val()=="" ){
        alert("Hay campo(s) vacio(s)");
        return false;
    }  
    var $form=$(`#${form_id}`).serializeArray();   
    $.each($form, function (ind, elem) { 
        if(elem.value=="") alert("Llene todos los campos"); return false; 
    });     
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: `/inventario/ingreso/${tipo}/store`,
        type: "POST",
        data: $(`#${form_id}`).serialize(), 
        success:function(response){
            console.log('sad',response);
            $("#nuevo_insumo_modal").modal("hide");
            $('body').removeClass('modal-open');
            $(".modal-backdrop").remove();
            $("#nuevo_producto").val("");
            $("#nuevo_cantidad").val("");
            $("#nuevo_descripcion").val("");
            $("#agregar_insumo_modal").modal("hide");
            $('body').removeClass('modal-open');
            $(".modal-backdrop").remove();
            
             actualizar_tablas();
            Swal.fire(    
                '¡Guardado!',
                'Se guardaron los datos correctamente',
                'success'
              )
            //  document.getElementById(form_id).reset();
            // actualizar();             
        },
        error: function(data){
        }
    });
}

editar_registro_insumo = function(id){
    var tipo = 'insumos';
    $.ajax({
        url: `/inventario/ingreso/${id}/${tipo}/editar`,
        type: "GET",
        success:function(data){
            $("#editar_nombre").val(data.nombre);
            $("#editar2_cantidad").val(data.cantidad);
            $("#editar_presentacion").val(data.presentacion_id);
            $("#editar2_descripcion").val(data.descripcion);
            $("#e_btn_editar_registro").attr("onclick",`guardar_editar_insumo(${id},'insumos','editar_registro_insumo')`);
            $("#editar_registro_modal").modal("show");
        },
        error: function(data){
        }
    });
}

editar_ingreso_insumo = function(id){
    var tipo = 'ingresoinsumos';
    $.ajax({
        url: `/inventario/ingreso/${id}/${tipo}/editar`,
        type: "GET",
        success:function(data){
            $("#editar_producto").val(data.producto_id);
            $("#editar_cantidad").val(data.cantidad);
            $("#editar_descripcion").val(data.descripcion);
            $("#e_btn_editar_ingreso").attr("onclick",`guardar_editar_insumo(${id},'ingresoinsumos','editar_ingreso_insumo')`);
            $("#editar_insumo_modal").modal("show");
        },
        error: function(data){
        }
    });
}

guardar_editar_insumo = function (id,tipo,form_id){
    var $form=$(`#${form_id}`).serializeArray();
    $.each($form, function (ind, elem) { 
        if(elem.value=="") alert("Llene todos los campos"); return false; 
    }); 
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: `/inventario/ingreso/${id}/${tipo}/actualizar`,
        type: "POST",
        data: $(`#${form_id}`).serialize(), 
        success:function(){

            $("#editar_insumo_modal").modal("hide");
            $("#editar_registro_modal").modal("hide");
            actualizar_tablas();
            
            Swal.fire(
                '¡Guardado!',
                'Se actualizaron los datos correctamente',
                'success'
              )
              
              //document.getElementById(form_id).reset();
        },
        error: function(data){
        }
    });
}

eliminar_insumos = function (id,tipo){
    Swal.fire({
        title: '¿Estás seguro?',
        text: `Se eliminarán todos los registros vinculados a esta fecha`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Estoy seguro',
        cancelButtonText: 'No, cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: `/inventario/${tipo}/eliminar`,
                type: "POST",
                data: {'id':id}, 
                
                success:function(response){
                    console.log('sad',response);
                    actualizar_tablas();

                    Swal.fire(
                        '¡Eliminado!',
                        'Se Eliminaron los datos correctamente',
                        'success'
                      )
                },
                error: function(data){
                }
            });
        }
    })
}


actualizar_tablas = function (){
    $('#insumos2').DataTable().ajax.reload();
    $('#ingreso_insumos').DataTable().ajax.reload();
    $('#salida_insumos3').DataTable().ajax.reload();
    // $('#diplomas_entregados').DataTable().ajax.reload();
    // $('#ajustes_fechas').DataTable().ajax.reload();
    // $('#ajustes_diplomas').DataTable().ajax.reload();
}