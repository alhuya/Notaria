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
                    <div class="card-header">{{ __('Puestos') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('puestos_us') }}">
                        	@if(session('status'))

                        <div class="alert alert-success">
                        	{{session ('status')}}
                        	
                        </div>
                        @endif
                            @csrf

                            <div class="form-group row">
                                <label for="puesto" class="col-sm-4 col-form-label text-md-right">{{ __('Puesto') }}</label>

                                <div class="col-md-6">
                                    <input id="puesto" type="text" class="form-control{{ $errors->has('puesto') ? ' is-invalid' : '' }}" name="puesto" value="{{ old('puesto') }}" required autofocus>

                                 @if ($errors->has('puesto'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('puesto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                             <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Abogado') }}</label>

                            <div class="col-md-3">
                                   <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Si') }}</label>
                                <input type="radio" name="abogado" value="si" >
                               
                            </div>
                            <div class="col-md-3">
                                   <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('No') }}</label>
                                <input type="radio" name="abogado" value="no" checked>
                            </div> 
                            
                        </div>

                        <div class="form-group row">
                                <label for="puesto" class="col-sm-4 col-form-label text-md-right">{{ __('Categorias') }}</label>

                                <div class="col-md-6">
                                @foreach($categorias as $categoria)
                                    <input type="checkbox" name="catId[]" value="{{ $categoria['id']}}" > {{$categoria['nombre'] }} <br>
                                
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


    </div>

    @endsection