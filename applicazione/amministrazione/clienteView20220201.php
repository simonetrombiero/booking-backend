<style>
 #button-operation {
    background: #366c88;
        background-image: none;
    background-image: -webkit-linear-gradient(top, #366c88, #80033f);
    background-image: -moz-linear-gradient(top, #366c88, #80033f);
    background-image: -ms-linear-gradient(top, #366c88, #80033f);
    background-image: -o-linear-gradient(top, #366c88, #80033f);
    background-image: linear-gradient(to bottom, #366c88, #80033f);
    -webkit-border-radius: 10;
    -moz-border-radius: 10;
    border-radius: 10px;
    font-family: Arial;
    color: #ffffff;
    font-size: 20px;
    padding: 10px 15px 10px 15px;
    text-decoration: none;
}
</style>
<?php
global $cliente, $cardCliente;


?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!--</div> NON CANCELLARE QUESTO TAG - l'apertura è nelle file header-->

<link rel="stylesheet" type="text/css" href="vendors/dataTables/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="vendors/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datatableProssime').dataTable({
            "order": [[0, "asc"]], //[0, "desc"]
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
            "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
        });

        $('#datatablePrecedente').dataTable({
            "order": [[1, "desc"]], //[0, "desc"]
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
            "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
        });



        $('#datatablePagamenti').dataTable({
            "order": [[0, "asc"]], //[0, "desc"]
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
            "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
        });

        $('#datatableDocumenti').dataTable({
            "order": [[1, "desc"]], //[0, "desc"]
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
            "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
        });

    });
</script>

<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->


            <div>
                <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        SCHEDA PAZIENTE: <?php echo $cliente->nome . " " . $cliente->cognome; ?></h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="index.php?action=clientiList" class="btn btn-green" >Torna alla Lista</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-2">
            <div class="content">

                <fieldset class="border">
                    <legend>Anagrafica</legend> 

                    <table style="margin-left:auto; margin-right:auto;">


                        <tr>
                            <td>Nome</td>
                            <td>&nbsp;</td>
                            <td><?php echo $cliente->nome; ?></td>
                        </tr>
                        <tr>
                            <td>Cognome </td>
                            <td>&nbsp;</td>
                            <td><?php echo $cliente->cognome; ?></td>
                        </tr>
