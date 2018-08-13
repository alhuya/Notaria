@extends('layouts.app')
@section('content')
@if(Gate::check('isAdministrador')) 
@include('layouts.menu_new')  

@endif 
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--> 
 
</head>

<div class="container">
<h2 style="text-align: center;">Agenda</h2>
           <div class="form-group row"> 
        
                        @csrf   
                      <label for="usuarios" class="col-md-4 col-form-label text-md-right">{{ __('Usuarios') }}</label>

                             <div class="col-md-6">
                               <input list="browsers" name="usuario"  class="form-control" id ="usuario2" required>                             
                               <datalist  id="browsers">                              
                                @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }} ">
                                @endforeach  
                               </datalist>

                           </div>
                            
                        </div> 

                    
                        
                    <div class="container">
              <div class="row justify-content-center">
                  <div id='calendar'></div>
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
 
<script src="{{ asset('js/moment.min.js') }}" ></script>
    <script src="{{ asset('js/fullcalendar.min.js') }}" ></script>
     <script src="{{ asset('js/es.js') }}" ></script>


<script type="text/javascript">

var fecha;
$(document).ready(function(){
    
  $("#usuario2").change(function(event){
  $.get("Citas/"+event.target.value+"",function(response ,state){ 
    console.log(response);
      
   for(i=0; i<response.length; i++){
      //$("#municipio").append("<option value='"+response[i].id+"'>"+response[i].municipio+"</option>");
      console.log(response[i].fecha_hora);
      fecha = response[i].fecha_hora;
      
    }
    
  });
});

var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output = d.getFullYear() + '/' +
    (month<10 ? '0' : '') + month + '/' +
    (day<10 ? '0' : '') + day;


$('#calendar').fullCalendar({
header: {
 left: 'prev,next today',
 center: 'title',
 right: 'month,agendaWeek,agendaDay,listWeek'
},
defaultDate: d,
navLinks: true, // can click day/week names to navigate views
editable: true,
eventLimit: true, // allow "more" link when too many events
events: [
 {
   title: 'All Day Event',
   start: fecha,
  
 }, 
]

});

});

</script>
@endsection


 




