@extends('layouts.app')
@section('content')

@include('layouts.menu_new')  
 

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">

 
</head> 

<div class="container"> 

          

                     
                        
                         <div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
            <div class="card"> 

                <div style="text-align: center;" class="card-header">{{ __('Reporte Documentaciòn por Tràmite') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('rep_doctram') }}">
                    @csrf
                       

                        @if(session('status'))
 
                        <div class="alert alert-success">
                            {{session ('status')}}
                             
                        </div>  
                        @endif 
                <div class="form-group row">  
                         <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Trámites') }}</label>
                              <div class="col-md-6">
                            <input list="foros" name="tramites"  class="form-control" id="tramite" required>                             
                            <datalist id="foros">
                            @foreach($Tramites as $tramite)
                         <option  value="{{$tramite->id}}">{{$tramite->tramite}}</option>
                            @endforeach
                            </datalist>
                        </div>  
                        </div>

                        <div class="form-group row">  
                         <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Clientes') }}</label>
                              <div class="col-md-6">
                            <input list="browser" name="clientes"  class="form-control" id="foro" required>                             
                            <datalist id="browser">
                            @foreach($Clientes as $cliente)
                         <option value="{{$cliente->id}}">{{$cliente->nombre}} {{$cliente->apellido_paterno}} {{$cliente->apellido_materno}}</option>}
                            @endforeach
                            </datalist>
                        </div> 
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Generar') }}
                                </button>
                            </div>
                        </div>

                    </form>
                  
                   
                          
                            
                          
                           
                              
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
                              
                                <div class="form-group row">
                                <div id="div1" class='container' style='overflow: scroll;'> 
                                <table> 
                        
                     
                        </table>
                
                </div>
                <div id="div2" ></div>
            </div> 
            </body>         
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
  $("#tramite").change(function(event){ 
  $.get("RepTramites/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#div1").empty(); 
     $("#div2").empty();  
        
for(i=0; i<response.length; i++){ 
      
    $("#div1").append("'<thead> <tr><th scope='col'>Tràmite</th><th scope='col'>Documentaciòn</th> </tr><tbody><tr><td>"+ $.trim(response[i].tramite) +"</td><td>"+ $.trim(response[i].documento) +"</td> </tbody>'"); 
    }
 
  });   
});

$(document).ready(function(){
  $("#estado").change(function(event){
  $.get("Estados_Municipios/"+event.target.value+"",function(response ,state){
    console.log(response);
    $("#municipio").empty();   
   for(i=0; i<response.length; i++){
      $("#municipio").append("<option value='"+response[i].tramite+"'>"+response[i].municipio+"</option>");
    }
  });
}); 
});
});


</script>
@endsection


 




