<?php

function salvaCliente() {
    $id = getRequest("idCliente");

    $errore = '';


    $codiceCliente = getRequest("codiceCliente");
    $ragioneSocialeCliente = getRequest("ragioneSocialeCliente");
    $cognomeCliente = getRequest("cognomeCliente");
    if (isBlankOrNull($cognomeCliente)) {
        $errore = 'si';
    }
    $nomeCliente = getRequest("nomeCliente");
    if (isBlankOrNull($nomeCliente)) {
        $errore = 'si';
    }
    
    $sesso = getRequest("sessoCliente");

//exit;
    $categoriaCliente = getRequest("categoriaCliente");
    $indirizzoCliente = getRequest("indirizzoCliente");
    $civicoCliente = getRequest("civicoCliente");
    $capCliente = getRequest("capCliente");
    $idComuneCliente = getRequest("idCittaCliente");
//$idComuneCliente = 6499;
    $telefonoCliente = getRequest("telefonoCliente");
    $cellulareCliente = getRequest("cellulareCliente");
    if (isBlankOrNull($cellulareCliente)) {
        $errore = 'si';
    }

    $emailCliente = getRequest("emailCliente");
    $pecCliente = getRequest("pecCliente");
    $dataNascitaCliente = getRequest("dataNascitaCliente"); 
    $luogoNascitaCliente = getRequest("luogoNascitaCliente");
    $idLuogoNascitaCliente = getRequest("idLuogoNascitaCliente");
    $codiceFiscaleCliente = strtoupper(getRequest("codiceFiscaleCliente"));
    $partitaIvaCliente = getRequest("partitaIvaCliente");

    $provinciaRegione = DAOFactory::getComuniDAO()->load($idComuneCliente);
    $provincia = $provinciaRegione->idProvincia;
    $regione = $provinciaRegione->idRegione;

    if ($errore == 'si') {
        ob_clean();
        header("location: index.php?action=errore&cod=001");
        exit;
    }





    $cliente = new Clienti();
    $cliente->categoria = $categoriaCliente;
    $cliente->codice = $codiceCliente;
    $cliente->ragioneSociale = $ragioneSocialeCliente;
    $cliente->cognome = $cognomeCliente;
    $cliente->nome = $nomeCliente;
    $cliente->sesso = $sesso;
    $cliente->indirizzo = $indirizzoCliente;
    $cliente->civico = $civicoCliente;
    $cliente->cap = $capCliente;
    $cliente->regione = $regione;
    $cliente->provincia = $provincia;
    $cliente->citta = $idComuneCliente;
    $cliente->telefono = $telefonoCliente;
    $cliente->cellulare = $cellulareCliente;
    $cliente->email = $emailCliente;
    $cliente->pec = $pecCliente;
    if(!isBlankOrNull($dataNascitaCliente)){
       $cliente->dataNascita = dateToDb($dataNascitaCliente); 
    }
    
//$cliente->luogo = $luogoNascitaCliente;
    $cliente->luogo = $idLuogoNascitaCliente;
    $cliente->cFiscale = $codiceFiscaleCliente;
    $cliente->partitaIva = $partitaIvaCliente;


    if (!isBlankOrNull($id)) {

        $cliente->id = $id;
        DAOFactory::getClientiDAO()->update($cliente);
    } else {
        $varTMP = DAOFactory::getClientiDAO()->queryByCellulare($cellulareCliente);
        if (count($varTMP) > 0) {
            ob_clean();
            header("location: index.php?action=errore&cod=002");
            exit;
        }
        DAOFactory::getClientiDAO()->insert($cliente);
    }

    ob_clean();
    header("location: index.php?action=clientiList");
    exit;
}

function caricaListaClienti() {
    global $listaCliente;
    $listaCliente = DAOFactory::getClientiDAO()->queryAll();
}

