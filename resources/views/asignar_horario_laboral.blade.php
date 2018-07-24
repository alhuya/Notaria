@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header">{{ __('ASIGNAR HORARIO LABORAL') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('hi')}}">
                        @csrf
                        @if(session('status'))

                        <div class="alert alert-success">
                            {{session ('status')}}
                            
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Usuarios') }}</label>

                            <div class="col-md-6"> 
                            @foreach($usuarios as $usuario)
                                <label>{{$usuario->nombre}} {{$usuario ->ap_paterno }} {{$usuario ->ap_materno }} </label>
                                <input id="nombre" type="hidden" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{$usuario ->id }}" required autofocus>
                                @endforeach
                                @if ($errors->has('nombre'))  
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>  
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                        <div class="col">
                        <label for="docuemnto" class="col-md-6 col-form-label text-md-right">{{ __('Fecha Inicio') }}</label>
                        
                                
                                <input id="concepto" type="date" class="form-control{{ $errors->has('') ? ' is-invalid' : '' }}" name="fecha_i"  required autofocus>

                              
                                @if ($errors->has('documento'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('documento') }}</strong>
                                    </span>
                                @endif 

                                </div>
                                
                                

                                <div class="col">
                                <label for="docuemnto" class="col-md-6 col-form-label text-md-right">{{ __('Fecha Fin') }}</label>
                       
                            <input id="concepto" type="date" class="form-control{{ $errors->has('') ? ' is-invalid' : '' }}" name="fecha_f"  required autofocus> 
                            
                                </div>
                                
                                </div>
                                <div class="row">
                        <div class="col"> 
                        <label for="docuemnto" class="col-md-6 col-form-label text-md-right">{{ __('Hora Inicio') }}</label>
                        
                                
                                <input id="concepto" type="time" class="form-control{{ $errors->has('') ? ' is-invalid' : '' }}" name="hora_i"  required autofocus>

                              
                                @if ($errors->has('documento'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('documento') }}</strong>
                                    </span>
                                @endif

                                </div>
                                
                                

                                <div class="col">
                                <label for="docuemnto" class="col-md-6 col-form-label text-md-right">{{ __('Hora Fin') }}</label>
                       
                            <input id="concepto" type="time" class="form-control{{ $errors->has('') ? ' is-invalid' : '' }}" name="hora_f"  required autofocus> 
                            
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

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 