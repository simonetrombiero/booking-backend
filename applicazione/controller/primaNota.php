<?php


function salvaPrimaNota(){
    $id = getRequest("idPrimaNota");
    
    $data = dateToDb(getRequest("data"));
    $descrizione = getRequest("descrizione");
    $movimento = getRequest("movimento");
    $importo = getRequest("importo");
    $modalita = getRequest("modalita");
    $note = getRequest("note");
    
    
    $primaNota = new PrimaNota();
    
    $primaNota->data=$data;
    $primaNota->descrizione = $descrizione;
    $primaNota->movimento =$movimento;
    $primaNota->importo = $importo;
    $primaNota->modalitaPagamento = $modalita;
    $primaNota->note = $note;
    
    
    
    
    
if (!isBlankOrNull($id)) {
    
    $primaNota->id = $id;
    DAOFactory::getPrimaNotaDAO()->update($primaNota);

    
} else {
    
    DAOFactory::getPrimaNotaDAO()->insert($primaNota);
         
}

ob_clean();
header("location: index.php?action=primaNota");
exit;
}

function caricaListaPrimaNota(){
    global $listaPrimaNota;
    //$listaPrimaNota = DAOFactory::getPrimaNotaDAO()->queryAll();
    $listaPrimaNota = DAOFactory::getPrimaNotaDAO()->queryAllOrderBy("data");
    
}

function caricaPrimaNota(){
    global $primaNota;
    $id = getRequest("id");
    $primaNota= DAOFactory::getPrimaNotaDAO()->load($id);
    
}


function eliminaPrimaNota(){
    $id = getRequest("id");
    DAOFactory::getPrimaNotaDAO()->delete($id);
    
    ob_clean();
    header("location: index.php?action=primaNota");
    exit;
}

