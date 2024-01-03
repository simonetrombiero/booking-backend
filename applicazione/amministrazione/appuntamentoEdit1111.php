<?php
global $appuntamento;

//print_r($appuntamento);
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



            <div>
                <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
<?php
if (!isset($appuntamento)) {
    echo "Nuovo Appuntamento";
} else {
    echo "Modifica Appuntamento";
}
?></h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="index.php?action=agenda" class="btn btn-green" >Annulla</a>
                    </div>
                </div></div>
            <div>
                <form action="index.php" method="post" id="formAppuntamento" name="formAppuntamento">
                    <input type="hidden" name="action" value="salvaAppuntamento"/>
                    <!--<input type="hidden" name="nNuoviTrattamenti" id="nNuoviTrattamenti" value="0">-->
                    <input type="hidden" name="numeroTrattamenti" value="<?php echo count($appuntamentoDettaglio); ?>">
                    <input type="hidden" name="idAppuntamento" value="<?php
                        if (isset($appuntamento)) {
                            echo $appuntamento->id;
                        }
?>"/>
                    <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px; background: #366c88; color: #FFF; text-align: center;">
                        <span style="font-weight: bold;">STATUS Appuntamento</span>&nbsp;
<?php $status = DAOFactory::getPrenotazioneStatusDAO()->queryAll(); ?>
                        <select name="statusAppuntamento" id="statusAppuntamento" style="width: 25%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" required="" >
                            <option value="0">-- Seleziona Stato Appuntamento --</option>
<?php
for ($i = 0; $i < count($status); $i++) {
    $stato = $status[$i];
    ?>
                                <option value="<?php echo $stato->id ?>" <?php
                                if (isset($appuntamento)) {
                                    if ($stato->id == $appuntamento->status) {
                                        echo "selected='selected'";
                                    }
                                }
                                ?>><?php echo $stato->status; ?></option>
                            <?php } ?>

                        </select>



                    </div>

                    <div class="clear">&nbsp;</div>


<?php
$cliente = DAOFactory::getClientiDAO()->load($appuntamento->idCliente);
?>
                    <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;" id="nuovoCliente">
                        <input type="text" name="nomeCliente"  id="nomeCliente" placeholder="Nome Cliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" required="" value="<?php echo $cliente->nome; ?>" disabled="" />&nbsp;
                        <input type="text" name="cognomeCliente" id="cognomeCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Cognome Cliente" value="<?php echo $cliente->cognome; ?>" disabled="" /><br><div style="clear:left;">&nbsp;</div>
                        <input type="text" name="telefonoCliente" id="telefonoCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Cellulare Cliente" value="<?php echo $cliente->cellulare; ?>" disabled="">&nbsp;
                        <input type="text" name="emailCliente" id="emailCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Email Cliente" value="<?php echo $cliente->email; ?>" disabled="">
                        <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $appuntamento->idCliente; ?>">


                    </div>
                    <div style="clear:left;">&nbsp;</div>
                    <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">

<!--                        <span style="font-weight: bolder;">Postazione e Operatore</span> <br>


                       

                        

                        <div style="clear:left;">&nbsp;</div>-->
                        <span style="font-weight: bolder;">Data Appuntamento, Ora Inizio e Fine</span> <br>
                        <input type="text" name="dataAppuntamento" id="dataAppuntamento" value="<?php
                    if (isset($appuntamento->data)) {
                        echo dateFromDb($appuntamento->data);
                    }
