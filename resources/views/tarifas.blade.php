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
<h2 style="text-align: center;">Tarifas</h2>
                        
                         <div class="container">
    
                <div class="card-body">
                <form method="POST" action="{{ route('tarifas') }}">
                        @csrf
                        <div class="form-group row"> 
        
                        @csrf   
                      <label for="clientes" class="col-md-4 col-form-label text-md-right">{{ __('Tramite') }}</label>

                             <div class="col-md-6">
                               <input list="browsers" name="cliente"  class="form-control" id ="cliente2" required>                             
                               <datalist  id="browsers">                              
                                @foreach($tramites as $tramite)
                                <option value="{{ $tramite['id']}} {{ $tramite['tramite']}}">
                                @endforeach  
                               </datalist>

                           </div>
                            
                        </div> 

                    </form>
                </div>
 
                          

      

@endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--<script src="{{ asset('js/user.js') }}" ></script>-->

 <!--@section('script') 
 <script type="text/javascript">
  $(document).ready(function(){
  $("#cliente2").change(function(event){
    $.get("Clientes/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#nombre").empty();  
     $("#ap_paterno").empty();  
     $("#ap_materno").empty(); 
     $("#telefono").empty(); 
     $("#celular").empty(); 
     $("#correo").empty(); 
     $("#calle").empty(); 
     $("#colonia").empty(); 
     $("#numint").empty(); 
     $("#numext").empty(); 
     $("#codpost").empty(); 
     $("#estado").empty(); 
     $("#municipio").empty(); 
   
    for(i=0; i<response.length; i++){
      $("#nombre").append(""+response[i].nombre+"");
      $("#ap_paterno").append(""+response[i].apellido_paterno+"");
      $("#ap_materno").append(""+response[i].apellido_materno+"");
      $("#telefono").append(""+response[i].telefono+"");
      $("#celular").append(""+response[i].celular+"");
      $("#correo").append(""+response[i].correo+"");
      $("#calle").append(""+response[i].calle+"");
      $("#colonia").append(""+response[i].colonia+"");
      $("#numint").append(""+response[i].numero_interior+"");
      $("#numext").append(""+response[i].numero_exterior+"");
      $("#codpos").append(""+response[i].codigo_postal+"");
      $("#estado").append(""+response[i].estado_id+"");
      $("#municipio").append(""+response[i].municipio_id+"");
         
    }
  }); 
});
});
</script>
@endsection-->


 
 



