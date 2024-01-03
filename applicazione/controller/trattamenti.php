<?php

function caricaTrattamenti() {
    if (empty($_GET['query'])) {
        exit;
    }

    $q = strtolower($_GET["query"]);

    if (get_magic_quotes_gpc()) {
        $q = stripslashes($q);
    }

    $prodotti = DAOFactory::getTrattamentiDAO()->findTrattamentoLike("LIKE '%$q%'");

//    $result = array();
//    for ($i = 0; $i < count($prodotti); $i++) {
//        $prodotto = $prodotti[$i];
//        array_push($result, array("id" => $prodotto->codice));
//    }

    print_r(json_encode($prodotti));
}


function caricaListaTrattamenti(){
    global $listaTrattamenti;
     
    $listaTrattamenti = DAOFactory::getTrattamentiDAO()->queryAll();
    
}

function salvaTrattamento(){
    $id = getRequest("idTrattamento");
    
    $nomeTrattamento = getRequest("nomeTrattamento");
    $costoTrattamento = getRequest("costoTrattamento");
    $tempoTrattamento = getRequest("tempoTrattamento");
    $categoriaTrattamento = getRequest("categoriaTrattameno");
    $classificazioneTrattameno = getRequest("classificazioneTrattameno");
    $ivaTrattamento = getRequest("ivaTrattamento");
    
    $trattamento = new Trattamenti();
    
    //$trattamento->id = $id;
    $trattamento->trattamento = $nomeTrattamento;
    $trattamento->costo = $costoTrattamento;
    $trattamento->tempo = $tempoTrattamento;
    $trattamento->categoria = $categoriaTrattamento;
    $trattamento->classificazione = $classificazioneTrattameno;
    $trattamento->idAliquota = $ivaTrattamento;
    
   
    
    if (!isBlankOrNull($id)){
        $trattamento->id=$id;
        DAOFactory::getTrattamentiDAO()->update($trattamento);
        
    }  else {
        
        DAOFactory::getTrattamentiDAO()->insert($trattamento);
        
    }
    
    ob_clean();
    header("location: index.php?action=trattamentiList");
    exit;
}

function caricaTrattamento(){
    global $trattamento;
    $id = getRequest("id");
    $trattamento = DAOFactory::getTrattamentiDAO()->load($id);
    
}

function eliminaTrattamento(){
    $id = getRequest("id");
    DAOFactory::getTrattamentiDAO()->delete($id);
    
    ob_clean();
    header("location: index.php?action=trattamentiList");
    exit;
    
}

//AUTOCOMPLETE DIPENDENTI
function caricaInformazioniTrattamento() {
    $arrayTmp = null;
    
    $trattamenti = DAOFactory::getTrattamentiDAO()->queryAll();
    
    $arrayTmp["trattamenti"] = $trattamenti;
    
    print_r(json_encode($arrayTmp));
    
}