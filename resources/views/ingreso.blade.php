@extends('layouts.app')

@section('content')
@if(Gate::check('isAdministrador'))
@include('layouts.menu_new')  

@endif 
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
          
            <div class="card">
                <div class="card-header">{{ __('Ingreso a Dependencia') }}</div>
               

                <div class="card-body">
                <form method="POST" action="{{ route('in') }}">
                        @csrf

                        @if(session('status'))
 
                        <div class="alert alert-success"> 
                            {{session ('status')}}
                            
                        </div>
                        @endif  
 
                      
                        <div class="form-group row">    
                      <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Numero de folio') }}</label>

                             <div class="col-md-6">
                               <select name="numero" id="estado" class="form-control" required>
                                !<option value="">{{ __('-- Selecciona el folio --') }}</option>
                                @foreach($numeros as $numero)
                                <option value="{{ $numero->numero_escritura}}">{{ $numero->numero_escritura}}</option>
                                @endforeach
                               </select>
                           </div> 
                        </div> 
                        
                        
                        <div class="form-group row">    
                      <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Dependencia') }}</label>

                             <div class="col-md-6">
                               <select name="dependencia" id="estado" class="form-control" required>
                                !<option value="">{{ __('-- Selecciona la dependencia--') }}</option>
                                @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->dependencia}}">{{ $dependencia->dependencia}}</option>
                                @endforeach
                               </select>
                           </div> 
                        </div> 
                        <div class="form-group row">
                            <label for="impuesto" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Ingreso') }}</label>

                            <div class="col-md-6">
                                <input id="cuenta" type="date" class="form-control" name="fecha"  required autofocus>
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

 


