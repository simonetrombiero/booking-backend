<!--  <script type="text/javascript">
                        alert("uno");
                         var myItem = simpleCart.empty();
                         alert("due");
                         </script>-->
<?php
$daPrenotazione = false;
$nTrattamenti = 0;
if (!isBlankOrNull(getRequest("id"))) {
    $cliente = '';
    $idAppuntamento = getRequest("id");
    $appuntamento = DAOFactory::getPrenotazioniDAO()->load($idAppuntamento);
    //echo "<pre>";
    // print_r($appuntamento);

    $cliente = DAOFactory::getClientiDAO()->load($appuntamento->idCliente);
    //print_r($cliente);
    //var_dump($cliente);

    $daPrenotazione = true;
}

//echo trattamenti;
?>



<link href="applicazione/css/jquery-calx/bootstrap.css" rel="stylesheet" type="text/css">
<link href="applicazione/css/jquery-calx/sb-admin.css" rel="stylesheet" type="text/css">
<link href="applicazione/css/jquery-calx/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="applicazione/font-awesome/css/font-awesome.min.css" type="text/css">


<!--<script type="text/javascript" language="javascript" src="applicazione/js/simpleCart.js"></script>-->
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

                <!--                <div class="slider">-->
                <div>
                    <span class="titleTasti">Cerca Cliente:</span>&nbsp;<input id="cliente" name="cliente" type="text" style="width:80%; height:30px; border:1px solid #CCC; border-radius: 5px; padding-left:5px; padding-right:5px;">&nbsp;<input type="image" src="img/icone/view.png" width="30">


                </div>

                <!--<div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">-->
                <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px; display: none;" id="nuovoCliente">

                    <input type="text" name="nomeCliente" id="nomeCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Nome" />&nbsp;<input type="text" name="cognomeCliente"  id="cognomeCliente" placeholder="Cognome" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" required="" /><br>
                    <input type="text" name="telefonoCliente" id="telefonoCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Recapito Telefonico">&nbsp;<input type="text" name="codiceFiscaleCliente" id="codiceFiscaleCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Codice Fiscale">
                    <input type="hidden" id="idCliente" name="idCliente">
                <!--<input type="text"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="nome@dominio.ext" required>-->


                                    <!--<span class="titleTasti">Cerca Cliente:</span>&nbsp;<input type="text" style="width:80%; height:30px; border:1px solid #CCC; border-radius: 5px; padding-left:5px; padding-right:5px;">&nbsp;<input type="image" src="img/icone/view.png" width="30">-->

                </div>
            <?php } ?>


        </div>
    </div>
    <div style="clear:left;">&nbsp;</div>



    <div class="grid grid-pad">
        <div class="col-1-3">
            <!--<div class="slider">-->
            <div>
                <!-- INIZIO COLONNA 1 -->

                <div class="tab">
                    <button class="tablinks" onclick="openServizi(event, 'servizio1')" id="defaultOpen">Servizio 1</button>
                    <button class="tablinks" onclick="openServizi(event, 'servizio2')">Servizio 2</button>
                    <button class="tablinks" onclick="openServizi(event, 'prodotti')">Prodotti</button>
                </div>

                <div id="servizio1" class="tabcontent">
                  <!--<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>-->
                    <!--  <h3>Elenco Servizi 1</h3>-->
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
                                    <!--<p class="item_Description">descrizione servizio</p>-->
                                </div>
                            </td>





                            <?php
                            if ($i % 2 != 0) {
                                echo '</tr>';
                            }
                        }
                        ?>
                    </table>
<!--                        <table>
                        <tr>
                            <td>
                                <div class="simpleCart_shelfItem">
                                    <img src="img/imgServizio.jpg" alt="TRATTAMENTO 1" title="TRATTAMENTO 1" class="item_image"/>
                                    <h5 class="item_name">TRATTAMENTO 1</h5>

                                    &euro;&nbsp;<span class="item_price"><strong>10.00</strong></span>

<p class="item_Description">descrizione servizio</p>
                                    <p><input type="checkbox" name="scelta">&nbsp;preventivo</p>
                                    <input type="text" size="2" style="border: 1px solid #999;">&nbsp;  <noscript><a href="no_javascript.html" class="item_add">Aggiungi</a>;</noscript>
                                    <script>document.write('<a href="#" class="item_add">Aggiungi</a>');</script>
                                </div>
                            </td>
                            <td>
                                <div class="simpleCart_shelfItem">
                                    <img src="img/imgServizio.jpg" alt="TRATTAMENTO 2" title="TRATTAMENTO 2" class="item_image"/>
                                    <h5 class="item_name">TRATTAMENTO 2</h5>

                                    <span class="item_price"><strong>&euro;&nbsp;20.00</strong></span>

