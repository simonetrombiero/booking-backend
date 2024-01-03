<?php
global $aliquote, $listaPagamenti, $idTipoDocumento, $documento, $cliente, $fornitore, $itemsDocumento;

$idTipoDocumento = $documento->idTipoDocumento;
$maxIndiceByTipoDocumento = DAOFactory::getIndicedocumentoDAO()->loadMaxIndiceByTipo($idTipoDocumento);
$tipoDocumento = DAOFactory::getTipodocumentoDAO()->load($idTipoDocumento);
$sezione = DAOFactory::getSezioneDAO()->load($tipoDocumento->idSezione);
$tipo = DAOFactory::getTipoDAO()->load($tipoDocumento->idTipo);

$destinazioneMerceDoc = DAOFactory::getDestinazionemercedocDAO()->load($documento->idDestinazioneDoc);
$vettoriDocumento = DAOFactory::getVettoredocumentoDAO()->queryByIdDocumento($documento->id);
$vettoreDocumento = $vettoriDocumento[0];
if (!$documento->isDefinitivo) {
    $vettore = DAOFactory::getVettoreDAO()->load($vettoreDocumento->idVettore);
} else {
    $vettore = DAOFactory::getVettoredocumentodefinitivoDAO()->load($vettoreDocumento->idVettore);
}
?>
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
                                        <div style="width: 100%; background-color: #f3f3f3; padding: 4px;">
                                            <h2 class="headerPage" style="float: left">
                                                <?php echo $sezione->nomeSezione . " di " . $tipo->nomeTipo; ?>
                                            </h2>
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
                                        </div>
                                        <div style="margin-top: 20px">
                                            <div style="float: left; width: 50%; margin-top: 10px">
                                                <div>
                                                    <div style="float: left; width: 70px; font-weight: bold">
                                                        Indice: 
                                                    </div>
                                                    <div>
                                                        <?php
                                                        echo $documento->progressivo . "/" . $documento->anno;
                                                        ?>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 10px">
                                                    <div style="float: left; width: 70px; font-weight: bold">
                                                        Data:    
                                                    </div>
                                                    <div>
                                                        <?php echo dateFromDb($documento->data); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="float: left; width: 50%">
                                                <?php
                                                if ($cliente != null) {
//                                                    echo "Cliente: " . $cliente->denominazione;
                                                    echo "<b>Cliente:</b> $cliente->cognome $cliente->nome";
                                                } else if ($fornitore != null) {
                                                    echo "<b>Fornitore:</b> $fornitore->denominazione";
                                                }
                                                ?>
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
                                                        <th style="padding: 0">Codice</th>                                                        
                                                        <th style="padding: 0">Descrizione</th>
                                                        <th style="padding: 0">UM</th>
                                                        <th style="padding: 0">Qta</th>
                                                        <th style="padding: 0">Prezzo Uni.</th>
                                                        <th style="padding: 0">Sc 1</th>
                                                        <th style="padding: 0">Sc 2</th>
                                                        <th style="padding: 0">Sc 3</th>
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
                                                            <td><?php echo $item->codice; ?></td>
                                                            <td><?php echo $item->descrizione; ?></td>
                                                            <td><?php echo $item->um; ?></td>
                                                            <td><?php echo $item->qta; ?></td>
                                                            <td style="text-align: right"><?php echo $item->prezzoUnitario; ?> €</td>
                                                            <td><?php echo $item->sconto1; ?></td>
                                                            <td><?php echo $item->sconto2; ?></td>
                                                            <td><?php echo $item->sconto3; ?></td>
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
                                        <div id="destinazioneMerce" style="width: 100%; margin-top: 10px;">
                                            <table class="detailstable" style="width: 100%; border-collapse: separate" cellspacing="8" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <th style="width: 40%; text-align: left">INDIRIZZO DI DESTINAZIONE MERCI</th>
                                                        <th style="text-align: left">DETTAGLI SUL TRASPORTO</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="section" valign="top" style="background-color: #EEEEEE">
                                                            <table class="sectiontable" cellspacing="4" cellpadding="4" width="100%" border="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="border-bottom:1px solid #dadada; height: 20px" colspan="2">

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <b>
                                                                                <i>Destinatario (cognome e nome / ragione sociale)</i>
                                                                            </b>
                                                                            <br>
                                                                            <input type="text" disabled="disabled" style="width:90%;" value="<?php echo $destinazioneMerceDoc->nominativo; ?>">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <b>
                                                                                <i>Indirizzo (via, piazza, ...)</i>
                                                                            </b>
                                                                            <br>
                                                                            <input type="text" disabled="disabled" style="width:70%" value="<?php echo $destinazioneMerceDoc->indirizzo; ?>">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <b>
                                                                                <i>Città</i>
                                                                            </b>
                                                                            <br>
                                                                            <input type="text" style="width:80%" disabled="true" value="<?php echo $destinazioneMerceDoc->citta; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <b>
                                                                                <i>C.A.P.</i>
                                                                                <i style="margin-left:30px;">Prov.</i>
                                                                            </b>                                                                            
                                                                            <br>
                                                                            <input type="text" style="width:50px" disabled="true" value="<?php echo $destinazioneMerceDoc->cap; ?>">
                                                                            <input type="text" style="width:30px" disabled="true" value="<?php echo $destinazioneMerceDoc->provincia; ?>">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td class="section" valign="top"  style="background-color: #EEEEEE">
                                                            <table class="sectiontable" cellspacing="4" cellpadding="4" width="100%" border="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td id="trans-methods" style="border-bottom:1px solid #dadada;" colspan="3">
                                                                            <b>
                                                                                <i>Trasporto a mezzo:</i>
                                                                            </b>
                                                                            <input type="radio" id="mittente" checked="true" disabled="true" name="transport-method">
                                                                            Mittente 
                                                                            <input type="radio" id='destinatario' disabled="true" name="transport-method">
                                                                            Destinatario 
                                                                            <input type="radio" id="vettore" disabled="true" name="transport-method">
                                                                            Vettore
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <b>
                                                                                <i class="blue">Vettore / Conducente</i>
                                                                            </b>
                                                                            <br>
                                                                            <?php
                                                                            if (!isBlankOrNull($vettore->nominativo)) {
                                                                                echo $vettore->nominativo;
                                                                            } else {
                                                                                ?>
                                                                                <input id="nominativo" type="text" style="width:90%" name="nominativo" disabled="true">
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td width="100">
                                                                            <b>
                                                                                <i class="blue">Targa</i>
                                                                            </b>
                                                                            <br>
                                                                            <?php
                                                                            if (!isBlankOrNull($vettore->targa)) {
                                                                                echo $vettore->targa;
                                                                            } else {
                                                                                ?>
                                                                                <input id="targa" type="text" name="targa" style="width:80px" disabled="true">
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <b>
                                                                                <i class="blue">Data e ora consegna</i>
                                                                            </b>
                                                                            <br>
                                                                            <input id="dataConsegna" type="text" name="dataConsegna" disabled="true" style="width:90px" value="<?php
                                                                            if ($documento->dataConsegna != 0) {
                                                                                echo $documento->dataConsegna;
                                                                            }
                                                                            ?>">
                                                                            <input id="oraConsegna" type="text" name="oraConsegna" disabled="true" style="width:50px" value="<?php echo $documento->oraConsegna ?>">
                                                                        </td>
                                                                        <td colspan="2">
                                                                            <b>
                                                                                <i class="blue">Causale</i>
                                                                            </b>
                                                                            <br>
                                                                            <input id="causale" type="text" name="causale" style="width:90%" value="<?php echo $documento->causale; ?>" disabled="true">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <b>
                                                                                <i class="blue">Aspetto esteriore dei beni</i>
                                                                            </b>
                                                                            <br>
                                                                            <input id="aspetto" type="text" name="aspetto" style="width:80%" value="<?php echo $documento->aspetto; ?>">
                                                                        </td>
                                                                        <td width="145">
                                                                            <b>
                                                                                <i class="blue">N. colli</i>
                                                                                <i class="blue" style="margin-left:30px;">Peso</i>
                                                                            </b>
                                                                            <br>
                                                                            <input id="colli" type="text" name="colli" style="width:50px" disabled="true" value="<?php echo $documento->colli; ?>">
                                                                            <input id="peso" type="text" name="peso" style="width:50px" disabled="true" value="<?php echo $documento->pesoLordo ?>">
                                                                            Kg
                                                                        </td>
                                                                        <td>
                                                                            <b>
                                                                                <i class="blue">Porto</i>
                                                                            </b>
                                                                            <br>
                                                                            <input id="porto" type="text" name="porto" disabled="true" style="width:80px" value="<?php echo $documento->porto; ?>">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3">
                                                                            <b>
                                                                                <i class="blue">Spese di trasporto: </i>
                                                                            </b>
                                                                            <input id="speseTrasporto" type="text" name="speseTrasporto" style="width:60px" value="<?php echo number_format($documento->speseTrasporto, 2, ",", "") ?>">
                                                                            €
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="margin-top: 20px">
                                            <div style="width: 100%">
                                                <div style="width: 50%; float: left; text-align: left; font-weight: bold">
                                                    MODALITA' DI PAGAMENTO
                                                </div>
                                                <div style="width: 49%; float: left; text-align: right; font-weight: bold">
                                                    TOTALE DOCUMENTO: 
                                                    <label id='totaleDocumento'>
                                                        <?php
                                                        echo number_format($documento->totaleDocumento, 2, ",", "");
                                                        ?>
                                                    </label>
                                                </div>
                                                <div class="cleared"></div>
                                            </div>
                                            <div style="width: 100%; margin-top: 10px">
                                                <div style="text-align: left;">
                                                    <b>
                                                        Tipo Pagamento
                                                    </b>
                                                    <label style="margin-left: 10px">
                                                        <?php
                                                        $tipoPagamento = DAOFactory::getPagamentodocDAO()->load($documento->idPagamentoDoc);
                                                        echo $tipoPagamento->nome;
                                                        ?>
                                                    </label>
                                                </div>
                                                <div style="margin-top: 10px">
                                                    <div style="width: 45%; float: left; text-align: left; font-weight: bold; padding-left: 10px; background-color: #8bb847; padding-top: 5px; padding-bottom: 5px;">
                                                        ACCONTI
                                                    </div>
                                                    <div style="width: 50%; float: left; font-weight: bold; background-color: #8bb847; margin-left: 10px; padding-left: 10px; padding-top: 5px; padding-bottom: 5px;">
                                                        SCADENZE
                                                    </div>
                                                </div>
                                                <div class="cleared"></div>
                                                <div style="margin-top: 10px">
                                                    <div style="width: 45%; float: left; text-align: left; font-weight: bold; padding-left: 10px; padding-top: 5px; padding-bottom: 5px;">
                                                        <div id='tabellaAcconti' style="display: table; margin-bottom: 10px">
                                                            <div style="display: table-row; border-bottom: 1px solid">
                                                                <div style="display: table-cell; width: 150px;">
                                                                    Data Pagamento
                                                                </div>
                                                                <div style="display: table-cell; width: 100px;">
                                                                    Importo
                                                                </div>
                                                            </div>
                                                            <div style="padding: 3px">&nbsp;</div>
                                                            <?php
                                                            $acconti = DAOFactory::getAccontodocumentoDAO()->queryByIdDocumento($documento->id);
                                                            $totaleAcconti = 0;
                                                            for ($i = 0; $i < count($acconti); $i++) {
                                                                $acconto = $acconti[$i];
                                                                $totaleAcconti += $acconto->importo;
                                                                ?>
                                                                <div style="display: table-row">
                                                                    <div style="display: table-cell; width: 100px">
                                                                        <?php echo dateFromDb($acconto->data); ?>
                                                                    </div>
                                                                    <div style="display: table-cell; width: 100px;">
                                                                        <?php echo number_format($acconto->importo, 2, ",", ""); ?> €
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div style="width: 50%; float: left; font-weight: bold; margin-left: 10px; padding-left: 10px; padding-top: 5px; padding-bottom: 5px;">
                                                        <div style="display: table; margin-bottom: 10px;" id="tabellaPagamenti">
                                                            <div style="display: table-row; border-bottom: 1px solid">
                                                                <div style="display: table-cell; width: 150px;">
                                                                    Data Pagamento
                                                                </div>
                                                                <div style="display: table-cell; width: 100px;">
                                                                    Importo
                                                                </div>
                                                                <div style="display: table-cell; width: 100px">
                                                                    Saldato
                                                                </div>
                                                            </div>
                                                            <div style="padding: 3px">&nbsp;</div>
                                                            <?php
                                                            $pagamentiDoc = DAOFactory::getRatapagamentodocDAO()->queryByIdPagamentoDoc($documento->idPagamentoDoc);
                                                            for ($i = 0; $i < count($pagamentiDoc); $i++) {
                                                                $pagamentoDoc = $pagamentiDoc[$i];
                                                                ?>
                                                                <div style="display: table-row">
                                                                    <div style="display: table-cell; width: 150px">
                                                                        <?php echo dateFromDb($pagamentoDoc->data); ?>
                                                                    </div>
                                                                    <div style="display: table-cell; width: 100px;">
                                                                        <?php echo number_format($pagamentoDoc->importo, 2, ",", ""); ?> €
                                                                    </div>
                                                                    <div style="display: table-cell; width: 100px">
                                                                        <?php
                                                                        $checked = '';
                                                                        if ($pagamentoDoc->isPagato) {
                                                                            $checked = 'checked="checked"';
                                                                        }
                                                                        ?>
                                                                        <input id="checkPagato_<?php echo $i; ?>" type="checkbox" name="checkPagato" <?php echo $checked; ?> disabled="disabled">
                                                                        Pagato
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="cleared"></div>
                                                </div>
                                                <div>
                                                    <div style="width: 450px; float: left;">
                                                        <div style="width: 437px; margin-top: 20px; background-color: #CCE95B">
                                                            <i style="padding: 3px">Totale Acconti</i>
                                                            <span style="float: right; text-align: right; width: 231px; margin-right: 20px; font-weight: bold" id="accontiSaldati">
                                                                <?php
                                                                echo number_format($totaleAcconti, 2, ",", "");
                                                                ?> €
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div style="float: left">
                                                        <div class="cleared"></div>
                                                        <div style="width: 250px; margin-top: 20px; background-color: #CCE95B; float: left">
                                                            <i style="padding: 3px">Totale Ratetizzato</i>
                                                            <span style="text-align: right; float: right; margin-right: 20px; font-weight: bold" id="totaleRateizzato">
                                                                <?php
                                                                echo number_format($documento->totaleDocumento - $totaleAcconti, 2, ",", "");
                                                                ?> €
                                                            </span>
                                                        </div>
                                                        <div style="width: 225px; margin-top: 20px; background-color: #CCE95B; float: left; margin-left: 3px">
                                                            <i style="padding: 3px">Di cui Pagati</i>
                                                            <span style="text-align: right; float: right; margin-right: 10px; font-weight: bold" id="pagamentiSaldati">
                                                                <?php echo number_format($documento->totaleSaldato, 2, ",", ""); ?> €
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="cleared"></div>
                                                </div>
                                            </div>
                                            <div style="display: table; width: 100%">
                                                <div style="display: table-row">
                                                    <div style="display: table-cell; vertical-align: top">
                                                        <div style="text-align: left; font-weight: bold; margin-top: 20px">
                                                            RIEPILOGO IVA
                                                        </div>
                                                        <div style="margin-top: 10px">
                                                            <table id="tableRiepilogo">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="headerTableIva" style="width: 65px;">Aliquota</th>
                                                                        <th class="headerTableIva" style="width: 75px;">Imponibile</th>
                                                                        <th class="headerTableIva" style="width: 65px;">Imposta</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot></tfoot>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($arrayAliquote as $x => $x_value) {
                                                                        $totAliquota = $x_value * ($x / 100);
                                                                        ?>
                                                                        <tr>
                                                                            <td style="border: 1px solid #cccccc; height: 21px; padding: 0 4px; text-align: right"><?php echo $x; ?> %</td>
                                                                            <td style="border: 1px solid #cccccc; height: 21px; padding: 0 4px; text-align: right"><?php echo number_format($x_value, "2", ",", ""); ?> €</td>
                                                                            <td style="border: 1px solid #cccccc; height: 21px; padding: 0 4px; text-align: right"><?php echo number_format($totAliquota, "2", ",", ""); ?> €</td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div style="display: table-cell">
                                                        <div style="float: right; margin-top: 20px; width: 400px">
                                                            <div style="text-align: left; font-weight: bold">
                                                                RIEPILOGO DOCUMENTO
                                                            </div>
                                                            <div style="display: table; margin-left: 20px; margin-top: 10px; width: 300px">
                                                                <div style="display: table-row; border-bottom: 1px dotted; background-color: #8bb847; height: 10px; font-size: 14px; color: #FFFFFF">
                                                                    <div style="display: table-cell; padding: 2px">
                                                                        Imponibile
                                                                    </div>
                                                                    <div style="display: table-cell; text-align: right; padding: 2px;" id='imponibileDocumento'>
                                                                        <?php echo number_format($documento->imponibile, 2, ",", ""); ?> €
                                                                    </div>
                                                                </div>
                                                                <div style="padding: 2px;"></div>
                                                                <div style="display: table-row; border-bottom: 1px dotted">
                                                                    <div style="display: table-cell">
                                                                        Totale IVA
                                                                    </div>
                                                                    <div style="display: table-cell; text-align: right; padding: 2px;" id='ivaDocumento'>
                                                                        <?php echo number_format($documento->totaleIva, 2, ",", ""); ?> €
                                                                    </div>
                                                                </div>
                                                                <div style="padding: 2px;"></div>
                                                                <div style="display: table-row; border-bottom: 1px dotted">
                                                                    <div style="display: table-cell">
                                                                        Acconti Versati
                                                                    </div>
                                                                    <div style="display: table-cell; text-align: right; padding: 2px;" id='accontiDocumento'>
                                                                        <?php echo number_format($totaleAcconti, 2, ",", ""); ?> €
                                                                    </div>
                                                                </div>
                                                                <div style="display: table-row; border-bottom: 1px dotted">
                                                                    <div style="display: table-cell">
                                                                        Rate Saldate
                                                                    </div>
                                                                    <div style="display: table-cell; text-align: right; padding: 2px;" id='totaleRateDocumento'>
                                                                        <?php echo number_format($documento->totaleSaldato, 2, ",", ""); ?> €
                                                                    </div>
                                                                </div>
                                                                <div style="display: table-row; border-bottom: 1px dotted">
                                                                    <div style="display: table-cell">
                                                                        Da Pagare
                                                                    </div>
                                                                    <div style="display: table-cell; text-align: right; padding: 2px;" id='daPagareDocumento'>
                                                                        <?php echo number_format($documento->totaleDaSaldare, 2, ",", ""); ?> €
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cleared"></div>
                                            <div>
                                                <div>
                                                    Note
                                                </div>
                                                <div style="margin-top: 5px;">
                                                    <textarea style="width: 100%; resize: none" id="note" rows="5"><?php echo $documento->note; ?></textarea>
                                                </div>
                                            </div>
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