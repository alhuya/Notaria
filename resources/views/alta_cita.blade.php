@extends('layouts.app') 

@section('content')
@if(Gate::check('isAdministrador'))
@include('layouts.menu_new')  
 
@endif 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="card">
                <div class="card-header">{{ __('Alta de Cita') }}</div>

                <div class="card-body"> 
                    <form method="POST" action="{{ route('cita') }}">
                        @csrf

                        @if(session('status'))

                        <div class="alert alert-success">
                            {{session ('status')}}
                            
                        </div>
                        @endif

                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input id="fecha" type="datetime-local" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" value="{{ old('fecha') }}" required autofocus>

                                @if ($errors->has('fecha'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                @endif
                            </div> 
                        </div>

                        <div class="form-group row">    
                      <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Cliente') }}</label>

                             <div class="col-md-6">
                               <select name="nombre" id="nombre" class="form-control" required>
                                !<option value="">{{ __('-- Seleccione el cliente --') }}</option>
                                @foreach($clientes as $cliente)
                                <option value="{{ $cliente['id']}}">{{$cliente['nombre'] }} {{$cliente['apellido_materno'] }} {{$cliente['apellido_paterno'] }}</option>
                                @endforeach
                               </select>
                           </div>
                        </div> 
                        
                        <div class="form-group row">    
                      <label for="tramite" class="col-md-4 col-form-label text-md-right">{{ __('Trámite') }}</label>
                        <div class="col-md-6">
                               <select name="tramite" id="tramite" class="form-control" required>
                                !<option value="">{{ __('-- Seleccione el tramite --') }}</option>
                                @foreach($tramites as $tramite)
                                <option value="{{ $tramite['id']}}">{{$tramite['tramite'] }} </option>
                                @endforeach
                               </select>
                           </div>
                        </div>  

                          <div class="form-group row">    
                      <label for="tramite" class="col-md-4 col-form-label text-md-right">{{ __('Abogado') }}</label>
                        <div class="col-md-6">
                               <select name="abogado" id="abogado" class="form-control" required>
                                !<option value="">{{ __('-- Seleccione el abogado --') }}</option>
                                @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id}}">{{$usuario->nombre }} </option>
                                @endforeach
                               </select>
                           </div>
                        </div> 
                        
                        <div class="form-group row">    
                      <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Citas') }}</label>
                        <div class="col-md-6">
                               <select name="tipo" id="tipo" class="form-control" required>
                                !<option value="">{{ __('-- Seleccione el tipo de cita --') }}</option>
                                @foreach($tipos as $tipo)
                                <option value="{{ $tipo['id']}}">{{$tipo['tipo'] }} </option>
                                @endforeach
                               </select>
                           </div>
                        </div> 
                         
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
