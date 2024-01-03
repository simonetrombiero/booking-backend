<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//*************Precedente Funzione SALVA PRENOTAZIONE **********
//
//function salvaPrenotazioneOLD() {
//    $id = getRequest("idAppuntamento");
//
//
//    //$cliente = getRequest("clienteAppuntamento");
//    echo $cliente = getRequest("idCliente");
//    exit;
//    if (isBlankOrNull($cliente)) {
//        $cognomeCliente = getRequest("cognomeCliente");
//        $nomeCliente = getRequest("nomeCliente");
//
//        $telefonoCliente = getRequest("telefonoCliente");
//        $emailCliente = getRequest("emailCliente");
//
//        $nuovoCliente = new Clienti();
//
//        $nuovoCliente->cognome = $cognomeCliente;
//        $nuovoCliente->nome = $nomeCliente;
//        $nuovoCliente->cellulare = $telefonoCliente;
//        $nuovoCliente->email = $emailCliente;
//
//        $cliente = DAOFactory::getClientiDAO()->insert($nuovoCliente);
//    }
//    //$trattamento = getRequest("trattamentoAppuntamento");
//    $statusAppuntamento = getRequest("statusAppuntamento");
//    $data = dateToDb(getRequest("dataAppuntamento"));
//    $oraInizio = getRequest("OraInizioAppuntamento");
//    $oraFine = getRequest("OraFineAppuntamento");
//    $postazione = getRequest("postazioneAppuntamento");
//    $operatore = getRequest("operatoreAppuntamento");
//    $note = getRequest("noteAppuntamento");
//
//    $nNuoviTrattamenti = getRequest("nNuoviTrattamenti");
//
////    if (!isBlankOrNull($oraFine)){
////        //echo $oraFine; exit;
////    } else {
////        
////       $tempoTrattamento = DAOFactory::getTrattamentiDAO()->load($trattamento);
////       $oraFine = sommaOre($oraInizio, $tempoTrattamento->tempo);
////    }
//
//
//    $prenotazione = new Prenotazioni();
//
//    //$trattamento->id = $id;
//    $prenotazione->idCliente = $cliente;
//    //$prenotazione->idTrattamento = $trattamento;
//    $prenotazione->data = $data;
//    $prenotazione->oraInizio = $oraInizio;
//    $prenotazione->oraFine = $oraFine;
//    $prenotazione->idCalendario = $postazione;
//    $prenotazione->idOperatore = $operatore;
//    $prenotazione->status = $statusAppuntamento;
//    $prenotazione->isPagato = "0";
//    $prenotazione->note = $note;
//
//
//
//
//
//    //print_r($prenotazione); 
//    //exit;
//    if (!isBlankOrNull($id)) {
//        $prenotazione->id = $id;
//
//
//        DAOFactory::getPrenotazioniDAO()->update($prenotazione);
//
//        $idPrenotazione = $id;
//
//        if ($nNuoviTrattamenti > 0) {
//            $prenotazioneTMP = DAOFactory::getPrenotazioniDAO()->load($idPrenotazione);
//            $oraFine = $prenotazioneTMP->oraFine;
//            $trattamentiArray = array();
//            for ($i = 1; $i <= $nNuoviTrattamenti; $i++) {
//                $idTrattamentoTMP = getRequest("idTrattamento" . $i);
//                $trattamentiArray[] = $idTrattamentoTMP;
//                $tempoTrattamento = DAOFactory::getTrattamentiDAO()->load($idTrattamentoTMP);
//                $oraFine = sommaOre($oraFine, $tempoTrattamento->tempo);
//            }
//            //controllo se nell'intervallo esiste una prenotazione AL MOMENTO IN CASO DI UPDATE NON VIENE VERIFICATO
//            /* $controlloDisponibilita = DAOFactory::getPrenotazioniDAO()->queryPrenotazioneOK($postazione, $data, $oraInizio, $oraFine);
//
//              if (count($controlloDisponibilita) > 0) {
//              ob_clean();
//              header("location: index.php?action=errore&cod=003");
//              exit;
//              } */
//            DAOFactory::getPrenotazioniTrattamentiDAO()->insertAll($idPrenotazione, $trattamentiArray);
//            //AGGIORNO ORA FINE TRATTAMENTO
//
//            $prenotazioneTMP->oraFine = $oraFine;
//
//            DAOFactory::getPrenotazioniDAO()->update($prenotazioneTMP);
//        }
//    } else {
//
//
//
//        if ($nNuoviTrattamenti > 0) {
//            $oraFine = $oraInizio;
//            $trattamentiArray = array();
//            for ($i = 1; $i <= $nNuoviTrattamenti; $i++) {
//                $idTrattamentoTMP = getRequest("idTrattamento" . $i);
//                $trattamentiArray[] = $idTrattamentoTMP;
//                $tempoTrattamento = DAOFactory::getTrattamentiDAO()->load($idTrattamentoTMP);
//                $oraFine = sommaOre($oraFine, $tempoTrattamento->tempo);
//            }
//            //controllo se nell'intervallo esiste una prenotazione
//
//            $controlloDisponibilita = DAOFactory::getPrenotazioniDAO()->queryPrenotazioneOK($postazione, $data, $oraInizio, $oraFine);
//
//            if (count($controlloDisponibilita) > 0) {
//                ob_clean();
//                header("location: index.php?action=errore&cod=003");
//                exit;
//            }
//
//            $idPrenotazione = DAOFactory::getPrenotazioniDAO()->insert($prenotazione);
//
//
//            DAOFactory::getPrenotazioniTrattamentiDAO()->insertAll($idPrenotazione, $trattamentiArray);
//            //AGGIORNO ORA FINE TRATTAMENTO
//            $prenotazioneTMP = DAOFactory::getPrenotazioniDAO()->load($idPrenotazione);
//            $prenotazioneTMP->oraFine = $oraFine;
//
//            DAOFactory::getPrenotazioniDAO()->update($prenotazioneTMP);
//        }
//    }
//
//    ob_clean();
//    header("location: index.php?action=agenda");
//    exit;
//}
////*************FINE Precedente Funzione SALVA PRENOTAZIONE **********

