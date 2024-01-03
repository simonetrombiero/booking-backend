<?php

//NEL CASO NON HO ACCESSO AL php.ini e voglio visualizzare gli errori
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL | E_STRICT);


/* Conservo il path del sito */
$absolutePath = str_replace('\\', '/', dirname(__FILE__)) . "/";

$GLOBALS['absolutePath'] = $absolutePath;
/* Protezione hack:
 * viene definita una variabile per consentire di verificare se la chiamata ad una qualsiasi pagina
 * php e passata tramite il controller principale index.php
 */
define('sito', 1);

/* Tempo inizio processamento */
$time_start = microtime(true);
$time_end = 0;
ob_start();

/* import di tutti i controller */
require_once './controller/security.php';
require_once './controller/settings.php';

require_once './controller/include_dao.php';
require_once './controller/utente.php';

require_once './utils/utils.php';

require_once './controller/session.php';

ob_clean();
smf_main();

function smf_main() {
    global $manutenzione, $manutenzioneForward;
    global $componentLogin, $componentComunicazioni, $componentDocs, $componentGalleria;
    global $sourcedir, $forwardPage;
    global $cpuTime, $time_start;
    global $tipeSite;

    /* Se il sito è in manutenzione inoltrare l'utente alla pagina di manutenzione */
    if (!isAdmin() && $manutenzione) {
        buildTemplate($manutenzioneForward);
        return;
    }

    $actionTitles = array(
        'home' => array('Home Page', 'Vanity Lab'),
    );

//    filter_input(INPUT_REQUEST,'page_title') = 'Comune di Sant\'Agata di Esaro';
    $_REQUEST['page_title'] = 'Vanity Lab';
    $_REQUEST['page_description'] = 'Vanity Lab';
    if (isset($_REQUEST['action'])) {
        if (isset($actionTitles[$_REQUEST['action']])) {
            if (isset($actionTitles[$_REQUEST['action']][0])) {
                $_REQUEST['page_title'] .= $actionTitles[$_REQUEST['action']][0];
            } else {
                $_REQUEST['page_title'] .= '';
            }
            if (isset($actionTitles[$_REQUEST['action']][1])) {
                $_REQUEST['page_description'] = $actionTitles[$_REQUEST['action']][1];
            } else {
                $_REQUEST['page_description'] = '';
            }
        }
    } else {
        $_REQUEST['page_title'] .= " Home Page";
    }

    /* SEZIONE SICUREZZA - inizializzazione action base */
    $adminAction = array();
    $loggedAction = array();
    /* Gestione action controller e template */
    $actionArray = array(
        /* GENERALE - tutte free */
        'home' => array(null, null, 'login.php', null),
        'loginUtente' => array("utente.php", "loginUtente", "login.php", null),
            /* 'login' => array(null, null, "login.php", null),
              'grazie' => array(null, null, "grazieRegistrazione.php", null),
              'logout' => array('utente.php', 'logout', null, null),
              'contatti' => array(null, NULL, "contatti.php", null),
              'grazieCandidatura'  => array(null, null, "applicazione/amministrazione/grazieCandidatura.php", null) */
    );


    if ($componentLogin) {
        $actionArrayLogin = array(
            /* DOCUMENTI ADMIN */
            'amministrazione' => array(null, null, 'amministrazione.php', null),
            'applicazione' => array("applicazione/controller/home.php", "caricaProssimaPrenotazioni", 'applicazione/home.php', null),
        );

        $actionArrayApplicazione = array(
            /* DOCUMENTI GESTIONALE */
            'caricaInfoComune' => array("applicazione/controller/comuni.php", "caricaInformazioniComune", null, null),
            'errore' => array(null, null, 'applicazione/amministrazione/errore.php', null),
            'annunciList' => array("applicazione/controller/immobiliTMP.php", "caricaListaMyImmobili", 'applicazione/amministrazione/annunciList.php', null),
            'nuovoAnnuncio' => array(null, null, 'applicazione/amministrazione/annuncioImmobilePrivato.php', null),
            'caricaInfoTipologia' => array("applicazione/controller/tipologia.php", "caricaInformazioniTipologie", null, null),
            'caricaInfoAgenzie' => array("applicazione/controller/agenzia.php", "caricaInformazioniAgenzie", null, null),
            'salvaImmobileClientePrivato' => array("applicazione/controller/immobiliTMP.php", "salvaImmobileClientePrivato", "applicazione/amministrazione/annunciList.php", null),
            'cassa' => array(null, null, "applicazione/amministrazione/cassa.php", null),
            //'cassa'  => array("applicazione/controller/prenotazioni.php", "caricaDatiCassa", "applicazione/amministrazione/cassa.php", null),
            'salvaVendita' => array("applicazione/controller/documento.php", "salvaVendita", "applicazione/amministrazione/documentiList.php", null),
            'verificaSospesi' => array("applicazione/controller/cliente.php", "spospesiCliente", null, null),
            'fidelityCliente' => array("applicazione/controller/fidelityCard.php", "caricaFidelityCardClienteCassa", null, null),
            'visualizzaSituazioneCliente' => array("applicazione/controller/documento.php", "getDocumentiCliente", "applicazione/amministrazione/situazioneContabileCliente.php", null),
            'documentiList' => array("applicazione/controller/documento.php", "caricaListaDocumenti", "applicazione/amministrazione/documentiList.php", null),
            'contabilita' => array("applicazione/controller/contabilita.php", "caricaListaContabilita", "applicazione/amministrazione/contabilita.php", null),
            'stampaTermini' => array("applicazione/controller/immobiliTMP.php", "stampaContrattino", null, null),
            'cancellaAccount' => array("applicazione/controller/utente.php", "eliminaUtente", null, null), 'nuovaVisitaImmobile' => array(null, null, "applicazione/amministrazione/nuovaVisita.php", null),
            'salvaVisita' => array("applicazione/controller/immobiliVisite.php", "salvaVisita", "applicazione/amministrazione/immobiliListAgenzia.php"),
            'clientiListAgenzia' => array("applicazione/controller/cliente.php", "caricaListaClientiAgenzia", 'applicazione/amministrazione/clientiList.php', null),
            'clientiList' => array("applicazione/controller/cliente.php", "caricaListaClienti", 'applicazione/amministrazione/clientiList.php', null),
            'nuovoCliente' => array(null, null, 'applicazione/amministrazione/clienteNew.php', null),
            'visualizzaCliente' => array("applicazione/controller/cliente.php", "caricaCliente", 'applicazione/amministrazione/clienteView.php', null),
            'modificaCliente' => array("applicazione/controller/cliente.php", "caricaCliente", 'applicazione/amministrazione/clienteNew.php', null),
            'eliminaCliente' => array("applicazione/controller/cliente.php", "eliminaCliente", 'applicazione/amministrazione/clienteNew.php', null),
            'caricaInfoCliente' => array("applicazione/controller/cliente.php", "caricaInformazioniCliente", null, null),
            'caricaInfoClienteComune' => array("applicazione/controller/cliente.php", "caricaInformazioniClienteComune", null, null),
            'setMessaggioCompleanno' => array("applicazione/controller/cliente.php", "setNotificaCompleanno", null, null),
            'listaFornitori' => array("applicazione/controller/fornitore.php", "caricaListaFornitori", 'applicazione/amministrazione/fornitoriList.php', null),
            'visualizzaAnnuncio' => array("applicazione/controller/immobiliTMP.php", "caricaImmobileTMP", "applicazione/amministrazione/annuncioImmobilePrivatoView.php", null),
            'caricaInfoRegione' => array("comune.php", "caricaInformazioniRegione", null, null),
            'salvaCliente' => array("applicazione/controller/cliente.php", "salvaCliente", "applicazione/amministrazione/clientiList.php", null),
            'agenda' => array(null, null, "applicazione/amministrazione/agenda.php", null),
            'primaNota' => array("applicazione/controller/primaNota.php", "caricaListaPrimaNota", "applicazione/amministrazione/primaNotaList.php", null),
            'nuovaPrimaNota' => array(null, null, "applicazione/amministrazione/primaNotaNew.php", null),
            'salvaPrimaNota' => array("applicazione/controller/primaNota.php", "salvaPrimaNota", "applicazione/amministrazione/primaNotaList.php", null),
            'modificaPrimaNota' => array("applicazione/controller/primaNota.php", "caricaPrimaNota", "applicazione/amministrazione/primaNotaNew.php", null),
            'eliminaPrimaNota' => array("applicazione/controller/primaNota.php", "eliminaPrimaNota", "applicazione/amministrazione/clientiList.php", null),
            'schedaLaserCliente' => array("applicazione/controller/trattamentiLaser.php", "caricaListaTrattamentiCliente", "applicazione/amministrazione/trattamentiLaserCliente.php", null),
            'nuovaSchedaLaser' => array(null, null, "applicazione/amministrazione/schedaLaserNew.php", null),
            'salvaSchedaLaserCliente' => array("applicazione/controller/trattamentiLaser.php", "salvaSchedaLaserCliente", "applicazione/amministrazione/trattamentiLaserCliente.php", null),
            'modificaSchedaLaser' => array("applicazione/controller/trattamentiLaser.php", "caricaSchedaLaser", "applicazione/amministrazione/schedaLaserNew.php", null),
            'eliminaSchedaLaser' => array("applicazione/controller/trattamentiLaser.php", "eliminaSchedaLaser", "applicazione/amministrazione/schedaLaserNew.php", null),
            'visualizzaSchedaLaser' => array("applicazione/controller/trattamentiLaser.php", "caricaSchedaLaser", "applicazione/amministrazione/schedaLaserView.php", null),
            'schedaVisoCorpoCliente' => array("applicazione/controller/trattamentiVisoCorpo.php", "caricaListaVisoCorpoCliente", "applicazione/amministrazione/trattamentiVisoCorpoCliente.php", null),
            'nuovaschedaVisoCorpo' => array(null, null, "applicazione/amministrazione/schedaVisoCorpoNew.php", null),
            'salvaSchedaVisoCorpoCliente' => array("applicazione/controller/trattamentiVisoCorpo.php", "salvaSchedaVisoCorpo", "applicazione/amministrazione/trattamentiVisoCorpoCliente.php", null),
            'modificaschedaVisoCorpo' => array("applicazione/controller/trattamentiVisoCorpo.php", "caricaSchedaVisoCorpo", "applicazione/amministrazione/schedaVisoCorpoNew.php", null),
            'eliminaschedaVisoCorpo' => array("applicazione/controller/trattamentiVisoCorpo.php", "eliminaSchedaVisoCorpo", "applicazione/amministrazione/schedaVisoCorpoNewNew.php", null),
            'visualizzaschedaVisoCorpo' => array("applicazione/controller/trattamentiVisoCorpo.php", "caricaSchedaVisoCorpo", "applicazione/amministrazione/schedaVisoCorpoView.php", null),
            'schedaMofologicaCliente' => array("applicazione/controller/schedaMorfologica.php", "caricaListaTrattamenti", "applicazione/amministrazione/schedaMorfologicaView.php", null),
            'notifiche' => array(null, null, "applicazione/amministrazione/notificheList.php", null),
            'listaPianoTerapeutico' => array("applicazione/controller/pianoTrattamenti.php", "caricaListaTrattamenti", "applicazione/amministrazione/pianoTrattamentiList.php", null),
            'nuovoPianoTerapeutico' => array(null, null, "applicazione/amministrazione/pianoTerapeuticoNew.php", null),
            'salvaPianoTerapeutico' => array("applicazione/controller/pianoTrattamenti.php", "salvaPiano", "applicazione/amministrazione/pianoTrattamentiList.php", null),
            'caricaPianoCuraInCorso' => array("applicazione/controller/pianoTrattamenti.php", "caricaListaPianiInCorso", null, null),
            'visualizzaPiano' => array("applicazione/controller/pianoTrattamenti.php", "caricaPiano", "applicazione/amministrazione/pianoTrattamentoView.php", null),
            'modificaPiano' => array("applicazione/controller/pianoTrattamenti.php", "caricaPiano", "applicazione/amministrazione/pianoTrattamentoEdit.php", null),
            'modificaTrattamentoPiano' => array("applicazione/controller/pianoTrattamentiItem.php", "caricaRigaPiano", "applicazione/amministrazione/trattamentoPianoNew.php", null),
            'salvaRigaTrattamento' => array("applicazione/controller/pianoTrattamentiItem.php", "SalvaRigaPiano", "applicazione/amministrazione/appuntamentoViewtutt.php", null),
            'eliminaTrattamentoPiano' => array("applicazione/controller/pianoTrattamentiItem.php", "eliminaRigaPiano", "applicazione/amministrazione/pianoTrattamentoEdit.php", null),
            'salvaEditPiano' => array("applicazione/controller/pianoTrattamenti.php", "SalvaEditPiano", "applicazione/amministrazione/pianoTrattamentiList.php", null),
            'eliminaPiano' => array("applicazione/controller/pianoTrattamenti.php", "eliminaPianoTerapeutico", "applicazione/amministrazione/prestazioniList.php", null),
            'generaAppuntamenti' => array("applicazione/controller/pianoTrattamenti.php", "generaAppuntamenti", "applicazione/amministrazione/generaAppuntamenti.php", null),
            'salvaAppuntamenti' => array("applicazione/controller/prenotazioni.php", "salvaAppuntamenti", "applicazione/amministrazione/agenda.php", null),
            'setPresenza' => array("applicazione/controller/prenotazioni.php", "setPresenza", "applicazione/amministrazione/appuntamentoView.php", null),
            'setPresenzaM' => array("applicazione/controller/pianoTrattamentiItem.php", "setPresenzaM", null, null),
            'prestazioniPazienti' => array("applicazione/controller/pianoTrattamenti.php", "caricaListaPrestazioni", "applicazione/amministrazione/prestazioniList.php", null),
            //'prestazioniPazienti' => array("applicazione/controller/prenotazioni.php", "caricaListaPrestazioni", "applicazione/amministrazione/prestazioniList.php", null),
            'prestazioniPazientiAll' => array("applicazione/controller/pianoTrattamenti.php", "caricaListaPrestazioniAll", "applicazione/amministrazione/prestazioniListAll.php", null),
            'listaRichiamipz' => array("applicazione/controller/richiami.php", "caricaListaRichiamiPZ", "applicazione/amministrazione/richiamiListPZ.php", null),
            'nuovoRichiamo' => array("applicazione/controller/richiami.php", "nuovoRichiamo", "applicazione/amministrazione/richiamoNew.php", null),
            'salvaRichiamo' => array("applicazione/controller/richiami.php", "salvaRichiamo", "applicazione/amministrazione/richiamiList.php", null),
            'visualizzaRichiamo' => array("applicazione/controller/richiami.php", "caricaRichiamo", "applicazione/amministrazione/richiamoView.php", null),
            'modificaRichiamo' => array("applicazione/controller/richiami.php", "caricaRichiamo", "applicazione/amministrazione/richiamoNew.php", null),
            'listaRichiami' => array("applicazione/controller/richiami.php", "caricaListaRichiami", "applicazione/amministrazione/richiamiList.php", null),
            'nuovoRichiamoG' => array("applicazione/controller/richiami.php", "nuovoRichiamoG", "applicazione/amministrazione/richiamoNewG.php", null),
            'listaDocumentazione' => array("applicazione/controller/documentazione.php", "caricaDocumentiPZ", "applicazione/amministrazione/documentazioneList.php", null),
            'nuovaDocumentazione' => array("applicazione/controller/documentazione.php", "nuovaDocumentazione", "applicazione/amministrazione/documentazioneNew.php", null),
            'salvaDocumentazione' => array("applicazione/controller/documentazione.php", "salvaDocumentazione", "applicazione/amministrazione/documentazioneList.php", null),
            'eliminaDocumentazione' => array("applicazione/controller/documentazione.php", "eliminaDocumentazione", "applicazione/amministrazione/documentazioneList.php", null),
            'visualizzaDocumentazione' => array("applicazione/controller/documentazione.php", "caricaDocumentoPZ", "applicazione/amministrazione/documentazioneView.php", null),
            'modulistica' => array(null, null, "applicazione/amministrazione/modulisticaList.php", null),
            'datiPersonali' => array("applicazione/controller/cliente.php", "caricaCliente", "applicazione/amministrazione/datiPersonali.php", null),
            'modificaPassword' => array(null, null, "applicazione/amministrazione/modificaPassword.php", null),
            'salvaPassword' => array("applicazione/controller/utente.php", "salvaPassword", "applicazione/amministrazione/datiPersonali.php", null),
            'eliminaFoto' => array("applicazione/controller/foto.php", "eliminaFotoImmobile", null, null),
            'caricaPrenotazioni' => array("applicazione/controller/prenotazioni.php", "caricaListaPrenotazioni", null, null),
            'nuovoAppuntamento' => array("applicazione/controller/trattamenti.php", "caricaListaTrattamenti", "applicazione/amministrazione/appuntamentoNew.php", null),
            'salvaAppuntamento' => array("applicazione/controller/prenotazioni.php", "salvaAppuntamento", "applicazione/amministrazione/agenda.php", null),
            'visualizzaAppuntamento' => array("applicazione/controller/prenotazioni.php", "caricaPrenotazione", "applicazione/amministrazione/appuntamentoView.php", null),
            'salvaAppuntamentoM' => array("applicazione/controller/prenotazioni.php", "salvaPrenotazioneM", null, null),
            'salvaClienteM' => array("applicazione/controller/cliente.php", "salvaClienteM", null, null),
            'modificaAppuntamento' => array("applicazione/controller/prenotazioni.php", "caricaPrenotazione", "applicazione/amministrazione/appuntamentoEdit.php", null),
            'eliminaAppuntamento' => array("applicazione/controller/prenotazioni.php", "eliminaPrenotazione", null, null),
            'caricaInfoCalendari' => array("applicazione/controller/calendari.php", "caricaInformazioniCalendari", null, null),
            'infoVerificaAppuntamento' => array("applicazione/controller/prenotazioni.php", "caricaInformazioniAppuntamenti", null, null),
            'setMessaggioAppuntamento' => array("applicazione/controller/prenotazioni.php", "setNotificaAppuntamento", null, null),
            'associaTrattamentoPrenotazione' => array("applicazione/controller/prenotazioni.php", "associaTrattamento", null, null),
            'caricaInfoAppuntamentiM' => array("applicazione/controller/prenotazioni.php", "caricaInformazioniAppuntamentiM", null, null),
            //'stampeAppuntamenti' => array("applicazione/controller/prenotazioni.php", "stampe", "applicazione/amministrazione/appuntamentiPrint.php", null),
            'stampeAppuntamenti' => array(null, null, "applicazione/amministrazione/appuntamentiPrint.php", null),
            'caricaInfoStampeAppuntamenti' => array("applicazione/controller/prenotazioni.php", "caricaInformazioniStampe", null, null),
           // 'stampaFoglioVisitaImmobile'  => array("applicazione/controller/immobili.php", "stampaFoglioVisita", null, null),
            'gestioneContabile' => array(null, null, "applicazione/amministrazione/gestioneContabile.php", null),
            'preventiviList' => array("applicazione/controller/preventivi.php", "caricaListaPreventivi", "applicazione/amministrazione/preventiviList.php", null),
            'nuovoPreventivo' => array(null, null, "applicazione/amministrazione/preventivoNew.php", null),
            'salvaPreventivo' => array("applicazione/controller/preventivi.php", "salvaPreventivo", "applicazione/amministrazione/preventiviList.php", null),
            'visualizzaPreventivo' => array("applicazione/controller/preventivi.php", "caricaPreventivo", "applicazione/amministrazione/preventivoView.php"),
            'nuovoDocumento' => array("applicazione/controller/preventivi.php", "caricaImpostazioniFattura", "applicazione/amministrazione/documenti/documentoNew.php", null),
            'visualizzaDocumento' => array("applicazione/controller/documento.php", "getDocumento", "applicazione/amministrazione/documentoView.php", null),
            'trattamentiAutocomplete' => array('applicazione/controller/trattamenti.php', "caricaTrattamenti", null, null),
            'searchCliente' => array('applicazione/controller/cliente.php', "caricaClienti", null, null),
            'searchClienteFidelity' => array('applicazione/controller/cliente.php', "caricaClientiFidelity", null, null),
            'salvaDocumento' => array("applicazione/controller/documento.php", "salvaDocumento", null, null),
            'salvaPreventivo' => array("applicazione/controller/documento.php", "salvaPreventivo", null, null),
            'caricaInfoTrattamento' => array("applicazione/controller/trattamenti.php", "caricaInformazioniTrattamento", null, null),
            'categorieList' => array("applicazione/controller/categorieTrattamenti.php", "caricaListaCategorie", "applicazione/amministrazione/categorieTrattamentiList.php", null),
            'nuovaCategoriaTrattamenti' => array(null, null, "applicazione/amministrazione/categorieTrattamentiNew.php", null),
            'salvaCategoriaTrattamenti' => array("applicazione/controller/categorieTrattamenti.php", "salvaCategoriaTrattamenti", "applicazione/amministrazione/categorieTrattamentiList.php", null),
            'modificaCategoriaTrattamenti' => array("applicazione/controller/categorieTrattamenti.php", "caricaCategoriaTrattamento", "applicazione/amministrazione/categorieTrattamentiNew.php", null),
            'eliminaCategoriaTattamenti'  => array("applicazione/controller/categorieTrattamenti.php", "eliminaCategoria", "applicazione/amministrazione/categorieTrattamentiList.php", null),
            'caricaInfoCard' => array("applicazione/controller/fidelityCardCliente.php", "caricaInfoCardCliente", null, null),
            'caricaInfoDipendenti' => array("applicazione/controller/dipendenti.php", "caricaInformazioniDipendente", null, null),
            'caricaInfoPostazioni' => array("applicazione/controller/postazioni.php", "caricaInformazioniPostazioni", null, null),
            'anamnesiList' => array("applicazione/controller/anamnesi.php", "caricaListaAnamnesi", "applicazione/amministrazione/anamnesiList.php", null),
            'nuovoQuestionario' => array("applicazione/controller/anamnesi.php", "sceltaQuestionario", "applicazione/amministrazione/questionarioChoice.php", null),
			'nuovoQuestionarioCorpo' => array("applicazione/controller/anamnesi.php", "nuovoAnamnesiCorpo", "applicazione/amministrazione/anamnesiNew.php", null),
            'caricaInfoQuestionario' => array("applicazione/controller/anamnesi.php", "caricaInformazioniQuestionario", null, null),
            'salvaAnamnesi' => array("applicazione/controller/anamnesi.php", "salvaQuestionario", "applicazione/amministrazione/anamnesiList.php", null),
            //'visualizzaAnamnesi' => array("applicazione/controller/anamnesi.php", "visualizzaQuestionario", "applicazione/amministrazione/anamnesi/anamnesiView.php", null),
			'visualizzaAnamnesi' => array("applicazione/controller/anamnesi.php", "visualizzaQuestionario", "applicazione/amministrazione/anamnesiView.php", null),
            'stampaAnamnesi' => array("applicazione/controller/anamnesi.php", "stampaQuestionario", null, null),
			'listaMisurazioneCorpo' => array("applicazione/controller/anamnesticoCorpoHead.php", "listaMisurazioneAmnestico",'applicazione/amministrazione/anamnesi/misurazioniList.php', null), 
			'nuovaMisurazioneCorpo' => array("applicazione/controller/anamnesticoCorpoHead.php", "nuovaMisurazioneAmnestico", 'applicazione/amministrazione/anamnesi/misurazioniNew.php', null),
			'salvaMisurazioneCorpo' => array("applicazione/controller/anamnesticoCorpoHead.php", "salvaMisurazioneAmnestico", 'applicazione/amministrazione/anamnesi/misurazioniNew.php', null),
			'visualizzaMisurazione' => array("applicazione/controller/anamnesticoCorpoHead.php", "caricaMisurazioneAmnestico", 'applicazione/amministrazione/anamnesi/misurazioniView.php', null),
			'modificaMisurazione' => array("applicazione/controller/anamnesticoCorpoHead.php", "caricaMisurazioneAmnestico", 'applicazione/amministrazione/anamnesi/misurazioniEdit.php', null),
			'salvaEditMisurazioneCorpo' => array("applicazione/controller/anamnesticoCorpoHead.php", "salvaEditMisurazioneAmnestico", 'applicazione/amministrazione/anamnesi/misurazioniNew.php', null),
			'confrontaMisurazioni' => array("applicazione/controller/anamnesticoCorpoHead.php", "confrontaMisurazioniAmnestico", 'applicazione/amministrazione/anamnesi/misurazioniConfronta.php', null),
			'eliminaMisurazione' => array("applicazione/controller/anamnesticoCorpoHead.php", "cancellaMisurazioniAmnestico", 'applicazione/amministrazione/anamnesi/clientiList.php', null),
			'nuovoConsensoPrivacy' => array("applicazione/controller/privacy.php", "nuovoConsenso", 'applicazione/amministrazione/privacyNew.php', null),
			'salvaConsensoPrivacy' => array("applicazione/controller/privacy.php", "salvaConsenso", 'applicazione/amministrazione/clientiList.php', null),
			'visualizzaConsensoPrivacy' => array("applicazione/controller/privacy.php", "visualizzaConsenso", 'applicazione/amministrazione/privacyView.php', null),
			
        );

        $actionArrayApplicazioneADM = array(
            /* AZIONI GESTIONALE  Admin e superAdmin */
            'impostazioni' => array(null, null, 'applicazione/amministrazione/impostazioni.php', null),
            'incarichiList' => array("applicazione/controller/incarichi.php", "caricaListaIncarichi", "applicazione/amministrazione/incarichiList.php", null),
            'nuovoIncarico' => array(null, null, 'applicazione/amministrazione/incaricoNew.php', null),
            'salvaIncarico' => array("applicazione/controller/incarichi.php", "salvaIncarico", "applicazione/amministrazione/incarichiList.php", null),
            'modificaIncarico' => array("applicazione/controller/incarichi.php", "caricaIncarico", "applicazione/amministrazione/incaricoNew.php", null),
            'eliminaIncarico' => array("applicazione/controller/incarichi.php", "eliminaIncarico", 'applicazione/amministrazione/incaricoNew.php', null),
            'visualizzaIncarico' => array("applicazione/controller/incarichi.php", "caricaIncarico", 'applicazione/amministrazione/incaricoView.php', null),
            'dipendentiList' => array("applicazione/controller/dipendenti.php", "caricaListaDipendenti", "applicazione/amministrazione/dipendentiList.php", null),
            'nuovoDipendente' => array(null, null, 'applicazione/amministrazione/dipendenteNew.php', null),
            'visualizzaDipendente' => array("applicazione/controller/dipendenti.php", "caricaDipendente", "applicazione/amministrazione/dipendenteView.php", null),
            'modificaDipendente' => array("applicazione/controller/dipendenti.php", "caricaDipendente", "applicazione/amministrazione/dipendenteNew.php", null),
            'eliminaDipendente' => array("applicazione/controller/dipendenti.php", "eliminaDipendente", "applicazione/amministrazione/dipendenteNew.php", null),
            'caricaInfoSede' => array("applicazione/controller/sedi.php", "caricaInformazioniSede", null, null),
            'caricaInfoIncarico' => array("applicazione/controller/incarichi.php", "caricaInformazioniIncarico", null, null),
            'salvaDipendente' => array("applicazione/controller/dipendenti.php", "salvaDipendente", "applicazione/amministrazione/dipendentiList.php", null),
            'sediList' => array("applicazione/controller/sedi.php", "caricaListaSedi", "applicazione/amministrazione/sediList.php", null),
            'nuovaSede' => array(null, null, 'applicazione/amministrazione/sedeNew.php', null),
            'salvaSede' => array("applicazione/controller/sedi.php", "salvaSede", "applicazione/amministrazione/sediList.php", null,),
            'modificaSede' => array("applicazione/controller/sedi.php", "caricaSede", "applicazione/amministrazione/sedeNew.php", null,),
            'eliminaSede' => array("applicazione/controller/sedi.php", "eliminaSede", 'applicazione/amministrazione/sedeNew.php', null),
            'visualizzaSede' => array("applicazione/controller/sedi.php", "caricaSede", 'applicazione/amministrazione/sedeView.php', null),
            'utentiList' => array("applicazione/controller/utenti.php", "caricaListaUtenti", "applicazione/amministrazione/utentiList.php", null),
            'nuovoUtente' => array(null, null, 'applicazione/amministrazione/UtenteNew.php', null),
            'verificaUtente' => array("applicazione/controller/utenti.php", "verificaUtenteDB", null, null),
            'salvaUtente' => array("applicazione/controller/utenti.php", "salvaUtente", "applicazione/amministrazione/utentiList.php", null),
            'visualizzaUtente' => array("applicazione/controller/utenti.php", "caricaUtente", 'applicazione/amministrazione/utenteView.php', null),
            'modificaUtente' => array("applicazione/controller/utenti.php", "caricaUtente", 'applicazione/amministrazione/utenteNew.php', null),
            'eliminaUtente' => array("applicazione/controller/utenti.php", "eliminaUtente", 'applicazione/amministrazione/utenteNew.php', null),
            'nuovaAzienda' => array(null, null, 'applicazione/amministrazione/AziendaNew.php', null),
            'visualizzaAzienda' => array("applicazione/controller/azienda.php", "caricaAzienda", "applicazione/amministrazione/aziendaView.php", null),
            'modificaAzienda' => array("applicazione/controller/azienda.php", "caricaAzienda", 'applicazione/amministrazione/aziendaNew.php', null),
            'salvaAzienda' => array("applicazione/controller/azienda.php", "salvaAzienda", "applicazione/amministrazione/aziendaView.php", null),
            'trattamentiList' => array("applicazione/controller/trattamenti.php", "caricaListaTrattamenti", "applicazione/amministrazione/trattamentiList.php", null),
            'nuovoPagamento' => array("applicazione/controller/pagamenti.php", "nuovoPagamento", "applicazione/amministrazione/schedaMorfologicaView.php", null),
            'caricaPagamentiPiano' => array("applicazione/controller/pagamenti.php", "caricaPagamentiPiano", "applicazione/amministrazione/schedaMorfologicaView.php", null),
            'nuovoTrattamento' => array(null, null, 'applicazione/amministrazione/trattamentoNew.php', null),
            'salvaTrattamento' => array("applicazione/controller/trattamenti.php", "salvaTrattamento", "applicazione/amministrazione/trattamentoNew.php", null),
            'modificaTrattamento' => array("applicazione/controller/trattamenti.php", "caricaTrattamento", "applicazione/amministrazione/trattamentoNew.php", null),
            'eliminaTrattamento' => array("applicazione/controller/trattamenti.php", "eliminaTrattamento", "applicazione/amministrazione/trattamentoNew.php", null),
            'calendariList' => array("applicazione/controller/calendari.php", "caricaListaCalendari", "applicazione/amministrazione/calendariList.php", null),
            'nuovoCalendario' => array(null, null, "applicazione/amministrazione/calendarioNew.php", null),
            'salvaCalendario' => array("applicazione/controller/calendari.php", "salvaCalendario", "applicazione/amministrazione/calendarioNew.php", null),
            'modificaCalendario' => array("applicazione/controller/calendari.php", "caricaCalendario", "applicazione/amministrazione/calendarioNew.php", null),
            'postazioniList' => array("applicazione/controller/postazioni.php", "caricaListaPostazioni", "applicazione/amministrazione/postazioniList.php", null),
            'nuovaPostazione' => array(null, null, "applicazione/amministrazione/postazioneNew.php", null),
            'salvaPostazione' => array("applicazione/controller/postazioni.php", "salvaPostazione", "applicazione/amministrazione/postazioniList", null),
            'modificaPostazione' => array("applicazione/controller/postazioni.php", "caricaPostazione", "applicazione/amministrazione/postazioneNew.php", null),
            'aliquoteList' => array("applicazione/controller/aliquote.php", "caricaListaAliquote", "applicazione/amministrazione/aliquoteList.php", null),
            'nuovaAliquota' => array(null, null, "applicazione/amministrazione/aliquotaNew.php", null),
            'salvaAliquota' => array("applicazione/controller/aliquote.php", "salvaAliquota", "applicazione/amministrazione/aliquotaList", null),
            'modificaAliquota' => array("applicazione/controller/aliquote.php", "caricaAliquota", "applicazione/amministrazione/aliquotaNew.php", null),
            'fidelityCard' => array(null, null, 'applicazione/amministrazione/fidelityCard.php', null),
            'nuovaFidelityCard' => array(null, null, 'applicazione/amministrazione/fidelityCardNew.php', null),
            'generaCard' => array('applicazione/controller/fidelityCard.php', 'generaFidelityCard', 'applicazione/amministrazione/fidelityCardNew.php', null),
            'caricaPuntiFidelityCard' => array(null, null, 'applicazione/amministrazione/fidelityCardCaricaPunti.php', null),
            'fidelityCardCaricaPuntiCliente' => array('applicazione/controller/fidelityCard.php', 'caricaFidelityCardCliente', 'applicazione/amministrazione/fidelityCardCaricaPuntiCliente.php', null),
            'salvaPunti' => array('applicazione/controller/fidelityCardDettaglio.php', 'salvaPuntiCliente', 'applicazione/amministrazione/fidelityCardCaricaPuntiCliente.php', null),
            'dettaglioFidelityCard' => array('applicazione/controller/fidelityCardDettaglio.php', 'caricaMovimentiFidelityCard', 'applicazione/amministrazione/fidelityCardDettaglio.php', null),
            'listaMovimentiFidelityCard' => array('applicazione/controller/fidelityCardDettaglio.php', 'caricaListaMovimentiFidelityCard', 'applicazione/amministrazione/fidelityCardListaMovimenti.php', null),
            'listaFidelityCard' => array('applicazione/controller/fidelityCard.php', 'caricaListaFidelityCard', 'applicazione/amministrazione/fidelityCardList.php', null),
            'catalogoPremiFidelity' => array(null, null, 'applicazione/amministrazione/fidelityCardCatalogo.php', null),
            'settingFidelityCard' => array(null, null, 'applicazione/amministrazione/fidelitySetting.php', null),
        );

        if (isAdmin()) {
            $actionArray = array_merge($actionArray, $actionArrayLogin, $actionArrayApplicazione, $actionArrayApplicazioneADM);
        }
        if (isUtente()) {
            $actionArray = array_merge($actionArray, $actionArrayLogin, $actionArrayApplicazione);
        }
    }

    $loggedActionSito = array();

    $loggedAction = array_merge($loggedAction, $loggedActionSito);

    /* Sezione sicurezza */
    if (isset($_REQUEST['action'])) {
        if (in_array($_REQUEST['action'], $adminAction)) {
            if (!isAdmin()) {
                global $validazione;
                $validazione = "Per effettuare l'operazione richiesta e' necessario effettuare il login ed essere amministratori!!!";
                buildTemplate('login.php');
                return;
            }
        }
        if (in_array($_REQUEST['action'], $loggedAction)) {
            if (!isLoggato()) {
                global $validazione;
                $validazione = "Per effettuare l'operazione richiesta e' necessario effettuare il login!!!";
                buildTemplate('login.php');
                return;
            }
        }
    }
    ob_start();
    // Se nessuna action è specificata o non esiste torna alla home page
//    echo $_REQUEST['action'];
    if (!isset($_REQUEST['action']) || !isset($actionArray[$_REQUEST['action']])) {
        $_REQUEST['action'] = 'home';
    }
    if (isset($actionArray[$_REQUEST['action']][0])) {
        $posGestionale = strpos($actionArray[$_REQUEST['action']][0], "pplicazione");
        if ($posGestionale > 0) {
            require_once($sourcedir . $actionArray[$_REQUEST['action']][0]);
        } else {
            require_once($sourcedir . '/controller/' . $actionArray[$_REQUEST['action']][0]);
        }
    }
    if (isset($actionArray[$_REQUEST['action']][1])) {
        call_user_func($actionArray[$_REQUEST['action']][1]);
    }
    $time_end = microtime(true);
    $cpuTime = $time_end - $time_start;
    //return $actionArray[$_REQUEST['action']][1];
    if (isset($forwardPage)) {
        if ($forwardPage == '1') {
            buildTemplate($actionArray[$_REQUEST['action']][3]);
        }
        if ($forwardPage == '2') {
            buildTemplate($actionArray[$_REQUEST['action']][4]);
        }
    } else {
        if (isset($actionArray[$_REQUEST['action']][2])) {
            buildTemplate($actionArray[$_REQUEST['action']][2]);
        }
    }
    ob_flush();
}

function buildTemplate($center) {
    global $sourcedir;
    $posGestionale = strpos($center, "pplicazione");
    if ($posGestionale > 0) {
//        $sourcedir = $sourcedir . "applicazione/";
        include($sourcedir . '/applicazione/htmlHead.php');
        include($sourcedir . '/applicazione/header.php');
        include($sourcedir . $center);
        include($sourcedir . '/applicazione/footer.php');
    } else {
        include($sourcedir . '/htmlHead.php');
        include($sourcedir . '/header.php');
        include($sourcedir . '/' . $center);
        //include($sourcedir . '/right.php');
        include($sourcedir . 'footer.php');
    }
}
