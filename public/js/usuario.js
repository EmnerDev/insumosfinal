$(document).ready(function() {
    var myTable=$('#zero_config').DataTable( {
        bProcessing: true,
        sAjaxSource: '/personal/index/data',
        "language" : {'url':'/js/table-latino.json'},
        iDisplayLength: 15,
         aLengthMenu: [15, 25,50, 100],
         bAutoWidth: true,
          order: []
    });

})
guardar_nuevo=function(){
    if( $("#nuevo_dni").val()=="" || $("#nuevo_nombre").val()=="" || $("#nuevo_apellidos").val()=="" || $("#nuevo_descripcion").val()==""){
        alert("Hay campo(s) vacio(s)");
        return false;
    }

    var datos=$("#formulario_nuevo").serialize();
    var route = "/personal/index/store";
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
                icon: 'success',
                title: 'Se Registró Correctamente',
                showConfirmButton: false,   
                timer: 1500

            })
            // document.getElementById("formulario_nuevo").reset();
            $('#nuevo_personal_modal').modal('hide');
            $('body').removeClass('modal-open');
            $(".modal-backdrop").remove();
            $("#nuevo_dni").val("");
            $("#nuevo_nombre").val("");
            $("#nuevo_apellidos").val("");
            // $("#nuevo_descripcion").val("");
            $('#zero_config').DataTable().ajax.reload();
            

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
    
}
guardar_cambios = function(){
    var datos=$("#formulario_editar").serialize();
    var route = "/personal/update/"+$("#editar_id").val();
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
                icon: 'success',
                title: 'Cambios Guardados Correctamente',
                showConfirmButton: false,
                timer: 1500
            })
            $('#zero_config').DataTable().ajax.reload();
            $('#editar_personal_modal').modal('hide');
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
    
}
function editar(id){
    $.ajax({
        url:   "/personal/editar/"+id,
        type: 'GET',
        beforeSend: function () {
          console.log('enviando....');
        },
        success:  function (response){
            console.log("resultado",response);
            $("#editar_id").val(response.id);
            $("#editar_dni").val(response.dni);
            $("#editar_nombre").val(response.nombres);
            $("#editar_apellidos").val(response.apellidos);
            // $("#editar_apellidos").html(response.descripcion);
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
    $("#editar_personal_modal").modal("show");
}

eliminar_personal = function (id){
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
                url: `/personal/eliminar`,
                type: "POST",
                data: {'id':id},

                success:function(data){
                    $('#zero_config').DataTable().ajax.reload();
                    
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

