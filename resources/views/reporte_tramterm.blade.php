@extends('layouts.app')
@section('content')

@include('layouts.menu_new')  
 

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
 
</head> 

<div class="container"> 
 <div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
            <div class="card"> 
                <div style="text-align: center;" class="card-header">{{ __('Trámites Terminados') }}</div> 
                <div class="card-body">
                
                <div class="form-group row"> 
        
                    
        <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Buscar por:') }}</label>

                <div class="col-md-8 ">
                <input list="browsers" name="usuario"  class="form-control" id ="busqueda" required>                             
                <datalist  id="browsers">                              
                    <option value="{{ __('Cliente') }}"></option>
                    <option value="{{ __('Escritura') }}"></option>
                    <option value="{{ __('Carpeta') }}"></option>
                </datalist>
            </div>                        
            </div> 

                    <div class="form-group row"> 
    
               
          <!--  <label id="variable" for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Escritura') }}</label>-->
          <div id="inner" class='col-md-4 col-form-label text-md-right'></div>

           

                    <div class="col-md-8 ">
                    <input list="op" name="usuario"  class="form-control"  id="valor" required>                             
                    <datalist   id ="op" >                              
                       
                    </datalist>
                </div>                        
                </div> 

                        <div class="form-group row">

                              <style>
                            table {
                                border-collapse: collapse;
                                border-spacing: 0;
                                width: 100%;
                                border: 1px solid #ddd;
                            }

                            th, td {
                                text-align: left;
                                padding: 8px;
                            }

                            tr:nth-child(even){background-color: #f2f2f2}
                            </style>
                            </head>
                            <body>
                            <div style="overflow: scroll;">
                            <table>
                            <thead>
					  	 
                           <tr>
                             
                             <th scope="col">Carpeta</th>
                             <th scope="col">Trámite</th>
                             <th scope="col">Número Escritura</th>
                             <th scope="col">Cliente</th>   
                             <th scope="col">Volumen</th>
                             <th scope="col">Folio1</th>  
                             <th scope="col">Folio2</th> 
                             <th scope="col">Otorgantes</th>
                             <th scope="col">Contrato</th>  
                             <th scope="col">Fecha Entrega</th> 
                             <th scope="col">Nombre Recibe</th>  
                           </tr>
                           <tbody id="div1">
                           
                          
                           </tbody >
                          
                         </thead>
                        
  </table>
</div>
  
                        </div>
                    
                </div>
            </div>
            <div id="div2">
                     </div>
        </div>
    </div>
</div> 
                            
                          

      

@endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--<script src="{{ asset('js/user.js') }}" ></script>-->

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    $("#busqueda").change(function(event){
        var b = $('#busqueda').val();

        if(b == 'Escritura'){
            $( "#inner" ).append( "<label for='usuarios' >{{ __('Escritura') }}</label>" );
             


      $.get("CarpetasTerm",function(response ,state){
            console.log(response);
                $("#op").empty();
               
            
                for(i=0; i<response.length; i++){  
                    
                    $("#op").append("' <option value="+ $.trim(response[i].numero_escritura) +"></option>'");  
                }  
            });
  
 $("#valor").change(function(event){
  $.get("TramitesTerminados/"+event.target.value+"",function(response ,state){
   console.log(response);
     $("#div1").empty();
     $("#div2").empty();  
 
    for(i=0; i<response.length; i++){  
        
   $("#div1").append("<tr><td width='20%' >"+ $.trim(response[i].carpeta_Id) +"</td><td width='20%'>"+ $.trim(response[i].tramite) +"</td><td width='55%' >"+ $.trim(response[i].numero_escritura) +"</td><td width='100%' >"+ $.trim(response[i].nombre) +" "+ $.trim(response[i].apellido_paterno) +" "+ $.trim(response[i].apellido_materno) +"</td><td width='60%'>"+ $.trim(response[i].volumen) +"</td><td>"+ $.trim(response[i].folio1) +"</td><td width='80%'>"+ $.trim(response[i].folio2) +"</td><td width='80%' >"+ $.trim(response[i].otorgantes) +"</td><td width='80%'>"+ $.trim(response[i].contrato) +"</td><td width='80%' >"+ $.trim(response[i].fecha_entrega) +"</td><td width='80%'>"+ $.trim(response[i].nombre_recibe) +"</td></tr>'");      
    }
    var us = $('#valor').val();
    var dato = 'Escritura';
   
    $("#div2").append("<a target='_blank' href='pdf/pdf_tramterm2/"+us+"/"+dato+"'>Ver PDF digital</a>"); 
  
  
  });
});

}

///////////////////////////////////////////////////////

if( b == 'Cliente'){
    $( "#inner" ).append( "<label for='usuarios' >{{ __('Clientes') }}</label>" );

     $.get("CarpetasTerm",function(response ,state){
            console.log(response);
                $("#op").empty();
               
            
                for(i=0; i<response.length; i++){  
                    
                    $("#op").append("' <option value="+ $.trim(response[i].cliente_id) +">"+ $.trim(response[i].nombre) +" "+ $.trim(response[i].apellido_paterno) +" "+ $.trim(response[i].apellido_materno) +"</option>'");  
                }
               
            
            
            });

     $("#valor").change(function(event){
    $.get("TramTermClient/"+event.target.value+"",function(response ,state){
   console.log(response);
     $("#div1").empty();
     $("#div2").empty();   
 
    
 
    for(i=0; i<response.length; i++){    
        $("#div1").append("<tr><td width='20%' >"+ $.trim(response[i].carpeta_Id) +"</td><td width='20%'>"+ $.trim(response[i].tramite) +"</td><td width='55%' >"+ $.trim(response[i].numero_escritura) +"</td><td width='100%' >"+ $.trim(response[i].nombre) +" "+ $.trim(response[i].apellido_paterno) +" "+ $.trim(response[i].apellido_materno) +"</td><td width='60%'>"+ $.trim(response[i].volumen) +"</td><td>"+ $.trim(response[i].folio1) +"</td><td width='80%'>"+ $.trim(response[i].folio2) +"</td><td width='80%' >"+ $.trim(response[i].otorgantes) +"</td><td width='80%'>"+ $.trim(response[i].contrato) +"</td><td width='80%' >"+ $.trim(response[i].fecha_entrega) +"</td><td width='80%'>"+ $.trim(response[i].nombre_recibe) +"</td></tr>'");      
    }
    var us = $('#valor').val();
    var dato = 'Cliente';

    $("#div2").append("<a target='_blank' href='pdf/pdf_tramterm2/"+us+"/"+dato+"'>Ver PDF digital</a>"); 
 
});
  });
}

//////////////////////////////////////////////////////////////////////77
if( b == 'Carpeta'){
    $( "#inner" ).append( "<label for='usuarios' >{{ __('Carpeta') }}</label>" );

     $.get("CarpetasTerm",function(response ,state){
            console.log(response);
                $("#op").empty(); 
               
            
                for(i=0; i<response.length; i++){  
                    
                    $("#op").append("' <option value="+ $.trim(response[i].carpeta_Id) +"></option>'");  
                }
               
            
            
            });

     $("#valor").change(function(event){ 
    $.get("TramTermCarpet/"+event.target.value+"",function(response ,state){
   console.log(response);
     $("#div1").empty();
     $("#div2").empty();  

    
 
    for(i=0; i<response.length; i++){   
        $("#div1").append("<tr><td width='20%' >"+ $.trim(response[i].carpeta_Id) +"</td><td width='20%'>"+ $.trim(response[i].tramite) +"</td><td width='55%' >"+ $.trim(response[i].numero_escritura) +"</td><td width='100%' >"+ $.trim(response[i].nombre) +" "+ $.trim(response[i].apellido_paterno) +" "+ $.trim(response[i].apellido_materno) +"</td><td width='60%'>"+ $.trim(response[i].volumen) +"</td><td>"+ $.trim(response[i].folio1) +"</td><td width='80%'>"+ $.trim(response[i].folio2) +"</td><td width='80%' >"+ $.trim(response[i].otorgantes) +"</td><td width='80%'>"+ $.trim(response[i].contrato) +"</td><td width='80%' >"+ $.trim(response[i].fecha_entrega) +"</td><td width='80%'>"+ $.trim(response[i].nombre_recibe) +"</td></tr>'");      
    }
    var us = $('#valor').val();
    var dato = 'Carpeta';
    

    $("#div2").append("<a target='_blank' href='pdf/pdf_tramterm2/"+us+"/"+dato+"'>Ver PDF digital</a>"); 
 
});
  });
}
});
});
</script>
@endsection



 




