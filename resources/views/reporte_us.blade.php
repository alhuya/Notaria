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
                <div style="text-align: center;" class="card-header">{{ __('Reportes Usuarios') }}</div> 
                <div class="card-body">
                <div class="form-group row"> 
        
                    
            <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Buscar por:') }}</label>

                    <div class="col-md-8 ">
                    <input list="browsers" name="usuario"  class="form-control" id ="busqueda" required>                             
                    <datalist  id="browsers">                              
                        <option value="{{ __('Activo') }}"></option>
                        <option value="{{ __('Inactivo') }}"></option>
                        <option value="{{ __('Todos') }}"></option>
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
                             
                             <th scope="col">Nombre</th>
                             <th scope="col">Apellido Paterno</th>
                             <th scope="col">Apellido Materno</th>
                             <th scope="col">Correo</th> 
                             <th scope="col">Puesto</th>  
                             <th scope="col">Estado</th>                           
                           </tr>
                           <tbody id="estatus">
                          
                            </tbody>
                           
                          
                         </thead>
                        
  </table>
</div>
 
                        </div>
                      <div id="div2"></div>             
                </div>
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

        if(b == 'Activo'){
            console.log(b);          
             


      $.get("UsActivos",function(response ,state){
            console.log(response);
                $("#estatus").empty();
               
            
                for(i=0; i<response.length; i++){  
                    
                    $("#estatus").append('<tr><th>'+ $.trim(response[i].nombre) +'</th><th>'+ $.trim(response[i].ap_paterno) +'</th><th>'+ $.trim(response[i].ap_materno) +'</th><th>'+ $.trim(response[i].email) +'</th><th>'+ $.trim(response[i].puesto) +'</th><th>'+ $.trim(response[i].estado) +'</th></tr>');  
                }  
                $("#div2").append("<a target='_blank' href='pdf/pdf_estado/"+b+"'>Ver PDF digital</a>"); 
            });
  
 

}

///////////////////////////////////////////////////////

if( b == 'Inactivo'){
    console.log(b);  
   

     $.get("UsInactivos",function(response ,state){
            console.log(response);
                $("#estatus").empty();
               
            
                for(i=0; i<response.length; i++){  
                    
                    $("#estatus").append('<tr><th>'+ $.trim(response[i].nombre) +'</th><th>'+ $.trim(response[i].ap_paterno) +'</th><th>'+ $.trim(response[i].ap_materno) +'</th><th>'+ $.trim(response[i].email) +'</th><th>'+ $.trim(response[i].puesto) +'</th><th>'+ $.trim(response[i].estado) +'</th></tr>');  
                }
                $("#div2").append("<a target='_blank' href='pdf/pdf_estado/"+b+"'>Ver PDF digital</a>"); 
            
            
            });

    
}

//////////////////////////////////////////////////////////////////////77
if( b == 'Todos'){
    

     $.get("allUs",function(response ,state){
            console.log(response);
                $("#estatus").empty();
               
            
                for(i=0; i<response.length; i++){  
                    
                    $("#estatus").append('<tr><th>'+ $.trim(response[i].nombre) +'</th><th>'+ $.trim(response[i].ap_paterno) +'</th><th>'+ $.trim(response[i].ap_materno) +'</th><th>'+ $.trim(response[i].email) +'</th><th>'+ $.trim(response[i].puesto) +'</th><th>'+ $.trim(response[i].estado) +'</th></tr>');  
                }
                $("#div2").append("<a target='_blank' href='pdf/reporte_uspdf'>Ver PDF digital</a>"); 
               
            
            
            });

}
});
});
</script>
@endsection



