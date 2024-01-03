<?php

function caricaDocumenti() {
    global $listaDocumenti, $tipoDoc;
    $tipoDoc = getRequest("type");
    $listaDocumenti = DAOFactory::getDocumentoDAO()->queryByIdTipoDocumento($tipoDoc);
}

function caricaListaDocumenti() {
    global $listaDocumenti;
    $listaDocumenti = DAOFactory::getDocumentoDAO()->queryAll();
}

function salvaVendita() {
    $idDocumento = getRequest("idDocumento");
    $idAppuntamento = getRequest("idAppuntamento");

    $isModifica = false;
    if (!isBlankOrNull($idDocumento)) {
        $isModifica = true;
    }


    $imponibileDocumento = getRequest("imponibileDocumento");
    $totaleIva = round(getRequest("totaleIva"), 2);
    $totaleDocumento = getRequest("totaleDocumento");
    $idPagamento = getRequest("idPagamento");

    $totaleDaSaldare = getRequest("totaleDaSaldare");
    $totaleSaldato = getRequest("totaleSaldato");
//    $abbuono = getRequest("abbuono");
//    $eccedenza = getRequest("eccedenza");
    $note = getRequest("note");

    $tipoDocumento = getRequest("tipoDocumento");
    $documentoDefinitivo = getRequest("documentoDefinitivo");

    $importoPagato = getRequest("importoPagato");
    $modalitaPagamento = getRequest("modalitaPagamento");


//    $indiceDocumento = caricaIndicedocumentoById($numerazioneFattura);
    if (!isBlankOrNull($idDocumento)) {
        $documento = DAOFactory::getDocumentoDAO()->load($idDocumento);
    } else {
        $documento = new Documento();
    }
    $ciccio = 'vendita';
    $cliente = null;
    $fornitore = null;
    // if (strpos($tipo->nomeTipo, "endit") > 0) {
    if (strpos($ciccio, "endit") > 0) {
        $idCliente = getRequest("idCliente");
        if ($isModifica) {
            $cliente = DAOFactory::getClientidocDAO()->load($idCliente);
        } else {
            $cliente = DAOFactory::getClientiDAO()->load($idCliente);
        }
//        $documento->idClienteDoc = $idCliente;
    } else if (strpos($tipo->nomeTipo, "cquisto") > 0) {
        $idFornitore = getRequest("idFornitore");
//        $documento->idFornitoreDoc = $idFornitore;
        if ($isModifica) {
            $fornitore = DAOFactory::getFornitoredocDAO()->load($idFornitore);
        } else {
            $fornitore = DAOFactory::getFornitoreDAO()->load($idFornitore);
        }
    }

    /* $documento->idIndiceDocumento = $idIndiceDocumento;
      $documento->progressivo = $numero;
      $documento->anno = $anno; */
    $documento->idIndiceDocumento = "99";
    $documento->progressivo = "99";
    $documento->anno = date("Y");
    //$documento->data = dateToDb($data);
    $documento->data = date("Y-m-d");
    $documento->idTipoDocumento = $tipoDocumento;
    $documento->idPagamentoDoc = $modalitaPagamento;
    $documento->imponibile = $imponibileDocumento;
    $documento->totaleIva = $totaleIva;
    $documento->totaleDocumento = $totaleDocumento;
    $documento->totaleSaldato = $totaleSaldato;
    $documento->totaleDaSaldare = $totaleDaSaldare;
    $documento->note = $note;
    $documento->isDefinitivo = $documentoDefinitivo;


    //if (strpos($tipo->nomeTipo, "endit") > 0) {
    if (strpos($ciccio, "endit") > 0) {

        if (!isBlankOrNull($documento->idClienteDoc)) {
            $clienteDoc = DAOFactory::getClientidocDAO()->load($documento->idClienteDoc);
        } else {
            $clienteDoc = new Clientidoc();
        }
        $clienteDoc->idCliente = $cliente->id;
        //$clienteDoc->cap = $cliente->cap;
        $clienteDoc->cap = '1';
        $clienteDoc->nome = $cliente->nome;
        $clienteDoc->cognome = $cliente->cognome;
        // $clienteDoc->codice = $cliente->codice;
        $clienteDoc->codice = "";
        $clienteDoc->codiceFiscale = $cliente->cFiscale;
        $clienteDoc->idCitta = $cliente->citta;
        $clienteDoc->indirizzo = $cliente->indirizzo;
        $clienteDoc->piva = $cliente->partitaIva;
        $clienteDoc->ragioneSociale = $cliente->ragioneSociale;

        if (!isBlankOrNull($documento->idClienteDoc)) {
            /* DAOFactory::getClientidocDAO()->update($clienteDoc); */
            DAOFactory::getClientiDAO()->update($clienteDoc);
            $idClienteDoc = $documento->idClienteDoc;
        } else {
            $idClienteDoc = DAOFactory::getClientidocDAO()->insert($clienteDoc);
            /* $idClienteDoc = DAOFactory::getClientiDAO()->insert($clienteDoc); */
        }
        $documento->idClienteDoc = $idClienteDoc;
    } else if (strpos($tipo->nomeTipo, "cquisto") > 0) {
//        $idFornitore = getRequest("idFornitore");
//        $fornitore = DAOFactory::getFornitoreDAO()->load($idFornitore);
        $fornitoreDoc = new Fornitoredoc();
        $fornitoreDoc->cap = $fornitore->cap;
        $fornitoreDoc->cellulare = $fornitore->cellulare;
        $fornitoreDoc->codice = $fornitore->codice;
        $fornitoreDoc->email = $fornitore->email;
        $fornitoreDoc->fax = $fornitore->fax;
        $fornitoreDoc->fiscale = $fornitore->fiscale;
        $fornitoreDoc->idCitta = $fornitore->idCitta;
        $fornitoreDoc->indirizzo = $fornitore->indirizzo;
        $fornitoreDoc->piva = $fornitore->piva;
        $fornitoreDoc->ragioneSociale = $fornitore->ragioneSociale;
        $fornitoreDoc->sitoweb = $fornitore->sitoweb;
        $fornitoreDoc->telefono = $fornitore->telefono;
        $fornitoreDoc->idFornitore = $fornitore->id;

        $idFornitoreDoc = DAOFactory::getFornitoredocDAO()->insert($fornitore);
        $documento->idFornitoreDoc = $idFornitoreDoc;
    }

    //PAGAMENTI
    if(($tipoDocumento==1)||($tipoDocumento==2)){  // scontrini o fatture
    if (($modalitaPagamento != 8)&&($modalitaPagamento != 6)) {

        $pagamentoDocumento = new Pagamenti();
        $pagamentoDocumento->cliente = $idCliente;
        $pagamentoDocumento->data = date("Y-m-d");
        if ($importoPagato > 0) {
            $pagamentoDocumento->importo = $importoPagato;

            $documento->totaleSaldato = $importoPagato;
            $documento->totaleDaSaldare = $totaleDocumento - $importoPagato;
        } else {
            $pagamentoDocumento->importo = $totaleDocumento;

            $documento->totaleSaldato = $totaleDocumento;
            $documento->totaleDaSaldare = "0";
        }


        $pagamentoDocumento->modalitaPagamento = $modalitaPagamento;

        if (!isBlankOrNull($idPagamento)) {
            DAOFactory::getPagamentiDAO()->update($pagamentoDocumento);
        } else {
            DAOFactory::getPagamentiDAO()->insert($pagamentoDocumento);
        }
        
    }

    if ($modalitaPagamento == 8) {
        $documento->totaleSaldato = "0";
        $documento->totaleDaSaldare = $totaleDocumento;
    }
    }




    if (!isBlankOrNull($idDocumento)) {
        DAOFactory::getDocumentoDAO()->update($documento);
    } else {
        $idDocumento = DAOFactory::getDocumentoDAO()->insert($documento);
    }





//    for ($i = 0; $i < count($acconti); $i++) {
//        $rigaAcconto = $acconti[$i];
//        $acconto = new Accontodocumento();
//        $acconto->idDocumento = $idDocumento;
//        $acconto->importo = $rigaAcconto['importo'];
//        $acconto->data = dateToDb($rigaAcconto['dataPagamento']);
//        DAOFactory::getAccontodocumentoDAO()->insert($acconto);
//    }
    // AGGIORNO L'INDICE PER IL DOCUMENTO
//    $indiceObj = DAOFactory::getIndicedocumentoDAO()->load($idIndiceDocumento);
//    $indiceObj->progressivo = $indiceObj->progressivo + 1;
//    DAOFactory::getIndicedocumentoDAO()->update($indiceObj);
    //$indiceRiga = 0;
    /* for ($r = 0, $rlen = count($_POST['rows']); $r < $rlen; $r++) {
      if ($_POST['rows'][$r][0] != "null" && $_POST['rows'][$r][0] != "" && $_POST['rows'][$r][0] != null) {
      //            $fatturaItem = new Fatturaitem();

      $codiceProdotto = $_POST['rows'][$r][0];
      $descrizioneProdotto = $_POST['rows'][$r][1];
      $unitaMisura = $_POST['rows'][$r][2];
      $qtaProdotto = $_POST['rows'][$r][3];
      $prezzoUnitario = $_POST['rows'][$r][4];
      $sconto1 = $_POST['rows'][$r][5];
      $sconto2 = $_POST['rows'][$r][6];
      $sconto3 = $_POST['rows'][$r][7];
      $totaleRiga = $_POST['rows'][$r][8];
      $ivaProdotto = number_format($_POST['rows'][$r][9], 2, ".", "");
      $idProdotto = $_POST['rows'][$r][10];
      $idProdottoDoc = $_POST['rows'][$r][11];
      $idItem = $_POST['rows'][$r][12];

      $idProdottoDoc = null;
      $isNuovoProdotto = false;
      $aliquota = null;
      if (isBlankOrNull($idProdotto) && isBlankOrNull($idProdottoDoc)) {
      $isNuovoProdotto = true;
      $prodotto = new Prodotto();
      $prodotto->codice = $codiceProdotto;
      $prodotto->descrizione = $descrizioneProdotto;
      $prodotto->prezzoVendita = $prezzoUnitario;
      $prodotto->ricaricoPerc = 100;
      $prodotto->prezzoAcquisto = $prezzoUnitario / 2;
      $aliquota = DAOFactory::getAliquotaDAO()->queryByValore($ivaProdotto);
      $prodotto->ricarico = $prezzoUnitario / 2;
      $prodotto->idAliquota = $aliquota[0]->id;
      $prodotto->um = $unitaMisura;
      $prodotto->qta = 1;
      $prodotto->utile = $prezzoUnitario - (($prezzoUnitario / 2) * (1 + ($aliquota[0]->valore) / 100));
      $idProdotto = DAOFactory::getProdottoDAO()->insert($prodotto);
      }

      if (!isBlankOrNull($idProdottoDoc)) {
      $prodottoDoc = new Prodottodoc();
      $prodottoDoc->codice = $codiceProdotto;
      $prodottoDoc->descrizione = $descrizioneProdotto;
      $prodottoDoc->prezzoVendita = $prezzoUnitario;
      $prodottoDoc->ricaricoPerc = 100;
      $prodottoDoc->prezzoAcquisto = $prezzoUnitario / 2;
      $prodottoDoc->ricarico = $prezzoUnitario / 2;
      if (isBlankOrNull($aliquota)) {
      $aliquota = DAOFactory::getAliquotaDAO()->queryByValore($ivaProdotto);
      }
      $prodottoDoc->idAliquota = $aliquota[0]->id;
      $prodottoDoc->um = $unitaMisura;
      $prodottoDoc->qta = 1;
      $prodottoDoc->utile = $prezzoUnitario - (($prezzoUnitario / 2) * (1 + ($aliquota[0]->valore) / 100));
      $idProdottoDoc = DAOFactory::getProdottodocDAO()->insert($prodottoDoc);
      }

      if (isBlankOrNull($idItem)) {
      $itemDocumento = new Itemdocumento();
      } else {
      $itemDocumento = DAOFactory::getItemdocumentoDAO()->load($idItem);
      }

      $prodotto = DAOFactory::getProdottoDAO()->load($idProdotto);
      $prodotto->qta = $prodotto->qta - $qtaProdotto;
      if (isBlankOrNull($idProdottoDoc)) {
      $idProdottoDoc = $idProdotto;
      }
      $itemDocumento->idProdottoDoc = $idProdottoDoc;
      $itemDocumento->codice = $codiceProdotto;
      $itemDocumento->descrizione = $descrizioneProdotto;
      $itemDocumento->idDocumento = $idDocumento;
      $itemDocumento->um = $unitaMisura;
      $itemDocumento->qta = $qtaProdotto;
      $itemDocumento->prezzoUnitario = $prezzoUnitario;
      $itemDocumento->sconto1 = $sconto1;
      $itemDocumento->sconto2 = $sconto2;
      $itemDocumento->sconto3 = $sconto3;
      $itemDocumento->totaleRiga = $totaleRiga;
      $itemDocumento->valoreIva = $ivaProdotto;
      $itemDocumento->posizione = $indiceRiga;

      $indiceRiga++;

      //            $prodotto = caricaProdottoById($idProdotto);
      //            $idItem = aggiornaFatturaitem($fatturaItem);
      if (isBlankOrNull($idItem)) {
      $idItem = DAOFactory::getItemdocumentoDAO()->insert($itemDocumento);
      } else {
      DAOFactory::getItemdocumentoDAO()->update($itemDocumento);
      }


      }
      } */

    //    foreach ( $_POST as $key => $value ){
//        echo $key."--->".$value."<br>";
//        
//}
//echo "<pre>";
    //  exit;
    $qtaTMP = $_POST['quantita'];
    $descrizioneTMP = $_POST["descrizione"];
    $importoTMP = $_POST["importo"];
    $scontoTMP = $_POST["sconto"];
    $totaleTMP = $_POST["totale"];
    $aliquotaTMP = $_POST["aliquotaIva"];
    $ivaTMP = $_POST["iva"];

    print_r($ivaTMP);
    $indiceRiga = 1;
    for ($r = 0; $r < count($qtaTMP); $r++) {
        $itemDocumento = new Itemdocumento();

        $itemDocumento->idDocumento = $idDocumento;
        $itemDocumento->qta = $qtaTMP[$r];
        $itemDocumento->descrizione = $descrizioneTMP[$r];
        $itemDocumento->prezzoUnitario = $importoTMP[$r];
        $itemDocumento->sconto1 = $scontoTMP[$r];
        $itemDocumento->totaleRiga = $totaleTMP[$r];
        $itemDocumento->percentualeIva = $aliquotaTMP[$r];
        $itemDocumento->valoreIva = $ivaTMP[$r];
        $itemDocumento->posizione = $indiceRiga;

        $indiceRiga++;
        //if (isBlankOrNull($idItem)) {
        $idItem = DAOFactory::getItemdocumentoDAO()->insert($itemDocumento);
        // } else {
        //     DAOFactory::getItemdocumentoDAO()->update($itemDocumento);
        //}
    }


    if (!isBlankOrNull($idAppuntamento)) {
        //AGGIORNO STATO PRENOTAZIONE
        $appuntamento = DAOFactory::getPrenotazioniDAO()->load($idAppuntamento);

        $appuntamento->status = 2;

        DAOFactory::getPrenotazioniDAO()->update($appuntamento);
    }

    header("location: index.php?action=contabilita");
    exit;
}

