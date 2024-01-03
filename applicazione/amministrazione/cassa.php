<?php
$daPrenotazione = false;
$nTrattamenti = 0;
if (!isBlankOrNull(getRequest("id"))) {
    $cliente = '';
    $idAppuntamento = getRequest("id");
    $appuntamento = DAOFactory::getPrenotazioniDAO()->load($idAppuntamento);

    $cliente = DAOFactory::getClientiDAO()->load($appuntamento->idCliente);

    $daPrenotazione = true;
}

?>



<link href="applicazione/css/jquery-calx/bootstrap.css" rel="stylesheet" type="text/css">
<link href="applicazione/css/jquery-calx/sb-admin.css" rel="stylesheet" type="text/css">
<link href="applicazione/css/jquery-calx/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="applicazione/font-awesome/css/font-awesome.min.css" type="text/css">

<style>
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }

    /* Style the close button */
    .topright {
        float: right;
        cursor: pointer;
        font-size: 28px;
    }

    .topright:hover {color: red;}

    .simpleCart_items div {
        float:left;
        position: relative;
        margin-right: 20px;
        display: table-row;

    }

    .simpleCart_shelfItem, .shoppingcart-container {
        border: 1px solid gray;
        padding: 1em;
    }
    .headerRow{
        font-weight: bold;
        /*        display: table-row;*/
    }
    .item-increment{
        /*        display: table-cell;*/
        border-bottom: 1px #000 dotted;
    }
    .item-decrement{
        /*        display: table-cell;*/
        border-bottom: 1px #000 dotted;
    }
    .item-quantity{
        /*        display: table-cell;*/
        border-bottom: 1px #000 dotted;
    }
    .item-name{
        /*        display: table-cell;*/
        border-bottom: 1px #000 dotted;
    }

    .item-price{
        /*        display: table-cell;*/
        border-bottom: 1px #000 dotted;
    }

    .item-total{
        /*        display: table-cell;*/
        border-bottom: 1px #000 dotted;
    }

    .item-remove{
        /*        display: table-cell;*/
        border-bottom: 1px #000 dotted;
    }
</style>
<script type="text/javascript">
    function setDocDef(val) {
        if (val == 3) {
            $('#documentoDefinitivo option[value=0]').prop('selected', true);
        } else {
            $('#documentoDefinitivo option[value=1]').prop('selected', true);
        }
    }
</script>

<link rel="stylesheet" href="applicazione/style/jquery-ui_completo.css" media="all">
<script type="text/javascript" src="applicazione/js/jquery-ui_completo.js"></script>

<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <?php if ($daPrenotazione) { ?>
                <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px; display: table;">
                    <div style="display: table-row; height: 35px">
                        <div  style="display: table-cell; width: 50%"><?php echo $cliente->nome; ?></div>
                        <div style="display: table-cell;width: 50%; padding: 5px;"><?php echo $cliente->cognome; ?></div>
                    </div> 
                    <div style="display: table-row; height: 35px">
                        <div  style="display: table-cell; width: 50%"><?php echo $cliente->cellulare; ?></div>
                        <div style="display: table-cell;width: 50%; padding: 5px;"><?php echo $cliente->cFiscale; ?></div>
                    </div> 
                </div>

            <?php } else { ?>  

                <div>
                    <span class="titleTasti">Cerca Cliente:</span>&nbsp;<input id="cliente" name="cliente" type="text" style="width:80%; height:30px; border:1px solid #CCC; border-radius: 5px; padding-left:5px; padding-right:5px;" required="">&nbsp;<input type="image" src="img/icone/view.png" width="30">
                </div>

                <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px; display: none;" id="nuovoCliente">
                    <input type="text" name="nomeCliente" id="nomeCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Nome" />&nbsp;<input type="text" name="cognomeCliente"  id="cognomeCliente" placeholder="Cognome" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" required="" /><br>
                    <input type="text" name="telefonoCliente" id="telefonoCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Recapito Telefonico">&nbsp;<input type="text" name="codiceFiscaleCliente" id="codiceFiscaleCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Codice Fiscale">
                </div>
            <?php } ?>

        </div>
    </div>
    <div style="clear:left;">&nbsp;</div>

