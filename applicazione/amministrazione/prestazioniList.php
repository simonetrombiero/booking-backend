<?php
global $listaPrestazioni;


//print_r($listaPrestazioni);
?>
<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->
            <link href="applicazione/css/jquery-calx/bootstrap.css" rel="stylesheet" type="text/css">

            <script src="applicazione/js/jquery-calx/bootstrap.js" type="text/javascript"></script>
            <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">
<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js"></script>-->

            <!--                <link rel="stylesheet" type="text/css" href="applicazione/css/dataTable/jquery.dataTables.css">
                            <script type="text/javascript" language="javascript" src="applicazione/js/dataTable/jquery.dataTables.min.js"></script>
                            <script type="text/javascript">
                                $(function() {
                                    $('#datatable').dataTable({
                                        "order": [[ 0, "asc" ]], //[0, "desc"]
                                        "lengthMenu": [[-1,10, 25, 50, 100], ["Tutti", 10, 25, 50, 100]],
                                        "language": {"url": "applicazione/js/dataTable/languages/dataTables_IT.txt"}
                                    });
                                });
                            </script>-->
            <link rel="stylesheet" type="text/css" href="vendors/dataTables/jquery.dataTables.css">
            <script type="text/javascript" language="javascript" src="vendors/dataTables/jquery.dataTables.min.js"></script>
            <script type="text/javascript">
                $(function () {
                    $('#datatable').dataTable({
                        "order": [[3, "asc"]], //[0, "desc"]
                        "lengthMenu": [[-1, 10, 25, 50, 100], ["Tutti", 10, 25, 50, 100]],
                        "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
                    });

                });

                $(document).on('click', '#btnPresenze', function (e) {
                    var piano = $(this).data("value");
                   //alert("quiiii :"+ $(this).data("value"));
                    //$('#addNew-event form')[0].reset();
                    $('#addPresenze').modal('show');
                    
                    $.ajax({
                    url: 'index.php?action=caricaInfoAppuntamentiM',
                    method: 'POST',
                    data: {piano: piano},
                    success: function (data) {
                        $('#divAppuntamentiPaziente').html(data);
                    }

                });
                });

            </script>





            <form action="index.php" id="gestionePrestazione" name="gestionePrestazione" method="post">
                <input type="hidden" id="action" name="action">
                <input type="hidden" id="idPiano" name="idPiano">
            </form> 

            <form action="index.php" id="gestioneClienti" name="gestioneClienti" method="post">
                <input type="hidden" id="action" name="action" value="visualizzaCliente">
                <input type="hidden" id="id" name="id">
            </form>    



            <!--<div class="grid grid-pad">-->
            <!--<div class="col-1-1">-->
            <div>
                <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        LISTA PRESTAZIONI IN CORSO</h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="index.php?action=prestazioniPazientiAll" class="btn btn-green" >Tutte le Prestazioni</a>
                    </div>
                </div></div>
            <!--</div>-->
            <!--</div>-->

            <!--<div class="grid grid-pad">-->
            <!--<div class="col-1-1">-->
            <div style="padding: 10px;">

                <table style="width: 100%" id="datatable">
                    <thead>
                        <tr>
                            <th align="left">Cliente</th>
                            <th align="left">Data</th>
                            <th align="left">Trattamento</th>
                            <th align="left">Trattamenti Eseguiti</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($listaPrestazioni); $i++) {
                            $prestazione = $listaPrestazioni[$i];
                            ?>
                            <tr>

                                <td style="border-bottom: 1px dotted #057fd0;">

                                    <?php
                                    if (!isBlankOrNull($prestazione->idPaziente)) {
                                        $paziente = DAOFactory::getClientiDAO()->load($prestazione->idPaziente);
                                        ?>
                                        <a href="#" onclick="document.getElementById('gestioneClienti').id.value = '<?php echo $paziente->id; ?>';
                                                document.getElementById('gestioneClienti').submit();">
                                               <?php
                                               echo $paziente->nome . " " . $paziente->cognome;
                                           }
                                           ?>
                                    </a>



                                </td>
                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <span style="display: none"><?php echo $prestazione->data; ?></span>
                                    <?php
                                    echo dateFromDb($prestazione->data);

//                                                                if(!isBlankOrNull($prestazione->nome)){
//                                                                    echo $prestazione->nome;
//                                                                } 
                                    ?>
                                </td>
                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <?php
                                    echo $prestazione->titolo
                                    ?>
                                </td>

                                <td style="border-bottom: 1px dotted #057fd0; width: 20%;">
                                    <?php
                                    $presenza = DAOFactory::getPrenotazioniDAO()->queryPresenza($prestazione->id);
                                    
                                    $assenza = DAOFactory::getPrenotazioniDAO()->queryAssenza($prestazione->id);
                                    //$totSedute = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryByTrattamentoID($prestazione->id);
                                   
                                    
                                    //qui per la presenta in modo automatica,  controllo se l'ora corrente è maggiore di 15 dell'ora dell'appuntamento  
                                    
                                    $totSedute = $prestazione->seduteNumero;

                                    $rps = count($presenza) / $totSedute;
                                    ?>




                                    <div style="background: red; color: #fff; width: 100%; height: 40px;">
                                        <div style="background: #008000; color: #fff; width: <?php echo round($rps * 100); ?>%; padding-left: 0px; height: 40px; line-height:40px">
                                            <div style="background: transparent; color: #fff; width: 100%; height: 40px; padding-left: 5px;">
                                                <span style="display: none"><?php
                                                if(count($presenza)>0){
                                                    echo $totSedute-count($presenza);
                                                }else{
                                                    $bas = 500;
                                                    echo $bas+$totSedute;
                                                }
                                                
                                                
                                                ?>
                                                </span>
    <?php //echo count($presenza) . "/" . $totSedute." (".round($rps*100) . "%)";  ?>
                                                <?php 
                                               
                                                if(count($assenza)>0){
                                                    echo count($presenza)+count($assenza)."(-".count($assenza).")"."/". $totSedute; 
                                                } else {
                                                    echo count($presenza) . "/" . $totSedute; 
                                                }
                                                
                                                ?>
                                                
                                            </div>
                                        </div>
                                    </div>                     


                                </td>
                                <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">

                                    <a href="#" onclick="document.getElementById('gestionePrestazione').idPiano.value = '<?php echo $prestazione->id; ?>';
                                            document.getElementById('gestionePrestazione').action.value = 'visualizzaPiano';
                                            document.getElementById('gestionePrestazione').submit();">
                                        <img src="img/icone/view.png" alt="Visualizza" title="Visualizza" style="width: 25px; padding: 2px"/></a>
                                    <!--<a href="#" id="btnPresenze" data-value="<?php //echo $prestazione->id; ?>">-->
                                        <!--<img src="applicazione/img/icone/check.png"  style="width: 30px; padding: 2px"/></a>-->
    <!--                                     <a href="#" onclick="document.getElementById('gestionePrestazione').id.value='<?php echo $prestazione->id; ?>'; document.getElementById('gestionePrestazione').action.value='eliminaIncarico'; document.getElementById('gestionePrestazione').submit();">
                                   
                                        <img src="applicazione/img/icone/delete.png" alt="Elimina" title="Elimina" style="width: 25px; padding: 2px"/></a>-->

                                </td>
                            </tr>
    <?php
}
?>
                    </tbody>
                </table>


                <!--FINE--->




            </div>
        </div>
        <div style="clear:left;">&nbsp;</div>



        <!-- Add Presenze -->
        <div class="modal fade" id="addPresenze" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="padding: 30px 10px;">
                        <h4 class="modal-title">Presenze Paziente</h4> 
                    </div>
                                 <div class="modal-body">
                                       <form id="formPresenza" class="addPresenze" role="form">
                                              <div class="form-row">
                                                <!--<div class="form-group">-->
                                                    <!--<label for="nomePaziente">Paziente</label>-->
                                                    <!--<input type="text" class="form-control" id="nomePaziente" name="nomePaziente" placeholder="Nome del Paziente" required="">-->
                                                <!--</div>-->
