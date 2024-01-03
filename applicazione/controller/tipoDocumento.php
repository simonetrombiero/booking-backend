<?php

function caricaTipiDocumento() {
    global $tipiDocumenti;
    $tipiDocumenti = DAOFactory::getTipodocumentoDAO()->queryAll();
}

function salvaTipiDocumento() {
    $nomeDocumento = getRequest("tipoDocumento");
    $sezione = getRequest("tipo");
    $idTipo = getRequest("idTipoDocumento");
    $documento = getRequest('documento');
    if (isBlankOrNull($idTipo)) {
        $tipoDocumento = new Tipodocumento();
    } else {
        $tipoDocumento = DAOFactory::getTipodocumentoDAO()->load($idTipo);
    }
    $tipoDocumento->nome = $nomeDocumento;
    $tipoDocumento->idTipo = $sezione;
    $tipoDocumento->idSezione = $documento;
    if (isBlankOrNull($idTipo)) {
        DAOFactory::getTipodocumentoDAO()->insert($tipoDocumento);
    } else {
        DAOFactory::getTipodocumentoDAO()->update($tipoDocumento);
    }

    ob_clean();
    header("location: index.php?action=tipiDocumento");
    exit;
}

function eliminaTipiDocumento() {
    $idTipo = getRequest("id");
    DAOFactory::getTipodocumentoDAO()->delete($idTipo);

    ob_clean();
    header("location: index.php?action=tipiDocumento");
    exit;
}

function modificaTipoDocumento() {
    global $tipoDocumento;
    $idTipo = getRequest("id");
    $tipoDocumento = DAOFactory::getTipodocumentoDAO()->load($idTipo);
}
