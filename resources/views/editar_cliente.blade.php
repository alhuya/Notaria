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
                               <input list="browsers" name="cliente"  class="form-control" id ="cliente" required>                             
                               <datalist  id="browsers">                              
                                @foreach($clientes as $cliente)
                                <option value="{{ $cliente['id']}}">@endforeach
                               </datalist>
                           </div>
                            
                        </div> 

                    
                        
                         <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}</div>

                <div class="card-body">
                    <form method="POST" action=" editar_cliente/{{$cliente['id']}}">
                      {{ method_field('patch')}}
                      @if(session('status')) 

                        <div class="alert alert-success">
                          {{session ('status')}}
                           
                        </div>
                        @endif
                        @csrf 

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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                               <!-- <label id="puesto" class="form-control"></label>-->
                               <div id="div6">
                                 
                               </div>
                            </div>
                        </div>

                            <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Calle') }}</label>

                            <div class="col-md-6">
                               <!-- <label id="puesto" class="form-control"></label>-->
                               <div id="div7">
                                 
                               </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Colonia') }}</label>

                            <div class="col-md-6">
                               <!-- <label id="puesto" class="form-control"></label>-->
                               <div id="div8">
                                 
                               </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Numero Interno ') }}</label>

                            <div class="col-md-6">
                               <!-- <label id="puesto" class="form-control"></label>-->
                               <div id="div9">
                                 
                               </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Numero Exterior') }}</label>

                            <div class="col-md-6">
                               <!-- <label id="puesto" class="form-control"></label>-->
                               <div id="div10">
                                 
                               </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Codigo Postal') }}</label>

                            <div class="col-md-6">
                               <!-- <label id="puesto" class="form-control"></label>-->
                               <div id="div11">
                                 
                               </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                               <!-- <label id="puesto" class="form-control"></label>-->
                               <div id="div12">
                                 
                               </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Municipio') }}</label>

                            <div class="col-md-6">
                               <!-- <label id="puesto" class="form-control"></label>-->
                               <div id="div13">
                                 
                               </div>
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
     $("#div6").empty();
     $("#div7").empty();
     $("#div8").empty();
     $("#div9").empty();
     $("#div10").empty();
     $("#div11").empty();
     $("#div12").empty();
     $("#div13").empty();
     $("#div14").empty();
     
    
    for(i=0; i<response.length; i++){
      $("#div1").append('<input class="form-control" type="text" name="nombre" value='+response[i].nombre+' >');
      $("#div2").append('<input class="form-control" type="text" name="ap_paterno"  value='+response[i].apellido_paterno+'>');
      $("#div3").append('<input class="form-control" type="text" name="ap_materno" value='+response[i].apellido_materno+'>');
      $("#div4").append('<input class="form-control" type="text" name="telefono" value='+response[i].telefono+'>');
      $("#div5").append('<input  class="form-control" type="text" name="celular"  value='+response[i].celular+'>');
      $("#div6").append('<input  class="form-control" type="text" name="correo"  value='+response[i].correo+'>');
      $("#div7").append('<input  class="form-control" type="text" name="calle"  value='+response[i].calle+'>');
      $("#div8").append('<input  class="form-control" type="text" name="colonia"  value='+response[i].colonia+'>');
      $("#div9").append('<input  class="form-control" type="text" name="numint"  value='+response[i].numero_interior+'>');
      $("#div10").append('<input  class="form-control" type="text" name="numext"  value='+response[i].numero_exterior+'>');
      $("#div11").append('<input  class="form-control" type="text" name="codpost"  value='+response[i].codigo_postal+'>');
      $("#div12").append('<input  class="form-control" type="text" name="estadoid"  value='+response[i].estado_id+'>');
      $("#div13").append('<input  class="form-control" type="text" name="municipioid"  value='+response[i].municipio_id+'>');
     
    }
  });
});
});
</script>
@endsection


 




