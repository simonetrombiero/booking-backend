<?php
global $schedaVisoCorpo;

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
  
  <form action="index.php" id="schedaVisoCorpo" name="schedaVisoCorpo" method="post">
                        <input type="hidden" id="action" name="action" value="schedaVisoCorpoCliente">
                        <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $idCliente; ?>">
                    </form>
                
        <div>
            <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                                            <h2 style="float: left; padding: 0px 15px; color: #366c88;">SCHEDA TRATTAMENTO VISO/CORPO</h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
                                                <a href="#" onclick="document.getElementById('schedaVisoCorpo').submit();" class="btn btn-green" > << </a>
                                            </div>
                                        </div></div>
                <div>
                    <form action="index.php" method="post" id="formCliente" name="formCliente">
                        <input type="hidden" name="action" value="salvaSchedaVisoCorpoCliente"/>
                        <input type="hidden" name="idScheda" value="<?php if (isset($schedaVisoCorpo)) { echo $schedaVisoCorpo->id; } ?>"/>
                        <input type="hidden" name="idClienteScheda" value="<?php if (isset($schedaVisoCorpo)) { echo $schedaVisoCorpo->idCliente; } ?>"/>
                        <input type="hidden" name="idCliente" value="<?php if (isset($idCliente)) { echo $idCliente; } ?>"/>
                        
                        <table style="margin-left:auto; margin-right:auto;">
                              <tr>
                  <td>Data</td>
                  <td>&nbsp;</td>
                  <td><?php if(isset($schedaVisoCorpo->data)){ echo dateFromDb($schedaVisoCorpo->data); } ?></td>
              </tr>
              
                          <tr>
                  <td>Zona da Trattata </td>
                   <td>&nbsp;</td>
                   <td><?php if(isset($schedaVisoCorpo)){ echo $schedaVisoCorpo->zonaTrattata; }?></td>
              </tr>
            
              <tr>
                  <td>Durata</td>
                  <td>&nbsp;</td>
                  <td><?php if(isset($schedaVisoCorpo)){ echo $schedaVisoCorpo->durata; } ?></td>
              </tr>
              <tr>
                  <td>Misurazione</td>
                  <td>&nbsp;</td>
                  <td><?php if(isset($schedaVisoCorpo)){ echo $schedaVisoCorpo->misurazioni; } ?></td>
              </tr>
              <tr>
                  <td>Peso Corporeo</td>
                  <td>&nbsp;</td>
                  <td><?php if(isset($schedaVisoCorpo)){ echo $schedaVisoCorpo->pesoCorporeo; } ?></td>
              </tr>
              <tr>
                <td>Annotazioni</td>
                <td>&nbsp;</td>
                <td><?php if(isset($schedaVisoCorpo)){ echo $schedaVisoCorpo->annotazioni; } ?></td>
              </tr>
              <tr>
                   <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
              </tr>
              <tr>
                  <td colspan="3" style="height: 40px;">
                  <a href="#" onclick="document.getElementById('schedaVisoCorpo').submit();" class="btn btn-green" > Torna alla Lista </a>
                  </td>
              </tr>

</table>        
      
</form>

           
       </div>    
  
 
 
    
                
</div>
        </div>
        <div style="clear:left;">&nbsp;</div>
           
   