function salvaDocumento() {


//    return;
    $idDocumento = getRequest("idDocumento");
    $isModifica = false;
    if (!isBlankOrNull($idDocumento)) {
        $isModifica = true;
    }
    $idIndiceDocumento = getRequest("idIndiceDocumento");
    $idTipoDocumento = getRequest("tipoDocumento");

    $tipoDocumento = DAOFactory::getTipodocumentoDAO()->load($idTipoDocumento);

    $tipo = DAOFactory::getTipoDAO()->load($tipoDocumento->idTipo);

    $numero = getRequest("progressivo");
    $anno = getRequest("anno");
    $data = getRequest("data");
    $idDestinazioneMerce = getRequest("destinazione");

    $pagamenti = json_decode(getRequest('pagamento'), true);
    $acconti = json_decode(getRequest('acconti'), true);


    $imponibileDocumento = getRequest("imponibileDocumento");
    $totaleIva = getRequest("totaleIva");
    $totaleDocumento = getRequest("totaleDocumento");
    $idPagamento = getRequest("idPagamento");
    $totaleDaSaldare = getRequest("totaleDaSaldare");
    $totaleSaldato = getRequest("totaleSaldato");

    $note = getRequest("note");


    if (!isBlankOrNull($idDocumento)) {
        $documento = DAOFactory::getDocumentoDAO()->load($idDocumento);
    } else {
        $documento = new Documento();
    }

    $cliente = null;
    $fornitore = null;
    if (strpos($tipo->nomeTipo, "endit") > 0) {
        $idCliente = getRequest("idCliente");
        if ($isModifica) {
            $cliente = DAOFactory::getClientidocDAO()->load($idCliente);
        } else {
            $cliente = DAOFactory::getClientiDAO()->load($idCliente);
        }
    } else if (strpos($tipo->nomeTipo, "cquisto") > 0) {
        $idFornitore = getRequest("idFornitore");


        if ($isModifica) {
            $fornitore = DAOFactory::getFornitoredocDAO()->load($idFornitore);
        } else {
            $fornitore = DAOFactory::getFornitoreDAO()->load($idFornitore);
        }
    }

    $documento->idIndiceDocumento = $idIndiceDocumento;
    $documento->progressivo = $numero;
    $documento->anno = $anno;
    $documento->data = dateToDb($data);
    $documento->idTipoDocumento = $idTipoDocumento;
    $documento->imponibile = $imponibileDocumento;
    $documento->totaleIva = $totaleIva;
    $documento->totaleDocumento = $totaleDocumento;
    $documento->totaleSaldato = $totaleSaldato;
    $documento->totaleDaSaldare = $totaleDaSaldare;
    $documento->note = $note;
    $documento->isDefinitivo = 0;


    if (strpos($tipo->nomeTipo, "endit") > 0) {
//        $idCliente = getRequest("idCliente");
//        getRequest("idClienteDoc")
//        if($isModifica){
//            
//        }else{
//            
//        }
//        $cliente = DAOFactory::getClientiDAO()->load($idCliente);
        if (!isBlankOrNull($documento->idClienteDoc)) {
            $clienteDoc = DAOFactory::getClientidocDAO()->load($documento->idClienteDoc);
        } else {
            $clienteDoc = new Clientidoc();
        }
        $clienteDoc->idCliente = $cliente->id;
        $clienteDoc->cap = $cliente->cap;
        $clienteDoc->nome = $cliente->nome;
        $clienteDoc->cognome = $cliente->cognome;
        $clienteDoc->codice = $cliente->codice;
        $clienteDoc->codiceFiscale = $cliente->codiceFiscale;
        $clienteDoc->idCitta = $cliente->idCitta;
        $clienteDoc->indirizzo = $cliente->indirizzo;
        $clienteDoc->piva = $cliente->piva;
        $clienteDoc->ragioneSociale = $cliente->ragioneSociale;

        if (!isBlankOrNull($documento->idClienteDoc)) {
            /* DAOFactory::getClientidocDAO()->update($clienteDoc); */
            DAOFactory::getClientiDAO()->update($clienteDoc);
            $idClienteDoc = $documento->idClienteDoc;
        } else {
            /* $idClienteDoc = DAOFactory::getClientidocDAO()->insert($clienteDoc); */
            $idClienteDoc = DAOFactory::getClientiDAO()->insert($clienteDoc);
        }
        $documento->idClienteDoc = $idClienteDoc;
    } else if (strpos($tipo->nomeTipo, "cquisto") > 0) {
//        $idFornitore = getRequest("idFornitore");
//        $fornitore = DAOFactory::getFornitoreDAO()->load($idFornitore);
        $fornitoreDoc = new Fornitoredoc();
        $fornitoreDoc->cap = $fornitore->cap;
        $fornitoreDoc->cellulare = $fornitore->cellulare;
        $fornitoreDoc->codice = $fornitore->codice;
        $fornitoreDoc->email = $fornitore->email;
        $fornitoreDoc->fax = $fornitore->fax;
        $fornitoreDoc->fiscale = $fornitore->fiscale;
        $fornitoreDoc->idCitta = $fornitore->idCitta;
        $fornitoreDoc->indirizzo = $fornitore->indirizzo;
        $fornitoreDoc->piva = $fornitore->piva;
        $fornitoreDoc->ragioneSociale = $fornitore->ragioneSociale;
        $fornitoreDoc->sitoweb = $fornitore->sitoweb;
        $fornitoreDoc->telefono = $fornitore->telefono;
        $fornitoreDoc->idFornitore = $fornitore->id;

        $idFornitoreDoc = DAOFactory::getFornitoredocDAO()->insert($fornitore);
        $documento->idFornitoreDoc = $idFornitoreDoc;
    }
    if (!isBlankOrNull($idDocumento)) {
        DAOFactory::getDocumentoDAO()->update($documento);
    } else {
        $idDocumento = DAOFactory::getDocumentoDAO()->insert($documento);
    }


    for ($i = 0; $i < count($acconti); $i++) {
        $rigaAcconto = $acconti[$i];
        $acconto = new Accontodocumento();
        $acconto->idDocumento = $idDocumento;
        $acconto->importo = $rigaAcconto['importo'];
        $acconto->data = dateToDb($rigaAcconto['dataPagamento']);
        DAOFactory::getAccontodocumentoDAO()->insert($acconto);
    }


    // AGGIORNO L'INDICE PER IL DOCUMENTO
    $indiceObj = DAOFactory::getIndicedocumentoDAO()->load($idIndiceDocumento);
    $indiceObj->progressivo = $indiceObj->progressivo + 1;
    DAOFactory::getIndicedocumentoDAO()->update($indiceObj);

    $indiceRiga = 0;
    for ($r = 0, $rlen = count($_POST['rows']); $r < $rlen; $r++) {
        if ($_POST['rows'][$r][0] != "null" && $_POST['rows'][$r][0] != "" && $_POST['rows'][$r][0] != null) {
//            $fatturaItem = new Fatturaitem();

            $codiceProdotto = $_POST['rows'][$r][0];
            $descrizioneProdotto = $_POST['rows'][$r][1];
            $unitaMisura = $_POST['rows'][$r][2];
            $qtaProdotto = $_POST['rows'][$r][3];
            $prezzoUnitario = $_POST['rows'][$r][4];
            $sconto1 = $_POST['rows'][$r][5];
            $sconto2 = $_POST['rows'][$r][6];
            $sconto3 = $_POST['rows'][$r][7];
            $totaleRiga = $_POST['rows'][$r][8];
            $ivaProdotto = number_format($_POST['rows'][$r][9], 2, ".", "");
            $idProdotto = $_POST['rows'][$r][10];
            $idProdottoDoc = $_POST['rows'][$r][11];
            $idItem = $_POST['rows'][$r][12];

            $idProdottoDoc = null;
            $isNuovoProdotto = false;
            $aliquota = null;
            if (isBlankOrNull($idProdotto) && isBlankOrNull($idProdottoDoc)) {
                $isNuovoProdotto = true;
                $prodotto = new Prodotto();
                $prodotto->codice = $codiceProdotto;
                $prodotto->descrizione = $descrizioneProdotto;
                $prodotto->prezzoVendita = $prezzoUnitario;
                $prodotto->ricaricoPerc = 100;
                $prodotto->prezzoAcquisto = $prezzoUnitario / 2;
                $aliquota = DAOFactory::getAliquotaDAO()->queryByValore($ivaProdotto);
                $prodotto->ricarico = $prezzoUnitario / 2;
                $prodotto->idAliquota = $aliquota[0]->id;
                $prodotto->um = $unitaMisura;
                $prodotto->qta = 1;
                $prodotto->utile = $prezzoUnitario - (($prezzoUnitario / 2) * (1 + ($aliquota[0]->valore) / 100));
                $idProdotto = DAOFactory::getProdottoDAO()->insert($prodotto);
            }

            if (!isBlankOrNull($idProdottoDoc)) {
                $prodottoDoc = new Prodottodoc();
                $prodottoDoc->codice = $codiceProdotto;
                $prodottoDoc->descrizione = $descrizioneProdotto;
                $prodottoDoc->prezzoVendita = $prezzoUnitario;
                $prodottoDoc->ricaricoPerc = 100;
                $prodottoDoc->prezzoAcquisto = $prezzoUnitario / 2;
                $prodottoDoc->ricarico = $prezzoUnitario / 2;
                if (isBlankOrNull($aliquota)) {
                    $aliquota = DAOFactory::getAliquotaDAO()->queryByValore($ivaProdotto);
                }
                $prodottoDoc->idAliquota = $aliquota[0]->id;
                $prodottoDoc->um = $unitaMisura;
                $prodottoDoc->qta = 1;
                $prodottoDoc->utile = $prezzoUnitario - (($prezzoUnitario / 2) * (1 + ($aliquota[0]->valore) / 100));
                $idProdottoDoc = DAOFactory::getProdottodocDAO()->insert($prodottoDoc);
            }

            if (isBlankOrNull($idItem)) {
                $itemDocumento = new Itemdocumento();
            } else {
                $itemDocumento = DAOFactory::getItemdocumentoDAO()->load($idItem);
            }

            $prodotto = DAOFactory::getProdottoDAO()->load($idProdotto);
            $prodotto->qta = $prodotto->qta - $qtaProdotto;
            if (isBlankOrNull($idProdottoDoc)) {
                $idProdottoDoc = $idProdotto;
            }
            $itemDocumento->idProdottoDoc = $idProdottoDoc;
            $itemDocumento->codice = $codiceProdotto;
            $itemDocumento->descrizione = $descrizioneProdotto;
            $itemDocumento->idDocumento = $idDocumento;
            $itemDocumento->um = $unitaMisura;
            $itemDocumento->qta = $qtaProdotto;
            $itemDocumento->prezzoUnitario = $prezzoUnitario;
            $itemDocumento->sconto1 = $sconto1;
            $itemDocumento->sconto2 = $sconto2;
            $itemDocumento->sconto3 = $sconto3;
            $itemDocumento->totaleRiga = $totaleRiga;
            $itemDocumento->valoreIva = $ivaProdotto;
            $itemDocumento->posizione = $indiceRiga;

            $indiceRiga++;

//            $prodotto = caricaProdottoById($idProdotto);
//            $idItem = aggiornaFatturaitem($fatturaItem);
            if (isBlankOrNull($idItem)) {
                $idItem = DAOFactory::getItemdocumentoDAO()->insert($itemDocumento);
            } else {
                DAOFactory::getItemdocumentoDAO()->update($itemDocumento);
            }

//            $storicoProdotto = new Storicoprodotto();
//            $storicoProdotto->idProdotto = $idProdotto;
//            $storicoProdotto->idItemDocumento = $idItem;
//            $storicoProdotto->idTipoDocumento = $tipoDocumento;
//            $storicoProdotto->tipoDocumento = $tipoDocumentoObj->voceMenu;
//
//            $storicoProdotto->qta = $qtaProdotto;
//            $storicoProdotto->prezzoAcquisto = $prodotto->prezzoAcquisto;
//            $storicoProdotto->prezzoVendita = $prodotto->prezzoVendita;
//            $storicoProdotto->dataVendita = date("Y-m-d");
//            $storicoProdotto->codiceProdotto = $prodotto->codice;
//            $storicoProdotto->descrizioneProdotto = $prodotto->descrizione;
//            aggiornaStoricoprodotto($storicoProdotto);
        }
    }
//    print_r(json_encode($_POST['rows']));
    print_r(json_encode("OK"));
}

