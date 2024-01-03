<?php
global $prossimePrenotazioni;


?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">
<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js"></script>-->

<link rel="stylesheet" type="text/css" href="vendors/dataTables/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="vendors/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#datatable').dataTable({
        "order": [[ 0, "asc" ]], //[0, "desc"]
	"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
	"language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
    });
    
    $('#datatableCompleanni').dataTable({
        "order": [[ 0, "asc" ]], //[0, "desc"]
	"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
	"language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
    });
        
    });
</script>
<form action="index.php" id="gestionePrenotazione" name="gestionePrenotazione" method="post">
                    <input type="hidden" id="action" name="action">
                    <input type="hidden" id="id" name="id">
                </form>    

        <div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
        <div style="clear:left;">&nbsp;</div>
        <form action="index.php" id="gestioneCliente" name="gestioneCliente" method="get">
            <input type="hidden" id="action" name="action" value="visualizzaCliente">
        <div class="grid grid-pad">
            <div class="content">
            <div class="col-1-1">
                <div class="slider"><span class="titleTasti">Cerca Cliente:</span>&nbsp;<input id="cliente" name="cliente" type="text" style="width:80%; height:30px; border:1px solid #CCC; border-radius: 5px; padding-left:5px; padding-right:5px;">&nbsp;<input type="image" src="img/icone/view.png" width="30">
                    <input type="hidden" id="idCliente" name="id">
                    <?php  //include "slider.php"; ?>

                </div>
            </div>
            </div>
        </div>
        </form>
        <div style="clear:left;">&nbsp;</div>

        <div class="grid grid-pad">
            
            <div class="col-1-3">
                <div class="content">
                <a href="index.php?action=clientiList">
                <div class="box textCenter">
                    
                    
                    <p><img src="img/cliente.png"></p>
                    <span class="titleTasti">GESTIONE PAZIENTI</span>
                   

                </div>
                </a>
                
            </div>
            </div>
            <div class="col-1-3">
                <div class="content">
                <a href="index.php?action=agenda">
                <div class="box textCenter">
                    <p><img src="img/agenda.png"></p>
                <span class="titleTasti">AGENDA</span>
                </div>
               </a> 
            </div>
                </div>
<!--            <div class="col-1-3">
                <a href="index.php?action=gestioneContabile">
                <div class="box textCenter">
                    <p><img src="img/contabile.png"></p>
                    <span class="titleTasti">GESTIONE CONTABILE</span>
                </div>
                </a>
            </div>-->
            <div class="col-1-3">
                <div class="content">
                <a href="index.php?action=allestimento">
                <div class="box textCenter" style="background: #A4D2EA;">
                    <p><img src="img/agenda.png"></p>
                    <span class="titleTasti">AGENDA SPECIALISTICA</span>
                </div>
                </a>
                    </div>
            </div>
</div>

        

        <div style="clear:left;">&nbsp;</div>    
        <div class="grid grid-pad">
            <div class="content">
                 <?php if(isAdmin()) { ?>
            <div class="col-1-3">
                <a href="index.php?action=contabilita">
               <div class="box textCenter">
                    <p><img src="img/card.png"></p>
                    <span class="titleTasti">GESTIONE CONTABILE</span>

                </div>
                </a>
            </div>
                 <?php } ?>
            <div class="col-1-3">
            <a href="index.php?action=prestazioniPazienti">
            
               <div class="box textCenter">
                    <p><img src="img/shop.png"></p>
                    <span class="titleTasti">PRESTAZIONI PAZIENTE (Presenze)</span>
                </div>
                </a>
            </div>
            <div class="col-1-3">
                      <?php //if(isAdmin()) { ?>
        
