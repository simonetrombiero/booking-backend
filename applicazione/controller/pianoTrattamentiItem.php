<?php

function salvaRigaPiano(){
    
    $id = getRequest("idApputnamento");
    //$trattamentoAppuntamento = getRequest("trattamentoAppuntamento"); 
    
    
    $trattamentiAppuntamenti = $_POST["trattamentiAppuntamento"]; 
    $dataAppuntamento = dateToDb(getRequest("dataAppuntamento"));
    $oraInizio = getRequest("oraInizio");
    //$oraFine = getRequest("oraFine");
    $oraSeduta1 =$oraInizio.":00";
    $trattamentiTMP='';
     for($j=0;$j<count($trattamentiAppuntamenti);$j++){
        $idTrattamento = $trattamentiAppuntamenti[$j];
        $tratt = DAOFactory::getTrattamentiDAO()->load($idTrattamento);
        if($j==0){
             $trattamentiTMP .=$tratt->trattamento;
        }else{
           $trattamentiTMP .=", ".$tratt->trattamento; 
        }
        
    }
    
    
//    $tempoTrattamento = DAOFactory::getTrattamentiDAO()->queryByTrattamento($trattamentoAppuntamento);
//    if(count($tempoTrattamento)>0){
//        
//        //$oraFine = sommaOre($oraSeduta1, $tempoTrattamento[0]->tempo);
//        $oraFine = sommaOre($oraSeduta1, "01:00:00"); 
//        
//    }else{
//       //$oraFine = sommaOre($oraSeduta1, "00:15:00");
//       $oraFine = sommaOre($oraSeduta1, "01:00:00");
//    }
    
    $oraFine = sommaOre($oraSeduta1, "01:00:00");
        
             
   
    
    
    $postazioneAppuntamento = getRequest("postazioneAppuntamento");
    $operatoreAppuntamento = getRequest("operatoreAppuntamento");
    $statusAppuntamento = getRequest("statusAppuntamento");
    $presenzaAppuntamento =getRequest("presenzaAppuntamento");
    $noteAppuntamento = getRequest("noteAppuntamento");
    
    
    
    
    
    
    if (!isBlankOrNull($id)) {
        
        //$rigaTrattamento = new PianoTrattamentoDettaglio();
    $rigaTrattamento = DAOFactory::getPianoTrattamentoDettaglioDAO()->load($id);
    //$rigaTrattamento->id = $id;
    //$rigaTrattamento->trattamento = $trattamentoAppuntamento;
    $rigaTrattamento->trattamento = $trattamentiTMP;
    $rigaTrattamento->data = $dataAppuntamento;
    $rigaTrattamento->oraInizio = $oraInizio;
    
    $rigaTrattamento->oreFine = $oraFine;
    $rigaTrattamento->postazione = $postazioneAppuntamento;
    $rigaTrattamento->operatore = $operatoreAppuntamento;
    $rigaTrattamento->status = $statusAppuntamento;
    $rigaTrattamento->note = $noteAppuntamento;
    
    if (!isBlankOrNull($presenzaAppuntamento)) {
        $rigaTrattamento->noShow = $presenzaAppuntamento;
    } else {
        $rigaTrattamento->noShow =NULL;
    }
        
        DAOFactory::getPianoTrattamentoDettaglioDAO()->update($rigaTrattamento);
    }
   
    ob_clean();
    header("location: index.php?action=visualizzaAppuntamento&id=$id");
    exit; 
}



function eliminaRigaPiano(){
    $id = getRequest("idRiga");
    $idPiano = getRequest("idPiano");
    
    DAOFactory::getPianoTrattamentoDettaglioDAO()->delete($id);
    
    ob_clean();
    header("location: index.php?action=modificaPiano&idPiano=$idPiano");
    exit;
    
}

function caricaRigaPiano(){
    global $trattamentoRigaPiano;
    $id = getRequest("id");
    //$idPiano = getRequest("idPiano");
    
    $trattamentoRigaPiano = DAOFactory::getPianoTrattamentoDettaglioDAO()->load($id);
    
}

/*
 * funzione per chiamata ajax
function setPresenza(){
    
    $idRiga = getRequest("app");
    $presenza = getRequest("q");
    
    $tmp = DAOFactory::getPianoTrattamentoDettaglioDAO()->load($idRiga);
    $tmp->noShow = $presenza;
    
    DAOFactory::getPianoTrattamentoDettaglioDAO()->update($tmp);
    
}
 
 */

function setPresenza(){
    
    $idRiga = getRequest("idApputnamento");
    $presenza = getRequest("presenzaAppuntamento");
    
    $tmp = DAOFactory::getPianoTrattamentoDettaglioDAO()->load($idRiga);
    $tmp->noShow = $presenza;
    
    DAOFactory::getPianoTrattamentoDettaglioDAO()->update($tmp);
    
    ob_clean();
    header("location: index.php?action=visualizzaAppuntamento&id=$idRiga");
    exit;
    
}

function setPresenzaM(){
    
    $numeroRighe = getRequest("numRiga");
    
    for($jj=0;$jj<$numeroRighe;$jj++){
        
    $idRiga = getRequest("idRiga$jj");
    $presenza = getRequest("presenza$jj");
    
    $tmp = DAOFactory::getPianoTrattamentoDettaglioDAO()->load($idRiga);
    $tmp->noShow = $presenza;
    
    DAOFactory::getPianoTrattamentoDettaglioDAO()->update($tmp);
    echo '<br><pre>';
    print_r($tmp);
    }
    
    
    
}