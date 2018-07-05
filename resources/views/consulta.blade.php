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
						        <main class="py-4">
                               
                                </main>                    
						        <div class="span4">
						        <form class="form-search">
						            <div class="input-append">
						                <input type="text" class="span2">
						                <button type="submit" class="btn">Search</button>
						            </div>
						        </form>
						        </div>
						    </div>
						</div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
					<table class="table table-striped">
					  <thead>
					    <tr>
					      <th scope="col">id</th>
					      <th scope="col">Nombre</th>
					      <th scope="col">Apellido Paterno</th>
					      <th scope="col">Apellido Materno</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row">1</th>
					      <td>Mark</td>
					      <td>Otto</td>
					      <td>@mdo</td>
					    </tr>
					    <tr>
					      <th scope="row">2</th>
					      <td>Jacob</td>
					      <td>Thornton</td>
					      <td>@fat</td>
					    </tr>
					    <tr>
					      <th scope="row">3</th>
					      <td>Larry</td>
					      <td>the Bird</td>
					      <td>@twitter</td>
					    </tr>
					  </tbody>
					</table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                            
                         



@endsection


