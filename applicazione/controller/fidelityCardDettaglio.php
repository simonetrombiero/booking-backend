<?php

function salvaPuntiCliente(){
    
    $idCard = getRequest("idCard");
    $importo = getRequest("importo");
    
    $fidelityMovimento = new FidelityCardDettaglio();
    
    $fidelityMovimento->idCard = $idCard;
    $fidelityMovimento->data = date("Y-m-d");
    $fidelityMovimento->descrizione = "Carico Punti";
    $fidelityMovimento->importo = $importo;
    $fidelityMovimento->punti =$importo;
    
    $card = DAOFactory::getFidelityCardDAO()->load($idCard);
    
    $card->saldoPunti=$card->saldoPunti+floatval($importo);
   
    DAOFactory::getFidelityCardDettaglioDAO()->insert($fidelityMovimento);
    
    DAOFactory::getFidelityCardDAO()->update($card);
    
    
    ob_clean();
        header("location: index.php?action=fidelityCard");
        exit;
    
}

function caricaMovimentiFidelityCard(){
    global $cliente, $cardCliente, $listaMovimentiCard;
    $idCard = getRequest("idCard"); 
    if(isBlankOrNull($idCard)){
        header("location: index.php?action=fidelityCard");
        exit;
    }
    
    
    $idClienteTMP='';
   
    $cardCliente  = DAOFactory::getFidelityCardDAO()->load($idCard);
    $idClienteTMP = DAOFactory::getFidelityClienteDAO()->queryByIdCard($idCard);
   
    //if (!isBlankOrNull($idCard->id)) {   
    if(count($idClienteTMP)>0){
        $idCliente = $idClienteTMP[0];
        
        $cliente = DAOFactory::getClientiDAO()->load($idCliente->idCliente);
    }else{
        $cliente =NULL;
    }
    
    $listaMovimentiCard = DAOFactory::getFidelityCardDettaglioDAO()->queryByIdCard($idCard);
    
}


function caricaListaMovimentiFidelityCard(){
    global $listaMovimentiFidelity;
    $listaMovimentiFidelity = DAOFactory::getFidelityCardDettaglioDAO()->queryAll();
}