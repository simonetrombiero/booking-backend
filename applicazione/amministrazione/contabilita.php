<?php
global $listaDocumenti, $listaPreventivi;

//$datiFatturePerCliente = DAOFactory::getClientidocDAO()->queryAllFattureDaSaldare();
$datiFatturePerCliente = DAOFactory::getClientidocDAO()->queryAllDocumentiDaSaldare();
//print_r($datiFatturePerCliente);
?>
<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->

            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <link rel="stylesheet" type="text/css" href="vendors/dataTables/jquery.dataTables.css">
            <script type="text/javascript" language="javascript" src="vendors/dataTables/jquery.dataTables.min.js"></script>
            <script type="text/javascript">
                $(function () {
                    $('#datatable').dataTable({
                        "order": [[0, "asc"]], //[0, "desc"]
                        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
                        "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
                    });

                    $('#datatableDocumenti').dataTable({
                        "order": [[0, "desc"]], //[0, "desc"]
                        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
                        "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
                    });

                    $('#datatablePreventivi').dataTable({
                        "order": [[0, "asc"]], //[0, "desc"]
                        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
                        "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
                    });

                });
            </script>





            <form action="index.php" id="gestioneCliente" name="gestioneCliente" method="post">
                <input type="hidden" id="action" name="action">
                <input type="hidden" id="id" name="id">
            </form>  
            
            <form action="index.php" id="gestioneDocumento" name="gestioneDocumento" method="post">
                <input type="hidden" id="action" name="action">
                <input type="hidden" id="id" name="id">
            </form>  



            <!--<div class="grid grid-pad">-->
                <!--<div class="col-1-1">-->
                    <div>
                        <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                            <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                                SOSPESI CLIENTI
                            </h2>
                            <div style=" text-align: right; padding: 10px 15px;">
                                <a href="index.php?action=nuovoPagamento" class="btn btn-green" >Nuovo Pagamento</a>
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
                                                <th align="left">Cliente</th>
                                                <th align="left">Documenti da Saldare                </th>
                                                <th align="left">Totale Documenti</th>


                                                <th align="left">
                                                    Importo Saldato
                                                </th>
                                                <th align="left">Importo da Saldare</th>
                                                <th>
                                                    Azioni
                                                </th>
                                            </tr>
                                        </thead>

                                        <tfoot></tfoot>
                                        <tbody>
                                            <?php
                                            for ($i = 0; $i < count($datiFatturePerCliente); $i++) {
                                                $datiCliente = $datiFatturePerCliente[$i];
                                                ?>
                                                <tr>
                                                    <td style="border-bottom: 1px dotted #057fd0;">
                                                     <a href="#" onclick="document.getElementById('gestioneCliente').id.value = '<?php echo $datiCliente['idCliente']; ?>';
                                                     document.getElementById('gestioneCliente').action.value = 'visualizzaSituazioneCliente';
                                                     document.getElementById('gestioneCliente').submit();" style="font-weight: bold;">  
                                                     <?php
                                                     echo $datiCliente['cognomeCliente'] . " " . $datiCliente['nomeCliente'];
                                                     ?>
                                                 </a>
                                             </td>
                                             <td style="border-bottom: 1px dotted #057fd0;"> 
                                                <?php
                                                echo $datiCliente['numeroFattureCliente'];
                                                ?>
                                            </td>
                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                <?php
                                                echo number_format($datiCliente['totaleFatture'], 2, ",", "") . " €";
                                                ?>

                                            </td>
                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                <?php
                                                echo number_format($datiCliente['totaleFattureSaldate'], 2, ",", "") . " €";
                                                ?>
                                            </td>

                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                <?php
                                                echo number_format($datiCliente['totaleFattureDaSaldare'], 2, ",", "") . " €";
                                                ?>
                                            </td>
                                            <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">

                                                <a href="#" onclick="document.getElementById('gestioneCliente').id.value = '<?php echo $datiCliente['idCliente']; ?>';
                                                document.getElementById('gestioneCliente').action.value = 'visualizzaSituazioneCliente';
                                                document.getElementById('gestioneCliente').submit();">
                                                <img src="img/icone/view.png" alt="Situazione Contabile" title="situazioneContabile" style="width: 25px; padding: 2px"/>
                                            </a>


                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>


                        <!--FINE--->


                    </div>
                    <div style="clear:left;">&nbsp;</div>
                    <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                        <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                            LISTA DOCUMENTI FISCALI
                        </h2>
                    </div>   
                    <div style="padding: 10px;">
                        <table style="width: 100%" id="datatableDocumenti">
                            <thead>
                                <tr>
                                    <th align="left">Numero / ID</th>
                                    <th align="left">Data</th>
                                    <th align="left">Tipo</th>
                                    <th align="left">Cliente</th>
                                    <th align="left">Totale</th>
                                    <th align="left">Importo Saldato</th>
                                    <th align="left">Importo da Saldare</th>
                                    <th>Azioni</th>
                                </tr>
                            </thead>

                            
                            <tbody>
                                <?php
                                for ($i = 0; $i < count($listaDocumenti); $i++) {
                                    $documento = $listaDocumenti[$i];
                                    ?>
                                    <tr>
                                        <td style="border-bottom: 1px dotted #057fd0; text-align: center"> 
                                            <?php
                                            echo intval($documento->id);
                                            ?>
                                        </td>
                                        <td style="border-bottom: 1px dotted #057fd0; text-align: center"> 

                                            <?php
                                            echo dateFromDb($documento->data);
                                            ?>
                                        </td>
                                        <td style="border-bottom: 1px dotted #057fd0;">
                                            <?php
                                            if (!isBlankOrNull($documento->idTipoDocumento)) {
                                                $tipo = DAOFactory::getTipodocumentoDAO()->load($documento->idTipoDocumento);
                                                echo $tipo->nome;
                                            }
                                    //   echo $documento->idTipoDocumento;
                                            ?>

                                        </td>
                                        <td style="border-bottom: 1px dotted #057fd0;">
                                            <?php
                                    //echo number_format($documento['totaleFattureSaldate'], 2, ",", "") . " €";
                                            if (!isBlankOrNull($documento->idClienteDoc)) {
                                                $cliente = DAOFactory::getClientidocDAO()->load($documento->idClienteDoc);
                                                echo $cliente->nome . " " . $cliente->cognome;
                                            }
                                            ?>
                                        </td>

                                        <td style="border-bottom: 1px dotted #057fd0;">
                                            <?php
                                            echo number_format($documento->totaleDocumento, 2, ",", "") . " €";
                                            ?>
                                        </td>
                                        <td style="border-bottom: 1px dotted #057fd0;"><?php
                                        echo number_format($documento->totaleSaldato, 2, ",", "") . " €";
                                    ?></td>
                                    <td style="border-bottom: 1px dotted #057fd0;"><?php
                                    echo number_format($documento->totaleDaSaldare, 2, ",", "") . " €";
                                ?></td>
                                <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">

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

        </div>

        <div style="clear:left;">&nbsp;</div>
        <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
            <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                LISTA PREVENTIVI
            </h2>
                <!--                                            <div style=" text-align: right; padding: 10px 15px;">
                                                                <a href="index.php?action=nuovoPagamento" class="btn btn-green" >Nuovo Pagamento</a>
                                                            </div>-->
                                                        </div>   
                                                        <div style="padding: 10px;">
                                                            <table style="width: 100%" id="datatablePreventivi">
                                                                <thead>
                                                                    <tr>
                                                                        <th align="left">Numero</th>
                                                                        <th align="left">Data</th>

                                                                        <th align="left">
                                                                            Stato
                                                                        </th>
                                                                        <th align="left">
                                                                            Cliente
                                                                        </th>


                                                                    </th>
                                                                    <th align="left">Totale</th>
                                                                    <th>
                                                                        Azioni
                                                                    </th>
                                                                </tr>
                                                            </thead>

                                                            <tfoot></tfoot>
                                                            <tbody>
                                                                <?php
                                                                for ($i = 0; $i < count($listaPreventivi); $i++) {
                                                                    $preventivo = $listaPreventivi[$i];
                                                                    ?>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px dotted #057fd0; text-align: center"> 
                                                                            <span style="display: none"><?php echo $preventivo->data; ?></span> 
                                                                            <?php
                                                                            echo $preventivo->id;
                                                                            ?>
                                                                        </td>
                                                                        <td style="border-bottom: 1px dotted #057fd0;"> 
                                                                            <?php
                                                                            echo $preventivo->data;
                                                                            ;
                                                                            ?>
                                                                        </td>
                                                                        <td style="border-bottom: 1px dotted #057fd0;">
                                                                            <?php
                                                                            if ($preventivo->isDefinitivo == 1) {
                                                                                echo "Chiuso";
                                                                            } else {
                                                                                echo 'Aperto';
                                                                            }
                                                                            ?>

                                                                        </td>
                                                                        <td style="border-bottom: 1px dotted #057fd0;">
                                                                            <?php
                                                                            if (!isBlankOrNull($preventivo->idClienteDoc)) {
                                                                                $cliente = DAOFactory::getClientidocDAO()->load($preventivo->idClienteDoc);
                                                                                echo $cliente->nome . " " . $cliente->cognome;
                                                                            }
                                                                            ?>
                                                                        </td>

                                                                        <td style="border-bottom: 1px dotted #057fd0;">
                                                                            <?php
                                                                            echo number_format($preventivo->totaleDocumento, 2, ",", "") . " €";
                                                                            ?>
                                                                        </td>
                                                                        <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">

                                                                            <a href="#" onclick="document.getElementById('gestioneDocumento').id.value = '<?php echo $preventivo->id; ?>';
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

                                                </div>
                                            </div>
                                            <div style="clear:left;">&nbsp;</div>

