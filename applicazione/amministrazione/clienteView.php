<style>
    #button-operation {
        background: #366c88;
        background-image: none;
        background-image: -webkit-linear-gradient(top, #366c88, #12243D);
        background-image: -moz-linear-gradient(top, #366c88, #12243D);
        background-image: -ms-linear-gradient(top, #366c88, #12243D);
        background-image: -o-linear-gradient(top, #366c88, #12243D);
        background-image: linear-gradient(to bottom, #366c88, #12243D);
        -webkit-border-radius: 10;
        -moz-border-radius: 10;
        border-radius: 10px;
        font-family: Arial;
        color: #ffffff;
        font-size: 20px;
        padding: 10px 15px 10px 15px;
        text-decoration: none;
    }
    .myButton {
        box-shadow: 0px 0px 0px 2px #9fb4f2;
        background:linear-gradient(to bottom, #7892c2 5%, #476e9e 100%);
        background-color:#7892c2;
        border-radius:10px;
        border:1px solid #4e6096;
        display:inline-block;
        cursor:pointer;
        color:#ffffff;
        font-family:Arial;
        font-size:15px;
        padding:8px 15px;
        text-decoration:none;
        text-shadow:0px 1px 0px #283966;
    }
    .myButton:hover {
        background:linear-gradient(to bottom, #476e9e 5%, #7892c2 100%);
        background-color:#476e9e;
    }
    .myButton:active {
        position:relative;
        top:1px;
    }

</style>
<?php
global $cliente, $cardCliente, $clientePrivacy;

//Privay setto a falso
$privacy = FALSE;

//if(isAdmin()){
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
            "order": [[0, "desc"]], //[0, "desc"]
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
                        SCHEDA CLIENTE: <?php echo $cliente->nome . " " . $cliente->cognome; ?></h2>
                        <div style=" text-align: right; padding: 10px 15px;">
                            <a href="index.php?action=clientiList" class="btn btn-green" >Lista Clienti</a>
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
                            <tr>
                                <td>Sesso </td>
                                <td>&nbsp;</td>
                                <td>
                                    <?php
                                    if ($cliente->sesso == 'M') {
                                        echo "Uomo";
                                    }
                                    ?>
                                    <?php
                                    if ($cliente->sesso == 'F') {
                                        echo "Donna";
                                    }
                                    ?>

                                </td>
                            </tr>
<!--                        <tr>
                            <td>Telefono</td>
                            <td>&nbsp;</td>
                            <td><?php //echo $cliente->telefono;    ?></td>
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
                        <td><a href="#" onclick="document.location = 'index.php?action=agenda'" class="btn btn-green" >(+) Appuntamento</a></td>
                        <td>&nbsp;</td>
                        <td><a href="#" onclick="document.getElementById('gestioneCliente').submit();" class="btn btn-green" >Modifica Anagrafica</a></td>
                    </tr>



                </table>   

                <p></p>
            </fieldset>
            <fieldset class="border">
                <legend>Privacy: </legend>
                <?php if (!$clientePrivacy) { ?>
                    <div style="background: #FF0000; color: #FFF; width: 100%; padding: 10px; font-weight: bold">ATTENZIONE: MANCA IL CONSENSO SUL TRATTAMENTO DEI DATI PERSONALI - PRIVACY<br><br>
                        <p style="text-align: right;"><button class="myButton" onclick="document.getElementById('gestionePrivacy').action.value = 'nuovoConsensoPrivacy'; document.getElementById('gestionePrivacy').submit();">Compila la Privacy</button></p>
                    </div>
                <?php } else { ?>
                    <!--<div style="background: #008000; color: #FFF; width: 100%; padding: 10px; font-weight: bold">CONSENSO SUL TRATTAMENTO DEI DATI PERSONALI - PRIVACY</div>-->
                    <div style="width: 100%; padding: 10px; font-weight: bold">
                        <p style="text-align: right;">
                            <button class="btn btn-green" onclick="document.getElementById('gestionePrivacy').action.value = 'visualizzaConsensoPrivacy'; document.getElementById('gestionePrivacy').submit();">Visualizza</button>
                        </p>
                    </div>
                <?php } ?>

            </fieldset>

        </div>
    </div>

    <div class="col-1-2">
        <div class="content">
            <fieldset class="border">
                <legend>Fidelity: </legend> 
                <div style=" text-align: right; padding: 10px 15px;">
                    <?php if (!isset($cardCliente)) { ?>
                        <!--<a href="#" id="button-operation" onclick="document.getElementById('gestioneFidelityCard').action.value = 'generaCard';" class="btn btn-green">Genera Card</a>-->
                        <button  type="button" id="button-operation" onclick="document.getElementById('gestioneFidelityCard').action.value = 'generaCard';" class="btn btn-green"> Genera Card</button>
                    <?php } else { ?>
                        <div style="text-align: left; font-weight: bold;">Saldo Punti: <?php echo formattaImportoEuropeo($cardCliente->saldoPunti); ?></div>
                        <a href="#" onclick="document.getElementById('gestioneFidelityCard').action.value = 'fidelityCardCaricaPuntiCliente'; document.getElementById('gestioneFidelityCard').submit();" class="btn btn-green" >Carica Punti</a>&nbsp;<a href="#" onclick="document.getElementById('gestioneFidelityCard').action.value = 'dettaglioFidelityCard'; document.getElementById('gestioneFidelityCard').submit();" class="btn btn-green" >Dettaglio</a>
                    <?php } ?>
                </div>

            </fieldset>
            <fieldset class="border">
                <legend>Piano Trattamenti: </legend> 
                <div style="float: left; width: 50%; padding: 10px 15px;">
                    <a href="#" onclick="document.getElementById('gestioneRichiami').submit();" class="btn btn-green">Richiami</a>
                </div>
                <div style="float: left; width: 50%; padding: 10px 15px;">
                    <a href="#" onclick="document.getElementById('pianoTerapeutico').submit();" class="btn btn-green">Piano Trattamenti</a>
                    <!--<a href="#" onclick="document.getElementById('schedaMorfologica').submit();" class="btn btn-green" >Visualizza</a>-->
                </div>


            </fieldset>

            <fieldset class="border">
                <legend>Note Operative</legend> 
                <div style="float: left; width: 50%; padding: 10px 15px;">
                    <a href="#" onclick="document.getElementById('schedaLaser').submit();" class="btn btn-green" >Laser</a>
                </div>
                <div style="float: left; width: 50%; padding: 10px 15px;">
                    <a href="#" onclick="document.getElementById('schedaVisoCorpo').submit();" class="btn btn-green" >Viso/Corpo</a>
                </div>

            </fieldset>

            <!--Documenti Sanitari - Inizio -->
            <fieldset class="border"> 
                <legend>Documenti</legend> 
                    <!--<div style="float: left; width: 50%; padding: 10px 15px;">
                       <a href="#" onclick="document.getElementById('schedaMorfologica').submit();" class="btn btn-green" >Nuovo</a>
                   </div>-->
                   <div style="float: left; width: 50%; padding: 10px 15px;">
                    <a href="#" onclick="document.getElementById('gestioneDocumentazione').submit();" class="btn btn-green" >Documenti</a>
                </div>

                <div style="float: left; width: 50%; padding: 10px 15px;">
                    <a href="#" onclick="document.getElementById('gestioneAnamnesi').submit();" class="btn btn-green" >Anamnesi</a>
                </div>

            </fieldset>
            <!--Documenti Sanitari - Fine -->

            <fieldset class="border">
                <legend>Amministrazione</legend> 
                <div style="float: left; width: 50%; padding: 10px 15px;">
                    <a href="#" onclick="document.getElementById('schedaMorfologica').submit();" class="btn btn-green" >Contabilità</a>
                </div>
                <div style="float: left; width: 50%; padding: 10px 15px;">
                    <a href="#" onclick="document.getElementById('schedaMorfologica').submit();" class="btn btn-green" >Preventivi</a>
                </div>

            </fieldset>
        </div>
    </div>
</div> 

<div style="clear:left;">&nbsp;</div>
<div class="grid grid-pad">
    <div class="col-1-1">
        <?php
            //$prossimePrenotazioni = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryProssimePrenotazioni($cliente->id);
        $prossimePrenotazioni = DAOFactory::getPrenotazioniDAO()->queryProssimePrenotazioni($cliente->id);
            //print_r($prossimePrenotazioni);
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
                        Piano Trattamento</th>
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
                                if (isset($prenotazione->idPiano)) {

                                    $pianotmp = DAOFactory::getPianoTrattamentoDAO()->load($prenotazione->idPiano);

                                    if (isset($pianotmp)) {
                                        echo $pianotmp->titolo;
                                    }
                                } else {
                                    echo 'singola prenotazione';
                                }
                                ?>
                            </td>
                            <td style="border-bottom: 1px dotted #057fd0;">
                                <!--                                    <a href="index.php?action=visualizzaAppuntamento&id=<?php //echo $prenotazione->id;  ?>"><img src="applicazione/img/icone/view.png" alt="visualizza prenotazione" title="visualizza prenotazione" style="width: 25px; padding: 2px"/></a>-->
                                <?php if (isset($pianotmp)) { ?>
                                    <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idPiano.value = '<?php echo $prenotazione->idPiano; ?>';
                                    document.getElementById('gestionePianoTrattamenti').action.value = 'visualizzaPiano';
                                    document.getElementById('gestionePianoTrattamenti').submit();">
                                    <img src="img/icone/view.png" alt="Visualizza Piano" title="Visualizza Piano" style="width: 25px; padding: 2px"/>
                                <?php } ?>
                            </a>
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
//$precedentePrenotazioni = DAOFactory::getPrenotazioniDAO()->queryPrecedentiprenotazioni($cliente->id);
//$trattamentiInCorso = DAOFactory::getPianoTrattamentoDAO()->queryPianoTrattamentoAperti($cliente->id);
        $trattamentiInCorso = DAOFactory::getPianoTrattamentoDAO()->queryPianoTrattamentoInCorsoDaEseguire($cliente->id);


            //print_r($trattamentiInCorso); 
        ?>
        <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
            <h2 style="float: left; padding: 0px 15px; color: #366c88;">
            PIANI TRATTAMENTI </h2>
            <div style=" text-align: right; padding: 10px 15px;">
                <a href="#"  onclick="document.getElementById('pianoTerapeutico').submit();" class="btn btn-green" >Archivio Piani Trattamenti</a>
            </div>



            <table style="width: 100%" id="datatablePrecedente">
                <thead>
                    <tr>

                        <th align="left">
                        Piano Trattameto  </th>
                        <th>Data Creazione</th>
                        <th>Stato</th>

                        <th>
                            Azioni
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
// echo "<pre>";
                    for ($i = 0; $i < count($trattamentiInCorso); $i++) {
                        $precedente = $trattamentiInCorso[$i];
                            /*
                              $trattamenti = DAOFactory::getPrenotazioniTrattamentiDAO()->queryByIdPrenotazione($precedente->id);
                              //print_r($trattamenti);
                              //echo $nTrattamenti = count($trattamenti);
                              $tratttt = '';
                              for ($k = 0; $k < count($trattamenti); $k++) {

                              $trattamento = DAOFactory::getTrattamentiDAO()->load($trattamenti[$k]->idTrattamento);
                              $tratttt .= $trattamento->trattamento . " ";
                          } */
                          ?>

                          <tr>

                            <td style="border-bottom: 1px dotted #057fd0;">
                                <span style="display: none"><?php echo $precedente->data; ?></span>
                                <?php
                                if (!isBlankOrNull($precedente->titolo)) {
                                    echo $precedente->titolo;
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
                                if (!isBlankOrNull($precedente->stato)) {
                                    $statotmp = DAOFactory::getPianoTrattamentoStatusDAO()->load($precedente->stato);
                                    echo $statotmp->descrizione;
                                }
                                ?>
                            </td>
                            <td style="border-bottom: 1px dotted #057fd0; text-align: center">
                                <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idPiano.value = '<?php echo $precedente->id; ?>';
                                document.getElementById('gestionePianoTrattamenti').action.value = 'visualizzaPiano';
                                document.getElementById('gestionePianoTrattamenti').submit();">
                                <img src="img/icone/view.png" alt="Visualizza Piano" title="Visualizza Piano" style="width: 25px; padding: 2px"/>
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
                            <th style="display:none">id</th>
                            <th align="left">
                            Data</th>

                            <th align="left">Tipo Pagamento</th>
                            <th>Importo</th>
                            <th>
                                Azioni
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($pagamenti); $i++) {

                            $pagamento = $pagamenti[$i];
                            ?>
                            <tr>
                                <td style="border-bottom: 1px dotted #057fd0;display:none"><?php echo $pagamento->id; ?></td>
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
                                <td style="border-bottom: 1px dotted #057fd0; text-align: center">
                                    <?php if($pagamento->id_piano != 0){ ?>
                                        <a href="#" onclick="document.getElementById('gestionePagamenti').idPiano.value = '<?php echo $pagamento->id_piano; ?>'; document.getElementById('gestionePagamenti').action.value = 'caricaPagamentiPiano'; document.getElementById('gestionePagamenti').submit();">
                                            <img src="img/icone/view.png" alt="Visualizza" title="Visualizza" style="width: 25px; padding: 2px"/>
                                        </a>
                                    <?php } ?>
                                </td>
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
        <!--DOCUMENTI CONTABILI-->
        <form action="index.php" id="gestioneDocumento" name="gestioneDocumento" method="post">
            <input type="hidden" id="action" name="action">
            <input type="hidden" id="id" name="id">
        </form>

        <!--DOCUMENTI SANITARI--> 
        <form action="index.php" id="gestioneDocumentazione" name="gestioneDocumentazione" method="post">
            <input type="hidden" id="action" name="action" value="listaDocumentazione">
            <!--<input type="hidden" id="id" name="id">-->
            <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">
        </form>
        <form action="index.php" id="gestioneAnamnesi" name="gestioneAnamnesi" method="post">
            <input type="hidden" id="action" name="action" value="anamnesiList">
            <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">
        </form>

        <form action="index.php" id="pianoTerapeutico" name="pianoTerapeutico" method="post">
            <input type="hidden" id="action" name="action" value="listaPianoTerapeutico">
            <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">
        </form>

        <form action="index.php" id="schedaMorfologica" name="schedaMorfologica" method="post">
            <input type="hidden" id="action" name="action" value="schedaMofologicaCliente">
            <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">
        </form>

        <form action="index.php" id="gestioneRichiami" name="gestioneRichiami" method="post">
            <input type="hidden" id="action" name="action" value="listaRichiamipz">
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
            <?php if (isset($cardCliente)) { ?>
                <input type="hidden" id="idCard" name="idCard" value="<?php echo $cardCliente->id; ?>">
            <?php } ?>
        </form>
        <form action="index.php" id="gestionePianoTrattamenti" name="gestionePianoTrattamenti" method="post">
            <input type="hidden" id="action" name="action">
            <input type="hidden" id="idCliente" name="idCliente">
            <input type="hidden" id="idPiano" name="idPiano">
        </form>  

        <form action="index.php" id="gestionePrivacy" name="gestionePrivacy" method="post">
            <input type="hidden" id="action" name="action">
            <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">

        </form> 

        <form action="index.php" id="gestionePagamenti" name="gestionePagamenti" method="post">
            <input type="hidden" id="action" name="action">
            <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">
            <input type="hidden" id="idPiano" name="idPiano">
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
    $(function () {
        var buttonOperation = $("#button-operation");
        buttonOperation.button();
        buttonOperation.click(function (event) {
            event.preventDefault();
            $("#dialog-confirm-operation").dialog({
                resizable: true,
                height: "auto",
                width: 500,
                modal: true,
                buttons: {
                    "Conferma": function () {
                            //console.log("Genera");
                        $("#gestioneFidelityCard").submit();
                        $(this).dialog("close");
                    },
                    Annulla: function () {
                            //console.log("annulla");
                        $(this).dialog("close");
                    }
                }
            });
        });
    });
</script>
<?php
//} else {
//    
//     echo 'SEZIONE IN ALLESTIMENTO';
//     
//} 
?>