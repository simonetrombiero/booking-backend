<?php

function caricaDocumentiPZ() {
    global $listaDocumentazione;
    global $cliente;

    $idCliente = getRequest("idCliente");
    $cliente = DAOFactory::getClientiDAO()->load($idCliente);
    $listaDocumentazione = DAOFactory::getDocumentazioneDAO()->queryByIdPaziente($idCliente);
}

function nuovaDocumentazione() {
    global $cliente;
    global $pianiCuraInCorso;
    
    $idCliente = getRequest("idCliente");
    
    $cliente = DAOFactory::getClientiDAO()->load($idCliente);
    
    $pianiCuraInCorso = DAOFactory::getPianoTrattamentoDAO()->queryPianoTrattamentoAperti($idCliente);
}

function salvaDocumentazione (){
    
    $idCliente = getRequest("idCliente");
    
    $oggi = date("Y-m-d");
    
    
    $descrizioneDocumento = getRequest("descrizioneDocumento");
    $dataDocumentoTMP = getRequest("dataDocumento");
    if(isBlankOrNull($dataDocumentoTMP)){
        $dataDocumento = "0000-00-00";
    } else {
        $dataDocumento = dateToDb($dataDocumentoTMP);
    }
    
    $pianoCura = getRequest("pianoCura");
    
    if($pianoCura==0){ $pianoCura = NULL;}
    
    $sottodir = str_pad($idCliente, 6, '0', STR_PAD_LEFT);
    $directory="documentazione/".$sottodir;
    
    if (!is_dir($directory)) {
        mkdir($directory, 0775, true);
        
    }
    
    
    //////////////
    if(is_uploaded_file($_FILES['fileDocumento']['tmp_name'])){
        
        $newName = PulisciNomeFile($_FILES['fileDocumento']['name'], $sottodir);
        
                //move_uploaded_file($_FILES['fileDocumento']['tmp_name'], $directory."/".$_FILES['fileDocumento']['name']);
                move_uploaded_file($_FILES['fileDocumento']['tmp_name'], $directory."/".$newName);
                //$foto = $sottodir.$_FILES['fileDocumento']['name'];
                //$foto = $a[$i];
                $documentazione = new Documentazione();
                $documentazione->idPaziente=$idCliente;
                $documentazione->descrizione=$descrizioneDocumento;
                $documentazione->dataAcquisizione = $oggi;
                $documentazione->dataDocumento = $dataDocumento;
                $documentazione->allegato = $newName;
                
                $idDoc =  DAOFactory::getDocumentazioneDAO()->insert($documentazione);
                
                if(isset($pianoCura)){                    echo 'xxxxxx';
                $docPiano = new DocumentazionePianoTrattamento();
                $docPiano->idDocumentazione = $idDoc;
                $docPiano->idPianoTrattamento = $pianoCura;
                DAOFactory::getDocumentazionePianoTrattamentoDAO()->insert($docPiano);
                }
            }
    
    ob_clean();
    header("location: index.php?action=clientiList");
    exit;
    
}

function eliminaDocumentazione() {
    $id = getRequest("id");
    $docTMP = DAOFactory::getDocumentazioneDAO()->load($id);
    
    $sottodir = str_pad($docTMP->idPaziente, 6, '0', STR_PAD_LEFT);
    $file="documentazione/".$sottodir."/".$docTMP->allegato;
    unlink($file);
     
    DAOFactory::getDocumentazioneDAO()->delete($id);
    
    DAOFactory::getDocumentazionePianoTrattamentoDAO()->deleteByIdDocumentazione($id);

    ob_clean();
    header("location: index.php?action=clientiList");
    exit;
}

function caricaDocumentoPZ(){
    global $documentazione;
    global $cliente;
    $id = getRequest("id");
    
    $documentazione = DAOFactory::getDocumentazioneDAO()->load($id);
    if(!isBlankOrNull($documentazione->idPaziente)){
        $cliente = DAOFactory::getClientiDAO()->load($documentazione->idPaziente);
    }
}
