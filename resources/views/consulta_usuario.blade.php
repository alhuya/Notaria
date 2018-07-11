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
					  <tbody>
					  	@foreach($usuarios as $usuario) 
					    <tr>
					      
					      <td>{{$usuario['nombre'] }}</td> 
					      <td>{{$usuario['ap_paterno'] }}</td>
					      <td>{{$usuario['ap_materno'] }}</td>
					      <td>{{$usuario['puesto_id'] }}</td>
					    </tr>
					    
					    @endforeach
					  </tbody>
					</table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                            
                         



@endsection


