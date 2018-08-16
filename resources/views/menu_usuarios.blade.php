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
                <div class="card-header">{{ __('Menú Usuarios') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('ed') }}">
       
                      @if(session('status'))  
                        <div class="alert alert-success">
                          {{session ('status')}} 
                           
                        </div> 
                        @endif 

                        <div class="form-group row"> 
        
                   
                <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Usuarios') }}</label>

                        <div class="col-md-6">
                        <input list="browsers" name="usuario"  class="form-control" id ="usuario" required>                             
                        <datalist  id="browsers">                              
                            @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id}} ">{{ $usuario->nombre}} {{ $usuario->ap_paterno}} {{ $usuario->ap_materno}}</option>@endforeach
                        </datalist>
                    </div>                        
                    </div> 
                    @csrf     
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
                                thead, tbody { display: block; } 

                                tbody {
                                    height: 200px;       /* Just for the demo          */
                                    overflow-y: auto;    /* Trigger vertical scroll    */
                                    overflow-x: hidden;  /* Hide the horizontal scroll */
                                }
                                </style>

                                </head>
                              
                                <div class="form-group row">
                                <div class='container' style='overflow: x;'> 
                                <table> 
                                <thead> 
                                <tr>
                                <th scope='col'>Tràmite</th>
                                <th scope='col'>Documentaciòn</th> 
                                </tr
                                ><tbody  id="div1">
                                </tbody>
                        
                     
                        </table>
                                 
                        


                    </form>

                </div>
                <div id="div2"></div>
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
  $("#usuario").change(function(event){
  
  
  $.get("Menu/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#div1").empty();
     $("#div2").empty();  
 
    for(i=0; i<response.length; i++){   
   $("#div1").append("'<tr><td>"+ $.trim(response[i].nombre) +"</td><td>"+ $.trim(response[i].nombre_funcion) +"</td>'");      

    }
    var us = $('#usuario').val();

    $("#div2").append("'<p><a target='_blank' href='{{ action('MenuPDFuController@getGenerar',['accion'=>'ver','tipo'=>'digital','id'=> 'us' ]) }}'>Ver PDF digital</a></p>'"); 
 
  
  });
});
});
</script>
@endsection


 




