<?php

function caricaProssimaPrenotazioni(){
    
    global $prossimePrenotazioni;


    $oggi = date('Y-m-d');
    
    $dopodomani = date('Y-m-d', strtotime("+3 day"));
    
$prossimePrenotazioni = DAOFactory::getPrenotazioniDAO()->queryPeriodoDaA($oggi, $dopodomani);
    
    
    
}
