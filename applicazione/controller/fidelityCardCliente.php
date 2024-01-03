<?php

function caricaInfoCardCliente(){
    global $listaCardClienti;
    $listaCardClienti = DAOFactory::getFidelityClienteDAO()->queryInfoFidelityCardCliente();
    $arrayCard["cardClienti"] = $listaCardClienti;

    print_r(json_encode($arrayCard));
}