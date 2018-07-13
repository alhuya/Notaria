@extends('layouts.app')

@section('content')
@if(Gate::check('isAdministrador'))
@include('layouts.menu_new')  

@endif 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Alta Tramite') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('alta_tramite') }}">
                        @if(session('status'))

                        <div class="alert alert-success">
                            {{session ('status')}}
                            
                        </div>
                        @endif
                        @csrf

                        <div class="form-group row">
                            <label for="tramite" class="col-md-4 col-form-label text-md-right">{{ __('Trámite') }}</label>

                            <div class="col-md-6">
                                <input id="tramite" type="text" class="form-control{{ $errors->has('tramite') ? ' is-invalid' : '' }}" name="tramite" value="{{ old('tramite') }}" required autofocus>

                                @if ($errors->has('tramite'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tramite') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                  
                        <div class="form-group row">
                            <label for="tiempo" class="col-md-4 col-form-label text-md-right">{{ __('Tiempo') }}</label>

                            <div class="col-md-6">
                                <input id="tiempo" type="number" class="form-control{{ $errors->has('tiempo') ? ' is-invalid' : '' }}" name="tiempo" value="{{ old('email') }}" required>

                                @if ($errors->has('tiempo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tiempo') }}</strong>
                                    </span>
                                @endif 
                            </div>
                        </div>

                          <div class="form-group row">    
                      <label for="puesto" class="col-md-4 col-form-label text-md-right">{{ __('Documentos') }}</label>

                             <div class="col-md-6">
                               
                               @foreach($documentos as $documento)
                            <input type="checkbox" name="docId[]" value="{{ $documento['id']}}" > {{$documento['documento'] }} <br>
                                                   
                            @endforeach
                               
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
