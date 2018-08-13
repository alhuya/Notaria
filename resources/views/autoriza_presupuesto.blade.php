@extends('layouts.app')

@section('content')
@if(Gate::check('isAdministrador'))
@include('layouts.menu_new')  

@endif 
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
        
            <div class="card">
                <div class="card-header">{{ __('Presupuesto') }}</div>
               

                <div class="card-body">
                    <form method="POST" action="{{ route('prepa') }}">  
                        @if(session('status'))

                        <div class="alert alert-success"> 
                            {{session ('status')}}
                            
                        </div> 
                        @endif
                        
                        <div class="form-group row"> 
                        @csrf 
           <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Número de Carpeta') }}</label>
     
                  <div class="col-md-6"> 
                    <input list="browsers2" name="carpeta"  class="form-control" id ="numero" required>                             
                    <datalist  id="browsers2">                              
                     @foreach($Tramites as $tramite)
                     <option value="{{ $tramite ->carpeta_id}}"></option>@endforeach
                    </datalist> 
                </div>
                 
             </div> 
                
           

    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Concepto</th>
      <th scope="col">Cantidad</th>
      
    </tr>
  </thead>
  <tbody id="concepto">
  </tbody>

</table>
<!--
 <div class="form-group row"> 
                    
                 
                    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Comentario') }}</label>
            
                        <div class="col-md-6">
                        <textarea rows="4" cols="50" name="comentariocal"  class="form-control"></textarea>

                        </div>  
                          
                    </div> -->
                    <div id="autorizar">

                    </div>
   
   
    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>

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
 

        $("#numero").change(function(event){
            var numero = $('#numero').val(); 
            console.log(numero);
             
            $.get("PresupuestoConsulta/"+numero+"",function(response ,state){
            console.log(response); 
                 
                    $("#costo").empty();  
                    $("#concepto").empty();  
                for(i=0; i<response.length; i++){
                  
                   
                   $("#concepto").append('"<tr><th><td>'+response[i].concepto+'</td><td>'+response[i].costo+'</td></th><tr>"'); 
                   
                      
                }
                $("#autorizar").append('<input type="radio" name="estatus" value="Autorizado"> Autorizar<br><input type="radio" name="estatus" value="No Autorizado"> No Autorizar<br>'); 
            }); 
        });      
   


});
</script>
@endsection




