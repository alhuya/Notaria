 @extends('layouts.app') 

@section('content')
@if(Gate::check('isAdministrador'))
@include('layouts.menu_new')  

@endif 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registrar_cliente') }}">
                        @csrf

                        @if(session('status'))

                        <div class="alert alert-success">
                            {{session ('status')}}
                            
                        </div>
                        @endif

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

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
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" required autofocus>

                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                            <div class="col-md-6">
                                <input id="celular" type="text" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" required autofocus>

                                @if ($errors->has('celular'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('celular') }}</strong>
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
                            <label for="calle" class="col-md-4 col-form-label text-md-right">{{ __('Calle') }}</label>

                            <div class="col-md-6">
                                <input id="calle" type="text" class="form-control{{ $errors->has('calle') ? ' is-invalid' : '' }}" name="calle" value="{{ old('calle') }}" required autofocus>

                                @if ($errors->has('calle'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('calle') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="col_fracc" class="col-md-4 col-form-label text-md-right">{{ __('Col o fracc') }}</label>

                            <div class="col-md-6">
                                <input id="col_fracc" type="text" class="form-control{{ $errors->has('col_fracc') ? ' is-invalid' : '' }}" name="col_fracc" value="{{ old('col_fracc') }}" required autofocus>

                                @if ($errors->has('col_fracc'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('col_fracc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="num_int" class="col-md-4 col-form-label text-md-right">{{ __('numero interior') }}</label>

                            <div class="col-md-6">
                                <input id="num_int" type="text" class="form-control{{ $errors->has('num_int') ? ' is-invalid' : '' }}" name="num_int" value="{{ old('num_int') }}" required autofocus>

                                @if ($errors->has('num_int'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('num_int') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="num_ext" class="col-md-4 col-form-label text-md-right">{{ __('numero exterior') }}</label>

                            <div class="col-md-6">
                                <input id="num_ext" type="text" class="form-control{{ $errors->has('num_ext') ? ' is-invalid' : '' }}" name="num_ext" value="{{ old('num_ext') }}" required autofocus>

                                @if ($errors->has('num_ext'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('num__ext') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cod_post" class="col-md-4 col-form-label text-md-right">{{ __('codigo postal') }}</label>

                            <div class="col-md-6">
                                <input id="cod_post" type="text" class="form-control{{ $errors->has('cod_pot') ? ' is-invalid' : '' }}" name="cod_post" value="{{ old('cod_post') }}" required autofocus>

                                @if ($errors->has('cod_post'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cod_post') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         

                        <div class="form-group row">    
                      <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estados') }}</label>

                             <div class="col-md-6">
                               <select name="estado" id="puesto" class="form-control" required>
                                !<option value="">{{ __('-- Seleccione el estado --') }}</option>
                                @foreach($estados as $estado)
                                <option value="{{ $estado['id']}}">{{$estado['estado'] }}</option>
                                @endforeach
                               </select>
                           </div>
                        </div> 
                        
                          <div class="form-group row">
                            <label for="municipio" class="col-md-4 col-form-label text-md-right">{{ __('Municipio') }}</label>

                            <div class="col-md-6">
                                <input id="municipio" type="text" class="form-control{{ $errors->has('municipio') ? ' is-invalid' : '' }}" name="municipio" value="{{ old('municipio') }}" required autofocus>

                                @if ($errors->has('municipio'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('municipio') }}</strong>
                                    </span>
                                @endif
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


@section('script')
<script type="text/javascript">
  $(document).ready(function(){
  $("#estado").change(function(event){
  $.get("User/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#estado").empty();   
    for(i=0; i<response.length; i++){
      $("#municipio").append("<option value='"+response[i].nombre+"'>"+response[i].nombre"</option>");
    }
  });
});
});
</script>
@endsection