<?php

function formattaImporto($import) {
    return number_format($import, 2, ".", "") . " €";
}

function formattaImportoEuropeo($import) {
    //return number_format($import, 2, ",", ".") . " €";
    return number_format($import, 2, ",", ".");
}

function formattaImportoEuro($import) {
    return number_format($import, 2, ",", ".") . " €";
}

function dateToDb($date) {
    return date("Y-m-d", strtotime(str_replace("/", "-", $date)));
}

function dateFromDb($date) {
    if ($date != '0000-00-00') {
        return date("d/m/Y", strtotime(str_replace("-", "/", $date)));
    }
}

//restituisce gli anni
function getAge($birthday) {
    list($year, $month, $day) = explode("-", $birthday);
    $year_diff = date("Y") - $year;
    $month_diff = date("m") - $month;
    //$day_diff   = date("d") - $day;
    //if ($day_diff < 0 || $month_diff < 0) {      
    if ($month_diff < 0) {
        $year_diff--;
    }
    return $year_diff;
}

//restituisce gli anni
function getBirthday($birthday) {
    $datetime1 = new DateTime($birthday);
    $datetime2 = new DateTime(date('Y-m-d'));
    $diff = $datetime1->diff($datetime2);

    return $diff->format('%y');
}

function giornoSettimana($date) {

    //$giorni = array('Domenica','Lunedì','Martedì','Mercoledì','Giovedì','Venerdì','Sabato');
    $giorni = array('Dom', 'Lun', 'Mar', 'Mer', 'Gio', 'Ven', 'Sab');
    if ($date != '0000-00-00') {
        $numeroGiorno = date('w', strtotime($date));
        return $giorni[$numeroGiorno];
    }
}

function diffDate($dataDaControllare, $dataLimite) {
    $data1Explode = explode("-", $dataDaControllare);
    $data2Explode = explode("-", $dataLimite);

    $mktimeData1 = mktime(0, 0, 0, $data1Explode[1], $data1Explode[2], $data1Explode[0]);
    $mktimeData2 = mktime(0, 0, 0, $data2Explode[1], $data2Explode[2], $data2Explode[0]);

    if ($mktimeData1 <= $mktimeData2) {
        return true;
    } else {
        return false;
    }
}

function getSrcImage($mimeType) {
    $mimeExplode = explode("/", $mimeType);
    $type = $mimeExplode[1];

    if ($mimeExplode[1] == 'msword') {
        $type = "doc";
    }

    $arrayMime = getMimeTypeOffice();
    for ($i = 0; $i < count($arrayMime); $i++) {
        if ($arrayMime[$mimeType] != null) {
            $type = $arrayMime[$mimeType];
        }
    }

    return "mime/$type-icon-48x48.png";
}

function getMimeTypeOffice() {
    $arrayMime = array();
    $arrayMime['application/msword'] = 'doc';
    $arrayMime['application/vnd.openxmlformats-officedocument.wordprocessingml.document'] = 'docx';
    $arrayMime['application/vnd.openxmlformats-officedocument.wordprocessingml.template'] = 'dotx';
    $arrayMime['application/vnd.ms-word.document.macroEnabled.12'] = 'docm';
    $arrayMime['application/vnd.ms-excel'] = 'xls';
    $arrayMime['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'] = 'xlsx';
    $arrayMime['application/vnd.openxmlformats-officedocument.spreadsheetml.template'] = 'xltx';
    $arrayMime['application/vnd.ms-excel.sheet.macroEnabled.12'] = 'xlsm';
    $arrayMime['application/vnd.ms-excel.template.macroEnabled.12'] = 'xltm';
    $arrayMime['application/vnd.ms-excel.addin.macroEnabled.12'] = 'xlam';
    $arrayMime['application/vnd.ms-powerpoint'] = 'ppt';
    $arrayMime['application/vnd.openxmlformats-officedocument.presentationml.presentation'] = 'pptx';
    $arrayMime['application/vnd.openxmlformats-officedocument.presentationml.template'] = 'potx';
    $arrayMime['application/vnd.openxmlformats-officedocument.presentationml.slideshow'] = 'ppsx';
    $arrayMime['application/vnd.ms-powerpoint.addin.macroEnabled.12'] = 'ppam';
    $arrayMime['application/vnd.ms-powerpoint.presentation.macroEnabled.12'] = 'pptm';
    $arrayMime['application/vnd.ms-powerpoint.slideshow.macroEnabled.12'] = 'ppsm';

    return $arrayMime;
}

