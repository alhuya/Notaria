@extends('layouts.app')
    @section('content') 
    @include('layouts.menu_new')  
 
 

 
    <link rel="stylesheet" type="text/css" href="css/app.css">   
    <div class="container">
    <div class="row justify-content-center">
     <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align: center;">{{ __('Consulta Trámites') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('puestos_us') }}" autocomplete="off"> 
                        	@if(session('status'))

                        <div class="alert alert-success">
                        	{{session ('status')}}
                        	
                        </div>
                        @endif
                            @csrf

                        <div class="form-group row"> 
        
                        @csrf   
                    <label for="clientes" class="col-md-4 col-form-label text-md-right">{{ __('Trámites') }}</label>

                            <div class="col-md-6">
                            <input list="browsers" name="cliente"  class="form-control" id ="cliente2" required>                             
                            <datalist  id="browsers">                              
                                @foreach($tramites as $tramite)
                                <option value="{{ $tramite['id']}} {{ $tramite['tramite']}} ">
                                @endforeach  
                            </datalist>

                        </div>
                            
                        </div> 

                         <div class="form-group row">    
                      <label for="puesto" class="col-md-4 col-form-label text-md-right">{{ __('Documentos') }}</label>

                             <div class="col-md-6" id="div1">
                               
                          
                               
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
  $("#cliente2").change(function(event){
  $.get("tramite_documento/"+event.target.value+"",function(response ,state){
  //  console.log(response); 
     $("#div1").empty(); 
   
     
    
    for(i=0; i<response.length; i++){
    $("#div1").append('<label  >'+response[i].documento+'</label></br>');
   
      
    }
  });
}); 
}); 
</script>
@endsection