<?php //

global $aliquote, $listaPagamenti, $idTipoDocumento;

//global $idTipoDocumento;
$idTipoDocumento = getRequest("type");
$anno = date("Y");
$maxIndiceByTipoDocumento = DAOFactory::getIndicedocumentoDAO()->loadMaxIndiceByTipo($idTipoDocumento, $anno);
$tipoDocumento = DAOFactory::getTipodocumentoDAO()->load($idTipoDocumento);
$sezione = DAOFactory::getSezioneDAO()->load($tipoDocumento->idSezione);
$tipo = DAOFactory::getTipoDAO()->load($tipoDocumento->idTipo);

?>

<script data-jsfiddle="common" src="applicazione/js/table/handsontable.full.js"></script>
<link data-jsfiddle="common" rel="stylesheet" media="screen" href="applicazione/style/table/handsontable.full.css">
<script data-jsfiddle="common" src="applicazione/js/documenti/jquery.handsontable.removeRow.js"></script>
<link data-jsfiddle="common" rel="stylesheet" media="screen" href="applicazione/style/table/handsontable.removeRow.css">

<link rel="stylesheet" href="applicazione/style/jquery-ui_completo.css" media="all">
<script type="text/javascript" src="applicazione/js/jquery-ui_completo.js"></script>
<script type="text/javascript" src="applicazione/js/php.js"></script>
<script type="text/javascript" src="applicazione/js/languages.js"></script>

<script type="text/javascript">
            var arrayTmp = new Array();
            var arrayPagamenti = new Array();
            var righeTabellaPagamenti = new Array();
            var righeTabellaAcconti = new Array();
            var righeTabellaIva = new Array();
            $(function() {
<?php
$aliquote = DAOFactory::getAliquotaDAO()->queryAll();
for ($i = 0; $i < count($aliquote); $i++) {
    $aliquota = $aliquote[$i];
    ?>
                arrayTmp[<?php echo $i ?>] = {id: '<?php echo $aliquota->id ?>', nome: '<?php echo $aliquota->nome ?>', valore: '<?php echo $aliquota->valore ?>'};
    <?php
}

for ($i = 0; $i < count($listaPagamenti); $i++) {
    $pagamento = $listaPagamenti[$i];
    $ratePagamento = DAOFactory::getRatapagamentoDAO()->queryByIdPagamento($pagamento->id);
    ?>
                var arrayRateTmp = new Array();
    <?php
    for ($j = 0; $j < count($ratePagamento); $j++) {
        $rata = $ratePagamento[$j];
        ?>
                    arrayRateTmp[<?php echo $j; ?>] = {id: '<?php echo $rata->id; ?>', giorni: '<?php echo $rata->giorni; ?>'};
        <?php
    }
    ?>
                arrayPagamenti[<?php echo $i; ?>] = {id: '<?php echo $pagamento->id; ?>', rate: arrayRateTmp};
    <?php
}
?>
            });
