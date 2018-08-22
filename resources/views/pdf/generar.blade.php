<!DOCTYPE html>
<html>
<head>
    <title>Reporte Clientes</title>
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
    #footer { 
  position: fixed; 
  width: 100%; 
  bottom: 0; 
  left: 0;
  right: 0;
}
.custom-footer-page-number:after {
  content: counter(page);
}

body { 
  font: 12pt Georgia, "Times New Roman", Times, serif; 
  line-height: 1.3;}
  @page { 
    /* switch to landscape */ 
   size: landscape; 
   /* set page margins */ 
   margin: 0.5cm; 
   /* Default footers */ 
   @bottom-left { 
     content: "Department of Strategy"; 
   } 
   @bottom-right { 
     content: counter(page) " of " counter(pages); 
  }
}

body {
    padding-top: 50px;
}
.custom-page-start {
    margin-top: 50px;
}

   
     
</style>
</head>
<body>
    <div class="@if($tipo=='fisico') fisico @endif">
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
            <tr>
                
                <td width="37%" ></td>
                <td width="5%">&nbsp;</td>
                <td width="13%">&nbsp;</td>
                <td width="4%">&nbsp;</td>
                <td width="7%" align="center" class="border fondo"><strong>DÍA</strong></td>
                <td width="8%" align="center" class="border fondo"><strong>MES</strong></td>
                <td width="7%" align="center" class="border fondo"><strong>AÑO</strong></td>
            </tr>
            <tr>
                <td></td>
               
                <td></td>
                <td></td>
                <td>&nbsp;</td>
                <td align="center" class="border"><span class="text">{{ $dia }}</span></td>
                <td align="center" class="border"><span class="text">{{ $mes }}</span></td>
                <td align="center" class="border"><span class="text">{{ $ayo }}</span></td>
            </tr>
            
        </table> 
        <h2 style="text-align: center;" >Clientes</h2>
        
        <table width="100%" class="tabla3">
            <tr>
                <td align="center" class="fondo"><strong>Nombre</strong></td>
                <td align="center" class="fondo"><strong>Telèfono</strong></td>
                <td align="center" class="fondo"><strong>Celular</strong></td>
                <td align="center" class="fondo"><strong>Correo</strong></td>
                <td align="center" class="fondo"><strong>Direcciòn</strong></td>
                <td align="center" class="fondo"><strong>Còdigo Postal</strong></td>
                <td align="center" class="fondo"><strong>Estado</strong></td>
                <td align="center" class="fondo"><strong>Municipio</strong></td>
            </tr>
          @foreach($clientes as $cliente)
            <tr> 
                <td width="20%" align="center"  ><span class="text">{{ $cliente->nombre }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}</span></td>
                <td ><span class="text">{{ $cliente->telefono }}</span></td>
                <td><span class="text">{{ $cliente->celular }}</span></td>
                <td><span class="text">{{ $cliente->correo }}</span></td>
                <td><span class="text">{{ $cliente->calle }} {{ $cliente->numero_exterior }} {{ $cliente->numero_interior }} {{ $cliente->colonia }}</span></td>
                <td><span class="text">{{ $cliente->codigo_postal }}</span></td>
                <td><span class="text">{{ $cliente->estado }}</span></td>
                <td><span class="text">{{ $cliente->municipio }}</span></td>
               
            </tr>
            @endforeach
          
           
        </table> 
        
    </div>
    <div id="footer"> 
    <table width="100%" class="tabla1">
        <tr>
         <td width="40%" align="right"><img id="logo" src="{{ asset('/imagenes/covel2.png') }}" alt="" width="45" height="57"></td>
         </td> 
       </table>
  </div> 
</body>
</html>