@extends('layouts.app')

@section('content')
@if(Gate::check('isAdministrador'))
@include('layouts.menu_new')  

@endif 
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
        
            <div class="card">
                <div class="card-header">{{ __('Presupuesto') }}</div>
               

                <div class="card-body">
                    <form method="POST" action="{{ route('insertprep') }}">  
                        @if(session('status'))

                        <div class="alert alert-success"> 
                            {{session ('status')}}
                            
                        </div> 
                        @endif
                        @if(session('status2'))
                        <div class="alert alert-danger">
                        {{session ('status2')}}
                            </div>
                            @endif
 
                        <div class="form-group row"> 
                        @csrf 
           <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Número de Carpeta') }}</label>
     
                  <div class="col-md-6"> 
                    <input list="browsers2" name="carpeta"  class="form-control" id ="numero" required>                             
                    <datalist  id="browsers2">                              
                     @foreach($Tramites as $tramite)
                     <option value="{{ $tramite->carpeta_id}}"></option>@endforeach
                    </datalist> 
                </div>
                 
             </div> 
                
           

    <table class="table table-bordered"> 
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Concepto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Pagos</th>
      <th scope="col">Cantidad Pendiente</th>
    </tr>
  </thead>
  <tbody id="concepto">
  </tbody>
  <tbody id="total">
  </tbody>

</table>

                         
   
   

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


        $("#numero").change(function(event){
            var numero = $('#numero').val(); 
            console.log(numero);
              
            $.get("PresupuestoConsulta/"+numero+"",function(response ,state){
            console.log(response); 
                 
                    $("#costo").empty();  
                    $("#concepto").empty();
                    var total = 0;
                    var total2 = 0;
                    var cantidad = 0;
                    var resta = 0;   
                for(i=0; i<response.length; i++){
                        
                       total += response[i].costo << 0 ;
                       total2 += response[i].cantidad << 0 ;

                       resta = response[i].costo - response[i].cantidad;

                
                 
                   $("#costo").append('"<tr><th><td>'+response[i].costo+'</td></th></tr>"');  
                   $("#concepto").append('"<tr><th><td>'+response[i].concepto+'</td><td>'+response[i].costo+'</td><td><input id="costou" type="text" class="form-control" value ="'+response[i].cantidad+'" readonly></td><td>'+resta + '</td></th><tr>"'); 

                      cantidad =  total - total2;

                }
                $("#total").append('"<tr><th><td>total</td><td>'+total+ '</td><td>'+total2+ '</td><td>'+cantidad+ '</td></th></tr>"'); 

            }); 
        });      
   


});
</script>
@endsection