function editDocumento() {
    global $aliquote, $listaPagamenti, $idTipoDocumento, $itemsDocumento, $documento, $pagamentoDoc, $ratePagamentoDoc, $accontiDoc;
    $idDocumento = getRequest("id");
    if (!isBlankOrNull($idDocumento)) {
        $documento = DAOFactory::getDocumentoDAO()->load($idDocumento);
        $aliquote = DAOFactory::getAliquotaDAO()->queryAll();
        $listaPagamenti = DAOFactory::getPagamentoDAO()->queryAll();
        $idTipoDocumento = $documento->idTipoDocumento;
        $itemsDocumento = DAOFactory::getItemdocumentoDAO()->queryByIdDocumento($idDocumento);
        if (!isBlankOrNull($documento->idPagamentoDoc)) {
            $pagamentoDoc = DAOFactory::getPagamentodocDAO()->load($documento->idPagamentoDoc);
            $ratePagamentoDoc = DAOFactory::getRatapagamentodocDAO()->queryByIdPagamentoDoc($pagamentoDoc->id);
        }
        $accontiDoc = DAOFactory::getAccontodocumentoDAO()->queryByIdDocumento($documento->id);
    }
}

function eliminaDestinazioneDocumento() {
    $idDestinazioneDoc = getRequest("idDestinazioneDoc");
    $idDocumento = getRequest("idDocumento");
    DAOFactory::getDestinazionemercedocDAO()->delete($idDestinazioneDoc);
    $documento = DAOFactory::getDocumentoDAO()->load($idDocumento);
    $documento->idDestinazioneDoc = null;
    DAOFactory::getDocumentoDAO()->update($documento);
    print_r(json_encode("1"));
}

