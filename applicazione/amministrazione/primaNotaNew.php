<?php
global $primaNota;
$arrayModalita = array(1=>"Contante/Cassa", 2=>"Banca");
?>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->



            <div>
                <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        <?php if (!isset($primaNota)) {
                            echo "Nuova Prima Nota";
                        } else {
                            echo "Modifica Prima Nota";
                        } ?></h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="index.php?action=primaNota" class="btn btn-green" >Annulla</a>
                    </div>
                </div></div>
            <div>
                <form action="index.php" method="post" id="formPrimaNota" name="formPrimaNota">
                    <input type="hidden" name="action" value="salvaPrimaNota"/>
                    <input type="hidden" name="idPrimaNota" value="<?php if (isset($primaNota)) {
                            echo $primaNota->id;
                        } ?>"/>
                    

                    <table style="margin-left:auto; margin-right:auto;">
                        <tr>
                            <td>Data</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="data" id="data" value="<?php if (isset($primaNota)) {
                            echo dateFromDb($primaNota->data);
                        } ?>" required=""></td>
                        </tr>
                        <tr>
                            <td>Descrizione </td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="descrizione" id="descrizione" value="<?php if (isset($primaNota)) {
                            echo $primaNota->descrizione;
                        } ?>" required=""></td>
                        </tr>

                        <tr>
                            <td>Movimento in</td>
                            <td>&nbsp;</td>
                            <td><input type="radio" name="movimento" value="E" <?php if (isset($primaNota)) {if(strtoupper($primaNota->movimento)=="E"){ echo 'checked=""';}}?>  >Entrata<br><input type="radio" name="movimento" value="U" required="" <?php if (isset($primaNota)) {if(strtoupper($primaNota->movimento)=="U"){ echo 'checked=""';}}?>>Uscita </td>
                        </tr>
                        <tr>
                            <td>Importo</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="importo" id="importo" value="<?php if (isset($primaNota)) {
                            echo $primaNota->importo;
                        } ?>" required=""></td>
                        </tr>
                        <tr>
                            <td>Modalità Pagamento</td>
                            <td>&nbsp;</td>
                            <td><select name="modalita">
                                <?php 
                                for($k=1;$k<=count($arrayModalita);$k++){
                                ?>
                                    <option value="<?php echo $k; ?> " <?php
                                                if (isset($primaNota)) {
                                                    if ($k == $primaNota->modalitaPagamento) {
                                                        echo "selected='selected'";
                                                    }
                                                }
                                                ?>><?php echo $arrayModalita[$k]; ?></option>
                                <?php } ?>
                                </select>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>Note</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="note" id="note" value="<?php if (isset($primaNota->note)) {
                            echo $primaNota->note;
                        } ?>"></td>
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

  $("#data").datepicker(options);
});
         
</script>        