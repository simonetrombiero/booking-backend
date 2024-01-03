<?php
global $agenda;
?>
<script>
    /*
     <!--
     
     
     
     
     
     
     
     //inserisci qui sotto il time, il primo valore è per i minuti e il secondo per i secondi 
     
     var limit="10:4"
     
     
     
     if (document.images){
     
     var parselimit=limit.split(":")
     
     parselimit=parselimit[0]*60+parselimit[1]*1
     
     }
     
     function beginrefresh(){
     
     if (!document.images)
     
     return
     
     if (parselimit==1)
     
     window.location.reload()
     
     else{ 
     
     parselimit-=1
     
     curmin=Math.floor(parselimit/60)
     
     cursec=parselimit%60
     
     if (curmin!=0)
     
     curtime=curmin+" minutes and "+cursec+" seconds left until page refresh!"
     
     else
     
     curtime=cursec+" seconds left until page refresh!"
     
     window.status=curtime
     
     setTimeout("beginrefresh()",1000)
     
     }
     
     }
     
     
     
     window.onload=beginrefresh
     
     //-->
     */
</script>

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

    .ui-autocomplete {
        z-index: 215000000 !important;
    }
    .ui-timepicker-standard{
        z-index: 215000000 !important;
    }

</style>





<link href="applicazione/css/jquery-calx/bootstrap.css" rel="stylesheet" type="text/css">
<link href="applicazione/css/jquery-calx/sb-admin.css" rel="stylesheet" type="text/css">
<link href="applicazione/css/jquery-calx/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="applicazione/font-awesome/css/font-awesome.min.css" type="text/css">



<link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link href='fullcalendar/scheduler.css' rel='stylesheet' media='print' />
<script src='fullcalendar/lib/moment.min.js'></script>
<script src='fullcalendar/lib/jquery.min.js'></script>
<script src='fullcalendar/fullcalendar.min.js'></script>
<script src='fullcalendar/scheduler.js'></script>
<script src='fullcalendar/locale-all.js'></script>
<script src="applicazione/js/jquery-calx/bootstrap.js" type="text/javascript"></script>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">
<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js"></script>-->

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="vendors/dataTables/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="vendors/dataTables/jquery.dataTables.min.js"></script>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<script>

    $(function () { // document ready

        $('#calendar').fullCalendar({
            //defaultView: '<?php //if(isAdmin()){    echo "agendaWeek"; }else{ echo "agendaDay"; }  ?>',
            defaultView: '<?php if (isAdmin()) {
    echo "agendaDay";
} else {
    echo "agendaDay";
} ?>',
            defaultDate: '<?php echo date("Y-m-d"); ?>',
            editable: false,
            selectable: true,
            eventLimit: true, // allow "more" link when too many events
            hiddenDays: [0, 6],
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
            slotDuration: '00:30:00',
            slotLabelFormat: 'HH:mm',
            minTime: '08:00',
            maxTime: '22:00',
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
                $('#addNew-event form')[0].reset();
                //alert('Data: ' + date.format());
                //alert('Data: ' + date.format('DD/MM/YYYY HH:mm'));
                //alert('Operatore: ' + resource.title);
                //window.open('index.php?action=nuovoAppuntamento');
                //alert(resource);
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
                if (typeof date.format('DD/MM/YYYY') != 'undefined') {
                    $('#dataAppuntamento').val(date.format('DD/MM/YYYY'));
                }
                if (date.format('HH:mm') != '00:00') {
                    $('#oraInizioAppuntamento').val(date.format('HH:mm'));


                } else {
                    $('#oraInizioAppuntamento').val('');

                }


                $('#addNew-event').modal('show');



                if (resource) {

                    //paramentri += 'id='+ resource.id;
                    // location.href = 'index.php?action=nuovoAppuntamento&id=' + resource.id + '&data=' + date.format('DD/MM/YYYY') + '&ore=' + date.format('HH:mm');
                    $("#postazioneAppuntamento").val(resource.id);


                } else {
                    if (date.format('HH:mm') == '00:00') {
                        //     location.href = 'index.php?action=nuovoAppuntamento&data=' + date.format('DD/MM/YYYY');
                    } else {
                        //     location.href = 'index.php?action=nuovoAppuntamento&data=' + date.format('DD/MM/YYYY') + '&ore=' + date.format('HH:mm');
                    }

                }



            }
        });





    });


    //Add new Event


    $(document).on('click', '#addEvent', function () {
        var eventName = $('#titoloAppuntamento').val();
        var eventClient = $('#idCliente').val();
        var idPiano = $('#idPiano').val();
        var dati = $("#formNewEvent").serialize();

        //var tagColor = $('.event-tag > span.selected').attr('data-tag');
        alert(dati);
        //if (eventName != '') {
        if (eventClient != '') {

            $.ajax({
                type: "POST",
                url: "index.php?action=salvaAppuntamentoM",
                data: dati,
//                data: {
//                    id: $(this).val(), // < note use of 'this' here
//                    access_token: $("#access_token").val()
//                },
                success: function (result) {
                    alert(result);
                    //alert('ok Registato');
                },
                error: function (result) {
                    alert('errore non registrato');
                }
            });

            $('#calendar').fullCalendar('removeEvents');
            $('#calendar').fullCalendar('refetchEvents');


            //Render Event
            /*
             $('#calendar').fullCalendar('renderEvent', {
             title: eventName,
             start: $('#getStart').val(),
             end: $('#getEnd').val(),
             allDay: true,
             //className: tagColor
             
             }, true); //Stick the event
             */
            $('#addNew-event form')[0].reset();
            $('#addNew-event').modal('hide');
        } else {
            $('#eventName').closest('.form-group').addClass('has-error');
        }
    });

    $(document).on('click', '#addAppuntamento', function () {
        $('#addNew-event form')[0].reset();
        $('#addNew-event').modal('show');
    });



    $(document).on('click', '#addPaziente', function () {
        //var eventName = $('#titoloAppuntamento').val();
        //var eventClient = $('#idCliente').val();
        var dati = $("#formNewPaziente").serialize();

        //var tagColor = $('.event-tag > span.selected').attr('data-tag');
        // alert(dati);
        //if (eventName != '') {
        if (dati != '') {

            $.ajax({
                type: "POST",
                url: "index.php?action=salvaClienteM",
                data: dati,
//                data: {
//                    id: $(this).val(), // < note use of 'this' here
//                    access_token: $("#access_token").val()
//                },
                success: function (result) {
                    alert('ok Registato Cliente');
                },
                error: function (result) {
                    alert('errore non registrato');
                }
            });

//$('#calendar').fullCalendar('removeEvents');



            //Render Event
            /*
             $('#calendar').fullCalendar('renderEvent', {
             title: eventName,
             start: $('#getStart').val(),
             end: $('#getEnd').val(),
             allDay: true,
             //className: tagColor
             
             }, true); //Stick the event
             */
            $('#addNew-paziente form')[0].reset();
            $('#addNew-paziente').modal('hide');
        } else {
            // $('#eventName').closest('.form-group').addClass('has-error');
        }
    });


    $(document).on('click', '#btnAddPaziente', function () {
        //$('#addNew-event form')[0].reset();
        $('#addNew-paziente').modal('show');
    });






