<?php
global $schedaLaser;

$idCliente = getRequest("idCliente");

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
            <form action="index.php" id="schedaLaser" name="schedaLaser" method="post">
                        <input type="hidden" id="action" name="action" value="schedaLaserCliente">
                        <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $idCliente ?>">
                    </form>
            <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                                            <h2 style="float: left; padding: 0px 15px; color: #366c88;">SCHEDA TRATTAMENTO LASER</h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
                                                <a href="#" onclick="document.getElementById('schedaLaser').submit();" class="btn btn-green" > << </a>
                                            </div>
                                        </div></div>
                <div>
                    <form action="index.php" method="post" id="formCliente" name="formCliente">
                        <input type="hidden" name="action" value="salvaSchedaLaserCliente"/>
                        <input type="hidden" name="idScheda" value="<?php if (isset($schedaLaser)) { echo $schedaLaser->id; } ?>"/>
                        <input type="hidden" name="idClienteScheda" value="<?php if (isset($schedaLaser)) { echo $schedaLaser->idCliente; } ?>"/>
                        <input type="hidden" name="idCliente" value="<?php if (isset($idCliente)) { echo $idCliente; } ?>"/>
                        
                        <table style="margin-left:auto; margin-right:auto;">
                              <tr>
                  <td>Data</td>
                  <td>&nbsp;</td>
                  <td><?php if(isset($schedaLaser->data)){ echo dateFromDb($schedaLaser->data); } ?></td>
              </tr>
                          <tr>
                  <td>Zona da Trattata </td>
                   <td>&nbsp;</td>
                   <td><?php if(isset($schedaLaser)){ echo $schedaLaser->zonaTrattata; }?></td>
              </tr>
            
              <tr>
                  <td>Durata</td>
                  <td>&nbsp;</td>
                  <td><?php if(isset($schedaLaser)){ echo $schedaLaser->durata; } ?></td>
              </tr>
              <tr>
                  <td>Fototipo</td>
                  <td>&nbsp;</td>
                  <td><?php if(isset($schedaLaser)){ echo $schedaLaser->fototipo; } ?></td>
              </tr>
              <tr>
                  <td>Potenza</td>
                  <td>&nbsp;</td>
                  <td><?php if(isset($schedaLaser)){ echo $schedaLaser->potenza; } ?></td>
              </tr>
              <tr>
                <td>Impulso</td>
                <td>&nbsp;</td>
                <td><?php if(isset($schedaLaser)){ echo $schedaLaser->impulso; } ?></td>
              </tr>
              <tr>
                  <td>Frequenza</td>
                  <td>&nbsp;</td>
                  <td><?php if(isset($schedaLaser)){ echo $schedaLaser->frequenza; } ?></td>
              </tr>
              
               <tr>
                  <td>Annotazioni</td>
                  <td>&nbsp;</td>
                  <td><?php if(isset($schedaLaser)){ echo $schedaLaser->note; } ?>
                  </td>
              </tr>
              
               <tr>
                   <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
              </tr>
               <tr>
                   <td colspan="3" style="height: 40px;">
                  <a href="#" onclick="document.getElementById('schedaLaser').submit();" class="btn btn-green" > Torna alla Lista </a>
                  </td>
              </tr>
              
             

</table>        
      
</form>

           
       </div>    
  
 
 
    
                
</div>
        </div>
        <div style="clear:left;">&nbsp;</div>
           
   