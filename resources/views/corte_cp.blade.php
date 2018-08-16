@extends('layouts.app')

@section('content')
@if(Gate::check('isAdministrador'))
@include('layouts.menu_new')  

@endif 
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-12"> 
         
            <div class="card">
                <div class="card-header">{{ __('Corte') }}</div>
               

                <div class="card-body">
                    <form method="POST" action="{{ route('CCP') }}">  
                    @csrf
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
     
                
           

    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Dependencia</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Tipo de Pago</th>
      <th scope="col">Cantidad</th>
    
      
    </tr>
  </thead>
  <tbody >

  @foreach($Dependencias as $dependencia)
  <tr>  
<th >{{$dependencia->fecha}}</th>
<th >{{$dependencia->dependencia}}</th>
<th >{{$dependencia->cantidad}}</th>
<th >{{$dependencia->tipo_pago}}</th> 
<th >{{$dependencia->entrega}}</th> 


 

  @endforeach
 
  </tr>        
  
   
  </tbody>
  
 

 <tr>  
<th >Total</th> 
<th ></th>
<th ><input type="text" name="total" value="{{$suma}}" style="border:none" readonly></th>
<th ></th>
<th ></th>
<th ></th>

 




 </tr>        
 
  
 </tbody>

</table>
<div class="form-group row"> 
    
                 
    <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Comentario') }}</label>

        <div class="col-md-6">
        <textarea rows="4" cols="50" name="comentario"  class="form-control"></textarea>

        </div>  
          
    </div> 

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
  <!--<script src="{{ asset('js/user.js') }}" ></script>-->

 @section('script')  
 <script type="text/javascript">
  $(document).ready(function(){ 


        $("#numero").change(function(event){
            var numero = $('#numero').val(); 
            console.log(numero);
             
            $.get("PresupuestoConsulta/"+numero+"",function(response ,state){
            console.log(response);   
                    $("#concepto").empty();  
                for(i=0; i<response.length; i++){
                 
                    
                   $("#concepto").append('"<tr><th><td>'+response[i].concepto+'</td><td>'+response[i].costo+'</td><td> <input class="form-control" type="text" name="pago[]" value="0"></td><td><select name="tipo[]"><option value="Efectivo">Efectivo</option><option value="Cheque">Cheque</option><option value="Deposito">Deposito</option></select></td><td> <input class="form-control" type="text" name="cuenta[]" ></td><tr></th>"'); 

                      
                } 
            }); 
        });      
   


});
</script>
@endsection




