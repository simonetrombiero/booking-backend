<?php
global $listaFidelityCard;
 
//print_r($listaFidelityCard);
?>
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
        "order": [[ 2, "desc" ]], //[0, "desc"]
	"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
	"language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
    });
        
    });
</script>

                
                
                

                <form action="index.php" id="gestioneFidelityCard" name="gestioneFidelityCard" method="post">
                    <input type="hidden" id="action" name="action">
                    <input type="hidden" id="id" name="idCard">
                </form>      



<!--<div class="grid grid-pad">-->
    <!--<div class="col-1-1">-->
        <div>
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                                            <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                                                LISTA FIDELITY CARD</h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
                                                <a href="index.php?action=fidelityCard" class="btn btn-green" >Indietro</a>
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
                                                      <th>
                                                          Card
                                                      N.</th>
                                                      <th>Cliente</th>
                                                      <th>Data Emissione</th>
                                                      <th>Saldo Punti</th>
                                                      <th>Status</th>
                                                        <th>
                                                            Azioni
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tfoot></tfoot>
                                                <tbody>
                                                    <?php
                                                    for ($i = 0; $i < count($listaFidelityCard); $i++) {
                                                        $fidelityCard = $listaFidelityCard[$i];
                                                        
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $fidelityCard->codiceBarre; ?></td>
                                                          <td>
                                                              <?php
                                                              $cliente='';
                                                              $idTmp = DAOFactory::getFidelityClienteDAO()->queryByIdCard($fidelityCard->id);
                                                              
                                                              $idCliente = $idTmp[0]->idCliente;
                                                                if(isset($idTmp[0]->idCliente)){
                                                                    $cliente = DAOFactory::getClientiDAO()->load($idCliente);
                                                                    echo $cliente->nome." ".$cliente->cognome;
                                                                }
                                                                
                                                                ?>
                                                            </td>
                                                          
                                                            <td><?php echo dateFromDb($fidelityCard->dataEmissione); ?></td>
                                                            <td><?php echo formattaImportoEuropeo($fidelityCard->saldoPunti); ?></td>
                                                          <td>
                                                              <?php if($fidelityCard->isSospesa==0){     
                                                                  echo 'Card Attiva';
                                                                  
                                                              }else{
                                                                  echo "<span style='background: red; padding: 8px; font-weight: bold: color:#FFFFFF;'>Card Non Attiva</span>";
                                                                  
                                                              } ?></td>
                                                          <td style="">
                                                                
                                                                <a href="#" onclick="document.getElementById('gestioneFidelityCard').idCard.value='<?php echo $fidelityCard->id; ?>'; document.getElementById('gestioneFidelityCard').action.value = 'dettaglioFidelityCard'; document.getElementById('gestioneFidelityCard').submit();">
                                                                    <img src="applicazione/img/icone/view.png" alt="dettaglio" title="Visualizza" style="width: 20px"/>
                                                                </a>
 <!--                                                               <a href="index.php?action=modificaDipendente&amp;id=<?php //echo $dipendente->id; ?>">
                                                                    <img src="applicazione/img/icone/edit.png" alt="Modifica" title="Modifica" style="width: 20px"/>
                                                                </a>
                                                                <a href="index.php?action=eliminaDipendente&amp;id=<?php //echo $dipendente->id; ?>">
                                                                    <img src="applicazione/img/icone/delete.png" alt="Elimina" title="Elimina" style="width: 20px"/>
                                                                </a>-->
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
           
       