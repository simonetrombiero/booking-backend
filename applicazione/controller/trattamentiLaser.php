<?php

function caricaListaTrattamentiCliente() {
    global $cliente, $listaTrattamenti;
    $id = getRequest("idCliente");
    $cliente = DAOFactory::getClientiDAO()->load($id);
    $listaTrattamenti = DAOFactory::getTrattamentiLaserDAO()->queryByIdCliente($id);
}

function salvaSchedaLaserCliente() {

    $idScheda = getRequest("idScheda");
    $idClienteScheda = getRequest("idClienteScheda");
    $idCliente = getRequest("idCliente");

    $data = getRequest("data");
    $zonaTrattata = getRequest("zonaTrattata");
    $durata = getRequest("durata");
    $fototipo = getRequest("fototipo");
    $potenza = getRequest("potenza");
    $impulso = getRequest("impulso");
    $frequenza = getRequest("frequenza");
    $annotazioni = getRequest("annotazioni");




    $schedaLaser = new TrattamentiLaser();
    $schedaLaser->data = dateToDb($data);
    $schedaLaser->zonaTrattata = $zonaTrattata;
    $schedaLaser->durata = $durata;
    $schedaLaser->fototipo = $fototipo;
    $schedaLaser->potenza = $potenza;
    $schedaLaser->impulso = $impulso;
    $schedaLaser->frequenza = $frequenza;
    $schedaLaser->note = $annotazioni;


    if (!isBlankOrNull($idScheda)) {

        $schedaLaser->id = $idScheda;
        $schedaLaser->idCliente = $idClienteScheda;
        DAOFactory::getTrattamentiLaserDAO()->update($schedaLaser);
    } else {
        $schedaLaser->idCliente = $idCliente;
        DAOFactory::getTrattamentiLaserDAO()->insert($schedaLaser);
    }

    ob_clean();
    header("location: index.php?action=clientiList");
    exit;
}

function caricaSchedaLaser() {
    global $schedaLaser;
    $id = getRequest("idScheda");

    $schedaLaser = DAOFactory::getTrattamentiLaserDAO()->load($id);
}


function eliminaSchedaLaser() {
    
   
    $id = getRequest("idScheda");
    
    DAOFactory::getTrattamentiLaserDAO()->delete($id);

    ob_clean();
    header("location: index.php?action=clientiList");
    exit;
}

