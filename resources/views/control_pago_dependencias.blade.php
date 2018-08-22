@extends('layouts.app')
@section('content')
@include('layouts.menu_new')  


<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
          
            <div class="card">
                <div class="card-header" style="text-align: center;">{{ __('Pago a Dependencia') }}</div>
               

                <div class="card-body">
                <form method="POST" action="{{ route('pagodep') }}" autocomplete="off">
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
                            <label for="impuesto" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Dependencia') }}</label>

                            <div class="col-md-6">
                            <select name="dependencia" class="form-control">
                         @foreach($Dependencias as $dependencia){
                            <option value="{{$dependencia['dependencia']}}">{{$dependencia['dependencia']}}</option>
                            @endforeach 
                        } 
                        </select>
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
                            <select name ="tipo_pago" class="form-control">
                            @foreach($Tipos as $tipo)
                                <option value="{{$tipo['tipo']}}">{{$tipo['tipo']}}</option>                               
                            @endforeach
                                </select>
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

 


