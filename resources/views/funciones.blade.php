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
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="card">
                <div class="card-header">{{ __('Funciones') }}</div>
 
                <div class="card-body">
                <div class="form-group row">  
          
               <div class="col-md-6">
                                            
                  @foreach($categorias as $categoria)
                
                  <input class="form-control" type="hidden" name="nombre" value='{{ $categoria->id}}' >
                  @endforeach  
              

             </div> 
               
          </div> 

           <div class="form-group row">  
          
          

                 <div class="col-md-6">
                                              
                    @foreach($puestos as $puesto)
                    
                    <input class="form-control" type="hidden" name="categoria" value='{{ $puesto->id}}' readonly >
                    @endforeach  
                

               </div> 
                
            </div> 

  
                    <form  method="POST" action="">
                    {{ method_field('patch')}}
                                      
                      @if(session('status'))

                        <div class="alert alert-success">
                          {{session ('status')}} 
                          
                        </div>
                        @endif
                     
          
                        @csrf   
                        <div class="form-group row">            

                            <div class="col-md-6">
                                                        
                                @foreach($puestos as $puesto)
                                
                                <input class="form-control" type="hidden" name="puesto" value='{{ $puesto->id}}' readonly >
                                @endforeach  
                            

                            </div> 
                            
                        </div> 

                        <div class="form-group row">  
          
                      <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Categorias') }}</label>

                             <div class="col-md-6">
                                                          
                                @foreach($categorias as $categoria)
                                
                                <label for="puesto"  class="form-control">{{ $categoria->nombre}}</label>
                                <input class="form-control" type="hidden" name="categoria" value='{{ $categoria->id}}' readonly >
                                @endforeach  
                            

                           </div> 
                             
                        </div> 

                        

                       <div class="form-group row">    
                      <label for="puesto" class="col-md-4 col-form-label text-md-right">{{ __('Funciones') }}</label>

                             <div class="col-md-6"> 
                                
                               @foreach($variables as $variable)
                            <input type="checkbox" name="funId[]" value=" {{$variable->funcion_id }}"> {{$variable->nombre_funcion }} <br>
                                                    
                            @endforeach
                               
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

@endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--<script src="{{ asset('js/user.js') }}" ></script>-->
  @section('script')
<script type="text/javascript">
  $(document).ready(function(){
  $("#input").change(function(event){
  $.get("categoriaPuesto/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#div1").empty();  
  
     
    
    for(i=0; i<response.length; i++){
      $("#div1").append(' <a href="https://www.w3schools.com">'+response[i].nombre+'</a><br>');
      

     
    }
  });
});
});
</script>
@endsection


 




