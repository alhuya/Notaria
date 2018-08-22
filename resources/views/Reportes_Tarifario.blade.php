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
                <div style="text-align: center;" class="card-header" style="text-align: center;">{{ __('Reportes de Tarifas') }}</div>

                    <div class="card-body">     
                        <div class="form-group row">
                          
                            <div class="col-md-10"> 
                              <div>
                              
                              <button type="button" onclick="javascript:location.href='Reporte_Tarifa'" class="btn btn-primary btn-lg">{{ __('Tarifas') }}</button>
                           

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

 

 