function salvaPrenotazione() {
    echo "quiiiiiii";
    exit;
    $id = getRequest("idAppuntamento");
    $idPiano = getRequest("idPiano");


    $cliente = getRequest("idCliente");

    if (isBlankOrNull($cliente)) {
        $cognomeCliente = getRequest("cognomeCliente");
        $nomeCliente = getRequest("nomeCliente");

        $telefonoCliente = getRequest("telefonoCliente");
        $emailCliente = getRequest("emailCliente");

        $nuovoCliente = new Clienti();

        $nuovoCliente->cognome = $cognomeCliente;
        $nuovoCliente->nome = $nomeCliente;
        $nuovoCliente->cellulare = $telefonoCliente;
        $nuovoCliente->email = $emailCliente;

        $cliente = DAOFactory::getClientiDAO()->insert($nuovoCliente);
    }

    $statusAppuntamento = getRequest("statusAppuntamento");
    $data = date("Y-m-d");
    $note = getRequest("noteAppuntamento");

    if (!isBlankOrNull($idPiano)) {
        //$pianoTrattamento->id = $id;
        $idPianoTrattamento = $idPiano;
    } else {

        $pianoTrattamento = new PianoTrattamento();

        $pianoTrattamento->idPaziente = $cliente;
        $pianoTrattamento->data = $data;
        $pianoTrattamento->note = $note;
        $pianoTrattamento->stato = $statusAppuntamento;




        $idPianoTrattamento = DAOFactory::getPianoTrattamentoDAO()->insert($pianoTrattamento);
    }
    //print_r($_SESSION['arrayTrattamenti']);
    //echo "<br>*****************************";
    //DETTAGLIO TRATTAMENTI
    $nRigheTrattamenti = count($_SESSION['arrayTrattamenti']);

    for ($g = 0; $g < $nRigheTrattamenti; $g++) {
        $trattamentoTMP = $_SESSION['arrayTrattamenti'][$g]['descrizione1'];

        $seduteNtmp = $_SESSION['arrayTrattamenti'][$g]['numero'];
        $idTrattamentoTMP = $_SESSION['arrayTrattamenti'][$g]['idTrattamento'];
        $trattamentoItemTmp = $_SESSION['arrayTrattamenti'][$g]['trattamentoItem'];


        for ($u = 0; $u < $seduteNtmp; $u++) {

            $idOperatore = $trattamentoItemTmp[$u]['idOperatore'];
            $idPostazione = $trattamentoItemTmp[$u]['idPostazione'];
            $dataSeduta = getRequest("data$g$u");
            $oraSeduta = getRequest("oraInizio$g$u");

            $oraSeduta1 = $oraSeduta . ":00";
            $tempoTrattamento = DAOFactory::getTrattamentiDAO()->load($idTrattamentoTMP);

            $oraFine = sommaOre($oraSeduta1, $tempoTrattamento->tempo);

            $pianoTrattamentoDettaglio = new PianoTrattamentoDettaglio();

            $pianoTrattamentoDettaglio->trattamentoID = $idPianoTrattamento;
            $pianoTrattamentoDettaglio->data = dateToDb($dataSeduta);
            $pianoTrattamentoDettaglio->trattamento = $trattamentoTMP;
            $pianoTrattamentoDettaglio->zona = '11';
            //$pianoTrattamentoDettaglio->tempo = $tempoTrattamento->tempo;
            $pianoTrattamentoDettaglio->tempo = "1";
            $pianoTrattamentoDettaglio->oraInizio = $oraSeduta;
            $pianoTrattamentoDettaglio->oreFine = $oraFine;
            $pianoTrattamentoDettaglio->postazione = $idPostazione;
            $pianoTrattamentoDettaglio->operatore = $idOperatore;
            $pianoTrattamentoDettaglio->status = '1';

            //print_r($dettagliTrattamento);

            DAOFactory::getPianoTrattamentoDettaglioDAO()->insert($pianoTrattamentoDettaglio);
        }
    }

    ob_clean();
    header("location: index.php?action=agenda");
    exit;

    /*     * ** DA VERIFICARE **** */
    $nNuoviTrattamenti = getRequest("nNuoviTrattamenti");

//    if (!isBlankOrNull($oraFine)){
//        //echo $oraFine; exit;
//    } else {
//        
//       $tempoTrattamento = DAOFactory::getTrattamentiDAO()->load($trattamento);
//       $oraFine = sommaOre($oraInizio, $tempoTrattamento->tempo);
//    }


    $prenotazione = new Prenotazioni();

    //$trattamento->id = $id;
    $prenotazione->idCliente = $cliente;
    //$prenotazione->idTrattamento = $trattamento;
    $prenotazione->data = $data;
    $prenotazione->oraInizio = $oraInizio;
    $prenotazione->oraFine = $oraFine;
    $prenotazione->idCalendario = $postazione;
    $prenotazione->idOperatore = $operatore;
    $prenotazione->status = $statusAppuntamento;
    $prenotazione->isPagato = "0";
    $prenotazione->note = $note;







    //print_r($prenotazione); 
    //exit;
    if (!isBlankOrNull($id)) {
        $prenotazione->id = $id;


        DAOFactory::getPrenotazioniDAO()->update($prenotazione);

        $idPrenotazione = $id;

        if ($nNuoviTrattamenti > 0) {
            $prenotazioneTMP = DAOFactory::getPrenotazioniDAO()->load($idPrenotazione);
            $oraFine = $prenotazioneTMP->oraFine;
            $trattamentiArray = array();
            for ($i = 1; $i <= $nNuoviTrattamenti; $i++) {
                $idTrattamentoTMP = getRequest("idTrattamento" . $i);
                $trattamentiArray[] = $idTrattamentoTMP;
                $tempoTrattamento = DAOFactory::getTrattamentiDAO()->load($idTrattamentoTMP);
                $oraFine = sommaOre($oraFine, $tempoTrattamento->tempo);
            }
            //controllo se nell'intervallo esiste una prenotazione AL MOMENTO IN CASO DI UPDATE NON VIENE VERIFICATO
            /* $controlloDisponibilita = DAOFactory::getPrenotazioniDAO()->queryPrenotazioneOK($postazione, $data, $oraInizio, $oraFine);

              if (count($controlloDisponibilita) > 0) {
              ob_clean();
              header("location: index.php?action=errore&cod=003");
              exit;
              } */
            DAOFactory::getPrenotazioniTrattamentiDAO()->insertAll($idPrenotazione, $trattamentiArray);
            //AGGIORNO ORA FINE TRATTAMENTO

            $prenotazioneTMP->oraFine = $oraFine;

            DAOFactory::getPrenotazioniDAO()->update($prenotazioneTMP);
        }
    } else {



        if ($nNuoviTrattamenti > 0) {
            $oraFine = $oraInizio;
            $trattamentiArray = array();
            for ($i = 1; $i <= $nNuoviTrattamenti; $i++) {
                $idTrattamentoTMP = getRequest("idTrattamento" . $i);
                $trattamentiArray[] = $idTrattamentoTMP;
                $tempoTrattamento = DAOFactory::getTrattamentiDAO()->load($idTrattamentoTMP);
                $oraFine = sommaOre($oraFine, $tempoTrattamento->tempo);
            }
            //controllo se nell'intervallo esiste una prenotazione

            $controlloDisponibilita = DAOFactory::getPrenotazioniDAO()->queryPrenotazioneOK($postazione, $data, $oraInizio, $oraFine);

            if (count($controlloDisponibilita) > 0) {
                ob_clean();
                header("location: index.php?action=errore&cod=003");
                exit;
            }

            $idPrenotazione = DAOFactory::getPrenotazioniDAO()->insert($prenotazione);


            DAOFactory::getPrenotazioniTrattamentiDAO()->insertAll($idPrenotazione, $trattamentiArray);
            //AGGIORNO ORA FINE TRATTAMENTO
            $prenotazioneTMP = DAOFactory::getPrenotazioniDAO()->load($idPrenotazione);
            $prenotazioneTMP->oraFine = $oraFine;

            DAOFactory::getPrenotazioniDAO()->update($prenotazioneTMP);
        }
    }

    ob_clean();
    header("location: index.php?action=agenda");
    exit;
}

