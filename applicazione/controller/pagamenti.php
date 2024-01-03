<?php

function caricaListapagamenti(){
    global $listapagamenti;
    $listapagamenti = DAOFactory::getPagamentoDAO()->queryAll();
}

function nuovoPagamento(){
    global $cliente;
    global $listaPianoTattamenti;

    $idCliente = getRequest("idCliente");
    $cliente = DAOFactory::getClientiDAO()->load($idCliente);

    //Aggiungo la riga nella tabella pagamenti
    $pagamento = new Pagamento();
    $pagamento->cliente = $idCliente;
    $pagamento->id_piano = getRequest("id_piano");
    $pagamento->modalitaPagamento = getRequest("modalitaPagamento");
    $pagamento->data = date("Y-m-d");
    $pagamento->importo = getRequest("importo");
    $pagamento->riferimentoDoc = getRequest("riferimentoDoc");

    DAOFactory::getPagamentiDAO()->insert($pagamento);
    
    //Aggiorno la riga nella tabella pianoTrattamento
    $pianoTrattamento = DAOFactory::getPianoTrattamentoDAO()->load($pagamento->id_piano);
    $pianoTrattamento->totaleSaldato += $pagamento->importo;
    $pianoTrattamento->totaleDaSaldare -= $pagamento->importo;
    DAOFactory::getPianoTrattamentoDAO()->update($pianoTrattamento);

    $listaPianoTattamenti = DAOFactory::getPianoTrattamentoDAO()->queryByIdPaziente($idCliente);
}

function caricaPagamentiPiano(){
    global $listaPianoTattamenti;
    global $cliente;
    global $listapagamenti;

    $idCliente = getRequest("idCliente");
    $idPiano = getRequest("idPiano");

    $cliente = DAOFactory::getClientiDAO()->load($idCliente);
    $listaPianoTattamenti = DAOFactory::getPianoTrattamentoDAO()->queryByIdPaziente($idCliente);

    $listapagamenti = DAOFactory::getPagamentiDAO()->queryByPiano($idPiano);
}

function salvaPagamento(){
    $idCliente = getRequest("idCliente");
    $data = date("d-m-Y");
    $modalitaPagamento = getRequest("modalitaPagamento");
    $importo = getRequest("importo");
    

    $pagamento = new Pagamento();
}

function caricaPagamento(){
    global $pagamento;
    $id = getRequest("id");
    $pagamento = DAOFactory::getPagamentoDAO()->load($id);
    
}

function eliminaPagamento(){
    $id = getRequest("id");
    DAOFactory::getPagamentoDAO()->delete($id);
    
    ob_clean();
    header("location: index.php?action=aliquoteList");
    exit;
    
}