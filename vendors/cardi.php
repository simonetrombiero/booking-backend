
        <?php
$chao='qui ni  mfadfds';
$f=4*4;

require_once ('autoload.php');
		  require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
        require 'PHPMailer/src/Exception.php';
		
		 use Spipu\Html2Pdf\Html2Pdf;
		 use Spipu\Html2Pdf\Exception\Html2PdfException;
		 use Spipu\Html2Pdf\Exception\ExceptionFormatter;
		 
		 
		
			 use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
		
		$emailCliente="fdafadzfdfssgsg";

		 $nominativo = "ciccio";
		 
		 
		 $codiceCardVirtuale="8035453000026";
		 
        include_once('cardTemplate.php');
        $content = ob_get_clean();

        //require_once ('vendors/autoload.php');

        try {
            $html2pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'it', true, 'UTF-8', 0);
            $html2pdf->pdf->SetDisplayMode('fullpage');
            //$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->writeHTML($content);

            //$html2pdf->Output('appuntamento.pdf','D');
            $pdf = $html2pdf->Output('', 'S');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }

        //if (!isBlankOrNull($emailCliente)) {
			if ($emailCliente) {
			
        
       // phpinfo();
        $mail = new PHPMailer;


    $corpoMail = "<p> Pagamenti: </p>";
    $corpoMail .= "</div> </div> 
        
					<div style='background-color:black; color:white;width:90%;padding:50px;padding-top:30px; font-size:18px;'>
					Caro  ti consigliamo di chiamare il prima possibile il cliente al numero indicato e confermare la prenotazione. <br>
					Grazie mille <br>
					ciaooo
					</div> ";
//Tell PHPMailer to use SMTP
$mail->isSMTP();

$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//$mail->Host = 'localhost';


try {
  //$mail->Host       = "out.postassl.it"; // SMTP server

  $mail->Host       = "localhost";
  //$mail->SMTPDebug  = 3;                     // enables SMTP debug information (for testing)
  //$mail->SMTPAuth   = true;                  // enable SMTP authentication
  //$mail->SMTPSecure = "ssl";
  //$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
  $mail->SMTPAuth = false;
$mail->SMTPAutoTLS = false; 
$mail->Port = 25; 


  $mail->Username   = ""; // SMTP account username
  $mail->Password   = "";        // SMTP account password
  $mail->AddAddress('gsanginet@tiscali.it');
  $mail->AddAddress('sanginet@hotmail.com');
  $mail->AddAddress('giuseppe@icomadv.com');
  //$mail->AddAddress($email);
  $mail->SetFrom('ordini@vanitylab.it', 'Villa Cirimarco');
  //$mail->AddReplyTo('noreply@villacirimarco.it', 'Villa Cirimarco');
  $mail->AddReplyTo('sanginet@hotmail.com');	
  $mail->Subject = 'Riepilogo Richiesta Ordine: www.villacirimarco.it ';
  $mail->AltBody = 'Riepilogo Richiesta Ordine: www.villacirimarco.it'; // optional - MsgHTML will create an alternate automatically
  $mail->MsgHTML($corpoMail);
  $mail->addStringAttachment($pdf, 'fidelityCard.pdf');
  //$mail->AddAttachment('images/phpmailer.gif');      // attachment
  //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
  $mail->Send();
  echo "<p style='font-size:1.3 em; color:#1CA4EA;'>Grazie!<br>Richiesta inviata con successo, a breve sar&agrave; elaborata</p>\n";
  //unset($_SESSION[cestino]); 

} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
	}		
			

            
	?>