<!--                                                <div class="form-group">
                                                    <label for="cognomePaziente">(*) Cognome</label>
                                                   
                                                    <input type="text" id="cognomePaziente" name="cognomePaziente" class="input-sm form-control" placeholder="Cognome del Paziente" required="">
                                                       
                                                    
                                                   
                                                </div>-->
                                                
<!--                                                <div class="form-group col-6-12">
                                                    <label for="cellularePaziente">(*) Cellulare</label>
                                                    <input type="text" class="form-control" id="cellularePaziente" name="cellularePaziente" placeholder="cellulare" required="">
                                                </div>-->
<!--                                                <div class="form-group col-6-12">
                                                    <label for="emailPaziente">Email</label>
                                                    <input type="text" class="form-control" name="emailPaziente" id="emailPaziente" placeholder="email">
                                                </div>-->
                                                <!--<div class="clear">&nbsp;</div>-->
                                                
                                                <div id="divAppuntamentiPaziente"></div>
                                                
                                            </div>  
                                           
                    
                    
                    
                    <!--
                                            <input type="hidden" id="getStart" />
                                            <input type="hidden" id="getEnd" />-->
                                        </form>
                                    </div>

                    <div class="modal-footer">
                        
                        <button type="submit" class="btn btn-link" id="addPresenza">Salva Presenza</button>
                        <button type="button" class="btn btn-link" data-dismiss="modal">Chiudi</button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).on('click', '#addPresenza', function () {
        //var eventName = $('#titoloAppuntamento').val();
        //var eventClient = $('#idCliente').val();
        var dati = $("#formPresenza").serialize();

        //var tagColor = $('.event-tag > span.selected').attr('data-tag');
        //alert(dati);
        //if (eventName != '') {
        if (dati != '') {

            $.ajax({
                type: "POST",
                url: "index.php?action=setPresenzaM",
                data: dati,
//                data: {
//                    id: $(this).val(), // < note use of 'this' here
//                    access_token: $("#access_token").val()
//                },
                success: function (result) {
                    //alert('ok ');
                     location.reload(true);
                },
                error: function (result) {
                    alert('errore ');
                }
            });
            //alert("1");
//$('#calendar').fullCalendar('removeEvents');
           

            //alert("2");
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
           //$('#addNew-paziente form')[0].reset();
            $('#addPresenze').modal('hide');
        } else {
           // $('#eventName').closest('.form-group').addClass('has-error');
        }
    });
    </script>