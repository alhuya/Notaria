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
        <div class="col-md-12">
            <div class="card"> 
                <div style="text-align: center;" class="card-header">{{ __('Reportes Clientes') }}</div>

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
                             <th scope="col">Telefono</th>
                             <th scope="col">Celular</th>
                             <th scope="col">Correo</th>
                             <th scope="col">Calle</th>
                             <th scope="col">Colonia</th>
                             <th scope="col">Numero Interior</th>
                             <th scope="col">Numero Exterior</th>
                             <th scope="col">Codigo Postal</th>
                             <th scope="col">Estado</th>
                             <th scope="col">Municipio</th>
                           
                           </tr>
                          
                           @foreach($clientes as $cliente)
                           <tr>                             
                             <th >{{ $cliente->nombre}}</th> 
                             <th >{{ $cliente->apellido_paterno}} </th> 
                             <th >{{ $cliente->apellido_materno}} </th> 
                             <th >{{ $cliente->telefono}} </th> 
                             <th >{{ $cliente->celular}} </th> 
                             <th >{{ $cliente->correo}} </th> 
                             <th >{{ $cliente->calle}} </th> 
                             <th >{{ $cliente->colonia}} </th> 
                             <th >{{ $cliente->numero_interior}} </th> 
                             <th >{{ $cliente->numero_exterior}} </th>
                             <th>{{ $cliente->codigo_postal}} </th> 
                             <th >{{ $cliente->estado}} </th>
                             <th>{{ $cliente->municipio}} </th>                               
                             </tr> 
                            @endforeach 
                           
                          
                         </thead>
                        
  </table>
</div>
 
                        </div>
                        <p><a target="_blank" href="{{ action('MPDFController@getGenerar',['accion'=>'ver','tipo'=>'digital']) }}">Ver PDF digital</a></p>                
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


 