function controllaCodice() {
    include_once 'security/securimage.php';
    $securimage = new Securimage();
    if ($securimage->check($_POST['captcha_code']) == false) {
        // qui va il codice da eseguire se l'utente ha sbagliato
        echo "0";
    } else {
        // qui il codice da eseguire se l'utente ha immesso il codice esatto
        echo "1";
    }
}

function mime_controller($filename) {

    $mime_types = array(
//        'txt' => 'text/plain',
//        'htm' => 'text/html',
//        'html' => 'text/html',
//        'php' => 'text/html',
//        'css' => 'text/css',
//        'js' => 'application/javascript',
//        'json' => 'application/json',
//        'xml' => 'application/xml',
//        'swf' => 'application/x-shockwave-flash',
//        'flv' => 'video/x-flv',
        // images
        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',
            // archives
//        'zip' => 'application/zip',
//        'rar' => 'application/x-rar-compressed',
//        'exe' => 'application/x-msdownload',
//        'msi' => 'application/x-msdownload',
//        'cab' => 'application/vnd.ms-cab-compressed',
//        // audio/video
//        'mp3' => 'audio/mpeg',
//        'qt' => 'video/quicktime',
//        'mov' => 'video/quicktime',
//        // adobe
//        'pdf' => 'application/pdf',
//        'psd' => 'image/vnd.adobe.photoshop',
//        'ai' => 'application/postscript',
//        'eps' => 'application/postscript',
//        'ps' => 'application/postscript',
//        // ms office
//        'doc' => 'application/msword',
//        'rtf' => 'application/rtf',
//        'xls' => 'application/vnd.ms-excel',
//        'ppt' => 'application/vnd.ms-powerpoint',
//        // open office
//        'odt' => 'application/vnd.oasis.opendocument.text',
//        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
    );

    $ext = strtolower(array_pop(explode('.', $filename)));
    if (array_key_exists($ext, $mime_types)) {
        return $mime_types[$ext];
    } elseif (function_exists('finfo_open')) {
        $finfo = finfo_open(FILEINFO_MIME);
        $mimetype = finfo_file($finfo, $filename);
        finfo_close($finfo);
        return $mimetype;
    } else {
//        return 'application/octet-stream';
        return null;
    }
}

//Conversione da Chilogrammi a Litri
function getLtFromKg($kg) {
    $c_conversione = 0.52;
    $lt = $kg * $c_conversione;
    return $lt;
}

//Conversione da Litri a Chilogrammi
function getKgFromLt($lt) {
    $c_conversione = 0.52;
    $kg = $lt * $c_conversione;
    return $kg;
}

//Conversione da litri a Metri Cubi
function getM3FromLt($lt) {
    $c_conversione = 4.166;
    $mc = $lt * $c_conversione;
    return $mc;
}

//Conversione da litri a Metri Cubi
function getLtFromM3($mc) {
    $c_conversione = 4.166;
    $lt = $mc / $c_conversione;
    return $lc;
}

function calcolaImportoLordo($importo, $iva) {
    $lordo = $importo * (1 + ( $iva / 100 ));
    return number_format($lordo, 2, ".", "");
}

class ScorporaCF {

    private $codiceValido = null;
    private $sesso = null;
    private $comuneNascita = null;
    private $ggNascita = null;
    private $mmNascita = null;
    private $aaNascita = null;
    private $errore = null;
    private $TabDecOmocodia = null;
    private $TabSostOmocodia = null;
    private $TabCaratteriPari = null;
    private $TabCaratteriDispari = null;
    private $TabCodiceControllo = null;
    private $TabDecMesi = null;
    private $TabErrori = null;

