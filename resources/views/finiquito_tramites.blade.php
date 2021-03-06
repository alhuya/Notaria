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
                <div class="card-header"  style="text-align: center;">{{ __('Finiquito de Trámites') }}</div>
                <br><br>   
                

                <div class="card-body">
                <form method="POST" action="{{ route('envio') }}"  autocomplete="off">                      
                      @if(session('status'))  
                        <div class="alert alert-success">
                          {{session ('status')}}                            
                        </div>
                        @endif
                        @csrf 

                      <div class="form-group row"> 
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Cliente') }}</label>
                        <div class="col-md-6"> 
                            <input list="browsers" name="cliente"  class="form-control" id ="var" required>                             
                            <datalist  id="browsers">                              
                            @foreach($clientes as $cliente) 
                            <option value="{{ $cliente->id}} "> {{ $cliente->nombre}} {{ $cliente->apellido_paterno}} {{ $cliente->apellido_materno}} </option>
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
                          <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Número de Carpeta') }}</label>
                        
                          <div class="col-md-6">
                            <div id="div2">
                             <!-- <label id="nombre" class="form-control"></label>-->

                             </div>
                          </div>
                      </div> 

                       <div class="form-group row"> 
                    
                
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Folio Unico') }}</label>
            
                        <div class="col-md-6"> 
                       <div id="div3">
                        </div>
                           
                        </div> 
                        
                    </div> 

                      

                           <div class="form-group row"> 
                    
                 
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Pagado') }}</label>
            
                        <div class="col-md-6">
                        <input class="form-control" type="text" name="carpeta" value='si' >

                        </div>  
                         
                    </div> 

                     <div class="form-group row"> 
                    
                
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Kinegrama') }}</label>
            
                        <div class="col-md-6"> 
                            <input list="browsers3" name="cliente"  class="form-control" id ="var" required>                             
                            <datalist  id="browsers3">                              
                            
                            <option value="Aprovada "></option>
                            <option value="Cancelada "></option>
                            <option value="Revisión "></option>
                            </datalist>
                        </div> 
                        
                    </div> 

                    <div class="form-group row"> 
                    
                 
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Numero de Kinegrama') }}</label>
            
                        <div class="col-md-6">
                        <input class="form-control" type="text" name="carpeta" value='si' >

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
  <!--<script src="{{ asset('js/user.js') }}" ></script>-->

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
  $("#var").change(function(event){
  $.get("ControlTramites/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#div1").empty();  
     $("#div2").empty();  
    for(i=0; i<response.length; i++){
      $("#div1").append('<label id="nombre" class="form-control">'+response[i].tramite+'</label>'); 
      $("#div2").append(' <input class="form-control" type="text" name="carpeta" value='+response[i].carpeta_id+' >');
      $("#div3").append('  <input  name="cliente"  class="form-control" value='+response[i].carpeta_id+' readonly>');   

      
 
      
     
    }
  }); 
});
});
</script>
@endsection

 
  




