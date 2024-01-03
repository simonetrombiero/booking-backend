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
                                                <?php if(!isset($appuntamento)){ echo "Nuovo Appuntamento"; }else { echo "Modifica Appuntamento"; } ?></h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
                                                <a href="index.php?action=agenda" class="btn btn-green" >Annulla</a>
                                            </div>
                                        </div></div>
                <div>
                    <form action="index.php" method="post" id="formAppuntamento" name="formAppuntamento">
                        <input type="hidden" name="action" value="salvaAppuntamento"/>
                        <input type="hidden" name="idAppuntamento" value="<?php if (isset($appuntamento)) { echo $appuntamento->id; } ?>"/>
                        
                        
                        <table style="margin-left:auto; margin-right:auto;">
                          <tr>
                  <td>Cliente </td>
                   <td>&nbsp;</td>
                   <td>
                         <?php $clienti = DAOFactory::getClientiDAO()->queryAll(); ?>
                      
                      <select name="clienteAppuntamento" id="clienteApputamento">
                           <option value="0">-- Seleziona --</option>
                               <?php for ($i=0;$i<count($clienti);$i++){   
                                   $cliente = $clienti[$i];
                    ?>
                    <option value="<?php echo $cliente->id ?>" <?php if(isset($cliente)) {if($cliente->id==$appuntamento->idCliente){ echo "selected='selected'";}} ?>><?php echo $cliente->cognome." ".$cliente->nome; ?></option>
                    <?php } ?>
                      </select>
                       
                   </td>
              </tr>
              <tr>
                  <td>Trattamento</td>
                  <td>&nbsp;</td>
                  <td>
                       <?php $trattamenti = DAOFactory::getTrattamentiDAO()->queryAll(); ?>
                      
                      <select name="trattamentoAppuntamento" id="trattamentoAppuntamento">
                           <option value="0">-- Seleziona --</option>
                               <?php for ($i=0;$i<count($trattamenti);$i++){   
                                   $trattamento = $trattamenti[$i];
                    ?>
                    <option value="<?php echo $trattamento->id ?>" <?php if(isset($appuntamento)) {if($appuntamento->idTrattamento==$trattamento->id){ echo "selected='selected'";}} ?>><?php echo $trattamento->trattamento; ?></option>
                    <?php } ?>
                      </select>
                      
                  
                  </td>
              </tr>
              <tr>
                <td>Data</td>
                <td>&nbsp;</td>
                <td><input type="text" name="dataAppuntamento" id="dataAppuntamento" value="<?php if(isset($appuntamento->data)){ echo dateFromDb($appuntamento->data); } ?>"></td>
              </tr>
              <tr>
                  <td>Ora Inizio</td>
                  <td>&nbsp;</td>
                  <td><input type="text" name="OraInizioAppuntamento" id="OraInizioAppuntamento" value="<?php if(isset($appuntamento)){ echo substr($appuntamento->oraInizio, 0,5); } ?>" class="timepicker"> </td>
              </tr>
              <tr>
                  <td>Ora Fine</td>
                  <td>&nbsp;</td>
                  <td><input type="text" name="OraFineAppuntamento" id="OraFineAppuntamento" value="<?php if(isset($appuntamento)){ echo substr($appuntamento->oraFine, 0,5); } ?>" class="timepicker"></td>
              </tr>
              <tr>
                  <td>Dipendente</td>
                  <td>&nbsp;</td>
                  
                  <td>
                      <?php $dipendenti = DAOFactory::getDipendenteDAO()->queryAll(); ?>
                      
                      <select name="dipendenteAppuntamento" id="dipendenteAppuntamento">
                           <option value="0">-- Seleziona --</option>
                               <?php for ($i=0;$i<count($dipendenti);$i++){   
                                   $dipendente = $dipendenti[$i];
                    ?>
                    <option value="<?php echo $dipendente->id ?>" <?php if(isset($appuntamento)) {if($appuntamento->idCalendario==$dipendente->id){ echo "selected='selected'";}} ?>><?php echo $dipendente->cognome." ".$dipendente->nome; ?></option>
                    <?php } ?>
                      </select>
                      
                  </td>
              </tr>
              <tr>
                  <td colspan="3"><textarea name="noteAppuntamento" id="noteAppuntamento" placeholder="Annotazioni"><?php if(isset($appuntamento)){ echo $appuntamento->note; } ?></textarea></td>
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