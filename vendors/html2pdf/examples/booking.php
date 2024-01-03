<?php
exit;
include '../../../connessione/connessione.php';
include '../../../errore/errore.php';
//exit;
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */
    // get the HTML
    ob_start();
	$codiceBooking = '55cb5f5160fcb';	
	mysql_select_db($db_name, $connessione); 
		$queryCodice = mysql_query("SELECT * FROM booking WHERE codice='$codiceBooking'");
		$rowCodice = mysql_fetch_object($queryCodice);
		
		$query_mailUtente = mysql_query("SELECT p.nome_struttura, p.email, p.indirizzo, p.civico, p.cap, p.telefono, p.cellulare, c.comune FROM persone p LEFT JOIN comuni c on p.citta=c.id WHERE p.id='$rowCodice->persona'");
	
	$rowCliente = mysql_fetch_object($query_mailUtente);
	
	$nomeCliente = $rowCliente->nome_struttura;
	$emailCliente = $rowCliente->email;
	$indirizzoCliente = '';
	
	if($rowCliente->indirizzo!=''){$indirizzoCliente.=$rowCliente->indirizzo;}
	if($rowCliente->civico!=''){$indirizzoCliente.=", ".$rowCliente->civico;}
	if($rowCliente->cap!=''){$indirizzoCliente .="<br>".$rowCliente->cap;}
	if($rowCliente->comune!=''){$indirizzoCliente .="&nbsp;".$rowCliente->comune;}
	if($rowCliente->telefono!=''){$indirizzoCliente .="<br>Tel.&nbsp;".$rowCliente->telefono;}
	if($rowCliente->cellulare!=''){$indirizzoCliente .="&nbsp;-&nbsp;Cell.&nbsp;".$rowCliente->cellulare;}
	$indirizzoCliente .="<br>E-mail&nbsp;".$rowCliente->email;
	
		$queryEsercente = mysql_query("SELECT p.nome_struttura, p.email, p.indirizzo, p.civico, p.cap, p.telefono, c.comune FROM persone p LEFT JOIN comuni c on p.citta=c.id WHERE p.id='$rowCodice->struttura'");

	$rowEsercente = mysql_fetch_object($queryEsercente);
	
	$nomeEsercente =$rowEsercente->nome_struttura; 
	$indirizzoEsercente='';
	if($rowEsercente->indirizzo!=''){$indirizzoEsercente.=$rowEsercente->indirizzo;}
	if($rowEsercente->civico!=''){$indirizzoEsercente.=", ".$rowEsercente->civico;}
	if($rowEsercente->cap!=''){$indirizzoEsercente .="<br>".$rowEsercente->cap;}
	if($rowEsercente->comune!=''){$indirizzoEsercente .="&nbsp;".$rowEsercente->comune;}
	if($rowEsercente->telefono!=''){$indirizzoEsercente .="<br>Tel.&nbsp;".$rowEsercente->telefono;}
	
		$query_p = mysql_query("SELECT a.id AS id_foto, a.foto, a.foto_crop, n.id AS id_news, n.titolo FROM album_foto AS a JOIN news AS n ON a.id_news = n.id WHERE n.autore =  '$rowCodice->struttura' AND n.titolo='profilo' ORDER BY a.ordine LIMIT 0,1");

	$row_p = mysql_fetch_object($query_p);
	if(($row_p->foto=='')&&($row_p->foto_crop=='')){
		$img_profilo = "img/noprofilo.jpg";

		
	}else{
		$img_profilo = $row_p->foto;
	}

		
		//$titoloSoggiorno = "Soggiorno dal ".Data_it($rowCodice->checkin)." al ".Data_it($rowCodice->checkout);
		//$sottotitoloSoggiorno= "Ospiti: ".$rowCodice->ospiti
