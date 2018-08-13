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
                    <form method="POST" action="{{ route('costo') }}">
                        @if(session('status'))

                        <div class="alert alert-success">
                            {{session ('status')}}
                            
                        </div>
                        @endif

                         <div class="form-group row"> 
        
        @csrf   
      <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Tramites') }}</label>

             <div class="col-md-6">
               <input list="browsers2" name="tramite"  class="form-control" id ="tramite" required>                             
               <datalist  id="browsers2">                              
                @foreach($tramites as $tramite)
                <option value="{{ $tramite['id']}}">{{ $tramite['tramite']}}</option>@endforeach
               </datalist>
           </div>
            
        </div> 
        <div class="form-group row"> 
        
         
        <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Costo') }}</label>
  
               <div class="col-md-6">
                 <input list="browsers" name="tipo"  class="form-control" id ="tipo" required>                             
                 <datalist  id="browsers">                              
                  
                  <option value="{{ __('1') }} {{ __('Costo Estandar') }}">{{ __('Costo Estandar') }}</option>
                  <option value="{{ __('2') }} {{ __('Costo Especial 1') }} "></option>
                  <option value="{{ __('3') }} {{ __('Costo Especial 2') }} "></option>
                  <option value="{{ __('4') }} {{ __('Costo Especial 3') }}"></option>
                  <option value="{{ __('5') }} {{ __('Abierto') }}"></option>
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
            
<<<<<<< HEAD
            $.get("ConceptoCosto2/"+tramite+"/"+tipo+"",function(response ,state){
            console.log(response);
            $("#div1").empty();  
                for(i=0; i<response.length; i++){
                    $("#div1").append('<input id="costou" type="text" class="form-control"  value='+response[i].costo+' readonly>');  
                    $("#div2").append('<input id="concepto" type="text" class="form-control" value='+response[i].concepto+' readonly>'); 
                      
=======
            $.get("ConceptoCosto/"+tramite+"/"+tipo+"",function(response ,state){
            console.log(response);
            $("#div1").empty();  
                for(i=0; i<response.length; i++){
                    $("#div1").append('<input id="costou" type="text" class="form-control" name="costo[]" value='+response[i].costo+'  autofocus>');    
>>>>>>> 0d877ba202b989b69ff7273c7baa556dcdfb438e
                }
            }); 
        });      
    });
});
</script>
@endsection
 

 
 



