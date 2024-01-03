<?php
require_once 'controller/security.php';
antiHack();
#Sito in manutenzione:
#se il sito è in manutenzione le richieste vengono inoltrate da index.php alla pagina di manutenzione
#specificata come $manutenzioneForward
$manutenzione=false;
$manutenzioneForward="manutenzione.php";
$debug=true;

#Configurazione database
// IN LOCALE
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "vanitylab";


//$googleMapsKey='ABQIAAAAlETeeUTBvZOQeT_iZzH_XxRISsHQYjpyaEQU-WKx9ZbMcyAB5hQoHqpxnC9vmthmXeCneIdgiVJPpw';
$googleMapsKey='';

#Configurazione sessione
$sessionName="vanitylab";

#Configurazione sito ed email
$title="Vanity Lab";
$siteName="www.icomadv.com";
$siteUrl="http://www.icomadv.com";
$sendTo="giuseppe@icomadv.com";  #Destinatario comunicazioni del sito

#Configurazione seo
$googleSiteVerification="";
$keywords="";
$googleAnalyticsUA="";

#Component login
$componentLogin=true;
$path_allegati="documenti/allegatiComunicazione";
#Indica quali campi non possono essere modificati dall'utente con la funzione modificaProfilo

#Componente docs
$componentDocs=true;
$path_docs="documenti/documenti";
$path_docs_ftp="/documenti/upload";

#Componente galleria
$componentGalleria=true;
$sourcedir = './';
$image_dir="img/";


$documenti = array("Fattura", "Bolla", "Preventivo");
$tipi = array("Acquisto", "Vendita", "Reso");