    public function __construct() {
        // Tabella sostituzioni per omocodia
        $this->TabDecOmocodia = array("A" => "!", "B" => "!", "C" => "!", "D" => "!", "E" => "!", "F" => "!", "G" => "!", "H" => "!", "I" => "!", "J" => "!", "K" => "!", "L" => "0", "M" => "1", "N" => "2", "O" => "!", "P" => "3", "Q" => "4", "R" => "5", "S" => "6", "T" => "7", "U" => "8", "V" => "9", "W" => "!", "X" => "!", "Y" => "!", "Z" => "!",);

        // Posizioni caratteri interessati ad 
        // alterazione di codifica in caso di omocodia
        $this->TabSostOmocodia = array(6, 7, 9, 10, 12, 13, 14);

        // Tabella peso caratteri PARI
        $this->TabCaratteriPari = array("0" => 0, "1" => 1, "2" => 2, "3" => 3, "4" => 4, "5" => 5, "6" => 6, "7" => 7, "8" => 8, "9" => 9, "A" => 0, "B" => 1, "C" => 2, "D" => 3, "E" => 4, "F" => 5, "G" => 6, "H" => 7, "I" => 8, "J" => 9, "K" => 10, "L" => 11, "M" => 12, "N" => 13, "O" => 14, "P" => 15, "Q" => 16, "R" => 17, "S" => 18, "T" => 19, "U" => 20, "V" => 21, "W" => 22, "X" => 23, "Y" => 24, "Z" => 25);

        // Tabella peso caratteri DISPARI
        $this->TabCaratteriDispari = array("0" => 1, "1" => 0, "2" => 5, "3" => 7, "4" => 9, "5" => 13, "6" => 15, "7" => 17, "8" => 19, "9" => 21, "A" => 1, "B" => 0, "C" => 5, "D" => 7, "E" => 9, "F" => 13, "G" => 15, "H" => 17, "I" => 19, "J" => 21, "K" => 2, "L" => 4, "M" => 18, "N" => 20, "O" => 11, "P" => 3, "Q" => 6, "R" => 8, "S" => 12, "T" => 14, "U" => 16, "V" => 10, "W" => 22, "X" => 25, "Y" => 24, "Z" => 23);

        // Tabella calcolo codice CONTOLLO (carattere 16)
        $this->TabCodiceControllo = array(0 => "A", 1 => "B", 2 => "C", 3 => "D", 4 => "E", 5 => "F", 6 => "G", 7 => "H", 8 => "I", 9 => "J", 10 => "K", 11 => "L", 12 => "M", 13 => "N", 14 => "O", 15 => "P", 16 => "Q", 17 => "R", 18 => "S", 19 => "T", 20 => "U", 21 => "V", 22 => "W", 23 => "X", 24 => "Y", 25 => "Z");

        // Array per il calcolo del mese
        $this->TabDecMesi = array("A" => "01", "B" => "02", "C" => "03", "D" => "04", "E" => "05", "H" => "06", "L" => "07", "M" => "08", "P" => "09", "R" => "10", "S" => "11", "T" => "12");

        // Tabella messaggi di errore
        $this->TabErrori = array(0 => "Codice da analizzare assente", 1 => "Lunghezza codice da analizzare non corretta", 2 => "Il codice da analizzare contiene caratteri non corretti", 3 => "Carattere non valido in decodifica omocodia", 4 => "Codice fiscale non corretto");
    }

