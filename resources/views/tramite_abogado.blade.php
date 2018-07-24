 @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header">{{ __('TRÁMITES POR ABOGADO') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tramite_abogado') }}">
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
                                <label>{{$usuario['nombre'] }} {{$usuario['ap_paterno'] }} {{$usuario['ap_materno'] }} </label>
                                <input id="nombre" type="hidden" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{$usuario['id'] }}" required autofocus>
                                @endforeach
                                @if ($errors->has('nombre'))  
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>  
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">    
                      <label for="puesto" class="col-md-4 col-form-label text-md-right">{{ __('Tramites') }}</label>

                             <div class="col-md-6"> 
                               
                               @foreach($tramites as $tramite)  
                            <input type="checkbox" name="tramid[]" value="{{ $tramite['id']}}" > {{$tramite['tramite'] }} <br>
                                                    
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
