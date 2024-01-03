<?php
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
	$idPersona=6;
	$custom = 21;
	mysql_select_db($db_name, $connessione); 
	$query_mailUtente = mysql_query("SELECT p.nome_struttura, p.email, p.indirizzo, p.civico, p.cap, p.telefono, c.comune FROM persone p LEFT JOIN comuni c on p.citta=c.id WHERE p.id='$idPersona'");
	
	$rowCliente = mysql_fetch_object($query_mailUtente);
	
	$nomeCliente = $rowCliente->nome_struttura;
	$emailCliente = $rowCliente->email;
	$indirizzoCliente = '';
	
	if($rowCliente->indirizzo!=''){$indirizzoCliente.=$rowCliente->indirizzo;}
	if($rowCliente->civico!=''){$indirizzoCliente.=", ".$rowCliente->civico;}
	if($rowCliente->cap!=''){$indirizzoCliente .="<br>".$rowCliente->cap;}
	if($rowCliente->comune!=''){$indirizzoCliente .="&nbsp;".$rowCliente->comune;}
	
	$queryCoupon = mysql_query("SELECT * FROM coupon WHERE id='$custom'");
	$rowCoupon = mysql_fetch_object($queryCoupon);
	$titoloCoupon = $rowCoupon->titolo;
	$sottotitoloCoupon='';
	if($rowCoupon->valore>0){$sottotitoloCoupon="da&nbsp;&euro;&nbsp;".number_format($rowCoupon->valore, 2,',', '.')."&nbsp;a&nbsp;&euro;&nbsp;".number_format($rowCoupon->prezzo, 2,',', '.');}
	$codiceCouponA=$rowCoupon->codice;
	$condizioneCoupon = $rowCoupon->descrizione.$rowCoupon->condizioni;
	$idEsercente = $rowCoupon->persona;
	
	
	$queryCoupon2 = mysql_query("SELECT * FROM coupon_venduti WHERE coupon='$custom' AND persona='$idPersona'");
	$rowCoupon2 = mysql_fetch_object($queryCoupon2);
	$codiceCouponB=$rowCoupon2->codice;
	
		$queryEsercente = mysql_query("SELECT p.nome_struttura, p.email, p.indirizzo, p.civico, p.cap, p.telefono, c.comune FROM persone p LEFT JOIN comuni c on p.citta=c.id WHERE p.id='$idEsercente'");

	$rowEsercente = mysql_fetch_object($queryEsercente);
	
	$nomeEsercente ="<br>". $rowEsercente->nome_struttura; 
	$indirizzoEsercente='';
	if($rowEsercente->indirizzo!=''){$indirizzoEsercente.=$rowEsercente->indirizzo;}
	if($rowEsercente->civico!=''){$indirizzoEsercente.=", ".$rowEsercente->civico;}
	if($rowEsercente->cap!=''){$indirizzoEsercente .="<br>".$rowEsercente->cap;}
	if($rowEsercente->comune!=''){$indirizzoEsercente .="&nbsp;".$rowEsercente->comune;}
	if($rowEsercente->telefono!=''){$indirizzoEsercente .="<br>Tel.".$rowEsercente->telefono;}
	
?>
<style type="text/css">
<!--
    div.zone { border: none; border-radius: 6mm; background: #FFFFFF; border-collapse: collapse; padding:3mm; font-size: 2.7mm;}
    h1 { padding: 0; margin: 0; color: #DD0000; font-size: 7mm; }
    h2 { padding: 0; margin: 0; color: #222222; font-size: 5mm; position: relative; }
-->
</style>
<page format="140x200" orientation="L" backcolor="#E5007D" style="font: verdana;">
    <div style="rotate: 90; position: absolute; width: 100mm; height: 4mm; left: 195mm; top: 0; font-style: italic; font-weight: normal; text-align: center; font-size: 2.5mm; color:#FFF">www.ilike.city - Il Piacere di Vivere la Città    </div>
    <table style="width: 99%;border: none;" cellspacing="4mm" cellpadding="0">
        <tr>
            <td colspan="2" style="width: 100%">
                <div class="zone" style="height: 34mm;position: relative;font-size: 5mm;">
                    
                    <div style="position: absolute; right: 3mm; bottom: 3mm; text-align: right; font-size: 3mm; ">
                    <p><?php echo $nomeCliente; ?><br /><?php echo $indirizzoCliente; ?></p>
                        <barcode type="C39" value="<?php echo $codiceCouponB; ?>" style="color: #000" ></barcode>
                        <b><?php //echo $num; ?></b>
						<!--<br>-->
                    </div>
                    <h2><?php echo $titoloCoupon; ?></h2>
                    <?php echo $sottotitoloCoupon; ?>
                    <br />
                    <b><?php echo $nomeEsercente; ?></b><br><?php echo $indirizzoEsercente; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width: 25%;">
                <div class="zone" style="height: 45mm;vertical-align: middle;text-align: center;">
                    <qrcode value="<?php echo $codiceCouponB; ?>" ec="Q" style="width: 37mm; border: none;"></qrcode>
                </div>
            </td>
            <td style="width: 75%">
                <div class="zone" style="height: 45mm;vertical-align: middle; text-align: justify">
                	<p><?php echo $condizioneCoupon; ?></p>

                    <br>
                    <!--<i>Ce billet est reconnu électroniquement lors de votre
                    arrivée sur site. A ce titre, il ne doit être ni dupliqué, ni photocopié.
                    Toute reproduction est frauduleuse et inutile.</i>-->
                </div>
            </td>
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
        Acquisto Coupon su ilike.city </b></font><br>
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
          <td height="20" class="Stile4">Gentile Sig./Sig.ra&nbsp;<strong>'.$nomeCliente.'</strong></td>
          </tr>
        <tr height="20">
          <td height="20"><p class="Stile4">Grazie per aver scelto ilike.city per il tuo acquisto on-line.<br>
            In allegato trovi il Coupon da stampare e presentare all`esercente convenzionato.</p>
            <p class="Stile4">Per Maggiori info inviaci una richiesta alla seguente mail:info@ilike.city</p>
            </td>
        </tr>
        <tr height="20">
          <td height="20"><p class="Stile4">            <br>
            Cordiali Saluti,<br>
            ilike.city<br>
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

$email = "stefano@icomadv.com";
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
		$content_PDF = $html2pdf->Output('Coupon.pdf', 'S');  
		
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
$mail->AddAddress("$email"); // destinatario
$mail->AddBCC("giuseppe@icomadv.com");
$mail->Subject ="Acquisto Coupon su ilike.city";
$mail->Body = $corpo_mail;
//$mail->AddAttachment('/tmp/immagine.jpg', 'nome_file.jpg'); // Aggiungo allegato con un nome
//$mail->addStringAttachment($row['photo'], 'YourPhoto.jpg');
$mail->addStringAttachment($content_PDF, 'Coupon.pdf','base64', 'application/pdf'); // Aggiungo allegato con un nome

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