function getDocumento() {
    global $aliquote, $listaPagamenti, $idTipoDocumento, $documento, $cliente, $fornitore, $itemsDocumento;

    $idDocumento = getRequest("id");
    
    $documento = DAOFactory::getDocumentoDAO()->load($idDocumento);
    $aliquote = DAOFactory::getAliquotaDAO()->queryAll();
    $listaPagamenti = DAOFactory::getPagamentoDAO()->queryAll();

    $idTipoDocumento = $documento->idTipoDocumento;
    $tipoDocumento = DAOFactory::getTipodocumentoDAO()->load($idTipoDocumento);
    $tipo = DAOFactory::getTipoDAO()->load($tipoDocumento->idTipo);
    $cliente = null;
    $fornitore = null;
    if (strpos($tipo->nomeTipo, "endit") > 0) {
        $cliente = DAOFactory::getClientidocDAO()->load($documento->idClienteDoc);
    } else if (strpos($tipo->nomeTipo, "cquisto") > 0) {
        $fornitore = DAOFactory::getFornitoredocDAO()->load($documento->idFornitoreDoc);
    }
    $itemsDocumento = DAOFactory::getItemdocumentoDAO()->queryByIdDocumento($idDocumento);
    
        
}

function eliminaDocumento() {
    // aggiungere eliminazioni collegamenti
    $idDocumento = getRequest("id");
    $documento = DAOFactory::getDocumentoDAO()->load($idDocumento);
    DAOFactory::getDocumentoDAO()->delete($idDocumento);

    ob_clean();
    header("location: index.php?action=listaDocumenti&type=$documento->idTipoDocumento");
    exit;
}

