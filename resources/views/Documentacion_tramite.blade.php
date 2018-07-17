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
<h2 style="text-align: center;">Editar Usuario</h2>
           <div class="form-group row"> 
        
                        @csrf   
                      <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Usuarios') }}</label>

                             <div class="col-md-6">
<<<<<<< HEAD
                               <input list="browsers" name="tramite"  class="form-control" id ="tramite2" required>                             
=======
                               <input list="browsers" name="cliente"  class="form-control" id ="cliente" required>                             
>>>>>>> 010358105f0879f78bb4a6dc6c285e4c135efab0
                               <datalist  id="browsers">                              
                                @foreach($tramites as $tramite)
                                <option value="{{ $tramite['id']}}">@endforeach
                               </datalist>
                           </div>
                            
                        </div> 

                    
                        
                         <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}</div>


                <div class="card-body">
                <table class="table table-striped">
					  <thead>
					  	 
					    <tr>
					      
					      <th scope="col">Documento</th>
					      <th scope="col">Costo</th>
                <th scope="col">Origen</th>


					    </tr>
					  </thead>
					  <tbody>
<<<<<<< HEAD
              
              @foreach($documentos as $documento)
					    <tr>
=======
                      
					    <tr id="div1">
>>>>>>> 010358105f0879f78bb4a6dc6c285e4c135efab0
					      
					     
					    </tr>
					    
					  
					  </tbody>
					</table>
                    
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
<<<<<<< HEAD
  $("#tramite2").change(function(event){
    $.get("Clientes/"+event.target.value+"",function(response ,state){
=======
  $("#cliente").change(function(event){
  $.get("tramite_documento/"+event.target.value+"",function(response ,state){
>>>>>>> 010358105f0879f78bb4a6dc6c285e4c135efab0
    console.log(response);

      $("#div1").empty(); 

     
    
    for(i=0; i<response.length; i++){
      $("#div1").append('<td>'+response[i].tipo_tramite_id+'</td><td>'+response[i].documentacion_id+'</td>');

     
    }
    
    
    
  });
});
});
</script>
@endsection


 




