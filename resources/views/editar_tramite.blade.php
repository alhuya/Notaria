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
<h2 style="text-align: center;">Editar Trámite</h2>
           <div class="form-group row"> 
        
                        @csrf   
                      <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Tramites') }}</label>

                             <div class="col-md-6">
                               <input list="browsers" name="tramites"  class="form-control" id ="input" required>                             
                               <datalist  id="browsers">                              
                                @foreach($Tramites as $tramite)
                                <option value="{{ $tramite['id']}} {{ $tramite['tramite']}}">@endforeach
                               </datalist>
                           </div>
                            
                        </div> 

                    
                        
                         <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tramites') }}</div>

                <div class="card-body">
                <form method="POST" action="editar_tramite/{{$tramite['id']}}">
                      {{ method_field('patch')}}
                      @if(session('status')) 

                        <div class="alert alert-success">
                          {{session ('status')}}
                           
                        </div>
                        @endif
                        @csrf 

                        <div class="form-group row">
                            <label for="ap_paterno" class="col-md-4 col-form-label text-md-right">{{ __('Trámites') }}</label>

                            <div class="col-md-6">
                              <div id="uno">
                              <!-- <label id="ap_paterno" class="form-control"></label>-->
                              </div>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="ap_materno" class="col-md-4 col-form-label text-md-right">{{ __('Duración') }}</label>

                            <div class="col-md-6">
                               <!-- <label id="ap_materno" class="form-control"></label>-->
                               <div id="dos">
                                 
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
  $("#input").change(function(event){
  $.get("TiposTramites/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#uno").empty(); 
     $("#dos").empty();
      
    
    for(i=0; i<response.length; i++){
      $("#uno").append('<input class="form-control" type="text" name="tramite" value='+response[i].tramite+' >');
      $("#dos").append('<input class="form-control" type="text" name="documento"  value='+response[i].duracion+'>');
     

     
    }
  }); 
});
});
</script>
@endsection


 




