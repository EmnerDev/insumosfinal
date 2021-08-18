 
$(document).ready(function(){
});
function search_insumos(){
    var dni = $("#dni").val(); 
    
    if(dni=="") {alert("Llenar el campo vacio"); return false}

    $.get(`/search_insumos/${dni}/insumos`,function(data){
            var $html =    data; 
            $("#resultado").html($html);
    });		        
}

 function ver(var2){
    // var $form=$(`#${var2}`).serializeArray(); 
   
      //var var2=document.getElementById('user_id'); //que estás haciendo aquí :-D 
        var var2 = var2;
      $.ajax({
        
         url:   `/ver_insumos/${var2}`,
         type: 'GET',
         beforeSend: function () {
            console.log('enviando....');
           
         },
         success:  function (response){

            var cantidad = $('#cantidad').val();
            var nombre = $('#nombre').val();
            $('#tabla_insumos tbody').append('<tr><td>' + cantidad + '</td><td>' + nombre + '</td></tr>');
            $("#modal_vista").modal('hide');
            console.log("==>",response);
         
         },
         error: function (response){
             console.log("Error",response.data);
         }
     });
     $('#modal_vista').modal('show');
  }
