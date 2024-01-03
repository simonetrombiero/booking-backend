<?php
global $agenda;

        
    
        

        


?>
<link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='fullcalendar/lib/moment.min.js'></script>
<script src='fullcalendar/lib/jquery.min.js'></script>
<script src='fullcalendar/fullcalendar.min.js'></script>
<script src='fullcalendar/locale-all.js'></script>
<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
		
      },
      defaultDate: '<?php echo date("Y-m-d"); ?>',
      navLinks: true, // can click day/week names to navigate views
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      locale: 'it',
      events: {
                        url: 'index.php?action=caricaPrenotazioni'
                    },        
//      events: [
//        {
//          title: 'All Day Event',
//          start: '2018-03-01',
//        },
//        {
//          title: 'Long Event',
//          start: '2018-03-07',
//          end: '2018-03-10'
//        },
//        {
//          id: 999,
//          title: 'Repeating Event',
//          start: '2018-03-09T16:00:00'
//        },
//        {
//          id: 999,
//          title: 'Repeating Event',
//          start: '2018-03-16T16:00:00'
//        },
//        {
//          title: 'Conference',
//          start: '2018-03-11',
//          end: '2018-03-13'
//        },
//        {
//          title: 'Meeting',
//          start: '2018-03-12T10:30:00',
//          end: '2018-03-12T12:30:00'
//        },
//        {
//          title: 'Lunch',
//          start: '2018-03-12T12:00:00'
//        },
//        {
//          title: 'Meeting',
//          start: '2018-03-12T14:30:00'
//        },
//        {
//          title: 'Happy Hour',
//          start: '2018-03-12T17:30:00'
//        },
//        {
//          title: 'Dinner',
//          start: '2018-03-12T20:00:00'
//        },
//        {
//          title: 'Birthday Party',
//          start: '2018-03-13T07:00:00'
//        },
//        {
//          title: 'Click for Google',
//          url: 'http://google.com/',
//          start: '2018-03-28'
//        }
//      ]
    });

  });

</script>

 

  <div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
        <div style="clear:left;">&nbsp;</div>
        <div class="grid grid-pad">
            <div class="col-1-1">
                <!--INIZIO--->
                 <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                                            <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                                                AGENDA
                                            </h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
                                                <a href="index.php?action=nuovoAppuntamento" class="btn btn-green" >Nuovo Appuntamento</a>
                                            </div>
                                        </div>
  
  
       
       
             <div id='calendar'></div>

      



</div>
        </div>
        <div style="clear:left;">&nbsp;</div>
           
       