<!--                <a href="index.php?action=allestimento">
                <div class="box textCenter">
                    <p><img src="img/impostazioni.png"></p>
                    <span class="titleTasti">NOTIFICHE</span>
                </div>
                </a>-->
        <?php //}  ?>

  
                
            </div>
            </div>
        </div>
        
        <div style="clear:left;">&nbsp;</div>    
        <div class="grid grid-pad">
            <div class="col-1-1">
            <div class="content">
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                                            <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                                                             PROSSIMI APPUNTAMENTI</h2>
            </div>
            
             <table style="width: 100%" id="datatable">
                                                <thead>
                                                    <tr>
                                                        <th align="left">
                                                           Data e Ora</th>
                                                         <th align="left">
                                                           Paziente</th>
                                                          <th align="left">
                                                           Postazione</th>
                                                        <th>
                                                            Azioni
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tfoot></tfoot>
                                                <tbody>
                                                    <?php
                                                    for ($i = 0; $i < count($prossimePrenotazioni); $i++) {
                                                        $prenotazione = $prossimePrenotazioni[$i];
                                                        ?>
                                                        <tr>
                                                            <td style="border-bottom: 1px dotted #057fd0;"><?php echo dateFromDb($prenotazione->data)." ".$prenotazione->oraInizio; ?></td>
                                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                                <?php
                                                                if(!isBlankOrNull($prenotazione->idCliente)){
                                                                    $cliente = DAOFactory::getClientiDAO()->load($prenotazione->idCliente);
                                                                    echo $cliente->nome." ".$cliente->cognome;
                                                                } 

                                                                ?>
                                                            </td>
                                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                                <?php
                                                                if(!isBlankOrNull($prenotazione->idCalendario)){
                                                                    $postazione = DAOFactory::getPostazioniDAO()->load($prenotazione->idCalendario);
                                                                    echo $postazione->postazione;;
                                                                } 

                                                                ?>
                                                            </td>
                                                            <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">
                                                                <a href="https://wa.me/39<?php echo $cliente->cellulare; ?>/?text=testo a inviare" target="_blank">Contatta</a>

                                                                <!--<a href="#" onclick="document.getElementById('gestionePrenotazione').id.value='<?php //echo $postazione->id; ?>'; document.getElementById('gestionePrenotazione').action.value='visualizzaPostazione'; document.getElementById('gestionePrenotazione').submit();">
                                                                    <img src="img/icone/view.png" alt="Visualizza" title="Visualizza" style="width: 25px; padding: 2px"/></a>-->
                                                               
<!--                                                                <a href="#" onclick="document.getElementById('gestionePrenotazione').id.value='<?php echo $postazione->id; ?>'; document.getElementById('gestionePrenotazione').action.value='modificaPostazione'; document.getElementById('gestionePrenotazione').submit();">
                                                                    <img src="applicazione/img/icone/edit.png" alt="Modifica" title="Modifica" style="width: 25px; padding: 2px"/></a>
                                                                <a href="#" onclick="document.getElementById('gestionePrenotazione').id.value='<?php echo $postazione->id; ?>'; document.getElementById('gestionePrenotazione').action.value='eliminaPostazione'; document.getElementById('gestionePrenotazione').submit();">
                                                               
                                                                    <img src="applicazione/img/icone/delete.png" alt="Elimina" title="Elimina" style="width: 25px; padding: 2px"/></a>-->
                                                                    
                                                                    
                                                    
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
            </div>
                </div>
        </div>
        
            
           <?php
           
           $compleanniClienti = DAOFactory::getClientiDAO()->queryCompleannoClienti();
           
           ?>
         <div style="clear:left;">&nbsp;</div>    
        <div class="grid grid-pad">
            <div class="col-1-1">
            <div class="content">
              <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                                            <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                                                             PROSSIMI COMPLEANNI</h2>
              </div>
             <table style="width: 100%" id="datatableCompleanni">
                                                <thead>
                                                    <tr>
                                                        <th align="left">
                                                           Giorno</th>
                                                         <th align="left">
                                                           Paziente</th>
                                                         
                                                         <th>  Azioni
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tfoot></tfoot>
                                                <tbody>
                                                    <?php
                                                    for ($i = 0; $i < count($compleanniClienti); $i++) {
                                                        $compleanno = $compleanniClienti[$i];
                                                        ?>
                                                        <tr>
                                                            <td style="border-bottom: 1px dotted #057fd0;"><?php
                                                            
$gg = explode("-", $compleanno->dataNascita); echo $gg[2];
                                                            ?></td>
                                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                                <?php
                                                               
                                                                    echo $compleanno->nome." ".$compleanno->cognome;
                                                                

                                                                ?>
                                                            </td>
                                                            
                                                            <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">
                                                                <a href="https://wa.me/39<?php echo $compleanno->cellulare; ?>" target="_blank">Contatta</a>

                                                                <!--<a href="#" onclick="document.getElementById('gestionePrenotazione').id.value='<?php //echo $postazione->id; ?>'; document.getElementById('gestionePrenotazione').action.value='visualizzaPostazione'; document.getElementById('gestionePrenotazione').submit();">
                                                                    <img src="img/icone/view.png" alt="Visualizza" title="Visualizza" style="width: 25px; padding: 2px"/></a>-->
                                                               
<!--                                                                <a href="#" onclick="document.getElementById('gestionePrenotazione').id.value='<?php echo $postazione->id; ?>'; document.getElementById('gestionePrenotazione').action.value='modificaPostazione'; document.getElementById('gestionePrenotazione').submit();">
                                                                    <img src="applicazione/img/icone/edit.png" alt="Modifica" title="Modifica" style="width: 25px; padding: 2px"/></a>
                                                                <a href="#" onclick="document.getElementById('gestionePrenotazione').id.value='<?php echo $postazione->id; ?>'; document.getElementById('gestionePrenotazione').action.value='eliminaPostazione'; document.getElementById('gestionePrenotazione').submit();">
                                                               
                                                                    <img src="applicazione/img/icone/delete.png" alt="Elimina" title="Elimina" style="width: 25px; padding: 2px"/></a>-->
                                                                    
                                                                    
                                                    
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
            
        </div>
            </div></div></div>

      
            
            <script type="text/javascript">
                 $(function () {
            $("#cliente").autocomplete({
                source: "index.php?action=searchCliente",
                minLength: 3,
                select: function (event, ui) {
                    document.getElementById('id').value = '';

                    $("#idCliente").val(ui.item.id);
                    

                }
            });

        });
        
        </script>