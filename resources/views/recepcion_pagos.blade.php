@extends('layouts.app')
@section('content') 
@include('layouts.menu_new')  


<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-12">
        
            <div class="card">
                <div style="text-align: center;" class="card-header">{{ __('Recepcion de Pagos') }}</div>
               

                <div class="card-body">
                    <form method="POST" action="{{ route('insert_pago') }}" autocomplete="off">  
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
                        <th scope="col">Tipo de Pago</th>
                        </tr>
                    </thead>
                    <tbody id="concepto">
                    </tbody>
                    </thead>
                    <tbody id="total">
                    </tbody>

                    </table>

                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
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
  
 @section('script')   
 <script type="text/javascript">
  $(document).ready(function(){ 


        $("#numero").change(function(event){
            var numero = $('#numero').val();  
          //  console.log(numero);
             
            $.get("PresupuestoConsulta/"+numero+"",function(response ,state){
            //console.log(response);   
                    $("#concepto").empty();  
                    var total = 0; 
                for(i=0; i<response.length; i++){
                  
                    
                   $("#concepto").append('"<tr><th><td><input class="form-control" type="hidden" name="concepto[]" value="'+response[i].concepto_costo_id+'">'+response[i].concepto+'</td><td>'+response[i].costo+'</td><td> <input class="form-control" type="text" name="pago[]" value="0"></td><td><select name="tipo[]"><option value="Efectivo">Efectivo</option><option value="Cheque">Cheque</option><option value="Deposito">Deposito</option></select></td></th></tr>"'); 
                  
                  total += response[i].costo << 0 ;

                } 
                //console.log(total);
                
                $("#total").append('"<tr><th><td>total</td><td>'+total+ '</td><td></td><td></td><td></td></th></tr>"'); 
            }); 
        });      
   


});
</script>
@endsection




