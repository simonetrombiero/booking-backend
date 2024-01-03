<?php

header("Content-Type: text/html; charset=ISO-8859-1", true);
//header('Content-Type: text/html; charset=utf-8');

include "errore/errore.php";

session_start();
/*echo $_SESSION[cestino];*/
	if (count($_SESSION[cestino])<=0) { 
		echo '<p style="font-size:1.3 em; color:#F00;">ATTENZIONE IL CARRELLO &Egrave; VUOTO!!</p><p>&nbsp;</p>';
		//echo '<p><a href onClick="document.location=prodotti.php" class="bottone" /></p>	';		
		echo '<p style="text-align:right"><a href="prodotti.php" class="bottone"> ritorna al negozio</a></p>';
					exit;
					
	} 
	


//include "PHPMailer/PHPMailerPersonale.php";
//print_r($_SESSION[cestino]);

	$errore ='';
	
	$termini = $_POST["termini"];


    $nome = $_POST["nome"];
	
    $cognome = $_POST["cognome"];
	$email = $_POST["email"];
	$telefono = $_POST["telefono"]; 
    $indirizzo = $_POST["indirizzo"];
	
    $civico = $_POST["civico"];
    $cap = $_POST["cap"];
	
    $citta = $_POST["citta"];
    $pagamento = $_POST["pagamento"]; 
	
		if($termini!='si'){
		$errore .= "&Egrave; necessario leggere ed accettare le condizioni del servizio<br>";
	}


	$nome = Pulisci_txt($_POST["nome"]);
	
	if($nome==''){
		$errore .= "Nome &egrave; obbligatorio<br>";
	}
	
	$cognome = Pulisci_txt($_POST["cognome"]);
	
	if($cognome==''){
		$errore .= "Cognome &egrave; obbligatorio<br>";
	}
	
	$indirizzo = Pulisci_txt($_POST["indirizzo"]);
	
	if($indirizzo==''){
		$errore .= "Indirizzo &egrave; obbligatorio<br>";
	}
	
	$cap = Pulisci_txt($_POST["cap"]);
	
	if($cap==''){
		$errore .= "Cap &egrave; obbligatorio<br>";
	}
	
	if(!Numerico($cap)){
		$errore .= "Cap non valido<br>";
	}

	
	
	$citta = $_POST["citta"];
	
	if($citta==''){
		$errore .= "Citt&agrave; &egrave; obbligatorio<br>";
	}

	
	$telefono = $_POST["telefono"];
	
	if($telefono==''){
		$errore .= "Telefono &egrave; obbligatorio<br>";
	}
	
	if(!Numerico($telefono)){
		$errore .= "Telefono non valido<br>";
	}

	
	$email = $_POST["email"];
	
	if(!Email($email)){
		$errore .= "Email non valida<br>";
		
	}
	if ($errore!=''){
		echo "<p style='font-size:1.3 em; color:#F00;'>Si sono verificati degli errori:<br>".$errore.'<p>&nbsp;</p>'; 
		echo '<p style="text-align: right;"><input type="submit" value="invia" class="bottone"></p> ';
		exit; 
		}

	$corpo_mail ="<p>Gentile $nome,<br>grazie per la Sua richiesta, di seguito riportiamo un riepilogo:</p>";
	
	$corpo_mail .= '          <table style="width:100%">
  <tr>
    <th colspan="2" style="background:#333; color:#fff;">Dati Cliente</th>
    </tr>
  <tr>
      <td>Nome:&nbsp;<b>'.$nome.'</b></td>
      <td>Cognome:&nbsp;<b>'.$cognome.'</b></td>
  </tr>
  <tr>
      <td>Email:&nbsp;<b>'.$email.'</b></td>
      <td>Recapito Telefonico:&nbsp;<b>'.$telefono.'<b></td>
  </tr>
  <tr>
     <th colspan="2" style="background:#333; color:#fff;">Dati Spedizione</th>
  </tr>
 <tr>
      <td>Indirizzo:&nbsp;<b>'.$indirizzo.'</b></td>
      <td>Civico:&nbsp;<b>'.$civico.'<b></td>
  </tr>
  <tr>
      <td>Cap:&nbsp;<b>'.$cap.'<b></td>
      <td>Citta:&nbsp;<b>'.$citta.'</td>
  </tr>
    <tr>
        <th colspan="2" style="background:#333; color:#fff;">Modalit&agrave; Pagamento</th>
  </tr>
 <tr>
   <td><b>'.$pagamento.'</b></td>
   <td></td>
 </tr>
  </table>';



