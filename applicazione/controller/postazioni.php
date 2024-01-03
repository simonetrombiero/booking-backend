<?php

function salvaPostazione(){
    $id= getRequest("idPostazione");
    
    $postazioneNome = getRequest("nomePostazione");
    
    
    $postazione = new Postazioni();
    
    $postazione->postazione = $postazioneNome;
    
    
    if (!isBlankOrNull($id)){
        $postazione->id=$id;
        DAOFactory::getPostazioniDao()->update($postazione);
        
    }  else {
        DAOFactory::getPostazioniDAO()->insert($postazione);
        
    }
    
    ob_clean();
    header("location: index.php?action=postazioniList");
    exit;
}

function caricaPostazione(){
    global $postazione;
    
    $id = getRequest("id");
    $postazione = DAOFactory::getPostazioniDAO()->load($id);
}


function caricaListaPostazioni(){
     global $listaPostazioni;
    
    $listaPostazioni = DAOFactory::getPostazioniDAO()->queryAll();
    
}

function caricaInformazioniPostazioni() {
    $arrayTmp = null;
    
    $postazioni = DAOFactory::getPostazioniDAO()->queryAll();
    
    $arrayTmp["postazioni"] = $postazioni;
    
    print_r(json_encode($arrayTmp));
}