@extends('layouts.app')
@section('content')

@include('layouts.menu_new')  


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
                <div style="text-align: center;" class="card-header">{{ __('Reportes Usuarios') }}</div>

                <div class="card-body">
                   
                      
 
                        <div class="form-group row">
                          
                            
                          
                            <div class="col-md-6">
                              <div >
                              <button type="button" onclick="javascript:location.href='{{ route('rep_us') }}'" class="btn btn-primary btn-lg">Usuarios</button>
                              <button type="button" onclick="javascript:location.href='{{ route('menu_us') }}'" class="btn btn-primary btn-lg">Menu Usuario</button>
                             

                                </div>

                               </div>
                            </div>
                        </div>
                                             
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

});
</script>
@endsection


 




