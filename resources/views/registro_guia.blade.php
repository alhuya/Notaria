@extends('layouts.app')
@section('content')
@if(Gate::check('isAdministrador'))
@include('layouts.menu_new')  

@endif 
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
 
</head> 

<div class="container">
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          
                <br><br>  
                <div class="form-group row"> 
        
      
        <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Número de Carpeta') }}</label>

                <div class="col-md-6">
                <input list="browsers" name="carpeta"  class="form-control" id ="input" required>                             
                <datalist  id="browsers">                              
                    @foreach($Tramites as $tramite)
                    <option value="{{ $tramite['carpeta_id']}}">@endforeach
                </datalist>
            </div>
                
            </div>    
            <div class="card">
                <div class="card-header">{{ __('Guía Registro') }}</div> 

                <div class="card-body"> 
                <form method="POST"  action=" registro_guia/{{$tramite['carpeta_id']}}">
                {{ method_field('patch')}}
                      @if(session('status'))  

                        <div class="alert alert-success"> 
                          {{session ('status')}}   
                           
                        </div>
                        @endif 
                        @csrf 

                        

                       <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Número de Escritura') }}</label>

                            <div class="col-md-6">
                                <input id="numero_ecritura" type="text" class="form-control{{ $errors->has('numero_ecritura') ? ' is-invalid' : '' }}" name="numero_escritura" value="{{ old('numero_ecritura') }}" required autofocus>

                                @if ($errors->has('numero_ecritura'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('numero_ecritura') }}</strong>
                                    </span>
                                @endif
                            </div>

                            </div>

                       <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="date" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="fecha" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
</div>
                            <div class="form-group row">
                            <label for="volumen" class="col-md-4 col-form-label text-md-right">{{ __('Volumen') }}</label>

                            <div class="col-md-6">
                                <input id="volumen" type="text" class="form-control{{ $errors->has('volumen') ? ' is-invalid' : '' }}" name="volumen" value="{{ old('volumen') }}" required autofocus>

                                @if ($errors->has('volumen')) 
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('volumen') }}</strong> 
                                    </span>
                                @endif
                            </div>

                            </div> 
                            <div class="form-group row">
                            <label for="folio1" class="col-md-4 col-form-label text-md-right">{{ __('Folio Inicial') }}</label>

                            <div class="col-md-6">
                                <input id="folio1" type="text" class="form-control{{ $errors->has('folio1') ? ' is-invalid' : '' }}" name="folio1"  required autofocus>

                                @if ($errors->has('folio1')) 
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('folio1') }}</strong>
                                    </span>
                                @endif
                            </div>

                            </div>

                             <div class="form-group row">
                            <label for="folio2" class="col-md-4 col-form-label text-md-right">{{ __('Folio Final') }}</label>

                            <div class="col-md-6">
                                <input id="folio2" type="text" class="form-control{{ $errors->has('folio2') ? ' is-invalid' : '' }}" name="folio2" value="{{ old('folio2') }}" required autofocus>

                                @if ($errors->has('folio2')) 
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('folio2') }}</strong>
                                    </span>
                                @endif
                            </div>

                            </div>

                              <div class="form-group row">
                            <label for="folio2" class="col-md-4 col-form-label text-md-right">{{ __('Otorgantes') }}</label>

                            <div class="col-md-6">
                                <input id="folio2" type="text" class="form-control{{ $errors->has('folio2') ? ' is-invalid' : '' }}" name="otorgantes" value="{{ old('folio2') }}" required autofocus>

                                @if ($errors->has('folio2')) 
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('folio2') }}</strong>
                                    </span>
                                @endif
                            </div>

                            </div>
 

                        <div class="form-group row"> 
        
      
        <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Contrato') }}</label>

                <div class="col-md-6">
                <input list="browsers2" name="contrato"  class="form-control" id ="input" required>                              
                <datalist  id="browsers2">                              
                    @foreach($Tipos as $tipo)
                    <option value="{{ $tipo['id']}}">{{ $tipo['tramite']}}</option>@endforeach
                </datalist>
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--<script src="{{ asset('js/user.js') }}" ></script>-->

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
  $("#doc1").change(function(event){
  $.get("tramite_documento/"+event.target.value+"",function(response ,state){ 
    console.log(response);
     $("#div1").empty();  
    
    for(i=0; i<response.length; i++){ 
    $("#div1").append(' <input type="checkbox" name="docId[]" value='+response[i].id+'> '+response[i].documento+' <br>');
         
    }
  }); 
});

});
</script>
@endsection 


 




