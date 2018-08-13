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
<h2 style="text-align: center;">Trámites Terminados</h2>
           <div class="form-group row"> 
        
                        @csrf   
                      <label for="clientes" class="col-md-4 col-form-label text-md-right">{{ __('Número de Escritura') }}</label>

                             <div class="col-md-6">
                               <input list="browsers" name="cliente"  class="form-control" id ="escritura" required>                             
                               <datalist  id="browsers">                              
                                @foreach($Terminados as $terminado)
                                <option value="{{ $terminado['numero_escritura']}} "></option>
                                @endforeach  
                               </datalist>

                           </div>
                            
                        </div> 

                    
                        
                         <div class="container">
    
                <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                        @csrf
              <div class="container">
					<table class="table table-striped">
					  <thead>
					  	 
					    <tr>
             
					      <th scope="col">Nùmero Escritura</th>
                <th scope="col">Tràmites</th>
					      <th scope="col">Volumen</th>
					      <th scope="col">Folio 1</th>
                <th scope="col">folio 2</th>
					      <th scope="col">Otorgantes</th>
					      <th scope="col">Presupuesto</th>
                <th scope="col">Contrato</th>
					      <th scope="col">Kinegrama</th>
                 <th scope="col">Fecha</th>
                 					    
					    </tr>
					  </thead>
					  <tbody id="nombre">
				
					  </tbody>
					</table>
          </div>
                    </form>
                </div>
 
                          

      

@endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--<script src="{{ asset('js/user.js') }}" ></script>-->

@section('script')
<script type="text/javascript"> 
  $(document).ready(function(){
  $("#escritura").change(function(event){
    $.get("TramitesTerminados/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#nombre").empty();  
  
   
    for(i=0; i<response.length; i++){
      $("#nombre").append('<tr><td>'+response[i].numero_escritura+'</td><td>'+response[i].tramite_id+'</td><td>'+response[i].volumen+'</td><td>'+response[i].folio1+'</td><td>'+response[i].folio2+'</td><td>'+response[i].otorgantes+'</td><td>'+response[i].presupuesto_id+'</td><td>'+response[i].contrato+'</td><td>'+response[i].kinegrama_id+'</td><td>'+response[i].fecha_entrega+'</td></tr>');
     
         
    }
  }); 
});
});
</script>
@endsection


 
 



