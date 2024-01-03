<?php
global $listaRichiami;
global $cliente;


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

                
                
                

                <form action="index.php" id="gestioneRichiami" name="gestioneRichiami" method="post">
                    <input type="hidden" id="action" name="action">
                    <input type="hidden" id="idCliente" name="idCliente">
                    <input type="hidden" id="id" name="id">
                </form>    


                 



<!--<div class="grid grid-pad">-->
    <!--<div class="col-1-1">-->
        <div>
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                                            <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                                                LISTA RICHIAMI CLIENTI: <a href="#" onclick="document.getElementById('gestioneRichiami').id.value='<?php echo $cliente->id; ?>'; document.getElementById('gestioneRichiami').action.value='visualizzaCliente'; document.getElementById('gestioneRichiami').submit();" class="linkScheda"><?php echo $cliente->nome. " ".$cliente->cognome; ?></a>

                                            </h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
                                                <a href="#" onclick="document.getElementById('gestioneRichiami').idCliente.value='<?php echo $cliente->id; ?>'; document.getElementById('gestioneRichiami').action.value='nuovoRichiamo'; document.getElementById('gestioneRichiami').submit();" class="btn btn-green" >Nuovo Richiamo</a>
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
                                                        
                                                      <th align="left">Data </th>
                                                      <th align="left">Richiamo </th>
                                                        <th align="left">
                                                           Titolo 
                                                        </th>
                                                        
                                                         <th align="left">
                                                            Richiesto da
                                                        </th>
                                                         <th align="left">Staus</th>
                                                        <th>
                                                            Azioni
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tfoot></tfoot>
                                                <tbody>
                                                    <?php
                                                    for ($i = 0; $i < count($listaRichiami); $i++) {
                                                        $richiamo = $listaRichiami[$i];
                                                        ?>
                                                        <tr>
                                                            
                                                          <td style="border-bottom: 1px dotted #057fd0;">
                                                          
                                                            <?php 
                                                            echo dateFromDb($richiamo->data);
                                                                
                                                                ?>
                                                          
                                                        </td>
                                                         <td style="border-bottom: 1px dotted #057fd0;"><?php 
                                                            echo dateFromDb($richiamo->dataPrevista);
                                                                
                                                                ?></td>
                                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                                
                                                                <?php
                                                                echo $richiamo->titolo;

                                                                ?>
                                                                 
                                                            </td>
                                                            
                                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                                <div class="textOver">
                                                                <?php
                                                                $richiestoDa='';
                                                                if(!isBlankOrNull($richiamo->richiestoDa)){
                                                                    $richiestoDa = DAOFactory::getDipendenteDAO()->load($richiamo->richiestoDa);
                                                                    echo $richiestoDa->nome." ".$richiestoDa->cognome;
                                                                }
                                                                ?>
                                                                </div>
                                                            </td>
                                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                                <?php
                                                                $status='';
                                                                if(!isBlankOrNull($richiamo->status)){
                                                                    $statustmp = DAOFactory::getRichiamoStatoDAO()->load($richiamo->status);
                                                                    $status = $statustmp->stato;
                                                                }
                                                                echo $status;

                                                                
                                                                ?>
                                                                
                                                                
                                                            </td>
                                                            
                                                            <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">
                                                               

                                                                <a href="#" onclick="document.getElementById('gestioneRichiami').idCliente.value='<?php echo $cliente->id; ?>'; document.getElementById('gestioneRichiami').id.value='<?php echo $richiamo->id; ?>'; document.getElementById('gestioneRichiami').action.value='visualizzaRichiamo'; document.getElementById('gestioneRichiami').submit();">
                                                                    <img src="img/icone/view.png" alt="Verifica Annuncio" title="Verifica Annuncio" style="width: 25px; padding: 2px"/></a>
                                                                <a href="#" onclick="document.getElementById('gestioneRichiami').idCliente.value='<?php echo $cliente->id; ?>'; document.getElementById('gestioneRichiami').id.value='<?php echo $richiamo->id; ?>'; document.getElementById('gestioneRichiami').action.value='modificaRichiamo'; document.getElementById('gestioneRichiami').submit();">
                                                                    <img src="applicazione/img/icone/edit.png" alt="Modifica" title="Modifica" style="width: 25px; padding: 2px"/></a>
                                                                
<!--                                                                <a href="index.php?action=eliminaCliente&amp;id=<?php //echo $richiamo->idclienti; ?>">
                                                                    <img src="applicazione/img/icone/delete.png" alt="Elimina" title="Elimina" style="width: 25px; padding: 2px"/></a>-->
                                                    
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
           
      