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
<h2 style="text-align: center;">Eliminar Usuario</h2>
          

                    
                        
                         <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}</div>
 
                <div class="card-body">

                    <form method="POST"  action="{{ route('eliminar_us') }}"> 
                    	{{ method_field('delete')}}
                      @if(session('status')) 

                        <div class="alert alert-success">
                          {{session ('status')}}
                          
                        </div>
                        @endif 
                        @csrf
                        <div class="form-group row">  
        
                                
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Usuarios') }}</label>

                        <div class="col-md-6">
                            <input list="browsers" name="usuario"  class="form-control" id ="usuario2" required>                             
                            <datalist  id="browsers">                              
                            @foreach($usuarios as $usuario)
                            <option value="{{ $usuario['id']}} ">{{ $usuario['nombre']}} {{ $usuario['ap_paterno']}} {{ $usuario['ap_materno']}}</option>
                            @endforeach  
                            </datalist>

                        </div>
                        
                    </div> 

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <label id="nombre" class="form-control"></label>

                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ap_paterno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>

                            <div class="col-md-6">
                               <label id="ap_paterno" class="form-control"></label>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="ap_materno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>

                            <div class="col-md-6">
                                <label id="ap_materno" class="form-control"></label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                               <label id="correo" class="form-control"></label>
                            </div>
                        </div>
                      
                         
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Puesto') }}</label>

                            <div class="col-md-6">
                                <label id="puesto" class="form-control"></label>
                            </div>
                        </div>
                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Eliminar') }}
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
  $("#usuario2").change(function(event){
  $.get("User/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#nombre").empty();
     $("#ap_paterno").empty();
     $("#ap_materno").empty();
     $("#correo").empty();
     $("#puesto").empty();
     
   
    for(i=0; i<response.length; i++){
      $("#nombre").append(""+ $.trim(response[i].nombre) +"");
      $("#ap_paterno").append(""+ $.trim(response[i].ap_paterno) +"");
      $("#ap_materno").append(""+ $.trim(response[i].ap_materno) +"");
      $("#correo").append(""+response[i].email+"");
      $("#puesto").append(""+ $.trim(response[i].puesto) +"");
     
    }
  });
});
});
</script>
@endsection


 




