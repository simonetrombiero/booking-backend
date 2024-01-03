<?php
global $listaCliente;
?>
<style>
    .textOver {
max-width: 100px;
overflow: hidden;
white-space: nowrap;
text-overflow: ellipsis;
}
</style>
    
   <div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
        <div style="clear:left;">&nbsp;</div>
        <div class="grid grid-pad">
            <div class="col-1-1">
            <!--INIZIO--->
                
                 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!--                <link rel="stylesheet" type="text/css" href="applicazione/css/dataTable/jquery.dataTables.css">
                <script type="text/javascript" language="javascript" src="applicazione/js/dataTable/jquery.dataTables.min.js"></script>
                <script type="text/javascript">
                    $(function() {
                        $('#datatable').dataTable({
                            "order": [[ 0, "asc" ]], //[0, "desc"]
                            "lengthMenu": [[-1,10, 25, 50, 100], ["Tutti", 10, 25, 50, 100]],
                            "language": {"url": "applicazione/js/dataTable/languages/dataTables_IT.txt"}
                        });
                    });
                </script>-->
                <link rel="stylesheet" type="text/css" href="vendors/dataTables/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="vendors/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#datatable').dataTable({
        "order": [[ 0, "asc" ],[ 1, "asc" ]], //[0, "desc"]
	"lengthMenu": [[50, 100, -1], [50, 100, "Tutti"]],
	"language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
    });
        
    });
</script>

                
                
                

                <form action="index.php" id="gestioneCliente" name="gestioneCliente" method="post">
                    <input type="hidden" id="action" name="action">
                    <input type="hidden" id="id" name="id">
                </form>    


                    <form action="index.php" id="gestioneFidelityCard" name="gestioneFidelityCard" method="post">
                        <input type="hidden" id="action" name="action">
                        
                        
                        <input type="hidden" id="idCard" name="idCard">
                       
                    </form> 



<!--<div class="grid grid-pad">-->
    <!--<div class="col-1-1">-->
        <div>
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                                            <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                                                LISTA CLIENTI
                                            </h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
                                                <a href="index.php?action=nuovoCliente" class="btn btn-green" >Nuovo Cliente</a>
                                            </div>
                                        </div></div>
    <!--</div>-->
<!--</div>-->

<!--<div class="grid grid-pad">-->
    <!--<div class="col-1-1">-->
        <div style="padding: 10px;">
            
                                            <table style="width: 100%" id="datatable">
                                                <thead>
                                                    <tr>
                                                        
                                                      <th align="left" style="width: 20%;">Cognome </th>
                                                        <th align="left" style="width: 20%;">
                                                           Nome 
                                                        </th>
                                                        <th style="width: 3%;">Card</th>
                                                        <th align="left" style="width: 10%;">
                                                            Telefono
                                                        </th>
                                                        <th align="left" style="width: 15%;">Email</th>
                                                        <th align="left" style="width: 15%;">Città</th>
                                                        <th>
                                                            Azioni
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tfoot></tfoot>
                                                <tbody>
                                                    <?php
                                                    for ($i = 0; $i < count($listaCliente); $i++) {
                                                        $cliente = $listaCliente[$i];
                                                        ?>
                                                        <tr>
                                                            
                                                          <td style="border-bottom: 1px dotted #057fd0;"><a href="#" onclick="document.getElementById('gestioneCliente').id.value='<?php echo $cliente->id; ?>'; document.getElementById('gestioneCliente').action.value='visualizzaCliente'; document.getElementById('gestioneCliente').submit();">
                                                            <?php
                                                                if(!isBlankOrNull($cliente->ragioneSociale)){
                                                                    echo $cliente->ragioneSociale;
                                                                } else {
                                                                   echo "<b>".$cliente->cognome."</b>"; 
                                                                }   //echo $cliente->id; 
                                                                ?>
                                                          </a></td>
                                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                                 <a href="#" onclick="document.getElementById('gestioneCliente').id.value='<?php echo $cliente->id; ?>'; document.getElementById('gestioneCliente').action.value='visualizzaCliente'; document.getElementById('gestioneCliente').submit();">
                                                                <?php
                                                                if(!isBlankOrNull($cliente->ragioneSociale)){
                                                                    //echo $cliente->ragioneSociale;
                                                                } else {
                                                                   echo "<b>".$cliente->nome."</b>"; 
                                                                } 

                                                                ?>
                                                                 </a>
                                                            </td>
                                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                             <?php 
                                                                $verCard = DAOFactory::getFidelityClienteDAO()->queryByIdCliente($cliente->id);
                                                                if(count($verCard)>0){
                                                                    $idCard = $verCard[0]->idCard;
                                                                
                                                                ?>
                                                                <a href="#" onclick="document.getElementById('gestioneFidelityCard').idCard.value='<?php echo $idCard; ?>'; document.getElementById('gestioneFidelityCard').action.value = 'dettaglioFidelityCard'; document.getElementById('gestioneFidelityCard').submit();">
                                                                    <img src="img/icone/card.png" alt="Fidelity Card" title="Fidelity Card" style="width: 25px; padding: 2px"/>
                                                                </a>
                                                                <?php 
                                                                
                                                                } 
                                                                ?>
                                                                
                                                            </td>
                                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                                <div class="textOver">
                                                                <?php
                                                                //echo $cliente->telefono;
                                                                if(!isBlankOrNull($cliente->cellulare)){
                                                                    echo $cliente->cellulare;
                                                                }
                                                                ?>
                                                                </div>
                                                            </td>
                                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                                <div class="textOver">
                                                                <?php 
                                                                
                                                                echo $cliente->email;
                                                                ?>
                                                                </div>
                                                                </td>
                                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                                 <?php
      $cittaCliente = null;
      if (isset($cliente)) {
          if (!isBlankOrNull($cliente->citta)) {
              $cittaCliente = DAOFactory::getComuniDAO()->load($cliente->citta);
              echo $cittaCliente->comune;
          }
      }
                                                            ?>
                                                            
                                                            </td>
                                                            <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">
                                                               

                                                                <a href="#" onclick="document.getElementById('gestioneCliente').id.value='<?php echo $cliente->id; ?>'; document.getElementById('gestioneCliente').action.value='visualizzaCliente'; document.getElementById('gestioneCliente').submit();">
                                                                    <img src="img/icone/view.png" alt="Verifica Annuncio" title="Verifica Annuncio" style="width: 25px; padding: 2px"/></a>
                                                                <a href="#" onclick="document.getElementById('gestioneCliente').id.value='<?php echo $cliente->id; ?>'; document.getElementById('gestioneCliente').action.value='modificaCliente'; document.getElementById('gestioneCliente').submit();">
                                                                    <img src="applicazione/img/icone/edit.png" alt="Modifica" title="Modifica" style="width: 25px; padding: 2px"/></a>
                                                                
                                                                <a href="index.php?action=eliminaCliente&amp;id=<?php echo $cliente->id; ?>" onclick="return confirm('ATTENZIONE stai cancellando tutti i dati del cliente compresi i piani di cura e le prenotazioni. Procedi?')">
                                                                    <img src="applicazione/img/icone/delete.png" alt="Elimina" title="Elimina" style="width: 25px; padding: 2px"/></a>
                                                    
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
            
            
            <!--FINE--->
    
    
    
                
</div>
        </div>
        <div style="clear:left;">&nbsp;</div>
           
      