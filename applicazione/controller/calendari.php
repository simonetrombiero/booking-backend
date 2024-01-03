<?php

function caricaListaCalendari(){
    global $listaCalendari;
    $listaCalendari = DAOFactory::getCalendariDAO()->queryAll();
}

function salvaCalendario(){
    $id = getRequest("idCalendario");
    
    $titoloCalendario = getRequest("titoloCalendario");
    $postazioneCalendario = getRequest("postazioneCalendario");
    $calendarioAttivo = getRequest("calendarioAttivo");
    $backgroundColor = getRequest("backgroundCalendario");
    
    $calendario = new Calendari();
    

    $calendario->calendario = $titoloCalendario;
    $calendario->idPostazione = $postazioneCalendario;
    $calendario->attivo = $calendarioAttivo;
    $calendario->backgroundColor=$backgroundColor;
    
   
    
    if (!isBlankOrNull($id)){
        $calendario->id=$id;
        DAOFactory::getCalendariDAO()->update($calendario);
        
    }  else {
        
        DAOFactory::getCalendariDAO()->insert($calendario);
        
    }
    
    ob_clean();
    header("location: index.php?action=calendariList");
    exit;
}

function caricaCalendario(){
    global $calendario;
    $id = getRequest("id");
    $calendario = DAOFactory::getCalendariDAO()->load($id);
    
}





function caricaInformazioniCalendari() {
    
    $events = array();

    
    //$calendari = DAOFactory::getCalendariDAO()->queryAllOrderBy("titolo");
    $calendari = DAOFactory::getCalendariDAO()->queryByAttivo(1);
    
     for($i=0; $i<count($calendari);$i++) {
         
         
         
         $calendarioTmp = $calendari[$i];
         
         //$dipendenteCalendario = DAOFactory::getDipendenteDAO()->load($calendarioTmp->idDipendente);
         
         $postazione = DAOFactory::getPostazioniDAO()->load($calendarioTmp->idPostazione);
         
                 
         $e = array();
         //$e['id'] = $calendarioTmp->id;
         $e['id'] = $calendarioTmp->idPostazione;
         $e['title'] = $calendarioTmp->calendario." - ".$postazione->postazione;
         //$e['eventColor'] ='#'.$calendarioTmp->backgroundColor;
         
         array_push($events, $e);
     }
     
     print_r(json_encode($events));
}