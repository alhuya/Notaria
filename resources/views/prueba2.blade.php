
@extends('layouts.app')

@section('content')
<div class="container">
    <div id='calendar'>    

    </div>     
    
</div>
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        // put your options and callbacks here
    })

});
</script>
@endsection



	 <script src="{{ asset('../public/plugins/fullcalendar/lib/jquery.min.js') }}" ></script>
	<script src="{{ asset('../public/plugins/fullcalendar/lib/moment.min.js') }}" ></script>
	<script src="{{ asset('../public/plugins/fullcalendar/fullcalendar.min.js') }}" ></script>
	<script src="{{ asset('../public/plugins/fullcalendar/locale/es.js') }}" ></script>