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
        
      
        <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Número de Escritura') }}</label>

                <div class="col-md-6">
                <input list="browsers" name="carpeta"  class="form-control" id ="input" required>                             
                <datalist  id="browsers">                              
                    @foreach($Escrituras as $escritura)
                    <option value="{{ $escritura['numero_escritura']}}">@endforeach
                </datalist>
            </div>
                
            </div>    
            <div class="card">
                <div class="card-header">{{ __('Kinegramas') }}</div> 


 
                <div class="card-body"> 

                <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Pagado') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="fecha" value="Si" required autofocus>

                                @if ($errors->has('nombre')) 
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
</div>
                <form method="POST"  action="{{ route('kin') }}">
                 
                      @if(session('status'))  

                        <div class="alert alert-success">  
                          {{session ('status')}}   
                           
                        </div>
                        @endif 
                        @csrf 

            

                       
<label for="nombre" class="col-md-8 col-form-label text-md-right">{{ __('Registro Kinegrama') }}</label>
                            
                            <div class="form-group row">
                            <label for="folio1" class="col-md-4 col-form-label text-md-right">{{ __('Nùmero de Kinegrama') }}</label>

                            <div class="col-md-6">
                                <input id="folio1" type="text" class="form-control{{ $errors->has('folio1') ? ' is-invalid' : '' }}" name="kinegrama"  required autofocus>

                                @if ($errors->has('folio1')) 
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('folio1') }}</strong>
                                    </span>
                                @endif
                            </div>

                            </div>
                            <div id="div1">
                               <!-- <label id="nombre" class="form-control"></label>-->

                               </div>

                             <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"> 
                                    {{ __('Guardar') }}
                                </button> 
                            </div>
                        </div>
 
                    </form>
                    <br><br> 
                    <form method="POST"  action="entrega_kinegramas/{{ $escritura['numero_escritura']}}">
                {{ method_field('patch')}} 
                      @if(session('status2'))  

                        <div class="alert alert-success"> 
                          {{session ('status2')}}   
                           
                        </div>
                        @endif 
                        @csrf 
                            <label for="nombre" class="col-md-8 col-form-label text-md-right">{{ __('Entrega') }}</label>

                             <div class="form-group row">
                            <label for="folio2" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input id="folio2" type="date" class="form-control{{ $errors->has('folio2') ? ' is-invalid' : '' }}" name="fecha_entrega" value="{{ old('folio2') }}" required autofocus>

                                @if ($errors->has('folio2')) 
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('folio2') }}</strong>
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--<script src="{{ asset('js/user.js') }}" ></script>-->

@section('script')
<script type="text/javascript">
  $(document).ready(function(){ 
  $("#input").change(function(event){ 
  $.get("ControlTramites/"+event.target.value+"",function(response ,state){ 
    console.log(response);
     $("#div1").empty();  
     
    for(i=0; i<response.length; i++){ 
    $("#div1").append(' <input type="hidden" name="cliente" value='+response[i].cliente_id+'> ');
         
    }
  }); 
});

});
</script>
@endsection 


 




