<?php
global $dipendente;


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
                                                <?php  echo "Scheda Dipendente"; ?></h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
                                                <a href="index.php?action=dipendentiList" class="btn btn-green" >Indietro</a>
                                            </div>
                                        </div></div>
                <div>
                    <!--<form action="index.php" method="post" id="formDipendente" name="formDipendente">-->
                        <!--<input type="hidden" name="action" value="salvaDipendente"/>-->
                        <input type="hidden" name="idDipendente" value="<?php if (isset($dipendente)) { echo $dipendente->id; } ?>"/>
                        
                        
                        <table>
                          <tr>
                  <td>Cognome </td>
                   <td>&nbsp;</td>
                   <td><?php if(isset($dipendente)){ echo $dipendente->cognome; }?></td>
              </tr>
              <tr>
                  <td>Nome</td>
                  <td>&nbsp;</td>
                  <td><?php echo $dipendente->nome;?></td>
              </tr>
              <tr>
                  <td>Incarico</td>
                  <td>&nbsp;</td>
                  <td>
                      
                      <?php 
                      
                      $incarico = DAOFactory::getIncaricoDAO()->load($dipendente->idIncarico); 
                      
                      echo $incarico->nome;
                      
                      
                      ?>
                      
                     
                   
                    
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>


</table>        
      
<!--</form>-->

           
       </div>    
  
 
 
    
                
</div>
        </div>
        <div style="clear:left;">&nbsp;</div>
           
   
