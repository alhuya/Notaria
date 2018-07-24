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
            <div class="card">
                <div class="card-header">{{ __('Asignar Funciones') }}</div>
 
                <div class="card-body">

                    <form method="GET" action="asignar_funciones">
                   
                      @if(session('status'))

                        <div class="alert alert-success">
                          {{session ('status')}}
                          
                        </div>
                        @endif
                        <div class="form-group row"> 
          
                        @csrf   
                      <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Puestos') }}</label>

                             <div class="col-md-6">
                               <input list="browsers" name="puesto"  class="form-control" id ="usuario2" required>                             
                               <datalist  id="browsers">                              
                                @foreach($puestos as $puesto)
                                <option value="{{ $puesto['id']}}   {{ $puesto['puesto']}}"></option>
                                @endforeach  
                               </datalist>

                           </div>
                            
                        </div> 
                       
                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Siguiente') }}
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



 




