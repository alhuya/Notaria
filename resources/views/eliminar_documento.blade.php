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
<h2 style="text-align: center;">Eliminar Documentacion</h2>
           <div class="form-group row"> 
        
                        @csrf   
                      <label for="documentos" class="col-md-4 col-form-label text-md-right">{{ __('Documentos') }}</label>

                             <div class="col-md-6">
                               <input list="browsers" name="documento"  class="form-control" id ="documentos" required>                             
                               <datalist  id="browsers">                              
                                @foreach($Documentos as $documento)
                                <option value="{{ $documento['id']}}">
                                @endforeach  
                               </datalist>

                           </div>
                             
                        </div> 

                    
                        
                         <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="card">
                <div class="card-header">{{ __('Documentos') }}</div>
 
                <div class="card-body">

                    <form method="POST" action="eliminar_documento/{{ $documento['id']}}">
                    	{{ method_field('delete')}}
                      @if(session('status'))

                        <div class="alert alert-success">
                          {{session ('status')}}
                           
                        </div>
                        @endif
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>

                            <div class="col-md-6">
                                <label id="Documento" class="form-control"></label>

                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Costo') }}</label>

                            <div class="col-md-6">
                                <label id="Costo" class="form-control"></label>                               
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="origen" class="col-md-4 col-form-label text-md-right">{{ __('Origen') }}</label>

                            <div class="col-md-6">
                                <label id="Origen" class="form-control"></label>                               
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
  $("#documentos").change(function(event){
    $.get("Documentacion/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#Documento").empty();  
     $("#Costo").empty();  
     $("#Origen").empty(); 
   
   
    for(i=0; i<response.length; i++){
      $("#Documento").append(""+response[i].documento+"");
      $("#Costo").append(""+response[i].costo+"");
      $("#Origen").append(""+response[i].origen+"");
       
         
    }
  }); 
});
});
</script>
@endsection


 




