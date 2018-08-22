@extends('layouts.app')
@section('content')
@include('layouts.menu_new')  

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Concepto Costo') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('costo') }}"  autocomplete="off"> 
                        @if(session('status'))
 
                        <div class="alert alert-success">
                            {{session ('status')}} 
                            
                        </div>
                        @endif
                        @if(session('status2'))
 
                        <div  class="alert alert-danger">
                            {{session ('status2')}}
                            
                        </div>
                        @endif

                         <div class="form-group row"> 
        
        @csrf   
      <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Trámites') }}</label>

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
    @foreach($variables as $variable)
                                
       <input id="concepto" type="text" class="form-control{{ $errors->has('') ? ' is-invalid' : '' }}" name="docId[]" value="{{ $variable['concepto']}}" readonly>

    @endforeach
    @if ($errors->has('documento'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('documento') }}</strong>
        </span> 
    @endif

    </div> 
     

     <div class="col">
    <label for="docuemnto" class="col-md-6 col-form-label text-md-right">{{ __('Importe') }}</label>
    @foreach($variables as $variable) 

<input id="costou" type="text" class="form-control" name="costo[]"  autofocus>
@endforeach

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
