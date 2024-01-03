<?php
global $aliquote, $listaPagamenti, $idTipoDocumento, $documento, $cliente, $fornitore, $itemsDocumento;


$idTipoDocumento = $documento->idTipoDocumento;


//$maxIndiceByTipoDocumento = DAOFactory::getIndicedocumentoDAO()->loadMaxIndiceByTipo($idTipoDocumento);
$tipoDocumento = DAOFactory::getTipodocumentoDAO()->load($idTipoDocumento);
//$sezione = DAOFactory::getSezioneDAO()->load($tipoDocumento->idSezione);
//$tipo = DAOFactory::getTipoDAO()->load($tipoDocumento->idTipo);
//exit;
//$destinazioneMerceDoc = DAOFactory::getDestinazionemercedocDAO()->load($documento->idDestinazioneDoc);
//$vettoriDocumento = DAOFactory::getVettoredocumentoDAO()->queryByIdDocumento($documento->id);
//$vettoreDocumento = $vettoriDocumento[0];
//if (!$documento->isDefinitivo) {
//    $vettore = DAOFactory::getVettoreDAO()->load($vettoreDocumento->idVettore);
//} else {
//    $vettore = DAOFactory::getVettoredocumentodefinitivoDAO()->load($vettoreDocumento->idVettore);
//}
//exit;
?>
<div style="clear:left;">&nbsp;</div>
<div class="grid grid-pad">
    <div class="col-1-1">

        <div>
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                    <?php echo $tipoDocumento->nome; ?></h2>
                <div style=" text-align: right; padding: 10px 15px;">
                    <a href="index.php?action=contabilita" class="btn btn-green" >Lista Contabilità</a>
                </div>
            </div></div>


        <div class="sheet clearfix">
            <div class="layout-wrapper">
                <div class="content-layout">
                    <div class="content-layout-row">
                        <div class="layout-cell content">
                            <article class="post article">                            
                                <div class="postcontent postcontent-0 clearfix">
                                    <div class="content-layout">
                                        <div class="content-layout-row">
                                            <div class="layout-cell layout-item-0" style="width: 100%" >
                                                <!--                                        <div style="width: 100%; background-color: #f3f3f3; padding: 4px;"><?php echo $tipoDocumento->nome; ?>
                                                                                            
                                                                                            <div style="text-align: right">
                                                <?php
                                                if (isset($tipo)) {
                                                    ?>
                                                                                                            <a href="index.php?action=listaDocumenti&type=<?php echo $idTipoDocumento; ?>" class="button">
                                                                                                                Lista
                                                                                                            </a>
                                                    <?php
                                                }
                                                if (isset($documento)) {
                                                    ?>
                                                                                                            <a href="index.php?action=modificaDocumento&id=<?php echo $documento->id; ?>" class="button" >
                                                                                                                Modifica
                                                                                                            </a>
                                                    <?php
                                                }
                                                ?>
                                                                                            </div> 
                                                                                        </div>-->
                                                <!--INIZIO DOCUMENTO-->
                                                <div style="margin-top: 20px">
                                                    <table style="width: 100%;">
                                                        <tr>
                                                            <td style="width: 25%;"><div style="float: left; width: 70px; font-weight: bold">
                                                                    Indice: 
                                                                </div>
                                                                <div>
                                                                    <?php
                                                                    echo $documento->id . "/" . $documento->anno;
                                                                    ?>
                                                                </div></td>
                                                            <td style="width: 25%;"><div style="float: left; width: 70px; font-weight: bold">
                                                                    Data:    
                                                                </div>
                                                                <div>
                                                                    <?php echo dateFromDb($documento->data); ?>
                                                                </div></td>
                                                            <td><?php
                                                                if ($cliente != null) {
//                                                    echo "Cliente: " . $cliente->denominazione;
                                                                    echo "<b>Cliente:</b><br> $cliente->cognome $cliente->nome";
                                                                } else if ($fornitore != null) {
                                                                    echo "<b>Fornitore:</b> $fornitore->denominazione";
                                                                }
                                                                ?></td>
                                                        </tr>
                                                    </table>
                                                    <div style="clear:left;">&nbsp;</div>

                                                    <table style="width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th style="padding: 0; width: 10%; height: 35px; border-bottom: 1px dotted #CCC;">Qta</th>                                                    
                                                                <th style="padding: 0; width: 50%; border-bottom: 1px dotted #CCC;">Descrizione</th>


                                                                <th style="padding: 0; text-align: center; border-bottom: 1px dotted #CCC;">Importo</th>
                                                                <th style="padding: 0; text-align: center; border-bottom: 1px dotted #CCC;">Sc.</th>
                                                                <th style="padding: 0; text-align: center; border-bottom: 1px dotted #CCC;">Totale</th>
                                                                <th style="padding: 0; text-align: center; border-bottom: 1px dotted #CCC;">Iva</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $arrayAliquote = null;
                                                            for ($i = 0; $i < count($itemsDocumento); $i++) {
                                                                $item = $itemsDocumento[$i];
                                                                $arrayAliquote[$item->valoreIva] = $item->totaleRiga;
                                                                ?>
                                                                <tr>
                                                                    <td style="height: 30px; border-bottom: 1px dotted #CCC;"><?php echo $item->qta; ?></td>
                                                                    <td style="height: 30px; border-bottom: 1px dotted #CCC;"><?php echo $item->descrizione; ?></td>


                                                                    <td style="text-align: center; height: 30px; border-bottom: 1px dotted #CCC;"><?php echo $item->prezzoUnitario; ?> €</td>
                                                                    <td style="text-align: center; height: 30px; border-bottom: 1px dotted #CCC;"><?php echo $item->sconto1; ?></td>

                                                                    <td style="text-align: center; height: 30px; border-bottom: 1px dotted #CCC;"><?php echo $item->totaleRiga; ?> €</td>
                                                                    <td style="text-align: center; height: 30px; border-bottom: 1px dotted #CCC;"><?php echo $item->valoreIva; ?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>



                                                </div>

                                                <div style="clear:left;">&nbsp;</div>

                                                <div style="background: #ddd; width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">
                                                    <!--<input type="radio" name="tipoDoc">&nbsp;Preventivo&nbsp;<input type="radio" name="tipoDoc">&nbsp;Fattura&nbsp;<input type="radio" name="tipoDoc">&nbsp;Documento Commerciale di Vendita o Prestazione-->
                                                    <?php if($idTipoDocumento==3) {?>
                                                    
                                                    <table style="width: 100%; border-collapse: collapse;">
                                                        <tr>

                                                            <td style="width: 50%; text-align: right; vertical-align: central; font-size: 1.3em"><strong>TOTALE DOCUMENTO&nbsp;</strong></td>
                                                            <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                                        <?php echo $documento->totaleDocumento; ?></strong></div></td>
                                                        </tr>
                                                        <tr>

                                                            <td style="width: 50%; text-align: right; vertical-align: central;"><strong>di cui IVA&nbsp;</strong></td>
                                                            <td style="width: 50%; text-align: right; vertical-align: central;"><strong>€&nbsp;
                                                                    <?php echo $documento->totaleIva; ?></strong></td>
                                                        </tr>
                                                        </table>
                                                    
                                                    <?php }else{ ?>
                                                    <table style="width: 100%; border-collapse: collapse;">
                                                        <tr>

                                                            <td style="width: 50%; text-align: right; vertical-align: central; font-size: 1.3em"><strong>TOTALE DOCUMENTO&nbsp;</strong></td>
                                                            <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                                        <?php echo $documento->totaleDocumento; ?></strong></div></td>
                                                        </tr>
                                                        <tr>

                                                            <td style="width: 50%; text-align: right; vertical-align: central;"><strong>di cui IVA&nbsp;</strong></td>
                                                            <td style="width: 50%; text-align: right; vertical-align: central;"><strong>€&nbsp;
                                                                    <?php echo $documento->totaleIva; ?></strong></td>
                                                        </tr>
                                                        <tr>

                                                            <td style="width: 50%; text-align: right; vertical-align: central;"><strong>Modalità di Pagamento</strong></td>
                                                            <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>
                                                                        <?php
                                                                        
                                                                       
                                        if ($documento->idPagamentoDoc == 0) {
                                            echo 'Contante';
                                        } else {
                                            $pagamentoModalita = DAOFactory::getPagamentomodalitaDAO()->load($documento->idPagamentoDoc);
                                            echo $pagamentoModalita->descrizione;
                                        }
                                        ?>
                                                                        
                                                                        
                                                                       
                                                                    </strong></div></td>
                                                        </tr>

                                                        <tr>

                                                            <td style="width: 50%; text-align: right; vertical-align: central;"><strong>Importo Saldato</strong></td>
                                                            <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                                        <?php echo $documento->totaleSaldato; ?>
                                                                    </strong></div></td>
                                                        </tr>
                                                        <tr>

                                                            <td style="width: 50%; text-align: right; vertical-align: central;"><strong>Importo da Saldare</strong></td>
                                                            <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                                        <?php echo $documento->totaleDaSaldare; ?>
                                                                    </strong></div></td>
                                                        </tr>


                                                    </table>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


