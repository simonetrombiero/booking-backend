<?php

function caricaListaRisorsaPagamento(){
    global $listaRisorsaPagamento;
    $listaRisorsaPagamento = DAOFactory::getRisorsapagamentoDAO()->queryAll();
}

function salvaRisorsaPagamento(){
    $id = getRequest("idRisorsaPagamento");
    $nomeRisorsaPagamento = getRequest("nomeRisorsaPagamento");
    
    $risorsaPagamento = new Risorsapagamento();
    
    $risorsaPagamento->id  =$id;
    $risorsaPagamento->nome = $nomeRisorsaPagamento;
        
    if (!isBlankOrNull($id)){
        $risorsaPagamento->id=$id;
        DAOFactory::getRisorsapagamentoDAO()->update($risorsaPagamento);
    }  else {
        DAOFactory::getRisorsapagamentoDAO()->insert($risorsaPagamento);
        
    }
    
    ob_clean();
    header("location: index.php?action=risorsaPagamentoList");
    exit;
}

function caricaRisorsaPagamento(){
    global $risorsaPagamento;
    $id = getRequest("id");
    $risorsaPagamento = DAOFactory::getRisorsapagamentoDAO()->load($id);
    
}

function eliminaRisorsaPagamento(){
    $id = getRequest("id");
    DAOFactory::getRisorsapagamentoDAO()->delete($id);
    
    ob_clean();
    header("location: index.php?action=risorsaPagamentoList");
    exit;
    
}