//function salvaPrenotazioneM() {
////    $id = getRequest("idAppuntamento");
////    $idPiano = getRequest("idPiano");
////oraInizioAppuntamento=10%3A00
////operatoreAppuntamento=1
////postazioneAppuntamento=3
////ripetizione=1
////giorniRipetizione=g
////presenzaAppuntamento=option1	
//
//    $msgRisposta = '';
//
//    $titoloAppunamento = getRequest("titoloAppunamento");
//    $cliente = getRequest("idCliente");
//
//    $dataInizio = dateToDb(getRequest("dataAppuntamento"));
//    $oraInizio = getRequest("oraInizioAppuntamento");
//
//    $idOperatore = getRequest("operatoreAppuntamento");
//    $idPostazione = getRequest("postazioneAppuntamento");
//
//    $ripetizione = getRequest("ripetizione");
//    $giorniRipetizione = getRequest("giorniRipetizione");
//    $trattamentiAppuntamenti = getRequest("trattamentiAppuntamento");
//    $trattamentiTMP = DAOFactory::getTrattamentiDAO()->load($trattamentiAppuntamenti);
//    $trattamentoTMP = $trattamentiTMP->trattamento;
//    $nNuoviTrattamenti = getRequest("nNuoviTrattamenti");
//    //$trattamentiAppuntamenti = $_POST["trattamentiAppuntamento"];
////    var_dump($trattamentiAppuntamenti);
////    echo "qui";
////    $trattamentiTMP = implode(', ',$trattamentiAppuntamenti);
//    /*
//      for ($j = 0; $j < count($trattamentiAppuntamenti); $j++) {
//      $id = $trattamentiAppuntamenti[$j];
//      $tratt = DAOFactory::getTrattamentiDAO()->load($id);
//      if ($j == 0) {
//      $trattamentiTMP .= $tratt->trattamento;
//      } else {
//      $trattamentiTMP .= ", " . $tratt->trattamento;
//      }
//      }
//
//     */
//    if (isBlankOrNull($cliente)) {
//
//        header("location: index.php?action=errore");
//        exit;
//    }
//
//    //$statusAppuntamento = getRequest("statusAppuntamento"); 
//    $statusAppuntamento = 2;
//    $data = date("Y-m-d");
//    //$note = getRequest("noteAppuntamento");
//
//
//
//    $pianoTrattamento = new PianoTrattamento();
//
//    $pianoTrattamento->titolo = $titoloAppunamento;
//    $pianoTrattamento->idPaziente = $cliente;
//    $pianoTrattamento->data = $data;
//    //$pianoTrattamento->note = $note;
//    $pianoTrattamento->seduteNumero = $ripetizione;
//    $pianoTrattamento->stato = $statusAppuntamento;
//
//
//    $idPianoTrattamento = DAOFactory::getPianoTrattamentoDAO()->insert($pianoTrattamento);
//
//    $oraInizio1 = $oraInizio . ":00";
//
//    $oraFine = sommaOre($oraInizio1, "01:00:00");
//    $shiftGiorni = 0;
//    for ($h = 0; $h < $ripetizione; $h++) {
//
//        if ($h == 0) {
//            $dataTrattamento = $dataInizio;
//        } else {
//            //$ripetizioneTMP = $ripetizione * $h;
//            $ripetizioneTMP = $h + $shiftGiorni;
//
//            switch ($giorniRipetizione) {
//                case "g":
//                    $dataAppuntamentoTMP = date('Y-m-d', strtotime($dataInizio . '+' . $ripetizioneTMP . ' day'));
//                    $gs = $data = date("w", strtotime($dataAppuntamentoTMP));
//                    if ($gs == 0) {
//                        $dataAppuntamentoTMP = date('Y-m-d', strtotime($dataAppuntamentoTMP . '+1 day'));
//
//                        $shiftGiorni = $shiftGiorni + 1;
//                    }
//
//                    if ($gs == 6) {
//                        $dataAppuntamentoTMP = date('Y-m-d', strtotime($dataAppuntamentoTMP . '+2 day'));
//
//                        $shiftGiorni = $shiftGiorni + 2;
//                    }
//
//                    break;
//                case "s":
//                    $dataAppuntamentoTMP = date('Y-m-d', strtotime($dataInizio . '+' . $ripetizioneTMP . ' week'));
//
//                    $gs = $data = date("w", strtotime($dataAppuntamentoTMP));
//
//                    break;
//                case "m":
//                    $dataAppuntamentoTMP = date('Y-m-d', strtotime($dataInizio . '+' . $ripetizioneTMP . ' months'));
//
//                    $gs = $data = date("w", strtotime($dataAppuntamentoTMP));
//
//                    break;
//                case "a":
//                    $dataAppuntamentoTMP = date('Y-m-d', strtotime($dataInizio . '+' . $ripetizioneTMP . ' year'));
//
//                    $gs = $data = date("w", strtotime($dataAppuntamentoTMP));
//
//                    break;
//            }
//
//            $dataTrattamento = $dataAppuntamentoTMP;
//        }
//
////                $trattamentoItem[] = array(//"data" => $dataAppuntamento, 
////
////                    "data" => $dataTrattamento,
////                    "ora" => $oraInizioAppuntamento,
////                    "idPostazione" => $postazioneAppuntamento,
////                    "postazione" => $nomePostazione,
////                    "idOperatore" => $operatoreAppuntamento,
////                    "operatore" => $nomeOperatore);
//        $pianoTrattamentoDettaglio = new PianoTrattamentoDettaglio();
//
//        $pianoTrattamentoDettaglio->trattamentoID = $idPianoTrattamento;
//        $pianoTrattamentoDettaglio->data = $dataTrattamento;
//        $pianoTrattamentoDettaglio->trattamento = $trattamentoTMP;
//        //$pianoTrattamentoDettaglio->trattamento = $titoloAppunamento;
//        $pianoTrattamentoDettaglio->zona = '11';
//        //$pianoTrattamentoDettaglio->tempo = $tempoTrattamento->tempo;
//        $pianoTrattamentoDettaglio->tempo = "1";
//        $pianoTrattamentoDettaglio->oraInizio = $oraInizio;
//        $pianoTrattamentoDettaglio->oreFine = $oraFine;
//        $pianoTrattamentoDettaglio->postazione = $idPostazione;
//        $pianoTrattamentoDettaglio->operatore = $idOperatore;
//        $pianoTrattamentoDettaglio->status = '1';
//
//        //print_r($dettagliTrattamento);
//        //VERIFICA DISPONIBILITA' OPERATORE
//        $disponibilitaOperatore = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryOperatoreOK($idOperatore, $dataTrattamento, $oraInizio, $oraFine);
//
//        if (count($disponibilitaOperatore) > 0) {
//            //$msgRisposta .=$dataTrattamento.' - Verificare disponibilità Operatore<br>';
//            echo $dataTrattamento . ' - Verificare disponibilità Operatore\n';
//        }
//
//        //VERIFICA DISPONIBILITA' POSTAZIONE
//        $disponibilitaPostazione = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryPrenotazioneOK($idPostazione, $dataTrattamento, $oraInizio, $oraFine);
//
//        if (count($disponibilitaPostazione) > 0) {
//            //$msgRisposta .=$dataTrattamento.' - Verificare disponibilità Postazione<br>';
//            echo $dataTrattamento . ' - Verificare disponibilità Postazione\n';
//        }
//
//
//        DAOFactory::getPianoTrattamentoDettaglioDAO()->insert($pianoTrattamentoDettaglio);
//
//        //dal secondo trattamento in poi;
//
//        for ($jj = 1; $jj <= $nNuoviTrattamenti; $jj++) {
//
//
//            $idTrattInt = getRequest("selTrattamento_" . $jj);
//            $trattamentiTMPint = DAOFactory::getTrattamentiDAO()->load($idTrattInt);
//            $trattamentoTMPint = $trattamentiTMPint->trattamento;
//            $idOperatoreInt = getRequest("selDipendente_" . $jj);
//            $idPostazioneInt = getRequest("selPostazione_" . $jj);
//
//
//
//
//
//
//
//            $pianoTrattamentoDettaglio = new PianoTrattamentoDettaglio();
//
//            $pianoTrattamentoDettaglio->trattamentoID = $idPianoTrattamento;
//            $pianoTrattamentoDettaglio->data = $dataTrattamento;
//            $pianoTrattamentoDettaglio->trattamento = $trattamentoTMPint;
//            //$pianoTrattamentoDettaglio->trattamento = $titoloAppunamento;
//            $pianoTrattamentoDettaglio->zona = '11';
//            //$pianoTrattamentoDettaglio->tempo = $tempoTrattamento->tempo;
//            $pianoTrattamentoDettaglio->tempo = "1";
//            $pianoTrattamentoDettaglio->oraInizio = $oraInizio;
//            $pianoTrattamentoDettaglio->oreFine = $oraFine;
//            $pianoTrattamentoDettaglio->postazione = $idPostazioneInt;
//            $pianoTrattamentoDettaglio->operatore = $idOperatoreInt;
//            $pianoTrattamentoDettaglio->status = '1';
//
//            //print_r($dettagliTrattamento);
//            //VERIFICA DISPONIBILITA' OPERATORE
//            $disponibilitaOperatore = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryOperatoreOK($idOperatoreInt, $dataTrattamento, $oraInizio, $oraFine);
//
//            if (count($disponibilitaOperatore) > 0) {
//
//                //$msgRisposta .=$dataTrattamento.' - Verificare disponibilità Operatore<br>';
//                echo $dataTrattamento . ' - Verificare disponibilità Operatore\n';
//            }
//
//            //VERIFICA DISPONIBILITA' POSTAZIONE
//            $disponibilitaPostazione = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryPrenotazioneOK($idPostazioneInt, $dataTrattamento, $oraInizio, $oraFine);
//
//            if (count($disponibilitaPostazione) > 0) {
//                // $msgRisposta .=$dataTrattamento.' - Verificare disponibilità Postazione';
//                echo $dataTrattamento . ' - Verificare disponibilità Postazione\n';
//            }
//
//            DAOFactory::getPianoTrattamentoDettaglioDAO()->insert($pianoTrattamentoDettaglio);
//        }
//    }
//
//
//
//
//
////    for($g=0;$g<$nRigheTrattamenti;$g++){
////       $trattamentoTMP = $_SESSION['arrayTrattamenti'][$g]['descrizione1'];
////       
////        $seduteNtmp = $_SESSION['arrayTrattamenti'][$g]['numero'];
////        $idTrattamentoTMP = $_SESSION['arrayTrattamenti'][$g]['idTrattamento'];
////        $trattamentoItemTmp = $_SESSION['arrayTrattamenti'][$g]['trattamentoItem'];
////      
////        
////         for ($u = 0; $u < $seduteNtmp; $u++) {
////             
////             $idOperatore = $trattamentoItemTmp[$u]['idOperatore'];
////             $idPostazione = $trattamentoItemTmp[$u]['idPostazione'];
////             $dataSeduta = getRequest("data$g$u");
////             $oraSeduta = getRequest("oraInizio$g$u");
////             
////             $oraSeduta1 =$oraSeduta.":00";
////             $tempoTrattamento = DAOFactory::getTrattamentiDAO()->load($idTrattamentoTMP);
////             
////             $oraFine = sommaOre($oraSeduta1, $tempoTrattamento->tempo);
////             
////             $pianoTrattamentoDettaglio = new PianoTrattamentoDettaglio();
////             
////             $pianoTrattamentoDettaglio->trattamentoID = $idPianoTrattamento;
////             $pianoTrattamentoDettaglio->data = dateToDb($dataSeduta);
////             $pianoTrattamentoDettaglio->trattamento=$trattamentoTMP;
////             $pianoTrattamentoDettaglio->zona ='11';
////             //$pianoTrattamentoDettaglio->tempo = $tempoTrattamento->tempo;
////             $pianoTrattamentoDettaglio->tempo = "1";
////             $pianoTrattamentoDettaglio->oraInizio = $oraSeduta;
////             $pianoTrattamentoDettaglio->oreFine = $oraFine;
////             $pianoTrattamentoDettaglio->postazione = $idPostazione;
////             $pianoTrattamentoDettaglio->operatore = $idOperatore;
////             $pianoTrattamentoDettaglio->status = '1';
////             
////             //print_r($dettagliTrattamento);
////                     
////             DAOFactory::getPianoTrattamentoDettaglioDAO()->insert($pianoTrattamentoDettaglio);
////             
////             
////             
////             
////             
////             
////         }
////        
////       
////        
////    }
////    
////ob_clean();
////    header("location: index.php?action=agenda");
////    exit;
//    // echo 'sono qui';
//    /* if($msgRisposta!=''){
//      echo $msgRisposta;
//      } */
//}

