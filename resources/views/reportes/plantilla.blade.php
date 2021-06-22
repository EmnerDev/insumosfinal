<html>
            <?php $ruta_img='';
                  $logo1 = "img/logo.png";
                  // if(substr($logo1->valor, 0,6)=='public') $logo1=Storage::url($logo1->valor);
                  // else $logo1= asset($logo1->valor);

                  $logo2 = "img/logo.png";
                  // if(substr($logo2->valor, 0,6)=='public') $logo2=Storage::url($logo2->valor);
                  // else $logo2= asset($logo2->valor);

                                  
                  $anio = '"Año del Bicentenario del Perú: 200 años de Independencia"';
                  $titulo = "INSUMOS - CONTROL DE INVENTARIO";
                  $institucion = "UNIVERSIDAD NACIONAL HERMILIO VALDIZAN";
                  
                 
            ?>
              <title>Reporte PDF </title>
              
              <meta charset="UTF-8">
              <meta name="description" content="eporte PDF">
              <meta name="author" content="Informática">

<head>
 <style>
    body{
      font-family: sans-serif;
    }
    @page {
      /* margin: 100px 50px; */
      /* Arriba | Derecha | Abajo | Izquierda */
      margin: 100px 50px 50px 50px;
    }
    header { position: fixed;
      left: 0px;
      top: -90px;
      right: 0px;
      height: 80px;
      background-color: rgba(133, 193, 233, .4 );
      text-align: center;
    }
    header h1{
      margin: 30px 0;
    }
    header h2{
      margin: 0 0 10px 0;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: 0px;
      right: 0px;
      height: 15px;
      border-bottom: 2px solid #ddd;
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
      font-style: italic;
      font-size: 15px;
      
    }
    footer .izq {
      text-align: left;
    }
  
    .table td, .table  th {
        padding:5px;
        border: 1px solid black;
        font-size: 12px;
    }
    .table  th {
        font-weight: bold;
        text-align: center;
        background-color: rgba(234, 237, 237, .6 )
    }
    
    .table {
        width: 100%;
        border-collapse: collapse;
        border:  rgba(234, 237, 237, .6 ) 1px solid;
    }
  </style>
      @yield("css")  
<body>
  <header>
    <table width="100%">
      <tr>
        <td rowspan="3" width="10%">
          
          <img src="{{ public_path($logo1)}}"  height="65px" title="img 1">
        </td>
        
        <td align="center" width="70%">
            <small style="font-size:12px"> {{$anio}} </small><br>
        </td>
        <td  rowspan="3" width="20%">
          <img src="{{ public_path($logo2)}}"  width="65px" title="img 2">
          
        </td>
      </tr>
      <tr>
        <td align="center"> 
           <label style="padding:0;font-size:20px;"><b>{{$institucion}}</b></label>
        </td>
      </tr>
      <tr>
        <td align="center">
          <label style="padding=-5px;margin:-4px;"><b>{{$titulo}}</b></label>
        </td>
      </tr>
    </table>
        
  </header>
  <footer>
    <table>
      <tr>
        <td>
            <p class="izq">
              control de Insumos
            </p>
        </td>
        <td>
          <p class="page">
            Página
          </p>
        </td>
      </tr>
    </table>
  </footer>
  <div id="content">
    @yield("contenido")   

    <!-- <p style="page-break-before: always;">
    Podemos romper la página en cualquier momento...</p>
    </p> -->
  </div>
</body>
</html>