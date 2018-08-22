@extends('layouts.app')
@section('content')
@if(Gate::check('isAdministrador')) 
@include('layouts.menu_new')  

@endif 
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8"> 
</head>

<div class="container"> 
<h2 style="text-align: center;">Eliminar Cliente</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="card">
                <div class="card-header">{{ __('Clientes') }}</div>
 
                <div class="card-body">

                    <form method="POST" action=" {{ route('eliminar_client') }}"  autocomplete="off">
                    	{{ method_field('delete')}}
                      @if(session('status'))

                        <div class="alert alert-success">
                          {{session ('status')}}
                          
                        </div>
                        @endif

                         @if(session('status2'))
                        <div class="alert alert-danger">
                        {{session ('status2')}}
                            </div> 
                            @endif
                        <div class="form-group row"> 
                            
                            @csrf   
                        <label for="clientes" class="col-md-4 col-form-label text-md-right">{{ __('Clientes') }}</label>

                                <div class="col-md-6">
                                <input list="browsers2" name="cliente"  class="form-control" id ="cliente2" required>                             
                                <datalist  id="browsers2">                              
                                    @foreach($clientes as $cliente)
                                    <option value="{{ $cliente['id']}} {{ $cliente['nombre']}} {{ $cliente['apellido_paterno']}} {{ $cliente['apellido_materno']}} "></option>
                                    @endforeach  
                                </datalist>

                            </div>
                                
                            </div> 

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <label id="nombre" class="form-control"></label>

                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>

                            <div class="col-md-6">
                                <label id="ap_paterno" class="form-control"></label>                               
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>

                            <div class="col-md-6">
                                <label id="ap_materno" class="form-control"></label>                               
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <label id="telefono" class="form-control"></label>                               
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                            <div class="col-md-6">
                                <label id="celular" class="form-control"></label>                               
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <label id="correo" class="form-control"></label>                               
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Calle') }}</label>

                            <div class="col-md-6">
                                <label id="calle" class="form-control"></label>                               
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Colonia') }}</label>

                            <div class="col-md-6">
                                <label id="colonia" class="form-control"></label>                               
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Número Interior') }}</label>

                            <div class="col-md-6">
                                <label id="numint" class="form-control"></label>                               
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Número Exterior') }}</label>

                            <div class="col-md-6">
                                <label id="numext" class="form-control"></label>                               
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Código Postal') }}</label>
 
                            <div class="col-md-6">
                                <label id="codpos" class="form-control"></label>                               
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <label id="estado" class="form-control"></label>                               
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Municipio') }}</label>

                            <div class="col-md-6">
                                <label id="municipio" class="form-control"></label>                               
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
 

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
  $("#cliente2").change(function(event){
    $.get("Clientes/"+event.target.value+"",function(response ,state){
   // console.log(response);
     $("#nombre").empty();  
     $("#ap_paterno").empty();  
     $("#ap_materno").empty(); 
     $("#telefono").empty(); 
     $("#celular").empty(); 
     $("#correo").empty(); 
     $("#calle").empty();  
     $("#colonia").empty(); 
     $("#numint").empty(); 
     $("#numext").empty(); 
     $("#codpost").empty(); 
     $("#estado").empty(); 
     $("#municipio").empty(); 
   
    for(i=0; i<response.length; i++){
      $("#nombre").append(""+ $.trim(response[i].nombre) +"");
      $("#ap_paterno").append(""+ $.trim(response[i].apellido_paterno) +"");
      $("#ap_materno").append(""+ $.trim(response[i].apellido_materno) +"");
      $("#telefono").append(""+ $.trim(response[i].telefono) +"");
      $("#celular").append(""+ $.trim(response[i].celular) +"");
      $("#correo").append(""+ $.trim(response[i].correo) +"");
      $("#calle").append(""+ $.trim(response[i].calle) +"");
      $("#colonia").append(""+ $.trim(response[i].colonia) +"");
      $("#numint").append(""+ $.trim(response[i].numero_interior) +"");
      $("#numext").append(""+ $.trim(response[i].numero_exterior) +"");
      $("#codpos").append(""+ $.trim(response[i].codigo_postal) +"");
      $("#estado").append(""+ $.trim(response[i].estado) +"");
      $("#municipio").append(""+ $.trim(response[i].municipio) +"");
         
    }
  }); 
});
});
</script>
@endsection


 




