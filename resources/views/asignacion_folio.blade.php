@extends('layouts.app')
@section('content')
@include('layouts.menu_new')  

 
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8"> 
</head> 

<div class="container">
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"  style="text-align: center;">{{ __('ASIGNACION DE FOLIO INTERNO') }}</div>
                <br><br>    
                

                <div class="card-body"> 
                <form method="POST" action="{{ route('folio') }}"  autocomplete="off">
                     
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
                            <option value="{{ $cliente->id}}"> {{ $cliente->nombre}} {{ $cliente->apellido_paterno}} {{ $cliente->apellido_materno}}</option>
                            @endforeach
                            </datalist>
                        </div> 
                    </div> 


                    <div class="form-group row">
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Carpeta') }}</label>
                        <div class="col-md-6">
                            <input list="browsers2" name="carpeta"  class="form-control" id ="carpeta" required>                             
                            <datalist  id="browsers2">                               
                           
                            </datalist>
                        </div> 
                    </div> 

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Trámite') }}</label>
                            <div class="col-md-6">
                              <div id="div1">
                               </div>
                            </div>
                        </div> 

                         <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Número de Escritura') }}</label>
                           <div class="col-md-6">
                              <div id="div3">                            

                               </div>
                            </div>
                            </div>

                       <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>
                            <div class="col-md-6">
                              <div id="div4">
                             

                               </div>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="volumen" class="col-md-4 col-form-label text-md-right">{{ __('Volumen') }}</label>

                           <div class="col-md-6">
                              <div id="div5">
                           
                               </div>
                            </div>

                            </div> 
                            <div class="form-group row">
                            <label for="folio1" class="col-md-4 col-form-label text-md-right">{{ __('Folio Inicial') }}</label>

                            <div class="col-md-6">
                              <div id="div6">
                               </div>
                            </div>
                            </div>

                             <div class="form-group row">
                            <label for="folio2" class="col-md-4 col-form-label text-md-right">{{ __('Folio Final') }}</label>

                           <div class="col-md-6">
                              <div id="div7">
                           
                               </div>
                            </div>

                            </div>

                              <div class="form-group row">
                            <label for="folio2" class="col-md-4 col-form-label text-md-right">{{ __('Otorgantes') }}</label>

                            <div class="col-md-6">
                              <div id="div8">                           
                               </div>
                            </div>
                            </div>


                        <div class="form-group row">       
                        <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Contrato') }}</label>
                         <div class="col-md-6">
                              <div id="div9">                          
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
       // console.log(cliente);
       $.get("GuiaCliente/"+cliente+"",function(response ,state){
        console.log(response);

         $("#browsers2").empty();   
         

                for(i=0; i<response.length; i++){
                  $("#browsers2").append('<option value="'+response[i].carpeta_id+'"</option>'); 
                 
 

                      
                }

       }); 
        
      
        $("#carpeta").change(function(event){ 
            var carpeta = $('#carpeta').val();
         //   console.log(carpeta); 
            
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

 