    public function SetCF($cf) {
        // Azzero le property
        $this->codiceValido = null;
        $this->sesso = null;
        $this->comuneNascita = null;
        $this->ggNascita = null;
        $this->mmNascita = null;
        $this->aaNascita = null;
        $this->errore = null;

        // Verifica esistenza codice passato
        if ($cf === "") {
            $this->codiceValido = false;
            $this->errore = $this->TabErrori[0];
            return false;
        }

        // Verifica lunghezza codice passato: 
        // 16 caratteri per CF standard 
        // (non gestisco i CF provvisori da 11 caratteri...)
        if (strlen($cf) !== 16) {
            $this->codiceValido = false;
            $this->errore = $this->TabErrori[1];
            return false;
        }

        // Converto in maiuscolo
        $cf = strtoupper($cf);

        // Verifica presenza di caratteri non validi
        if (!preg_match("/^[A-Z0-9]+$/", $cf)) {
            $this->codiceValido = false;
            $this->errore = $this->TabErrori[2];
            return false;
        }

        // Converto la stringa in array
        $cfArray = str_split($cf);

        // Verifica correttezza alterazioni per omocodia
        // (al posto dei numeri sono accettabili solo le
        // lettere da "L" a "V", "O" esclusa, che
        // sostituiscono i numeri da 0 a 9)
        for ($i = 0; $i < count($this->TabSostOmocodia); $i++)
            if (!is_numeric($cfArray[$this->TabSostOmocodia[$i]]))
                if ($this->TabDecOmocodia[$cfArray[$this->TabSostOmocodia[$i]]] === "!") {
                    $this->codiceValido = false;
                    $this->errore = $this->TabErrori[3];
                    return false;
                }

        // Tutti i controlli formali sono superati.
        // Inizio la fase di verifica vera e propria del CF
        $pari = 0;
        $dispari = $this->TabCaratteriDispari[$cfArray[14]];  // Calcolo subito l'ultima cifra dispari (pos. 15) per comodita'...
        // Loop sui primi 14 elementi
        // a passo di due caratteri alla volta
        for ($i = 0; $i < 13; $i += 2) {
            $dispari = $dispari + $this->TabCaratteriDispari[$cfArray[$i]];
            $pari = $pari + $this->TabCaratteriPari[$cfArray[$i + 1]];
        }

        // Verifica congruenza dei valori calcolati
        // sui primi 15 caratteri con il codice di
        // controllo (carattere 16)
        if (!($this->TabCodiceControllo[($pari + $dispari) % 26] === $cfArray[15])) {
            $this->codiceValido = false;
            $this->errore = $this->TabErrori[4];
            return false;
        } else {
            // Opero la sostituzione se necessario
            // utilizzando la tabella $this->TabDecOmocodia
            // (per risolvere eventuali omocodie)
            for ($i = 0; $i < count($this->TabSostOmocodia); $i++)
                if (!is_numeric($cfArray[$this->TabSostOmocodia[$i]]))
                    $cfArray[$this->TabSostOmocodia[$i]] = $this->TabDecOmocodia[$cfArray[$this->TabSostOmocodia[$i]]];

            // Converto l'array di nuovo in stringa
            $CodiceFiscaleAdattato = implode($cfArray);

            // Comunico che il codice è valido...
            $this->codiceValido = true;
            $this->errore = "";

            // ...ed estraggo i dati dal codice verificato
            $this->sesso = (substr($CodiceFiscaleAdattato, 9, 2) > "40" ? "F" : "M");
            $this->comuneNascita = substr($CodiceFiscaleAdattato, 11, 4);
            $this->aaNascita = substr($CodiceFiscaleAdattato, 6, 2);
            $this->mmNascita = $this->TabDecMesi[substr($CodiceFiscaleAdattato, 8, 1)];

            // 2014-01-13 Modifica per corretto recupero giorno di nascita se sesso=F
            $this->ggNascita = substr($CodiceFiscaleAdattato, 9, 2);
            if ($this->sesso === "F") {
                $this->ggNascita = $this->ggNascita - 40;
                if (strlen($this->ggNascita) === 1)
                    $this->ggNascita = "0" . $this->ggNascita;
            }
        }
    }

    public function GetCodiceValido() {
        return $this->codiceValido;
    }

    public function GetErrore() {
        return $this->errore;
    }

    public function GetSesso() {
        return $this->sesso;
    }

    public function GetComuneNascita() {
        return $this->comuneNascita;
    }

    public function GetAANascita() {
        return $this->aaNascita;
    }

    public function GetMMNascita() {
        return $this->mmNascita;
    }

    public function GetGGNascita() {
        return $this->ggNascita;
    }

}

class CalcolaCF {

    const ERR_GENERIC = 'Errore di calcolo del codice fiscale.';

    /**
     * Array delle consonanti
     */
    protected $_consonanti = array(
        'B', 'C', 'D', 'F', 'G', 'H', 'J', 'K',
        'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T',
        'V', 'W', 'X', 'Y', 'Z'
    );