<?php
if (strpos($tipo->nomeTipo, "endit") > 0) {
    ?>
        function nuovoCliente() {
        $("#dialog-form-clienteNew").dialog({
        width: 600,
                modal: true,
                buttons: {
                "Salva": function() {
                var isNuovoCliente = "";
                        if (document.getElementById("isNuovoClienteByDialog")) {
                isNuovoCliente = document.getElementById("isNuovoClienteByDialog").value;
                }
                $.post("index.php?action=salvaCliente",
                {
                isNuovoByDialog: isNuovoCliente,
                        nomeCliente: document.getElementById("nomeCliente").value,
                        cognomeCliente: document.getElementById("cognomeCliente").value,
                        codFiscCliente: document.getElementById("codFiscCliente").value,
                        pIvaCliente: document.getElementById("pIvaCliente").value,
                        indirizzoCliente: document.getElementById("indirizzoCliente").value,
                        idComuneCliente: document.getElementById("idComuneCliente").value,
                        capCliente: document.getElementById("cap").value,
                        emailCliente: document.getElementById("emailCliente").value,
                        telefonoCliente: document.getElementById("telefonoCliente").value,
                        faxCliente: document.getElementById("faxCliente").value,
                        cellulareCliente: document.getElementById("cellulareCliente").value
                },
                        function(data) {
                        if (data != null && data != '') {
                        data = data[0];
                                $('#destinazioneMerce').show();
                                $('#indirizzoDestinazione').val(data["indirizzo"]);
                                if (data["ragione"] != '') {
                        $('#nominativoDestinazione').val(data["label"] + " / " + data["ragione"]);
                        } else {
                        $('#nominativoDestinazione').val(data["label"]);
                        }
                        $('#cittaDestinazione').val(data["citta"]);
                                $('#capDestinazione').val(data["cap"]);
                                $('#provinciaDestinazione').val(data["provincia"]);
                                $('#cliente').val(data["value"]);
                                $('#idCliente').val(data["id"]);
                                var destinazioni = '<option selected = "selected" value = "' + data['idDestinazione'] + '" > ';
                                destinazioni += data["indirizzo"];
                                destinazioni += '</option>';
                                document.getElementById('selectDestinazioni').innerHTML = destinazioni;
                        }
                        }, "json"
                        );
                        $(this).dialog("destroy");
                },
                        Cancel: function() {
                        $(this).dialog("destroy");
                        }
                },
                close: function() {
                document.getElementById('formCliente').reset();
                }
        });
        }
    <?php
} else if (strpos($tipo->nomeTipo, "cquisto") > 0) {
    ?>
        function nuovoFornitore() {
        $("#dialog-form-fornitoreNew").dialog({
        width: 600,
                modal: true,
                buttons: {
                "Salva": function() {
                },
                        Cancel: function() {
                        $(this).dialog("destroy");
                        }
                },
                close: function() {
                document.getElementById('formCliente').reset();
                }
        });
        }
    <?php
}
?>


    var destinazioniCliente = null;
            var clienteSelezionato = null;
            function aggiungiDestinazione() {
            $("#dialog-form-destinazioneNew").dialog({
//            height: 500,
            width: 600,
                    modal: true,
                    buttons: {
                    "Salva": function() {
                    var nominativoDestinazione = document.getElementById('nominativoDestinazioneDialog').value;
                            var indirizzoDestinazione = document.getElementById('indirizzoDestinazioneDialog').value;
                            var cittaDestinazione = document.getElementById('cittaDestinazioneDialog').value;
                            var capDestinazione = document.getElementById('capDestinazioneDialog').value;
                            var provinciaDestinazione = document.getElementById('provinciaDestinazioneDialog').value;
                            $.post("index.php?action=inserisciDestinazione",
                            {
                            idCliente: $('#idCliente').val(),
                                    nominativoDestinazione: nominativoDestinazione,
                                    indirizzoDestinazione: indirizzoDestinazione,
                                    cittaDestinazione: cittaDestinazione,
                                    capDestinazione: capDestinazione,
                                    provinciaDestinazione: provinciaDestinazione
                            },
                                    function(data) {
                                    if (data != null && data != '') {
                                    document.getElementById('nominativoDestinazione').value = nominativoDestinazione;
                                            document.getElementById('indirizzoDestinazione').value = indirizzoDestinazione;
                                            document.getElementById('cittaDestinazione').value = cittaDestinazione;
                                            document.getElementById('capDestinazione').value = capDestinazione;
                                            document.getElementById('provinciaDestinazione').value = provinciaDestinazione;
                                            var select = '<option selected="selected" value="' + data['idDestinazione'] + '">';
                                            select += data["indirizzo"];
                                            select += '</option>';
                                            var destinazioneObj = {
                                            id: data["idDestinazione"],
                                                    idCliente: clienteSelezionato,
                                                    destinazione: '',
                                                    indirizzo: data["indirizzo"],
                                                    cap: data["cap"],
                                                    citta: data["citta"],
                                                    provincia: data["provincia"],
                                                    nominativo: data["nominativo"]
                                            };
                                            destinazioniCliente[destinazioniCliente.length] = destinazioneObj;
                                            $('#selectDestinazioni').append(select);
                                    }
                                    }, "json"
                                    );
                            $(this).dialog("destroy");
                    },
                            Cancel: function() {
                            $(this).dialog("destroy");
                            }
                    },
                    close: function() {
                    document.getElementById('formCliente').reset();
                    }
            });
            }

    $(function() {
    $("#cliente").autocomplete({
    source: "index.php?action=searchCliente",
            minLength: 3,
            select: function(event, ui) {
           // $('#destinazioneMerce').show();
                    $('#indirizzoDestinazione').val(ui.item.indirizzo);
                    if (ui.item.ragione != '') {
            $('#nominativoDestinazione').val(ui.item.label + " / " + ui.item.ragione);
            } else {
            $('#nominativoDestinazione').val(ui.item.label);
            }
            $('#cittaDestinazione').val(ui.item.citta);
                    $('#capDestinazione').val(ui.item.cap);
                    $('#provinciaDestinazione').val(ui.item.provincia);
                    $('#cliente').val(ui.item.value);
                    $('#idCliente').val(ui.item.id);
                    clienteSelezionato = ui.item.id;
                    destinazioniCliente = ui.item.destinazioniMerce;
                    var destinazioni = '';
                    destinazioni += '<option value="0">';
                    destinazioni += ui.item.indirizzo;
                    destinazioni += '</option>';
                    for (var i = 0; i < destinazioniCliente.length; i++) {
            var destinazioneCliente = destinazioniCliente[i];
                    destinazioni += '<option value="' + destinazioneCliente.id + '">';
                    destinazioni += destinazioneCliente.indirizzo;
                    destinazioni += '</option>';
            }
            document.getElementById('selectDestinazioni').innerHTML = destinazioni;
            }
    });
            $("#fornitore").autocomplete({
    source: "index.php?action=searchFornitore",
            minLength: 3,
            select: function(event, ui) {
            $('#destinazioneMerce').show();
                    $('#indirizzoDestinazione').val(ui.item.indirizzo);
                    if (ui.item.ragione != '') {
            $('#nominativoDestinazione').val(ui.item.label + " / " + ui.item.ragione);
            } else {
            $('#nominativoDestinazione').val(ui.item.label);
            }
            $('#cittaDestinazione').val(ui.item.citta);
                    $('#capDestinazione').val(ui.item.cap);
                    $('#provinciaDestinazione').val(ui.item.provincia);
                    $('#cliente').val(ui.item.value);
                    $('#idCliente').val(ui.item.id);
                    clienteSelezionato = ui.item.id;
                    destinazioniCliente = ui.item.destinazioniMerce;
                    var destinazioni = '';
                    destinazioni += '<option value="0">';
                    destinazioni += ui.item.indirizzo;
                    destinazioni += '</option>';
                    for (var i = 0; i < destinazioniCliente.length; i++) {
            var destinazioneCliente = destinazioniCliente[i];
                    destinazioni += '<option value="' + destinazioneCliente.id + '">';
                    destinazioni += destinazioneCliente.indirizzo;
                    destinazioni += '</option>';
            }
            document.getElementById('selectDestinazioni').innerHTML = destinazioni;
            }
    });
    });
            function modificaPagamento(select) {
            var totaleDocumento = document.getElementById('totaleDocumento').innerHTML;
                    var accontiSaldati = document.getElementById('accontiSaldati').innerHTML;
                    document.getElementById('totaleRateDocumento').innerHTML = "0,00 €";
                    totaleDocumento = str_replace(",", ".", totaleDocumento);
                    accontiSaldati = str_replace(",", ".", accontiSaldati);
                    totaleDocumento = parseFloat(totaleDocumento) - parseFloat(accontiSaldati);
                    var numeroRate = 1;
                    document.getElementById('tabellaPagamenti').innerHTML = '';
                    righeTabellaPagamenti = new Array();
                    if (select != null && select.value != '') {
            for (var i = 0; i < arrayPagamenti.length; i++) {
            var pagamento = arrayPagamenti[i];
                    if (pagamento.id == select.value) {
            var ratePagamento = pagamento.rate;
                    if (ratePagamento.length != 0) {
            numeroRate = ratePagamento.length;
            }

            var sommaRate = 0;
                    for (var j = 0; j < ratePagamento.length; j++) {
            var importoRata = number_format(parseFloat(totaleDocumento) / numeroRate, 2);
                    sommaRate += parseFloat(importoRata);
            }

            var differenza = sommaRate - parseFloat(totaleDocumento);
                    for (var j = 0; j < ratePagamento.length; j++) {
            var rata = ratePagamento[j];
                    var importoRata = parseFloat(totaleDocumento) / numeroRate;
                    if (j == ratePagamento.length - 1) {
            importoRata = importoRata - differenza;
            }
            modificaTabellaPagamenti(importoRata, rata.giorni, j, rata.id);
            }
            }
            }
            } else {
            modificaTabellaPagamenti(totaleDocumento, 0, 0, select.value);
            }
            calcolaSaldoDocumento();
                    aggiornaRatePagamento();
            }

    function modificaDestinazione(value) {
    for (var i = 0; i < destinazioniCliente.length; i++) {
    var destinazione = destinazioniCliente[i];
            if (destinazione.id == value) {
    document.getElementById('nominativoDestinazione').value = destinazione.nominativo;
            document.getElementById('indirizzoDestinazione').value = destinazione.indirizzo;
            document.getElementById('cittaDestinazione').value = destinazione.citta;
            document.getElementById('capDestinazione').value = destinazione.cap;
            document.getElementById('provinciaDestinazione').value = destinazione.provincia;
    }
    }
    }
</script>
  <div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
        <div style="clear:left;">&nbsp;</div>
        <div class="grid grid-pad">
            <div class="col-1-1">
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
                                            <h2 class="headerPage">
                                                Creazione <?php echo $sezione->nomeSezione; ?>
                                            </h2>
                                        </div>
                                        <div id="messageErrorDialog" title="Attenzione!">

                                        </div>
                                        <div style="margin-top: 20px">
                                            <div style="font-weight: bold; font-size: 14px">
<?php echo $sezione->nomeSezione; ?> del <?php echo date("d/m/Y"); ?>
                                            </div>
                                            <div style="float: left; width: 50%; margin-top: 10px">
                                                <div>
                                                    <div style="float: left; width: 70px">
                                                        Indice: 
                                                    </div>
                                                    <div>
                                                        <input type="text" id="numeroDocumento" name="numeroDocumento" size="10" value="<?php echo $maxIndiceByTipoDocumento->progressivo; ?>"/>
                                                        /
                                                        <select id='indiceDocumento' name="indiceDocumento" style="height: 25px">
                                                            <option> ------- </option>
<?php
$anno = date("Y");
for ($i = $anno - 3; $i <= $anno; $i++) {
    $selected = '';
    if ($maxIndiceByTipoDocumento->anno == $i) {
        $selected = 'selected="selected"';
    }
    echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
}
?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 10px">
                                                    <div style="float: left; width: 70px">
                                                        Data:    
                                                    </div>
                                                    <div>
                                                        <input type="text" id="dataDocumento" name="dataDocumento" size="10" value="<?php echo date("d/m/Y"); ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="float: left; width: 50%">
                                                <div style="width: 70px; float: left">
