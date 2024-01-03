<?php

function  caricaInformazioniComune() {
    $arrayTmp = null;

    //$clienti = DAOFactory::getClientiDAO()->queryAll();
    $comuniTmp = DAOFactory::getComuniDAO()->queryAll();

    $arrayTmp["comuni"] = $comuniTmp;
    
    print_r(json_encode($arrayTmp));
    
}

