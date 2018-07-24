@extends('layouts.app')
@section('content')
@if(Gate::check('isAdministrador')) 
@include('layouts.menu_new')  

@endif 
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--> 
 
</head>

<div class="container">
<h2 style="text-align: center;">Consulta Cliente</h2>
           <div class="form-group row"> 
        
                        @csrf   
                      <label for="clientes" class="col-md-4 col-form-label text-md-right">{{ __('Clientes') }}</label>

                             <div class="col-md-6">
                               <input list="browsers" name="cliente"  class="form-control" id ="cliente2" required>                             
                               <datalist  id="browsers">                              
                                @foreach($clientes as $cliente)
                                <option value="{{ $cliente['id']}} {{ $cliente['nombre']}} {{ $cliente['apellido_paterno']}} {{ $cliente['apellido_materno']}}"></option>
                                @endforeach  
                               </datalist>

                           </div>
                            
                        </div> 

                    
                        
                         <div class="container">
    
                <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                        @csrf
					<table class="table table-striped">
					  <thead>
					  	 
					    <tr>
					      
					      <th scope="col">Nombre</th>
					      <th scope="col">Apellido Paterno</th>
					      <th scope="col">Apellido Materno</th>
                          <th scope="col">telefono</th>
					      <th scope="col">celular</th>
					      <th scope="col">Correo</th>
                          <th scope="col">calle</th>
					      <th scope="col">colonia</th>
					      <th scope="col">numero interior</th>
                          <th scope="col">numero exterior</th>
                          <th scope="col">codigo postal</th>
                          <th scope="col">estado</th>
                          <th scope="col">municipio</th>
					    
					    </tr>
					  </thead>
					  <tbody id="nombre">
                     
					  
					      
					     
					    
                          
					     
					    
					    
				
					  </tbody>
					</table>
                    </form>
                </div>
 
                          

      

@endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--<script src="{{ asset('js/user.js') }}" ></script>-->

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
  $("#cliente2").change(function(event){
    $.get("Clientes/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#nombre").empty();  
  
   
    for(i=0; i<response.length; i++){
      $("#nombre").append('<tr><td>'+response[i].nombre+'</td><td>'+response[i].apellido_paterno+'</td><td>'+response[i].apellido_materno+'</td><td>'+response[i].telefono+'</td><td>'+response[i].celular+'</td><td>'+response[i].correo+'</td><td>'+response[i].calle+'</td><td>'+response[i].colonia+'</td><td>'+response[i].numero_interior+'</td><td>'+response[i].numero_exterior+'</td><td>'+response[i].codigo_postal+'</td><td>'+response[i].estado+'</td><td>'+response[i].municipio+'</td></tr>');
     
         
    }
  }); 
});
});
</script>
@endsection


 
 