<p class="item_Description">descrizione servizio</p>
                                    <p><input type="checkbox" name="scelta2">&nbsp;preventivo</p>
                                    <noscript><a href="no_javascript.html" class="item_add">Aggiungi</a>;</noscript>
                                    <script>document.write('<a href="#" class="item_add">Aggiungi</a>');</script>
                                </div>  
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="simpleCart_shelfItem">
                                    <h5 class="item_name">TRATTAMENTO 3</h5>
                                    <span class="item_price"><strong>30.03</strong></span>
                                    <noscript><a href="no_javascript.html" class="item_add">Aggiungi</a>;</noscript>
                                    <script>document.write('<a href="#" class="item_add">Aggiungi</a>');</script>
                                    <p class="item_Description">descrizione servizio</p>
                                </div>  
                            </td>
                            <td>
                                <div class="simpleCart_shelfItem">
                                    <h5 class="item_name">TRATTAMENTO 4</h5>
                                    <span class="item_price"><strong>40.04</strong></span>
                                    <noscript><a href="#" class="item_add">Aggiungi</a>;</noscript>
                                    <script>document.write('<a href="#" class="item_add">Aggiungi</a>');</script>
                                    <p class="item_Description">descrizione servizio</p>
                                </div>  
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="shoppingcart-container"><div style="width:700px;" class="simpleCart_items"></div></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <div id="cartTotal"><strong>Total: </strong><span class="simpleCart_total"></span></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                                                    <noscript><a href="no_javascript.html" class="simpleCart_empty">Empty Cart</a>;</noscript>
                                                                        <script>document.write('<a href="#" class="simpleCart_empty">Empty Cart</a>');</script>
                            </td>
                            <td>
                                                                    <noscript><a href="no_javascript.html" class="simpleCart_checkout">Checkout</a>;</noscript>
                                                                        <script>document.write('<a href="#" class="simpleCart_checkout">Checkout</a>');</script>
                        </tr>
                    </table>-->


                    </p>
                </div>

                <div id="servizio2" class="tabcontent">
                  <!--<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>-->
                    <p>
                    <table>
                        <tr>
                            <td>
                                <div class="simpleCart_shelfItem">
                                    <h5 class="item_name">TRATTAMENTO 5</h5>
                                    <img src="img/imgServizio.jpg" alt="TRATTAMENTO 5" title="TRATTAMENTO 5" class="item_image"/>
                                    <span class="item_price"><strong>10.00</strong></span>
                                    <noscript><a href="no_javascript.html" class="item_add">Aggiungi</a>;</noscript>
                                    <script>document.write('<a href="#" class="item_add">Aggiungi</a>');</script>
                                    <p class="item_Description">descrizione servizio</p>
                                </div>
                            </td>
                            <td>
                                <div class="simpleCart_shelfItem">
                                    <h5 class="item_name">TRATTAMENTO 6</h5>
                                    <img src="img/imgServizio.jpg" alt="TRATTAMENTO 6" title="TRATTAMENTO 6" class="item_image"/>
                                    <span class="item_price"><strong>20.00</strong></span>
                                    <noscript><a href="no_javascript.html" class="item_add">Aggiungi</a>;</noscript>
                                    <script>document.write('<a href="#" class="item_add">Aggiungi</a>');</script>
                                    <p class="item_Description">descrizione servizio</p>
                                </div>  
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="simpleCart_shelfItem">
                                    <h5 class="item_name">TRATTAMENTO 7</h5>
                                    <span class="item_price"><strong>30.03</strong></span>
                                    <noscript><a href="no_javascript.html" class="item_add">Aggiungi</a>;</noscript>
                                    <script>document.write('<a href="#" class="item_add">Aggiungi</a>');</script>
                                    <p class="item_Description">descrizione servizio</p>
                                </div>  
                            </td>
                            <td>
                                <div class="simpleCart_shelfItem">
                                    <h5 class="item_name">TRATTAMENTO 8</h5>
                                    <span class="item_price"><strong>40.04</strong></span>
                                    <noscript><a href="#" class="item_add">Aggiungi</a>;</noscript>
                                    <script>document.write('<a href="#" class="item_add">Aggiungi</a>');</script>
                                    <p class="item_Description">descrizione servizio</p>
                                </div>  
                            </td>
                        </tr>
                        <tr>
                            <!--<td colspan="2" class="shoppingcart-container"><div style="width:700px;" class="simpleCart_items"></div></td>-->
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <!--<div id="cartTotal"><strong>Total: </strong><span class="simpleCart_total"></span></div>-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <!--					<noscript><a href="no_javascript.html" class="simpleCart_empty">Empty Cart</a>;</noscript>
                                                                        <script>document.write('<a href="#" class="simpleCart_empty">Empty Cart</a>');</script>-->
                            </td>
                            <td>
                                <!--					<noscript><a href="no_javascript.html" class="simpleCart_checkout">Checkout</a>;</noscript>
                                                                        <script>document.write('<a href="#" class="simpleCart_checkout">Checkout</a>');</script>-->
                        </tr>
                    </table>


                    </p>
                </div>

                <div id="prodotti" class="tabcontent">
                  <!--<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>-->
                    <h3>Elenco Prodotti</h3>
                    <p>Elenco</p>
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


                <!--FINE COLONNA 2 -->
            </div>
        </div>
        <div class="col-2-3">
            <!--<div class="slider">-->
            <div>
                <form class="form-horizontal" id="dynamic" action="index.php" method="post">
                    <input type="hidden" name="action" value="salvaVendita">


                    <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px;  height:auto; padding: 10px; min-height: 250px;">
                        <!--CONTENUTO RICEVUTA-->

                        <div class="shoppingcart-container" style="height: 350px;  overflow-y: scroll;">

                            <div style="width:100%;" class="simpleCart_items">

                                <!--<form class="form-horizontal" id="dynamic">-->

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
                                                    <td><input class="form-control input-sm text-right" data-cell="A<?php echo $i + 1; ?>" data-format="0" value="1"></td>
                                                    <td><input class="form-control input-sm" data-cell="B<?php echo $i + 1; ?>" value="<?php echo $trattamento->trattamento; ?>"></td>
                                                    <td><input class="form-control input-sm text-right" data-cell="C<?php echo $i + 1; ?>" data-format="€ 0,0.00" value="<?php echo $trattamento->costo; ?>"></td>
                                                    <td><input class="form-control input-sm text-right" data-cell="D<?php echo $i + 1; ?>" data-format="0[.]00 %"></td>
                                                    <td><input class="form-control input-sm text-right" data-cell="E<?php echo $i + 1; ?>" data-format="€ 0,0.00" data-formula="A<?php echo $i + 1; ?>*(C<?php echo $i + 1; ?>-(C<?php echo $i + 1; ?>*D<?php echo $i + 1; ?>))"></td>
                                                    <td><input class="form-control input-sm text-right" data-cell="F<?php echo $i + 1; ?>" data-format="0[.]00 %" value="<?php echo $aliquota->aliquota; ?>"><input type="hidden" name="iva[]" class="form-control input-sm text-right" data-cell="IVA<?php echo $i + 1; ?>" data-format="€ 0 0.00" data-formula="E<?php echo $i + 1; ?>-(E<?php echo $i + 1; ?>/(1+F<?php echo $i + 1; ?>))"></td>
                                                    <td class="text-center"><a class="btn-remove btn btn-sm btn-danger"><i class="fa fa-times fa-fw"></i></a></td>
                                                </tr>  



                                                <?php
                                            }
                                        }
                                        ?>              

                                    </tbody>
                                    <tfoot>
                                        <tr style="margin-top:30px">
                                            <td>
                                                <!--<button id="add_item" class="btn btn-sm btn-primary">Add Item</button>-->
                                            </td>
                                            <td colspan="4" class="text-right">
                                                <!--<label for="total">Total Price - Discount :</label>-->
                                            </td>
                                            <td class="text-right">
                                                <!--                                            <label data-cell="G1" data-format="$ 0,0.00" data-formula="SUM(F1:F5)"></label>-->
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
                                    <td style="width: 50%"><b>Importo Ricevuto</b><br><input type="text" name="importo" id="importo" data-cell="IMP1" data-format="€ 0,0.00" value="0" disabled=""></td>
                                </tr>
                            </table>



                        </div>
                        <div class="clear">&nbsp;</div>

                        <div style="background: #ddd; width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central; font-size: 1.3em"><strong>TOTALE DOCUMENTO&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                <?php if ($nTrattamenti > 0) { ?>
                                                    <label data-cell="G1" data-format="€ 0,0.00" data-formula="SUM(E1:E<?php echo $nTrattamenti; ?>)"></label>
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


                        <div class="clear">&nbsp;</div>
                        <!--                        <div style="width: 100%; border: 1px dotted #ccc;">
                                                    <div style="float: right; width: 50%;">/div>
                                                    <div style="width: 50%; text-align: right;">---</div>
                                                </div>-->
                        <div style="width: 100%; height: 60px; background-color: #f1f1f1;">
                            <h5 style="float: left; padding: 0px 15px; color: #366c88;">
                                Sconto / Abbuono (<b>€</b>)</h5>
                            <div style=" text-align: right; padding: 10px 15px;">
                                <input type="text" name="cicici" id="cicicici" style="width: 50%;">
                            </div>
                        </div>
                        <!--<div class="clear">&nbsp;</div>-->
                        <!-- QUERY SITUAZIONE CONTABILE-->

                        <div style="width: 100%; height: 60px; background-color: #f1f1f1;">
                            <h5 style="float: left; padding: 0px 15px; color: #fff;">
                                Sospesi </h5>
                            <div style="text-align: right; padding: 10px 15px; background: #F00;">
                                <span style="background: #F00; color: #FFF; font-weight: bold; width: 50%">
                                    € 50.00
                                </span>
                            </div>
                        </div>
                        <div style="width: 100%; height: 60px; background-color: #f1f1f1;">
                            <h5 style="float: left; padding: 0px 15px; color: #366c88;">
                                Fidelity Card </h5>
                            <div style=" text-align: right; padding: 10px 15px;">
                                <input type="text" name="cicici" id="cicicici" style="width: 50%;">
                            </div>
                        </div>



                        <div class="clear">&nbsp;</div>

                        <div style="text-align: right;">

                            <input type="submit" value="Chiudi Vendita" class="btn btn-blue">
                        </div> </div></form>
            </div> 


        </div>

    </div>


    <script type="text/javascript">

        // $(function () {
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

            }
        });

        //});


    </script>
    <script src="applicazione/js/jquery-calx/jquery-calx-sample-2.2.8.min.js" type="text/javascript"></script>
    <script src="applicazione/js/jquery-calx/bootstrap.js" type="text/javascript"></script>
    <script>
        $form = $('#dynamic').calx();
        $itemlist = $('#itemlist');

        //$counter = 0;
        $counter =<?php echo $nTrattamenti; ?>


        $('button').click(function (e) {
            //$(this + " div")
            var codice = $(this).attr("data-bind");
            var x = $(this).val();
            //var codice = $(this.item_name).html();

//                alert('conetuto ' + codice);

            if (codice == 'cart') {
                var qta = $('#quantita-' + x).val();
                var tratt = $('#trattamento-' + x).html();
                var cust = $('#costo-' + x).html();
                var iva = $('#iva-' + x).val();
                //var tot = cust*qta;
                //
//alert (tot);



                e.preventDefault();
                var keyCode = e.keyCode || e.which;

                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
                var i = ++$counter;



                $itemlist.append(
                        '<tr>\
                    <td><input class="form-control input-sm text-right" data-cell="A' + i + '" data-format="0" value="' + qta + '"></td>\
                    <td><input class="form-control input-sm" data-cell="B' + i + '" value="' + tratt + '"></td>\
                    <td><input class="form-control input-sm text-right" data-cell="C' + i + '" data-format="€ 0,0.00" value="' + cust + '"></td>\
                    <td><input class="form-control input-sm text-right" data-cell="D' + i + '" data-format="0[.]00 %"></td>\
                    <td><input class="form-control input-sm text-right" data-cell="E' + i + '" data-format="€ 0,0.00" data-formula="A' + i + '*(C' + i + '-(C' + i + '*D' + i + '))"></td>\
                    <td><input class="form-control input-sm text-right" data-cell="F' + i + '" data-format="0[.]00 %" value="' + iva + '"><input type="hidden" name="iva[]" class="form-control input-sm text-right" data-cell="IVA' + i + '" data-format="€ 0 0.00" data-formula="E' + i + '-(E' + i + '/(1+F' + i + '))"></td>\
                    <td class="text-center"><a class="btn-remove btn btn-sm btn-danger"><i class="fa fa-times fa-fw"></i></a></td>\
                </tr>'
                        );
                //console.log('new row appended');

                $form.calx('update');
                $form.calx('getCell', 'E' + i).calculate();

                //if($)

                $form.calx('getCell', 'G1').setFormula('SUM(E1:E' + i + ')');
                $form.calx('getCell', 'G1').calculate();

                $form.calx('getCell', 'G2').setFormula('SUM(IVA1:IVA' + i + ')');
                $form.calx('getCell', 'G2').calculate();

                $form.calx('getCell', 'G3').setFormula('IF(MP1=0,G1,0)');
                $form.calx('getCell', 'G3').calculate();

                $form.calx('getCell', 'G4').setFormula('IF(MP1=2,G1,0)');

                $form.calx('getCell', 'G7').setFormula('IF(MP1=0, G1, 0)');
                $form.calx('getCell', 'G7').calculate();


//                $form.calx('getCell', 'G3').setFormula('IF(MP1=2,0,IMP1)');
//
//                $form.calx('getCell', 'G4').setFormula('IF(MP1=2,G1,0)');
//
//                $form.calx('getCell', 'G5').setFormula('IF(G1-IMP1<0,0,G1-IMP1)');
//                $form.calx('getCell', 'G5').calculate();
//
//                $form.calx('getCell', 'G6').setFormula('IF(IMP1-G1<0,0, IMP1-G1)');
//                $form.calx('getCell', 'G6').calculate();
//
//                $form.calx('getCell', 'G7').setFormula('IF(IMP1-G1<=0, IMP1, G1)');
//
//                $form.calx('getCell', 'G7').calculate();

            }
            //console.log($form.calx('getSheet'));




        });
        $('#dynamic').on('change', '#modalitaPagamento', function () {

            var modPag = $('#modalitaPagamento').val();

            if (modPag == 2) {
                //alert("Pag");

                document.getElementById('importo').value = '0.00';

                $("#importo").prop("disabled", true);

                $form.calx('getCell', 'G3').setFormula('IF(MP1=2,0,IMP1)');

                $form.calx('getCell', 'G4').setFormula('IF(MP1=2,G1,0)');

                $form.calx('getCell', 'G5').setFormula('IF(MP1=2,0,0)');
                $form.calx('getCell', 'G5').calculate();

                $form.calx('getCell', 'G6').setFormula('IF(MP1=2,0,0)');
                $form.calx('getCell', 'G6').calculate();

                $form.calx('getCell', 'G7').setFormula('IF(MP1=2,G1,0)');

                $form.calx('getCell', 'G7').calculate();

            } else {
                document.getElementById('importo').value = '';
                $("#importo").prop("disabled", false);
                $("#importo").prop("required", true);

//               if(modPag == 1) {
//                    
//                    $form.calx('getCell', 'IMP1').setFormula('IF(MP1=1,G1,0)');
//                    $form.calx('getCell', 'IMP1').calculate();
//                }
                $form.calx('getCell', 'G3').setFormula('IF(MP1=2,0,IMP1)');

                $form.calx('getCell', 'G4').setFormula('IF(MP1=2,G1,0)');

                $form.calx('getCell', 'G5').setFormula('IF(G1-IMP1<0,0,G1-IMP1)');
                $form.calx('getCell', 'G5').calculate();

                $form.calx('getCell', 'G6').setFormula('IF(IMP1-G1<0,0, IMP1-G1)');
                $form.calx('getCell', 'G6').calculate();

                $form.calx('getCell', 'G7').setFormula('IF(IMP1-G1<=0, IMP1, G1)');

                $form.calx('getCell', 'G7').calculate();


            }


        });


        $('#itemlist').on('click', '.btn-remove', function () {

            $(this).parent().parent().remove();
            $form.calx('update');
            $form.calx('getCell', 'G1').calculate();

            $form.calx('getCell', 'G2').calculate();

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
//        $('#dynamic').on('keyup keypress', function(e) {
//  var keyCode = e.keyCode || e.which;
//  if (keyCode === 13) { 
//    e.preventDefault();
//    return false;
//  }
//});
    </script>