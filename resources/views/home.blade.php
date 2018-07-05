@extends('layouts.app')
@section('content')
@if(Gate::check('isAdministrador'))
@include('layouts.menu_new')  

@endif
  
<link rel="stylesheet" type="text/css" href="css/app.css">   
<div class="container">

    <div class="row justify-content-center">
        @if(Gate::check('isRecepcionista') || Gate::check('isAbogado'))
         <div id='calendar'></div>

@endif
  
         
</div>
</div>

@endsection

@section('script')
    
    <script src="{{ asset('js/moment.min.js') }}" ></script>
    <script src="{{ asset('js/fullcalendar.min.js') }}" ></script>
     <script src="{{ asset('js/es.js') }}" ></script>
   
    <script>
     
    $(document).ready(function () {

        // page is now ready, initialize the calendar...

       $(document).ready(function () {

       $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: '2018-05-10',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2018-05-01',
        },
        {
          title: 'Long Event',
          start: '2018-05-07',
          end: '2018-05-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2018-05-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2018-05-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2018-05-11',
          end: '2018-05-13'
        },
        {
          title: 'Meeting',
          start: '2018-05-12T10:30:00',
          end: '2018-05-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2018-05-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2018-05-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2018-05-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2018-05-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2018-05-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2018-05-28'
        }
      ]
    });

  });

    });
</script>
@endsection

@section('footer')

@endsection
