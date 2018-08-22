 @extends('layouts.app')
@section('content')
@include('layouts.menu_new')


<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
</head> 
<div class="container"> 
    <div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
            <div class="card"> 
                <div style="text-align: center;" class="card-header">{{ __('Editar Clientes') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('client') }}" autocomplete="off">                      
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
                            <option value="{{ $cliente['id']}}  "><label>{{ $cliente['nombre']}} {{ $cliente['apellido_paterno']}} {{ $cliente['apellido_materno']}}</label></opion>@endforeach
                            </datalist>
                        </div>                        
                    </div> 

                        <div class="form-group row">                          
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>                          
                            <div class="col-md-6">
                              <div id="div1">                              

                               </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ap_paterno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>
                            <div class="col-md-6">
                              <div id="div2">
                              </div>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="ap_materno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>

                            <div class="col-md-6">
                             
                               <div id="div3">
                                 
                               </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                              
                               <div id="div4">
                                 
                               </div>
                            </div>
                        </div>
                      
                         
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                            <div class="col-md-6">
                               
                               <div id="div5">
                                 
                               </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                              
                               <div id="div6">
                                 
                               </div>
                            </div>
                        </div>

                            <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Calle') }}</label>

                            <div class="col-md-6">
                             
                               <div id="div7">
                                 
                               </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Colonia') }}</label>

                            <div class="col-md-6">
                              
                               <div id="div8">
                                 
                               </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Número Interno ') }}</label>

                            <div class="col-md-6">
                              
                               <div id="div9">
                                 
                               </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Número Exterior') }}</label>

                            <div class="col-md-6">
                             
                               <div id="div10">
                                 
                               </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Código Postal') }}</label>

                            <div class="col-md-6">
                          
                               <div id="div11">
                                 
                               </div>
                            </div>
                        </div>

                        <div class="form-group row">    
                      <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estados') }}</label>

                             <div class="col-md-6">
                               <select name="estado_id" id="estado" class="form-control" required>
                                !<option value="">{{ __('-- Seleccione el estado --') }}</option>
                                @foreach($estados as $estado)
                                <option value="{{ $estado['id']}}">{{$estado['estado'] }}</option>
                                @endforeach
                               </select>
                           </div>
                        </div> 
                        
                        <div class="form-group row">    
                      <label for="municipio" class="col-md-4 col-form-label text-md-right">{{ __('Municipios') }}</label>

                             <div class="col-md-6">
                               <select name="municipio_id" id="municipio" class="form-control" required>                            
                               
                               </select>
                           </div>
                        </div> 
                        
                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
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
     $("#div6").empty();
     $("#div7").empty();
     $("#div8").empty();
     $("#div9").empty();
     $("#div10").empty();
     $("#div11").empty();

    
        
for(i=0; i<response.length; i++){
      
      $("#div1").append('<input class="form-control" type="text" name="nombre" value="'+ $.trim(response[i].nombre) +'" >');//eliminamos espacios con trim()
      $("#div2").append('<input class="form-control" type="text" name="apellido_paterno"  value="'+ $.trim(response[i].apellido_paterno) +'">');
      $("#div3").append('<input class="form-control" type="text" name="apellido_materno" value="'+ $.trim(response[i].apellido_materno) +'">');
      $("#div4").append('<input class="form-control" type="text" name="telefono" value="'+ $.trim(response[i].telefono) +'">');
      $("#div5").append('<input  class="form-control" type="text" name="celular"  value="'+ $.trim(response[i].celular) +'">');
      $("#div6").append('<input  class="form-control" type="text" name="correo"  value="'+ $.trim(response[i].correo) +'">');
      $("#div7").append('<input  class="form-control" type="text" name="calle"  value="'+ $.trim(response[i].calle) +'">');
      $("#div8").append('<input  class="form-control" type="text" name="colonia"  value="'+ $.trim(response[i].colonia) +'">');
      $("#div9").append('<input  class="form-control" type="text" name="numero_interior"  value="'+ $.trim(response[i].numero_interior) +'">');
      $("#div10").append('<input  class="form-control" type="text" name="numero_exterior"  value="'+ $.trim(response[i].numero_exterior) +'">');
      $("#div11").append('<input  class="form-control" type="text" name="codigo_postal"  value="'+ $.trim(response[i].codigo_postal) +'">');
      
    }
  }); 
});

$(document).ready(function(){
  $("#estado").change(function(event){
  $.get("Estados_Municipios/"+event.target.value+"",function(response ,state){
   // console.log(response);
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


 