$corpo_mail .=' <table style="width:100%; ">
	<thead>
	<tr>
		<th style="background:#333; color:#fff;">Descrizione</th>
		<th style="background:#333; color:#fff;">Quantit&agrave;</th>
                <th align="center" style="background:#333; color:#fff;">Prezzo Unitario</th>
            <th align="center" style="background:#333; color:#fff;">Prezzo Totale</th>
      </tr>
	</thead>
	<tbody>';
	
           $chiave=count($_SESSION[cestino]);
				$totale=0;
				for($i=0; $i<$chiave; $i++){
					$importo =  $_SESSION[cestino][$i][quantita]*$_SESSION[cestino][$i][prezzo];
			
			$corpo_mail .='
            <tr> 
              <td width="400">'. $_SESSION[cestino][$i][descrizione] .'
              </td>
              <td width="80" align="center">'.   $_SESSION[cestino][$i][quantita] .'</td>
              <td width="80">'. number_format($_SESSION[cestino][$i][prezzo],2,',','.').'&nbsp;&euro;</td>
              <td width="80" align="center">'. number_format($importo,2,',','.') .'&nbsp;&euro;</td>
              ';
			   $totale +=@$importo;
			   
			  }			
	   
		  
		   $corpo_mail.= '<tr>
		      <td colspan="3" align="right"><p style="width:100%; text-align:right; font-size:1.3em; font-weight:bold;">Totale*</p>(Escluse Spese di spedizione)</td>
		      <td align="center"><p style="font-size:1.3em; font-weight:bold;">'. number_format($totale,2,',','.').'&nbsp;&euro;</p></td>
		      </tr>
              
	</tbody>
			  
			
		  
          
</table><p>Lo Staff<br>
  Villa Cirimarco</p>';



/*$mail = new MyMailer(); 

$mail->Subject ="Notifica nuove Delibere";
$mail->Body = $corpo_mail;
//$mail->AddAttachment('/tmp/immagine.jpg', 'nome_file.jpg'); // Aggiungo allegato con un nome
$mail->IsHTML(true); // Formato HTML per il contenuto della mail.
//query 

	 //$mail->AddAddress($row_inv1->email);
	 $mail->AddAddress("giuseppe@icomadv.com");
	 $mail->AddAddress("gsanginet@icomadv.com");
	 if(!$mail->Send()){
		  //echo 'Errore durante invio della mail: '.$mail->ErrorInfo;
		 //echo 'Errore durante invio della mail, Ripova!';
		 echo "Errore durante invio della mail: <br>$row_inv1->email - $row_inv1->ragione <br>";
	 }else{
		  echo "qyu QUI QUI";
		  // messaggio inviato;
	 }
	 $mail->ClearAddresses();
	 $mail->ClearAttachments();


$mail->SmtpClose();
unset($mail);
//unset($_SESSION[abb]);
    	
echo "<span class='green'>notifiche inviate</span>";*/
require_once('PHPMailer/class.phpmailer.php');

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try {
  //$mail->Host       = "out.postassl.it"; // SMTP server

  $mail->Host       = "localhost";
  //$mail->SMTPDebug  = 3;                     // enables SMTP debug information (for testing)
  //$mail->SMTPAuth   = true;                  // enable SMTP authentication
  //$mail->SMTPSecure = "ssl";
  //$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
  $mail->Username   = ""; // SMTP account username
  $mail->Password   = "";        // SMTP account password
  //$mail->AddAddress('gsanginet@tiscali.it');
  $mail->AddAddress('ordini@villacirimarco.it');
  $mail->AddAddress($email);
  $mail->SetFrom('ordini@villacirimarco.it', 'Villa Cirimarco');
  //$mail->AddReplyTo('noreply@villacirimarco.it', 'Villa Cirimarco');
  $mail->AddReplyTo($email);	
  $mail->Subject = 'Riepilogo Richiesta Ordine: www.villacirimarco.it ';
  $mail->AltBody = 'Riepilogo Richiesta Ordine: www.villacirimarco.it'; // optional - MsgHTML will create an alternate automatically
  $mail->MsgHTML($corpo_mail);
  //$mail->AddAttachment('images/phpmailer.gif');      // attachment
  //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
  $mail->Send();
  echo "<p style='font-size:1.3 em; color:#1CA4EA;'>Grazie!<br>Richiesta inviata con successo, a breve sar&agrave; elaborata</p>\n";
  unset($_SESSION[cestino]); 

} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
?>