<?php
if (strpos($tipo->nomeTipo, "endit") > 0) {
    ?>
                                                        Cliente:
    <?php
} else {
    ?>
                                                        Fornitore: 
    <?php
}
?>
                                                </div>
                                                <div>
                                                    <?php
                                                    if (strpos($tipo->nomeTipo, "endit") > 0) {
                                                        ?>
                                                        <input type="text" id="cliente" name="cliente" style="width: 60%"/>
                                                        <input type="hidden" id="idCliente" name="idCliente"/>
                                                        <a href="javascript: nuovoCliente()" class="button" style="height: 25px; line-height: 25px !important">Nuovo</a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <input type="text" id="fornitore" name="fornitore" style="width: 60%"/>
                                                        <input type="hidden" id="idFornitore" name="idFornitore"/>
                                                        <a href="javascript: nuovoFornitore()" class="button" style="height: 25px; line-height: 25px !important">Nuovo</a>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div id="datiCliente">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="cleared"></div>
                                        <!--<div style="margin-top: 20px;" class="handsontable" id="documento">-->
                                        <div style="margin-top: 70px;" class="handsontable" id="documento">

                                        </div>
                                        <div class="cleared"></div>
                                        <div id="destinazioneMerce" style="width: 100%; margin-top: 10px; display: none">
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
                                                                        <td style="border-bottom:1px solid #dadada;" colspan="2">
                                                                            <b>
                                                                                <i>Seleziona un indirizzo:</i>
                                                                            </b>
                                                                            <select id="selectDestinazioni" onchange="modificaDestinazione(this.value)" style="width:160px;">

                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <i>Destinatario (cognome e nome / ragione sociale)</i>
                                                                            <br>
                                                                            <input id="nominativoDestinazione" type="text" value="" style="width:90%">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <i>Indirizzo (via, piazza, ...)</i>
                                                                            <br>
                                                                            <input id="indirizzoDestinazione" type="text" value="" style="width:70%">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <i>Città</i>
                                                                            <br>
                                                                            <input id="cittaDestinazione" type="text" value="" style="width:80%">
                                                                        </td>
                                                                        <td>
                                                                            <i>C.A.P.</i>
                                                                            <i style="margin-left:30px;">Prov.</i>
                                                                            <br>
                                                                            <input id="capDestinazione" type="text" value="" style="width:50px">
                                                                            <input id="provinciaDestinazione" type="text" value="" style="width:30px">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
<!--                                                                            <i>Paese:</i>
                                                                            <select id="ship-country">
                                                                                <option value="ITA">Italy</option>
                                                                            </select>-->
                                                                            <a href="javascript: aggiungiDestinazione()" class="button" style="height: 20px; line-height: 20px; margin-top: 10px;">Aggiungi</a>
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
                                                                            <input type="radio" id="mittente" checked="true" onclick="selezionaMetodoTrasporto(this)" value="mittente" name="metodoTrasporto">
                                                                            Mittente 
                                                                            <input type="radio" id='destinatario' onclick="selezionaMetodoTrasporto(this)" value="destinatario" name="metodoTrasporto">
                                                                            Destinatario 
                                                                            <input type="radio" id="vettore" onclick="selezionaMetodoTrasporto(this)" value="vettore" name="metodoTrasporto">
                                                                            Vettore
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <i class="blue">Vettore / Conducente</i>
                                                                            <br>
                                                                            <input id="nominativo" type="text" value="" style="width:90%" name="nominativo">
                                                                        </td>
                                                                        <td width="100">
                                                                            <i class="blue">Targa</i>
                                                                            <br>
                                                                            <input id="targa" type="text" value="" style="width:80px" name="targa">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <i class="blue">Data e ora consegna</i>
                                                                            <br>
                                                                            <input id="dataConsegna" type="text" value="" style="width:90px" name="dataConsegna">
                                                                            <input id="oraConsegna" type="text" value="" style="width:50px" name="oraConsegna">
                                                                        </td>
                                                                        <td colspan="2">
                                                                            <i class="blue">Causale</i>
                                                                            <br>
                                                                            <input id="causale" type="text" value="" style="width:90%" name="causale">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <i class="blue">Aspetto esteriore dei beni</i>
                                                                            <br>
                                                                            <input id="aspetto" type="text" value="" style="width:80%" name="aspetto">
                                                                        </td>
                                                                        <td width="145">
                                                                            <i class="blue">N. colli</i>
                                                                            <i class="blue" style="margin-left:30px;">Peso</i>
                                                                            <br>
                                                                            <input id="colli" type="text" value="0" style="width:50px" name="colli">
                                                                            <input id="peso" type="text" value="0" style="width:50px" name="peso">
                                                                            Kg
                                                                        </td>
                                                                        <td>
                                                                            <i class="blue">Porto</i>
                                                                            <br>
                                                                            <input id="porto" type="text" value="" style="width:80px" name="porto">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3">
                                                                            <i class="blue">Spese di trasporto: </i>
                                                                            <input id="speseTrasporto" onkeyup="aggiungiSpese(this)" type="text" value="0,00" style="width:60px" name="speseTrasporto">
                                                                            €   
<!--                                                                            <i class="blue">Spese di imballaggio: </i>
                                                                            <input id="speseImballaggio" onkeyup="" type="text" value="0,00" style="width:60px">
                                                                            €-->
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
                                                <div style="width: 50%; float: left; text-align: right; font-weight: bold">
                                                    TOTALE DOCUMENTO: 
                                                    <label id='totaleDocumento'>
                                                        0,00
                                                    </label>
                                                </div>
                                                <div class="cleared"></div>
                                            </div>
                                            <div style="width: 100%; margin-top: 10px">
                                                <div style="text-align: left;">
                                                    Tipo Pagamento
                                                    <select style="width: 150px" onchange="modificaPagamento(this)" id="selectPagamenti">
                                                        <option value=""> - Seleziona Pagamento - </option>
<?php
for ($i = 0; $i < count($listaPagamenti); $i++) {
    $pagamento = $listaPagamenti[$i];
    ?>
                                                            <option value="<?php echo $pagamento->id ?>"><?php echo $pagamento->nome; ?></option>
    <?php
}
?>
                                                    </select>
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

                                                        </div>
                                                    </div>
                                                    <div style="width: 50%; float: left; font-weight: bold; margin-left: 10px; padding-left: 10px; padding-top: 5px; padding-bottom: 5px;">
                                                        <div style="display: table; margin-bottom: 10px;" id="tabellaPagamenti">

                                                        </div>
                                                    </div>
                                                    <div class="cleared"></div>
                                                </div>
                                                <div>
                                                    <div style="width: 450px; float: left;">
                                                        <a href="javascript: aggiungiAcconto()" class="button" style="height: 20px; line-height: 20px; margin-top: 10px">
                                                            Aggiungi
                                                        </a>
                                                        <div style="width: 437px; margin-top: 20px; background-color: #CCE95B">
                                                            <i style="padding: 3px">Totale Acconti</i>
                                                            <span style="float: right; text-align: right; width: 231px; margin-right: 20px; font-weight: bold" id="accontiSaldati">
                                                                0,00 €
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div style="float: left">
                                                        <a href="javascript: aggiungiPagamento()" class="button" style="height: 20px; line-height: 20px; margin-top: 10px">
                                                            Aggiungi
                                                        </a>
                                                        <div class="cleared"></div>
                                                        <div style="width: 250px; margin-top: 20px; background-color: #CCE95B; float: left">
                                                            <i style="padding: 3px">Totale Ratetizzato</i>
                                                            <span style="text-align: right; float: right; margin-right: 20px; font-weight: bold" id="totaleRateizzato">
                                                                0,00 €
                                                            </span>
                                                        </div>
                                                        <div style="width: 225px; margin-top: 20px; background-color: #CCE95B; float: left; margin-left: 3px">
                                                            <i style="padding: 3px">Di cui Pagati</i>
                                                            <span style="text-align: right; float: right; margin-right: 10px; font-weight: bold" id="pagamentiSaldati">
                                                                0,00 €
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
                                                                    <tr>
                                                                        <td style="border: 1px solid #cccccc; height: 21px; padding: 0 4px"></td>
                                                                        <td style="border: 1px solid #cccccc; height: 21px; padding: 0 4px"></td>
                                                                        <td style="border: 1px solid #cccccc; height: 21px; padding: 0 4px"></td>
                                                                    </tr>
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
                                                                        0,00 €
                                                                    </div>
                                                                </div>
                                                                <div style="padding: 2px;"></div>
                                                                <div style="display: table-row; border-bottom: 1px dotted">
                                                                    <div style="display: table-cell">
                                                                        Totale IVA
                                                                    </div>
                                                                    <div style="display: table-cell; text-align: right; padding: 2px;" id='ivaDocumento'>
                                                                        0,00 €
                                                                    </div>
                                                                </div>
                                                                <div style="padding: 2px;"></div>
                                                                <div style="display: table-row; border-bottom: 1px dotted">
                                                                    <div style="display: table-cell">
                                                                        Acconti Versati
                                                                    </div>
                                                                    <div style="display: table-cell; text-align: right; padding: 2px;" id='accontiDocumento'>
                                                                        0,00 €
                                                                    </div>
                                                                </div>
                                                                <div style="display: table-row; border-bottom: 1px dotted">
                                                                    <div style="display: table-cell">
                                                                        Rate Saldate
                                                                    </div>
                                                                    <div style="display: table-cell; text-align: right; padding: 2px;" id='totaleRateDocumento'>
                                                                        0,00 €
                                                                    </div>
                                                                </div>
                                                                <div style="display: table-row; border-bottom: 1px dotted">
                                                                    <div style="display: table-cell">
                                                                        Da Pagare
                                                                    </div>
                                                                    <div style="display: table-cell; text-align: right; padding: 2px;" id='daPagareDocumento'>
                                                                        0,00 €
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
                                                    <textarea style="width: 100%" id="note" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-top: 15px; text-align: right; margin-top: 20px">
                                            <button name="save" class="button">Salva</button>
                                        </div>
                                        <div id="dialog-form-clienteNew" title="Nuovo Cliente" style="display: none">
<?php
include_once 'applicazione/dialog/newClienteDialog.php';
?>
                                        </div>
                                        <div id="dialog-form-fornitoreNew" title="Nuovo Fornitore" style="display: none">
<?php
include_once 'applicazione/dialog/newFornitoreDialog.php';
?>
                                        </div>

                                        <div id="dialog-form-destinazioneNew" title="Nuova Destinazione" style="display: none">
                                            <?php
                                            include_once 'applicazione/dialog/newDestinazioneDialog.php';
                                            ?>
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
        <div style="clear:left;">&nbsp;</div>
                           
                
<script type="text/javascript">

            function submit() {
            document.getElementById('formAliquota').submit();
            }

    function pagamentoRata(check) {
    var totaleRate = str_replace(",", ".", document.getElementById('totaleRateDocumento').innerHTML);
            totaleRate = parseFloat(totaleRate);
            var pagamentoSplit = check.id.split("_");
            var numeroPagamento = pagamentoSplit[1];
            var importoPagamento = parseFloat(document.getElementById("importo_" + numeroPagamento).value);
            if (check.checked) {
    var importoPagato = number_format(importoPagamento + totaleRate, "2", ",", "");
            document.getElementById("totaleRateDocumento").innerHTML = importoPagato + " €";
            document.getElementById("pagamentiSaldati").innerHTML = importoPagato + " €";
            var rigaPagamento = '';
            rigaPagamento += '<div style="display: table-cell; width: 120px" id="divDataPagamento_' + numeroPagamento + '">';
            rigaPagamento += 'data <input id="dataPagamento_' + numeroPagamento + '" type="text" name="dataPagamento_' + numeroPagamento + '" size="10" value="' + date("d/m/Y") + '">';
            rigaPagamento += '</div>';
            $('#riga_' + numeroPagamento).append(rigaPagamento);
    } else {
    var importoPagato = number_format(totaleRate - importoPagamento, "2", ",", "");
            document.getElementById("pagamentiSaldati").innerHTML = importoPagato + " €";
            document.getElementById("totaleRateDocumento").innerHTML = number_format(totaleRate - importoPagamento, "2", ",", "") + " €";
            $('#divDataPagamento_' + numeroPagamento).remove();
    }
    calcolaSaldoDocumento();
    }

    var metodoTrasporto = 'mittente';
            function selezionaMetodoTrasporto(radio) {
            metodoTrasporto = radio.value;
            }

    $(function() {
    $("#dataDocumento").datepicker();
    });</script>

<script type="text/javascript">

            var data = [];
            var cellChanges = [];
            var arrayAliquote = new Array();
            var arrayPagamenti = new Array();
            var importoTmp = 0;
            var arrayProdotti = [];
            var totaleDocumento = 0;
            var indicePagamenti = 0;
            var indiceAcconti = 0;
            var container = $("#documento");
            var cellChanges = [];
            container.handsontable({
            data: data,
                    startRows: 1,
                    startCols: 10,
                    minSpareRows: 1,
                    minSpareCols: 1,
                    autoWrapRow: true,
                    contextMenu: false,
                    outsideClickDeselects: false,
                    currentRowClassName: 'currentRow',
                    currentColClassName: 'currentCol',
                    colWidths: [80, 350, 40, 40, 75, 60, 60, 60, 80, 70, 0],
                    colHeaders: ['Codice', 'Descrizione', 'UM', 'Qta', 'Prezzo Uni.', 'Sc 1', 'Sc 2', 'Sc 3', 'Totale', 'Iva', 'id'],
                    
                    removeRowPlugin: true,
                    columns: [
                        {data: 1},
                    {
                    data: 0,
                            type: 'autocomplete',
                            source: function(query, process) {
                            $.ajax({
                            url: 'index.php?action=trattamentiAutocomplete',
                                    dataType: 'json',
                                    data: {
                                    query: query
                                    },
                                    success: function(response) {
                                    arrayProdotti = response;
                                            var arraytmp = [];
                                            if (response != null) {
                                    for (var i = 0; i < response.length; i++) {
                                    arraytmp[i] = response[i].trattamento;
                                    }
                                    }
                                    process(arraytmp);
                                    }
                            });
                            },
                            strict: false
                    },
                    //{data: 1},
                    {data: 2},
                    {data: 3},
                    {
                    data: 4,
                            type: 'numeric',
                            format: '0,0.00 $',
                            language: 'it'
                    },
                    {data: 5},
                    {data: 6},
                    {data: 7},
                    {
                    data: 8,
                            type: 'numeric',
                            format: '0,0.00 $',
                            language: 'it'
                    },
                    {data: 9}
                    ],
                    beforeChange: function(data, source) {

                    if (source == 'modificaTotale') {
                    return;
                    }
                    var instance = $('#documento').data('handsontable');
                            var totaleDoc = 0;
                            var prodottoTrovato = false;
                            for (var i = 0; i < data.length; i++) {
                             //   alert (data[i][3]);
                         //alert (data[i][1]);
                    if (data[i][1] == 0) {
                        //alert (data[i][3]);
                        // alert (data[i][2]);
                    var codiceProdotto = data[i][3];
                    //alert(codiceProdotto);
                            if (null != arrayProdotti) {
                    for (var j = 0; j < arrayProdotti.length; j++) {
                    if (arrayProdotti[j].trattamento == codiceProdotto) {
                    prodottoTrovato = true;
                            data.push([data[i][0], 1, null, arrayProdotti[j].descrizione]);
                            data.push([data[i][0], 2, null, arrayProdotti[j].um]);
                            data.push([data[i][0], 3, null, 1]);
                            if (null != document.getElementById('idCliente')) {
                    data.push([data[i][0], 4, null, arrayProdotti[j].costo]);
                    } else if (null != document.getElementById('idFornitore')) {
                    data.push([data[i][0], 4, null, arrayProdotti[j].prezzoAcquisto]);
                    }

                    data.push([data[i][0], 5, null, "0"]);
                            data.push([data[i][0], 6, null, "0"]);
                            data.push([data[i][0], 7, null, "0"]);
                            if (null != document.getElementById('idCliente')) {
                    data.push([data[i][0], 8, null, arrayProdotti[j].costo]);
//                                    instance.setDataAtCell(data[i][0], 8, arrayProdotti[j].costo);
                    } else if (null != document.getElementById('idFornitore')) {
                    data.push([data[i][0], 8, null, arrayProdotti[j].prezzoAcquisto]);
//                                    instance.setDataAtCell(data[i][0], 8, arrayProdotti[j].prezzoAcquisto);
                    }
                    for (var k = 0; k < arrayTmp.length; k++) {
                    if (arrayTmp[k].id == arrayProdotti[j].idAliquota) {
//                                        instance.setDataAtCell(data[i][0], 9, parseInt(arrayTmp[k].valore));
                    data.push([data[i][0], 9, null, parseInt(arrayTmp[k].valore)]);
                    }

                    }
                    data.push([data[i][0], 10, null, arrayProdotti[j].id]);
                    }
                    }
                    if (!prodottoTrovato) {
                    data.push([data[i][0], 1, null, ""]);
                            data.push([data[i][0], 2, null, ""]);
                            data.push([data[i][0], 3, null, 1]);
                            data.push([data[i][0], 4, null, "0"]);
                            data.push([data[i][0], 5, null, "0"]);
                            data.push([data[i][0], 6, null, "0"]);
                            data.push([data[i][0], 7, null, "0"]);
                            data.push([data[i][0], 8, null, "0"]);
                            data.push([data[i][0], 9, null, "0"]);
                            data.push([data[i][0], 10, null, null]);
                    }
                    }
                    }
                    }
                    },
                    afterChange: function(changes, source) {

                    var instance = $('#documento').data('handsontable');
                            if (changes != null) {
//            alert(source);
                    var totTmp = 0;
                            var rigaTmp = 0;
                            var ivaNew = 0;
                            var prezzoUniNew = 0;
                            var totNew = 0;
                            var qtaTmpNew = 0;
                            if (source == 'modificaTotale') {
                    return;
                    }

                    if (changes[0][1] == 3) {
                    qtaTmpNew = parseFloat(changes[0][3]);
                    }
                    if (changes[0][1] == 4) {
                    prezzoUniNew = parseFloat(changes[0][3]);
                    }
                    if (changes[0][1] == 8) {
                    totNew = parseFloat(changes[0][3]);
                            totTmp += parseFloat(changes[0][3]);
                    }
                    if (changes[0][1] == 9) {
                    ivaNew = parseFloat(changes[0][3]);
                    }

                    var qtaRiga = parseFloat(instance.getDataAtCell(changes[0][0], 3));
                            var prezzoUniRiga = parseFloat(instance.getDataAtCell(changes[0][0], 4));
                            var ivaRiga = parseFloat(instance.getDataAtCell(changes[0][0], 9));
                            var totRiga = qtaRiga * prezzoUniRiga;
                            var totaleDocumento = calcolaTotaleDocumento();
                            document.getElementById('totaleDocumento').innerHTML = number_format(totaleDocumento, 2, ",", "") + " €";
                            $('#documento').handsontable('setDataAtCell', changes[0][0], 8, totRiga, 'modificaTotale');
                            var impostaDocumento = calcolaSintesiIva(changes[0][0]);
                            document.getElementById('ivaDocumento').innerHTML = number_format(impostaDocumento, 2, ",", "") + " €";
                            if (indicePagamenti > 0) {
                    modificaImportoPagamenti();
                    } else {
                    modificaPagamento(document.getElementById("selectPagamenti"));
                    }
                    }
                    },
                    afterRemoveRow: function(index, amount) {
                    var totaleDocumento = calcolaTotaleDocumento();
                            document.getElementById('totaleDocumento').innerHTML = number_format(totaleDocumento, 2, ",", "") + " €";
//            $('#documento').handsontable('setDataAtCell', changes[0][0], 8, totRiga, 'modificaTotale');

                            var impostaDocumento = calcolaSintesiIva(0);
                            document.getElementById('ivaDocumento').innerHTML = number_format(impostaDocumento, 2, ",", "") + " €";
                            if (indicePagamenti > 0) {
                    modificaImportoPagamenti();
                    } else {
                    modificaPagamento(document.getElementById("selectPagamenti"));
                    }
                    }
            });
            var parent = container.parent();
            var handsontable = container.data('handsontable');
            function calcolaSintesiIva(riga) {
            $('#tableRiepilogo tbody tr').remove();
                    arrayAliquote = new Array();
                    for (var t = 0; t < handsontable.getData().length - 1; t++) {
            var riga = handsontable.getData()[t];
                    var rowTot = parseFloat(riga[4]) * parseFloat(riga[3]);
                    var aliquota = parseFloat(riga[9]);
                    if (!isNaN(parseFloat(riga[9]))) {
            if (arrayAliquote[aliquota] != null) {
            arrayAliquote[aliquota] += rowTot;
            } else {
            arrayAliquote[aliquota] = rowTot;
            }
            }
            }

            var impostaDocumento = 0;
                    var indiceRow = 0;
                    for (var key in arrayAliquote) {
            var totAliquota = arrayAliquote[key] * (key / 100);
                    impostaDocumento += totAliquota;
                    var rigaRiepilogo = '<tr>';
                    rigaRiepilogo += '<td style="border: 1px solid #cccccc; height: 21px; padding: 0 4px; text-align: right" id="aliquota_' + indiceRow + '">' + number_format(key, 2, ".", "") + '</td>';
                    rigaRiepilogo += '<td style="border: 1px solid #cccccc; height: 21px; padding: 0 4px; text-align: right" id="imponibile_' + indiceRow + '">' + number_format(arrayAliquote[key], 2, ".", "") + " €" + '</td>';
                    rigaRiepilogo += '<td style="border: 1px solid #cccccc; height: 21px; padding: 0 4px; text-align: right" id="imposta_' + indiceRow + '">' + number_format(totAliquota, 2, ".", "") + " €" + '</td>';
                    rigaRiepilogo += '</tr>';
                    $('#tableRiepilogo').append(rigaRiepilogo);
                    indiceRow++;
            }
            return impostaDocumento;
            }

    function calcolaTotaleDocumento() {
    var totale = 0;
            importoTmp = 0;
            for (var t = 0; t < handsontable.getData().length - 1; t++) {
    var riga = handsontable.getData()[t];
            var totaleRiga = parseFloat(riga[4]) * parseFloat(riga[3]) * (1 + parseFloat(riga[9]) / 100);
            importoTmp += parseFloat(riga[4]) * parseFloat(riga[3]);
            totale += totaleRiga;
    }

    totaleDocumento = totale;
            document.getElementById('imponibileDocumento').innerHTML = number_format(importoTmp, 2, ".", "") + " €";
            calcolaImponibileDocumento();
            calcolaSaldoDocumento();
            return totale;
    }

    function modificaTabellaPagamenti(importo, rata, indice, id) {
    var dataRata = new Date();
            // millisecondi trascorsi fino ad ora dal 1/1/1970
            var oggimilli = dataRata.getTime();
            // valore in millisecondi dei giorni da aggiungere
            var millisecondi = 24 * 60 * 60 * 1000 * rata;
            //millisecondi alla data finale
            var milliseTotali = millisecondi + oggimilli;
            //data finale in millisecondi
            var dataScadenza = new Date(milliseTotali);
            var data = dataScadenza.getDate() + "/" + parseInt(dataScadenza.getMonth() + 1) + "/" + dataScadenza.getFullYear();
            indicePagamenti = indice;
            var rigaPagamento = '';
            rigaPagamento += '<div style="display: table-row" id="rigaPagamento_' + indice + '">';
            rigaPagamento += '<div style="display: table-cell; width: 100px">';
            rigaPagamento += '<input type="hidden" id="idRataPagamento_' + indice + '" value="' + id + '">';
            rigaPagamento += '<input type="hidden" id="giorniPagamento_' + indice + '" value="' + rata + '">';
            rigaPagamento += '<input type="text" name="dataPagamento_' + indice + '" id="dataPagamento_' + indice + '" value="' + data + '" style="margin-bottom: 5px" size="10">';
            rigaPagamento += '</div>';
            rigaPagamento += '<div style="display: table-cell; width: 100px;">';
            rigaPagamento += '<input type="text" name="importo_' + indice + '" id="importo_' + indice + '" style="text-align: right; padding-right: 10px; margin-bottom: 5px" value="' + number_format(importo, 2, ".", "") + " €" + '" size="10">';
            rigaPagamento += '</div>';
            rigaPagamento += '<div style="display: table-cell; width: 100px">';
            rigaPagamento += '<input type="checkbox" name="checkPagato_' + indice + '" id="checkPagato_' + indice + '" onclick="pagamentoRata(this)"> Pagato';
            rigaPagamento += '</div>';
//        rigaPagamento += '<div style="display: table-cell; width: 130px;">';
//        rigaPagamento += '<img src="images/delete.gif" alt="Elimina Pagamento" title="Elimina Pagamento" style="cursor: pointer" onclick="eliminaPagamento(' + indicePagamenti + ')" />';
//        rigaPagamento += '</div>';
            rigaPagamento += '</div>';
            $('#tabellaPagamenti').append(rigaPagamento);
            indicePagamenti++;
    }

    function aggiornaRatePagamento() {
    var numeroRate = indicePagamenti;
            var sommaRate = 0;
            var importoTotaleAcconti = str_replace(",", ".", document.getElementById("accontiDocumento").innerHTML);
            var totalePagamentoAggiornato = number_format(parseFloat(totaleDocumento) - parseFloat(importoTotaleAcconti), 2);
            for (var j = 0; j < indicePagamenti; j++) {
    var importoRata = number_format(totalePagamentoAggiornato / numeroRate, 2);
            sommaRate += parseFloat(importoRata);
    }

    var differenza = sommaRate - parseFloat(totalePagamentoAggiornato);
            var nuovaRata = number_format(totalePagamentoAggiornato / indicePagamenti, 2, ".", "");
            var totaleRatePagate = 0;
            for (var i = 0; i < indicePagamenti; i++) {
    if (i == indicePagamenti - 1) {
    nuovaRata = nuovaRata - differenza;
    }
    document.getElementById("importo_" + i).value = number_format(nuovaRata, 2, ".", "") + " €";
            var pagatoCheck = document.getElementById('checkPagato_' + i);
            if (pagatoCheck.checked) {
    totaleRatePagate = parseFloat(totaleRatePagate + nuovaRata);
    }
    }
    document.getElementById("totaleRateDocumento").innerHTML = number_format(totaleRatePagate, "2", ",", "") + " €";
            document.getElementById("pagamentiSaldati").innerHTML = number_format(totaleRatePagate, "2", ",", "") + " €";
    }

    function aggiungiSpese(input) {
    var speseTrasporto = parseFloat(str_replace(",", ".", input.value));
            var aliquota = parseFloat("22");
            var imponibile = parseFloat(str_replace(",", ".", document.getElementById('imponibileDocumento').innerHTML));
            imponibile = imponibile + speseTrasporto;
            var lordoSpese = speseTrasporto * (1 + aliquota / 100);
            document.getElementById('imponibileDocumento').innerHTML = number_format(imponibile, 2, ",", "") + " €";
            if (arrayAliquote[aliquota] != null) {
    arrayAliquote[aliquota] += parseFloat(speseTrasporto);
    } else {
    arrayAliquote[aliquota] = parseFloat(speseTrasporto);
    }
    var impostaDocumento = 0;
            $('#tableRiepilogo tbody tr').remove();
            var row = 0;
            for (var key in arrayAliquote) {
    var totAliquota = arrayAliquote[key] * (key / 100);
            impostaDocumento += totAliquota;
            var rigaRiepilogo = '<tr>';
            rigaRiepilogo += '<td style="border: 1px solid #cccccc; height: 21px; padding: 0 4px; text-align: right" id="aliquota_' + row + '">' + number_format(key, 2, ".", "") + '</td>';
            rigaRiepilogo += '<td style="border: 1px solid #cccccc; height: 21px; padding: 0 4px; text-align: right" id="imponibile_' + row + '">' + number_format(arrayAliquote[key], 2, ".", "") + " €" + '</td>';
            rigaRiepilogo += '<td style="border: 1px solid #cccccc; height: 21px; padding: 0 4px; text-align: right" id="imposta_' + row + '">' + number_format(totAliquota, 2, ".", "") + " €" + '</td>';
            rigaRiepilogo += '</tr>';
            $('#tableRiepilogo').append(rigaRiepilogo);
            row++;
    }

    totaleDocumento = totaleDocumento + lordoSpese;
            document.getElementById('totaleDocumento').innerHTML = number_format(totaleDocumento, 2, ",", "") + " €";
            document.getElementById('ivaDocumento').innerHTML = number_format(impostaDocumento, 2, ",", "") + " €";
            modificaImportoPagamenti();
    }

    function calcolaImponibileDocumento() {
    var speseTrasporto = parseFloat(str_replace(",", ".", document.getElementById("speseTrasporto").value));
            var totaleImponibile = importoTmp + speseTrasporto;
            document.getElementById('imponibileDocumento').innerHTML = number_format(totaleImponibile, 2, ",", "");
            modificaTotaleRateizzato();
    }

    function modificaImportoPagamenti() {
    var totaleDocumentoHtml = document.getElementById('totaleDocumento').innerHTML;
            var accontiSaldatiHtml = document.getElementById('accontiSaldati').innerHTML;
            totaleDocumentoHtml = str_replace(",", ".", totaleDocumentoHtml);
            accontiSaldatiHtml = str_replace(",", ".", accontiSaldatiHtml);
            totaleDocumento = parseFloat(totaleDocumentoHtml) - parseFloat(accontiSaldatiHtml);
            nuovaRata = totaleDocumento / indicePagamenti;
            for (var i = 0; i < indicePagamenti; i++) {
    document.getElementById("importo_" + i).value = number_format(nuovaRata, 2, ".", "") + " €";
    }
    modificaTotaleRateizzato();
            calcolaSaldoDocumento();
    }

    function modificaTotaleRateizzato() {
    var importoTotaleAcconti = str_replace(",", ".", document.getElementById("accontiDocumento").innerHTML);
            importoTotaleAcconti = number_format(importoTotaleAcconti, "2", ".", "");
            var totaleImportoRateizzato = totaleDocumento - parseFloat(importoTotaleAcconti);
            document.getElementById("totaleRateizzato").innerHTML = number_format(totaleImportoRateizzato, 2, ".", "") + " €";
    }

    function aggiungiPagamento() {
    var nuovaRata = 0;
//        nuovaRata = totaleDocumento / (indicePagamenti + 1);

            var numeroRate = indicePagamenti + 1;
            var sommaRate = 0;
            for (var j = 0; j < numeroRate; j++) {
    var importoRata = number_format(parseFloat(totaleDocumento) / numeroRate, 2);
            sommaRate += parseFloat(importoRata);
    }

    var differenza = sommaRate - parseFloat(totaleDocumento);
            nuovaRata = number_format((parseFloat(totaleDocumento) / numeroRate) - differenza, 2);
            var dataRata = new Date();
            dataRata.setMonth(dataRata.getMonth() + (indicePagamenti));
            var mese = parseInt(dataRata.getMonth()) + 1;
            if (mese < 10) {
    mese = "0" + mese;
    }
    var data = dataRata.getDate() + "/" + mese + "/" + dataRata.getFullYear();
            var rigaPagamento = '';
            rigaPagamento += '<div style="display: table-row" id="rigaPagamento_' + indicePagamenti + '">';
            rigaPagamento += '<div style="display: table-cell; width: 100px">';
            rigaPagamento += '<input type="text" name="dataPagamento_' + indicePagamenti + '" id="dataPagamento_' + indicePagamenti + '" value="' + data + '" style="margin-bottom: 5px" size="10">';
            rigaPagamento += '</div>';
            rigaPagamento += '<div style="display: table-cell; width: 100px;">';
            rigaPagamento += '<input type="text" name="importo_' + indicePagamenti + '" id="importo_' + indicePagamenti + '" style="text-align: right; padding-right: 10px; margin-bottom: 5px" value="' + nuovaRata + " €" + '" size="10">';
            rigaPagamento += '</div>';
            rigaPagamento += '<div style="display: table-cell; width: 100px">';
            rigaPagamento += '<input type="checkbox" name="checkPagato_' + indicePagamenti + '" id="checkPagato_' + indicePagamenti + '" onclick="pagamentoRata(this)"> Pagato';
            rigaPagamento += '</div>';
            rigaPagamento += '<div style="display: table-cell; width: 130px;">';
            rigaPagamento += '<img src="images/delete.gif" id="eliminaPagamento_' + indicePagamenti + '" alt="Elimina Pagamento" title="Elimina Pagamento" style="cursor: pointer" onclick="eliminaPagamento(' + indicePagamenti + ')" />';
            rigaPagamento += '</div>';
            rigaPagamento += '</div>';
            $('#tabellaPagamenti').append(rigaPagamento);
//        var totaleRatePagate = 0;
//        for (var i = 0; i < indicePagamenti; i++) {
//            document.getElementById("importo_" + i).value = number_format(nuovaRata, 2, ".", "") + " €";
//            var pagatoCheck = document.getElementById('checkPagato_' + i);
//            if (pagatoCheck.checked) {
//                totaleRatePagate = parseFloat(totaleRatePagate + nuovaRata);
//            }
//        }
//        document.getElementById('totaleRateDocumento').innerHTML = number_format(totaleRatePagate, 2, ".", "") + " €";
            indicePagamenti++;
            aggiornaRatePagamento();
            modificaImportoPagamenti();
    }

    function calcolaSaldoDocumento() {
    var importoTotaleAcconti = str_replace(",", ".", document.getElementById("accontiDocumento").innerHTML);
            var importoTotaleRateSaldate = str_replace(",", ".", document.getElementById("totaleRateDocumento").innerHTML);
            importoTotaleAcconti = number_format(importoTotaleAcconti, "2", ".", "");
            importoTotaleRateSaldate = number_format(importoTotaleRateSaldate, "2", ".", "");
            var totaleDaPagare = totaleDocumento - parseFloat(importoTotaleAcconti) - parseFloat(importoTotaleRateSaldate);
            document.getElementById("daPagareDocumento").innerHTML = number_format(totaleDaPagare, "2", ",", "") + " €";
    }

    function aggiungiAcconto() {
    var data = date("d/m/Y");
            var rigaPagamento = '';
            rigaPagamento += '<div style="display: table-row" id="rigaAcconto_' + indiceAcconti + '">';
            rigaPagamento += '<div style="display: table-cell; width: 130px">';
            rigaPagamento += '<i>€</i> <input type="text" onblur="modificaAccontiSaldati(this)" name="importoAcconto_' + indiceAcconti + '" id="importoAcconto_' + indiceAcconti + '" style="text-align: right; padding-right: 10px; margin-bottom: 5px" size="10">';
            rigaPagamento += '</div>';
            rigaPagamento += '<div style="display: table-cell; width: 130px;">';
            rigaPagamento += '<i>Data</i> <input type="text" name="dataPagamentoAcconto_' + indiceAcconti + '" id="dataPagamentoAcconto_' + indiceAcconti + '" value="' + data + '" style="margin-bottom: 5px" size="10">';
            rigaPagamento += '</div>';
            rigaPagamento += '<div style="display: table-cell; width: 130px;">';
            rigaPagamento += '<img src="images/delete.gif" alt="Elimina Acconto" title="Elimina Acconto" style="cursor: pointer" onclick="eliminaAcconto(' + indiceAcconti + ')" />';
            rigaPagamento += '</div>';
            rigaPagamento += '</div>';
            $('#tabellaAcconti').append(rigaPagamento);
            indiceAcconti++;
            calcolaSaldoDocumento();
            modificaTotaleRateizzato();
    }

    function eliminaAcconto(indiceAcconto) {
    var importoAcconto = parseFloat(str_replace(",", ".", document.getElementById("importoAcconto_" + indiceAcconto).value));
            var totaleAcconti = parseFloat(str_replace(",", ".", document.getElementById("accontiDocumento").innerHTML));
            var nuovoTotaleAcconti = totaleAcconti - importoAcconto;
            document.getElementById("accontiDocumento").innerHTML = number_format(nuovoTotaleAcconti, "2", ",", "") + " €";
            indiceAcconti--;
            $('#rigaAcconto_' + indiceAcconto).remove();
            calcolaSaldoDocumento();
            modificaAccontiSaldati();
    }

    function eliminaPagamento(indice) {
    $('#rigaPagamento_' + indice).remove();
            for (var i = indice + 1; i < indicePagamenti; i++) {
    $('#rigaPagamento_' + i).attr("id", "rigaPagamento_" + (i - 1));
            $('#dataPagamento_' + i).attr("name", "dataPagamento_" + (i - 1));
            $('#dataPagamento_' + i).attr("id", "dataPagamento_" + (i - 1));
            $('#importo_' + i).attr("name", "importo_" + (i - 1));
            $('#importo_' + i).attr("id", "importo_" + (i - 1));
            $('#checkPagato_' + i).attr("name", "checkPagato_" + (i - 1));
            $('#checkPagato_' + i).attr("id", "checkPagato_" + (i - 1));
            $('#eliminaPagamento_' + i).attr("onclick", "eliminaPagamento(" + (i - 1) + ")");
            $('#eliminaPagamento_' + i).attr("id", "eliminaPagamento_" + (i - 1));
    }
    indicePagamenti--;
            aggiornaRatePagamento();
            modificaTotaleRateizzato();
            calcolaSaldoDocumento();
    }

    function modificaAccontiSaldati(input) {

    var accontoTmp = 0;
            for (var i = 0; i < indiceAcconti; i++) {
    var acconto = document.getElementById("importoAcconto_" + i);
            var importo = parseFloat(str_replace(",", ".", acconto.value));
            accontoTmp = parseFloat(accontoTmp) + importo;
            acconto.value = number_format(importo, 2, ",", "");
    }

    var nuovoImportoAcconto = number_format(accontoTmp, 2, ",", "");
            document.getElementById("accontiSaldati").innerHTML = nuovoImportoAcconto + " €";
            document.getElementById("accontiDocumento").innerHTML = nuovoImportoAcconto + " €";
            var numeroRate = indicePagamenti;
            var importoDocumentoAggiornato = totaleDocumento - parseFloat(str_replace(",", ".", nuovoImportoAcconto));
            var sommaRate = 0;
            for (var j = 0; j < indicePagamenti; j++) {
    var importoRata = number_format(parseFloat(importoDocumentoAggiornato) / numeroRate, 2);
            sommaRate += parseFloat(importoRata);
    }

    var differenza = sommaRate - parseFloat(importoDocumentoAggiornato);
            var nuovaRata = number_format(importoDocumentoAggiornato / indicePagamenti, 2, ".", "");
            var totaleRatePagate = 0;
            for (var i = 0; i < indicePagamenti; i++) {
    if (i == indicePagamenti - 1) {
    nuovaRata = nuovaRata - differenza;
    }
    document.getElementById("importo_" + i).value = number_format(nuovaRata, 2, ".", "") + " €";
            var pagatoCheck = document.getElementById('checkPagato_' + i);
            if (pagatoCheck.checked) {
    totaleRatePagate = parseFloat(totaleRatePagate + nuovaRata);
    }
    }

    document.getElementById("totaleRateDocumento").innerHTML = number_format(totaleRatePagate, 2, ",", "") + " €";
            document.getElementById("pagamentiSaldati").innerHTML = number_format(totaleRatePagate, 2, ",", "") + " €";
            calcolaSaldoDocumento();
            modificaTotaleRateizzato();
    }



    parent.find('button[name=save]').click(function() {
    var messaggio = '';
            if (handsontable.getData().length > 1) {
    for (var t = 0; t < handsontable.getData().length - 1; t++) {
    var riga = handsontable.getData()[t]
            for (var k = 0; k < riga.length - 2; k++) {
    var cella = riga[k];
            if (cella == '') {
    messaggio = "La riga " + (t + 1) + " presenta dati incompleti!";
            visualizzaMessaggioErrore(messaggio);
            return;
    }
    }
    }
    var idPagamento = document.getElementById("selectPagamenti").value;
            if (idPagamento == "") {
    messaggio = "Selezionare il tipo di pagamento.";
            visualizzaMessaggioErrore(messaggio);
            return;
    }

    // CAMPI DOCUMENTO
    var idIndiceDocumento = '<?php echo $maxIndiceByTipoDocumento->id ?>';
            var idTipoDocumento = <?php echo $idTipoDocumento; ?>;
            var numero = document.getElementById('numeroDocumento').value;
            var indiceDocumento = document.getElementById('indiceDocumento').value;
<?php
if (strpos($tipo->nomeTipo, "endit") > 0) {
    ?>
        var idCliente = document.getElementById('idCliente').value;
    <?php
} else {
    ?>
        var idFornitore = document.getElementById('idFornitore').value;
    <?php
}
?>
    var dataDocumento = document.getElementById('dataDocumento').value;
//            var tabellaPagamenti = document.getElementById('tabellaPagamenti');
            var totaleIva = parseFloat(str_replace(",", ".", document.getElementById('ivaDocumento').innerHTML));
            var imponibileDocumento = parseFloat(str_replace(",", ".", document.getElementById('imponibileDocumento').innerHTML));
            var totaleDocumento = parseFloat(str_replace(",", ".", document.getElementById('totaleDocumento').innerHTML));
            var totaleDaSaldare = parseFloat(str_replace(",", ".", document.getElementById('daPagareDocumento').innerHTML));
            var totaleSaldato = totaleDocumento - totaleDaSaldare;
//            var abuono = 
//            var eccedenza = 
//            var causaleTrasporto = document.getElementById('causale').value;
//            var aspetto = document.getElementById('aspetto').value;
//            var dataConsegna = document.getElementById('trans_date').value;
//            var oraConsegna = document.getElementById('trans_time').value;
//            var porto = document.getElementById('trans_freight').value;
//            var colli = document.getElementById('trans_num').value;
//            var peso = document.getElementById('trans_weight').value;
            var note = document.getElementById('note').value;
            // FINE CAMPI DOCUMENTO


//            var metodoDiTrasporto = metodoTrasporto;
//            var vettore = document.getElementById('trans_shipper').value;
//            var targa = document.getElementById('trans_numplate').value;
            var speseTrasporto = document.getElementById('speseTrasporto').value;
            if (numero == '') {
    messaggio = "Inserire un numero valido per il documento";
            visualizzaMessaggioErrore(messaggio);
            return;
    }

    if (indiceDocumento == '') {
    messaggio = "Inserire un indice valido per il documento";
            visualizzaMessaggioErrore(messaggio);
            return;
    }

    caricaArrayPagamenti();
            $.ajax({
            //url: "index.php?action=salvaDocumento",
            url: "index.php?action=salvaPreventivo",
                    data: {
                    "idIndiceDocumento": idIndiceDocumento,
<?php
if (strpos($tipo->nomeTipo, "endit") > 0) {
    ?>
                        "idCliente": idCliente,
    <?php
} else {
    ?>
                        "idFornitore": idFornitore,
    <?php
}
?>
                    "pagamento": json_encode(righeTabellaPagamenti),
                            "acconti": json_encode(righeTabellaAcconti),
                            "progressivo": numero,
                            "anno": indiceDocumento,
                            "data": dataDocumento,
                            "riepilogoIva": json_encode(righeTabellaIva),
                            "tipoDocumento": idTipoDocumento,
                            "imponibileDocumento": imponibileDocumento,
                            "totaleIva": totaleIva,
                            "totaleDocumento": totaleDocumento,
                            "totaleDaSaldare": totaleDaSaldare,
                            "totaleSaldato": totaleSaldato,
                            "note": note,
                            "rows": handsontable.getData(),
                            "destinazione": document.getElementById("selectDestinazioni").value,
                            "idPagamento": idPagamento,
                            "mezzo": metodoTrasporto,
                            "nominativo": document.getElementById("nominativo").value,
                            "targa": document.getElementById("targa").value,
                            "dataConsegna": document.getElementById("dataConsegna").value,
                            "oraConsegna": document.getElementById("oraConsegna").value,
                            "causale": document.getElementById("causale").value,
                            "aspetto": document.getElementById("aspetto").value,
                            "colli": document.getElementById("colli").value,
                            "peso": document.getElementById("peso").value,
                            "porto": document.getElementById("porto").value,
                            "speseTrasporto": document.getElementById("speseTrasporto").value

                            //                "nuovaDestinazione": document.getElementById('checkCambioDestinazione').checked,
                            //                "destinazioneNuovaDestinazione": document.getElementById('destinazioneNuovaDestinazione').value,
                            //                "indirizzoNuovaDestinazione": document.getElementById('indirizzoNuovaDestinazione').value,
                            //                "capNuovaDestinazione": document.getElementById('capNuovaDestinazione').value,
                            //                "cittaNuovaDestinazione": document.getElementById('cittaNuovaDestinazione').value,
                            //                "provinciaNuovaDestinazione": document.getElementById('provinciaNuovaDestinazione').value,
                            //                "pressoNuovaDestinazione": document.getElementById('pressoNuovaDestinazione').value,
//                    "selectDestinazione": selectDestinazione,

                    }, //returns all cells' data
                    dataType: 'json',
                    type: 'POST',
                    success: function(res) {
                    window.location.href = "index.php?action=listaDocumenti&type=" + idTipoDocumento;
                    },
                    error: function() {
                        alert(idCliente);
                        alert(tipoDocumento);
                    alert("Errore durante il salvataggio del documento!");
                    }
            });
    } else {
    messaggio = "Impossibile salvare il documento!<br/>Nessun articolo inserito";
            visualizzaMessaggioErrore(messaggio);
    }
    });
            function caricaArrayPagamenti() {
            righeTabellaPagamenti = new Array();
                    righeTabellaAcconti = new Array();
                    righeTabellaIva = new Array();
                    for (var i = 0; i < indicePagamenti; i++) {
            var pagamento = {};
                    pagamento.importo = parseFloat(document.getElementById('importo_' + i).value);
                    pagamento.dataPagamento = document.getElementById('dataPagamento_' + i).value;
                    if (document.getElementById('idRataPagamento_' + i) != null) {
            pagamento.id = document.getElementById('idRataPagamento_' + i).value;
            }
            pagamento.giorni = document.getElementById('giorniPagamento_' + i).value;
                    var checkPagato = document.getElementById('checkPagato_' + i);
                    if (checkPagato.checked) {
            pagamento.isPagato = 1;
            } else {
            pagamento.isPagato = 0;
            }
            righeTabellaPagamenti[i] = pagamento;
            }
            for (var i = 0; i < indiceAcconti; i++) {
            var acconto = {};
                    acconto.importo = parseFloat(str_replace(",", ".", document.getElementById('importoAcconto_' + i).value));
                    acconto.dataPagamento = document.getElementById('dataPagamentoAcconto_' + i).value;
                    righeTabellaAcconti[i] = acconto;
            }
            var righeTabellaRiepilogoIva = $('#tableRiepilogo tbody tr').length;
                    for (var i = 0; i < righeTabellaRiepilogoIva; i++) {
            var riepilogoIva = {};
                    riepilogoIva.aliquota = parseFloat($('#aliquota_' + i).html());
                    riepilogoIva.imponibile = parseFloat($('#imponibile_' + i).html());
                    riepilogoIva.imposta = parseFloat($('#imposta_' + i).html());
                    righeTabellaIva[i] = riepilogoIva;
            }
            }

    function visualizzaMessaggioErrore(messaggio) {
    document.getElementById("messageErrorDialog").innerHTML = messaggio;
            $("#messageErrorDialog").dialog({
    open: function() {                         // open event handler
    $(this)                                // the element being dialogged
            .parent()                          // get the dialog widget element
            .find(".ui-dialog-titlebar-close") // find the close button for this dialog
            .hide(); // hide it
    },
            modal: true,
            width: 600,
            buttons: {
            "Ok": function() {
            $(this).dialog("close");
            }
            }
    });
    }
</script>