function salvaPrenotazioneM() {
    $totPrenotazioni = -1;
    $numeroSedute = 0;
    $response='';
    $cliente = getRequest("idCliente");
    $dataInizio = dateToDb(getRequest("dataAppuntamento"));
    $oraInizio = getRequest("oraInizioAppuntamento");
    $idPiano = getRequest("idPiano");
    $nNuoviTrattamenti = getRequest("nNuoviTrattamenti");
    
    if (isBlankOrNull($cliente)) {

        //header("location: index.php?action=errore");
        echo 'indica un cliente';
        //exit;
    }
    $oraInizio1 = $oraInizio . ":00";

    $oraFine = sommaOre($oraInizio1, "01:00:00");
    
    $prenotazione = new Prenotazioni();
    $prenotazione->idCliente = $cliente;
    $prenotazione->data = $dataInizio;
    $prenotazione->oraInizio = $oraInizio;
    $prenotazione->oraFine = $oraFine;
    $prenotazione->status = '0';
    $prenotazione->noShow = '0';
    
    if(!isBlankOrNull($idPiano)){
        //VERIFICA SE SUPERA IL NUMERO DELLE SEDUTE
        $pianotmp = DAOFactory::getPianoTrattamentoDAO()->load($idPiano);
        
         $numeroSedute = $pianotmp->seduteNumero;
        
        $prenotazionitmp = DAOFactory::getPrenotazioniDAO()->queryByIdPiano($idPiano);
        //print_r($prenotazionitmp);
        $totPrenotazioni = count($prenotazionitmp);
        
       /* DA SPOSTARE DOPO IL FOR DEI TRATTAMENTI
        * 
        *  if($totPrenotazioni>=$numeroSedute){
            //AGG. COSTO TOTALE DEL PIANO
            
            
            //AGG. NUMERO SEDUTE PIANO
            
            //AGG. ITEM TRATTAMENTO
            
            
            
            
            header("location: index.php?action=errore");
            exit;
            
        }*/
        
        
        $prenotazione->idPiano = $idPiano;
    }
    
    $idPrenotazione = DAOFactory::getPrenotazioniDAO()->insert($prenotazione);
    
    
       
    
    //ARRAY TEMPORANEO DEI TRATTAMENTI SELEZIONATI
    $tmpTrattamentiArray= array();
    
  for ($jj = 0; $jj <= $nNuoviTrattamenti; $jj++) {


            $idTrattInt = getRequest("selTrattamento_" . $jj);
            $trattamentiTMPint = DAOFactory::getTrattamentiDAO()->load($idTrattInt);
            $trattamentoTMPint = $trattamentiTMPint->trattamento;
            $idOperatoreInt = getRequest("selDipendente_" . $jj);
            $idPostazioneInt = getRequest("selPostazione_" . $jj);
            
            $tmpTrattamentiArray[] = $idTrattInt;
            
            $prenotazioneDettaglio = new PrenotazioniDettaglio();
            $prenotazioneDettaglio->prenotazione = $idPrenotazione;
            $prenotazioneDettaglio->idTrattamento = $trattamentiTMPint->id;
            $prenotazioneDettaglio->trattamento = $trattamentoTMPint;
            $prenotazioneDettaglio->idOperatore = $idOperatoreInt;
            $prenotazioneDettaglio->idPostazione = $idPostazioneInt;

            DAOFactory::getPrenotazioniDettaglioDAO()->insert($prenotazioneDettaglio);
            
            


        }
        
         if($totPrenotazioni>=$numeroSedute){
             $totIntegrazione=0;
             
             for($i=0;$i<count($tmpTrattamentiArray);$i++){
                 $idTrattamento = $tmpTrattamentiArray[$i];
                 //if()
                 $presenzaTrattamento=null;
                 $presenzaTrattamento = DAOFactory::getPianoTrattamentoItemDAO()->loadItemPiano($idPiano, $idTrattamento);
                 
                 
                 
                 if($presenzaTrattamento!=null){
                     $presenzaTrattamento->qta = $presenzaTrattamento->qta + 1;
                     $presenzaTrattamento->totaleRiga = $presenzaTrattamento->totaleRiga + $presenzaTrattamento->prezzoUnitario;
                     $totIntegrazione = $totIntegrazione + $presenzaTrattamento->prezzoUnitario;
                     
                     DAOFactory::getPianoTrattamentoItemDAO()->update($presenzaTrattamento);
                     
                     
                 }else{ //ITEM NON PRESENTE NEL PIANO
                     $itemTmp = DAOFactory::getTrattamentiDAO()->load($idTrattamento);
                     
                     $pianoItem = new PianoTrattamentoItem();
                     $pianoItem->idPiano = $idPiano;
                     $pianoItem->idTrattamentoPiano = $itemTmp->id;
                     //$pianoItem->numeroRiga = 
                     $pianoItem->qta = 1;
                     $pianoItem->trattamento = $itemTmp->trattamento;
                     $pianoItem->prezzoUnitario = $itemTmp->costo;
                     $pianoItem->totaleRiga = $itemTmp->costo;
                     $pianoItem->status=1;
                     
                     $totIntegrazione = $totIntegrazione + $itemTmp->costo;
                     
                     
                 }
                 
                 
             }
             
             
             
            //AGG. COSTO TOTALE DEL PIANO
            $pianotmp->totaleTrattamento = $pianotmp->totaleTrattamento + $totIntegrazione;
            
            $pianotmp->totaleDaSaldare = $pianotmp->totaleDaSaldare + $totIntegrazione;
            
            //AGG. NUMERO SEDUTE PIANO
             $pianotmp->seduteNumero = $pianotmp->seduteNumero+1;
            
            
             DAOFactory::getPianoTrattamentoDAO()->update($pianotmp);
            
            
            
            
            //header("location: index.php?action=errore");
            exit;
            
        }
        
        
        
    
    
    
    
    
}


function salvaAppuntamenti() {
    $idPiano = getRequest("idPiano");

    $pianoTrattamento = DAOFactory::getPianoTrattamentoDAO()->load($idPiano);

    $sedute = $pianoTrattamento->seduteNumero;

    $dataAppuntamento = dateToDb(getRequest("dataAppuntamento"));
    $oraAppuntamento = getRequest("oraAppuntamento");


    $giorniRipetizione = getRequest("giorniRipetizione");

    $giornoSelezionato = getRequestNT("giornoSelezionato");

    $trattamentoN = getRequest("trattamentoN");

    //print_r($giornoSelezionato);

    $oraInizio = $oraAppuntamento . ":00";

    $oraFine = sommaOre($oraInizio, "01:00:00");
    $shiftGiorni = 0;

    for ($h = 0; $h < $sedute; $h++) {

        if ($h == 0) {
            $dataTrattamento = $dataAppuntamento;
        } else {
            //$ripetizioneTMP = $ripetizione * $h;
            $ripetizioneTMP = $h + $shiftGiorni;

            switch ($giorniRipetizione) {
                case "g":
                    $dataAppuntamentoTMP = date('Y-m-d', strtotime($dataAppuntamento . '+' . $ripetizioneTMP . ' day'));
                    $gs = $data = date("w", strtotime($dataAppuntamentoTMP));
                    if ($gs == 0) {
                        $dataAppuntamentoTMP = date('Y-m-d', strtotime($dataAppuntamentoTMP . '+1 day'));

                        $shiftGiorni = $shiftGiorni + 1;
                    }

                    if ($gs == 6) {
                        $dataAppuntamentoTMP = date('Y-m-d', strtotime($dataAppuntamentoTMP . '+2 day'));

                        $shiftGiorni = $shiftGiorni + 2;
                    }

                    break;
                case "s":
                    $dataAppuntamentoTMP = date('Y-m-d', strtotime($dataAppuntamento . '+' . $ripetizioneTMP . ' week'));

                    $gs = $data = date("w", strtotime($dataAppuntamentoTMP));

                    break;
                case "m":
                    $dataAppuntamentoTMP = date('Y-m-d', strtotime($dataAppuntamento . '+' . $ripetizioneTMP . ' months'));

                    $gs = $data = date("w", strtotime($dataAppuntamentoTMP));

                    break;
                case "a":
                    $dataAppuntamentoTMP = date('Y-m-d', strtotime($dataAppuntamento . '+' . $ripetizioneTMP . ' year'));

                    $gs = $data = date("w", strtotime($dataAppuntamentoTMP));

                    break;
            }

            $dataTrattamento = $dataAppuntamentoTMP;
        }

//                $trattamentoItem[] = array(//"data" => $dataAppuntamento, 
//
//                    "data" => $dataTrattamento,
//                    "ora" => $oraInizioAppuntamento,
//                    "idPostazione" => $postazioneAppuntamento,
//                    "postazione" => $nomePostazione,
//                    "idOperatore" => $operatoreAppuntamento,
//                    "operatore" => $nomeOperatore);
        /*        $pianoTrattamentoDettaglio = new PianoTrattamentoDettaglio();
          exit;
          $pianoTrattamentoDettaglio->trattamentoID = $idPianoTrattamento;
          $pianoTrattamentoDettaglio->data = $dataTrattamento;
          $pianoTrattamentoDettaglio->trattamento = $trattamentoTMP;
          //$pianoTrattamentoDettaglio->trattamento = $titoloAppunamento;
          $pianoTrattamentoDettaglio->zona = '11';
          //$pianoTrattamentoDettaglio->tempo = $tempoTrattamento->tempo;
          $pianoTrattamentoDettaglio->tempo = "1";
          $pianoTrattamentoDettaglio->oraInizio = $oraInizio;
          $pianoTrattamentoDettaglio->oreFine = $oraFine;
          $pianoTrattamentoDettaglio->postazione = $idPostazione;
          $pianoTrattamentoDettaglio->operatore = $idOperatore;
          $pianoTrattamentoDettaglio->status = '1';

          //print_r($dettagliTrattamento);
         */

        $prenotazioni = new Prenotazioni();

        $prenotazioni->idPiano = $idPiano;
        $prenotazioni->idCliente = $pianoTrattamento->idPaziente;
        $prenotazioni->data = $dataTrattamento;
        $prenotazioni->oraInizio = $oraInizio;
        $prenotazioni->oraFine = $oraFine;
        $prenotazioni->status = '0';
        $prenotazioni->noShow = '0';


        $idPrenotazione = DAOFactory::getPrenotazioniDAO()->insert($prenotazioni);

        for ($y = 0; $y < $trattamentoN; $y++) {
            $trattamentoID = getRequest("trattamentoID" . $y);
            $trattamentoDescrizione = getRequest("trattamentoDescrizione" . $y);
            $operatoreAppuntamento = getRequest("operatoreAppuntamento" . $y);
            $postazioneAppuntamento = getRequest("postazioneAppuntamento" . $y);

            //PRENOTAZIONE DETTAGLIO 
            //`prenotazione`, `idTrattamento`, `trattamento`, `idOperatore`, `idPostazione`

            $prenotazioneDettaglio = new PrenotazioniDettaglio();
            $prenotazioneDettaglio->prenotazione = $idPrenotazione;
            $prenotazioneDettaglio->idTrattamento = $trattamentoID;
            $prenotazioneDettaglio->trattamento = $trattamentoDescrizione;
            $prenotazioneDettaglio->idOperatore = $operatoreAppuntamento;
            $prenotazioneDettaglio->idPostazione = $postazioneAppuntamento;

            DAOFactory::getPrenotazioniDettaglioDAO()->insert($prenotazioneDettaglio);
        }






        //VERIFICA DISPONIBILITA' OPERATORE
        //$disponibilitaOperatore = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryOperatoreOK($idOperatore, $dataTrattamento, $oraInizio, $oraFine);
        /*
          if (count($disponibilitaOperatore) > 0) {
          //$msgRisposta .=$dataTrattamento.' - Verificare disponibilità Operatore<br>';
          echo $dataTrattamento.' - Verificare disponibilità Operatore\n';
          }

          //VERIFICA DISPONIBILITA' POSTAZIONE
          //$disponibilitaPostazione = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryPrenotazioneOK($idPostazione, $dataTrattamento, $oraInizio, $oraFine);

          if (count($disponibilitaPostazione) > 0) {
          //$msgRisposta .=$dataTrattamento.' - Verificare disponibilità Postazione<br>';
          echo $dataTrattamento.' - Verificare disponibilità Postazione\n';
          }


          //DAOFactory::getPianoTrattamentoDettaglioDAO()->insert($pianoTrattamentoDettaglio);

          //dal secondo trattamento in poi;

          for($jj=1; $jj<=$nNuoviTrattamenti;$jj++){


          $idTrattInt = getRequest("selTrattamento_" . $jj);
          $trattamentiTMPint = DAOFactory::getTrattamentiDAO()->load($idTrattInt);
          $trattamentoTMPint = $trattamentiTMPint->trattamento;
          $idOperatoreInt= getRequest("selDipendente_" . $jj);
          $idPostazioneInt = getRequest("selPostazione_" . $jj);




          ////////////////////////////////////

          $test = new PrenotazioniDettaglio();


          $pianoTrattamentoDettaglio = new PianoTrattamentoDettaglio();

          $pianoTrattamentoDettaglio->trattamentoID = $idPianoTrattamento;
          $pianoTrattamentoDettaglio->data = $dataTrattamento;
          $pianoTrattamentoDettaglio->trattamento = $trattamentoTMPint;
          //$pianoTrattamentoDettaglio->trattamento = $titoloAppunamento;
          $pianoTrattamentoDettaglio->zona = '11';
          //$pianoTrattamentoDettaglio->tempo = $tempoTrattamento->tempo;
          $pianoTrattamentoDettaglio->tempo = "1";
          $pianoTrattamentoDettaglio->oraInizio = $oraInizio;
          $pianoTrattamentoDettaglio->oreFine = $oraFine;
          $pianoTrattamentoDettaglio->postazione = $idPostazioneInt;
          $pianoTrattamentoDettaglio->operatore = $idOperatoreInt;
          $pianoTrattamentoDettaglio->status = '1';

          //print_r($dettagliTrattamento);

          //VERIFICA DISPONIBILITA' OPERATORE
          $disponibilitaOperatore = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryOperatoreOK($idOperatoreInt, $dataTrattamento, $oraInizio, $oraFine);

          if (count($disponibilitaOperatore) > 0) {

          //$msgRisposta .=$dataTrattamento.' - Verificare disponibilità Operatore<br>';
          echo $dataTrattamento.' - Verificare disponibilità Operatore\n';
          }

          //VERIFICA DISPONIBILITA' POSTAZIONE
          $disponibilitaPostazione = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryPrenotazioneOK($idPostazioneInt, $dataTrattamento, $oraInizio, $oraFine);

          if (count($disponibilitaPostazione) > 0) {
          // $msgRisposta .=$dataTrattamento.' - Verificare disponibilità Postazione';
          echo $dataTrattamento.' - Verificare disponibilità Postazione\n';
          }

          DAOFactory::getPianoTrattamentoDettaglioDAO()->insert($pianoTrattamentoDettaglio);
          }
         */
    }
    
    $pianoTrattamento->prenotazioni = 1;
    
    DAOFactory::getPianoTrattamentoDAO()->update($pianoTrattamento);


    header("location: index.php?action=agenda");

    exit;
}

