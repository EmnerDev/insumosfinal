$(document).ready(function() {
    var myTable=$('#zero_config').DataTable( {
        bProcessing: true,
        sAjaxSource: '/admin/index/data',
        "language" : {'url':'/js/table-latino.json'},
        iDisplayLength: 15,
         aLengthMenu: [15, 25,50, 100],
         bAutoWidth: true,
          order: []

    });

})

eliminar_entrega = function (id){
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
                url: `/entrega/eliminar`,
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
