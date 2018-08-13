@extends('layouts.app')

@section('content')
@if(Gate::check('isAdministrador'))
@include('layouts.menu_new')  

@endif 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('DOCUMENTACIÓN') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('alta_documentacion') }}">
                        @if(session('status'))

                        <div class="alert alert-success">
                            {{session ('status')}}
                            
                        </div>
                        @endif
                        @csrf

                        <div class="form-group row">
                            <label for="docuemnto" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>

                            <div class="col-md-6">
                                <input id="documento" type="text" class="form-control{{ $errors->has('documento') ? ' is-invalid' : '' }}" name="documento" value="{{ old('documento') }}" required autofocus>

                                @if ($errors->has('documento'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('documento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         
                        <div class="form-group row">
                            <label for="costo" class="col-md-4 col-form-label text-md-right">{{ __('Costo') }}</label>

                            <div class="col-md-6">
                                <input id="costo" type="text" class="form-control{{ $errors->has('costo') ? ' is-invalid' : '' }}" name="costo" value="{{ old('costo') }}" required>

                                @if ($errors->has('costo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('costo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="origen" class="col-md-4 col-form-label text-md-right">{{ __('Origen') }}</label>

                            <div class="col-md-6">
                                <select name="origen" id="origen" class="form-control" required>
                                !<option value="">{{ __('-- Seleccione el origen --') }}</option>
                                <option value="Cliente">{{ __('Cliente') }}</option>
                                <option value="Terceros">{{ __('Terceros') }}</option>
                               </select>
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