?>
<page>
    <table style="width: 100%; height:100%;border: none;" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="3" style="width: 100%; background:#E5007D; text-align:center; padding:10px 30px;"><img src="http://www.ilike.city/images/logo/logo.png" /></td>
        </tr>
        <tr>
          <td colspan="3" style="width: 100%; text-align:center">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" style="width: 100%; text-align:center"><h2>La Tua Prenotazione N°&nbsp; <?=$rowCodice->codice;?></h2></td>
        </tr>
        <tr>
          <td colspan="3" style="width: 100%;">&nbsp;</td>
        </tr>
        <tr>
            <td style="width: 33%; text-align:right; padding-right:30px;">&nbsp;</td>
            <td style="width: 33%; text-align:right; padding-right:30px; text-align:right;"><img src="http://www.ilike.city/<?=$img_profilo;?>"></td>
            <td style="width: 34%; text-align:left; padding-right:30px;"><h3><?=$nomeEsercente;?></h3><?=$indirizzoEsercente; ?></td>
        </tr>
        
        <tr>
          <td colspan="3" style="width: 100%;">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" style="width: 100%; border-top: 1px dotted #95C11E; padding:10px 30px;">Prenotazione effettuata da:</td>
        </tr>
        <tr>
          <td colspan="3" style="width: 100%;padding:10px 30px;"><h3><?=$nomeCliente; ?></h3><?=$indirizzoCliente;?></td>
        </tr>
         
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" style="border-top: 1px dotted #95C11E; padding:10px 30px;"><h4>Trattamento:</h4></td>
          <td style="border-top: 1px dotted #95C11E; padding:10px 30px;"><h4>Giorni:</h4></td>
        </tr>
        <tr>
          <td colspan="2" style="padding:0 30px;"><?=$rowCodice->trattamento;?></td>
          <td style="padding:0 30px;"><?=diffDateGiorni(Data_it($rowCodice->checkin),Data_it($rowCodice->checkout));?></td>
        </tr>
         
        <tr>
          <td style="width: 33%;">&nbsp;</td>
          <td style="width: 33%;">&nbsp;</td>
          <td style="width: 34%;">&nbsp;</td>
        </tr>
        <tr>
          <td style="width: 33%;border-top: 1px dotted #95C11E; padding:10px 30px;"><h4>Data Arrivo / Check-in</h4><?=Data_it($rowCodice->checkin)?></td>
          <td style="width: 33%;border-top: 1px dotted #95C11E; padding:10px 30px;"><h4>Data Partenza / Check-out</h4><?=Data_it($rowCodice->checkout)?></td>
          <td style="width: 34%;border-top: 1px dotted #95C11E; padding:10px 30px;"><h4>Ospiti / Guests</h4><?=$rowCodice->ospiti;?></td>
        </tr>
         <tr>
          <td style="width: 33%;border-top: 1px dotted #95C11E; padding:10px 30px;"><h4>Costo Soggiorno</h4>&euro;&nbsp;<?=number_format($rowCodice->totaleSoggiorno,2,',', '.')?></td>
          <td style="width: 33%;border-top: 1px dotted #95C11E; padding:10px 30px;"><h4>Pagato on-line</h4>&euro;&nbsp;<?=number_format($rowCodice->costoServizio,2,',', '.')?></td>
          <td style="width: 34%;border-top: 1px dotted #95C11E; padding:10px 30px;"><h4>Da Pagare in Struttura (*)</h4>&euro;&nbsp;<?=number_format($rowCodice->importo,2,',', '.')?></td>
        </tr>
         <tr>
           <td colspan="3" style="width: 100%; padding:10px 30px;">(*) - Tasse di soggiorno non incluse;<br>
- L'importo totale non include eventuali costi aggiuntivi (es. Tessera Club, Bevande)</td>
         </tr>
         <tr>
           <td style="width: 33%;">&nbsp;</td>
           <td style="width: 33%;">&nbsp;</td>
           <td style="width: 34%;">&nbsp;</td>
         </tr>
         
        <tr>
          <td colspan="3" style="width: 100%; background:#E5007D; text-align:center; padding:10px 30px; color:#FFF">www.ilike.city - Il Piacere di Vivere la Città </td>
        </tr>
    </table>
</page>
<?php
     $content = ob_get_clean();

