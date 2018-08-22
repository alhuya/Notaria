@extends('layouts.app')
@section('content')
@include('layouts.menu_new')  

 

 <div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="text-align: center;">{{ __('Egreso Dependencia') }}</div>
					<div class="card-body">
						<div class="container">
							<div class="row">
						        <div class="span2">
						            <div class="btn-group pull-right" data-toggle="buttons-radio">
						            </div>
						        </div>
						                           
						        
						    </div>
						</div>
                    <form method="POST" action="{{ route('egreso') }}">
                    @csrf

                    @if(session('status'))

                    <div class="alert alert-success"> 
                        {{session ('status')}}
                        
                    </div>
                    @endif  

					
					<div class="form-group row"> 
        
                   
				<label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Numero de Folio') }}</label>

						<div class="col-md-6">
						<select list="browsers" name="numero"  class="form-control" id ="numero" required>                             
						                           
							@foreach($numeros as $numero)
							<option value="{{ $numero->numero_escritura}}">{{ $numero->numero_escritura}}</option>
                            @endforeach
						</select>
					</div>
						
					</div> 
                   
					<table class="table table-bordered">
					  <thead> 
					  	
					    <tr>
					      
					      <th scope="col">Fecha Ingreso</th>
					      <th scope="col">numero</th>
					      <th scope="col">Dependencia</th>
					       <th scope="col">Feha Egreso</th>
					    </tr>
					  </thead> 
					  <tbody id="us">
					  
					   
					     
					  
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

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
  $("#numero").change(function(event){
  $.get("ProyectoDependencia/"+event.target.value+"",function(response ,state){
    //console.log(response);
     $("#div1").empty(); 
    
    for(i=0; i<response.length; i++){
      $("#us").append("'<tr><td><input style='border:none' type='date' name='fecha_ingreso[]' value="+ $.trim(response[i].fecha_ingreso) +" readonly ></td><td><input style='border:none'  type='text' name='numero_folio[]' value="+ $.trim(response[i].numero_folio) +" readonly ></td><td><input style='border:none'   type='text' name='dependencia[]' value="+ $.trim(response[i].dependencia) +" readonly ></td><td><input style='border:none'  type='date' name='fecha_egreso[]' ></td></tr>'");
	 
					     
     
    }
  });
});
});
</script>
@endsection


