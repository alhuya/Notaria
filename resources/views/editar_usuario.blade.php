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
           
 
                    
                        
                         <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">  
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('ed') }}">
       
                      @if(session('status'))  
                        <div class="alert alert-success">
                          {{session ('status')}} 
                           
                        </div>
                        @endif

                        <div class="form-group row"> 
        
                   
                <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Usuarios') }}</label>

                        <div class="col-md-6">
                        <input list="browsers" name="usuario"  class="form-control" id ="usuario" required>                             
                        <datalist  id="browsers">                              
                            @foreach($usuarios as $usuario)
                            <option value="{{ $usuario['id']}} ">{{ $usuario['nombre']}} {{ $usuario['ap_paterno']}} {{ $usuario['ap_materno']}}</option>@endforeach
                        </datalist>
                    </div>
                        
                    </div> 
                        @csrf 

                        <div class="form-group row">
                          
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>
                          
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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                               <!--<label id="correo" class="form-control"></label>-->
                               <div id="div4">
                                 
                               </div>
                            </div>
                        </div>
                      
                         
                        <div class="form-group row">    
                      <label for="puesto" class="col-md-4 col-form-label text-md-right">{{ __('Puesto') }}</label>

                             <div class="col-md-6">
                               <select name="puesto_id" id="estado" class="form-control" required>
                                !<option value="">{{ __('-- Seleccione el puesto --') }}</option>
                                @foreach($puestos as $puesto)
                                <option value="{{ $puesto['id']}}">{{$puesto['puesto'] }}</option>
                                 @endforeach
                               </select>
                           </div> 
                        </div>   
                        <div class="form-group row">    
                      <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                             <div class="col-md-6">
                               <select name="estado" id="estado" class="form-control" required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
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
  <!--<script src="{{ asset('js/user.js') }}" ></script>-->

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
  $("#usuario").change(function(event){
  $.get("User/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#div1").empty(); 
     $("#div2").empty();
     $("#div3").empty(); 
     $("#div4").empty();
    // $("#div5").empty(); 
 
    
    for(i=0; i<response.length; i++){

      $("#div1").append('<input class="form-control" type="text" name="nombre" value="'+ $.trim(response[i].nombre) +'" >');
      $("#div2").append('<input class="form-control" type="text" name="ap_paterno"  value="'+ $.trim(response[i].ap_paterno) +'">');
      $("#div3").append('<input class="form-control" type="text" name="ap_materno" value="'+ $.trim(response[i].ap_materno) +'">');
      $("#div4").append('<input class="form-control" type="text" name="correo" value='+response[i].email+'>');
      //$("#div5").append('<input  class="form-control" type="text" name="puesto"  value='+response[i].puesto+'>');
     
    }
  });
});
});
</script>
@endsection


 




