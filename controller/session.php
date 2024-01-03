<?php

require_once 'controller/security.php';
antiHack();
global $sessionName;
ini_set('session.name', $sessionName);
session_start();

function isLoggato() {
    if (isset($_SESSION['profilo'])) {
        return true;
    }
    return false;
}

function isAdmin() {
    if (isLoggato()) {
        if ($_SESSION['profilo']->tipo == 'admin') {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function isUtente() {
    if (isLoggato()) {
        if ($_SESSION['profilo']->tipo == 'utente') {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

/* Distrugge la vecchia sessione e ne crea una nuova */

function azzeraSessione() {
    session_unset();
    session_destroy();
    session_start();
    if (isset($_SESSION['profilo'])) {
        unset($_SESSION['profilo']);
    }
}

/* Restituisce una connessione al database */

function getDBConnection() {
    global $db, $db_host, $db_name, $db_user, $db_password;
    $db = mysql_connect($db_host, $db_user, $db_password);
    if ($db == FALSE) {
        die("Connessione al database fallita");
    }
    mysql_select_db($db_name, $db) or die("Connessione al database fallita - errata selezione del db");
    return $db;
}

/* Esegue la query indicata restituendo il link al database tramite il quale leggere
 * gli id generati : $id=mysql_insert_id($link);
 */

function eseguiInsertUpdateDelete($query) {
    global $debug;
    if ($debug) {
        error_log("Query:" . $query);
    }
    $db = getDBConnection();
    $result = mysql_query($query, $db);
    return $db;
}

/* -------------------------------- */
/* -------FUNZIONI CONTATORE------- */
/* -------------------------------- */

/* Prende il valore del contatore indicato con l'id e ne scrive il valore */

function scriviConteggio($idContatore) {
    $db = getDBConnection();
    $query = "SELECT cont FROM contatore WHERE id=" . escapeString($idContatore);
    $result = mysql_query($query, $db);
    $num = mysql_fetch_array($result);
    $contatore = $num['cont'];
    $_SESSION['contatore' . $idContatore] = $contatore;
}

/* -------------------------------- */
/* -------FUNZIONI DI UTILITA'----- */
/* -------------------------------- */
/* Verifica se una stringa è nulla o di dimensione 0 */

function isBlankOrNull($text) {
    if (isset($text) && strlen($text) != 0) {
        return false;
    } else {
        return true;
    }
}

/* Filtra la stringa per evitare sql injection e consentire creazione query con caratteri di escape */

function escapeString($stringa) {
    if (isBlankOrNull($stringa)) {
        return $stringa;
    }
    $db = getDBConnection();
    $risultato = mysql_real_escape_string($stringa);
    return $risultato;
}

/* Consente di leggere una variabile dalla request senza dover verificare se è settata:
 * nel caso di variabile presente ne restituisce il valore applicando prima il trim */

function getRequest($var) {
    if (isset($_REQUEST[$var])) {
        return trim($_REQUEST[$var]);
    } else {
        return null;
    }
}

/* Consente di leggere una variabile dalla request senza dover verificare se è settata:
 * nel caso di variabile presente ne restituisce il valore SENZA applicare il trim */

function getRequestNT($var) {
    if (isset($_REQUEST[$var])) {
        return $_REQUEST[$var];
    } else {
        return null;
    }
}

/* Verifica se la stringa passata è un float valido e contiene quindi solo cifre e . */

function isfloat($f) {
    return ($f == (string) (float) $f);
}

/* Verifica se la stringa passata è un int valido e contiene quindi solo cifre */

function isint($f) {
    return ($f == (string) (int) $f);
}

/* Verifica se il testo è lungo almeno $dim */

function minLength($text, $dim) {
    if (isBlankOrNull($text)) {
        return false;
    }
    if (strlen($text) >= $dim) {
        return true;
    }
    return false;
}

function validazione($valore, $nomeParametro, $arrayRichiesto, $arrayValidazione, $testoErrore) {
    global $validazione, $validazioneVisiva;
    if (isBlankOrNull($valore)) {
        if (inArray($nomeParametro, $arrayRichiesto)) {
            $validazione.=$testoErrore;
            $validazioneVisiva[] = $nomeParametro;
        }
    } else {
        if (isset($arrayValidazione[$nomeParametro])) {
            for ($k = 0; $k < count($arrayValidazione[$nomeParametro]); $k++) {
                if (!call_user_func($arrayValidazione[$nomeParametro][$k], $valore, false)) {
                    $validazione.=$testoErrore;
                    $validazioneVisiva[] = $nomeParametro;
                }
            }
        }
    }
}

function isChecked($valore, $obbligatorio) {
    if ($obbligatorio && isBlankOrNull($valore)) {
        return false;
    }
    if (!isBlankOrNull($valore)) {
        return true;
    } else {
        return false;
    }
}

function inArray($valore, $array) {
    if (!isset($array) || !isset($valore)) {
        return false;
    } else {
        return in_array($valore, $array);
    }
}

function isHome() {
    if (!isset($_REQUEST['action'])) {
        return true;
    }
    if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'home') {
        return true;
    }
    return false;
}

function downloadPdf() {
    $path = $_GET['download'];
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($path));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    ob_clean();
    flush();
    readfile($path);
    exit;
}

function apriDocumento() {
    $idContenuto = getRequest("id");
    $contenuto = caricaContenutoById($idContenuto);

    $nomeFile = $contenuto->url;
    if (file_exists($nomeFile)) {
        header('Content-Description: File Transfer');
        header('Content-Type: ' . $contenuto->type);
        header('Content-Disposition: attachment; filename=' . basename($nomeFile));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        ob_clean();
        flush();
        readfile($nomeFile);
        exit;
    } else {
        ob_clean();
        header("location: index.php?action=" . getRequest("return") . "&error=1");
        exit;
    }
}