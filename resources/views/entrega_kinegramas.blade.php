@extends('layouts.app')
@section('content')
@include('layouts.menu_new')  


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
                 
            <div class="card">
                <div class="card-header" style="text-align: center;">{{ __('Kinegramas') }}</div> 
 
                <div class="card-body"> 
                <form method="POST"  action="{{ route('entki') }}" autocomplete="off">
                <div class="form-group row">        
      
             <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Número de Escritura') }}</label>

                <div class="col-md-6">
                <input list="browsers" name="escritura"  class="form-control" id ="input" required>                             
                <datalist  id="browsers">                              
                    @foreach($Escrituras as $escritura)
                    <option value="{{ $escritura['numero_escritura']}}">
                    @endforeach
                </datalist> 
            </div>                
            </div>                  
                      @if(session('status'))  

                        <div class="alert alert-success">  
                          {{session ('status')}}   
                           
                        </div>
                        @endif 

                         @if(session('status2'))  

                        <div  class="alert alert-danger"> 
                        {{session ('status2')}}   
                        
                        </div>
                        @endif 
                        @csrf 
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Número de Escritura') }}</label>

                            <div class="col-md-6">
                                <label id="numero" class="form-control"></label>                               
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Cliente') }}</label>

                            <div class="col-md-6">
                                <label id="cliente" class="form-control"></label>                               
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Tramite') }}</label>

                            <div class="col-md-6">
                                <label id="tramite" class="form-control"></label>                               
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Volumen') }}</label>

                            <div class="col-md-6">
                                <label id="volumen" class="form-control"></label>                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('folio1') }}</label>

                            <div class="col-md-6">
                                <label id="folio1" class="form-control"></label>                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('folio2') }}</label>

                            <div class="col-md-6">
                                <label id="folio2" class="form-control"></label>                               
                            </div>
                        </div> 
            

                       
                   <label for="nombre" class="col-md-8 col-form-label text-md-right">{{ __('Registro Kinegrama') }}</label><br>
                            
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
              
                </div>
            </div> 
        </div> 
    </div>
</div> 

@endsection 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
@section('script')

<script type="text/javascript">
  $(document).ready(function(){   
  $("#input").change(function(event){  
  $.get("Kinegramas/"+event.target.value+"",function(response ,state){ 
 //  console.log(response);
    $("#numero").empty();  
     $("#cliente").empty();  
     $("#tramite").empty(); 
     $("#volumen").empty(); 
     $("#folio1").empty();  
     $("#folio2").empty(); 
     $("#div1").empty(); 
 
   
    for(i=0; i<response.length; i++){
      $("#numero").append(""+ $.trim(response[i].numero_escritura) +"");
      $("#cliente").append(""+ $.trim(response[i].nombre) +" "+ $.trim(response[i].apellido_paterno) +" "+ $.trim(response[i].apellido_materno) +"");
      $("#tramite").append(""+ $.trim(response[i].tramite) +"");
      $("#volumen").append(""+ $.trim(response[i].volumen) +"");
      $("#folio1").append(""+ $.trim(response[i].folio1) +"");
      $("#folio2").append(""+ $.trim(response[i].folio2) +"");
      $("#div1").append(' <input type="hidden" name="cliente" value='+response[i].cliente_id+'> ');
              
    }
  }); 
});

});
</script>
@endsection 


 




