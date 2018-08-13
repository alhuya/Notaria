@extends('layouts.app') 

@section('content')
@if(Gate::check('isAdministrador'))
@include('layouts.menu_new')  

@endif 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pago de Impuesto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pagoimp') }}">
                        @csrf

                        @if(session('status'))
 
                        <div class="alert alert-success"> 
                            {{session ('status')}}
                            
                        </div>
                        @endif 

                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input id="fexha" type="text" class="form-control" name="fecha" value="{{date("d-m-y")}}" readonly>                             
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="impuesto" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Impuesto') }}</label>

                            <div class="col-md-6">
                                <input id="impuesto" type="text" class="form-control{{ $errors->has('impuesto') ? ' is-invalid' : '' }}" name="impuesto" value="{{ old('impuesto') }}" required autofocus>
 
                                @if ($errors->has('impuesto'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('impuesto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cantidad" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad') }}</label>

                            <div class="col-md-6">
                                <input id="cantidad" type="text" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" name="cantidad" value="{{ old('cantidad') }}" required autofocus>
 
                                @if ($errors->has('cantidad'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cantidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="impuesto" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Pago') }}</label>

                            <div class="col-md-6">
                            <select name ="tipo_pago">
                                <option value="Efectivo">Efectivo</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Deposito">Deposito</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="impuesto" class="col-md-4 col-form-label text-md-right">{{ __('Cuenta') }}</label>

                            <div class="col-md-6">
                                <input id="cuenta" type="text" class="form-control{{ $errors->has('cuenta') ? ' is-invalid' : '' }}" name="cuenta" value="{{ old('cuenta') }}" required autofocus>
 
                                @if ($errors->has('cuenta'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cuenta') }}</strong>
                                    </span>
                                @endif 
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="entrega" class="col-md-4 col-form-label text-md-right">{{ __('Entrega') }}</label>

                            <div class="col-md-6">
                                <input id="entrega" type="text" class="form-control{{ $errors->has('entrega') ? ' is-invalid' : '' }}" name="entrega" value="{{ old('entrega') }}" required autofocus>
 
                                @if ($errors->has('entrega'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('entrega') }}</strong>
                                    </span>
                                @endif
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