function getDocumentiCliente() {
    //SOLO DOCUMENTI FISCALI
    global $documentiCliente, $cliente;
    $idCliente = getRequest("id");
    $cliente = DAOFactory::getClientiDAO()->load($idCliente);
//    $clienteDoc = DAOFactory::getClientidocDAO()->queryByIdCliente($idCliente);
    $documentiCliente = DAOFactory::getDocumentoDAO()->queryByIdCliente($idCliente);
}

function getAllDocumentiCliente() {
    //INCLUSO PREVENTIVI
    global $documentiCliente, $clienteDoc;
    $idCliente = getRequest("id");
    $clienteDoc = DAOFactory::getClientiDAO()->load($idCliente);
//    $clienteDoc = DAOFactory::getClientidocDAO()->queryByIdCliente($idCliente);
    $documentiCliente = DAOFactory::getDocumentoDAO()->queryAllByIdCliente($idCliente);
}

function eliminaPagamentoDocumento() {
    $idDocumento = getRequest("idDocumento");
    $documento = DAOFactory::getDocumentoDAO()->load($idDocumento);
    DAOFactory::getPagamentodocDAO()->delete($documento->idPagamentoDoc);
    DAOFactory::getRatapagamentodocDAO()->deleteByIdPagamentoDoc($documento->idPagamentoDoc);

    $documento->idPagamentoDoc = null;
    DAOFactory::getDocumentoDAO()->update($documento);
    print_r(json_encode("Ok"));
}