function eliminaCliente() {
    $id = getRequest("id");
    
     
    //LIMINARE TUTTE LE DIPENDENZE DEL CLIENTE
    
    //documentazione
    //DA IMPLEMENTARE
    
    
    //piano trattamento (idPaziente)
    
    //trattamentoItem
    $trattamentoItemTMP = DAOFactory::getPianoTrattamentoDAO()->queryByIdPaziente($id);
    
    for($i=0;$i<count($trattamentoItemTMP);$i++){
        $trattamentoX = $trattamentoItemTMP[$i];
        $idTrattamento = $trattamentoX->id;
                //$trattamento->id;
        
        DAOFactory::getPianoTrattamentoItemDAO()->deleteByIdPiano($idTrattamento);
    }
    
    DAOFactory::getPianoTrattamentoDAO()->deleteByIdPaziente($id);
    
    
       
    //prenotazione (idCliente)
    
    $prenotazioniTMP = DAOFactory::getPrenotazioniDAO()->queryByIdCliente($id);
    
    
    //prenotazioneDettaglio
    for($k=0;$k<count($prenotazioniTMP);$k++){
        $prenotazione = $prenotazioniTMP[$k];
        $idPrenotazione = $prenotazione->id;
        
        DAOFactory::getPrenotazioniDettaglioDAO()->deleteByPrenotazione($idPrenotazione);
    }
    
    DAOFactory::getPrenotazioniDAO()->deleteByIdCliente($id);
    
        
    DAOFactory::getClientiDAO()->delete($id);

    ob_clean();
    header("location: index.php?action=clientiList");
    exit;
}

function caricaCliente() {
    global $cliente, $cardCliente, $clientePrivacy; 
    $idCardTMP = '';
    $id = getRequest("id");
    $cliente = DAOFactory::getClientiDAO()->load($id);
    $idCardTMP = DAOFactory::getFidelityClienteDAO()->queryByIdCliente($id);

    //if (!isBlankOrNull($idCard->id)) {   
    if (count($idCardTMP) > 0) {
        $idCard = $idCardTMP[0];
        $cardCliente = DAOFactory::getFidelityCardDAO()->load($idCard->idCard);
    } else {
        $cardCliente = NULL;
    }
    
    $privacy = DAOFactory::getConsensoPrivacyDAO()->queryByIdCliente($id);
    if(count($privacy)>0){
        $clientePrivacy = TRUE;
    } else {
        $clientePrivacy = FALSE;        
    }
    
}

