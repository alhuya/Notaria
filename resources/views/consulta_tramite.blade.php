@extends('layouts.app')
    @section('content')
    @if(Gate::check('isAdministrador'))
    @include('layouts.menu_new')  


    @endif 

    <link rel="stylesheet" type="text/css" href="css/app.css">   
    <div class="container">
    <div class="row justify-content-center">
     <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Consulta Trámites') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('puestos_us') }}"> 
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