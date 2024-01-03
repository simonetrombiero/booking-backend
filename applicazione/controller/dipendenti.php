<?php

function caricaListaDipendenti(){
    global $listaDipendenti;
    $listaDipendenti = DAOFactory::getDipendenteDAO()->queryAll();
}

function salvaDipendente(){
    $id = getRequest("idDipendente");
    //$sedeDipendente = getRequest("idSede");
    $incaricoDipendente = getRequest("idIncarico");
    $nomeDipendente = getRequest("nomeDipendente");
    $cognomeDipendente = getRequest("cognomeDipendente");
    $backgroundColor = getRequest("backgroundCalendario");
    
    $dipendente = new Dipendente();
    
    //$dipendente->id = $id;
    $dipendente->idSede = 0;
    $dipendente->idIncarico = $incaricoDipendente;
    $dipendente->nome = $nomeDipendente;
    $dipendente->cognome = $cognomeDipendente;
    $dipendente->backgroundColor = $backgroundColor;
   
    
    if (!isBlankOrNull($id)){
        $dipendente->id=$id;
        DAOFactory::getDipendenteDAO()->update($dipendente);
        
    }  else {
        
        DAOFactory::getDipendenteDAO()->insert($dipendente);
        
    }
    
    ob_clean();
    header("location: index.php?action=dipendentiList");
    exit;
}

function caricaDipendente(){
    global $dipendente;
    $id = getRequest("id");
    $dipendente = DAOFactory::getDipendenteDAO()->load($id);
    
}

function eliminaDipendente(){
    $id = getRequest("id");
    DAOFactory::getDipendenteDAO()->delete($id);
    
    ob_clean();
    header("location: index.php?action=dipendentiList");
    exit;
    
}

//AUTOCOMPLETE DIPENDENTI
function caricaInformazioniDipendente() {
    $arrayTmp = null;
    
    $dipendenti = DAOFactory::getDipendenteDAO()->queryAll();
    
    $arrayTmp["dipendenti"] = $dipendenti;
    
    print_r(json_encode($arrayTmp));
    
}