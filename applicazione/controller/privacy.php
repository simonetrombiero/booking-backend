<?php

function nuovoConsenso(){
    global $cliente;
    $idCliente = getRequest("idCliente");
    $cliente = DAOFactory::getClientiDAO()->load($idCliente); 
}

function salvaConsenso(){
    $idCliente = getRequest("idCliente");
    $trattamentoDati = getRequest("trattamentoDati");
    $firma1 = getRequestNT("firma1");
    $consensoComunicazione = getRequest("consensoComunicazione");
    $firma2 = getRequestNT("firma2");
    $consensoFidelity = getRequest("consensoFidelity");
    $firma3 = getRequestNT("firma3");
    
    $privacy = new ConsensoPrivacy();
    
    $privacy->idCliente = $idCliente;
    $privacy->dataCompilazione = date("y-m-d");
    $privacy->trattamento = $trattamentoDati;
    $privacy->firmaTrattamento = $firma1;
    $privacy->comunicazione = $consensoComunicazione;
    $privacy->firmaComunicazione = $firma2;
    $privacy->fidelity = $consensoFidelity;
    $privacy->firmaFidelity = $firma3;
    
    DAOFactory::getConsensoPrivacyDAO()->insert($privacy);
    
    ob_clean();
    header("location: index.php?action=clientiList");
    exit;
    
    
}

function visualizzaConsenso(){
    global $privacy, $cliente;
    $idCliente = getRequest("idCliente");
    
    $cliente = DAOFactory::getClientiDAO()->load($idCliente);
    
    $tmp = DAOFactory::getConsensoPrivacyDAO()->queryByIdCliente($idCliente);
    $privacy = $tmp[0];
    
    
    
}