</script>

<!--<script>
    

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
                
      },
      defaultDate: '<?php //echo date("Y-m-d");        ?>',
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
                    <a href="index.php?action=stampeAppuntamenti" class="btn btn-green" >Stampe</a>&nbsp;
                    <a href="#" class="btn btn-green" id="addAppuntamento" >Nuovo Appuntamento</a>
                </div>
            </div>




            <div id='calendar'></div>





        </div>
    </div>
    <div style="clear:left;">&nbsp;</div>


    <!-- Add event -->
    <div class="modal fade" id="addNew-event" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="padding: 30px 10px;">
                    <h4 class="modal-title" style="width: 85%; float: left; padding: 0px 10px;">Nuovo Appuntamento</h4> <div style="float: right;  padding: 0px 10px; "><button type="button" class="btn btn-link" data-dismiss="modal"><img src="applicazione/img/icone/delete.png" style="width: 15px;"></button></div>
                </div>
                <div class="modal-body">
                    <form id="formNewEvent" class="addEvent" role="form">
                        <input type="hidden" name="nNuoviTrattamenti" id="nNuoviTrattamenti" value="0">
                        <div class="form-row">
                            <!--                            <div class="form-group">
                                                            <label for="titoloAppuntamento">Titolo</label>
                                                            <input type="text" class="form-control" id="titoloAppuntamento" name="titoloAppunamento" placeholder="Eventuale Titolo dell'appuntamento">
                                                        </div>-->
                            <div class="form-group">
                                <label for="cliente">Cliente</label>
                                <div class="col-11-12">
                                    <input type="text" id="cliente" name="cliente" class="input-sm form-control" id="eventName" placeholder="Nome e Cognome del Cliente">
                                    <input type="hidden" id="idCliente" name="idCliente">
                                </div>
                                <div class="col-1-12">
                                    <a href="#" id="btnAddPaziente">
                                        <img src="applicazione/img/icone/aggiungi.png" style="width: 15px;">
                                    </a>
                                </div>




                            </div>
                            <div class="clear">&nbsp;</div>
                            <div id="listaPianiInCorso"></div>

                            <div class="clear">&nbsp;</div>
                            <div class="form-group col-6-12">
                                <label for="dataAppuntamento">Data</label>
                                <input type="text" class="form-control" id="dataAppuntamento" name="dataAppuntamento" placeholder="dd/mm/aaaa">
                            </div>
                            <div class="form-group col-6-12">
                                <label for="oraInizioAppuntamento">Ora Inizio</label>
                                <input type="text" class="form-control timepicker" name="oraInizioAppuntamento" id="oraInizioAppuntamento" placeholder="hh:mm">
                            </div>
                            <div class="clear">&nbsp;</div>

                        </div>   

                        <div class="form-group">
                            <label for="trattamentiAppuntamento">1° Trattamento</label>
                            <div class="col-11-12">
                                <select name="selTrattamento_0" id="trattamentiAppuntamento" style="width: 100%">
                                    <option>-- Seleziona --</option>
                                    <?php
                                    $trattamentiAll = DAOFactory::getTrattamentiDAO()->queryAllOrderBy("trattamento");
                                    for ($kk = 0; $kk < count($trattamentiAll); $kk++) {

                                        $trattamento = $trattamentiAll[$kk];
                                        ?>
                                        <option value="<?php echo $trattamento->id; ?>"><?php echo $trattamento->trattamento; ?></option>
<?php } ?>
                                </select>
                            </div>
                            <div class="col-1-12">
                                <a href="#" onclick="javascript: associaTrattamento()" id="btnAddtrattamenti">
                                    <img src="applicazione/img/icone/aggiungi.png" style="width: 15px;">
                                </a>
                            </div>




                        </div>







                        <div class="form-row">
                            <div class="form-group col-5-12">
                                <label for="operatoreAppuntamento">Operatore</label>
                                <div class="fg-line">
                                    <select name="selDipendente_0" id="operatoreAppuntamento">
                                        <option>-- Seleziona --</option>
                                        <?php
                                        $operatoriAll = DAOFactory::getDipendenteDAO()->queryAll();
                                        for ($kk = 0; $kk < count($operatoriAll); $kk++) {

                                            $operatore = $operatoriAll[$kk];
                                            ?>
                                            <option value="<?php echo $operatore->id; ?>"><?php echo $operatore->nome . " " . $operatore->cognome; ?></option>
<?php } ?>
                                    </select>
                                    <!--<input type="text" class="input-sm form-control" id="eventName" placeholder="eg: Sports day">-->

                                </div>

                            </div>
                            <div class="form-group col-5-12">
                                <label for="postazioneAppuntamento">Postazione</label>
                                <div class="fg-line">
                                    <select name="selPostazione_0" id="postazioneAppuntamento">
                                        <option>-- Seleziona --</option>
                                        <?php
                                        $postazioniAll = DAOFactory::getPostazioniDAO()->queryAll();
                                        for ($kk = 0; $kk < count($postazioniAll); $kk++) {

                                            $postazione = $postazioniAll[$kk];
                                            ?>
                                            <option value="<?php echo $postazione->id; ?>"><?php echo $postazione->postazione; ?></option>
<?php } ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group col-2-12">
                                <label>&nbsp;</label>
                                <div class="fg-line">
                                    <a href="javascript: verificaDisponibilita();"><img src="img/icone/view.png" width="25"></a>
                                    <!--<p style="border-bottom: 1px dotted #333;">&nbsp;</p>-->
                                </div>
                            </div>
                        </div>
                        <div id="listaTrattamenti">

                        </div> 


                        <!--                        <div class="form-group">
                                                   
                                                    <div class="fg-line">
                                                        <div class="col-3-12">
                                                             <label for="seduteAppuntamento">Numero Sedute</label>
                                                            <input name="ripetizione" id="ripetizione" type="number" value="1" min="1" style="width: 60%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204); min-width: 30px;">
                                                        </div>
                        
                                                        <div class="col-4-12">
                                                            <label for="giorniRipetizione">Ripetizioni</label>
                                                            <select  style="width: 65%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" required="" onchange="setGiorniRipetizione(this.selectedIndex)" name="giorniRipetizione" id="giorniRipetizione">
                                                                <option value="g">giorno</option>
                                                                <option value="s">settimana</option>
                                                                <option value="m">mese</option>
                                                                <option value="a">anno</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-5-12">
                                                            <div id="divSelezioneGiorno" style="display: none">Seleziona il giorno<br>
                                                                <input type="checkbox">&nbsp;L&nbsp;&nbsp;<input type="checkbox">&nbsp;M&nbsp;&nbsp;<input type="checkbox">&nbsp;M&nbsp;&nbsp;<input type="checkbox">&nbsp;G&nbsp;&nbsp;<input type="checkbox">&nbsp;V
                                                            </div>
                                                        </div>
                                                    </div>
                        
                                                </div>-->
                        <div style="clear: left;">&nbsp;<br></div>
                        <!--                        <div class="form-group">
                                                    <label for="presenzaAppuntamento">Presenza</label> 
                                                    <div class="fg-line">
                                                        <input class="form-check-input" type="radio" name="presenzaAppuntamento" id="presenzaAppuntamento" value="si">
                                                        <label class="form-check-label" for="inlineRadio1">si</label>&nbsp;&nbsp;
                        
                                                        <input class="form-check-input" type="radio" name="presenzaAppuntamento" id="presenzaAppuntamento" value="no">
                                                        <label class="form-check-label" for="inlineRadio2">no</label>
                                                    </div>
                                                </div>    -->

                        <!--                                        <div class="form-group">
                                                                    <label for="eventName">Tag Color</label>
                                                                    <div class="event-tag">
                                                                        <span data-tag="bgm-teal" class="bgm-teal selected"></span>
                                                                        <span data-tag="bgm-red" class="bgm-red"></span>
                                                                        <span data-tag="bgm-pink" class="bgm-pink"></span>
                                                                        <span data-tag="bgm-blue" class="bgm-blue"></span>
                                                                        <span data-tag="bgm-lime" class="bgm-lime"></span>
                                                                        <span data-tag="bgm-green" class="bgm-green"></span>
                                                                        <span data-tag="bgm-cyan" class="bgm-cyan"></span>
                                                                        <span data-tag="bgm-orange" class="bgm-orange"></span>
                                                                        <span data-tag="bgm-purple" class="bgm-purple"></span>
                                                                        <span data-tag="bgm-gray" class="bgm-gray"></span>
                                                                        <span data-tag="bgm-black" class="bgm-black"></span>
                                                                    </div>
                                                                </div>-->

                        <input type="hidden" id="getStart" />
                        <input type="hidden" id="getEnd" />
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-link" id="addEvent" style="color: #428bca !important;">Salva Appuntamento</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal" style="color: #428bca !important;">Chiudi</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Add Paziente -->
    <div class="modal fade" id="addNew-paziente" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="padding: 30px 10px;">
                    <h4 class="modal-title" style="width: 85%; float: left; padding: 0px 10px;">Nuovo Cliente</h4> <div style="float: right;  padding: 0px 10px; "><button type="button" class="btn btn-link" data-dismiss="modal"><img src="applicazione/img/icone/delete.png" style="width: 15px;"></button></div>
                </div>
                <div class="modal-body">
                    <form id="formNewPaziente" class="addPaziente" role="form">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nomePaziente">(*) Nome</label>
                                <input type="text" class="form-control" id="nomePaziente" name="nomePaziente" placeholder="Nome del Cliente" required="">
                            </div>
                            <div class="form-group">
                                <label for="cognomePaziente">(*) Cognome</label>

                                <input type="text" id="cognomePaziente" name="cognomePaziente" class="input-sm form-control" placeholder="Cognome del Cliente" required="">



                            </div>

                            <div class="form-group col-6-12">
                                <label for="cellularePaziente">(*) Cellulare</label>
                                <input type="text" class="form-control" id="cellularePaziente" name="cellularePaziente" placeholder="cellulare" required="">
                            </div>
                            <div class="form-group col-6-12">
                                <label for="emailPaziente">Email</label>
                                <input type="text" class="form-control" name="emailPaziente" id="emailPaziente" placeholder="email">
                            </div>
                            <div class="clear">&nbsp;</div>

                        </div>                     


                        <!--
                                                <div class="form-row">
                                                    <div class="form-group col-6-12">
                                                        <label for="operatoreAppuntamento">Operatore</label>
                                                        <div class="fg-line">
                                                            <select name="operatoreAppuntamento" id="operatoreAppuntamento">
                                                                <option>-- Seleziona --</option>
                                                               
                                                            </select>
                                                            <input type="text" class="input-sm form-control" id="eventName" placeholder="eg: Sports day">
                        
                                                        </div>
                        
                                                    </div>
                                                    <div class="form-group col-6-12">
                                                        <label for="postazioneAppuntamento">Postazione</label>
                                                        <div class="fg-line">
                                                            <select name="postazioneAppuntamento" id="postazioneAppuntamento">
                                                                <option>-- Seleziona --</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                        
                                                </div>
                        
                        
                        
                                                <div class="form-group">
                                                    <label for="trattamentiAppuntamento">Trattamenti</label>
                                                    <div class="fg-line">
                                                        <select class="js-example-basic-multiple" name="trattamentiAppuntamento[]" id="trattamentiAppuntamento" multiple="multiple" style="width: 100%">
                                                           
                                                        </select>
                                                        <input type="text" class="input-sm form-control" id="eventName" trattamentiAppuntamento="eg: Sports day">
                        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                   
                                                    <div class="fg-line">
                                                        <div class="col-3-12">
                                                             <label for="seduteAppuntamento">Numero Sedute</label>
                                                            <input name="ripetizione" id="ripetizione" type="number" value="1" min="1" style="width: 60%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204); min-width: 30px;">
                                                        </div>
                        
                                                        <div class="col-4-12">
                                                            <label for="giorniRipetizione">Ripetizioni</label>
                                                            <select  style="width: 65%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" required="" onchange="setGiorniRipetizione(this.selectedIndex)" name="giorniRipetizione" id="giorniRipetizione">
                                                                <option value="g">giorno</option>
                                                                <option value="s">settimana</option>
                                                                <option value="m">mese</option>
                                                                <option value="a">anno</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-5-12">
                                                            <div id="divSelezioneGiorno" style="display: none">Seleziona il giorno<br>
                                                                <input type="checkbox">&nbsp;L&nbsp;&nbsp;<input type="checkbox">&nbsp;M&nbsp;&nbsp;<input type="checkbox">&nbsp;M&nbsp;&nbsp;<input type="checkbox">&nbsp;G&nbsp;&nbsp;<input type="checkbox">&nbsp;V
                                                            </div>
                                                        </div>
                                                    </div>
                        
                                                </div>
                                                <div style="clear: left;">&nbsp;<br></div>
                                                <div class="form-group">
                                                    <label for="presenzaAppuntamento">Presenza</label> 
                                                    <div class="fg-line">
                                                        <input class="form-check-input" type="radio" name="presenzaAppuntamento" id="presenzaAppuntamento" value="si">
                                                        <label class="form-check-label" for="inlineRadio1">si</label>&nbsp;&nbsp;
                        
                                                        <input class="form-check-input" type="radio" name="presenzaAppuntamento" id="presenzaAppuntamento" value="no">
                                                        <label class="form-check-label" for="inlineRadio2">no</label>
                                                    </div>
                                                </div>    -->

                        <!--                                        <div class="form-group">
                                                                    <label for="eventName">Tag Color</label>
                                                                    <div class="event-tag">
                                                                        <span data-tag="bgm-teal" class="bgm-teal selected"></span>
                                                                        <span data-tag="bgm-red" class="bgm-red"></span>
                                                                        <span data-tag="bgm-pink" class="bgm-pink"></span>
                                                                        <span data-tag="bgm-blue" class="bgm-blue"></span>
                                                                        <span data-tag="bgm-lime" class="bgm-lime"></span>
                                                                        <span data-tag="bgm-green" class="bgm-green"></span>
                                                                        <span data-tag="bgm-cyan" class="bgm-cyan"></span>
                                                                        <span data-tag="bgm-orange" class="bgm-orange"></span>
                                                                        <span data-tag="bgm-purple" class="bgm-purple"></span>
                                                                        <span data-tag="bgm-gray" class="bgm-gray"></span>
                                                                        <span data-tag="bgm-black" class="bgm-black"></span>
                                                                    </div>
                                                                </div>-->

                        <input type="hidden" id="getStart" />
                        <input type="hidden" id="getEnd" />
                    </form>
                </div>

                <div class="modal-footer">
                    <p>(*) Campi obbligatori </p>
                    <button type="submit" class="btn btn-link" id="addPaziente" style="color: #428bca !important;">Salva Cliente</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal" style="color: #428bca !important;">Chiudi</button>
                </div>
            </div>
        </div>
    </div>




    <script type="text/javascript">

        //    $( function() {


        $(document).ready(function () {

            var userLang = navigator.language || navigator.userLanguage;

            var options = $.extend({},
                    $.datepicker.regional["it"], {
                currentText: 'Oggi',
                monthNames: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
                monthNamesShort: ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'],
                dayNames: ['Domenica', 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mer', 'Gio', 'Ven', 'Sab'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Me', 'Gio', 'Ve', 'Sa'],
                dateFormat: "dd/mm/yy",
                changeMonth: true,
                changeYear: true,
                highlightWeek: true
            }
            );

            $("#dataAppuntamento").datepicker(options);
        });

        $('.timepicker').timepicker({
            timeFormat: 'HH:mm',
            interval: 5,
            minTime: '9:00',
            maxTime: '20:00',
            startTime: '9:00',
            //maxHour: '20',
            //maxMinutes: '30',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });



        $(function () {

            $("#cliente").autocomplete({

                source: "index.php?action=searchCliente",
                minLength: 3,
                select: function (event, ui) {
                    document.getElementById('idCliente').value = '';

                    var idClienteTMP = ui.item.id;
                    //alert(idClienteTMP);


                    $("#idCliente").val(ui.item.id);

                    $.ajax({
                        url: 'index.php?action=caricaPianoCuraInCorso',
                        method: 'POST',
                        data: {idCliente: ui.item.id},
                        success: function (data) {
                            $('#listaPianiInCorso').html(data);

                        }

                    });





                }
            });

        });



        function nuovoCliente() {

            $('#nuovoCliente').css('display', 'block');
            $('#listaPianiInCorso').css('display', 'block');
            $("#cliente").val('');

            $("#idCliente").val('');

            $("#nomeCliente").prop("disabled", false);
            $("#nomeCliente").val('');
            $("#cognomeCliente").prop("disabled", false);
            $("#cognomeCliente").val('');
            $("#telefonoCliente").prop("disabled", false);
            $("#telefonoCliente").val('');
            $("#emailCliente").prop("disabled", false);
            $("#emailCliente").val('');

        }
//
//        $('.js-example-basic-multiple').select2({
//            placeholder: "Seleziona il Trattamento da effettuare",
//            allowClear: true
//        });


    </script>      

    <script type="text/javascript">
        var indiceTratt = 0;
        var trattamentiTMP = new Array();
        var trattamentiTMP11 = new Array();
        var trattamentiAss = new Array();
        var OptionSelect = '<option>-- Seleziona --</option>';
        var OptionSelectDip = '<option>-- Seleziona --</option>';
        var OptionSelectPos = '<option>-- Seleziona --</option>';

//        OptionSelect='<option>-- Seleziona --</option>'
//        OptionSelect='<option>-- Seleziona --</option>'
//        OptionSelect='<option>-- Seleziona --</option>'




        $.ajax({
            url: "index.php?action=caricaInfoDipendenti",
            dataType: "json",
            data: {},
            success: function (data) {


                for (var i = 0; i < data["dipendenti"].length; i++) {
                    OptionSelectDip += '<option value="' + data["dipendenti"][i]["id"] + '">' + data["dipendenti"][i]["nome"] + ' ' + data["dipendenti"][i]["cognome"] + '</option>';

                }

            },
        });

        $.ajax({
            url: "index.php?action=caricaInfoPostazioni",
            dataType: "json",
            data: {},
            success: function (data) {


                for (var i = 0; i < data["postazioni"].length; i++) {
                    OptionSelectPos += '<option value="' + data["postazioni"][i]["id"] + '">' + data["postazioni"][i]["postazione"] + '</option>';

                }

            },
        });


        $.ajax({
            url: "index.php?action=caricaInfoTrattamento",
            dataType: "json",
            data: {},
            success: function (data) {


                for (var i = 0; i < data["trattamenti"].length; i++) {
                    OptionSelect += '<option value="' + data["trattamenti"][i]["id"] + '">' + data["trattamenti"][i]["trattamento"] + '</option>';
                    trattamentiTMP[i] = {id: "" + data["trattamenti"][i]["id"] + "", label: "" + data["trattamenti"][i]["trattamento"] + ""};

                    trattamentiTMP11[data["trattamenti"][i]["id"]] = data["trattamenti"][i]["trattamento"];
                }

            },
        });




        //function associaTrattamento(id, riga) {
        function associaTrattamento() {
            //alert(id);
//        alert(testo);
//        alert(trattamentiTMP11[id]);
//            alert(riga);
//            var dati1xyy = $('#nSedute' + riga).val();
//            alert(dati1xyy);
            indiceTratt++;
            var rigaTrattamento = '';
            rigaTrattamento += '<div id="rigaTrattamento_' + indiceTratt + '">';
            rigaTrattamento += '<div class="form-row">';
            rigaTrattamento += '<div class="form-group">';
            rigaTrattamento += '<label for="trattamentiAppuntamento"><span id="labTrattamento_' + indiceTratt + '">' + (indiceTratt + 1) + '</span>° Trattamento</label>';
            rigaTrattamento += '<div class="col-11-12"><select id="selTrattamento_' + indiceTratt + '" name="selTrattamento_' + indiceTratt + '" style="width: 100%">' + OptionSelect + '</select>';
            rigaTrattamento += '</div>';
            rigaTrattamento += '<div class="col-1-12"><img src="img/icone/delete.png" height="20" id="eliminaTrattamento_' + indiceTratt + '" onclick="eliminaTrattamento(' + indiceTratt + ')"/>';
            rigaTrattamento += '</div>';
            rigaTrattamento += '</div>';
            rigaTrattamento += '<div class="clear">&nbsp;</div>';

            //rigaTrattamento += '<div style="display: table-cell; width: 130px;">Trattamento: ';
            //rigaTrattamento += '</div>';
            //rigaTrattamento += '<div style="display: table-cell; width: 130px;"><input id="trattamento' + indiceTratt + '" name="trattamento' + indiceTratt + '" value="' + trattamentiTMP11[id] + '" type="text">';
            // rigaTrattamento += '<div style="display: table-cell; width: 330px;">' + trattamentiTMP11[id];
            //rigaTrattamento += '<div style="display: table-cell; width: 330px;">' + indiceTratt; //ERRATOXXXX
            //rigaTrattamento += '</div>';
            //------
            // rigaTrattamento += '<div style="display: table-cell; width: 130px;"><input id="data' + indiceTratt + '" name="data' + indiceTratt + '" placeholder="data appuntamento" type="text">';
            // rigaTrattamento += '</div>';
            //  rigaTrattamento += '<div style="display: table-cell; width: 130px;"><input id="oraInizio' + indiceTratt + '" name="OraInizio' + indiceTratt + '" placeholder="Ora Inizio" type="text">';
            //  rigaTrattamento += '</div>';
            rigaTrattamento += '<div class="form-group col-6-12"><label for="selDipendente_' + indiceTratt + '">Operatore</label><br>';
            rigaTrattamento += '<select id="selDipendente_' + indiceTratt + '" name="selDipendente_' + indiceTratt + '">' + OptionSelectDip + '</select>';
            rigaTrattamento += '</div><div class="form-group col-6-12"><label for="selPostazione_' + indiceTratt + '">Postazione</label><br>';
            rigaTrattamento += '<select id="selPostazione_' + indiceTratt + '" name="selPostazione_' + indiceTratt + '">' + OptionSelectPos + '</select>';
            rigaTrattamento += '</div>';
            rigaTrattamento += '<p style="border-bottom: 1px dotted #333;">&nbsp;</p></div>';
            // rigaTrattamento += '<div style="display: table-cell; width: 130px;"><input id="operatore' + indiceTratt + '" name="operatore' + indiceTratt + '" placeholder="operatore" type="text">';
            // rigaTrattamento += '</div>';
            // rigaTrattamento += '<div style="display: table-cell; width: 130px;"><input id="postazione' + indiceTratt + '" name="postazione' + indiceTratt + '" placeholder="postazione" type="text">';
            // rigaTrattamento += '</div>';
            //------
            // rigaTrattamento += '<div style="display: table-cell; width: 130px;"><input id="idTrattamento' + indiceTratt + '" name="idTrattamento' + indiceTratt + '" value="' + id + '" type="hidden">';
            // rigaTrattamento += '<div style="display: table-cell; width: 130px;"><input id="idTrattamento' + indiceTratt + '" name="idTrattamento' + indiceTratt + '" value="' + indiceTratt + '" type="hidden">';  //ERRATO
            //     rigaTrattamento += '</div>';

            rigaTrattamento += '</div>';
            rigaTrattamento += '</div>';

            $('#nNuoviTrattamenti').val(indiceTratt);

            $('#listaTrattamenti').append(rigaTrattamento);

            /*
             $('#trattamento'+indiceTratt).autocomplete({
             source: trattamentiTMP,
             select: function(event, ui) {
             // document.getElementById('idTrattamento'+indiceTratt).value = '';
             
             $('#idTrattamento'+indiceTratt).val(ui.item.id);
             
             }
             
             });
             
             */

            //alert("fine");

        }
        function eliminaTrattamento(indiceRiga) {

            $('#rigaTrattamento_' + indiceRiga).remove();
            for (var k = indiceRiga + 1; k <= indiceTratt; k++) {
                $('#rigaTrattamento_' + k).attr("id", "rigaTrattamento_" + (k - 1));
                $('#labTrattamento_' + k).html('<span id="labTrattamento_' + (k - 1) + '">' + k + '</span>');
                $('#labTrattamento_' + k).attr("id", "labTrattamento_" + (k - 1));
                $('#selTrattamento_' + k).attr("name", "selTrattamento_" + (k - 1));
                $('#selTrattamento_' + k).attr("id", "selTrattamento_" + (k - 1));
                $('#selDipendente_' + k).attr("name", "selDipendente_" + (k - 1));
                $('#selDipendente_' + k).attr("id", "selDipendente_" + (k - 1));
                $('#selPostazione_' + k).attr("name", "selPostazione_" + (k - 1));
                $('#selPostazione_' + k).attr("id", "selPostazione_" + (k - 1));
                $('#eliminaTrattamento_' + k).attr("onclick", "eliminaTrattamento(" + (k - 1) + ")");
                $('#eliminaTrattamento_' + k).attr("id", "eliminaTrattamento_" + (k - 1));
            }
            indiceTratt--;
            $('#nNuoviTrattamenti').val(indiceTratt);
        }





//VERIFICA PRESENZA APPUNTAMENTO
        function verificaDisponibilita() {
            //$("#delibera_del").change(function() { da verificare
            //alert("sssss"); 
            // assegno alla variabile dati, il contenuto del campo di input #testo
            // dal momento che questa funzione viene richiamata ogni volta che
            // scriviamo dentro il campo input, questo contenuto si aggiorna sempre


            var dati2 = $('#operatoreAppuntamento').val();
            var dati3 = $('#dataAppuntamento').val();
            // la semplicità con cui jquery tratta con ajax è imbarazzante
            // per non parlare dei problemi di compatibilità tra browser di cui
            // se ne occupa totalmente

            var data_send = "dato1=" + dati1 + "&dato2=" + dati2 + "&dato3=" + dati3;

            $.ajax({
                type: "POST",
                url: "index.php?action=infoVerificaAppuntamento",
                data: data_send,
                success: function (data) {
                    $('#verificaApp').html(data);
                }
            });
        }

        function setGiorniRipetizione(idSelezionato) {
            //alert("www");
            //alert(aaa);
            //alert(posizione)
            //var giornoSel =$('#giorniRipetizione_'+posizione).val();
            //alert(giornoSel);
            if (idSelezionato == '1') {
                //  alert("QUI");
                document.getElementById("divSelezioneGiorno").style.display = "block";
            } else {
                //alert("no");
                document.getElementById("divSelezioneGiorno").style.display = "none";
            }

        }

        function prenotazioneAggiungiTrattamento(id, riga) {
            //alert("ciao..."+id+'...'+riga);
            //$("#delibera_del").change(function() { da verificare
            //alert("sssss"); 
            // assegno alla variabile dati, il contenuto del campo di input #testo
            // dal momento che questa funzione viene richiamata ogni volta che
            // scriviamo dentro il campo input, questo contenuto si aggiorna sempre


            // var dati2 = $('#operatoreAppuntamento').val();
            // var dati3 = $('#dataAppuntamento').val();
            // la semplicità con cui jquery tratta con ajax è imbarazzante
            // per non parlare dei problemi di compatibilità tra browser di cui
            // se ne occupa totalmente
            var seduteN = $('#nSedute' + riga).val();
            var idTrattamentoAss = $('#idTrattamentoAss' + riga).val();
            var dataAppuntamento = $('#dataAppuntamento' + riga).val();
            var OraInizioAppuntamento = $('#OraInizioAppuntamento' + riga).val();
            var ripetizione = $('#ripetizione' + riga).val();
            var giorniRipetizione = $('#giorniRipetizione' + riga).val();
            var postazioneAppuntamento = $('#postazioneAppuntamento' + riga).val();
            var operatoreAppuntamento = $('#operatoreAppuntamento' + riga).val();



            var data_send = "dato1=" + seduteN + "&dato2=" + idTrattamentoAss + "&dato3=" + dataAppuntamento + "&dato4=" + OraInizioAppuntamento + "&dato5=" + ripetizione + "&dato6=" + giorniRipetizione + "&dato7=" + postazioneAppuntamento + "&dato8=" + operatoreAppuntamento;

            $.ajax({
                type: "POST",
                url: "index.php?action=associaTrattamentoPrenotazione",
                data: data_send,
                success: function (data) {
                    $('#listaTrattamenti').html(data);
                }
            });

        }

    </script>

