<?php

function caricaListaContabilita(){
    global $listaDocumenti;
    //$listaDocumenti = array();
    global $listaPreventivi;
    //$listaPreventivi = array();
    
   $listaPreventivi = DAOFactory::getDocumentoDAO()->queryByIdTipoDocumento("3");
   
   $listaDocumenti = array_merge(DAOFactory::getDocumentoDAO()->queryByIdTipoDocumento("1"),DAOFactory::getDocumentoDAO()->queryByIdTipoDocumento("2"));
    
}