<!--<button id="show_formula">Mostra Formule</button>-->
    <div class="grid grid-pad">
        <div class="col-1-3">
            <div>
                <div class="tab">
                    <button class="tablinks" onclick="openServizi(event, 'servizio1')" id="defaultOpen">Trattamenti</button>
                    <button class="tablinks" onclick="openServizi(event, 'prodotti')">Prodotti</button>
                </div>

                <div id="servizio1" class="tabcontent">
                    <p>
                        <table>
                            <?php
                            $listaTrattamentiTMP = DAOFactory::getTrattamentiDAO()->queryAll();
                            for ($i = 0; $i < count($listaTrattamentiTMP); $i++) {
                                $trattamento = $listaTrattamentiTMP[$i];
                                if ($i % 2 == 0) {
                                    echo '<tr>';
                                }
                                ?> 
                                <td style="width: 300px;">
                                    <div class="simpleCart_shelfItem" style="height: 200px;">
                                        <h5 class="item_name" id="trattamento-<?php echo $i; ?>"><?php echo $trattamento->trattamento; ?></h5>
                                        <strong>€&nbsp;<span class="item_price" id="costo-<?php echo $i; ?>" ><?php echo $trattamento->costo; ?></span></strong>
                                        <br><input type="number" name="quantita" id="quantita-<?php echo $i; ?>" value="1" style="width: 35px; height: 35px;">
                                        <?php $iva = DAOFactory::getAliquotaDAO()->load($trattamento->idAliquota); ?>
                                        <input type="hidden" name="iva" id="iva-<?php echo $i; ?>" value="<?php echo $iva->aliquota; ?>">
                                        <button id="add_item" class="btn btn-sm btn-primary" value="<?php echo $i; ?>" data-bind="cart">Aggiungi</button>
                                    </div>
                                </td>

                                <?php
                                if ($i % 2 != 0) {
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </table>
                    </p>
                </div>

                <div id="prodotti" class="tabcontent">
                    <p>
                    </p>
                </div>

                <script>
                    function openServizi(evt, cityName) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("tabcontent");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tablinks");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                        }
                        document.getElementById(cityName).style.display = "block";
                        evt.currentTarget.className += " active";
                    }

                    // Get the element with id="defaultOpen" and click on it
                    document.getElementById("defaultOpen").click();

                </script>


            </div>
        </div>
        <div class="col-2-3">
            <div>
                <form class="form-horizontal" id="dynamic" action="index.php" method="post">
                    <input type="hidden" name="action" value="salvaVendita">
                    <input type="hidden" id="idCliente" name="idCliente" <?php
                    if ($daPrenotazione) {
                        echo "value='$appuntamento->idCliente'";
                    }
                ?> >


                <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px;  height:auto; padding: 10px; min-height: 250px;">
                    <!--CONTENUTO RICEVUTA-->

                    <div class="shoppingcart-container" style="height: 350px;  overflow-y: scroll;">

                        <div style="width:100%;" class="simpleCart_items">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <td style="width:  5%" class="text-center"><label>Qtà</label></td>
                                        <td style="width: 35%"><label>Descrizione</label></td>
                                        <td style="width: 15%" class="text-center"><label>Importo</label></td>
                                        <td style="width:  10%" class="text-center"><label>Sc. %</label></td>
                                        <td style="width: 15%" class="text-center"><label>Totale</label></td>
                                        <td style="width: 10%" class="text-center"><label>Iva</label></td>
                                        <td style="width:  5%" class="text-center"><label></label></td>
                                    </tr>
                                </thead>
                                <tbody id="itemlist">

                                    <?php
                                    if ($daPrenotazione) {

                                        $trattamenti = DAOFactory::getPrenotazioniTrattamentiDAO()->queryByIdPrenotazione($appuntamento->id);
                                        $nTrattamenti = count($trattamenti);
                                        for ($i = 0; $i < count($trattamenti); $i++) {

                                            $trattamento = DAOFactory::getTrattamentiDAO()->load($trattamenti[$i]->idTrattamento);
                                            $aliquota = DAOFactory::getAliquotaDAO()->load($trattamento->idAliquota);
                                            ?>
                                            <tr>
                                                <td><input class="form-control input-sm text-right" data-cell="A<?php echo $i + 1; ?>" data-format="0" value="1" name="quantita[]"></td>
                                                <td><input class="form-control input-sm" data-cell="B<?php echo $i + 1; ?>" value="<?php echo $trattamento->trattamento; ?>" name="descrizione[]"></td>
                                                <td><input class="form-control input-sm text-right" data-cell="C<?php echo $i + 1; ?>" data-format="€ 0,0.00" value="<?php echo $trattamento->costo; ?>" name="importo[]"></td>
                                                <td><input class="form-control input-sm text-right" data-cell="D<?php echo $i + 1; ?>" data-format="0[.]00 %" name="sconto[]"></td>
                                                <td><input class="form-control input-sm text-right" data-cell="E<?php echo $i + 1; ?>" data-format="€ 0,0.00" data-formula="A<?php echo $i + 1; ?>*(C<?php echo $i + 1; ?>-(C<?php echo $i + 1; ?>*D<?php echo $i + 1; ?>))" name="totale[]"></td>
                                                <td><input class="form-control input-sm text-right" data-cell="F<?php echo $i + 1; ?>" data-format="0[.]00 %" value="<?php echo $aliquota->aliquota; ?>" name="aliquotaIva[]"><input type="hidden" name="iva[]" class="form-control input-sm text-right" data-cell="IVA<?php echo $i + 1; ?>" data-format="€ 0 0.00" data-formula="E<?php echo $i + 1; ?>-(E<?php echo $i + 1; ?>/(1+F<?php echo $i + 1; ?>))"></td>
                                                <td class="text-center"><a class="btn-remove btn btn-sm btn-danger"><i class="fa fa-times fa-fw"></i></a></td>
                                            </tr>  



                                        <?php }
                                        ?>

                                        <input type="hidden" name="idAppuntamento" value="<?php echo $idAppuntamento; ?>">

                                        <?php
                                    }
                                    ?>              

                                </tbody>
                                <tfoot>
                                    <tr style="margin-top:30px">
                                        <td>
                                        </td>
                                        <td colspan="4" class="text-right">
                                        </td>
                                        <td class="text-right">
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <!--</form>-->

                        </div>
                    </div>
                    <div class="clear">&nbsp;</div>
                    <div style="background: #ddd; width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">
                        <table style="width: 100%">
                            <tr>
                                <td style="width: 50%"><b>Modalità di Pagamento</b><br> 
                                    <?php $pagamentiModalita = DAOFactory::getPagamentomodalitaDAO()->queryAllOrderBy("priorita"); ?>
                                    <select name="modalitaPagamento" id="modalitaPagamento" data-cell="MP1" class="pippo">
                                        <option value="0">-- Seleziona --</option>
                                        <?php
                                        for ($i = 0; $i < count($pagamentiModalita); $i++) {
                                            $pagamento = $pagamentiModalita[$i];
                                            ?>
                                            <option value="<?php echo $pagamento->id; ?>" ><?php echo $pagamento->descrizione; ?></option>
                                            <?php
                                        }
                                        ?>


                                    </select></td>
                                    <td style="width: 50%"><b>Importo Ricevuto</b><br><input type="text" name="importoPagato" onkeyup="ricalcola_importi()" id="importoPagato" data-cell="IMP1" data-format="€ 0,0.00" value="0" disabled=""></td>
                                </tr>
                            </table>

                            <input type="hidden" name="totaleDocumento" data-cell="TOTDOC1" />
                            <input type="hidden" name="totaleIva" data-cell="TOTIVA1" />

                        </div>
                        <div class="clear">&nbsp;</div>

                        <div style="background: #ddd; width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central; font-size: 1.3em"><strong>TOTALE DOCUMENTO&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                        <?php if ($nTrattamenti > 0) { ?>
                                            <label data-cell="G1" data-format="€ 0,0.00" data-formula="SUM(E1:E<?php echo $nTrattamenti; ?>)"></label>
                                            <!---TOTALE DOCUMENTO, TOTALE IVA-->
                                            <input type="hidden" name="totaleDocumento" data-cell="TOTDOC1" data-formula="SUM(E1:E<?php echo $nTrattamenti; ?>)" />
                                            <input type="hidden" name="totaleIva" data-cell="TOTIVA1" data-formula="SUM(IVA1:IVA<?php echo $nTrattamenti; ?>)" />


                                        <?php } else { ?>
                                            <label data-cell="G1" data-format="€ 0,0.00">0,00</label>
                                        <?php } ?>
                                    </strong></div></td>
                                </tr>
                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central;"><strong>di cui IVA&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                        <?php if ($nTrattamenti > 0) { ?>
                                            <label data-cell="G2" data-format="€ 0,0.00" data-formula="SUM(IVA1:IVA<?php echo $nTrattamenti; ?>)"></label>
                                        <?php } else { ?>
                                            <label data-cell="G2" data-format="€ 0,0.00">0,00</label>
                                        <?php } ?>
                                    </strong></div></td>
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
                                            <label data-cell="G5" data-format="€ 0,0.00" data-formula="IF(G1-IMP1-SCO1<0,0,G1-IMP1-SCO1)"></label>
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
                                                        <label data-cell="G7" data-format="€ 0,0.00" data-formula="IF(IMP1-G1<=0, IMP1, G1)"></label>
                                                        <?php } else { ?>
                                                            <label data-cell="G7" data-format="€ 0,0.00">0,00</label>
                                                        <?php } ?>
                                                    </strong></div></td>
                                                </tr>


                                            </table>

                                        </div>


                                        <div class="clear">&nbsp;</div>
                                        <div style="width: 100%; height: 60px; background-color: #f1f1f1;">
                                            <h5 style="float: left; padding: 0px 15px; color: #366c88;">
                                                Sconto / Abbuono (<b>€</b>)</h5>
                                                <div style=" text-align: right; padding: 10px 15px;">
                                                    <input type="text" name="SCO1" data-cell="SCO1" data-format="€ 0,0.00" value="0" onkeyup="ricalcola_importi()" style="width: 50%;">
                                                </div>
                                            </div>
                                            <!-- QUERY SITUAZIONE CONTABILE-->
                                            <?php
                                            if ($daPrenotazione) {

                                                @$totaleDocumenti = DAOFactory::getClientidocDAO()->queryTotaleAllDocumenti($appuntamento->idCliente);

                                                $totalePagamenti = DAOFactory::getPagamentoDAO()->queryTotaleAllPagamenti($appuntamento->idCliente);



                                                if (isset($totaleDocumenti[0]->totale)) {
                                                    $allDocumentiTMP = $totaleDocumenti[0]->totale;
                                                } else {
                                                    $allDocumentiTMP = 0;
                                                }


                                                if (isset($totalePagamenti[0]->totalePagamenti)) {
                                                    $allPagamentiTMP = $totalePagamenti[0]->totalePagamenti;
                                                } else {
                                                    $allPagamentiTMP = 0;
                                                }





                                                @$situazionecontabile = $allDocumentiTMP - $allPagamentiTMP;

                                                if ($situazionecontabile > 0) {
                                                    ?>


                                                    <div style="width: 100%; height: 60px; background-color: #f1f1f1;">
                                                        <h5 style="float: left; padding: 0px 15px; color: #fff;">
                                                        Sospesi </h5>
                                                        <div style="text-align: right; padding: 10px 15px; background: #F00;">
                                                            <span style="background: #F00; color: #FFF; font-weight: bold; width: 50%">
                                                                € <?php echo $situazionecontabile; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                <?php } else {
                                                    ?>
                                                    <div style="width: 100%; height: 60px; background-color: #f1f1f1;">
                                                        <h5 style="float: left; padding: 0px 15px; color: #fff;">
                                                        Sospesi </h5>
                                                        <div style="text-align: right; padding: 10px 15px; background: #007700;">
                                                            <span style="background: #007700; color: #FFF; font-weight: bold; width: 50%">
                                                                &nbsp;
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <?php
                                                }
                                            }
                                            ?>
                                            <div id="sospesiCliente"></div>
                                            <div style="width: 100%; height: 60px; background-color: #f1f1f1;">
                                                <h5 style="float: left; padding: 0px 15px; color: #366c88;">
                                                Fidelity Card </h5>
                                                <div style=" text-align: right; padding: 10px 15px;">
                                                    <input type="text" name="fidelityCard" id="fidelityCard" style="width: 50%;" value="">
                                                </div>
                                            </div>



                                            <div class="clear">&nbsp;</div>

                                            <div style="background: #ddd; width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">
                                                <table style="width: 100%">
                                                    <tr>
                                                        <td style="width: 50%"><b>Documento</b><br> 
                                                            <select name="documentoDefinitivo" id="documentoDefinitivo" class="pippo">
                                                                <option value="0"> Aperto </option>
                                                                <option value="1" selected=""> Chiuso </option>



                                                            </select></td>
                                                            <td style="width: 50%"><b>Tipo Documento</b><br>
                                                                <select name="tipoDocumento" id="tipoDocumento" class="pippo" onchange="setDocDef(this.value)">
                                                                    <option value="1" selected="">Documento Commerciale di Vendita o Prestazione</option>
                                                                    <option value="2">Fattura</option>
                                                                    <option value="3">Preventivo</option>



                                                                </select></td>
                                                            </tr>
                                                        </table>



                                                    </div>
                                                    <div class="clear">&nbsp;</div>

                                                    <div style="text-align: right;">

                                                        <input type="submit" value="Chiudi Vendita" class="btn btn-blue">
                                                    </div> </div></form>
                                                </div> 


                                            </div>
                                        </div>

                                        <script type="text/javascript">
                                            $("#cliente").autocomplete({
                                                source: "index.php?action=searchCliente",
                                                minLength: 3,
                                                select: function (event, ui) {
                                                    document.getElementById('idCliente').value = '';

                                                    $("#idCliente").val(ui.item.id);

                                                    $("#nomeCliente").val(ui.item.nome);
                                                    $("#nomeCliente").prop("disabled", true);

                                                    $("#cognomeCliente").val(ui.item.cognome);
                                                    $("#cognomeCliente").prop("disabled", true);

                                                    $("#telefonoCliente").val(ui.item.telefono);
                                                    $("#telefonoCliente").prop("disabled", true);

                                                    $("#codiceFiscaleCliente").val(ui.item.codiceFiscale);
                                                    $("#codiceFiscaleCliente").prop("disabled", true);

                                                    $('#nuovoCliente').css('display', 'block');


                                                    var cliente = $("#idCliente").val();

                                                    $.ajax({
                                                        url: 'index.php?action=verificaSospesi',
                                                        method: 'POST',
                                                        data: {idCliente: cliente},
                                                        success: function (data) {
                                                            $('#sospesiCliente').html(data);
                                                        }
                                                    });

                                                    $.ajax({
                                                        url: 'index.php?action=fidelityCliente',
                                                        method: 'POST',
                                                        data: {idCliente: cliente},
                                                        success: function (data) {
                                                            data = JSON.parse(data);
                                                            $('#fidelityCard').val(data.codiceBarre);
                                                        }
                                                    });
                                                }
                                            });




                                        </script>
                                        <script src="applicazione/js/jquery-calx/jquery-calx-sample-2.2.8.min.js" type="text/javascript"></script>
                                        <script src="applicazione/js/jquery-calx/bootstrap.js" type="text/javascript"></script>
                                        <script>
                                            $form = $('#dynamic').calx();
                                            $itemlist = $('#itemlist');

                                            $counter =<?php echo $nTrattamenti; ?>


                                            $('button').click(function (e) {
                                                var codice = $(this).attr("data-bind");
                                                var x = $(this).val();

                                                if (codice == 'cart') {
                                                    var qta = $('#quantita-' + x).val();
                                                    var tratt = $('#trattamento-' + x).html();
                                                    var cust = $('#costo-' + x).html();
                                                    var iva = $('#iva-' + x).val();



                                                    e.preventDefault();
                                                    var keyCode = e.keyCode || e.which;

                                                    if (keyCode === 13) {
                                                        e.preventDefault();
                                                        return false;
                                                    }
                                                    var i = ++$counter;



                                                    $itemlist.append(
                                                        '<tr>\
                                                        <td><input class="form-control input-sm text-right" data-cell="A' + i + '" data-format="0" value="' + qta + '" name="quantita[]"></td>\
                                                        <td><input class="form-control input-sm" data-cell="B' + i + '" value="' + tratt + '" name="descrizione[]"></td>\
                                                        <td><input class="form-control input-sm text-right" data-cell="C' + i + '" data-format="€ 0,0.00" value="' + cust + '"  name="importo[]"></td>\
                                                        <td><input class="form-control input-sm text-right" data-cell="D' + i + '" data-format="0[.]00 %" name="sconto[]"></td>\
                                                        <td><input class="form-control input-sm text-right" data-cell="E' + i + '" data-format="€ 0,0.00" data-formula="A' + i + '*(C' + i + '-(C' + i + '*D' + i + '))" name="totale[]"></td>\
                                                        <td><input class="form-control input-sm text-right" data-cell="F' + i + '" data-format="0[.]00 %" value="' + iva + '" name="aliquotaIva[]"><input type="hidden" name="iva[]" class="form-control input-sm text-right" data-cell="IVA' + i + '" data-format="€ 0 0.00" data-formula="E' + i + '-(E' + i + '/(1+F' + i + '))"></td>\
                                                        <td class="text-center"><a class="btn-remove btn btn-sm btn-danger"><i class="fa fa-times fa-fw"></i></a></td>\
                                                        </tr>'
                                                        );

/*Legenda:
G1 = Totale Documento
G2 = IVA
G3 = Pagamento Contante
G4 = Pagamento Elettronico
G5 = Non Riscosso
G6 = Resto
G7 = Importo Pagato
*/
                                                    $form.calx('update');
                                                    $form.calx('getCell', 'E' + i).calculate();
                                                    $form.calx('getCell', 'IVA' + i).calculate();

                                                    $form.calx('getCell', 'G1').setFormula('SUM(E1:E' + i + ')');
                                                    $form.calx('getCell', 'G1').calculate();

                                                    $form.calx('getCell', 'G2').setFormula('SUM(IVA1:IVA' + i + ')');
                                                    $form.calx('getCell', 'G2').calculate();

                                                    $form.calx('getCell', 'G3').setFormula('IF(MP1=0,G1,0)');
                                                    $form.calx('getCell', 'G3').calculate();

                                                    $form.calx('getCell', 'G4').setFormula('IF(MP1=2,G1,0)');

                                                    $form.calx('getCell', 'G7').setFormula('IF(MP1=0, G1, 0)');
                                                    $form.calx('getCell', 'G7').calculate();

                                                    $form.calx('getCell', 'TOTDOC1').setFormula('SUM(E1:E' + i + ')');
                                                    $form.calx('getCell', 'TOTDOC1').calculate();

                                                    //$form.calx('getCell', 'TOTIVA1').setFormula('SUM(IVA1:IVA' + i + ')');
                                                    //$form.calx('getCell', 'TOTIVA1').calculate();

                                                    //$form.calx('getCell', 'G3').setFormula('IF(MP1=2,0,IMP1)');
                                                    //
                                                    //$form.calx('getCell', 'G4').setFormula('IF(MP1=2,G1,0)');
                                                    //
                                                    //$form.calx('getCell', 'G5').setFormula('IF(G1-IMP1<0,0,G1-IMP1)');
                                                    //$form.calx('getCell', 'G5').calculate();
                                                    //
                                                    //$form.calx('getCell', 'G6').setFormula('IF(IMP1-G1<0,0, IMP1-G1)');
                                                    //$form.calx('getCell', 'G6').calculate();
                                                    //
                                                    //$form.calx('getCell', 'G7').setFormula('IF(IMP1-G1<=0, IMP1, G1)');
                                                    //
                                                    //$form.calx('getCell', 'G7').calculate();

                                                }


                                            });