    /**
     * Array delle vocali
     */
    protected $_vocali = array(
        'A', 'E', 'I', 'O', 'U'
    );

    /**
     * Array per il calcolo della lettera del mese
     * Al numero del mese corrisponde una lettera
     */
    protected $_mesi = array(
        1 => 'A', 2 => 'B', 3 => 'C', 4 => 'D', 5 => 'E',
        6 => 'H', 7 => 'L', 8 => 'M', 9 => 'P', 10 => 'R',
        11 => 'S', 12 => 'T'
    );
    protected $_pari = array(
        '0' => 0, '1' => 1, '2' => 2, '3' => 3, '4' => 4,
        '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9,
        'A' => 0, 'B' => 1, 'C' => 2, 'D' => 3, 'E' => 4,
        'F' => 5, 'G' => 6, 'H' => 7, 'I' => 8, 'J' => 9,
        'K' => 10, 'L' => 11, 'M' => 12, 'N' => 13, 'O' => 14,
        'P' => 15, 'Q' => 16, 'R' => 17, 'S' => 18, 'T' => 19,
        'U' => 20, 'V' => 21, 'W' => 22, 'X' => 23, 'Y' => 24,
        'Z' => 25
    );
    protected $_dispari = array(
        '0' => 1, '1' => 0, '2' => 5, '3' => 7, '4' => 9,
        '5' => 13, '6' => 15, '7' => 17, '8' => 19, '9' => 21,
        'A' => 1, 'B' => 0, 'C' => 5, 'D' => 7, 'E' => 9,
        'F' => 13, 'G' => 15, 'H' => 17, 'I' => 19, 'J' => 21,
        'K' => 2, 'L' => 4, 'M' => 18, 'N' => 20, 'O' => 11,
        'P' => 3, 'Q' => 6, 'R' => 8, 'S' => 12, 'T' => 14,
        'U' => 16, 'V' => 10, 'W' => 22, 'X' => 25, 'Y' => 24,
        'Z' => 23
    );
    protected $_controllo = array(
        '0' => 'A', '1' => 'B', '2' => 'C', '3' => 'D',
        '4' => 'E', '5' => 'F', '6' => 'G', '7' => 'H',
        '8' => 'I', '9' => 'J', '10' => 'K', '11' => 'L',
        '12' => 'M', '13' => 'N', '14' => 'O', '15' => 'P',
        '16' => 'Q', '17' => 'R', '18' => 'S', '19' => 'T',
        '20' => 'U', '21' => 'V', '22' => 'W', '23' => 'X',
        '24' => 'Y', '25' => 'Z'
    );

    /**
     * Stringa di errore
     */
    protected $_error = null;

    /**
     * Separatore per la data di nascita
     */
    protected $_dateSeparator = '/';

    /**
     * Percorso del file del database SQLite
     * dei codici catastali
     */
    protected $_dbCatastali = null;

    /**
     * Trasforma la stringa passata in un array di lettere
     * e lo incrocia con un ulteriore array 
     */
    protected function _getLettere($string, array $haystack) {
        $letters = array();
        foreach (str_split($string) as $needle) {
            if (in_array($needle, $haystack)) {
                $letters[] = $needle;
            }
        }
        return $letters;
    }

    /**
     * Ritorna un array con le vocali di una data stringa
     */
    protected function _getVocali($string) {
        return $this->_getLettere($string, $this->_vocali);
    }

    /**
     * Ritorna un array con le consonanti di una data stringa
     */
    protected function _getConsonanti($string) {
        return $this->_getLettere($string, $this->_consonanti);
    }

    /**
     * Pulisce la stringa filtrando tutti i caratteri che
     * non sono lettere. Lo switch $toupper se impostato a TRUE
     * converte la stringa risultante in MAIUSCOLO.
     */
    protected function _sanitize($string, $toupper = true) {
        $result = preg_replace('/[^A-Za-z]*/', '', $string);
        return ($toupper) ? strtoupper($result) : $result;
    }