//function caricaPrenotazione() {
//    global $appuntamento;
//    $id = getRequest("id");
//    //$appuntamento = DAOFactory::getPrenotazioniDAO()->load($id);
//    $appuntamento = DAOFactory::getPianoTrattamentoDettaglioDAO()->load($id);
//}

function caricaPrenotazione() {
    global $appuntamento, $appuntamentoDettaglio;
    $id = getRequest("id");
    
    $appuntamento = DAOFactory::getPrenotazioniDAO()->load($id);
    
    $appuntamentoDettaglio = DAOFactory::getPrenotazioniDettaglioDAO()->queryByPrenotazione($id);
}

function eliminaPrenotazione() {
    $id = getRequest("id"); 
    //DAOFactory::getPrenotazioniTrattamentiDAO()->deleteByIdPrenotazione($id);
    //DAOFactory::getPrenotazioniDAO()->delete($id);
    DAOFactory::getPrenotazioniDettaglioDAO()->deleteByPrenotazione($id);
    DAOFactory::getPrenotazioniDAO()->delete($id);

    ob_clean();
    header("location: index.php?action=agenda");
    exit;
}

//function caricaListaPrenotazioni() {
//
//    $events = array();
//
//
//    //$eventi = DAOFactory::getPrenotazioniDAO()->queryAllOrderBy("data");
//    $eventi = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryAllOrderBy("data");
//    //print_r($eventi);
//    for ($i = 0; $i < count($eventi); $i++) {
//
//        ////        { id: '3', resourceId: '1', start: '2018-06-27T22:00:00', end: '2018-06-27T25:00:00', title: 'Trattamento XX3' },
//
//        $eventoTmp = $eventi[$i];
//
//        $pianoMaster = DAOFactory::getPianoTrattamentoDAO()->load($eventoTmp->trattamentoID);
//
//
//        $clienteTMP = DAOFactory::getClientiDAO()->load($pianoMaster->idPaziente);
//        $cliente = $clienteTMP->nome . " " . $clienteTMP->cognome;
//
//        //MOMENTANEAMENTE CLIENTE VUOTO
//        // $cliente='';
//        //$trattamentoTMP = DAOFactory::getTrattamentiDAO()->load($eventoTmp->idTrattamento);
//        //$trattamento = $trattamentoTMP->trattamento;
//        // $trattamentiTMP = DAOFactory::getPrenotazioniTrattamentiDAO()->queryByIdPrenotazione($eventoTmp->id);
//        //echo "<pre>";
//        //print_r($trattamentiTMP);
//
//        /* if (!isBlankOrNull($trattamentiTMP[0]->idTrattamento)) {
//          $trattamentoTMP = DAOFactory::getTrattamentiDAO()->load($trattamentiTMP[0]->idTrattamento);
//          $trattamento = $trattamentoTMP->trattamento;
//          } else {
//          $trattamento = '';
//          } */
//
//        $trattamento = $eventoTmp->trattamento;
//
//        //$operatore = DAOFactory::getDipendenteDAO()->load($eventoTmp->idOperatore);
//        $operatore = DAOFactory::getDipendenteDAO()->load($eventoTmp->operatore);
//
//        /* $dipendenteTMP = DAOFactory::getDipendenteDAO()->load($eventoTmp->idDipendente);
//          $dipendente = $dipendenteTMP->nome." ".$dipendenteTMP->cognome; */
//
//
//
//        $e = array();
//        $e['id'] = $eventoTmp->id;
//        //$e['resourceId'] = $eventoTmp->idCalendario;
//        $e['resourceId'] = $eventoTmp->postazione;
//
//        $postazionetmp = DAOFactory::getPostazioniDAO()->load($eventoTmp->postazione);
//        $postazioneTool = $postazionetmp->postazione;
//
//        if (isBlankOrNull($eventoTmp->data)) {
//            $e['start'] = $eventoTmp->data;
//            //  $e['dataEvento']=  dateFromDb($eventoTmp->data);
//            //  $e['oraEvento'] = "-";
//            //  $allday = true;
//        } else {
//            $e['start'] = $eventoTmp->data . "T" . $eventoTmp->oraInizio . "";
//            $oraTrattamento = substr($eventoTmp->oraInizio, 0, 5);
//            // $e['dataEvento']=  dateFromDb($eventoTmp->data);
//            //  $e['oraEvento'] = $eventoTmp->oraInizio;
//            // $allday = false;
//        }
//
//        if (isBlankOrNull($eventoTmp->oreFine)) {
//            $e['end'] = $eventoTmp->data;
//        } else {
//            $e['end'] = $eventoTmp->data . "T" . $eventoTmp->oreFine . "";
//            $oraTrattamento .= " - " . substr($eventoTmp->oreFine, 0, 5);
//        }
////         $persona = DAOFactory::getPersoneDAO()->load($eventoTmp->autore);
////         $autore = $persona->nomeStruttura;
////         $comune = DAOFactory::getComuniDAO()->load($eventoTmp->luogo);
////         $luogo = $comune->comune;
//        //$allday = ($fetch['allDay'] == "true") ? true : false;
//        //$e['allDay'] = $allday;
////         $e['url']='index.php?action=visualizzaEvento&id='.$eventoTmp->id;
////         $e['imgEvento']=$eventoTmp->img;
////         $e['autoreEvento']=$autore;
////         $e['luogoEvento']=$luogo;
//        //$e['className']= 'bgm-green';
//
//        if (isset($operatore)) {
//            $e['backgroundColor'] = '#' . $operatore->backgroundColor;
//        } else {
//            $e['backgroundColor'] = "#333333";
//        }
//
//
//        //$e['title'] = $cliente." ".$trattamento." ".$dipendente;
//        $e['title'] = strtoupper($cliente) . " " . $trattamento . "\n\n(" . $operatore->nome . ")";
//        $e['url'] = 'index.php?action=visualizzaAppuntamento&id=' . $eventoTmp->id;
//        $e['tooltipCliente'] = strtoupper($cliente);
//        $e['tooltipTrattamento'] = $trattamento . "<br>(" . $oraTrattamento . ")";
//        $e['tooltipOperatore'] = $operatore->nome . "<br>(" . $postazioneTool . ")";
//        ;
//        array_push($events, $e);
//    }
//
//    print_r(json_encode($events));
//}

