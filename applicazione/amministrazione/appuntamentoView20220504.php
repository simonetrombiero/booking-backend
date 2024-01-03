<?php
global $appuntamento;

//print_r($appuntamento);
$pianoTrattamento = DAOFactory::getPianoTrattamentoDAO()->load($appuntamento->trattamentoID); 

$cliente = DAOFactory::getClientiDAO()->load($pianoTrattamento->idPaziente);

$oggi = date("Y-m-d");

?>
<!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
-->

<!--  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<!--  <script type="text/javascript" src="applicazione/js/jquery-ui_completo.js"></script>
 <link rel="stylesheet" href="applicazione/css/jquery-ui_completo.css" media="all">-->

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">
<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js"></script>-->

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->



            <div>
                <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
<?php if (!isset($appuntamento)) {
    echo "Nuovo Appuntamento";
} else {
    echo "Scheda Appuntamento: ".$cliente->nome . " " . $cliente->cognome;; 
} ?></h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        
                        <a href="index.php?action=agenda" class="btn btn-green" ><< Agenda</a>
                   
                        <?php if($appuntamento->status==1) {?>
<!--                        <a href="#" onclick="document.getElementById('formAppuntamento').action.value = 'cassa'; document.getElementById('formAppuntamento').submit();" class="btn btn-blue" >Vai Alla CASSA</a>-->
                        <?php } ?>
                        <a href="#" onclick="document.getElementById('formAppuntamento').action.value = 'modificaPiano'; document.getElementById('formAppuntamento').submit();" class="btn btn-green" >Modifica Appuntamento</a>
<!--                        &nbsp;<a href="#" onclick="document.getElementById('formAppuntamento').action.value = 'eliminaAppuntamento'; document.getElementById('formAppuntamento').submit();" class="btn btn-green" >Modifica</a>-->
                    </div>
                </div></div>
            <div>
                <form action="index.php" method="post" id="formAppuntamento" name="formAppuntamento">
                    <input type="hidden" name="action"/>
                    <input type="hidden" name="id" value="<?php if (isset($appuntamento)) {
    echo $appuntamento->id;
} ?>"/>
                    <input type="hidden" name="idPiano" value="<?php if (isset($appuntamento)) {
    echo $pianoTrattamento->id;
} ?>"/>


                    <table style="margin-left:auto; margin-right:auto;">
                        <?php if($appuntamento->data<=$oggi){ ?>
                        <tr><td colspan="3">&nbsp;</tr>
                        <tr>
                           <tr>
                               <td style="width: 10%;">&nbsp; </td>
                            <td>&nbsp;</td>
                            <td style="text-align: right; font-weight: bold;">PRESENZA&nbsp;&nbsp;
                                <select name="presenza" onchange="setPresenza(this.value)">
                                    <option value="0"  <?php if ($appuntamento->noShow!=1){ ?> selected="" <?php } ?>>SI</option>
                                    <option value="1" <?php if ($appuntamento->noShow==1){ ?> selected="" <?php } ?>>NO</option>
                                </select>
 


                            </td>
                        </tr>
                        <tr><td colspan="3" style="border-top: 1px dotted gray;">&nbsp;</tr>
                        <?php } ?>
                        <tr>
                            <td style="width: 10%;"> </td>
                            <td>&nbsp;</td>
                            <td align="right">
<?php

//$cliente = DAOFactory::getClientiDAO()->load($appuntamento->idCliente);
//echo $cliente->nome . " " . $cliente->cognome;
?>

                               

                            </td>
                        </tr>
                        <tr>
                            <td>Trattamento</td>
                            <td>&nbsp;</td>
                            <td><?php echo $appuntamento->trattamento; ?></td>
                        </tr>
                        <tr>
                            <td>Data</td>
                            <td>&nbsp;</td>
                            <td><?php if (isset($appuntamento->data)) {
    echo dateFromDb($appuntamento->data);
} ?></td>
                        </tr>
                        <tr>
                            <td>Ora Inizio</td>
                            <td>&nbsp;</td>
                            <td><?php if (isset($appuntamento)) {
    echo substr($appuntamento->oraInizio, 0, 5);
} ?></td>
                        </tr>
                        <tr>
                            <td>Ora Fine</td>
                            <td>&nbsp;</td>
                            <td><?php if (isset($appuntamento)) {
    echo substr($appuntamento->oreFine, 0, 5);
} ?></td>
                        </tr>
                        <tr>
                            <td>Postazione</td>
                            <td>&nbsp;</td>

                            <td>
<?php
//$calendario = DAOFactory::getCalendariDAO()->load($appuntamento->idCalendario); 
$postazione = DAOFactory::getPostazioniDAO()->load($appuntamento->postazione);

echo $postazione->postazione;
?>



                            </td>
                        </tr>
                        <tr>
                            <td>Operatore</td>
                            <td>&nbsp;</td>

                            <td>
<?php

$operatore = DAOFactory::getDipendenteDAO()->load($appuntamento->operatore);