    /**
     * Se la stringa passata a funzione e' costituita
     * da meno di 3 caratteri, rimpiazza le lettere
     * mancanti con la lettera X.
     */
    protected function _addMissingX($string) {
        $code = $string;
        while (strlen($code) < 3) {
            $code .= 'X';
        }
        return $code;
    }

    /**
     * Ottiene il codice identificativo del nome
     */
    protected function _calcolaNome($string) {
        $nome = $this->_sanitize($string);

        // Se il nome inserito e' piu' corto di 3 lettere
        // si aggiungono tante X quanti sono i caratteri
        // mancanti.
        if (strlen($nome) < 3) {
            return $this->_addMissingX($nome);
        }

        $nome_cons = $this->_getConsonanti($nome);

        // Se le consonanti contenute nel nome sono minori 
        // o uguali a 3 vengono considerate nell'ordine in cui
        // compaiono.
        if (count($nome_cons) <= 3) {
            $code = implode('', $nome_cons);
        } else {
            // Se invece abbiamo almeno 4 consonanti, prendiamo
            // la prima, la terza e la quarta.
            for ($i = 0; $i < 4; $i++) {
                if ($i == 1)
                    continue;
                if (!empty($nome_cons[$i])) {
                    $code .= $nome_cons[$i];
                }
            }
        }

        // Se compaiono meno di 3 consonanti nel nome, si
        // utilizzano le vocali, nell'ordine in cui compaiono
        // nel nome.
        if (strlen($code) < 3) {
            $nome_voc = $this->_getVocali($nome);
            while (strlen($code) < 3) {
                $code .= array_shift($nome_voc);
            }
        }

        return $code;
    }

    protected function _calcolaCognome($string) {
        $cognome = $this->_sanitize($string);

        // Se il cognome inserito e' piu' corto di 3 lettere
        // si aggiungono tante X quanti sono i caratteri
        // mancanti.
        if (strlen($cognome) < 3) {
            return $this->_addMissingX($cognome);
        }

        $cognome_cons = $this->_getConsonanti($cognome);

        // Per il calcolo del cognome si prendono le prime
        // 3 consonanti. 
        for ($i = 0; $i < 3; $i++) {
            if (array_key_exists($i, $cognome_cons)) {
                $code .= $cognome_cons[$i];
            }
        }

        // Se le consonanti non bastano, vengono prese
        // le vocali nell'ordine in cui compaiono.
        if (strlen($code) < 3) {
            $cognome_voc = $this->_getVocali($cognome);
            while (strlen($code) < 3) {
                $code .= array_shift($cognome_voc);
            }
        }

        return $code;
    }

    /**
     * Imposta il separatore di data ( default: / )
     */
    public function setDateSeparator($char) {
        $this->_dateSeparator = $char;
        return $this;
    }

    /**
     * Ritorna la parte di codice fiscale corrispondente
     * alla data di nascita del soggetto (Forma: AAMGG)
     */
    protected function _calcolaDataNascita($data, $sesso) {
        $dn = explode($this->_dateSeparator, $data);

        $giorno = (int) @$dn[0];
        $mese = (int) @$dn[1];
        $anno = (int) @$dn[2];

        // Le ultime due cifre dell'anno di nascita
        $aa = substr($anno, -2);

        // La lettera corrispondente al mese di nascita
        $mm = $this->_mesi[$mese];

        // Il giorno viene calcolato a seconda del sesso
        // del soggetto di cui si calcola il codice:
        // se e' Maschio si mette il giorno reale, se e' 
        // Femmina viene aggiungo 40 a questo numero.
        $gg = (strtoupper($sesso) == 'M') ? $giorno : ($giorno + 40);


        if (strlen($gg) < 2)
            $gg = '0' . $gg;


        return $aa . $mm . $gg;
    }

