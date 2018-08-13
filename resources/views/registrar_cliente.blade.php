 @extends('layouts.app') 

@section('content')

@include('layouts.menu_new')  
 

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
                            <label for="apellido_paterno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>

                            <div class="col-md-6">
                                <input id="apellido_paterno" type="text" class="form-control{{ $errors->has('apellido_paterno') ? ' is-invalid' : '' }}" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required autofocus>
 
                                @if ($errors->has('apellido_paterno'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('apellido_paterno') }}</strong>
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
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}"  required autofocus>

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
                                <input id="celular" type="text" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}"   required autofocus>

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
                            <label for="numero_interior" class="col-md-4 col-form-label text-md-right">{{ __('Número interior') }}</label>

                            <div class="col-md-6">
                                <input id="numero_interior" type="text" class="form-control{{ $errors->has('numero_interior') ? ' is-invalid' : '' }}" name="numero_interior" value="{{ old('numero_interior') }}" autofocus>

                                @if ($errors->has('numero_interior'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('numero_interior') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="numero_exterior" class="col-md-4 col-form-label text-md-right">{{ __('Número exterior') }}</label>

                            <div class="col-md-6">
                                <input id="numero_exterior" type="text" class="form-control{{ $errors->has('numero_exterior') ? ' is-invalid' : '' }}" name="numero_exterior" value="{{ old('numero_exterior') }}" required autofocus>

                                @if ($errors->has('numero_exterior'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('numero_exterior') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="codigo_postal" class="col-md-4 col-form-label text-md-right">{{ __('Código postal') }}</label>

                            <div class="col-md-6">
                                <input id="codigo_postal" type="text" class="form-control{{ $errors->has('codigo_postal') ? ' is-invalid' : '' }}" name="codigo_postal" value="{{ old('codigo_postal') }}" required autofocus>

                                @if ($errors->has('codigo_postal'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('codigo_postal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         

                        <div class="form-group row">    
                      <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estados') }}</label>

                             <div class="col-md-6">
                               <select name="estado" id="estado" class="form-control" required>
                                !<option value="">{{ __('-- Seleccione el estado --') }}</option>
                                @foreach($estados as $estado)
                                <option value="{{ $estado['id']}}">{{$estado['estado'] }}</option>
                                @endforeach
                               </select>
                           </div> 
                        </div> 
                        
                        <div class="form-group row">    
                      <label for="municipio" class="col-md-4 col-form-label text-md-right">{{ __('Municipios') }}</label>

                             <div class="col-md-6">
                               <select name="municipio" id="municipio" class="form-control" required>
                            
                               
                               </select>
                           </div>
                        </div> 
                        
                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div style=" 
   margin:0;
  box-sizing: border-box;
  flex-direction: column;
  min-height: 17vh;
    right: 0;
    ">
<img src="{{ asset('/imagenes/covel2.png') }}" width="150px" height="90px" align="right">
</div> -->
@endsection

 
@section('script')
<script type="text/javascript">
  $(document).ready(function(){
  $("#estado").change(function(event){
  $.get("Estados_Municipios/"+event.target.value+"",function(response ,state){
    console.log(response);
    $("#municipio").empty();   
   for(i=0; i<response.length; i++){
      $("#municipio").append("<option value='"+response[i].id+"'>"+response[i].municipio+"</option>");
    }
  });
}); 
});
</script>
@endsection

