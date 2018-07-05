<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <link rel='stylesheet' href='http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.css' />
     <script src="{{ asset('../public/plugins/fullcalendar/lib/jquery.min.js') }}" ></script>
    <script src="{{ asset('../public/plugins/fullcalendar/lib/moment.min.js') }}" ></script>
    <script src="{{ asset('../public/plugins/fullcalendar/fullcalendar.min.js') }}" ></script>
    <script src="{{ asset('../public/plugins/fullcalendar/locale/es.js') }}" ></script>

<script>
    $(document).ready(function () {

        // page is now ready, initialize the calendar...

        $('#calendar').fullCalendar({
            // put your options and callbacks here
        })

    });
</script>
</head>
<body>




<div id='calendar'></div>
</body>