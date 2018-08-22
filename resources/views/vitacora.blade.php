@extends('layouts.app')
@section('content')
@include('layouts.menu_new')  

<head>
  <title>Bootstrap Example</title> 
  <meta charset="utf-8">
  
</head>

  <div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
            <div class="card">  
                <div class="card-header" style="text-align: center;">{{ __('Bitácora') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('vitacora') }}" autocomplete="off"> 
                     
                      @if(session('status')) 
 
                        <div class="alert alert-success">
                          {{session ('status')}}
                            
                        </div> 
                        @endif  
                        @csrf  
                        <div class="form-group row"> 
         
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Clientes') }}</label>

                            <div class="col-md-6">
                            <input list="browsers" name="cliente"  class="form-control" id ="cliente" required>                             
                            <datalist  id="browsers">                              
                            @foreach($clientes as $cliente)
                            <option value="{{ $cliente['id']}} {{ $cliente['nombre']}} {{ $cliente['apellido_paterno']}} {{ $cliente['apellido_materno']}} "><label></label></opion>@endforeach
                            </datalist>
                        </div>
                        
                    </div> 

                        <div class="form-group row">
                          
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                          
                            <div class="col-md-6">
                              <div id="div1">
                               <!-- <label id="nombre" class="form-control"></label>-->

                               </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ap_paterno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>

                            <div class="col-md-6">
                              <div id="div2">
                              <!-- <label id="ap_paterno" class="form-control"></label>-->
                              </div>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="ap_materno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>

                            <div class="col-md-6">
                               <!-- <label id="ap_materno" class="form-control"></label>-->
                               <div id="div3">
                                 
                               </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                               <!--<label id="correo" class="form-control"></label>-->
                               <div id="div4">
                                 
                               </div>
                            </div>
                        </div>
                        
                       
                         
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                            <div class="col-md-6">
                               <!-- <label id="puesto" class="form-control"></label>-->
                               <div id="div5">
                                 
                               </div>
                            </div>
                        </div>                      
                        <div class="form-group row">    
                      <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

                             <div class="col-md-6">
                               <select name="tipo" id="tipo" class="form-control" required>
                                !<option value="">{{ __('-- Seleccione el tipo --') }}</option>                              
                                <option value="Visitante">Visitante</option>
                                <option value="Tramite">Tramite</option>
                              
                               </select>
                           </div>
                        </div> 
                      
                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
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
  $.get("Clientes/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#div1").empty(); 
     $("#div2").empty();
     $("#div3").empty();
     $("#div4").empty();
     $("#div5").empty();
     $("#div5").empty();
   
    
        
for(i=0; i<response.length; i++){
      
      $("#div1").append('<input class="form-control" type="text" name="nombre" value="'+ $.trim(response[i].nombre) +'" >');//eliminamos espacios con trim()
      $("#div2").append('<input class="form-control" type="text" name="apellido_paterno"  value="'+ $.trim(response[i].apellido_paterno) +'">');
      $("#div3").append('<input class="form-control" type="text" name="apellido_materno" value="'+ $.trim(response[i].apellido_materno) +'">');
      $("#div4").append('<input class="form-control" type="text" name="telefono" value="'+ $.trim(response[i].telefono) +'">');
      $("#div5").append('<input  class="form-control" type="text" name="celular"  value="'+ $.trim(response[i].celular) +'">');
     
      
    }
  }); 
});

$(document).ready(function(){
  $("#estado").change(function(event){
  $.get("Estados_Municipios/"+event.target.value+"",function(response ,state){
    console.log(response);
    $("#municipio").empty();   
   for(i=0; i<response.length; i++){
      $("#municipio").append("<option value='"+response[i].id+"'>"+response[i].municipio+"</option>");
    }
  });
}); 
});
});
</script>
@endsection


 




