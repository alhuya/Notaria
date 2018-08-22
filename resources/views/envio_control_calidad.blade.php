@extends('layouts.app')
@section('content')
@include('layouts.menu_new')   

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  
 
</head> 

<div class="container"> 
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center;">{{ __('Envio A Control de Calidad') }}</div>
                <br><br>   
                 

                <div class="card-body">
                <form method="POST" action="{{ route('envio') }}" autocomplete="off">                       
                      @if(session('status'))  
                        <div class="alert alert-success">
                          {{session ('status')}}                            
                        </div>
                        @endif
                        @csrf 

                         <div class="form-group row">   
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Numero de Carpeta') }}</label>
                        <div class="col-md-6"> 
                            <input list="browsers" name="carpeta"  class="form-control" id ="var" required>                             
                            <datalist  id="browsers">                              
                            @foreach($carpetas as $carpeta) 
                            <option value="{{ $carpeta->carpeta_id}} ">  </option>@endforeach
                            </datalist>
                        </div>                         
                    </div> 

                       
                        
                            <div id="div2">
                           
                             </div>

                    
                       <div class="form-group row">
                            <label for="tiempo" class="col-md-4 col-form-label text-md-right">{{ __('Reviciòn') }}</label>

                            <div class="col-md-6">
                                <input id="revicion" min="1" max="3"  class="form-control"  type="number"  name="revision" value="1" required>                                
                                @if ($errors->has('tiempo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tiempo') }}</strong>
                                    </span>
                                @endif 
                            </div>
                        </div>  

                           <div class="form-group row">  
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Comentario') }}</label>
                        <div class="col-md-6">
                        <textarea rows="4" cols="50" name="comentario"  class="form-control"></textarea>
                        </div>                           
                    </div> 

                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
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
  $("#var").change(function(event){
  $.get("ControlTramites/"+event.target.value+"",function(response ,state){
    //console.log(response);
     $("#div1").empty();  
     $("#div2").empty(); 
     $("#div3").empty();  
    for(i=0; i<response.length; i++){
      $("#div1").append('<label id="nombre" class="form-control">'+response[i].tramite+'</label>'); 
      $("#div3").append('<input class="form-control" type="hidden" name="tramite" value='+response[i].id+' >'); 
      
      $("#div2").append(' <input class="form-control" type="hidden" name="carpeta" value='+response[i].carpeta_id+' >'); 
     
 
      
     
    }
  }); 
});
});
</script>
@endsection

 
  