function spospesiCliente() {
    //global $cliente;
    $idCliente = getRequest("idCliente");
    //$cliente  = DAOFactory::getClientiDAO()->load($id);
    @$totaleDocumenti = DAOFactory::getClientidocDAO()->queryTotaleAllDocumenti($idCliente);

    $totalePagamenti = DAOFactory::getPagamentoDAO()->queryTotaleAllPagamenti($idCliente);



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

//AUTOCOMPLETE CLIENTE
function caricaInformazioniCliente() {
    //$arrayTmp  = null;
    $arrayTmp = '';

    $clienti = DAOFactory::getClientiDAO()->queryAll();
    //$clienti = DAOFactory::getClientiDAO()->queryInfoClienteComuneNazione();

    $arrayTmp["clienti"] = $clienti;

    print_r(json_encode($arrayTmp));
}

function caricaInformazioniClienteComune() {
    $arrayTmp = null;


    $clienti = DAOFactory::getClientiDAO()->queryInfoClienteComune();

    $arrayTmp["clienti"] = $clienti;

    print_r(json_encode($arrayTmp));
}

function caricaClienti() {
    if (empty($_GET['term'])) {
        exit;
    }

    $q = strtolower($_GET["term"]);

    /*if (get_magic_quotes_gpc()) {
        $q = stripslashes($q);
    }*/

    $clienti = DAOFactory::getClientiDAO()->findClientiLike("nome LIKE '%$q%' OR cognome LIKE '%$q%'");

    $result = array();
    for ($i = 0; $i < count($clienti); $i++) {
        $cliente = $clienti[$i];
        $nomeCitta = '';
        $cap = '';
        $provincia = '';
        /* if (!isBlankOrNull($cliente->idCitta)) {
          $citta = DAOFactory::getComuniDAO()->loadById($cliente->idCitta);
          $nomeCitta = $citta->comune;
          $cap = $citta->cap;
          $provincia = strtoupper($citta->siglaProv);
          } */
//        $destinazioniMerce = DAOFactory::getDestinazionemerceDAO()->queryByIdCliente($cliente->id);
        $destinazioniMerce = array(1, "1", "destinazione", "indirizzo", "cap", "citta Destinazione", "pro", "presso", "nominativo");
        array_push($result, array(
            "id" => $cliente->id,
            "label" => $cliente->nome . " " . $cliente->cognome,
            "value" => $cliente->nome . " " . $cliente->cognome,
            "nome" => $cliente->nome,
            "cognome" => $cliente->cognome,
            "telefono" => $cliente->cellulare,
            "email" => $cliente->email,
            "codiceFiscale" => $cliente->cFiscale,
//            "indirizzo" => $cliente->indirizzo,
//            "ragione" => $cliente->ragioneSociale,
//            "citta" => $nomeCitta,
//            "cap" => $cap,
//            "provincia" => $provincia,
//            "destinazioniMerce" => $destinazioniMerce
            "indirizzo" => "Indirizzo",
            "ragione" => "Ragione",
            "citta" => "Citta",
            "cap" => "cap",
            "provincia" => "provincia",
            "destinazioniMerce" => $destinazioniMerce
        ));
    }
    //print_r($result);   
    print_r(json_encode($result));
}

function caricaClientiFidelity() {
    if (empty($_GET['term'])) {
        exit;
    }

    $q = strtolower($_GET["term"]);

    if (get_magic_quotes_gpc()) {
        $q = stripslashes($q);
    }

    $clienti = DAOFactory::getClientiDAO()->findClientiLike("nome LIKE '%$q%' OR cognome LIKE '%$q%' OR cellulare LIKE '%$q%' OR c_fiscale LIKE '%$q%'");

    $result = array();
    for ($i = 0; $i < count($clienti); $i++) {
        $cliente = $clienti[$i];
        $nomeCitta = '';
        $cap = '';
        $provincia = '';
        /* if (!isBlankOrNull($cliente->idCitta)) {
          $citta = DAOFactory::getComuniDAO()->loadById($cliente->idCitta);
          $nomeCitta = $citta->comune;
          $cap = $citta->cap;
          $provincia = strtoupper($citta->siglaProv);
          } */
//        $destinazioniMerce = DAOFactory::getDestinazionemerceDAO()->queryByIdCliente($cliente->id);
//        $destinazioniMerce = array(1,"1","destinazione","indirizzo","cap","citta Destinazione", "pro","presso","nominativo");
        array_push($result, array(
            "id" => $cliente->id,
            "label" => $cliente->nome . " " . $cliente->cognome,
            "value" => $cliente->nome . " " . $cliente->cognome,
            "nome" => $cliente->nome,
            "cognome" => $cliente->cognome,
            "telefono" => $cliente->cellulare,
            "email" => $cliente->email,
            "codiceFiscale" => $cliente->cFiscale,
//            "indirizzo" => $cliente->indirizzo,
//            "ragione" => $cliente->ragioneSociale,
//            "citta" => $nomeCitta,
//            "cap" => $cap,
//            "provincia" => $provincia,
//            "destinazioniMerce" => $destinazioniMerce
//            "indirizzo" => "Indirizzo",
//            "ragione" => "Ragione",
//            "citta" => "Citta",
//            "cap" => "cap",
//            "provincia" => "provincia",
//            "destinazioniMerce" => $destinazioniMerce
        ));
    }
    //print_r($result);   
    print_r(json_encode($result));
}

//FINE FUNZIONI AUTOCOMPLETE

function salvaClienteM() {
    
    $nomePaziente = getRequest("nomePaziente");
    $cognomePaziente = getRequest("cognomePaziente");
    $cellularePaziente = getRequest("cellularePaziente");
    $emailPaziente = getRequest("emailPaziente");
    
    
    $cliente = new Clienti();
    
    $cliente->nome = $nomePaziente;
    $cliente->cognome = $cognomePaziente;
    $cliente->cellulare = $cellularePaziente;
    $cliente->email = $emailPaziente;
    
    if((!isBlankOrNull($nomePaziente))&&(!isBlankOrNull($cognomePaziente))&&(!isBlankOrNull($cellularePaziente))){
        DAOFactory::getClientiDAO()->insert($cliente);
    }
    
    
}