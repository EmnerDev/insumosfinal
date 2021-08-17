 
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

            // $('#tabla_insumos tbody').html(response)  
            //$("#entrega_id").val(response.entrega_id); 
            console.log("==>",response);
         
         },
         error: function (response){
             console.log("Error",response.data);
         }
     });
     $('#modal_vista').modal('show');
  }

//  function ver(id){
//      $.ajax({
//          url:   "/ver_insumos/"+id,
//          type: 'POST',
        
//          success:  function (response){
//              console.log("resultado",response);  

//              var id = this.dataset.id;
//              document.querySelector('#entrega_id').value = id;
//          },
//          error: function (response){
//              console.log("Error",response.data);
          
//          }
//      });
//      $("#modal_vista").modal("show");
//  }