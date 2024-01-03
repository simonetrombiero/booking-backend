<?php
global $agenda;
?>
<style>
    .tooltipevent{
        width:500px;/*
        height:100px;*/
        background:#ccc;
        position:absolute;
        z-index:10001;
        /*transform:translate3d(-50%,-100%,0);*/
        font-size: 0.8rem;
        box-shadow: 1px 1px 3px 0px #888888;
        line-height: 1rem;
    }
    .tooltipevent div{
        padding:10px;
    }
    .tooltipevent div:first-child{
        font-weight:bold;
        color:White;
        background-color:#888888;
        border:solid 1px black;
    }
    .tooltipevent div:last-child{
        background-color:whitesmoke;
        position:relative;
    }
    .tooltipevent div:last-child::after, .tooltipevent div:last-child::before{
        width:0;
        height:0;
        border:solid 5px transparent;/*
        box-shadow: 1px 1px 2px 0px #888888;*/
        border-bottom:0;
        border-top-color:whitesmoke;
        position: absolute;
        display: block;
        content: "";
        bottom:-4px;
        left:50%;
        transform:translateX(-50%);
    }
    .tooltipevent div:last-child::before{
        border-top-color:#888888;
        bottom:-5px;
    }
</style>

<link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link href='fullcalendar/scheduler.css' rel='stylesheet' media='print' />
<script src='fullcalendar/lib/moment.min.js'></script>
<script src='fullcalendar/lib/jquery.min.js'></script>
<script src='fullcalendar/fullcalendar.min.js'></script>
<script src='fullcalendar/scheduler.js'></script>
<script src='fullcalendar/locale-all.js'></script>
<script>

    $(function () { // document ready

        $('#calendar').fullCalendar({
            defaultView: 'agendaDay',
            defaultDate: '<?php echo date("Y-m-d"); ?>',
            editable: false,
            selectable: true,
            eventLimit: true, // allow "more" link when too many events
            locale: 'it',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'agendaDay,agendaWeek,month'
            },
            views: {
                day: {
                    titleFormat: 'dddd, D MMMM  YYYY'
                },
                agendaTwoDay: {
                    type: 'agenda',
                    duration: {days: 3},

                    // views that are more than a day will NOT do this behavior by default
                    // so, we need to explicitly enable it
                    groupByResource: true

                            //// uncomment this line to group by day FIRST with resources underneath
                            //groupByDateAndResource: true
                }
            },

            //// uncomment this line to hide the all-day slot
            //allDaySlot: false,
            schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
            //slotDuration: '00:15:00',
            slotDuration: '00:05:00',
            slotLabelFormat: 'HH:mm',
            minTime: '09:00',
            maxTime: '20:00',
//      resources: [
//          url: 'index.php?action=caricaInfoCalendari'
//          
//      ],
            resources: {// you can also specify a plain string like 'json/resources.json'
                url: 'index.php?action=caricaInfoCalendari'
            },
//      resources: [
//        { id: 'a', title: 'Dipendente A', eventColor:'#1A11F7' },
//        { id: 'b', title: 'Dipendente B', eventColor: 'green' },
//        { id: 'c', title: 'Dipendente C', eventColor: 'orange' },
//        { id: 'd', title: 'Dipendente D', eventColor: 'red' }
//      ],
//      events: [
//        { id: '1', resourceId: '1', start: '2018-06-27', end: '2018-06-28', title: 'Trattamento 1' },
//        { id: '2', resourceId: '1', start: '2018-06-27T09:00:00', end: '2018-06-27T14:00:00', title: 'Trattamento 2' },
//        { id: '3', resourceId: '1', start: '2018-06-27T22:00:00', end: '2018-06-27T25:00:00', title: 'Trattamento XX3' },
//        { id: '4', resourceId: '3', start: '2018-06-27T10:30:00', end: '2018-06-27T11:30:00', title: 'Trattamento 4' },
//        { id: '5', resourceId: '4', start: '2018-06-27T10:00:00', end: '2018-06-27T15:00:00', title: 'Trattamento 5' },
//        { id: '6', resourceId: '1', start: '2018-06-28T09:00:00', end: '2018-06-28T14:00:00', title: 'Trattamento 2' },
//        { id: '7', resourceId: '2', start: '2018-06-28T12:00:00', end: '2018-06-28T06:00:00', title: 'Trattamento 3' },
//        { id: '8', resourceId: '3', start: '2018-06-28T09:30:00', end: '2018-06-28T11:30:00', title: 'Trattamento 4' },
//        { id: '9', resourceId: '4', start: '2018-06-28T10:00:00', end: '2018-06-28T13:00:00', title: 'Trattamento 5' },
//        { id: '10', resourceId: '4', start: '2018-06-28T10:30:00', end: '2018-06-28T11:00:00', title: 'Trattamento 5' }
//      ],


            events: {// you can also specify a plain string like 'json/resources.json'
                url: 'index.php?action=caricaPrenotazioni'
            },

            eventMouseover: function (calEvent, jsEvent) {
                var tooltip = '<div class="tooltipevent" style="width:250px;height:150px; padding: 8px;  background:#aed0ea;position:absolute;z-index:10001;"><b>' +
                        calEvent.tooltipCliente + '</b><br><br>' +
                        calEvent.tooltipTrattamento + '<br><br>' +
                        calEvent.tooltipOperatore + '</div>';
                var $tool = $(tooltip).appendTo('body');

                $(this).mouseover(function (e) {
                    // alert("hhh");
                    $(this).css('z-index', 10000);
                    $tool.fadeIn('500');
                    $tool.fadeTo('10', 1.9);
                }).mousemove(function (e) {
                    $tool.css('top', e.pageY + 10);
                    $tool.css('left', e.pageX + 20);
                });
            },
            eventMouseout: function (calEvent, jsEvent) {
                $(this).css('z-index', 1);
                $('.tooltipevent').remove();
            },

            select: function (start, end, jsEvent, view, resource) {
                console.log(
                        'select',
                        start.format(),
                        end.format(),
                        resource ? resource.id : '(no resource)'
                        );
            },
//      dayClick: function(date, jsEvent, view, resource) {
//        console.log(
//          'dayClick',
//          date.format(),
//          resource ? resource.id : '(no resource)'
//        );
//      }
            dayClick: function (date, jsEvent, view, resource) {
                //alert('Data: ' + date.format());
                //alert('Data: ' + date.format('DD/MM/YYYY HH:mm'));
                //alert('Operatore: ' + resource.title);
                //window.open('index.php?action=nuovoAppuntamento');
                /*  alert(resource);
                 alert(date);
                 alert("ciao");
                 alert(resource.id);
                 var paramatri='';
                 var ciccio;
                 
                 alert('Operatore: ' + resource.id);
                 if(resource !="undefined"){
                 paramentri += 'id='+ resource.id;
                 }
                 alert('OperatoreDDD: ' + resource.id);
                 if(typeof date.format('DD/MM/YYYY')!='undefined'){
                 paramentri = parametri + '&data='+ date.format('DD/MM/YYYY'); 
                 }
                 
                 if(typeof date.format('HH:mm')!='undefined'){
                 paramentri = parametri + '&ore='+ date.format('HH:mm'); 
                 }*/

                if (resource) {
                    //paramentri += 'id='+ resource.id;
                    location.href = 'index.php?action=nuovoAppuntamento&id=' + resource.id + '&data=' + date.format('DD/MM/YYYY') + '&ore=' + date.format('HH:mm');
                } else {
                    if (date.format('HH:mm') == '00:00') {
                        location.href = 'index.php?action=nuovoAppuntamento&data=' + date.format('DD/MM/YYYY');
                    } else {
                        location.href = 'index.php?action=nuovoAppuntamento&data=' + date.format('DD/MM/YYYY') + '&ore=' + date.format('HH:mm');
                    }

                }



            }
        });
        //alert("1");
    });
//alert("2");
</script>

<!--<script>
    

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
                
      },
      defaultDate: '<?php //echo date("Y-m-d");  ?>',
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

</script>-->



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

