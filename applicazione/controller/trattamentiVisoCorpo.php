<?php

function caricaListaVisoCorpoCliente(){
    global $cliente, $listaTrattamenti;
    $id = getRequest("idCliente");
    $cliente = DAOFactory::getClientiDAO()->load($id);
    $listaTrattamenti = DAOFactory::getTrattamentiVisoCorpoDAO()->queryByIdCliente($id);
}

function salvaSchedaVisoCorpo() {

    $idScheda = getRequest("idScheda");
    $idClienteScheda = getRequest("idClienteScheda");
    $idCliente = getRequest("idCliente");

    $data = getRequest("data");
    $zonaTrattata = getRequest("zonaTrattata");
    $durata = getRequest("durata");
    $misurazione = getRequest("misurazione");
    $pesoCorporeo = getRequest("pesoCorporeo");
    $annotazioni = getRequest("annotazioni");
   



    $schedaLaser = new TrattamentiVisoCorpo();
    $schedaLaser->data = dateToDb($data);
    $schedaLaser->zonaTrattata = $zonaTrattata;
    $schedaLaser->durata = $durata;
    $schedaLaser->misurazioni = $misurazione;
    $schedaLaser->pesoCorporeo = $pesoCorporeo;
    $schedaLaser->annotazioni = $annotazioni;
    

    if (!isBlankOrNull($idScheda)) {

        $schedaLaser->id = $idScheda;
        $schedaLaser->idCliente = $idClienteScheda;
        DAOFactory::getTrattamentiVisoCorpoDAO()->update($schedaLaser);
    } else {
        $schedaLaser->idCliente = $idCliente;
        DAOFactory::getTrattamentiVisoCorpoDAO()->insert($schedaLaser);
    }

    ob_clean();
    header("location: index.php?action=clientiList");
    exit;
}

function caricaSchedaVisoCorpo() {
    global $schedaVisoCorpo;
    $id = getRequest("idScheda");

    $schedaVisoCorpo = DAOFactory::getTrattamentiVisoCorpoDAO()->load($id);
}


function eliminaSchedaVisoCorpo() {
    
   
    $id = getRequest("idScheda");
    
    DAOFactory::getTrattamentiVisoCorpoDAO()->delete($id);

    ob_clean();
    header("location: index.php?action=clientiList");
    exit;
}
