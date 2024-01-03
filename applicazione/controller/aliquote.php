<?php

function caricaListaAliquote(){
    global $listaAliquote;
    $listaAliquote = DAOFactory::getAliquotaDAO()->queryAll();
}

function salvaAliquota(){
    $id = getRequest("idAliquota");
    
    $nomeAliquota = getRequest("descrizioneAliquota");
    $valoreAliquota = getRequest("valoreAliquota");
    $naturaFAEAliquota = getRequest("naturaFAEAliquota");
    $sospesaAliquota = getRequest("sospesaAliquota");
    
      
    $aliquota = new Aliquota();
    
    $aliquota->id = $id;
    $aliquota->descrizione = $nomeAliquota;
    $aliquota->aliquota = $valoreAliquota;
    $aliquota->naturaFAE = $naturaFAEAliquota;
    
    if($sospesaAliquota==1){
        $aliquota->isSospeso=1;
    }
    
       
    if (!isBlankOrNull($id)){
        $aliquota->id=$id;
        DAOFactory::getAliquotaDAO()->update($aliquota);
    }  else {
        DAOFactory::getAliquotaDAO()->insert($aliquota);
        
    }
    
    ob_clean();
    header("location: index.php?action=aliquoteList");
    exit;
}

function caricaAliquota(){
    global $aliquota;
    $id = getRequest("id");
    $aliquota = DAOFactory::getAliquotaDAO()->load($id);
    
}

function eliminaAliquota(){
    $id = getRequest("id");
    DAOFactory::getAliquotaDAO()->delete($id);
    
    ob_clean();
    header("location: index.php?action=aliquoteList");
    exit;
    
}