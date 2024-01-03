<?php

function caricaListaTrattamenti() {
    global $listaPianoTattamenti;
    global $cliente;
    $idClienti = getRequest("idCliente");
    $cliente = DAOFactory::getClientiDAO()->load($idClienti);
    //$listaRichiami = DAOFactory::getRichiamiDAO()->queryb($idClienti);
    $listaPianoTattamenti = DAOFactory::getPianoTrattamentoDAO()->queryByIdPaziente($idClienti);
}

function caricaPiano() {
    global $pianoTrattamento, $pianoTrattamentoDettaglio, $cliente;
    $id = getRequest("idPiano");
    $pianoTrattamento = DAOFactory::getPianoTrattamentoDAO()->load($id);
    $cliente = DAOFactory::getClientiDAO()->load($pianoTrattamento->idPaziente);
    //$pianoTrattamentoDettaglio = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryByTrattamentoIDorderByDataDESC($id);
    $pianoTrattamentoDettaglio = DAOFactory::getPianoTrattamentoItemDAO()->queryByIdPiano($id);
//    echo '<pre>';
//    print_r($pianoTrattamento);
//    print_r($pianoTrattamentoDettaglio);
//    echo '</pre>';
}

function caricaListaPianiInCorso() {
    $idCliente = getRequest("idCliente");

    echo '<p> </p><span style="font-weight: bolder;">Lista Piani Cura in Corso</span><br><br>'
    . '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';

//    $listaPianoTattamentiTMP = DAOFactory::getPianoTrattamentoDAO()->queryPianoTrattamentoAperti($idCliente);
    $listaPianoTattamentiTMP = DAOFactory::getPianoTrattamentoDAO()->queryPianoTrattamentoApertiInCorso($idCliente);
    //$listaPianoTattamentiTMP = DAOFactory::getPianoTrattamentoDAO()->queryByStato("2");
    for ($y = 0; $y < count($listaPianoTattamentiTMP); $y++) {
        $pianoCura = $listaPianoTattamentiTMP[$y];
        if($pianoCura->titolo!=''){
            $stringa = $pianoCura->titolo." del ".dateFromDb($pianoCura->data);
        }else{
           $stringa = "Piano di Cura del ".dateFromDb($pianoCura->data); 
        }
        $abc ='';
        $xxx = DAOFactory::getPianoTrattamentoItemDAO()->queryByIdPiano($pianoCura->id);
        //print_r($xxx); echo "<br>";
        for($z=0; $z<count($xxx);$z++){
            $xab=$xxx[$z];
            if($z==0){
                $abc .=" - ".$xab->trattamento; 
            }else{
                $abc .='<br> - '.$xab->trattamento; 
            }
           
        }
        
             
        
            
        //echo "<input type='radio' name='idPiano' id='idPiano' value='$pianoCura->id'> " . $stringa . "<br>".$abc."<br>";
        echo '<div class="panel panel-default">'
        . '<div class="panel-heading" role="tab" id="heading'.$y.'">'
                . ''
                . '<table>'
                . '<tr>'
                . '<td style="width: 5%"><input type="radio" name="idPiano" id="idPiano" value="'.$pianoCura->id.'"></td>'
                . '<td style="width: 95%"><h4 class="panel-title">'
                . '<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$y.'" aria-expanded="false" aria-controls="collapse'.$y.'">'
                . '<span style="display: block; float:left; width: 95%;">'.$stringa.'</span>'
                . '<span style="display: block; float:right; width: 5%; text-align: right;"><i class="fa fa-chevron-down fa-lg"></i></span></a></h4></td></tr>
</table>'
                . ''
                . '</div>'
                . '<div id="collapse'.$y.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$y.'">'
                . ' <div class="panel-body">'
                . $abc
                . '</div>'
                . ' </div>'
                . '</div>';
    }

echo '</div>';
    
        
  
       
        
          
        
      
    
    
     
        
      
   
  
  

//            '<br>';
//    
//    echo $idCliente;
//    
}

