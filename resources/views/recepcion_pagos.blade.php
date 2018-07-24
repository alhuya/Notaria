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
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ASIGNACION DE FOLIO INTERNO') }}</div>
                <br><br>   
                

                <div class="card-body">
                <form method="POST" action="{{ route('confirma') }}">
                     
                      @if(session('status')) 

                        <div class="alert alert-success">
                          {{session ('status')}} 
                           
                        </div>
                        @endif
                        @csrf 
                                    <div class="form-group row"> 
                    
                
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Cliente') }}</label>
            
                        <div class="col-md-6">
                            <input list="browsers" name="cliente"  class="form-control" id ="var" required>                             
                            <datalist  id="browsers">                              
                            @foreach($clientes as $cliente) 
                            <option value="{{ $cliente->cliente_id}} ">{{ $cliente->nombre}} {{ $cliente->apellido_paterno}} {{ $cliente->apellido_materno}}    </option>@endforeach
                            </datalist>
                        </div>  
                        
                    </div> 

                        <div class="form-group row">
                          
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Trámite') }}</label>
                          
                            <div class="col-md-6">
                              <div id="div1">
                               <!-- <label id="nombre" class="form-control"></label>-->

                               </div>
                            </div>
                        </div> 

                         <div class="form-group row">
                           
                          <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Numero de Carpeta') }}</label>
                        
                          <div class="col-md-6">
                            <div id="div2">
                             <!-- <label id="nombre" class="form-control"></label>-->

                             </div>
                          </div>
                      </div>  

                        <div class="form-group row"> 
                    
                
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Dependencias') }}</label>
            
                        <div class="col-md-6">
                            <input list="browsers3" name="cliente"  class="form-control" id ="var" required>                             
                            <datalist  id="browsers3">                              
                            @foreach($Dependencias as $dependencia) 
                            <option value="{{ $dependencia['dependencias_id']}} {{ $dependencia['dependencia']}} "> </option>
                            @endforeach
                            </datalist>
                        </div>  
                        
                    </div> 

                    <div class="form-group row">
                           
                           <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Pago') }}</label>
                         
                           <div class="col-md-6">
                             <div id="div2">
                              <!-- <label id="nombre" class="form-control"></label>-->
 
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
  $("#var").change(function(event){
  $.get("ControlTramites/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#div1").empty();  
    
    for(i=0; i<response.length; i++){
      $("#div1").append('<label id="nombre" class="form-control">'+response[i].tramite+'</label>'); 
      $("#div2").append('<label id="nombre" class="form-control">'+response[i].carpeta_id+'</label>'); 
 
      
     
    }
  }); 
});
});
</script>
@endsection

 
 



