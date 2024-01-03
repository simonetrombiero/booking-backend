<?php
global $aliquota;

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

   <div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
        <div style="clear:left;">&nbsp;</div>
        <div class="grid grid-pad">
            <div class="col-1-1">
                <!--INIZIO--->
  
  
                
        <div>
            <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                                            <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                                                <?php if(!isset($aliquota)){ echo "Nuova Aliquota"; }else { echo "Modifica Aliquota"; } ?></h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
                                                <a href="index.php?action=aliquoteList" class="btn btn-green" >Annulla</a>
                                            </div>
                                        </div></div>
                <div>
                    <form action="index.php" method="post" id="formCliente" name="formCliente">
                        <input type="hidden" name="action" value="salvaAliquota"/>
                        <input type="hidden" name="idAliquota" value="<?php if (isset($aliquota)) { echo $aliquota->id; } ?>"/>
                        
                        
                        <table style="margin-left:auto; margin-right:auto;">
                              <tr>
                  <td>Descrizione</td>
                  <td>&nbsp;</td>
                  <td><input type="text" name="descrizioneAliquota" id="descrizioneAliquota" value="<?php if(isset($aliquota)){echo $aliquota->descrizione;}?>"></td>
              </tr>
                          <tr>
                  <td>Aliquota </td>
                   <td>&nbsp;</td>
                   <td><input type="text" name="valoreAliquota" id="valoreAliquota" value="<?php if(isset($aliquota)){ echo $aliquota->aliquota; }?>"></td>
              </tr>
            
              <tr>
                  <td>Codice Fattura Elettronica</td>
                  <td>&nbsp;</td>
                  <td><input type="text" name="naturaFAEAliquota" id="naturaFAEAliquota" value="<?php if(isset($aliquota)){ echo $aliquota->naturaFAE; } ?>"> </td>
              </tr>
              <tr>
                  <td>Sospesa</td>
                  <td>&nbsp;</td>
                  <td>
                      <input type="checkbox" name="sospesaAliquota" id="sospesaAliquota" value="1" <?php if(isset($aliquota)){
                      if($aliquota->isSospeso==1){ echo "checked=''"; }
                      }?>> </td>
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
//$( "#dataNascitaCliente" ).datepicker({
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

  $("#dataNascitaCliente").datepicker(options);
});
         
</script>        