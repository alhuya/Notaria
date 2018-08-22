@extends('layouts.app')
@section('content')
@include('layouts.menu_new')   


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
                <div class="card-header"  style="text-align: center;">{{ __('Segunda Revisión de Expediente') }}</div>
                <br><br>   
                

                <div class="card-body">
                <form method="POST" action="{{ route('rev2') }}"  autocomplete="off">
                     
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
                          <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Número de Folio') }}</label>                        
                          <div class="col-md-6">
                            <div id="div2">                         

                             </div>
                          </div>
                      </div> 

                        <div class="form-group row">    
                      <label for="puesto" class="col-md-4 col-form-label text-md-right">{{ __('Documentos') }}</label>

                             <div class="col-md-6" id="div4">
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
                        <textarea rows="4" cols="50" name="comentariocal"  class="form-control"></textarea>
                        </div>                            
                    </div> 

                                          

                     <div class="form-group row"> 
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Estatus') }}</label>
                        <div class="col-md-6"> 
                            <input list="browsers3" name="estatus"  class="form-control" id ="var" required>                           
                            <datalist  id="browsers3">
                            <option value="Aprovada "></option>
                            <option value="Cancelada "></option>
                            <option value="Revisión "></option>
                            </datalist>
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
  $.get("ControlTramites/"+event.target.value+"",function(response ,state){
  //  console.log(response);
     $("#div1").empty();   
     $("#div2").empty();  
    for(i=0; i<response.length; i++){
      $("#div1").append('<label id="nombre" class="form-control">'+response[i].tramite+'</label>'); 
      $("#div2").append(' <input class="form-control" type="text" name="numero_esc" value='+response[i].numero_escritura+' readonly >');
      $("#div3").append(' <textarea rows="4" cols="50"  class="form-control"  name="comentarioab"  >'+response[i].comentario+'</textarea>');  
      $("#div4").append('<input type="checkbox" name="docId[]" value='+response[i].id+' >'+response[i].documento+'</br>'); 
     
 
      
     
    }
  }); 
});
});
</script>
@endsection

 
  




