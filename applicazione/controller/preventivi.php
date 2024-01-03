<?php



function caricaListaPreventivi() {
    global $listaPreventivi;
    $listaPreventivi  = DAOFactory::getClientiDAO()->queryAll();
}





function caricaImpostazioniFattura(){
    global $listaPagamenti;
    $listaPagamenti = DAOFactory::getPagamentoDAO()->queryAll();
}