function salvaPiano(){
    $idPiano = getRequest("idPiano");
    $idCliente = getRequest("idCliente");
    $titoloPiano = getRequest("titoloPiano");
    $statoPiano = getRequest("statoPiano");
    $dataCreazione = getRequest("dataCreazione");
    $dataInizio = dateToDb(getRequest("dataInizio"));
    $numeroSedute = getRequest("numeroSedute");
    $notePiano = getRequest("notePiano");
    
    $coord_x = getRequestNT("coordinatepallino_x");
    $coord_y = getRequestNT("coordinatepallino_y");
    
    $zonatrattata_XY = $coord_x.", ".$coord_y;
    
    $idTrattamentiTMP = getRequestNT("trattamenti");
    $qtaTMP = getRequestNT('quantita');
    $descrizioneTMP = getRequestNT("descrizione");
    $importoTMP = getRequestNT("importo");
    $totaleRigaTMP = getRequestNT("totaleRiga");
    
    $totalePiano = getRequest("totaleDocumento");
    
    $nNuoviTrattamenti = getRequest("nNuoviTrattamenti");
    
    if (!isBlankOrNull($idPiano)) { // UPDATE PIANO
        
    } else { // NUOVO PIANO
        
        $pianoTrattamento = new PianoTrattamento();
        
        $pianoTrattamento->data = date("Y-m-d");
        $pianoTrattamento->titolo = $titoloPiano;
        $pianoTrattamento->idPaziente = $idCliente;
        $pianoTrattamento->seduteNumero = $numeroSedute;
        $pianoTrattamento->stato = $statoPiano;
        $pianoTrattamento->totaleTrattamento = $totalePiano;
        $pianoTrattamento->totaleDaSaldare = $totalePiano;
        $pianoTrattamento->note = $notePiano;
        $pianoTrattamento->zonaTrattata = $zonatrattata_XY;
        
        
        $idPiano = DAOFactory::getPianoTrattamentoDAO()->insert($pianoTrattamento);
        //$totaleTMP = 0;
        //for($jj=1; $jj<=$nNuoviTrattamenti;$jj++){
        for($jj=0;$jj<count($qtaTMP);$jj++){
            
            /*$idTrattamento = getRequest("idTrattamento$jj");
            $trattamentotmp = DAOFactory::getTrattamentiDAO()->load($idTrattamento);
            
            $totaleTMP += $trattamentotmp->costo*$numeroSedute;*/
            
            $pianoTrattamentoItem = new PianoTrattamentoItem();
            
            $pianoTrattamentoItem->idPiano = $idPiano;
            $pianoTrattamentoItem->idTrattamentoPiano = $idTrattamentiTMP[$jj];
            $pianoTrattamentoItem->numeroRiga = $jj+1;
            $pianoTrattamentoItem->qta = $qtaTMP[$jj];
            $pianoTrattamentoItem->trattamento = $descrizioneTMP[$jj];
            $pianoTrattamentoItem->prezzoUnitario = $importoTMP[$jj];
            $pianoTrattamentoItem->totaleRiga = $totaleRigaTMP[$jj];
            $pianoTrattamentoItem->status = $statoPiano;
            
            DAOFactory::getPianoTrattamentoItemDAO()->insert($pianoTrattamentoItem);
            
            
            
            
            
    }
    
//    $pianoTrattamentotmp = DAOFactory::getPianoTrattamentoDAO()->load($idPiano);
//    $pianoTrattamentotmp->totaleTrattamento = $totaleTMP;
//    $pianoTrattamentotmp->totaleDaSaldare = $totaleTMP;
//    
//    DAOFactory::getPianoTrattamentoDAO()->update($pianoTrattamentotmp);
    
        
    }
    
    
    
    
    header("location: index.php?action=listaPianoTerapeutico&idCliente=$idCliente");
    
}

