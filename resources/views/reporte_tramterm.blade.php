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
            <div class="card"> 
                <div style="text-align: center;" class="card-header">{{ __('Trámites Terminados') }}</div> 
                <div class="card-body">
                        <div class="form-group row">

                              <style>
                            table {
                                border-collapse: collapse;
                                border-spacing: 0;
                                width: 100%;
                                border: 1px solid #ddd;
                            }

                            th, td {
                                text-align: left;
                                padding: 8px;
                            }

                            tr:nth-child(even){background-color: #f2f2f2}
                            </style>
                            </head>
                            <body>
                            <div style="overflow: scroll;">
                            <table>
                            <thead>
					  	 
                           <tr>
                             
                             <th scope="col">Carpeta</th>
                             <th scope="col">Trámite</th>
                             <th scope="col">Número Escritura</th>
                             <th scope="col">Cliente</th>
                             <th scope="col">Fecha</th>   
                                
                                                
                           </tr>
                           
                           @foreach($Tramites as $tramite)
                           <tr>                             
                             <th >{{ $usuario->carpeta_Id}}</th> 
                             <th >{{ $usuario->tramite_id}} </th> 
                             <th >{{ $usuario->numero_escritura}} </th> 
                             <th >{{ $usuario->cliente_id}} </th> 
                             <th >{{ $usuario->	fecha}} </th>                                               
                           </tr> 
                            @endforeach 
                           
                          
                         </thead>
                        
  </table>
</div>
 
                        </div>
                        <p><a target="_blank" href="{{ action('ReportesUsPDFController@getGenerar',['accion'=>'ver','tipo'=>'digital']) }}">Ver PDF digital</a></p>                
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

});
</script>
@endsection


 




