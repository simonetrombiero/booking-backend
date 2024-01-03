<?php
global $calendario;



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
    
<!--    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>-->

   <script src="applicazione/js/jscolor.js"></script>
    
   <div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
        <div style="clear:left;">&nbsp;</div>
        <div class="grid grid-pad">
            <div class="col-1-1">
                <!--INIZIO--->
  
  
                
        <div>
            <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                                            <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                                                <?php if(!isset($calendario)){ echo "Nuovo Calendario"; }else { echo "Modifica Calendario"; } ?></h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
                                                <a href="index.php?action=calendariList" class="btn btn-green" >Annulla</a>
                                            </div>
                                        </div></div>
                <div>
                    <form action="index.php" method="post" id="formAppuntamento" name="formAppuntamento">
                        <input type="hidden" name="action" value="salvaCalendario"/>
                        <input type="hidden" name="idCalendario" value="<?php if (isset($calendario)) { echo $calendario->id; } ?>"/>
                        
                        
                        <table style="margin-left:auto; margin-right:auto;">
                          <tr>
                <td>Titolo Calendario</td>
                <td>&nbsp;</td>
                <td><input type="text" name="titoloCalendario" id="titoloCalendario" value="<?php if(isset($calendario->calendario)){ echo $calendario->calendario; } ?>"></td>
              </tr>
              
              <tr>
                  <td>Postazione</td>
                  <td>&nbsp;</td>
                  
                  <td>
                      <?php $postazioni = DAOFactory::getPostazioniDAO()->queryAll(); ?>
                      
                      <select name="postazioneCalendario" id="postazioneCalendario">
                           <option value="0">-- Seleziona --</option>
                               <?php for ($i=0;$i<count($postazioni);$i++){   
                                   $postazione = $postazioni[$i];
                    ?>
                    <option value="<?php echo $postazione->id ?>" <?php if(isset($calendario)) {if($calendario->idPostazione==$postazione->id){ echo "selected='selected'";}} ?>><?php echo $postazione->postazione; ?></option>
                    <?php } ?>
                      </select>
                      
                  </td>
              </tr>
              
              <tr>
                <td>Attivo</td>
                <td>&nbsp;</td>
                <td>
                    <select name="calendarioAttivo" id="calendarioAttivo">
                           <option>-- Seleziona --</option>
                           <option value="0" <?php if(isset($calendario)) {if($calendario->attivo==0){ echo "selected='selected'";}} ?>> NO </option>
                           <option value="1" <?php if(isset($calendario)) {if($calendario->attivo==1){ echo "selected='selected'";}} ?>> SI </option>
                           
                    </select>
                </td>
              </tr>
              <tr>
                <td>Colore Sfondo Calendario</td>
                <td>&nbsp;</td>
                <td><input type="text" name="backgroundCalendario" id="backgroundCalendario" value="<?php if(isset($calendario->backgroundColor)){ echo $calendario->backgroundColor; } ?>" class="jscolor" /></td>
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
           
   
  