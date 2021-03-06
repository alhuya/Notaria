@extends('layouts.app')
@section('content')
@include('layouts.menu_new')  


<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
 
</head> 

<div class="container">
<h2 style="text-align: center;">Editar Trámite</h2> 
         
                        
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Trámites') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('editar_tramite') }}" autocomplete="off">
                      {{ method_field('patch')}}
                      @if(session('status')) 

                        <div class="alert alert-success">
                          {{session ('status')}}
                            
                        </div> 
                        @endif
                        @csrf 
                        <div class="form-group row">  
                         <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Trámites') }}</label>
                              <div class="col-md-6">
                            <input list="browsers" name="tramites"  class="form-control" id ="input" required>                             
                            <datalist  id="browsers">                              
                                @foreach($Tramites as $tramite)
                                <option value="{{ $tramite['id']}} {{ $tramite['tramite']}}"></option>@endforeach
                            </datalist>
                        </div> 
                            
                        </div> 

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
  

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
  $("#input").change(function(event){
  $.get("TiposTramites/"+event.target.value+"",function(response ,state){
  //  console.log(response);
     $("#uno").empty(); 
     $("#dos").empty(); 
      
    
    for(i=0; i<response.length; i++){
      $("#uno").append('<input class="form-control" type="text" name="tramite" value="'+ $.trim(response[i].tramite) +'" >');
      $("#dos").append('<input  type="text" name="duracion"  value="'+ $.trim(response[i].duracion) +'" >  <label for="tiempo">{{ __('Dias') }}</label>');
     
 
     
    }
  }); 
});
});
</script>
@endsection


 




