<?php

function caricaInformazioniRegione() {
    $arrayTmp = null;
//    $province = caricaprovincia("");
    $province = DAOFactory::getProvinceDAO()->queryAll();
//    $comuni = caricaComuni("");
    $comuni = DAOFactory::getComuniDAO()->queryAll();
//    $cap = caricaCap("");
    $cap = DAOFactory::getCapDAO()->queryAll();
//    $capComune = caricaCapascomuni("");
    $capComune = DAOFactory::getCapHasComuniDAO()->queryAll();
    
    $arrayTmp["province"] = $province;
    $arrayTmp["comuni"] = $comuni;
    $arrayTmp["cap"] = $cap;
    $arrayTmp["capComuni"] = $capComune;
    
    print_r(json_encode($arrayTmp));
}