    /**
     * Ritorna il codice catastale del comune richiesto
     */
    /* protected function _calcolaCatastale($comune, $provincia) {
      $db = sqlite_open($this->_dbCatastali, 0666);
      if (!$db) {
      $this->_setError(self::ERR_SQLITE_OPEN);
      return false;
      }

      $sql_comune    = strtoupper(sqlite_escape_string($comune));
      $sql_provincia = strtoupper(sqlite_escape_string($provincia));

      $query = sprintf("SELECT codice FROM catastali WHERE comune = '%s' AND provincia = '%s'",
      $sql_comune, $sql_provincia);

      $result = sqlite_query($db, $query);
      $entry = sqlite_fetch_array($result, SQLITE_ASSOC);

      if (is_null($entry['codice'])) {
      $this->_setError(self::ERR_SQLITE_QUERY);
      return false;
      }

      return $entry['codice'];
      } */

    /**
     * Ritorna la cifra di controllo sulla base dei
     * 15 caratteri del codice fiscale calcolati.
     */
    protected function _calcolaCifraControllo($codice) {
        $code = str_split($codice);
        $sum = 0;

        for ($i = 1; $i <= count($code); $i++) {
            $cifra = $code[$i - 1];
            $sum += ($i % 2) ? $this->_dispari[$cifra] : $this->_pari[$cifra];
        }

        $sum %= 26;

        return $this->_controllo[$sum];
    }

    /**
     * Imposta il percorso del database dei codici catastali
     */
    /* public function setDatabase($filename) {
      if (!is_readable($filename)) {
      $this->_setError(self::ERR_SQLITE_FILE);
      return false;
      }
      $this->_dbCatastali = $filename;
      return $this;
      } */

    /**
     * Imposta il messaggio di errore
     */
    protected function _setError($string) {
        $this->_error = $string;
    }

    /**
     * Verifica la presenza di un errore.
     * Ritorna TRUE se presente, FALSE altrimenti.
     */
    public function hasError() {
        return !is_null($this->_error);
    }

    /**
     * Ritorna la stringa di errore
     */
    public function getError() {
        return $this->_error;
    }

    /**
     * Ritorna il codice fiscale utilizzando i parametri
     * passati a funzione. Se si verifica
     */
    //IL CODICE CATASTALE VIENE PASSATO 
    //
    /* public function calcola($nome, $cognome, $data, $sesso, $comune, $provincia) {
      $codice = $this->_calcolaCognome($cognome) .
      $this->_calcolaNome($nome) .
      $this->_calcolaDataNascita($data, $sesso) .
      $this->_calcolaCatastale($comune, $provincia); */
    //Funzione per il Calcolo del CODICE FISCALE
    public function calcola($nome, $cognome, $data, $sesso, $codErariale) {
        $codice = $this->_calcolaCognome($cognome) .
                $this->_calcolaNome($nome) .
                $this->_calcolaDataNascita($data, $sesso) .
                $codErariale;

        if ($this->hasError()) {
            return false;
        }

        $codice .= $this->_calcolaCifraControllo($codice);

        if (strlen($codice) != 16) {
            $this->_setError(self::ERR_GENERIC);
            return false;
        }

        return $codice;
    }

}

//Verifica della Partita IVA
function ControllaPIVA($pi) {

    if ($pi === '')
        return '';
    if (strlen($pi) != 11)
        return "La lunghezza della partita IVA non &egrave;\n"
                . "corretta: la partita IVA dovrebbe essere lunga\n"
                . "esattamente 11 caratteri.\n";
    if (preg_match("/^[0-9]+\$/", $pi) != 1)
        return "La partita IVA contiene dei caratteri non ammessi:\n"
                . "la partita IVA dovrebbe contenere solo cifre.\n";
    $s = 0;
    for ($i = 0; $i <= 9; $i += 2)
        $s += ord($pi[$i]) - ord('0');
    for ($i = 1; $i <= 9; $i += 2) {
        $c = 2 * ( ord($pi[$i]) - ord('0') );
        if ($c > 9)
            $c = $c - 9;
        $s += $c;
    }
    if (( 10 - $s % 10 ) % 10 != ord($pi[10]) - ord('0'))
        return "La partita IVA non &egrave; valida:\n"
                . "il codice di controllo non corrisponde.";
    return '';
}

