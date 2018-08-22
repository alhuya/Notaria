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
                <div class="card-header" style="text-align: center;">{{ __('Consulta de Revisión de Expediente') }}</div>
                <br><br>   
                

                <div class="card-body">
                <form method="POST" action="{{ route('insertrev') }}" autocomplete="off">                      
                      @if(session('status'))   
                        <div class="alert alert-success">
                          {{session ('status')}}                            
                        </div>
                        @endif
                        @csrf 
                                    
                         <div class="form-group row">
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Número de Carpeta') }}</label>
                        <div class="col-md-6"> 
                            <input list="browsers" name="carpeta"  class="form-control" id ="carpeta" required>                             
                            <datalist  id="browsers">                              
                            @foreach($revisiones as $revision) 
                            <option value="{{ $revision->carpeta_id}} "> </option>
                            @endforeach
                            </datalist>
                        </div> 
                    </div> 

                        <div class="form-group row">                          
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Trámite') }}</label>                          
                            <div class="col-md-6">
                              <div id="div1">
                               </div>
                            </div>
                        </div> 


 
                      
                      <div class="form-group row">
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Comentario de Abogado') }}</label>
                        <div class="col-md-6">
                       <div id="div3"></div>
                        </div>  
                          
                    </div> 
 

                       <div class="form-group row">
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Comentario') }}</label>
                        <div class="col-md-6">
                        <div id="div5"></div>
                       
                        </div>                            
                    </div> 

                                          

                     <div class="form-group row">    
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Estatus1') }}</label>
                        <div class="col-md-6"> 
                        <div id="div6"></div>
                                                   
                           
                        </div> 
                        </div> 
                        
                     <div class="form-group row">    
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Estatus1') }}</label>
                        <div class="col-md-6"> 
                        <div id="div7"></div>
                                                   
                           
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
  $("#carpeta").change(function(event){
  $.get("ConsultaRevisiones/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#div1").empty();   
     $("#div2").empty();  
     $("#div5").empty();  
     $("#div6").empty();  
     $("#div7").empty(); 
     $("#div8").empty(); 
    for(i=0; i<response.length; i++){
      $("#div1").append('<label id="nombre" class="form-control">'+response[i].tramite+'</label>'); 
      $("#div3").append(' <textarea rows="4" cols="50"  class="form-control"  name="comentarioab"  >'+response[i].comentario+'</textarea>'); 
      $("#div5").append(' <textarea rows="4" cols="50"  class="form-control"  name="comentarioab"  >'+response[i].comentario_cal+'</textarea>');   
      $("#div6").append('<input type="text" value='+response[i].estatus1+' class="form-control">');
      $("#div7").append('<input type="text" value='+response[i].estatus2+' class="form-control">'); 
    
     
 
      
     
    }
  }); 
});
});
</script>
@endsection

 
  