function eliminaAccontoDocumento() {
    $idAcconto = getRequest("idAcconto");
    $idDocumento = getRequest("idDocumento");
    $documento = DAOFactory::getDocumentoDAO()->load($idDocumento);
    $pagamentoDoc = DAOFactory::getPagamentodocDAO()->load($documento->idPagamentoDoc);
    if (count($pagamentoDoc) > 0) {
        $acconto = DAOFactory::getAccontodocumentoDAO()->load($idAcconto);
        $rateDocumento = DAOFactory::getRatapagamentodocDAO()->queryByIdPagamentoDoc($pagamentoDoc->id);
        $numeroRate = count($rateDocumento);
        $importoAcconto = $acconto->importo;
        for ($i = 0; $i < $numeroRate; $i++) {
            $rata = $rateDocumento[$i];
            $rata->importo += ($importoAcconto / $numeroRate);
            DAOFactory::getRatapagamentodocDAO()->update($rata);
        }
    }
    DAOFactory::getAccontodocumentoDAO()->delete($idAcconto);
    print_r(json_encode("Ok"));
}

function stampaDocumento() {
    include_once('phpJasperXML/class/tcpdf/tcpdf.php');
    include_once("phpJasperXML/class/PHPJasperXML.inc.php");

    $xml = simplexml_load_file("jrxml/fattura2.jrxml");

    $idDocumento = getRequest("id");

    $documento = DAOFactory::getDocumentoDAO()->load($idDocumento);
    $tipoDocumento = DAOFactory::getTipodocumentoDAO()->load($documento->idTipoDocumento);
    $tipo = DAOFactory::getTipoDAO()->load($tipoDocumento->idTipo);
    $sezione = DAOFactory::getSezioneDAO()->load($tipoDocumento->idSezione);
    $azienda = DAOFactory::getAziendaDAO()->queryAll();
    $azienda = $azienda[0];

    $nomeDocumento = $sezione->nomeSezione . " " . $tipo->nomeTipo;

    $denominazioneCliente = '';
    $cittaCapCliente = '';
    if ($tipo->nomeTipo == 'Acquisto') {
        $fornitore = DAOFactory::getFornitoredocDAO()->load($documento->idFornitoreDoc);
    } else if ($tipo->nomeTipo == 'Vendita') {
        $cliente = DAOFactory::getClientidocDAO()->load($documento->idClienteDoc);
        $denominazioneCliente = $cliente->cognome . " " . $cliente->nome;
        $citta = DAOFactory::getComuniDAO()->loadById($cliente->idCitta);
        $cittaCapCliente = $cliente->cap . " - " . $citta->comune . " (" . $citta->siglaProv . ")";
    }

    $destinazioneMerce = DAOFactory::getDestinazionemercedocDAO()->load($documento->idDestinazioneDoc);
    $cittaDestinazioneCliente = $destinazioneMerce->cap . " - " . $destinazioneMerce->citta . " (" . $destinazioneMerce->provincia . ")";
    $indirizzoDestinazioneMerce = $destinazioneMerce->indirizzo;
    $nominativoDestinazione = $destinazioneMerce->nominativo;

    $denominazioneAzienda = $azienda->denominazione;
    $pivaAzienda = $azienda->piva;
    $codiceFiscaleAzienda = $azienda->codFisc;
    $indirizzoAzienda = $azienda->indirizzo;
    $telefonoAzienda = $azienda->telefono;
    $faxAzienda = $azienda->fax;
    $cittaAzienda = DAOFactory::getComuniDAO()->loadById($azienda->idCitta);
    $capCittaAzienda = $azienda->cap . " - " . $cittaAzienda->comune . " (" . $cittaAzienda->siglaProv . ")";
    $contattiAzienda = '';
    if (!isBlankOrNull($azienda->telefono)) {
        $contattiAzienda .= "Tel. $azienda->telefono";
        if (!isBlankOrNull($azienda->fax)) {
            $contattiAzienda .= " - Fax $azienda->fax";
        }
    } else {
        if (!isBlankOrNull($azienda->fax)) {
            $contattiAzienda .= "Fax $azienda->fax";
        }
    }
    $emailAzienda = $azienda->email;


    $PHPJasperXML = new PHPJasperXML("en", "TCPDF");

    $PHPJasperXML->debugsql = false;
//    $PHPJasperXML->arrayfield = array("");
    $PHPJasperXML->arrayfield = array(
        "codiceProdotto",
        "descrizioneProdotto",
        "um",
        "qta",
        "prezzoUnitario",
        "sconto1",
        "sconto2",
        "sconto3",
        "totaleRiga",
        "ivaProdotto",
        "totaleFattura",
//        "image" => "data:".$azienda->tipoImmagine.";base64,". $azienda->logo,
    );

    $PHPJasperXML->arrayParameter = array(
        "id" => $idDocumento,
        "azienda" => $denominazioneAzienda,
        "indirizzoAzienda" => $indirizzoAzienda,
        "capCittaAzienda" => $capCittaAzienda,
        "pivaAzienda" => $pivaAzienda,
        "codiceFiscaleAzienda" => strtoupper($codiceFiscaleAzienda),
        "contattiAzienda" => $contattiAzienda,
        "emailAzienda" => $emailAzienda,
        "cliente" => $denominazioneCliente,
        "cittaCliente" => $cittaCapCliente,
        "indirizzoCliente" => $cliente->indirizzo,
        "pivaCliente" => $cliente->piva,
        "destinazioneCliente" => $nominativoDestinazione,
        "cittaDestinazioneCliente" => $cittaDestinazioneCliente,
        "indirizzoDestinazioneCliente" => $indirizzoDestinazioneMerce,
        "nomeDocumento" => $nomeDocumento,
        "totaleDocumento" => $documento->totaleDocumento,
        "codiceCliente" => "",
        "codiceAgente" => "",
        "codiceZona" => "",
        "destPvendita" => "",
        "modalitaPagamento" => "",
        "banca" => "",
        "ABI" => "",
        "CAB" => "",
        "CC" => "",
        "image" => "data:" . $azienda->tipoImmagine . ";base64," . base64_encode(stripslashes($azienda->logo)),
        "telefonoAzienda" => $telefonoAzienda,
        "faxAzienda" => $faxAzienda
//        "image" => "test.php",
    );

    $PHPJasperXML->xml_dismantle($xml);
//        $PHPJasperXML->arraysqltable = getDatiFatturaStampa("$id");
    $PHPJasperXML->transferDBtoArray(ConnectionProperty::getHost(), ConnectionProperty::getUser(), ConnectionProperty::getPassword(), ConnectionProperty::getDatabase());
//    print_r(getDatiFatturaStampa("$id"));
//    $PHPJasperXML->arraysqltable(getDatiFatturaStampa("$id"));
//    $datiFattura = $PHPJasperXML->arraysqltable;
//    $arrayTmp["totaleFattura"] = $fattura->totaleFattura;
//    $datiFattura[] = $arrayTmp;
//    print_r($datiFattura);
//    exit;

    $PHPJasperXML->outpage("D");    //page output method I:standard output  D:Download file
}

