<?php

function caricaIndici() {
    global $listaIndici;
    $listaIndici = DAOFactory::getIndicedocumentoDAO()->queryAll();
}

function salvaIndiceDocumento() {
    $idIndice = getRequest("idIndice");
    $anno = getRequest("anno");
    $progressivo = getRequest("progressivo");
    $registro = getRequest("registro");
    $idTipoDocumento = getRequest("tipoDocumento");

    if (!isBlankOrNull($idIndice)) {
        $indiceDocumento = DAOFactory::getIndicedocumentoDAO()->load($idIndice);
    } else {
        $indiceDocumento = new Indicedocumento();
    }
    
    $indiceDocumento->anno = $anno;
    $indiceDocumento->progressivo = $progressivo;
    $indiceDocumento->registro = $registro;
    $indiceDocumento->idTipoDocumento = $idTipoDocumento;
    
    if (isBlankOrNull($idIndice)) {
        DAOFactory::getIndicedocumentoDAO()->insert($indiceDocumento);
    } else {
        DAOFactory::getIndicedocumentoDAO()->update($indiceDocumento);
    }
    
    ob_clean();
    header("location: index.php?action=indiciDocumento");
    exit;
}
