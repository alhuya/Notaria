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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Documentos') }}</div>

                <div class="card-body"> 
                <form method="POST" action="{{ route('editar_doc') }}">
                      {{ method_field('patch')}}
                      @if(session('status')) 

                        <div class="alert alert-success">
                          {{session ('status')}}
                           
                        </div>
                        @endif 
                        @csrf 
                        <div class="form-group row"> 
        
                        <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Documentos') }}</label>

                        <div class="col-md-6">
                        <input list="browsers" name="documentos"  class="form-control" id ="doc1" required>                             
                        <datalist  id="browsers">                              
                            @foreach($Documentos as $documento)
                            <option value="{{ $documento['id']}} {{ $documento['documento']}}">@endforeach
                        </datalist>
                    </div>
                        
                    </div> 
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
                            <label for="origen" class="col-md-4 col-form-label text-md-right">{{ __('Origen') }}</label>

                            <div class="col-md-6">
                                <select name="origen" id="origen" class="form-control" required>
                                !<option value="">{{ __('-- Seleccione el origen --') }}</option>
                                <option value="Cliente">{{ __('Cliente') }}</option>
                                <option value="Terceros">{{ __('Terceros') }}</option>
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
  $("#doc1").change(function(event){
  $.get("Documentacion/"+event.target.value+"",function(response ,state){
    console.log(response); 
     $("#div1").empty(); 
     $("#div2").empty();
     $("#div3").empty(); 

     
    
    for(i=0; i<response.length; i++){
      $("#div1").append('<input class="form-control" type="text" name="documento" value="'+ $.trim(response[i].documento) +'" >');
      $("#div2").append('<input class="form-control" type="text" name="costo" value="'+ $.trim(response[i].costo) +'" >');
      $("#div3").append('<input class="form-control" type="text" name="origen" value="'+ $.trim(response[i].origen) +'" >');

     
    }
  }); 
});
});
</script>
@endsection


 




