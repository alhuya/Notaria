@extends('layouts.app')

@section('content')
@if(Gate::check('isAdministrador'))
@include('layouts.menu_new')  

@endif 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Alta Concepto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('concepto') }}">
                        @if(session('status'))

                        <div class="alert alert-success">
                            {{session ('status')}}
                            
                        </div>
                        @endif
                        @csrf

                        <div class="form-group row">
                            <label for="concepto" class="col-md-4 col-form-label text-md-right">{{ __('Concepto') }}</label>

                            <div class="col-md-6">
                                <input id="concepto" type="text" class="form-control{{ $errors->has('concepto') ? ' is-invalid' : '' }}" name="concepto" value="{{ old('concepto') }}" required autofocus>

                                @if ($errors->has('concepto'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('concepto') }}</strong>
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
