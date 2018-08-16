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
        <div class="col-md-6">
            <div class="card"> 
                <div style="text-align: center;" class="card-header">{{ __('Reportes Tárifas') }}</div>

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
tr:nth-child(even){background-color: #f2f2f2} 
                                thead, tbody { display: block; } 

                                tbody {
                                    height: 180px;       /* Just for the demo          */
                                    overflow-y: auto;    /* Trigger vertical scroll    */
                                    overflow-x: hidden;  /* Hide the horizontal scroll */
                                }
</style>
</head>
<body>
<div style="overflow: -x;">
  <table> 
  <thead>
					  	 
                           <tr>
                             
                             <th scope="col">Concepto</th>
                             <th scope="col">Costo</th>
                             <th scope="col">Tipo Pago</th>
                             <th scope="col">Trámite</th>
                                                     
                           </tr>
                           <tbody 
                           @foreach($Tarifas as $tarifa)
                           <tr>                             
                             <th >{{ $tarifa->concepto}}</th> 
                             <th >{{ $tarifa->costo}} </th> 
                             <th >{{ $tarifa->tipo}} </th> 
                             <th >{{ $tarifa->tramite}} </th>                            
                             </tr> 
                            @endforeach  
                            </tbody 
                          
                         </thead>
                        
                        </table>
                        </div>
                         
                        </div>
                        @foreach($valores as $valor) 
                        <p><a target="_blank" href="{{ action('PDFTarifasaController@getGenerar',['accion'=>'ver','tipo'=>'digital','id'=> $valor->id ]) }}">Ver PDF digital</a></p>   
                        @endforeach             
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


 




