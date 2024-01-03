<?php
global $appuntamento, $appuntamentoDettaglio;

//print_r($appuntamento); 
//exit;
//$prenotazione = DAOFactory::getPrenotazioniDAO()->load($appuntamento->idPiano); 
//echo "qui";
//print_r($prenotazione);
//echo 'dopo';
$cliente = DAOFactory::getClientiDAO()->load($appuntamento->idCliente);

$oggi = date("Y-m-d");

//exit;
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

<form action="index.php" method="post" id="formAppuntamentoCliente" name="formAppuntamentoCliente">
    <input type="hidden" name="action" value="visualizzaCliente" />
                    <input type="hidden" name="id" value="<?php if (isset($cliente)) {
    echo $cliente->id; 
} ?>"/>
                    
                </form>

            <div>
                <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        
<?php if (!isset($appuntamento)) {
    echo "Nuovo Appuntamento";
} else {
    echo "Scheda Appuntamento: <a href='#' class='linkScheda' onclick=\"document.getElementById('formAppuntamentoCliente').submit();\">";
    echo "".$cliente->nome . " " . $cliente->cognome;
    echo "</a>"; 
} ?>
                    
                    </h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        
                        <a href="index.php?action=agenda" class="btn btn-green" ><< Agenda</a>
                   
                        <?php if($appuntamento->status==1) {?>
<!--                        <a href="#" onclick="document.getElementById('formAppuntamento').action.value = 'cassa'; document.getElementById('formAppuntamento').submit();" class="btn btn-blue" >Vai Alla CASSA</a>-->
                        <?php } ?>
                        <!--<a href="#" onclick="document.getElementById('formAppuntamento').action.value = 'modificaTrattamentoPiano'; document.getElementById('formAppuntamento').submit();" class="btn btn-green" >Modifica App.</a>-->
                         <a href="#" onclick="document.getElementById('formAppuntamento').action.value = 'modificaAppuntamento'; document.getElementById('formAppuntamento').submit();" class="btn btn-green" >Modifica App.</a>
                        &nbsp;<a href="#" onclick="document.getElementById('formAppuntamento').action.value = 'eliminaAppuntamento'; document.getElementById('formAppuntamento').submit();" class="btn btn-green" >Elimina App.</a>
                    </div>
                </div></div>
            <div>
                <form action="index.php" method="post" id="formAppuntamento" name="formAppuntamento">
                    <input type="hidden" name="action"/>
                    <input type="hidden" name="id" value="<?php if (isset($appuntamento)) {
    echo $appuntamento->id;
} ?>"/>
                    <input type="hidden" name="idPiano" value="<?php if (isset($appuntamento)) {
    echo $prenotazione->id;
} ?>"/>
                    
                </form>
                


                    <table style="margin-left:auto; margin-right:auto;">
                       
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
    echo substr($appuntamento->oraFine, 0, 5);
} ?></td>
                        </tr>
                      
                        <tr><td colspan="3"><hr></td></tr>
                         <tr>
                            <td>STATUS</td>
                            <td>&nbsp;</td>

                            <td style="font-weight: bold;">
                                <?php 
                                if($appuntamento->status>0){
                                    $statotmp = DAOFactory::getPrenotazioneStatusDAO()->load($appuntamento->status);
                                    echo $statotmp->status;
                                    //echo $statotmp->descrizione;
                                }
                                ?>

                            </td>
                        </tr>
                         <?php if($appuntamento->data<=$oggi){ ?>
                        
                        <tr><td colspan="3">&nbsp;</tr>
                        <tr>
                        
                        <tr style="background: #CCC">
                               <td>PRESENZA</td>
                            <td>&nbsp;</td>
                            <td>
                                <form action="index.php" method="post" name="FormSetPresenza" id="FormSetPresenza">
                                    <input type="hidden" name="action" value="setPresenza"/>
                                    <input type="hidden" name="idApputnamento" value="<?php if (isset($appuntamento->id)){echo $appuntamento->id;} ?>">
                                <select name="presenzaAppuntamento">
                                    <option>-- Seleziona --</option>
                                    <option value="0" <?php if ($appuntamento->noShow==0){ ?> selected="" <?php } ?>>SI</option>
                                    <option value="1" <?php if ($appuntamento->noShow==1){ ?> selected="" <?php } ?>>NO</option>
                                </select>
                                </form>
 


                            </td>
                        </tr>
                        
                        <!--<tr><td colspan="3" style="border-top: 1px dotted gray;">&nbsp;</tr>-->
                        <?php } ?>
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
                            <td colspan="3" align="right"><input type="button" value="SALVA" class="btn btn-green" onclick="document.getElementById('FormSetPresenza').submit();"></td>
                        </tr>
                        
<tr><td colspan="3"><hr></td></tr>
                      
<!--              <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><input type="submit" class="btn btn-green" value="Salva"></td>
</tr>-->
                        
                        <tr>
                            <td colspan="3" style="height: 35px; width: 100%; background-color: #366c88; color: #FFF; border-bottom: 1px dotted #CCC; font-weight: bold;">&nbsp;TRATTAMENTI:</td>
                        </tr>
                        <?php
                        //$trattamenti = DAOFactory::getPrenotazioniTrattamentiDAO()->queryByIdPrenotazione($appuntamento->id);
                       
                        for ($i = 0; $i < count($appuntamentoDettaglio); $i++) {
                            $trattamento = $appuntamentoDettaglio[$i];
                            
                            $trattamentoBox = DAOFactory::getPostazioniDAO()->load($trattamento->idPostazione);
                            $trattamentoOperatore = DAOFactory::getDipendenteDAO()->load($trattamento->idOperatore);
                           
                            $trattamentitmp= explode(", ", $trattamento->trattamento);
                            if(count($trattamentitmp)>1){
                                $trattamentotmp = $trattamentitmp[0].", ...";
                            } else {
                                 $trattamentotmp = $trattamentitmp[0];
                            }
                            
                            ?>
                            <tr>
                                <td colspan="3" style="height: 30px; border-bottom: 1px dotted #CCC;">
                                    <div style="width: 90%; height: 30px; line-height: 30px; float: left;">&bull;&nbsp;
                                        <?php 
                                        //echo dateFromDb($trattamento->data). "&nbsp;&nbsp;ore ".substr($trattamento->oraInizio, 0,5)."&nbsp;&nbsp;&nbsp;&nbsp;". $trattamentotmp."&nbsp;&nbsp;&nbsp;&nbsp;".$trattamentoBox->postazione."&nbsp;&nbsp;&nbsp;&nbsp;".$trattamentoOperatore->nome." ".$trattamentoOperatore->cognome; 
                                       // print_r($trattamento);
                                        echo $trattamento->trattamento."&nbsp;&nbsp;&nbsp;&nbsp;".$trattamentoBox->postazione."&nbsp;&nbsp;&nbsp;&nbsp;".$trattamentoOperatore->nome." ".$trattamentoOperatore->cognome;
                                    
                                    ?>
                                        
                                        
                                    </div>
                                  
                                </td>
                            </tr>
<?php } ?>

                    </table>        

                


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