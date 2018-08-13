@if (Auth::check())



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
                <form method="POST" action="{{ route('folio') }}">
                     
                      @if(session('status')) 

                        <div class="alert alert-success">
                          {{session ('status')}} 
                           
                        </div>
                        @endif
                        @csrf  
                       <div class="form-group row"> 
                    
                
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Cliente') }}</label>
            
                        <div class="col-md-6">
                            <input list="browsers" name="cliente"  class="form-control" id ="cliente" required>                             
                            <datalist  id="browsers">                               
                            @foreach($clientes as $cliente) 
                            <option value="{{ $cliente->id}}"> </option>
                            @endforeach
                            </datalist>
                        </div> 
                        
                    </div> 
                    <div class="form-group row"> 
                    
                
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Carpeta') }}</label>
            
                        <div class="col-md-6">
                            <input list="browsers2" name="carpeta"  class="form-control" id ="carpeta" required>                             
                            <datalist  id="browsers2">                               
                            @foreach($carpetas as $carpeta) 
                            <option value="{{ $carpeta->carpeta_id}} "></option>
                            @endforeach
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
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Número de Escritura') }}</label>

                           <div class="col-md-6">
                              <div id="div3">
                               <!-- <label id="nombre" class="form-control"></label>-->

                               </div>
                            </div>

                            </div>

                       <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                              <div id="div4">
                               <!-- <label id="nombre" class="form-control"></label>-->

                               </div>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="volumen" class="col-md-4 col-form-label text-md-right">{{ __('Volumen') }}</label>

                           <div class="col-md-6">
                              <div id="div5">
                               <!-- <label id="nombre" class="form-control"></label>-->

                               </div>
                            </div>

                            </div> 
                            <div class="form-group row">
                            <label for="folio1" class="col-md-4 col-form-label text-md-right">{{ __('Folio Inicial') }}</label>

                            <div class="col-md-6">
                              <div id="div6">
                               <!-- <label id="nombre" class="form-control"></label>-->

                               </div>
                            </div>
                            </div>

                             <div class="form-group row">
                            <label for="folio2" class="col-md-4 col-form-label text-md-right">{{ __('Folio Final') }}</label>

                           <div class="col-md-6">
                              <div id="div7">
                               <!-- <label id="nombre" class="form-control"></label>-->

                               </div>
                            </div>

                            </div>

                              <div class="form-group row">
                            <label for="folio2" class="col-md-4 col-form-label text-md-right">{{ __('Otorgantes') }}</label>

                            <div class="col-md-6">
                              <div id="div8">
                               <!-- <label id="nombre" class="form-control"></label>-->

                               </div>
                            </div>


                            </div>


                        <div class="form-group row"> 
        
      
        <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Contrato') }}</label>

               <div class="col-md-6">
                              <div id="div9">
                               <!-- <label id="nombre" class="form-control"></label>-->

                               </div>
                            </div>
                               
                      </div> 

                        

                    </form>
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
    $("#cliente").change(function(event){
        var cliente = $('#cliente').val();
        console.log(cliente);
        $("#carpeta").change(function(event){ 
            var carpeta = $('#carpeta').val();
            console.log(carpeta); 
            
            $.get("ControlTramitesFolio/"+cliente+"/"+carpeta+"",function(response ,state){
            console.log(response);
            $("#div1").empty();   
            $("#div2").empty();  
            $("#div3").empty(); 
            $("#div4").empty();
            $("#div5").empty();  
            $("#div6").empty();    
            $("#div7").empty(); 
            $("#div8").empty(); 
            $("#div9").empty(); 

                for(i=0; i<response.length; i++){
                  $("#div1").append('<label id="nombre" class="form-control">'+response[i].tramite+'</label>'); 
                  $("#div2").append('<label id="nombre" class="form-control">'+response[i].carpeta_id+'</label>'); 
                  $("#div3").append('<label id="nombre" class="form-control">'+response[i].numero_escritura+'</label>'); 
                  $("#div4").append('<label id="nombre" class="form-control">'+response[i].fecha+'</label>'); 
                  $("#div5").append('<label id="nombre" class="form-control">'+response[i].volumen+'</label>'); 
                  $("#div6").append('<label id="nombre" class="form-control">'+response[i].folio1+'</label>'); 
                  $("#div7").append('<label id="nombre" class="form-control">'+response[i].folio2+'</label>'); 
                  $("#div8").append('<label id="nombre" class="form-control">'+response[i].otorgantes+'</label>'); 
                  $("#div9").append('<label id="nombre" class="form-control">'+response[i].contrato+'</label>'); 
 

                      
                }
            }); 
        });      
    });
});
</script>
@endsection

 
 

@endif


