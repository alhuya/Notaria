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
                <div class="card-header" style="text-align: center;">{{ __('CONFIRMA TRAMITE') }}</div>
                <br><br>   
                

                <div class="card-body">
                <form method="POST" action="{{ route('confirma') }}" autocomplete="off">                      
                      @if(session('status')) 
                        <div class="alert alert-success">
                          {{session ('status')}}                             
                        </div> 
                        @endif
                        @csrf 

                     <div class="form-group row">  
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Cliente') }}</label>
            
                        <div class="col-md-6">
                            <input list="browsers" name="cliente"  class="form-control"  required>                             
                            <datalist  id="browsers">                              
                            @foreach($clientes as $cliente) 
                            <option value="{{ $cliente->id}}">{{ $cliente->nombre}} {{ $cliente->apellido_paterno}} {{ $cliente->apellido_materno}}</option>@endforeach
                            </datalist>
                        </div> 
                    </div> 

                      <div class="form-group row">                  
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Trâmite') }}</label>
                        <div class="col-md-6">
                            <input list="browsers2" name="tramite"  class="form-control" id ="doc1" required>                             
                            <datalist  id="browsers2">                              
                            @foreach($tramites as $tramite) 
                            <option value="{{ $tramite->id}}">{{ $tramite->tramite}}</option>@endforeach
                            </datalist>
                        </div>
                    </div> 

                        <div class="form-group row">    
                      <label for="puesto" class="col-md-4 col-form-label text-md-right">{{ __('Documentos') }}</label>
                             <div class="col-md-6">                                
                             <div id="div1">
                             </div>                                
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
  $("#doc1").change(function(event){
  $.get("tramite_documento/"+event.target.value+"",function(response ,state){ 
   // console.log(response);
     $("#div1").empty(); 
    
    for(i=0; i<response.length; i++){ 
    $("#div1").append(' <input type="checkbox" name="docId[]" value='+response[i].id+'> '+response[i].documento+' <br>');
         
    }
  }); 
});

});
</script>
@endsection 


 




