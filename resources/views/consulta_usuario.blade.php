@extends('layouts.app')
@section('content')
@if(Gate::check('isAdministrador'))
@include('layouts.menu_new')  

@endif
 

 <div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}</div>
					<div class="card-body">
						<div class="container">
							<div class="row">
						        <div class="span2">
						            <div class="btn-group pull-right" data-toggle="buttons-radio">
						                <!--<button class="btn active">All</button>
						                <button class="btn">Starred</button>-->
						            </div>
						        </div>
						                           
						        
						    </div>
						</div>
                    <form method="POST" action="{{ route('register') }}">

					
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
					<table class="table table-striped">
					  <thead> 
					  	
					    <tr>
					      
					      <th scope="col">Nombre</th>
					      <th scope="col">Apellido Paterno</th>
					      <th scope="col">Apellido Materno</th>
					       <th scope="col">Puesto</th>
					    </tr>
					  </thead> 
					  <tbody id="us">
					  
					   
					     
					  
					  </tbody>
					</table>
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
  $("#usuario").change(function(event){
  $.get("User/"+event.target.value+"",function(response ,state){
    console.log(response);
     $("#div1").empty(); 
   
 
    
    for(i=0; i<response.length; i++){

      $("#us").append("'<tr><td>"+ $.trim(response[i].nombre) +"</td><td>"+ $.trim(response[i].ap_paterno) +"</td><td>"+ $.trim(response[i].ap_materno) +"</td><td>"+ $.trim(response[i].puesto) +"</td></tr>'");
	 
					     
     
    }
  });
});
});
</script>
@endsection