function caricaListaPrenotazioni() {

    $events = array();


    //$eventi = DAOFactory::getPrenotazioniDAO()->queryAllOrderBy("data");
    //$eventi = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryAllOrderBy("data");
    $eventi = DAOFactory::getPrenotazioniDettaglioDAO()->queryAll();
    //print_r($eventi);
    for ($i = 0; $i < count($eventi); $i++) {

        ////        { id: '3', resourceId: '1', start: '2018-06-27T22:00:00', end: '2018-06-27T25:00:00', title: 'Trattamento XX3' },

        $eventoTmp = $eventi[$i];

        //$pianoMaster = DAOFactory::getPianoTrattamentoDAO()->load($eventoTmp->trattamentoID);
        $prenotazioneMaster = DAOFactory::getPrenotazioniDAO()->load($eventoTmp->prenotazione);


        $clienteTMP = DAOFactory::getClientiDAO()->load($prenotazioneMaster->idCliente);
        $cliente = $clienteTMP->nome . " " . $clienteTMP->cognome;

        //MOMENTANEAMENTE CLIENTE VUOTO
        // $cliente='';
        //$trattamentoTMP = DAOFactory::getTrattamentiDAO()->load($eventoTmp->idTrattamento);
        //$trattamento = $trattamentoTMP->trattamento;
        // $trattamentiTMP = DAOFactory::getPrenotazioniTrattamentiDAO()->queryByIdPrenotazione($eventoTmp->id);
        //echo "<pre>";
        //print_r($trattamentiTMP);

        /* if (!isBlankOrNull($trattamentiTMP[0]->idTrattamento)) {
          $trattamentoTMP = DAOFactory::getTrattamentiDAO()->load($trattamentiTMP[0]->idTrattamento);
          $trattamento = $trattamentoTMP->trattamento;
          } else {
          $trattamento = '';
          } */

        $trattamento = $eventoTmp->trattamento;

        //$operatore = DAOFactory::getDipendenteDAO()->load($eventoTmp->idOperatore);
        $operatore = DAOFactory::getDipendenteDAO()->load($eventoTmp->idOperatore);

        /* $dipendenteTMP = DAOFactory::getDipendenteDAO()->load($eventoTmp->idDipendente);
          $dipendente = $dipendenteTMP->nome." ".$dipendenteTMP->cognome; */



        $e = array();
        $e['id'] = $eventoTmp->id;
        //$e['resourceId'] = $eventoTmp->idCalendario;
        $e['resourceId'] = $eventoTmp->idPostazione;

        $postazionetmp = DAOFactory::getPostazioniDAO()->load($eventoTmp->idPostazione);
        $postazioneTool = $postazionetmp->postazione;

        if (isBlankOrNull($prenotazioneMaster->data)) {
            $e['start'] = $prenotazioneMaster->data;
            //  $e['dataEvento']=  dateFromDb($eventoTmp->data);
            //  $e['oraEvento'] = "-";
            //  $allday = true;
        } else {
            $e['start'] = $prenotazioneMaster->data . "T" . $prenotazioneMaster->oraInizio . "";
            $oraTrattamento = substr($prenotazioneMaster->oraInizio, 0, 5);
            // $e['dataEvento']=  dateFromDb($eventoTmp->data);
            //  $e['oraEvento'] = $eventoTmp->oraInizio;
            // $allday = false;
        }

        if (isBlankOrNull($prenotazioneMaster->oraFine)) {
            $e['end'] = $prenotazioneMaster->data;
        } else {
            $e['end'] = $prenotazioneMaster->data . "T" . $prenotazioneMaster->oraFine . "";
            $oraTrattamento .= " - " . substr($prenotazioneMaster->oraFine, 0, 5);
        }
//         $persona = DAOFactory::getPersoneDAO()->load($eventoTmp->autore);
//         $autore = $persona->nomeStruttura;
//         $comune = DAOFactory::getComuniDAO()->load($eventoTmp->luogo);
//         $luogo = $comune->comune;
        //$allday = ($fetch['allDay'] == "true") ? true : false;
        //$e['allDay'] = $allday;
//         $e['url']='index.php?action=visualizzaEvento&id='.$eventoTmp->id;
//         $e['imgEvento']=$eventoTmp->img;
//         $e['autoreEvento']=$autore;
//         $e['luogoEvento']=$luogo;
        //$e['className']= 'bgm-green';

        if (isset($operatore)) {
            $e['backgroundColor'] = '#' . $operatore->backgroundColor;
        } else {
            $e['backgroundColor'] = "#333333";
        }


        //$e['title'] = $cliente." ".$trattamento." ".$dipendente;
        $e['title'] = strtoupper($cliente) . " " . $trattamento . "\n\n(" . $operatore->nome . ")";
        //$e['url'] = 'index.php?action=visualizzaAppuntamento&id=' . $eventoTmp->id;
        $e['url'] = 'index.php?action=visualizzaAppuntamento&id=' . $eventoTmp->prenotazione;
        $e['tooltipCliente'] = strtoupper($cliente);
        $e['tooltipTrattamento'] = $trattamento . "<br>(" . $oraTrattamento . ")";
        $e['tooltipOperatore'] = $operatore->nome . "<br>(" . $postazioneTool . ")";
        ;
        array_push($events, $e);
    }

    print_r(json_encode($events));
}

function caricaListaEventiLuogo() {
    $idCitta = getRequest("idCitta");
    //$arrayTmp = null;
    $events = array();

    //$clienti = DAOFactory::getClientiDAO()->queryAll();
    //$clienti = DAOFactory::getClientiDAO()->queryInfoClienteComuneNazione();
    //$eventi = DAOFactory::getEventiDAO()->queryAll();
    $eventi = DAOFactory::getEventiDAO()->queryEventiLuogo($idCitta);

    for ($i = 0; $i < count($eventi); $i++) {

        $eventoTmp = $eventi[$i];
        $e = array();
        $e['id'] = $eventoTmp->id;
        $e['title'] = $eventoTmp->titolo;
        if (isBlankOrNull($eventoTmp->oraI)) {
            $e['start'] = $eventoTmp->dataI;
            $allday = true;
            $e['dataEvento'] = dateFromDb($eventoTmp->dataI);
            $e['oraEvento'] = "-";
        } else {
            $e['start'] = $eventoTmp->dataI . " " . $eventoTmp->oraI . "";
            $allday = false;
            $e['dataEvento'] = dateFromDb($eventoTmp->dataI);
            $e['oraEvento'] = $eventoTmp->oraI;
        }

        if (isBlankOrNull($eventoTmp->oraF)) {
            $e['end'] = $eventoTmp->dataF;
        } else {
            $e['end'] = $eventoTmp->dataF . " " . $eventoTmp->oraF . "";
        }
        $persona = DAOFactory::getPersoneDAO()->load($eventoTmp->autore);
        $autore = $persona->nomeStruttura;
        $comune = DAOFactory::getComuniDAO()->load($eventoTmp->luogo);
        $luogo = $comune->comune;

        //$allday = ($fetch['allDay'] == "true") ? true : false;
        $e['allDay'] = $allday;
        $e['url'] = '../index.php?action=visualizzaEvento&id=' . $eventoTmp->id;
        $e['imgEvento'] = $eventoTmp->img;
        $e['autoreEvento'] = $autore;
        $e['luogoEvento'] = $luogo;
        $e['className'] = 'bgm-green';
        //"id":"12","titolo":"MASTERCLASS TROMBONE","dataI":"2014-03-22","oraI":"9:00","dataF":"2014-03-23"
        array_push($events, $e);
    }

    print_r(json_encode($events));
}

function caricaInformazioniAppuntamenti() {
    $orari = array("09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00");
    $errore = '';

    $postazioneAppuntamento = getRequest("dato1");

    $operatoreAppuntamento = getRequest("dato2");

    $dataAppuntamento = dateToDb(getRequest("dato3"));
    $oggi = date("Y-m-d");
    if ($dataAppuntamento < $oggi) {
        $errore .= "Verifica la data dell'appuntamento";
    }


    if ($errore == '') {
        // for($i=9; $i<20;$i+=0.25){   echo $i."<br>";}
        $prenotazioniOperatore = DAOFactory::getPrenotazioniDAO()->queryByDataOperatoreOrderByOraInizio($dataAppuntamento, $operatoreAppuntamento);
        $prenotazioniCabina = DAOFactory::getPrenotazioniDAO()->queryByDataCabinaOrderByOraInizio($dataAppuntamento, $postazioneAppuntamento);
        //queryByDataOrderByOraInizio

        $rigaOperatore = array_fill(1, 44, "<td style='background:#090'>&nbsp;</td>");

        $rigaCabina = array_fill(1, 44, "<td style='background:#090'>&nbsp;</td>");

        for ($k = 0; $k < count($prenotazioniOperatore); $k++) {
            $prenotazione = $prenotazioniOperatore[$k];
            $inizio = explode(":", $prenotazione->oraInizio);

            $fine = explode(":", $prenotazione->oraFine);
            (int) $start = 1 + ceil((($inizio[0] * 60 + $inizio[1]) - 540) / 15);
            (int) $end = 1 + ceil((($fine[0] * 60 + $fine[1]) - 540) / 15);

            for ($j = $start; $j <= $end; $j++) {
                $rigaOperatore[$j] = "<td style='background:red'>&nbsp;</td>";
            }
        }

        for ($k = 0; $k < count($prenotazioniCabina); $k++) {
            $cabina = $prenotazioniCabina[$k];
            $inizio = explode(":", $cabina->oraInizio);

            $fine = explode(":", $cabina->oraFine);
            (int) $start = 1 + ceil((($inizio[0] * 60 + $inizio[1]) - 540) / 15);
            (int) $end = 1 + ceil((($fine[0] * 60 + $fine[1]) - 540) / 15);

            for ($j = $start; $j <= $end; $j++) {
                $rigaCabina[$j] = "<td style='background:red'>&nbsp;</td>";
            }
        }



        echo '<table width="100%">
<tr> 
  <td>&nbsp;</td>
  <td colspan="44">&nbsp;</td>
  </tr>';
        echo "<tr> 
    <td>&nbsp;</td>
    <td colspan='4'>09:00</td>
    <td colspan='4'>10:00</td>
    <td colspan='4'>11:00</td>
    <td colspan='4'>12:00</td>
    <td colspan='4'>13:00</td>
    <td colspan='4'>14:00</td>
    <td colspan='4'>15:00</td>
    <td colspan='4'>16:00</td>
    <td colspan='4'>17:00</td>
    <td colspan='4'>18:00</td>
    <td colspan='4'>19:00</td>
    <td colspan='4'>20:00</td>
  </tr>";
        echo '<tr>
  <td>Cabina</td>';
        for ($i = 1; $i <= 44; $i++) {
            echo $rigaCabina[$i];
        }

        echo '</tr>';
        echo '<tr>
  <td>Operatore</td>';
        for ($i = 1; $i <= 44; $i++) {
            echo $rigaOperatore[$i];
        }

        echo '</tr>';
        ;
    } else {
        echo "<p><span style='color:#F00'>" . $errore . "</span></p>";
    }
}

