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
        <div class="col-md-10">  
            <div class="card">
                <div class="card-header"  style="text-align: center;" >{{ __('Reporte de Bitácora') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('ed') }}">
       
                      @if(session('status'))  
                        <div class="alert alert-success">
                          {{session ('status')}} 
                           
                        </div>  
                        @endif 

                     <div class="form-group row">
                <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Inicio') }}</label>
                        <div class="col-md-6">
                        <input type="date" name="usuario"  class="form-control" id ="fecha_ini" required>                    
                       
                    </div>                        
                    </div> 
                    <div class="form-group row">    
                   
                <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Final') }}</label>

                        <div class="col-md-6">
                        <input type="date" name="usuario"  class="form-control" id ="fecha_fin" required>                             
                       
                    </div> 
                    </div>                       

                    @csrf     
                    <style>
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
                                align:center;
                            
                            }

                            tr:nth-child(even){background-color: #f2f2f2}
                            </style>

                                                            </head>
                                                            <body>
                            <div style="overflow: scroll;">
                            <table>
                            <thead> 
                                                    
                                                    <tr>
                                <th scope='col'>Fecha</th>
                                <th scope='col'>Nombre</th>  
                                <th scope='col'>Ap. Paterno</th> 
                                <th scope='col'>Ap. Materno</th> 
                                <th scope='col'>Telefono</th> 
                                <th scope='col'>Celular</th> 
                                <th scope='col'>Tipo</th>
                                </tr>
                                <tbody  id="div1">
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


@section('script') 
 <script type="text/javascript">
  $(document).ready(function(){
    $("#fecha_ini").change(function(event){
        var fechain = $('#fecha_ini').val();
        console.log(fechain);
        $("#fecha_fin").change(function(event){
            var fechafin = $('#fecha_fin').val();  
            console.log(fechafin); 
            
            $.get("Vitacora/"+fechain+"/"+fechafin+"",function(response ,state){
            console.log(response);
            $("#div1").empty();  
            $("#div2").empty();  
                for(i=0; i<response.length; i++){
                    $("#div1").append("'<tr><th width='20%' >"+ $.trim(response[i].fecha) +"</th><th  width='20%'>"+ $.trim(response[i].nombre) +"</th><th  width='15%'>"+ $.trim(response[i].apellido_paterno) +"</th><th  width=18%'   >"+ $.trim(response[i].apellido_materno) +"</th><th  width='18%'>"+ $.trim(response[i].telefono) +"</th><th  width='20%'>"+ $.trim(response[i].celular) +"</th><th >"+ $.trim(response[i].tipo) +"</th></tr>'");  
                      
                }
                $("#div2").append("<a target='_blank' href='pdf/vitacora_pdf/"+fechain+"/"+fechafin+"'>Ver PDF digital</a>"); 
            }); 
        });      
    });
});
</script>