$corpo_mail ='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css">
<!--
.Stile1 {
	font-family: Tahoma;
	font-size:15px
}
.Stile2 {color: #FFFFFF}
.Stile3 {color: #ffffff}
.Stile4 {font-family: Tahoma; font-size:10px; color:#000000}
-->
</style>
</head>
<body>
<table width="100%" height="100%" align="center" >
  <tr>
    <td colspan="3" class="Stile1"></td>
  </tr>
  <tr>
    <td class="Stile1">&nbsp;</td>
    <td class="Stile1">
      <p align="center"><font size="2" class="Stile1"><b><br>
        La Tua Prenotazione presso'.$nomeEsercente.' </b></font><br>
        <br>
      </p>
      <div align="center"><br>
    </div></td><td class="Stile1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="left">
      <table width="96%" class="Stile1">
        <tr height="20">
          <td height="20" class="Stile4">Grazie&nbsp;<strong>'.$nomeCliente.'!</strong></td>
          </tr>
        <tr height="20">
          <td height="20"><p class="Stile4">Ecco la conferma della tua prenotazione da stampare e presentare in struttura al momento del check-in.</p>
            <p class="Stile4">Per eventuali info contattaci alla seguente mail info@ilike.city</p>
            </td>
        </tr>
        <tr height="20">
          <td height="20"><p class="Stile4">            <br>
            Buon Viaggio!<br>
            STAFF ilike.city<br>
            </p></td>
        </tr>
      </table>
      <br>
    </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><span class="Stile1"></span></td>
  </tr>
</table>
</body>
</html>';

//$email = "giuseppe@icomadv.com";
    // convert
    require_once(dirname(__FILE__).'/../html2pdf.class.php');
	//require_once(dirname(__FILE__).'/../../pjmail/pjmail.class.php'); 
	include "../../../PHPMailer/PHPMailerPersonale.php";


    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', 0);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        //$html2pdf->Output('ticket.pdf');
		$content_PDF = $html2pdf->Output('booking.pdf', 'S');  
		
		/*$mail = new PJmail(); 
   $mail->setAllFrom('info@ilike.city', "il Piacere di Vivere la Città"); 
   $mail->addrecipient('giuseppe@icomadv.com'); 
   $mail->addsubject("ilike.city - Acquisto Coupon"); 
   $mail->text = "Gentile i"; 
   $mail->addbinattachement("coupon_$num.pdf", $content_PDF); 
   $res = $mail->sendmail(); */
   $mail = new MyMailer(); //istanziamo la classe
/*$mail->IsSMTP(); // Impostiamo utilizzo dell'SMTP
$mail->Host = 'smtp.ilike.city'; // server smtp
$mail->SMTPAuth = true; // autenticazione del server (se necessario)
$mail->Username = 'info@ilike.city'; // solo se richiesta autenticazione
$mail->Password = '85bo82ga'; // solo se richiesta autenticazione
$mail->Port = 587; //impostazione porta di smtp
$mail->From = 'info@ilike.city';
$mail->FromName = 'Info le Vie del Signore';*/
$mail->AddAddress("$emailCliente"); // destinatario
$mail->AddBCC("giuseppe@icomadv.com");
$mail->AddBCC("info@ilike.city");
$mail->AddBCC("info@grupposispec.com");
$mail->Subject ="La Tua Prenotazione su ilike.city presso ".$nomeEsercente;
$mail->Body = $corpo_mail;
//$mail->AddAttachment('/tmp/immagine.jpg', 'nome_file.jpg'); // Aggiungo allegato con un nome
//$mail->addStringAttachment($row['photo'], 'YourPhoto.jpg');
$mail->addStringAttachment($content_PDF, 'booking.pdf','base64', 'application/pdf'); // Aggiungo allegato con un nome

$mail->IsHTML(true); // Formato HTML per il contenuto della mail.
if(!$mail->Send()){
  // echo 'Errore durante invio della mail: '.$mail->ErrorInfo;
   //echo 'Errore durante invio della mail, Ripova!';
}else{
}
$mail->SmtpClose();
unset($mail);
	



    }
    catch(HTML2PDF_exception $e) {
        echo $e;
       // exit;
    }

