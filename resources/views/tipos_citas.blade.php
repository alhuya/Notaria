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
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('TIPOS DE CITA') }}</div>
                <br><br>   
                

                <div class="card-body">
                <form method="POST" action="{{ route('tipoedit') }}">
                  
                      @if(session('status')) 

                        <div class="alert alert-success">
                          {{session ('status')}}
                            
                        </div> 
                        @endif
                        @csrf 

                         <div class="form-group row"> 
        
    
                        <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>
                
                            <div class="col-md-6">
                                <input list="browsers" name="tipotram"  class="form-control" id ="doc1" required>                             
                                <datalist  id="browsers">                              
                                @foreach($tipos as $tipo)
                                <option value="{{ $tipo['id']}}">{{ $tipo['tipo']}}</option>@endforeach
                                </datalist> 
                            </div>
                            
                        </div> 

                        <div class="form-group row">
                          
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Cita') }}</label>
                          
                            <div class="col-md-6">
                              <div id="div1">
                               <!-- <label id="nombre" class="form-control"></label>-->

                               </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ap_paterno" class="col-md-4 col-form-label text-md-right">{{ __('Duración') }}</label>

                            <div class="col-md-6">
                              <div id="div2">
                              <!-- <label id="ap_paterno" class="form-control"></label>-->
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
  $.get("TipoCitas/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#div1").empty(); 
     $("#div2").empty();
    

     
    
    for(i=0; i<response.length; i++){
      $("#div1").append('<input class="form-control" type="text" name="tipo" value="'+ $.trim(response[i].tipo) +'" >');
      $("#div2").append('<input class="form-control" type="text" name="duracion"  value='+response[i].duracion+'>');
 
     
    }
  }); 
});
}); 
</script>
@endsection


 