<!--                        <tr>
                            <td>Telefono</td>
                            <td>&nbsp;</td>
                            <td><?php //echo $cliente->telefono;  ?></td>
                        </tr>-->
                        <tr>
                            <td>Cellulare</td>
                            <td>&nbsp;</td>
                            <td><?php echo $cliente->cellulare; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>&nbsp;</td>
                            <td><?php echo $cliente->email; ?></td>
                        </tr>
                        <tr>
                            <td>Data Nascita</td>
                            <td>&nbsp;</td>
                            <td><?php
                                if (isset($cliente->dataNascita)) {
                                    echo dateFromDb($cliente->dataNascita);
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td>Città</td>
                            <td>&nbsp;</td>
                            <td>
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
                        </tr>


                        <tr>
                            <td>Codice Fiscale</td>
                            <td>&nbsp;</td>
                            <td><?php echo $cliente->cFiscale; ?></td>
                        </tr>
                        
                         <tr>
                             <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        
                         <tr>
                            <td><a href="#" onclick="document.getElementById('gestioneCliente').submit();" class="btn btn-green" >Storico</a></td>
                            <td>&nbsp;</td>
                            <td><a href="#" onclick="document.getElementById('gestioneCliente').submit();" class="btn btn-green" >Modifica</a></td>
                        </tr>
                        


                    </table>   
                    
                    <p></p>
                </fieldset>

            </div>
        </div>

        <div class="col-1-2">
            <div class="content">
                <fieldset class="border">
                    <legend>Fidelity: </legend> 
                    <div style=" text-align: right; padding: 10px 15px;">
                        <?php if(!isset($cardCliente)){?>
                        <!--<a href="#" id="button-operation" onclick="document.getElementById('gestioneFidelityCard').action.value = 'generaCard';" class="btn btn-green">Genera Card</a>-->
                        <button  type="button" id="button-operation" onclick="document.getElementById('gestioneFidelityCard').action.value = 'generaCard';" class="btn btn-green"> Genera Card</button>
                        <?php }else{?>
                        <div style="text-align: left; font-weight: bold;">Saldo Punti: <?php echo formattaImportoEuropeo($cardCliente->saldoPunti); ?></div>
                         <a href="#" onclick="document.getElementById('gestioneFidelityCard').action.value = 'fidelityCardCaricaPuntiCliente'; document.getElementById('gestioneFidelityCard').submit();" class="btn btn-green" >Carica Punti</a>&nbsp;<a href="#" onclick="document.getElementById('gestioneFidelityCard').action.value = 'dettaglioFidelityCard'; document.getElementById('gestioneFidelityCard').submit();" class="btn btn-green" >Dettaglio</a>
                        <?php } ?>
                    </div>

                </fieldset>

                <fieldset class="border">
                    <legend>Scheda Morfologica</legend> 
                    <div style=" text-align: right; padding: 10px 15px;">
                         <a href="#" onclick="document.getElementById('schedaMorfologica').submit();" class="btn btn-green" >Modifica</a>
                    </div>

                </fieldset>

                <fieldset class="border">
                    <legend>Scheda Trattamenti Laser</legend> 
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="#" onclick="document.getElementById('schedaLaser').submit();" class="btn btn-green" >Visualizza</a>
                    </div>

                </fieldset>
                <fieldset class="border">
                    <legend>Scheda Trattamenti Viso/Corpo</legend> 
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="#" onclick="document.getElementById('schedaVisoCorpo').submit();" class="btn btn-green" >Visualizza</a>
                    </div>

                </fieldset>

            </div>
        </div>

    </div> 

    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <?php $prossimePrenotazioni = DAOFactory::getPrenotazioniDAO()->queryProssimePrenotazioni($cliente->id);
            ?>
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                    PROSSIMI APPUNTAMENTI</h2>

                <table style="width: 100%" id="datatableProssime">
                    <thead>
                        <tr>

                            <th align="left">
                                Data </th>
                            <th>Ora</th>
                            <th align="left">
                                Trattamenti</th>
                            <th>
                                Azioni
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        for ($i = 0; $i < count($prossimePrenotazioni); $i++) {
                            $prenotazione = $prossimePrenotazioni[$i];
                            ?>
                            <tr>

                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <span style="display: none"><?php echo $prenotazione->data; ?></span>
                                    <?php
                                    if (!isBlankOrNull($prenotazione->data)) {
                                        echo dateFromDb($prenotazione->data);
                                    }
                                    ?>
                                </td>

                                <td style="border-bottom: 1px dotted #057fd0;">

                                    <?php
                                    if (!isBlankOrNull($prenotazione->oraInizio)) {
                                        // echo $prenotazione->oraInizio;
                                        $x1 = explode(":", $prenotazione->oraInizio);

                                        echo $x1[0] . ":" . $x1[1];
                                    }
                                    ?>
                                </td>

                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <?php
                                    if (isset($prenotazione)) {
                                        $trattamento = '';
                                        $stringa='';
                                        $trattamentiAssociati = null;
                                        $trattamentiAssociati = DAOFactory::getPrenotazioniTrattamentiDAO()->queryByIdPrenotazione($prenotazione->id);


                                        for ($k = 0; $k < count($trattamentiAssociati); $k++) {


                                            $trattamento = DAOFactory::getTrattamentiDAO()->load($trattamentiAssociati[$k]->idTrattamento);
                                            if($k==0){
                                               $stringa = $trattamento->trattamento; 
                                            } else {
                                                $stringa .=", ".$trattamento->trattamento;
                                            }
                                        }
                                        echo $stringa;
                                    }
                                    ?>
                                </td>
                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <a href="index.php?action=visualizzaAppuntamento&id=<?php echo $prenotazione->id; ?>"><img src="applicazione/img/icone/view.png" alt="visualizza prenotazione" title="visualizza prenotazione" style="width: 25px; padding: 2px"/></a>
                                    
                                </td>

                            </tr>
                                    <?php
                                }
                                ?>
                    </tbody>


                    <tfoot></tfoot>


                </table>

            </div>

        </div>
    </div>

    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
<?php
$precedentePrenotazioni = DAOFactory::getPrenotazioniDAO()->queryPrecedentiprenotazioni($cliente->id);

// print_r($precedentePrenotazioni); 
?>
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                    TRATTAMENTI EFFETTUATI / IN CORSO</h2>

                <table style="width: 100%" id="datatablePrecedente">
                    <thead>
                        <tr>

                            <th align="left">
                                Trattamento  </th>
                            <th>Data</th>
                            <th>Stato</th>

                           <th>
                                Azioni
                            </th>
                        </tr>
                    </thead>

                    <tbody>
<?php
// echo "<pre>";
for ($i = 0; $i < count($precedentePrenotazioni); $i++) {
    $precedente = $precedentePrenotazioni[$i];

    $trattamenti = DAOFactory::getPrenotazioniTrattamentiDAO()->queryByIdPrenotazione($precedente->id);
    //print_r($trattamenti);
    //echo $nTrattamenti = count($trattamenti);
    $tratttt = '';
    for ($k = 0; $k < count($trattamenti); $k++) {

        $trattamento = DAOFactory::getTrattamentiDAO()->load($trattamenti[$k]->idTrattamento);
        $tratttt .= $trattamento->trattamento . " ";
    }
    ?>

                            <tr>

                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <span style="display: none"><?php echo $precedente->data; ?></span>
                            <?php
                            if (!isBlankOrNull($precedente->data)) {
                                echo $tratttt;
                            }
                            ?>
                                </td>
                              

                                <td style="border-bottom: 1px dotted #057fd0; text-align: center;">

                                    <span style="display: none"><?php echo $precedente->data; ?></span>
                                    <?php
                                    if (!isBlankOrNull($precedente->data)) {
                                        echo dateFromDb($precedente->data);
                                    }
                                    ?>
                                </td>
                                  <td style="border-bottom: 1px dotted #057fd0;">
                                      
                                  <?php
                                  
                            if (!isBlankOrNull($precedente->status)) {
                                $statotmp = DAOFactory::getPrenotazioneStatusDAO()->load($precedente->status);
                                echo $statotmp->status;
                            }
                            ?>
                                </td>
                                
                                                                <td style="border-bottom: 1px dotted #057fd0; text-align: center">
                                
                                                                    <a href="index.php?action=visualizzaAppuntamento&id=<?php echo $precedente->id; ?>">
                                                                        <img src="applicazione/img/icone/view.png" alt="Visualizza" title="Visualizza" style="width: 25px; padding: 2px"/>
                                                                    </a>
                                
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

    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-2">
            <div class="content">
                <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        PAGAMENTI / ACCONTI</h2>

<?php
$pagamenti = DAOFactory::getPagamentiDAO()->queryByCliente($cliente->id);
?>

                    <table style="width: 100%" id="datatablePagamenti">
                        <thead>
                            <tr>
                                <th align="left">
                                    Data</th>

                                <th align="left">Tipo Pagamento</th>
                                <th>Importo</th>
<!--                                <th>
                                    Azioni
                                </th>-->
                            </tr>
                        </thead>
                        <tbody>
<?php
for ($i = 0; $i < count($pagamenti); $i++) {

    $pagamento = $pagamenti[$i];
    ?>
                                <tr>
                                    <td style="border-bottom: 1px dotted #057fd0;"><?php echo dateFromDb($pagamento->data); ?></td>
                                    <td style="border-bottom: 1px dotted #057fd0;">
                                <?php
                                if ($pagamento->modalitaPagamento == 0) {
                                    echo 'Contante';
                                } else {
                                    $pagamentoModalita = DAOFactory::getPagamentomodalitaDAO()->load($pagamento->modalitaPagamento);
                                    echo $pagamentoModalita->descrizione;
                                }
                                ?>
                                    </td>
                                    <td style="border-bottom: 1px dotted #057fd0; text-align: center;"><?php echo formattaImportoEuropeo($pagamento->importo); ?></td>
                                    <!--<td></td>-->
                                </tr>
                                    <?php } ?>
                        </tbody>


                    </table>


                </div>

            </div>








        </div>

        <div class="col-1-2">
            <div class="content">
                <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">   LISTA DOCUMENTI</h2>
<?php
$allDocumenti = DAOFactory::getDocumentoDAO()->queryAllByIdCliente($cliente->id);
?>

                    <table style="width: 100%" id="datatableDocumenti">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th align="left">Data</th>
                                <th align="left">Tipo</th>
                                <th>Stato</th>
                                <th>Importo</th>
                                <th>Visualizza</th>

                            </tr>
                        </thead>
                        <tbody>
<?php
for ($i = 0; $i < count($allDocumenti); $i++) {
    $documento = $allDocumenti[$i];
    ?>
                                <tr>
                                    <td style="border-bottom: 1px dotted #057fd0;"><?php echo $documento->id; ?></td>
                                    <td style="border-bottom: 1px dotted #057fd0;"><span style="display: none"><?php echo $documento->data; ?></span><?php echo dateFromDb($documento->data); ?></td>
                                    <td style="border-bottom: 1px dotted #057fd0;"><?php
                                if (!isBlankOrNull($documento->idTipoDocumento)) {
                                    $tipo = DAOFactory::getTipodocumentoDAO()->load($documento->idTipoDocumento);
                                    echo $tipo->nome;
                                }
                                //   echo $documento->idTipoDocumento;
                                ?></td>
                                    <td style="border-bottom: 1px dotted #057fd0;"> 
                                        <?php
                                        if ($documento->isDefinitivo == 1) {
                                            echo "Chiuso";
                                        } else {
                                            echo 'Aperto';
                                        }
                                        ?></td>
                                    <td style="border-bottom: 1px dotted #057fd0; text-align: center;"><?php echo formattaImportoEuropeo($documento->totaleDocumento); ?></td>
                                    <td style="border-bottom: 1px dotted #057fd0; text-align: center;">

                                        <a href="#" onclick="document.getElementById('gestioneDocumento').id.value = '<?php echo $documento->id; ?>';
                                                document.getElementById('gestioneDocumento').action.value = 'visualizzaDocumento';
                                                document.getElementById('gestioneDocumento').submit();">

                                            <img src="applicazione/img/icone/view.png" alt="Visualizza" title="Visualizza" style="width: 25px; padding: 2px"/>
                                        </a>

                                    </td>
                                </tr>

    <?php
}
?>

                        </tbody>


                    </table>
                    <form action="index.php" id="gestioneDocumento" name="gestioneDocumento" method="post">
                        <input type="hidden" id="action" name="action">
                        <input type="hidden" id="id" name="id">
                    </form>
                    
                     <form action="index.php" id="schedaMorfologica" name="schedaMorfologica" method="post">
                        <input type="hidden" id="action" name="action" value="schedaMofologicaCliente">
                        <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">
                    </form>

                    <form action="index.php" id="schedaLaser" name="schedaLaser" method="post">
                        <input type="hidden" id="action" name="action" value="schedaLaserCliente">
                        <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">
                    </form>

                    <form action="index.php" id="schedaVisoCorpo" name="schedaVisoCorpo" method="post">
                        <input type="hidden" id="action" name="action" value="schedaVisoCorpoCliente">
                        <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">
                    </form>

                    <form action="index.php" id="gestioneCliente" name="gestioneCliente" method="post">
                        <input type="hidden" id="action" name="action" value="modificaCliente">
                        <input type="hidden" id="id" name="id" value="<?php echo $cliente->id; ?>">
                    </form>
                    
                    <form action="index.php" id="gestioneFidelityCard" name="gestioneFidelityCard" method="post">
                        <input type="hidden" id="action" name="action">
                        <input type="hidden" id="id" name="idCliente" value="<?php echo $cliente->id; ?>">
                        <?php if(isset($cardCliente)){?>
                        <input type="hidden" id="idCard" name="idCard" value="<?php echo $cardCliente->id; ?>">
                        <?php } ?>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <div style="clear:left;">&nbsp;</div>
    
    <div id="dialog-confirm-operation" title="Conferma l'operazione" style="display: none">
    <p>Vuoi Generare la Card?</p>
    <!--<p>The <i>content</i> can be full <b>HTML</b>.</p>-->
</div>
    
    <script>
$(function() {
        var buttonOperation = $("#button-operation");
        buttonOperation.button();
        buttonOperation.click(function(event) {
            event.preventDefault();
            $("#dialog-confirm-operation").dialog({
                resizable: true,
                height: "auto",
                width: 500,
                modal: true,
                buttons: {
                    "Conferma": function () {
                        //console.log("Genera");
                        $( "#gestioneFidelityCard" ).submit();
                        $(this).dialog("close");
                    },
                    Annulla: function () {
                       //console.log("annulla");
                        $(this).dialog("close");
                    }
                }
            });
        } );
    });
</script>