function setPresenza(){
    
    $idAppuntamento = getRequest("idApputnamento");
    $presenza = getRequest("presenzaAppuntamento");
    
    $tmp = DAOFactory::getPrenotazioniDAO()->load($idAppuntamento);
    $tmp->noShow = $presenza;
    
    DAOFactory::getPrenotazioniDAO()->update($tmp);
    
    ob_clean();
    header("location: index.php?action=visualizzaAppuntamento&id=$idAppuntamento");
    exit;
    
}


//function scriviTrattamenti($idTrattamento, $nnumero, $descrizioneTrattamento, $dataAppuntamento, $oraInizioAppuntamento, $ripetizione, $giorniRipetizione, $postazioneAppuntamento, $operatoreAppuntamento){
//($codice_id, $codice, $descrizione, $quantita, $prezzo, $iva, $disp, $peso) {
function scriviTrattamenti($idTrattamento, $descrizioneTrattamento, $descrizioneTrattamento1, $nnumero, $trattamentoItem) {
    $_SESSION['arrayTrattamenti'][] = array("idTrattamento" => $idTrattamento, "descrizione" => $descrizioneTrattamento, "descrizione1" => $descrizioneTrattamento1, "numero" => $nnumero, "trattamentoItem" => $trattamentoItem);
    /*
      if(isset($_SESSION['arrayTrattamenti'])){
      echo 'kkkkk';
      $chiave = count($_SESSION['arrayTrattamenti']);
      $arrayTrattamenti = $_SESSION['arrayTrattamenti'];
      } else {
      $chiave = 0;
      }


      for ($i = 0; $i < $chiave; $i++) {
      //$codex[] = $_SESSION['arrayTrattamenti'][$i][codice];
      //$codex[] = $_SESSION['arrayTrattamenti'][$i][codice_id];
      $codex[] = $_SESSION['arrayTrattamenti'][$i][descrizione];
      }

      //$k = @array_search ($codice, $codex);
      //$k = @array_search ($codice_id, $codex);
      //qui interessa la descrizione e non il codice
      $k = @array_search($descrizioneTrattamento, $codex);
      if ($k === false) {

      //        if ($quantita > $disp) {
      //            Errore("Attenzione: quantita` maggiore della disponibilita`. Puoi ordinare al massimo $disp pezzi");
      //        }

      $arrayTrattamenti[$chiave][idTrattamento] = $idTrattamento;
      $arrayTrattamenti[$chiave][descrizione] = $descrizioneTrattamento;
      $arrayTrattamenti[$chiave][numero] = $nnumero;
      $arrayTrattamenti[$chiave][trattamentoItem] = $trattamentoItem;

      $_SESSION['arrayTrattamenti'] = $arrayTrattamenti;
      } else {
      //        $q_pre = $_SESSION['arrayTrattamenti'][$k][quantita] + $quantita;
      //        if ($q_pre > $disp) {
      //            Errore("Attenzione: quantita` maggiore della disponibilita`. Puoi ordinare al massimo $disp pezzi");
      //        }
      //        $_SESSION['arrayTrattamenti'][$k][quantita] += $quantita;
      } */
}

function associaTrattamento() {
    //SESSIONE Trattamenti già scelti
    //$_SESSION['arrayTrattamenti'][] = $arrayTrattamenti;
    //$a = @array_keys ($_SESSION['arrayTrattamenti']);
    //aggiunta del nuovo trattamento;
    $nnumero = getRequest("dato1");
    if ($nnumero < 1) {
        echo 'ERRORE: numero sedute non valido<br><br>';
        //exit();
    } else {
        $errore = '';

        $idTrattamento = getRequest("dato2");
        if ($idTrattamento < 1) {
            $errore .= "- Nessun trattamento selezionato<br>";
        }

        $dataAppuntamento = getRequest("dato3");
        $dataAppuntamentoEng = dateToDb($dataAppuntamento);
        if ($dataAppuntamentoEng < date("Y-m-d")) {
            $errore .= "- Campo Data<br>";
        }

        $oraInizioAppuntamento = getRequest("dato4");

        $ripetizione = getRequest("dato5");

        $giorniRipetizione = getRequest("dato6");

        $postazioneAppuntamento = getRequest("dato7");
        if ($postazioneAppuntamento < 1) {
            $errore .= "- Postazione <br>";
        }
        $operatoreAppuntamento = getRequest("dato8");
        if ($operatoreAppuntamento < 1) {
            $errore .= "- Operatore <br>";
        }
        if ($errore != '') {
            echo "ATTENZIONE i seguenti campi sono obbigatori e/o contengono errori:<br><br>" . $errore . "<br><br>";
        } else {


            $descrizioneTrattamento = DAOFactory::getTrattamentiDAO()->load($idTrattamento);

            $postazioneTrattamento = DAOFactory::getPostazioniDAO()->load($postazioneAppuntamento);
            $operatoreTrattamento = DAOFactory::getDipendenteDAO()->load($operatoreAppuntamento);
            $nomePostazione = $postazioneTrattamento->postazione;
            $nomeOperatore = $operatoreTrattamento->nome . " " . $operatoreTrattamento->cognome;

            $trattamentoItem = array();

            for ($h = 0; $h < $nnumero; $h++) {

                if ($h == 0) {
                    $dataTrattamento = $dataAppuntamento;
                } else {
                    $ripetizioneTMP = $ripetizione * $h;

                    switch ($giorniRipetizione) {
                        case "g":
                            $dataAppuntamentoTMP = date('Y-m-d', strtotime($dataAppuntamentoEng . '+' . $ripetizioneTMP . ' day'));

                            break;
                        case "s":
                            $dataAppuntamentoTMP = date('Y-m-d', strtotime($dataAppuntamentoEng . '+' . $ripetizioneTMP . ' week'));

                            break;
                        case "m":
                            $dataAppuntamentoTMP = date('Y-m-d', strtotime($dataAppuntamentoEng . '+' . $ripetizioneTMP . ' months'));

                            break;
                        case "a":
                            $dataAppuntamentoTMP = date('Y-m-d', strtotime($dataAppuntamentoEng . '+' . $ripetizioneTMP . ' year'));

                            break;
                    }

                    $dataTrattamento = dateFromDb($dataAppuntamentoTMP);
                }

                $trattamentoItem[] = array(//"data" => $dataAppuntamento, 

                    "data" => $dataTrattamento,
                    "ora" => $oraInizioAppuntamento,
                    "idPostazione" => $postazioneAppuntamento,
                    "postazione" => $nomePostazione,
                    "idOperatore" => $operatoreAppuntamento,
                    "operatore" => $nomeOperatore);
            }
            // print_r($trattamentoItem);

            scriviTrattamenti($idTrattamento, $descrizioneTrattamento, $descrizioneTrattamento->trattamento, $nnumero, $trattamentoItem);
        }
    }



    //scriviTrattamenti($idTrattamento, $nnumero, $descrizioneTrattamento, $dataAppuntamento, $oraInizioAppuntamento, $ripetizione, $giorniRipetizione, $postazioneAppuntamento, $operatoreAppuntamento);
    //print_r($_SESSION['arrayTrattamenti']);
//    $threeDimArray = array(array(
//                        array("reza", "daud", "ome"),
//                        array("shuvam", "himel", "izaz"),
//                        array("sayanta", "hasib", "toaha")));
//    $treee = array();
//    $treee []= array("descrizione"=>"test", "sedute"=>8, "visita"=>array("numero"=>5, "postazione"=>5, "data"=>"20/04/2022"));
//    $treee []= array("visita2"=>array("numero"=>5, "postazione"=>5, "data"=>"20/04/2022"));
//    $treee []= array("visita3"=>array("numero"=>5, "postazione"=>5, "data"=>"20/04/2022"));
    // echo '<pre>';
    //print_r($treee);
    //echo count($treee);
    // $ssss = $treee[0];
    //echo "<pre>";
    //print_r($_SESSION['arrayTrattamenti']);
    echo "<div class='accordion'>";

    if (isset($_SESSION['arrayTrattamenti'])) {
        $hk = count($_SESSION['arrayTrattamenti']);
    } else {
        $hk = 0;
    }
//    for ($jj = 0; $jj<$hk; $jj++) {
//        $f = $jj+1;
//        $trattamentoTMP = $_SESSION['arrayTrattamenti'][$jj]['descrizione'];
//        $seduteNtmp = $_SESSION['arrayTrattamenti'][$jj]['numero'];
//        $trattamentoItemTmp = $_SESSION['arrayTrattamenti'][$jj]['trattamentoItem'];
//        echo "QUIIIII".$trattamentoTMP->trattamento
    ?>

    <!-- accordion section 1 -->
    <!--        <h1 id="accordionhead_1">Trattamento 2</h1>
                <div id="accordioncontent_1" class="accordion-content">
                    Content 111111
                </div>

             accordion section 2 
                <h1 id="accordionhead_2">Trattamento 2</h1>
                <div id="accordioncontent_2" class="accordion-content">
                    Content 2
                </div>

             accordion section 3 
                <h1 id="accordionhead_3">Trattamento 3</h1>
                <div id="accordioncontent_3" class="accordion-content">
                    Content 3
                </div>

             accordion section 4 -->
    <?php
    for ($jj = 0; $jj < $hk; $jj++) {
        $trattamentoTMP = $_SESSION['arrayTrattamenti'][$jj]['descrizione'];
        $seduteNtmp = $_SESSION['arrayTrattamenti'][$jj]['numero'];
        $trattamentoItemTmp = $_SESSION['arrayTrattamenti'][$jj]['trattamentoItem'];
        ?>
        <h1 id="accordionhead_<?php echo $jj; ?>"><?php echo $trattamentoTMP->trattamento; ?>&nbsp;X&nbsp;<?php echo $seduteNtmp; ?><span style="float:right; padding-right: 10px;"><img src="img/icone/delete.png" height="20" id="eliminaPiano" onclick="eliminaPiano()"/></span></h1>
        <div id="accordioncontent_<?php echo $jj; ?>" class="accordion-content">


        <?php
        for ($u = 0; $u < $seduteNtmp; $u++) { //echo $u."<br>"; 
            ?>
                                                <!--                <input type="text">-->

                <div style="display: table-row; height: 25px;" id="rigaTrattamento">

                                                <!--            <div style="display: table-cell; width: 130px;"><input id="trattamento" name="trattamento" value="' + trattamentiTMP11[id] + '" type="text">
                                                <div style="display: table-cell; width: 330px;">' + trattamentiTMP11[id];
                                                </div>-->
                    <div style="display: table-cell; width: 5%;">
                <?php echo $u + 1; ?>
                    </div>
                    <div style="display: table-cell; width: 20%;">
                        <input id="data" name="data<?php echo $jj . $u ?>" placeholder="data appuntamento" type="text" style="width: 35%; min-width: 100px;" value="<?php echo $trattamentoItemTmp[$u]['data']; ?>">
                    </div>
                    <div style="display: table-cell; width: 20%;">
                        <input id="oraInizio" name="oraInizio<?php echo $jj . $u ?>" placeholder="Ora Inizio" type="text" style="width: 35%; min-width: 100px;" value="<?php echo $trattamentoItemTmp[$u]['ora']; ?>">
                    </div>
                    <div style="display: table-cell; width: 25%;">
                        <input id="operatore" name="operatore" placeholder="operatore" type="text" value="<?php echo $trattamentoItemTmp[$u]['operatore']; ?>" readonly>
                    </div>
                    <div style="display: table-cell; width: 25%;">
                        <input id="postazione" name="postazione" placeholder="postazione" type="text" value="<?php echo $trattamentoItemTmp[$u]['postazione']; ?>" readonly>
                        <!--<input id="idTrattamento" name="idTrattamento" value="" type="hidden">-->
                    </div>


                    <div style="display: table-cell;  width: 5%;"><img src="img/icone/delete.png" height="20" id="eliminaTrattamento_" onclick="eliminaTrattamento()"/>
                    </div>
                </div>

                <p><?php caricaInformazioniAppuntamentiINT($trattamentoItemTmp[$u]['idPostazione'], $trattamentoItemTmp[$u]['idOperatore'], dateToDb($trattamentoItemTmp[$u]['data']), $trattamentoItemTmp[$u]['ora']); ?>
                </p>




        <?php } ?>

        </div>
        <?php
    }
    echo "</div>";
    ?>


    <script type="text/javascript">
        $(function () {


            $(".accordion h1").click(function () {
                var id = this.id;   /* getting heading id */

                /* looping through all elements which have class .accordion-content */
                $(".accordion-content").each(function () {

                    if ($("#" + id).next()[0].id != this.id) {
                        $(this).slideUp();
                    }

                });

                $(this).next().toggle();  /* Selecting div after h1 */
            });

        });
    </script>

    <?php
}

