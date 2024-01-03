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
                                                <!--<a href="index.php?action=nuovoDipendente" class="btn btn-green" >Nuovo Dipendente</a>-->
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
                                            <div style="float: left; width: 50%; margin-top: 10px">
                                                <div>
                                                    
                                                </div>
                                                <div style="margin-top: 10px">
                                                    
                                                </div>
                                            </div>
                                            <div style="float: left; width: 50%">
                                                
                                            </div>
                                        </div>
                                        <div class="cleared"></div>
                                        <div style="margin-top: 20px;">
                                            <table class="documentoTable" style="margin: 0 auto;">
                                                <colgroup>
                                                    <col style="width: 80px;">
                                                    <col style="width: 350px;">
                                                    <col style="width: 40px;">
                                                    <col style="width: 40px;">
                                                    <col style="width: 75px;">
                                                    <col style="width: 60px;">
                                                    <col style="width: 60px;">
                                                    <col style="width: 60px;">
                                                    <col style="width: 80px;">
                                                    <col style="width: 70px;">
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th style="padding: 0">Qta</th>                                                    
                                                        <th style="padding: 0">Descrizione</th>
                                                        
                                                       
                                                        <th style="padding: 0">Importo</th>
                                                       <th style="padding: 0">Sc.</th>
<!--                                                         <th style="padding: 0">Sc 2</th>
                                                        <th style="padding: 0">Sc 3</th>-->
                                                        <th style="padding: 0">Totale</th>
                                                        <th style="padding: 0">Iva</th>
                                                    </tr>
                                                </thead>
                                                <tfoot></tfoot>
                                                <tbody>
                                                    <?php
                                                    $arrayAliquote = null;
                                                    for ($i = 0; $i < count($itemsDocumento); $i++) {
                                                        $item = $itemsDocumento[$i];
                                                        $arrayAliquote[$item->valoreIva] = $item->totaleRiga;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $item->qta; ?></td>
                                                            <td><?php echo $item->descrizione; ?></td>
                                                            
                                                           
                                                            <td style="text-align: right"><?php echo $item->prezzoUnitario; ?> €</td>
                                                           <td><?php echo $item->sconto1; ?></td>
<!--                                                             <td><?php echo $item->sconto2; ?></td>
                                                            <td><?php echo $item->sconto3; ?></td>-->
                                                            <td style="text-align: right"><?php echo $item->totaleRiga; ?> €</td>
                                                            <td style="text-align: right"><?php echo $item->valoreIva; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="cleared"></div>
                                        
                                       <div class="clear">&nbsp;</div>

                        <div style="background: #ddd; width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">
                            <!--<input type="radio" name="tipoDoc">&nbsp;Preventivo&nbsp;<input type="radio" name="tipoDoc">&nbsp;Fattura&nbsp;<input type="radio" name="tipoDoc">&nbsp;Documento Commerciale di Vendita o Prestazione-->
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central; font-size: 1.3em"><strong>TOTALE DOCUMENTO&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                <?php exit; if ($nTrattamenti > 0) { ?>
                                                    <label data-cell="G1" data-format="€ 0,0.00" data-formula="SUM(E1:E<?php echo $nTrattamenti; ?>)"></label>
                                                    <!---TOTALE DOCUMENTO, TOTALE IVA-->
                                                    


                                                <?php } else { ?>
                                                    <label data-cell="G1" data-format="€ 0,0.00">0,00</label>
                                                <?php } ?>
                                            </strong></div></td>
                                </tr>
                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central;"><strong>di cui IVA&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"></td>
                                </tr>
                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central;"><strong>Pagamento Contante&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                <?php if ($nTrattamenti > 0) { ?>
                                                    <label data-cell="G3" data-format="€ 0,0.00" data-formula="IF(MP1=2,0,IMP1)"></label>
                                                <?php } else { ?>
                                                    <label data-cell="G3" data-format="€ 0,0.00">0,00</label>
                                                <?php } ?>
                                            </strong></div></td>
                                </tr>

                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central;"><strong>Pagamento Elettronico&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                <?php if ($nTrattamenti > 0) { ?>
                                                    <label data-cell="G4" data-format="€ 0,0.00" data-formula="IF(MP1=2,G1,0)"></label>
                                                <?php } else { ?>
                                                    <label data-cell="G4" data-format="€ 0,0.00">0,00</label>
                                                <?php } ?>
                                            </strong></div></td>
                                </tr>
                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central;"><strong>Non Riscosso&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                <?php if ($nTrattamenti > 0) { ?>
                                                    <label data-cell="G5" data-format="€ 0,0.00" data-formula="IF(G1-IMP1<0,0,G1-IMP1)"></label>
                                                <?php } else { ?>
                                                    <label data-cell="G5" data-format="€ 0,0.00">0,00</label>
                                                <?php } ?>
                                            </strong></div></td>
                                </tr>

                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central;"><strong>Resto&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                <?php if ($nTrattamenti > 0) { ?>
                                                    <label data-cell="G6" data-format="€ 0,0.00" data-formula="IF(IMP1-G1<0,0, IMP1-G1)"></label>
                                                <?php } else { ?>
                                                    <label data-cell="G6" data-format="€ 0,0.00">0,00</label>
                                                <?php } ?>
                                            </strong></div></td>
                                </tr>

                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central;"><strong>Importo Pagato&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                <?php if ($nTrattamenti > 0) { ?>
                                                    <!--                                                <label data-cell="G7" data-format="€ 0,0.00" data-formula="IF(IMP1-G1=<0, IMP1, G1)"></label>-->
                                                    <label data-cell="G7" data-format="€ 0,0.00" data-formula="IF(IMP1-G1<=0, IMP1, G1)"></label>
                                                <?php } else { ?>
                                                    <label data-cell="G7" data-format="€ 0,0.00">0,00</label>
                                                <?php } ?>
                                            </strong></div></td>
                                </tr>


                            </table>

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


