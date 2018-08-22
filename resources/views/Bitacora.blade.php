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
                        <label for="ap_paterno" class="col-md-4 col-form-label text-md-right">{{ __('Clientes') }}</label>
                            <div class="col-md-6">
                            <input list="browsers" name="cliente"  class="form-control" id ="cliente" required> 
                                                       
                            <datalist  id="browsers">    
                            <option value="No Registrado"></option>                           
                            @foreach($clientes as $cliente)
                            <option value="{{ $cliente['id']}} {{ $cliente['nombre']}} {{ $cliente['apellido_paterno']}} {{ $cliente['apellido_materno']}} "><label></label></opion>@endforeach
                            </datalist>
                        </div>
                        
                    </div> 

                        <div class="form-group row">
                          
                            <label  id="div6" for="nombre" class="col-md-4 col-form-label text-md-right"></label>
                          
                            <div class="col-md-6">
                              <div id="div1">
                               <!-- <label id="nombre" class="form-control"></label>-->

                               </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label   id="div7" for="ap_paterno" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                              <div id="div2">
                              <!-- <label id="ap_paterno" class="form-control"></label>-->
                              </div>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label   id="div8" for="ap_materno" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                               <!-- <label id="ap_materno" class="form-control"></label>-->
                               <div id="div3">
                                 
                               </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label   id="div9" for="email" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                               <!--<label id="correo" class="form-control"></label>-->
                               <div id="div4">
                                 
                               </div>
                            </div>
                        </div>
                        
                       
                         
                        <div class="form-group row">
                            <label    id="div10" for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                               <!-- <label id="puesto" class="form-control"></label>-->
                               <div id="div5">
                                 
                               </div>
                            </div>
                        </div>                      
                        <div class="form-group row">    
                      <label for="estado" id="div11" class="col-md-4 col-form-label text-md-right"></label>

                             <div class="col-md-6">
                               <div  id="div12">
                               </div>
                           </div> 
                        </div> 
                      
                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <div id="div13">
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
    var b = $('#cliente').val();
    if(b == 'No Registrado'){
        $("#div1").append('<input class="form-control" type="text" name="nombre"  >');//eliminamos espacios con trim()
      $("#div2").append('<input class="form-control" type="text" name="apellido_paterno"  >');
      $("#div3").append('<input class="form-control" type="text" name="apellido_materno" >');
      $("#div4").append('<input class="form-control" type="text" name="telefono" >');
      $("#div5").append('<input  class="form-control" type="text" name="celular" >');
      $("#div12").append('<select name="tipo"  class="form-control" required>!<option value="" >-- Seleccione el tipo --</option><option value="Visitante" >Visitante</option><option value="Tramite" >Tramite</option> </select>');
      $("#div13").append(' <button type="submit" class="btn btn-primary">{{ __("Guardar") }}</button>');

      $("#div6").append("{{ __('Nombre') }}");
      $("#div7").append("{{ __('Apellido Paterno') }}");
      $("#div8").append("{{ __('Apellido Materno') }}");
      $("#div9").append("{{ __('Telefono') }}");
      $("#div10").append("{{ __('Celular') }}");
      $("#div11").append("{{ __('Tipo') }}");




    }
    if(b != 'No Registrado'){
  $.get("Clientes/"+event.target.value+"",function(response ,state){
    
 
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
     $("#div10").empty(); 
     $("#div11").empty(); 
     $("#div12").empty();
     $("#div13").empty();
    
    
        
for(i=0; i<response.length; i++){
      
      $("#div1").append('<input class="form-control" type="text" name="nombre" value="'+ $.trim(response[i].nombre) +'" >');//eliminamos espacios con trim()
      $("#div2").append('<input class="form-control" type="text" name="apellido_paterno"  value="'+ $.trim(response[i].apellido_paterno) +'">');
      $("#div3").append('<input class="form-control" type="text" name="apellido_materno" value="'+ $.trim(response[i].apellido_materno) +'">');
      $("#div4").append('<input class="form-control" type="text" name="telefono" value="'+ $.trim(response[i].telefono) +'">');
      $("#div5").append('<input  class="form-control" type="text" name="celular"  value="'+ $.trim(response[i].celular) +'">');
      $("#div12").append('<select name="tipo"  class="form-control" required>!<option value="" >-- Seleccione el tipo --</option><option value="Visitante" >Visitante</option><option value="Tramite" >Tramite</option> </select>');
      $("#div13").append(' <button type="submit" class="btn btn-primary">{{ __("Guardar") }}</button>');

      $("#div6").append("{{ __('Nombre') }}");
      $("#div7").append("{{ __('Apellido Paterno') }}");
      $("#div8").append("{{ __('Apellido Materno') }}");
      $("#div9").append("{{ __('Telefono') }}");
      $("#div10").append("{{ __('Celular') }}");
      $("#div11").append("{{ __('Tipo') }}");


     
      
    }
  }); 
}
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


 




