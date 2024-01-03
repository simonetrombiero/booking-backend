<?php

/* function caricaListaAzienda(){
  global $listaAzienda;
  $listaAzienda = DAOFactory::getAziendaDAO()->queryAll();

  } */

function salvaAzienda() {
    $id = getRequest("idAzienda");

    $cittaAzienda = getRequest("idCittaAzienda");
    //$capAzienda = getRequest("capAzienda");
    $capAzienda = getRequest("cap");
    $ragioneSocialeAzienda = getRequest("ragioneSocialeAzienda");
    $denominazioneAzienda = getRequest("denominazioneAzienda");
    $indirizzoAzienda = getRequest("indirizzoAzienda");
    $pivaAzienda = getRequest("pivaAzienda");
    $codFiscAzienda = getRequest("codFiscAzienda");
    $codiceUnivocoAzienda = getRequest("codiceUnivocAzienda");
    $telefonoAzienda = getRequest("telefonoAzienda");
    $telefono2Azienda = getRequest("telefono2Azienda");
    $faxAzienda = getRequest("faxAzienda");
    $cellulareAzienda = getRequest("cellulareAzienda");
    $emailAzienda = getRequest("emailAzienda");
    $pecAzienda = getRequest("pecAzienda");
    $sitoWebAzienda = getRequest("sitoWebAzienda");
    //$username = getRequest("usernameAzienda");
    //$password = getRequest("passwordAzienda");
    //$hostAzienda = getRequest("hostAzienda");
    //$portaAzienda = getRequest("portaAzienda");
    //$dbnameAzienda = getRequest("dbnameAzienda");
    $lastaccess = date("Y-m-d");
    //$logoAzienda = getRequest("logoAzienda");
    //$tipoImmagineAzienda = mime_controller($logoAzienda);
    $data = '';
    $imageType = '';
    if (isset($_FILES) && !isBlankOrNull($_FILES["logoAzienda"]["name"])) {
        if (($_FILES["logoAzienda"]["type"] == "image/gif") || ($_FILES["logoAzienda"]["type"] == "image/jpeg") || ($_FILES["logoAzienda"]["type"] == "image/jpg") || ($_FILES["logoAzienda"]["type"] == "image/pjpeg") || ($_FILES["logoAzienda"]["type"] == "image/x-png") || ($_FILES["logoAzienda"]["type"] == "image/png")) {

            // This is important to avoid a ' to accidentally close a string
//            $data = mysql_real_escape_string(file_get_contents($_FILES['immagineProdotto']['tmp_name']));
            $data = addslashes(fread(fopen($_FILES["logoAzienda"]["tmp_name"], "rb"), $_FILES["logoAzienda"]["size"]));
            $imageType = $_FILES['logoAzienda']['type'];
        } else {
            echo "Estensione file non riconosciuta";
        }
    }

    $azienda = new Azienda();

    $azienda->id = $id;
    $azienda->idCitta = $cittaAzienda;
    $azienda->cap = $capAzienda;
    $azienda->ragioneSociale = $ragioneSocialeAzienda;
    $azienda->denominazione = $denominazioneAzienda;
    $azienda->indirizzo = $indirizzoAzienda;
    $azienda->piva = $pivaAzienda;
    $azienda->codiceUnivoco = $codiceUnivocoAzienda;
    $azienda->codFisc = $codFiscAzienda;
    $azienda->telefono = $telefonoAzienda;
    $azienda->telefono2 = $telefono2Azienda;
    $azienda->fax = $faxAzienda;
    $azienda->cellulare = $cellulareAzienda;
    $azienda->email = $emailAzienda;
    $azienda->pec = $pecAzienda;
    $azienda->sitoWeb = $sitoWebAzienda;
    $azienda->lastaccess = $lastaccess;
    $azienda->tipoImmagine = $imageType;
    $azienda->logo = $data;




    if (!isBlankOrNull($id)) {
        $azienda->id = $id;
        DAOFactory::getAziendaDAO()->update($azienda);
    } else {
        DAOFactory::getAziendaDAO()->insert($azienda);
    }

    ob_clean();
    //header("location: index.php?action=aziendaList");
    header("location: index.php?action=visualizzaAzienda");
    exit;
}

function caricaAzienda() {
    global $azienda;
    //$id = getRequest("id");
    $id = 1;
    $azienda = DAOFactory::getAziendaDAO()->load($id);
}

/*function eliminaAzienda(){
    $id = getRequest("id");
    DAOFactory::getAziendaDAO()->delete($id);
    
    ob_clean();
    header("location: index.php?action=aziendaList");
    exit;
    
}*/