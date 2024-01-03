<?php

function caricaListaIncarichi(){
    global $listaIncarichi;
    $listaIncarichi = DAOFactory::getIncaricoDAO()->queryAll();
}

function salvaIncarico(){
    $id = getRequest("idIncarico");
    $nomeIncarico = getRequest("nomeIncarico");
    
    
    $incarico = new Incarico();
    
    $incarico->id = $id;
    $incarico->nome = $nomeIncarico;
    
    
    if (!isBlankOrNull($id)){
        $incarico->id=$id;
        DAOFactory::getIncaricoDAO()->update($incarico);
    }  else {
        DAOFactory::getIncaricoDAO()->insert($incarico);
        
    }
    
    ob_clean();
    header("location: index.php?action=incarichiList");
    exit;
}

function caricaIncarico(){
    global $incarico;
    $id = getRequest("id");
    $incarico = DAOFactory::getIncaricoDAO()->load($id);
    
}

function eliminaIncarico(){
    $id = getRequest("id");
    DAOFactory::getIncaricoDAO()->delete($id);
    
    ob_clean();
    header("location: index.php?action=incarichiList");
    exit;
    
}

//AUTOCOMPLETE INCARICHI
function caricaInformazioniIncarico() {
    $arrayTmp = null;
    
    $incarichi = DAOFactory::getIncaricoDAO()->queryAll();
    
    $arrayTmp["incarichi"] = $incarichi;
    
    print_r(json_encode($arrayTmp));
    
}
