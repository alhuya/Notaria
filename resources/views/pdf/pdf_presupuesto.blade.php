<!DOCTYPE html>
<html>
<head>
    <title>Tramites Terminados</title>
    <style type="text/css">
    body{
        font-size: 16px;
        font-family: "Arial";
    }
    table{
        border-collapse: collapse;
    }
    td{
        padding: 6px 5px;
        font-size: 15px;
    }
    .h1{
        font-size: 21px;
        font-weight: bold;
    }
    .h2{
        font-size: 18px;
        font-weight: bold;
    }
    .tabla1{
        margin-bottom: 20px;
    }
    .tabla2 {
        margin-bottom: 20px;
    }
    .tabla3{
        margin-top: 15px;
    }
    .tabla3 td{
        border: 1px solid #000;
    }
    .tabla3 .cancelado{
        border-left: 0;
        border-right: 0;
        border-bottom: 0;
        border-top: 1px dotted #000;
        width: 200px;
    }
    .emisor{
        color: red;
    }
    .linea{
        border-bottom: 1px dotted #000;
    }
    .border{
        border: 1px solid #000;
    }
    .fondo{
        background-color: #dfdfdf;
    }
    .fisico{
        color: #fff;
    }
    .fisico td{
        color: #fff;
    }
    .fisico .border{
        border: 1px solid #fff;
    }
    .fisico .tabla3 td{
        border: 1px solid #fff;
    }
    .fisico .linea{
        border-bottom: 1px dotted #fff;
    }
    .fisico .emisor{
        color: #fff;
    }
    .fisico .tabla3 .cancelado{
        border-top: 1px dotted #fff;
    }
    .fisico .text{
        color: #000;
    }
    .fisico .fondo{
        background-color: #fff;
    }
    @if($tipo=='fisico')
    #logo{ 
        display: none;
    } 
    @endif
</style>
</head> 
<body>
    
        <table width="100%" class="tabla1">
            <tr>
                <td width="73%" align="center"><img id="logo" src="{{ asset('imagenes/logo4.png') }}" alt="" width="255" height="57"></td>
                <td width="27%" rowspan="3" align="center" style="padding-right:0">
                    
                </td> 
            </tr>
            <tr>
                <td align="center">Tecnológico 109, Burócrata, 34279 Durango, Dgo.</td>
            </tr>
            <tr>
                <td align="center">Tel.: (01) 618-817-1908 </td>
            </tr>
           
             
        </table>
        <h2 style="text-align: center;" >Trámites Terminados</h2>
        <table width="100%" class="tabla2"> 
        <tr>  
               
              
              
        <td width="11%">Carpeta:</td>
               @foreach($Escrituras as $escritura)
                <td width="37%" class="linea"><span class="text">{{$escritura->carpeta_id }} </span></td>
                @break;
              @endforeach
                <td width="5%">&nbsp;</td>
                <td width="13%">&nbsp;</td>
                <td width="4%">&nbsp;</td>
                <td width="7%" align="center" class="border fondo"><strong>DÍA</strong></td>
                <td width="8%" align="center" class="border fondo"><strong>MES</strong></td>
                <td width="7%" align="center" class="border fondo"><strong>AÑO</strong></td>
            </tr>
            <tr>
                <td></td>
                <td ></td> 
                <td></td> 
                <td></td>
                <td>&nbsp;</td> 
                <td align="center" class="border"><span class="text">{{ $dia }}</span></td>
                <td align="center" class="border"><span class="text">{{ $mes }}</span></td>
                <td align="center" class="border"><span class="text">{{ $ayo }}</span></td>
            </tr>
        </table> 
       
        
        <table width="100%" class="tabla3">
            <tr>
                <td align="center" class="fondo"><strong>Concepto</strong></td>
                <td align="center" class="fondo"><strong>Cantidad</strong></td>
               
              
                                   
            </tr>
          @foreach($Escrituras as $escritura)
            <tr> 
                <td><span class="text"> {{ $escritura->concepto }}</span></td>
                <td ><span class="text">{{ $escritura->costo }}</span></td>
                
                
                             
            </tr>
            @endforeach 
          
             
        </table> 
    </div>
</body>
</html>