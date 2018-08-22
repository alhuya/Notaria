@extends('layouts.app')  
@section('content')
@include('layouts.menu_new')  

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="card">
                <div class="card-header" style="text-align: center;" >{{ __('Editar Cita') }}</div>

                <div class="card-body"> 
                    <form method="POST" action="{{ route('edcit') }}" autocomplete="off">
                        @csrf 

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
                        <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input list="browsers2" name="fecha"  class="form-control" id ="fecha" required>                             
                                <datalist  id="browsers2">                        
                                @foreach($citas as $cita)
                                <option value="{{ $cita->id}} ">{{ $cita->fecha_hora}}</option>@endforeach
                                </datalist>
                            </div>
                            
                        </div> 


                        <div class="form-group row">    
                      <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Cliente') }}</label>

                             <div class="col-md-6">
                               <select name="cliente_id" id="nombre" class="form-control" required>
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
                               <select name="tipo_tramite" id="tramite" class="form-control" required>
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
                               <select name="usuario_id" id="abogado" class="form-control" required>
                                !<option value="">{{ __('-- Seleccione el abogado --') }}</option>
                                @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id}}">{{$usuario->nombre }} {{$usuario->ap_paterno }}  {{$usuario->ap_materno}}  </option>
                                @endforeach
                               </select>
                           </div>
                        </div>  
                        
                        <div class="form-group row">    
                      <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Citas') }}</label>
                        <div class="col-md-6">
                               <select name="tipo_cita_id" id="tipo" class="form-control" required>
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
                                    {{ __('Editar') }}
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
