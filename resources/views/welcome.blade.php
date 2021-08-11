<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
       
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">   
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'dark', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <div class="flex-center position-ref ">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{route('index')}}">Ingresar</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif -->
                    @endauth
                </div>
                </div>
            @endif    
        
    <header  class="bg-white" >
                <br>
                <div align="center">
                    <table style="background-color: #e3f2fd;">
                        <tr>
                            <td rowspan="2"><img src="{{asset('img/logo.png')}}" height="60"></td>
                            <td class="titulo" align="center">UNIVERSIDAD NACIONAL HERMILIO VALDIZÁN</td>
                            <td rowspan="2"><img src="{{asset('img/logo-in.png')}}" height="90px"></td>
                        </tr>
                        <tr align="center">
                            <td class="titulo" align="center">OFICINA DE RECURSOS HUMANOS</td>
                        </tr>
                    </table>
                </div><hr>
    </header>
    <div class="flex-center ">            
            <div class="content">
            
                <div class="bg-ligh">
                    <h1> ¡Insumo-Control de inventario!</h1><br>
                    <img src="{{asset('/img/inventario2.png')}}" height="420px">
                    <br><br>  
                    <!-- <p class="text-dark h6"> Ingrese el número de <u>DNI</u>. Luego dar clic al boton <i>"Buscar"</i>.
                        <!-- <br><a href="#" class="text-danger">Clic aquí para ver el video tutorial</a> -->
                   <!-- </p>                -->
                </div>
                
                <div class="row" >                   
                    <!-- <button type="button" class="btn btn-success col-sm-4 m-2" href="{{route('index')}}">Ingresar</button> -->
                    <input type="text" placeholder="Ingrese DNI" class="form-control text-center input col-sm-5 m-2" id="dni" maxlength="10" autofocus autocomplete="off">
                    <button type="submit" class="btn btn-success col-sm-4 m-2" onclick="search_insumos()"> Buscar</button> 
                    <!-- <a href="{{route('index')}}" class="btn-lg btn-success col-sm-3 m-1"> Buscar</button> -->
                    <!-- <a href="{{route('index')}}" class="btn-lg btn-success col-sm-3 m-1">Ver Insumos</a> -->
                </div><br>
                <div id="mensaje" class="bg-danger text-white"> </div>
                <div id="resultado"> </div>
                

                
            </div>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  
      
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="{{ asset('js/welcome.js') }}"></script>

    </body>
</html>