function stringaRandom($length) {
    $string = "";

    // genera una stringa casuale che ha lunghezza  
    // uguale al multiplo di 32 successivo a $length  
    for ($i = 0; $i <= ($length / 32); $i++)
        $string .= md5(time() + rand(0, 99));

    // indice di partenza limite  
    $max_start_index = (32 * $i) - $length;

    // seleziona la stringa, utilizzando come indice iniziale  
    // un valore tra 0 e $max_start_point  
    $random_string = substr($string, rand(0, $max_start_index), $length);

    return $random_string;
}

function PulisciNomeFile($stringa, $suffisso) {
    $stringa = strip_tags($stringa); // elimina tag html
    $stringa = stripslashes($stringa);
    //$stringa = ereg_replace("[^A-Za-z0-9_\-\./, ]", "", $stringa); // rimuove special characters
    $stringa = preg_replace("/[^A-Za-z0-9_\-\.\/, ]/", "", $stringa); // rimuove special characters
    //$stringa = str_replace(array('.','-','/',','), " ", $stringa); // sostituisce caratteri legali con spazi
    $stringa = str_replace(array('-', '/', ','), " ", $stringa); // sostituisce caratteri legali con spazi
    $stringa = trim($stringa); // rimuove spazio vuoto all'inizio e alla fine
    //$stringa = ereg_replace(" {1,}", "_", $stringa); // sostituisce uno o piu spazi consecutivi con un underscore
    $stringa = preg_replace("/ {1,}/", "_", $stringa); // sostituisce uno o piu spazi consecutivi con un underscore
    //$stringa = ereg_replace("_{2,}", "_", $stringa); // sostituisce due o piu spazi consecutivi con un underscore
    $stringa = preg_replace("/_{2,}/", "_", $stringa); // sostituisce due o piu spazi consecutivi con un underscore
    //$suffisso = "foto_"; 
    $uq = md5(uniqid(microtime(), true));
    if ($stringa != '')
        $stringa = $suffisso . "_" . $uq . "_" . $stringa;

    return $stringa;
}

function sommaOre($time1, $time2) {
    $t1 = explode(":", $time1);
    $t2 = explode(":", $time2);

//Senza considerare l'overflow
    $sec = $t1[2] + $t2[2];
    $min = $t1[1] + $t2[1];
    $ora = $t1[0] + $t2[0];

//Effettuo il controllo sull'overflow
//61sec=1min+1sec ecc...
    $min += floor($sec / 60);
    $ora += floor($min / 60);

//Elimino l'overflow
    $sec = fmod($sec, 60);
    $min = fmod($min, 60);
    $ora = fmod($ora, 24);

//Aggiungo gli zeri ai valori minori di 10
    $sec = ($sec < 10 ? "0" : "") . $sec;
    $min = ($min < 10 ? "0" : "") . $min;
    $ora = ($ora < 10 ? "0" : "") . $ora;

    $time = $ora . ":" . $min . ":" . $sec;
    return $time;
}

function differenza($ora1, $ora2, $sep) {
    $part = explode($sep, $ora1);
    $arr = explode($sep, $ora2);
    $diff = mktime($arr[0], $arr[1]) - mktime($part[0], $part[1]);
    $ore = floor($diff / (60 * 60));
    $minuti = ($diff / 60) % 60;
    $ore = str_pad($ore, 2, 0, STR_PAD_LEFT);
    $minuti = str_pad($minuti, 2, 0, STR_PAD_LEFT);
    $risultato = $ore . ":" . $minuti;
    return $risultato;
}

function generaCifraControlloEAN13($barcode) {
    //Compute the check digit
    $sum = 0;
    for ($i = 1; $i <= 11; $i += 2)
        $sum += 3 * $barcode[$i];
    for ($i = 0; $i <= 10; $i += 2)
        $sum += $barcode[$i];
    $r = $sum % 10;
    if ($r > 0)
        $r = 10 - $r;
    return $r;
}

function troncaStringa($stringa, $max_char) {
    if (strlen($stringa) > $max_char) {
        $stringa_tagliata = substr($stringa, 0, $max_char);
        $last_space = strrpos($stringa_tagliata, " ");
        $stringa_ok = substr($stringa_tagliata, 0, $last_space);
        return $stringa_ok . "...";
    } else {
        return $stringa;
    }
}

?>