function caricaInformazioniAppuntamentiINT($postazioneAppuntamento, $operatoreAppuntamento, $dataAppuntamento, $oraAppuntamento) {
    $orari = array("09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00");
    $errore = '';

//    $postazioneAppuntamento = getRequest("dato1");
//
//    $operatoreAppuntamento = getRequest("dato2");
//
//    $dataAppuntamento = dateToDb(getRequest("dato3"));
    $oggi = date("Y-m-d");
    if ($dataAppuntamento < $oggi) {
        $errore .= "Verifica la data dell'appuntamento";
    }


    if ($errore == '') {
        // for($i=9; $i<20;$i+=0.25){   echo $i."<br>";}
        $prenotazioniOperatore = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryByDataOperatoreOrderByOraInizio($dataAppuntamento, $operatoreAppuntamento);
        $prenotazioniCabina = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryByDataCabinaOrderByOraInizio($dataAppuntamento, $postazioneAppuntamento);
        //queryByDataOrderByOraInizio

        $rigaOperatore = array_fill(1, 44, "<td style='background:#090'>&nbsp;</td>");

        $rigaCabina = array_fill(1, 44, "<td style='background:#090'>&nbsp;</td>");

        $msgOccupato = '';

        for ($kint = 0; $kint < count($prenotazioniOperatore); $kint++) {
            $prenotazione = $prenotazioniOperatore[$kint];
            $inizio = explode(":", $prenotazione->oraInizio);

            $fine = explode(":", $prenotazione->oreFine);

            if (($oraAppuntamento > $prenotazione->oraInizio) && ($oraAppuntamento < $prenotazione->oreFine)) {
                $msgOccupato = "Verifica la disponibilità dell'Operatore ";
            }

            (int) $start = 1 + ceil((($inizio[0] * 60 + $inizio[1]) - 540) / 15);
            (int) $end = 1 + ceil((($fine[0] * 60 + $fine[1]) - 540) / 15);

            for ($j = $start; $j <= $end; $j++) {
                $rigaOperatore[$j] = "<td style='background:red'>&nbsp;</td>";
            }
        }

        for ($kint = 0; $kint < count($prenotazioniCabina); $kint++) {
            $cabina = $prenotazioniCabina[$kint];
            //print_r($cabina); 
            //echo $oraAppuntamento."<br>";
            $inizio = explode(":", $cabina->oraInizio);

            $fine = explode(":", $cabina->oreFine);
            if (($oraAppuntamento > $cabina->oraInizio) && ($oraAppuntamento < $cabina->oreFine)) {
                $msgOccupato .= " Verifica la disponibilità del Box";
            }
            (int) $start = 1 + ceil((($inizio[0] * 60 + $inizio[1]) - 540) / 15);
            (int) $end = 1 + ceil((($fine[0] * 60 + $fine[1]) - 540) / 15);
//echo $start."-QQQQQQQ--".$end."<br>";
            for ($jjj = $start; $jjj <= $end; $jjj++) {
                $rigaCabina[$jjj] = "<td style='background:red'>&nbsp;</td>";
            }
        }


        /*
          echo '<table width="100%">
          <tr>
          <td>&nbsp;</td>
          <td colspan="44">&nbsp;</td>
          </tr>'; */
        echo '<table width="100%">';
        echo "<tr> 
    <td>&nbsp;</td>
    <td colspan='4'>09:00</td>
    <td colspan='4'>10:00</td>
    <td colspan='4'>11:00</td>
    <td colspan='4'>12:00</td>
    <td colspan='4'>13:00</td>
    <td colspan='4'>14:00</td>
    <td colspan='4'>15:00</td>
    <td colspan='4'>16:00</td>
    <td colspan='4'>17:00</td>
    <td colspan='4'>18:00</td>
    <td colspan='4'>19:00</td>
    <td colspan='4'>20:00</td>
  </tr>";
        echo '<tr>
  <td>Cabina</td>';
        for ($iint = 1; $iint <= 44; $iint++) {
            echo $rigaCabina[$iint];
        }

        echo '</tr>';
        echo '<tr>
  <td>Operatore</td>';
        for ($iint = 1; $iint <= 44; $iint++) {
            echo $rigaOperatore[$iint];
        }

        echo '</tr><tr> 
  <td>&nbsp;</td>
  <td colspan="44">';
        if ($msgOccupato != '') {
            echo "<span style='background:red; color: white'>&nbsp;" . $msgOccupato . "&nbsp;</span>";
        }

        echo '</td>
  </tr></table>';
        echo '<hr>';
    } else {
        // echo "<p><span style='color:#F00'>" . $errore . "</span></p>";
    }
}

function caricaInformazioniAppuntamentiM() {
    $id = getRequest("piano");

    $piano = DAOFactory::getPianoTrattamentoDAO()->load($id);

    $paziente = DAOFactory::getClientiDAO()->load($piano->idPaziente);
    echo "Paziente: <b>" . $paziente->nome . ' ' . $paziente->cognome . "</b><br>";
    if (!isBlankOrNull($piano->titolo)) {
        echo 'Piano: <b>' . $piano->titolo . '</b> del: <b>' . dateFromDb($piano->data) . '</b>';
    } else {
        echo 'Piano del: <b>' . dateFromDb($piano->data) . '</b>';
    }
    echo '<hr>';
    //LIMIT QUERY 
    $limit = 5;
    $precedenti = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryLimitPrecedentiOggi($id, $limit);
    for ($h = 0; $h < count($precedenti); $h++) {
        $precedente = $precedenti[$h];
        if ($precedente->noShow == 1) {
            echo "<br>-&nbsp;Appuntamento del <b>" . dateFromDb($precedente->data) . "</b> - presenza <input type='radio' name='presenza$h' value='0'> <b>si</b> <input type='radio' name='presenza$h' value='1' checked=''> <b>no</b> ";
        } else {
            echo "<br>-&nbsp;Appuntamento del <b>" . dateFromDb($precedente->data) . "</b> - presenza <input type='radio' value='0' name='presenza$h' checked=''> <b>si</b> <input type='radio' name='presenza$h' value='1'> <b>no</b> ";
        }
        echo "<input type='hidden' name='idRiga$h' value='$precedente->id'>";


        //print_r($precedente);
    }
    echo "<input type='hidden' name='numRiga' value='$h'>";
}
