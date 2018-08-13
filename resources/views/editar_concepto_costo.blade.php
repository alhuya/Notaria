@extends('layouts.app')

@section('content')
@if(Gate::check('isAdministrador'))
@include('layouts.menu_new')  

@endif 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Concepto Costo') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('editcc') }}">
                        @if(session('status'))

                        <div class="alert alert-success">
                            {{session ('status')}} 
                            
                        </div>
                        @endif

                         <div class="form-group row"> 
        
        @csrf   
      <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Tramites') }}</label>

             <div class="col-md-6">
               <input list="browsers2" name="tramite_id"  class="form-control" id ="tramite" required>                             
               <datalist  id="browsers2">                              
                @foreach($tramites as $tramite)
                <option value="{{ $tramite['id']}}">{{ $tramite['tramite']}}</option>@endforeach
               </datalist>
           </div>
            
        </div> 
        <div class="form-group row"> 
        
         
        <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Costo') }}</label>
  
               <div class="col-md-6">
                 <input list="browsers" name="costo_tramite_id"  class="form-control" id ="tipo" required>                             
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
    <div id="div2"></div> 
    </div>
    

     <div class="col">
    <label for="docuemnto" class="col-md-6 col-form-label text-md-right">{{ __('Costo') }}</label>
   <div id="div1">

   </div>
   <div class="container">
   <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
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
    $("#tramite").change(function(event){
        var tramite = $('#tramite').val();
        console.log(tramite); 
        $("#tipo").change(function(event){ 
            var tipo = $('#tipo').val(); 
            console.log(tipo);
            
            $.get("ConceptoCosto2/"+tramite+"/"+tipo+"",function(response ,state){
            console.log(response);
            $("#div1").empty();  
            $("#div2").empty();  
                for(i=0; i<response.length; i++){
                    $("#div1").append('<input type="text" class="form-control" name="costo[]" value='+response[i].costo+' >');  
                    $("#div2").append('<input  type="text" class="form-control" name="docId[]" value='+response[i].concepto+' readonly>'); 
                      
                }
            }); 
        });      
    });
}); 
</script>
@endsection
 

 
 




