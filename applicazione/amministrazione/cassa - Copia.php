<?php
$daPrenotazione = false;
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

    
    
    
<script type="text/javascript" language="javascript" src="applicazione/js/simpleCart.js"></script>
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
    }

    .simpleCart_shelfItem, .shoppingcart-container {
        border: 1px solid gray;
        padding: 1em;
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
                    <div class="slider"><span class="titleTasti">Cerca Cliente:</span>&nbsp;<input id="cliente" name="cliente" type="text" style="width:80%; height:30px; border:1px solid #CCC; border-radius: 5px; padding-left:5px; padding-right:5px;">&nbsp;<input type="image" src="img/icone/view.png" width="30">


                    </div>

                    <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">

                        <input type="text" name="cognomeCliente"  id="cognomeCliente" placeholder="Cognome" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" required="" />&nbsp;<input type="text" name="nomeCliente" id="nomeCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Nome" /><br>
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
            <div class="col-1-2">
                <div class="slider">
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
                            <tr>
                                <td>
                                    <div class="simpleCart_shelfItem">
                                        <img src="img/imgServizio.jpg" alt="TRATTAMENTO 1" title="TRATTAMENTO 1" class="item_image"/>
                                        <h5 class="item_name">TRATTAMENTO 1</h5>

                                        &euro;&nbsp;<span class="item_price"><strong>10.00</strong></span>

<!--<p class="item_Description">descrizione servizio</p>-->
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

<!--<p class="item_Description">descrizione servizio</p>-->
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
                        simpleCart({
                            checkout: {
                                type: "SendForm",
                                url: "https://sandbox.payfast.co.za/eng/process",

                                // HTTP method for form, "POST" 
                                method: "POST",

                                // URL to redirect browser to after successful checkout
                                success: "http://yourwebsite.co.za/success.html",

                                // URL to redirect browser to after checkout was cancelled by buyer
                                cancel: "http://yourwebsite.co.za/cancel.html",

                                extra_data: {
                                    currency_code: "ZAR",
                                    merchant_id: "10000100",
                                    merchant_key: "46f0cd694581a",
                                    notify_url: "http://yourwebsite.co.za/notify.html", //this is the ITN or callback URL
                                    amount: simpleCart.total, // Total amount = item1 + item2 + item3 etc
                                    name_first: "Buyer first name",
                                    name_last: "Buyer last name",
                                }
                            },
                            beforeCheckout: function (data) {
                                data.currency = "ZAR";
                                data.cancel_url = data.cancel_return;
                                data.return_url = data.return;
                                var payfast_description = '';
                                for (var key in data)
                                    if (key.match(/^item_name/))
                                        payfast_description += ' ' + data[key];
                                data.item_description = data.item_name = payfast_description;
                            }
                        });

                    </script>
                    <script type="text/javascript">
                        var myItem = simpleCart.empty();
                            //{attr: "name", label: "Descrizione"},
//                                {attr: "price", label: "Prezzo", view: 'currency'},
//                                {view: "decrement", label: false},
//                                {attr: "quantity", label: "Q.ta"},
//                                {view: "increment", label: false},
//                                {attr: "total", label: "SubTotale", view: 'currency'},
//                                {view: "remove", text: "Elimina", label: false}
    
    <?php
    
                        $trattamenti = DAOFactory::getPrenotazioniTrattamentiDAO()->queryByIdPrenotazione($appuntamento->id);
                        for ($i = 0; $i < count($trattamenti); $i++) {
                            $trattamento = DAOFactory::getTrattamentiDAO()->load($trattamenti[$i]->idTrattamento);
                            ?>
    
    var myItem = simpleCart.add({ name: "<?php echo $trattamento->trattamento; ?>" , quantity: 1,
                              price: <?php echo $trattamento->costo; ?> , total: <?php echo $trattamento->costo; ?> });
                          
                        <?php } ?>                      

    </script>

                    <!--FINE COLONNA 2 -->
                </div>
            </div>
            <div class="col-1-2">
                <div class="slider">
                    <form>
                        <!--                        <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">
                                            
                                                <input type="text" name="cognomeCliente"  id="cognomeCliente" placeholder="Cognome" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" required="" />&nbsp;<input type="text" name="nomeCliente" id="nomeCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Nome" /><br>
                                                <input type="text" name="telefonoCliente" id="telefonoCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Recapito Telefonico">&nbsp;<input type="text" name="codiceFiscaleCliente" id="codiceFiscaleCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Codice Fiscale">
                                                <input type="hidden" id="idCliente" name="idCliente">
                                            <input type="text"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="nome@dominio.ext" required>
                                           
                                            
                                            <span class="titleTasti">Cerca Cliente:</span>&nbsp;<input type="text" style="width:80%; height:30px; border:1px solid #CCC; border-radius: 5px; padding-left:5px; padding-right:5px;">&nbsp;<input type="image" src="img/icone/view.png" width="30">
                        <?php //include "slider.php";  ?>
                                                </div>-->
                        <p style="height: 10px;">&nbsp;</p>
                        <div style="width: 100%; height:auto; border: 1px solid #CCC; border-radius: 10px; padding: 10px; min-height: 250px;">
                            <!--CONTENUTO RICEVUTA-->

                            <div class="shoppingcart-container">

                                <div style="width:100%;" class="simpleCart_items">
                                    <!-- -->
                                    

                                </div>
                            </div>
                            <p style="height: 10px;">&nbsp;</p>
                            <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">
                                <table style="width: 100%; border-collapse: collapse;">
                                    <tr><td style="width: 35%; text-align: left;">Servizi</td><td style="width: 15%; text-align: right">0,00</td>
                                        <td rowspan="2" style="width: 35%; text-align: right; vertical-align: central;"><strong>TOTALE&nbsp;</strong></td><td rowspan="2" style="width: 15%; text-align: right; vertical-align: central;"><div id="cartTotal"><span class="simpleCart_total"></span></div></td></tr>
                                    <tr>
                                        <td style="width: 35%; text-align: left;">Rivendita</td><td style="width: 15%; text-align: right">0,00</td></tr>
                                    <tr>
                                        <td style="width: 35%; text-align: left;">Tessera</td><td style="width: 15%; text-align: right">0,00</td>
                                        <td style="width: 35%; text-align: right;">Totale Complessivo</td><td style="width: 15%; text-align: right">0,00</td></tr>
                                    <tr>
                                        <td style="width: 35%; text-align: left;">Sconto</td><td style="width: 15%; text-align: right">0,00</td>
                                        <td style="width: 35%; text-align: right;">Punti Fidelity</td><td style="width: 15%; text-align: right">0,00</td></tr>
                                </table>
                            </div>
                    </form>
                </div>
            </div>

        </div>


        <script type="text/javascript">



            //        function nuovoCliente() {
            //        $("#dialog-form-clienteNew").dialog({
            //        width: 600,
            //                modal: true,
            //                buttons: {
            //                "Salva": function() {
            //                var isNuovoCliente = "";
            //                        if (document.getElementById("isNuovoClienteByDialog")) {
            //                isNuovoCliente = document.getElementById("isNuovoClienteByDialog").value;
            //                }
            //                $.post("index.php?action=salvaCliente",
            //                {
            //                isNuovoByDialog: isNuovoCliente,
            //                        nomeCliente: document.getElementById("nomeCliente").value,
            //                        cognomeCliente: document.getElementById("cognomeCliente").value,
            //                        codFiscCliente: document.getElementById("codFiscCliente").value,
            //                        pIvaCliente: document.getElementById("pIvaCliente").value,
            //                        indirizzoCliente: document.getElementById("indirizzoCliente").value,
            //                        idComuneCliente: document.getElementById("idComuneCliente").value,
            //                        capCliente: document.getElementById("cap").value,
            //                        emailCliente: document.getElementById("emailCliente").value,
            //                        telefonoCliente: document.getElementById("telefonoCliente").value,
            //                        faxCliente: document.getElementById("faxCliente").value,
            //                        cellulareCliente: document.getElementById("cellulareCliente").value
            //                },
            //                        function(data) {
            //                        if (data != null && data != '') {
            //                        data = data[0];
            //                                $('#destinazioneMerce').show();
            //                                $('#indirizzoDestinazione').val(data["indirizzo"]);
            //                                if (data["ragione"] != '') {
            //                        $('#nominativoDestinazione').val(data["label"] + " / " + data["ragione"]);
            //                        } else {
            //                        $('#nominativoDestinazione').val(data["label"]);
            //                        }
            //                        $('#cittaDestinazione').val(data["citta"]);
            //                                $('#capDestinazione').val(data["cap"]);
            //                                $('#provinciaDestinazione').val(data["provincia"]);
            //                                $('#cliente').val(data["value"]);
            //                                $('#idCliente').val(data["id"]);
            //                                var destinazioni = '<option selected = "selected" value = "' + data['idDestinazione'] + '" > ';
            //                                destinazioni += data["indirizzo"];
            //                                destinazioni += '</option>';
            //                                document.getElementById('selectDestinazioni').innerHTML = destinazioni;
            //                        }
            //                        }, "json"
            //                        );
            //                        $(this).dialog("destroy");
            //                },
            //                        Cancel: function() {
            //                        $(this).dialog("destroy");
            //                        }
            //                },
            //                close: function() {
            //                document.getElementById('formCliente').reset();
            //                }
            //        });
            //        }



            $(function () {
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

                        $("#codiceFiscaleCliente").val(ui.item.codicefiscale);
                        $("#codiceFiscaleCliente").prop("disabled", true);

                    }
                });

            });


        </script>