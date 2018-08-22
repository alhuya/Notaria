@extends('layouts.app')
@section('content')
@include('layouts.menu_new')  

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  
 
</head> 
<br><br><br>
<div class="container">
<form  autocomplete="off">
           <div class="form-group row"> 
        
                        @csrf   
                      <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Trámite') }}</label>

                             <div class="col-md-6">
                               <input list="browsers" name="cliente"  class="form-control" id ="cliente" required>                             
                               <datalist  id="browsers">                              
                                @foreach($tramites as $tramite)
                                <option value="{{ $tramite['id']}} {{ $tramite['tramite']}}"><b><b></option>
                                @endforeach
                               </datalist>
                           </div>
                             
                        </div>  

                     
                        
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
               


                <div class="card-body">
                <table class="table table-striped">
					  <thead>
					  	 
					    <tr>
					      
					      <th scope="col">Documento</th>
					      
					    </tr>
					  </thead>
					  <tbody id="div1">
					  
					  </tbody>
					</table>
                 </form>   
               
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
  $("#cliente").change(function(event){
  $.get("tramite_documento/"+event.target.value+"",function(response ,state){
   // console.log(response);
      $("#div1").empty();   
    
    for(i=0; i<response.length; i++){
      $("#div1").append('<tr><td>'+response[i].documento+'</td></tr>');
    }
  });
});
});
</script>
@endsection


 