function salvaPreventivo() {
    $idDocumento = getRequest("idDocumento");
    $isModifica = false;

    $idIndiceDocumento = getRequest("idIndiceDocumento");
    $idTipoDocumento = getRequest("tipoDocumento");

    $tipoDocumento = DAOFactory::getTipodocumentoDAO()->load($idTipoDocumento);
    $tipo = DAOFactory::getTipoDAO()->load($tipoDocumento->idTipo);

    $numero = getRequest("progressivo");
    $anno = getRequest("anno");
    $data = getRequest("data");
    $idDestinazioneMerce = getRequest("destinazione");




    $imponibileDocumento = getRequest("imponibileDocumento");
    $totaleIva = getRequest("totaleIva");
    $totaleDocumento = getRequest("totaleDocumento");
    $idPagamento = getRequest("idPagamento");
    $totaleDaSaldare = getRequest("totaleDaSaldare");
    $totaleSaldato = getRequest("totaleSaldato");

    $note = getRequest("note");


    if (!isBlankOrNull($idDocumento)) {
        $documento = DAOFactory::getDocumentoDAO()->load($idDocumento);
    } else {
        $documento = new Documento();
    }

    $cliente = null;
    $fornitore = null;
    if (strpos($tipo->nomeTipo, "endit") > 0) {
        $idCliente = getRequest("idCliente");
        if ($isModifica) {
            $cliente = DAOFactory::getClientidocDAO()->load($idCliente);
        } else {
            $cliente = DAOFactory::getClientiDAO()->load($idCliente);
        }
    } else if (strpos($tipo->nomeTipo, "cquisto") > 0) {
        $idFornitore = getRequest("idFornitore");

        if ($isModifica) {
            $fornitore = DAOFactory::getFornitoredocDAO()->load($idFornitore);
        } else {
            $fornitore = DAOFactory::getFornitoreDAO()->load($idFornitore);
        }
    }

    $documento->idIndiceDocumento = $idIndiceDocumento;
    $documento->progressivo = $numero;
    $documento->anno = $anno;
    $documento->data = dateToDb($data);
    $documento->idTipoDocumento = $idTipoDocumento;
    $documento->imponibile = $imponibileDocumento;
    $documento->totaleIva = $totaleIva;
    $documento->totaleDocumento = $totaleDocumento;
    $documento->totaleSaldato = $totaleSaldato;
    $documento->totaleDaSaldare = $totaleDaSaldare;
    $documento->note = $note;
    $documento->isDefinitivo = 0;
    echo "IDCLIENTE" . $idCliente;

    if (strpos($tipo->nomeTipo, "endit") > 0) {
        if (!isBlankOrNull($documento->idClienteDoc)) {
            $clienteDoc = DAOFactory::getClientidocDAO()->load($documento->idClienteDoc);
        } else {
            $clienteDoc = new Clientidoc();
        }
        $clienteDoc->idCliente = $cliente->id;
        $clienteDoc->cap = $cliente->cap;
        $clienteDoc->nome = $cliente->nome;
        $clienteDoc->cognome = $cliente->cognome;
        $clienteDoc->codice = $cliente->codice;
        $clienteDoc->codiceFiscale = $cliente->codiceFiscale;
        $clienteDoc->idCitta = $cliente->idCitta;
        $clienteDoc->indirizzo = $cliente->indirizzo;
        $clienteDoc->piva = $cliente->piva;
        $clienteDoc->ragioneSociale = $cliente->ragioneSociale;
//print_r($clienteDoc); exit;
        if (!isBlankOrNull($documento->idClienteDoc)) {
            DAOFactory::getClientiDAO()->update($clienteDoc);
            $idClienteDoc = $documento->idClienteDoc;
        } else {
            $idClienteDoc = DAOFactory::getClientiDAO()->insert($clienteDoc);
        }
        $documento->idClienteDoc = $idClienteDoc;
    } else if (strpos($tipo->nomeTipo, "cquisto") > 0) {

        $fornitoreDoc = new Fornitoredoc();
        $fornitoreDoc->cap = $fornitore->cap;
        $fornitoreDoc->cellulare = $fornitore->cellulare;
        $fornitoreDoc->codice = $fornitore->codice;
        $fornitoreDoc->email = $fornitore->email;
        $fornitoreDoc->fax = $fornitore->fax;
        $fornitoreDoc->fiscale = $fornitore->fiscale;
        $fornitoreDoc->idCitta = $fornitore->idCitta;
        $fornitoreDoc->indirizzo = $fornitore->indirizzo;
        $fornitoreDoc->piva = $fornitore->piva;
        $fornitoreDoc->ragioneSociale = $fornitore->ragioneSociale;
        $fornitoreDoc->sitoweb = $fornitore->sitoweb;
        $fornitoreDoc->telefono = $fornitore->telefono;
        $fornitoreDoc->idFornitore = $fornitore->id;

        $idFornitoreDoc = DAOFactory::getFornitoredocDAO()->insert($fornitore);
        $documento->idFornitoreDoc = $idFornitoreDoc;
    }
    // print_r(json_encode($documento));
    // print_r($documento); exit;
    if (!isBlankOrNull($idDocumento)) {
        DAOFactory::getDocumentoDAO()->update($documento);
    } else {
        $idDocumento = DAOFactory::getDocumentoDAO()->insert($documento);
    }


////    for ($i = 0; $i < count($acconti); $i++) {
////        $rigaAcconto = $acconti[$i];
////        $acconto = new Accontodocumento();
////        $acconto->idDocumento = $idDocumento;
////        $acconto->importo = $rigaAcconto['importo'];
////        $acconto->data = dateToDb($rigaAcconto['dataPagamento']);
////        DAOFactory::getAccontodocumentoDAO()->insert($acconto);
////    }
//
//
//    // AGGIORNO L'INDICE PER IL DOCUMENTO
//    $indiceObj = DAOFactory::getIndicedocumentoDAO()->load($idIndiceDocumento);
//    $indiceObj->progressivo = $indiceObj->progressivo + 1;
//    DAOFactory::getIndicedocumentoDAO()->update($indiceObj);
//
//    $indiceRiga = 0;
//    for ($r = 0, $rlen = count($_POST['rows']); $r < $rlen; $r++) {
//        if ($_POST['rows'][$r][0] != "null" && $_POST['rows'][$r][0] != "" && $_POST['rows'][$r][0] != null) {
////            $fatturaItem = new Fatturaitem();
//
//            $codiceProdotto = $_POST['rows'][$r][0];
//            $descrizioneProdotto = $_POST['rows'][$r][1];
//            $unitaMisura = $_POST['rows'][$r][2];
//            $qtaProdotto = $_POST['rows'][$r][3];
//            $prezzoUnitario = $_POST['rows'][$r][4];
//            $sconto1 = $_POST['rows'][$r][5];
//            $sconto2 = $_POST['rows'][$r][6];
//            $sconto3 = $_POST['rows'][$r][7];
//            $totaleRiga = $_POST['rows'][$r][8];
//            $ivaProdotto = number_format($_POST['rows'][$r][9], 2, ".", "");
//            $idProdotto = $_POST['rows'][$r][10];
//            $idProdottoDoc = $_POST['rows'][$r][11];
//            $idItem = $_POST['rows'][$r][12];
//
//            $idProdottoDoc = null;
//            $isNuovoProdotto = false;
//            $aliquota = null;
//            if (isBlankOrNull($idProdotto) && isBlankOrNull($idProdottoDoc)) {
////                $isNuovoProdotto = true;
////                $prodotto = new Prodotto();
////                $prodotto->codice = $codiceProdotto;
////                $prodotto->descrizione = $descrizioneProdotto;
////                $prodotto->prezzoVendita = $prezzoUnitario;
////                $prodotto->ricaricoPerc = 100;
////                $prodotto->prezzoAcquisto = $prezzoUnitario / 2;
////                $aliquota = DAOFactory::getAliquotaDAO()->queryByValore($ivaProdotto);
////                $prodotto->ricarico = $prezzoUnitario / 2;
////                $prodotto->idAliquota = $aliquota[0]->id;
////                $prodotto->um = $unitaMisura;
////                $prodotto->qta = 1;
////                $prodotto->utile = $prezzoUnitario - (($prezzoUnitario / 2) * (1 + ($aliquota[0]->valore) / 100));
////                $idProdotto = DAOFactory::getProdottoDAO()->insert($prodotto);
//            }
//
//            if (!isBlankOrNull($idProdottoDoc)) {
////                $prodottoDoc = new Prodottodoc();
////                $prodottoDoc->codice = $codiceProdotto;
////                $prodottoDoc->descrizione = $descrizioneProdotto;
////                $prodottoDoc->prezzoVendita = $prezzoUnitario;
////                $prodottoDoc->ricaricoPerc = 100;
////                $prodottoDoc->prezzoAcquisto = $prezzoUnitario / 2;
////                $prodottoDoc->ricarico = $prezzoUnitario / 2;
//                if (isBlankOrNull($aliquota)) {
//                    $aliquota = DAOFactory::getAliquotaDAO()->queryByValore($ivaProdotto);
//                }
////                $prodottoDoc->idAliquota = $aliquota[0]->id;
////                $prodottoDoc->um = $unitaMisura;
////                $prodottoDoc->qta = 1;
////                $prodottoDoc->utile = $prezzoUnitario - (($prezzoUnitario / 2) * (1 + ($aliquota[0]->valore) / 100));
//                //$idProdottoDoc = DAOFactory::getProdottodocDAO()->insert($prodottoDoc);
//            }
//
//            if (isBlankOrNull($idItem)) {
//                $itemDocumento = new Itemdocumento();
//            } else {
//                $itemDocumento = DAOFactory::getItemdocumentoDAO()->load($idItem);
//            }
//
//            $prodotto = DAOFactory::getProdottoDAO()->load($idProdotto);
//            $prodotto->qta = $prodotto->qta - $qtaProdotto;
//            if (isBlankOrNull($idProdottoDoc)) {
//                $idProdottoDoc = $idProdotto;
//            }
//            $itemDocumento->idProdottoDoc = $idProdottoDoc;
//            $itemDocumento->codice = $codiceProdotto;
//            $itemDocumento->descrizione = $descrizioneProdotto;
//            $itemDocumento->idDocumento = $idDocumento;
//            $itemDocumento->um = $unitaMisura;
//            $itemDocumento->qta = $qtaProdotto;
//            $itemDocumento->prezzoUnitario = $prezzoUnitario;
//            $itemDocumento->sconto1 = $sconto1;
//            $itemDocumento->sconto2 = $sconto2;
//            $itemDocumento->sconto3 = $sconto3;
//            $itemDocumento->totaleRiga = $totaleRiga;
//            $itemDocumento->valoreIva = $ivaProdotto;
//            $itemDocumento->posizione = $indiceRiga;
//
//            $indiceRiga++;
//
//
//            if (isBlankOrNull($idItem)) {
//                $idItem = DAOFactory::getItemdocumentoDAO()->insert($itemDocumento);
//            } else {
//                DAOFactory::getItemdocumentoDAO()->update($itemDocumento);
//            }
//
//
//        }
    //   }
    // print_r(json_encode("OK"));
}
