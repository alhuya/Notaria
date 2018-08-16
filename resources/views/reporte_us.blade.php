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
                <div style="text-align: center;" class="card-header">{{ __('Reportes Usuarios') }}</div> 
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
                             
                             <th scope="col">Nombre</th>
                             <th scope="col">Apellido Paterno</th>
                             <th scope="col">Apellido Materno</th>
                             <th scope="col">Correo</th>
                             <th scope="col">Puesto</th>                           
                           </tr>
                           
                           @foreach($Usuarios as $usuario)
                           <tr>                             
                             <th >{{ $usuario->nombre}}</th> 
                             <th >{{ $usuario->ap_paterno}} </th> 
                             <th >{{ $usuario->ap_materno}} </th> 
                             <th >{{ $usuario->email}} </th> 
                             <th >{{ $usuario->puesto}} </th>                                               
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


 




