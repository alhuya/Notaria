@extends('layouts.app')

@section('content')
@if(Gate::check('isAdministrador'))
@include('layouts.menu_new')  
 
@endif 
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
        
            <div class="card">
                <div class="card-header">{{ __('Elaboración de Presupuesto') }}</div>
               

                <div class="card-body">
                    <form method="POST" action="{{ route('insertprep') }}"> 
                        @if(session('status'))

                        <div class="alert alert-success"> 
                            {{session ('status')}}
                            
                        </div> 
                        @endif
                        @if(session('status2'))
                        <div class="alert alert-danger">
                        {{session ('status2')}}
                            </div>
                            @endif
 
                        <div class="form-group row"> 
                        @csrf 
           <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Número de Carpeta') }}</label>
     
                  <div class="col-md-6"> 
                    <input list="browsers2" name="carpeta"  class="form-control" id ="numero" required>                             
                    <datalist  id="browsers2">                              
                     @foreach($Tramites as $tramite)
                     <option value="{{ $tramite['carpeta_id']}}"></option>@endforeach
                    </datalist> 
                </div>
                 
             </div> 
                
             <div class="form-group row"> 
        
         
        <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Costo') }}</label>
  
               <div class="col-md-6">
                 <input list="browsers" name="tipo"  class="form-control" id ="tipo" required>                             
                 <datalist  id="browsers">                              
                  
                  <option value="1">{{ __('Costo Estandar') }}</option>
                  <option value="2">{{ __('Costo Especial 1') }}</option>
                  <option value="3">{{ __('Costo Especial 2') }}</option>
                  <option value="4">{{ __('Costo Especial 3') }}</option>
                  <option value="5">{{ __('Abierto') }}</option>
                 </datalist>
             </div>
              
          </div> 
        
                         



         <div class="row">
    <div class="col">
    <label for="docuemnto" class="col-md-6 col-form-label text-md-right">{{ __('Concepto') }}</label>
    <div id="concepto">
        </div>
    </div>
    

     <div class="col">
    <label for="docuemnto" class="col-md-6 col-form-label text-md-right">{{ __('Costo') }}</label>
    <div id="costo">
</div>

    </div>
  
                         
   
    <div class="col-12">
    <br><br>
    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
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
        var id = $('#numero').val(); 
        console.log(id);
        $("#tipo").change(function(event){
            var tipo = $('#tipo').val();  
            console.log(tipo);
             
            $.get("ElaboraPresupuesto/"+id+"/"+tipo+"",function(response ,state){
            console.log(response);
                 
                    $("#costo").empty();  
                    $("#concepto").empty();  
                for(i=0; i<response.length; i++){
                 
                   $("#costo").append('<input id="costou" type="text" class="form-control"   value="'+ $.trim(response[i].costo) +'"  readonly>'); 
                  
                  
                   $("#concepto").append('<input id="concepto" type="text" class="form-control"    value="'+ $.trim(response[i].concepto) +'"  readonly>'); 

                      
                }
            }); 
        });      
    });


});
</script>
@endsection