//function salvaEditPiano() {
//    
//   
//    $idCliente = getRequest("idCliente");
//    $numeroRighe = getRequest("numRighe");
//    $idPiano = getRequest("idPiano");
//    $titoloPiano = getRequest("titoloPiano");
//    $statoPiano = getRequest("statoPiano");
//    $notePiano = getRequest("notePiano");
//    
//      
//    $pianoTMP = DAOFactory::getPianoTrattamentoDAO()->load($idPiano);
//    
//    $pianoTMP->titolo = $titoloPiano;
//    $pianoTMP->note = $notePiano;
//    if(!isBlankOrNull($statoPiano)){
//        $pianoTMP->stato = $statoPiano;
//    }
//    
//    //print_r($pianoTMP);
//    
//    DAOFactory::getPianoTrattamentoDAO()->update($pianoTMP);
//    
//     //exit;
//    
//    for ($i = 0; $i < $numeroRighe; $i++) {
//        $dataPiano = getRequest("dataPiano$i");
//        $oraPiano = getRequest("oraPiano$i");
//        $statoPiano = getRequest("statoPiano$i");
//        $presenzaPiano = getRequest("presenzaPiano$i");
//        //postazione
//        $operatorePiano = getRequest("operatorePiano$i");
//        $idDettaglio = getRequest("idDettaglio$i");
//        $notePiano = getRequest("notePiano$i");
//
//        $itemTrattamento = DAOFactory::getPianoTrattamentoDettaglioDAO()->load($idDettaglio);
//        $itemTrattamento->data = dateToDb($dataPiano);
//        //$itemTrattamento->oraInizio = $oraPiano
//        $itemTrattamento->status = $statoPiano;
//        $itemTrattamento->noShow = $presenzaPiano;
//        $itemTrattamento->operatore = $operatorePiano;
//        $itemTrattamento->note = $notePiano;
//
//        $itemTrattamento->id = $idDettaglio;
//
//
//
//        DAOFactory::getPianoTrattamentoDettaglioDAO()->update($itemTrattamento);
//    }
//    
//    header("location: index.php?action=listaPianoTerapeutico&idCliente=$idCliente");
//}


