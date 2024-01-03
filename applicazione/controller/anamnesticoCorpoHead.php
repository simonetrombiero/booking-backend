<?php

function caricaMisurazioneAmnestico(){
    global $misurazioneHead, $misurazioni, $cliente;
    $id = getRequest("id");
    $misurazioneHead = DAOFactory::getAnamnesticoCorpoHeadDAO()->load($id);
    $misurazioni = DAOFactory::getAnamnesticoCorpoDAO()->queryByIdAnamnesticoOrderBy($id, "ordine");
    $cliente = DAOFactory::getClientiDAO()->load($misurazioneHead->idCliente);
}

function listaMisurazioneAmnestico(){
    global $cliente, $listaMisurazione, $questionario;
    $idQuestionario = getRequest("id");
    $idCliente = getRequest("idCliente");
    
    $cliente = DAOFactory::getClientiDAO()->load($idCliente);
    
    $questionario = DAOFactory::getAnmnesticoRisposteHeadDAO()->load($idQuestionario);
    
    $listaMisurazione = DAOFactory::getAnamnesticoCorpoHeadDAO()->queryByIdQuestionario($idQuestionario);
    
    
}

function nuovaMisurazioneAmnestico(){
    global $questionario, $cliente;
    
    $idQuestionario = getRequest("idQuestionario");
    $idCliente = getRequest("idCliente");
    
    $cliente = DAOFactory::getClientiDAO()->load($idCliente);
    
    $questionario = DAOFactory::getAnmnesticoRisposteHeadDAO()->load($idQuestionario);
}


function salvaMisurazioneAmnestico(){
    
    $idQuestionario = getRequest("idQuestionario");
    $idCliente = getRequest("idCliente");
    $dataMisurazione = getRequest("dataMisurazione");
    $numDomande = getRequest("numDomande");
    
    $corpoHead = new AnamnesticoCorpoHead();
    $corpoHead->idQuestionario = $idQuestionario;
    $corpoHead->idCliente = $idCliente;
    $corpoHead->data = dateToDb($dataMisurazione);
    
    $idCorpoHead = DAOFactory::getAnamnesticoCorpoHeadDAO()->insert($corpoHead);
    
    for($i=0;$i<$numDomande;$i++){
                
        $label = getRequest("label".$i);
        $misura = getRequest("domanda".$i);
        
        $misCorpo = new AnamnesticoCorpo();
        
        $misCorpo->idAnamnestico = $idCorpoHead;
        $misCorpo->label = $label;
        $misCorpo->descrizione = $misura;
        $misCorpo->ordine = $i+1;
        
        DAOFactory::getAnamnesticoCorpoDAO()->insert($misCorpo);
        
    }
    
     ob_clean();
    header("location: index.php?action=clientiList");
    exit;
    
}
function salvaEditMisurazioneAmnestico(){
    
    $id = getRequest("idCorpoHead");
    //$idCliente = getRequest("idCliente");
    $dataMisurazione = getRequest("dataMisurazione");
    $numDomande = getRequest("numDomande");
    
//    $corpoHead = new AnamnesticoCorpoHead();
//    $corpoHead->idQuestionario = $idQuestionario;
//    $corpoHead->idCliente = $idCliente;
//    $corpoHead->data = dateToDb($dataMisurazione);
    if (isset($id)){
        $corpoHead = DAOFactory::getAnamnesticoCorpoHeadDAO()->load($id);
        
        $corpoHead->data = dateToDb($dataMisurazione);
        
    
    $idCorpoHead = DAOFactory::getAnamnesticoCorpoHeadDAO()->update($corpoHead);
    
    DAOFactory::getAnamnesticoCorpoDAO()->deleteByIdAnamnestico($id);
    
    for($i=0;$i<$numDomande;$i++){
                
        $label = getRequest("label".$i);
        $misura = getRequest("domanda".$i);
        
        $misCorpo = new AnamnesticoCorpo();
        
        $misCorpo->idAnamnestico = $id;
        $misCorpo->label = $label;
        $misCorpo->descrizione = $misura;
        $misCorpo->ordine = $i+1;
        
        DAOFactory::getAnamnesticoCorpoDAO()->insert($misCorpo);
        
    }
    }
    
    
    ob_clean();
    header("location: index.php?action=clientiList");
    exit;
    
}

function cancellaMisurazioniAmnestico(){
    $id  = getRequest("id");
    
    DAOFactory::getAnamnesticoCorpoDAO()->deleteByIdAnamnestico($id);
    
    DAOFactory::getAnamnesticoCorpoHeadDAO()->delete($id);

    ob_clean();
    header("location: index.php?action=clientiList");
    exit;
}

function confrontaMisurazioniAmnestico(){
    global $cliente, $listaCorpoHead;
    $idQuestionario = getRequest("id");
    $idCliente = getRequest("idCliente");
    
    $cliente = DAOFactory::getClientiDAO()->load($idCliente);
    $listaCorpoHead = DAOFactory::getAnamnesticoCorpoHeadDAO()->queryByIdQuestionarioOrderBy($idQuestionario, "data");
    
}
