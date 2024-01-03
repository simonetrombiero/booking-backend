<?php

function salvaFornitore() {
    $id = getRequest("idFornitore");
    $ragioneSociale = getRequest("ragioneSocialeFornitore");
    $codFisc = getRequest("codFiscFornitore");
    $pIva = getRequest("pIvaFornitore");
    $indirizzo = getRequest("indirizzoFornitore");
    $comune = getRequest("idComuneFornitore");
    $cap = getRequest("capFornitore");
    $sitoweb = getRequest("sitoWebFornitore");
//    $provincia = getRequest("idProvinciaFornitore");
    $email = getRequest("emailFornitore");
    $telefono = getRequest("telefonoFornitore");
    $fax = getRequest("faxFornitore");
    $cellulare = getRequest("cellulareFornitore");

    $fornitore = new Fornitore();

    $fornitore->ragioneSociale = $ragioneSociale;
    $fornitore->fiscale = $codFisc;
    $fornitore->piva = $pIva;
    $fornitore->indirizzo = $indirizzo;
    $fornitore->idCitta = $comune;
    $fornitore->cap = $cap;
    $fornitore->sitoweb = $sitoweb;
    $fornitore->email = $email;
    $fornitore->telefono = $telefono;
    $fornitore->fax = $fax;
    $fornitore->cellulare = $cellulare;

    if (!isBlankOrNull($id)) {
        $fornitore->id = $id;
        DAOFactory::getFornitoreDAO()->update($fornitore);
    } else {
        DAOFactory::getFornitoreDAO()->insert($fornitore);
    }

    ob_clean();
    header("location: index.php?action=fornitoriList");
    exit;
}

function caricaListaFornitori() {
    global $listaFornitore;
    $listaFornitore = DAOFactory::getFornitoreDAO()->queryAll();
}

function eliminaFornitore() {
    $id = getRequest("id");
    DAOFactory::getFornitoreDAO()->delete($id);

    ob_clean();
    header("location: index.php?action=fornitoriList");
    exit;
}

function caricaFornitore() {
    global $fornitore;
    $id = getRequest("id");
    $fornitore = DAOFactory::getFornitoreDAO()->load($id);
}

//AUTOCOMPLETE FORNITORI (Forse non serve)
function caricaFornitori() {
    if (empty($_GET['term'])) {
        exit;
    }

    $q = strtolower($_GET["term"]);

    if (get_magic_quotes_gpc()) {
        $q = stripslashes($q);
    }

    $fornitori = DAOFactory::getFornitoreDAO()->findFornitoriLike("ragioneSociale LIKE '%$q%' OR piva LIKE '%$q%'");

    $result = array();
    for ($i = 0; $i < count($fornitori); $i++) {
        $fornitore = $fornitori[$i];
        $nomeCitta = '';
        $cap = '';
        $provincia = '';
        if (!isBlankOrNull($fornitore->idCitta)) {
            $citta = DAOFactory::getComuniDAO()->loadById($fornitore->idCitta);
            $nomeCitta = $citta->comune;
            $cap = $citta->cap;
            $provincia = strtoupper($citta->siglaProv);
        }
        $destinazioniMerce = DAOFactory::getDestinazionemerceDAO()->queryByIdCliente($fornitore->id);
        array_push($result, array(
            "id" => $fornitore->id,
            "label" => $fornitore->ragioneSociale,
            "value" => $fornitore->ragioneSociale,
            "indirizzo" => $fornitore->indirizzo,
            "ragione" => $fornitore->ragioneSociale,
            "citta" => $nomeCitta,
            "cap" => $cap,
            "provincia" => $provincia,
            "destinazioniMerce" => $destinazioniMerce));
    }
//    print_r($result);   
    print_r(json_encode($result));
}