echo $operatore->nome." ".$operatore->cognome;
?>



                            </td>
                        </tr>
                        <tr><td colspan="3"><hr></td></tr>
                         <tr>
                            <td>STATUS</td>
                            <td>&nbsp;</td>

                            <td style="font-weight: bold;">
                                <?php 
                                
                                $statotmp = DAOFactory::getPrenotazioneStatusDAO()->load($appuntamento->status);
                                echo $statotmp->status;
                                
                                ?>

                            </td>
                        </tr>
                        <tr><td colspan="3"><hr></td></tr>
                        <tr>
                            <td colspan="3">Note:</td>
                        </tr>
                        <tr>
                            <td colspan="3">
<?php
echo $appuntamento->note;
;
?>



                            </td>
                        </tr>
                       <tr><td colspan="3"><hr></td></tr>
                         <tr>
                             <td style="font-weight: bold;" colspan="3">PIANO TRATTAMENTO DEL <?php echo dateFromDb($pianoTrattamento->data); ?></td>
                            
                        </tr>
<tr><td colspan="3"><hr></td></tr>
<!--              <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><input type="submit" class="btn btn-green" value="Salva"></td>
</tr>-->
                        
                        <tr>
                            <td colspan="3" style="height: 35px; width: 100%; background-color: #366c88; color: #FFF; border-bottom: 1px dotted #CCC; font-weight: bold;">&nbsp;LISTA SEDUTE ASSOCIATE AL PIANO</td>
                        </tr>
                        <?php
                        //$trattamenti = DAOFactory::getPrenotazioniTrattamentiDAO()->queryByIdPrenotazione($appuntamento->id);
                        $trattamenti = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryByTrattamentoID($appuntamento->trattamentoID);
                        for ($i = 0; $i < count($trattamenti); $i++) {
                            $trattamento = $trattamenti[$i];
                            $trattamentoBox = DAOFactory::getPostazioniDAO()->load($trattamento->postazione);
                            $trattamentoOperatore = DAOFactory::getDipendenteDAO()->load($trattamento->operatore);
                            ?>
                            <tr>
                                <td colspan="3" style="height: 30px; border-bottom: 1px dotted #CCC;">
                                    <div style="width: 90%; height: 30px; line-height: 30px; float: left;">&bull;&nbsp;<?php echo dateFromDb($trattamento->data). "&nbsp;&nbsp;ore ".substr($trattamento->oraInizio, 0,5)."&nbsp;&nbsp;&nbsp;&nbsp;". $trattamento->trattamento."&nbsp;&nbsp;&nbsp;&nbsp;".$trattamentoBox->postazione."&nbsp;&nbsp;&nbsp;&nbsp;".$trattamentoOperatore->nome." ".$trattamentoOperatore->cognome; 
                                    if($trattamento->data<$oggi){
                                        if($trattamento->noShow==1){
                                          echo "&nbsp;&nbsp;&nbsp;&nbsp;<span style='background: red; margin: 10px; color: white'>(ASSENTE)</span>";  
                                        } else {
                                            echo "&nbsp;&nbsp;&nbsp;&nbsp;<span style='background: green; margin: 10px; color: white'>(Presente)</span>";  
                                        }
                                         
                                    }
                                    ?>
                                        
                                        
                                    </div>
                                    <div style="width: 5%; height: 30px; line-height: 30px; float: right;">
                                    <a href="index.php?action=visualizzaAppuntamento&id=<?php echo $trattamento->id; ?>"><img src="img/icone/view.png" alt="Visualizza Appuntamento" title="Visualizza Appuntamento" style="width: 20px; padding: 2px"></a>
                                    </div>
                                </td>
                            </tr>
<?php } ?>

                    </table>        

                </form>


            </div>    





        </div>
    </div>
    <div style="clear:left;">&nbsp;</div>


    <script type="text/javascript">
        function setPresenza(str) {
            var app = <?php echo $appuntamento->id; ?>;
            //alert("qui"+app);
  if (str == "") {
    //document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","index.php?action=setPresenza&app="+app+"&q="+str,true);
    xmlhttp.send();
  }
}

        //    $( function() {
        //
        //$( "#dataAppuntamento" ).datepicker({
        //changeMonth: true,
        //changeYear: true,
        //yearRange: '1900:<?php //echo date("Y");  ?>',
        //closeText: 'Chiudi',
        //prevText: 'Prec',
        //nextText: 'Succ',
        //currentText: 'Oggi',
        //monthNames: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno', 'Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
        //monthNamesShort: ['Gen','Feb','Mar','Apr','Mag','Giu', 'Lug','Ago','Set','Ott','Nov','Dic'],
        //dayNames: ['Domenica','Lunedì','Martedì','Mercoledì','Giovedì','Venerdì','Sabato'],
        //dayNamesShort: ['Dom','Lun','Mar','Mer','Gio','Ven','Sab'],
        //dayNamesMin: ['Do','Lu','Ma','Me','Gio','Ve','Sa'],
        //dateFormat: 'dd/mm/yy',
        //firstDay: 1,
        //isRTL: false
        //});
        //
        //$.datepicker.setDefaults($.datepicker.regional['it']);
        //} );

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
            interval: 15,
            minTime: '7:00',
            maxTime: '22:00',
            startTime: '7:00',
            //maxHour: '20',
            //maxMinutes: '30',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
        
    </script>        