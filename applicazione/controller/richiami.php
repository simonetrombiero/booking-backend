<?php


function caricaListaRichiamiPZ() {
    global $listaRichiami;
    global $cliente;
    $idClienti = getRequest("idCliente"); 
    $cliente = DAOFactory::getClientiDAO()->load($idClienti);
    //$listaRichiami = DAOFactory::getRichiamiDAO()->queryb($idClienti);
    $listaRichiami = DAOFactory::getRichiamoDAO()->queryByPaziente($idClienti);
}

function caricaRichiamo(){
    global $richiamo;
    global $cliente;
    global $dipendenti;
    
    $idRichiamo = getRequest("id");
    $idClienti = getRequest("idCliente");
    $richiamo = DAOFactory::getRichiamoDAO()->load($idRichiamo);
    $cliente = DAOFactory::getClientiDAO()->load($idClienti);
    $dipendenti = DAOFactory::getDipendenteDAO()->queryAll();
    
    
}

function nuovoRichiamo(){
    global $cliente;
    global $dipendenti;
    $idClienti = getRequest("idCliente");
    $cliente = DAOFactory::getClientiDAO()->load($idClienti);
    $dipendenti = DAOFactory::getDipendenteDAO()->queryAll();
    
    
}

function nuovoRichiamoG(){
    //global $cliente;
    global $dipendenti;
//    $idClienti = getRequest("idCliente");
//    $cliente = DAOFactory::getClientiDAO()->load($idClienti);
    $dipendenti = DAOFactory::getDipendenteDAO()->queryAll();
    
    
}


function  salvaRichiamo(){
     $id = getRequest("idRichiamo"); 
     $oggi = date("Y-m-d");
     $idPaziente = getRequest("idCliente");
     $titolo = getRequest("titoloRichiamo");
     $richiestoDa = getRequest("richiestoDa");
     $motivoRichiamo = getRequest("motivoRichiamo");
     
     $mesiRichiamo = getRequest("mesiRichiamo");
     $dataRichiamo = dateToDb(getRequest("dataRichiamo"));
     
     if($mesiRichiamo>0){
         $dataRichiamo = date('Y-m-d', strtotime($oggi . '+' . $mesiRichiamo . ' months'));
         $gs = $data = date("w", strtotime($dataRichiamo));
         if ($gs == 0) {
             $dataRichiamo = date('Y-m-d', strtotime($dataRichiamo . '+1 day'));
         }
         if ($gs == 6) {
             $dataRichiamo = date('Y-m-d', strtotime($dataRichiamo . '+2 day'));
        }
     }
     
     $statoRichiamo = getRequest("statoRichiamo");
     $noteRichiamo = getRequest("noteRichiamo");
     
     $richiamo = new Richiamo();
     
     $richiamo->paziente = $idPaziente;
     $richiamo->titolo = $titolo;
     $richiamo->richiestoDa = $richiestoDa;
     $richiamo->motivoRichiamo = $motivoRichiamo;
     $richiamo->data = $oggi;
     $richiamo->dataPrevista = $dataRichiamo;
     $richiamo->status = $statoRichiamo;
     $richiamo->note = $noteRichiamo;
     
    
    if (!isBlankOrNull($id)) {

        $richiamo->id = $id;
        DAOFactory::getRichiamoDAO()->update($richiamo);
    } else {
  //      $varTMP = DAOFactory::getClientiDAO()->queryByCellulare($cellulareCliente);
//        if (count($varTMP) > 0) {
//            ob_clean();
//            header("location: index.php?action=errore&cod=002");
//            exit;
//        }
        DAOFactory::getRichiamoDAO()->insert($richiamo);
    }   
    
    ob_clean();
    //header("location: index.php?action=clientiList?idCliente");
    header("location: index.php?action=clientiList");
    exit;
}

function caricaListaRichiami(){
    global $listaRichiamiAll;
    $listaRichiamiAll = DAOFactory::getRichiamoDAO()->queryAll();
    
}

