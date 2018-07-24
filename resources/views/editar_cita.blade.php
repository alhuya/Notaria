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
<h2 style="text-align: center;">Editar Documento</h2>
          


                        

                    
                        
                         <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Documentos') }}</div>

                <div class="card-body">
                <div class="row">
                    <div class="col">
                    <div class="form-group row"> 
        
                        
        <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Abogado') }}</label>

               <div class="col-md-6">
                 <input list="browsers" name="cliente"  class="form-control" id ="doc1" required>                             
                 <datalist  id="browsers">                              
                  @foreach($usuarios as $usuario)
                  <option value="{{ $usuario->id}} {{ $usuario->nombre}}">@endforeach
                 </datalist>
             </div>
              
          </div> 
                    </div>
                    <div class="col">
                    <div class="form-group row"> 
        <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

               <div class="col-md-6">
                 <input list="browsers2" name="cliente"  class="form-control" id ="doc1" required>                             
                 <datalist  id="browsers2">                              
                  @foreach($citas as $cita)
                  <option value="{{ $cita->cita_id}} ">{{ $cita->fecha_hora}}</option>@endforeach
                 </datalist>
             </div>
              
          </div> 
                    </div>
                    <div class="col"> 
                    <div class="form-group row"> 
        <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Cliente') }}</label>

               <div class="col-md-6">
                 <input list="browsers3" name="cliente"  class="form-control" id ="doc1" required>                             
                 <datalist  id="browsers3">                              
                  @foreach($clientes as $cliente)
                  <option value="{{ $cliente->cita_id}} ">{{ $cliente->nombre}} {{ $cliente->apellido_paterno}} {{ $cliente->apellido_materno}}</option>@endforeach
                 </datalist>
             </div>
              
          </div> 
                    </div>
                </div>
                <form method="POST" action="editarcita">
                      {{ method_field('patch')}}
                      @if(session('status')) 

                        <div class="alert alert-success">
                          {{session ('status')}}
                           
                        </div>
                        @endif
                        @csrf 

                        <div class="form-group row">
                          
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>
                          
                            <div class="col-md-6">
                              <div id="div1">
                               <!-- <label id="nombre" class="form-control"></label>-->

                               </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ap_paterno" class="col-md-4 col-form-label text-md-right">{{ __('Costo') }}</label>

                            <div class="col-md-6">
                              <div id="div2">
                              <!-- <label id="ap_paterno" class="form-control"></label>-->
                              </div>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="ap_materno" class="col-md-4 col-form-label text-md-right">{{ __('Origen') }}</label>

                            <div class="col-md-6">
                               <!-- <label id="ap_materno" class="form-control"></label>-->
                               <div id="div3">
                                 
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
  $("#doc1").change(function(event){ 
  $.get("Documentacion/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#div1").empty(); 
     $("#div2").empty();
     $("#div3").empty(); 

     
    
    for(i=0; i<response.length; i++){
      $("#div1").append('<input class="form-control" type="text" name="documento" value='+response[i].documento+' >');
      $("#div2").append('<input class="form-control" type="text" name="costo"  value='+response[i].costo+'>');
      $("#div3").append('<input class="form-control" type="text" name="origen" value='+response[i].origen+'>');

     
    }
  }); 
});
});
</script>
@endsection


 




