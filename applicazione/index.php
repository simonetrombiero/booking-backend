<?php

/* Conservo il path del sito */
$absolutePath = str_replace('\\', '/', dirname(__FILE__)) . "/";
$GLOBALS['absolutePath'] = $absolutePath;
/* Protezione hack:
 * viene definita una variabile per consentire di verificare se la chiamata ad una qualsiasi pagina
 * php e passata tramite il controller principale index.php
 */
//define('sito', 1);

/* Tempo inizio processamento */
$time_start = microtime();
$time_end = 0;
ob_start();

/* import di tutti i controller */
//require_once './controller/security.php';
//require_once './controller/settings.php';
//require_once './controller/include_dao.php';
//require_once './controller/utente.php';
//
//require_once './utils/utils.php';
//
//require_once './controller/session.php';

ob_clean();
gestionale_main();

function gestionale_main() {
    global $manutenzione, $manutenzioneForward;
    global $componentLogin, $componentComunicazioni, $componentDocs, $componentGalleria;
    global $sourcedir, $forwardPage;
    global $cpuTime, $time_start;
    global $tipeSite;

    /* Se il sito è in manutenzione inoltrare l'utente alla pagina di manutenzione */
    if (!isAdmin() && $manutenzione) {
        buildTemplateGestionale($manutenzioneForward);
        return;
    }

    $actionTitles = array(
        'home' => array('Home Page', 'Hair Soft'),
    );

//    filter_input(INPUT_REQUEST,'page_title') = 'Comune di Sant\'Agata di Esaro';
    $_REQUEST['page_title'] = 'Hair Soft';
    $_REQUEST['page_description'] = 'Hair Soft';
    if (isset($_REQUEST['action'])) {
        if (isset($actionTitles[$_REQUEST['action']])) {
            if (isset($actionTitles[$_REQUEST['action']][0])) {
                $_REQUEST['page_title'].=$actionTitles[$_REQUEST['action']][0];
            } else {
                $_REQUEST['page_title'].='';
            }
            if (isset($actionTitles[$_REQUEST['action']][1])) {
                $_REQUEST['page_description'] = $actionTitles[$_REQUEST['action']][1];
            } else {
                $_REQUEST['page_description'] = '';
            }
        }
    } else {
        $_REQUEST['page_title'].=" Home Page";
    }

    /* SEZIONE SICUREZZA - inizializzazione action base */
    $adminAction = array();
    $loggedAction = array();
    /* Gestione action controller e template */
    $actionArray = array(
        /* GENERALE - tutte free */
        'home' => array(null, null, 'home.php', null),
//        'login' => array(null, null, "login.php", null),
//        'loginUtente' => array("utente.php", "loginUtente", "home.php", null),
//        'logout' => array('utente.php', 'logout', null, null),
//        'contatti' => array(null, NULL, "contatti.php", null),
    );


    if ($componentLogin) {
        $actionArrayLogin = array(
                /* DOCUMENTI ADMIN */
//            'amministrazione' => array(null, null, 'amministrazione.php', null),
//            'gestionale' => array(null, null, 'index.php', null),
        );
        if (isAdmin()) {
            $actionArray = array_merge($actionArray, $actionArrayLogin);
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
        require_once($sourcedir . '/controller/' . $actionArray[$_REQUEST['action']][0]);
    }
    if (isset($actionArray[$_REQUEST['action']][1])) {
        call_user_func($actionArray[$_REQUEST['action']][1]);
    }
    $time_end = microtime();
    $cpuTime = $time_end - $time_start;
    //return $actionArray[$_REQUEST['action']][1];
    if (isset($forwardPage)) {
        if ($forwardPage == '1') {
            buildTemplateGestionale($actionArray[$_REQUEST['action']][3]);
        }
        if ($forwardPage == '2') {
            buildTemplateGestionale($actionArray[$_REQUEST['action']][4]);
        }
    } else {
        if (isset($actionArray[$_REQUEST['action']][2])) {
            buildTemplateGestionale($actionArray[$_REQUEST['action']][2]);
        }
    }
    ob_flush();
}

function buildTemplateGestionale($center) {
    global $sourcedir;
//    if (getRequest("action") == 'gestionale') {
//    $sourcedir = $sourcedir . "gestionale/";
//    }

//    include($sourcedir . 'htmlHead.php');
//    include($sourcedir . 'header.php');
    include($sourcedir . $center);
//    include($sourcedir . 'footer.php');
}
