
@extends('layouts.app') 
@section('content')
@include('layouts.menu_new')  

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ap_paterno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>

                            <div class="col-md-6">
                                <input id="ap_paterno" type="text" class="form-control{{ $errors->has('ap_paterno') ? ' is-invalid' : '' }}" name="ap_paterno" value="{{ old('ap_paterno') }}" required autofocus>

                                @if ($errors->has('ap_paterno'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('ap_paterno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="ap_materno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>

                            <div class="col-md-6">
                                <input id="ap_materno" type="text" class="form-control{{ $errors->has('ap_materno') ? ' is-invalid' : '' }}" name="ap_materno" value="{{ old('ap_materno') }}" required autofocus>

                                @if ($errors->has('ap_materno'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('ap_materno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> 
                                @endif 
                            </div> 
                        </div>
                        <div class="form-group row">    
                      <label for="puesto" class="col-md-4 col-form-label text-md-right">{{ __('Puesto') }}</label>

                             <div class="col-md-6">
                               <select name="puesto" id="puesto" class="form-control" required>
                                !<option value="">{{ __('-- Seleccione el puesto --') }}</option>
                                @foreach($puestos as $puesto)
                                <option value="{{ $puesto['id']}}">{{$puesto['puesto'] }}</option>
                                 @endforeach
                               </select>
                           </div>
                        </div> 
                        <div class="form-group row">    
                      <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                             <div class="col-md-6">
                               <select name="estado" id="estado" class="form-control" required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                               </select>
                           </div> 
                        </div> 
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>                     
                  
                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