$('#dynamic').on('change', '#modalitaPagamento', function () {
    var modPag = $('#modalitaPagamento').val();

    if (modPag != 2 && modPag != 8) {
        document.getElementById('importoPagato').value = '';
    }
    ricalcola_importi();
});

function ricalcola_importi(){
    var modPag = $('#modalitaPagamento').val();
    var i = ++$counter;

    $form.calx('update');

    if (modPag == 2) {
        // Bancomat/Carta
        document.getElementById('importoPagato').value = '0.00';

        $("#importoPagato").prop("disabled", true);

        $form.calx('getCell', 'G3').setFormula('IF(MP1=2,0,IMP1)');

        $form.calx('getCell', 'G4').setFormula('IF(MP1=2,G1,0)');

        $form.calx('getCell', 'G5').setFormula('IF(MP1=2,0,0)');
        $form.calx('getCell', 'G5').calculate();

        $form.calx('getCell', 'G6').setFormula('IF(MP1=2,0,0)');
        $form.calx('getCell', 'G6').calculate();

        $form.calx('getCell', 'G7').setFormula('IF(MP1=2,G1,0)');

        $form.calx('getCell', 'G7').calculate();

        $form.calx('getCell', 'TOTDOC1').setFormula('SUM(E1:E' + i + ')');
        $form.calx('getCell', 'TOTDOC1').calculate();

        $form.calx('getCell', 'TOTIVA1').setFormula('SUM(IVA1:IVA' + i + ')');
        $form.calx('getCell', 'TOTIVA1').calculate();

    } else if (modPag == 8) {
        // Sospeso/Non Riscosso
        $("#importoPagato").prop("disabled", true);
        $("#importoPagato").prop("required", false);
        $form.calx('getCell', 'G5').setFormula('IF(MP1=8,G1,G1)');
        $form.calx('getCell', 'G5').calculate();

        $form.calx('getCell', 'TOTDOC1').setFormula('SUM(E1:E' + i + ')');
        $form.calx('getCell', 'TOTDOC1').calculate();

        $form.calx('getCell', 'TOTIVA1').setFormula('SUM(IVA1:IVA' + i + ')');
        $form.calx('getCell', 'TOTIVA1').calculate();

    } else {
        $("#importoPagato").prop("disabled", false);
        $("#importoPagato").prop("required", true);

        $form.calx('getCell', 'G5').setFormula('IF(G1-IMP1-SCO1<0,0,G1-IMP1-SCO1)');
        $form.calx('getCell', 'G5').calculate();

        $form.calx('getCell', 'G6').setFormula('IF(IMP1+SCO1-G1<0,0, IMP1+SCO1-G1)');
        $form.calx('getCell', 'G6').calculate();

        $form.calx('getCell', 'G7').setFormula('IF(IMP1-G1<=0, IMP1, G1)');
        $form.calx('getCell', 'G7').calculate();
    }
    $form.calx('update');
}


$('#itemlist').on('click', '.btn-remove', function () {

    $(this).parent().parent().remove();
    $form.calx('update');
    $form.calx('getCell', 'G1').calculate();

    $form.calx('getCell', 'G2').calculate();

    $form.calx('getCell', 'G3').calculate();

    $form.calx('getCell', 'G5').calculate();

    $form.calx('getCell', 'G6').calculate();

    $form.calx('getCell', 'G7').calculate();
});

$('#show_formula').click(function (e) {
    e.preventDefault();
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }

    if ($(this).attr('data-shown') == '0') {
        $('[data-formula],[data-cell]').each(function () {
            $(this).after('<span class="formula">' + $(this).attr('data-cell') + ($(this).attr('data-formula') ? ' = ' + $(this).attr('data-formula') : '') + '&nbsp;</span>');
        });

        $(this).attr('data-shown', 1).html('Hide Formula');
    } else {
        $('span.formula').remove();
        $(this).attr('data-shown', 0).html('Show Formula');
    }
});
</script>