function salvaEditPiano() {
    
   
    $idCliente = getRequest("idCliente");
    $idPiano = getRequest("idPiano");
    $titoloPiano = getRequest("titoloPiano");
    $statoPiano = getRequest("statoPiano");
    $numeroSedute = getRequest("numeroSedute");
    $notePiano = getRequest("notePiano");
    $totalePiano = getRequest("totaleDocumento");
    $coord_x = getRequestNT("coordinatepallino_x");
    $coord_y = getRequestNT("coordinatepallino_y");
    
    $zonatrattata_XY = $coord_x.", ".$coord_y;
 
    $righeDelete = getRequest("righeDaEliminare");
    
    $righeDaEliminare = explode(",", $righeDelete);
      
    $pianoTMP = DAOFactory::getPianoTrattamentoDAO()->load($idPiano);
    
    $pianoTMP->titolo = $titoloPiano;
    $pianoTMP->seduteNumero = $numeroSedute;
    $pianoTMP->note = $notePiano;
    $pianoTMP->totaleDaSaldare = $totalePiano;
    $pianoTMP->zonaTrattata = $zonatrattata_XY;
    if(!isBlankOrNull($statoPiano)){
        $pianoTMP->stato = $statoPiano;
    }
    
    //print_r($pianoTMP);
    
    DAOFactory::getPianoTrattamentoDAO()->update($pianoTMP);
    
    /*  DETTAGLIO DEL PIANO MODIFICATO - va controllato:
     * 
     *  - eventuali righe da eliminare;
     *  - eventuli update
     *  - evenutali nuove righe   
     * 
     */
    
    
    $idRiga = getRequestNT("idRiga");
    $idTrattamento = getRequestNT("trattamenti");
    $quantita = getRequestNT("quantitaRiga");
    
    $descrizione = getRequestNT("descrizione");
    $importo = getRequestNT("importo");
    $totale = getRequestNT("totaleRiga");
    
    for($u=0; $u<count($idRiga);$u++){
        
        if($idRiga[$u]=="new"){
            $rigaDettaglio = new PianoTrattamentoItem();
            $rigaDettaglio->idPiano = $idPiano;
            $rigaDettaglio->idTrattamentoPiano = $idTrattamento[$u];
            $rigaDettaglio->numeroRiga=$u+1;
            $rigaDettaglio->qta = $quantita[$u];
            $rigaDettaglio->trattamento = $descrizione[$u];
            $rigaDettaglio->prezzoUnitario=$importo[$u];
            $rigaDettaglio->totaleRiga=$totale[$u];
            $rigaDettaglio->status=$statoPiano;
            
            DAOFactory::getPianoTrattamentoItemDAO()->insert($rigaDettaglio);
           
        } else {
            $rigaDettaglio = DAOFactory::getPianoTrattamentoItemDAO()->load($idRiga[$u]);
            
            
            
            $rigaDettaglio->idPiano = $idPiano;
            $rigaDettaglio->idTrattamentoPiano = $idTrattamento[$u];
            $rigaDettaglio->numeroRiga=$u+1;
            $rigaDettaglio->qta = $quantita[$u];
            $rigaDettaglio->trattamento = $descrizione[$u];
            $rigaDettaglio->prezzoUnitario=$importo[$u];
            $rigaDettaglio->totaleRiga=$totale[$u];
            $rigaDettaglio->status=$statoPiano;
            //print_r($rigaDettaglio);
            //
           //echo '1';
            DAOFactory::getPianoTrattamentoItemDAO()->update($rigaDettaglio);
        }
    }
    for($d=0; $d<count($righeDaEliminare);$d++){
        $idDelete = $righeDaEliminare[$d];
        DAOFactory::getPianoTrattamentoItemDAO()->delete($idDelete);
        
    }
    
      
    
    header("location: index.php?action=listaPianoTerapeutico&idCliente=$idCliente");
}


function caricaListaPrestazioni(){
    global $listaPrestazioni;
    $listaPrestazioni = DAOFactory::getPianoTrattamentoDAO()->queryByStato("2");
}

function caricaListaPrestazioniAll(){
    global $listaPrestazioni;
    $listaPrestazioni = DAOFactory::getPianoTrattamentoDAO()->queryAll();
}

function eliminaPianoTerapeutico(){
    $id = getRequest("id");
    $pianoTMP = DAOFactory::getPianoTrattamentoDAO()->load($id);
    
    $idCliente = $pianoTMP->idPaziente;
    
    DAOFactory::getPianoTrattamentoItemDAO()->deleteByIdTrattamentoPiano($id);
    
    DAOFactory::getPianoTrattamentoDAO()->delete($id);
    
    // ELIMINA APPUNTAMENTI E DETTAGLI
    $tmp = DAOFactory::getPrenotazioniDAO()->queryByIdPiano($id);
    for($x=0;$x<count($tmp);$x++){
        $prenotazione = $tmp[$x];
        DAOFactory::getPrenotazioniDettaglioDAO()->deleteByPrenotazione($prenotazione->id);
    }
    
    DAOFactory::getPrenotazioniDAO()->deleteByIdPiano($id);
    
   
    header("location: index.php?action=listaPianoTerapeutico&idCliente=$idCliente");
    
}

function generaAppuntamenti(){
    global $pianoTrattamento, $pianoTrattamentoItem;
    
    $id = getRequest("idPiano");
    
    $pianoTrattamento = DAOFactory::getPianoTrattamentoDAO()->load($id);
    
    $pianoTrattamentoItem = DAOFactory::getPianoTrattamentoItemDAO()->queryByIdPiano($id);
    
   
    
}