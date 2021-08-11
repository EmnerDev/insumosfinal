 
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