?>" style="width: 30%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Data Appuntamento" required="" />
                        <input type="text" name="oraInizioAppuntamento" id="oraInizioAppuntamento" value="<?php
                               if (isset($appuntamento)) {
                                   echo $appuntamento->oraInizio;
                               }
                               ?>" style="width: 30%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" class="timepicker" required="">
                        <input type="text" name="oraFineAppuntamento" id="oraFineAppuntamento"  value="<?php
                               if (isset($appuntamento)) {
                                   echo $appuntamento->oraFine;
                               }
                               ?>" class="timepicker" style="width: 30%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);">
                    </div>

                    <div style="clear:left;">&nbsp;</div>
                    <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">

                        <textarea name="noteAppuntamento" id="noteAppuntamento" placeholder="Eventuali Note" style="border: 1px dotted #333333; padding: 5px; width: 100%;"><?php
                        if (isset($appuntamento)) {
                            echo $appuntamento->note;
                        }
                               ?></textarea>

                    </div>
                    <div style="clear:left;">&nbsp;</div>
                    <div style="width: 100%; height: 60px; background-color: #F6F6F6;  border-bottom: 1px dotted #CCC;">
                        <h2 style="float: left; padding: 0px 15px; color: #366c88;">Trattamenti</h2>

                    </div>
                    <div>

                        <table style="width: 100%" id="datatable">
                            <thead>
                                <tr>
                                    <th align="left">Descrizione</th>
                                    <th>Postazione</th>
                                    <th>Operatore</th>

                                </tr>
                            </thead>
                            <tfoot></tfoot>
                            <tbody>
<?php
for ($i = 0; $i < count($appuntamentoDettaglio); $i++) {


    $trattamento = $appuntamentoDettaglio[$i];
    ?>
                                    <tr>
                                        <td style="border-bottom: 1px dotted #057fd0;">
                                            <input type="hidden" name="idRiga<?php echo $i; ?>" value="<?php echo $trattamento->id; ?>">

    <?php
    if (!isBlankOrNull($trattamento->trattamento)) {
        echo $trattamento->trattamento;
    }
    ?>

                                        </td>
                                        <td style="border-bottom: 1px dotted #057fd0;">
                                            <select name="postazione<?php echo $i; ?>">
    <?php
    for ($j = 0; $j < count($postazioni); $j++) {
        $postazione = $postazioni[$j];
        ?>
                                                    <option value="<?php echo $postazione->id ?>" <?php
                                                    if ($postazione->id == $trattamento->idPostazione) {
                                                        echo 'selected=""';
                                                    }
                                                    ?> ><?php echo $postazione->postazione ?></option>
                                                    <? } ?>
                                                </select>
                                            </td>
                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                <select name="operatore<?php echo $i; ?>">
                                                    <?php
                                                    for ($k = 0; $k < count($operatori); $k++) {
                                                        $operatore = $operatori[$k];
                                                        ?>
                                                        <option value="<?php echo $operatore->id ?>" <?php
                                                        if ($operatore->id == $trattamento->idOperatore) {
                                                            echo 'selected=""';
                                                        }
                                                        ?> ><?php echo $operatore->nome . " " . $operatore->cognome; ?></option>
                                                        <? } ?>
                                                    </select>
                                                </td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                            </tbody>
                        </table>

                    </div>

                    <div style="clear:left;">&nbsp;</div>



                    <table style="margin-left:auto; margin-right:auto;">



                        <tr>
                            <td colspan="3">



                            </td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="submit" class="btn btn-green" value="Salva"></td>
                        </tr>

                    </table>        

                </form>


            </div>    





        </div>
    </div>
    <div style="clear:left;">&nbsp;</div>
   
   <script type="text/javascript">
    
//    $( function() {
//
//$( "#dataAppuntamento" ).datepicker({
//changeMonth: true,
//changeYear: true,
//yearRange: '1900:<?php //echo date("Y"); ?>',
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
      monthNames: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno', 'Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
      monthNamesShort: ['Gen','Feb','Mar','Apr','Mag','Giu', 'Lug','Ago','Set','Ott','Nov','Dic'],
      dayNames: ['Domenica','Lunedì','Martedì','Mercoledì','Giovedì','Venerdì','Sabato'],
      dayNamesShort: ['Dom','Lun','Mar','Mer','Gio','Ven','Sab'],
      dayNamesMin: ['Do','Lu','Ma','Me','Gio','Ve','Sa'],  
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
                minTime: '9:00',
                maxTime: '20:00',
                startTime: '9:00',
                //maxHour: '20',
                //maxMinutes: '30',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });      
</script>        