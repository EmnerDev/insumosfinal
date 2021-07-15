$(document).ready(function(){
 
 
         $('#insumos2').DataTable( {
              bProcessing: true,
              sAjaxSource: $("#insumos2").data("url"),
              "language" : {'url':'/js/table-latino.json'},
              iDisplayLength: 15,
              aLengthMenu: [15, 25,50, 100],
              bAutoWidth: true,
              order: []
         }) 
         $('#ingreso_insumos').DataTable( {
             bProcessing: true,
             sAjaxSource: $("#ingreso_insumos").data("url"),
             "language" : {'url':'/js/table-latino.json'},
             iDisplayLength: 15,
             aLengthMenu: [15, 25,50, 100],
             bAutoWidth: true,  
             order: []
         }) 
        $('#salida_insumos').DataTable( {
             bProcessing: true,
             sAjaxSource: $("#salida_insumos").data("url"),
             "language" : {'url':'/js/table-latino.json'},
             iDisplayLength: 15,
             aLengthMenu: [15, 25,50, 100],
             bAutoWidth: true,
             order: []
         })           
});