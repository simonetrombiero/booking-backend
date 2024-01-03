<?php
require_once ('vendors/autoload.php');
        require 'vendors/PHPMailer/src/PHPMailer.php';
        require 'vendors/PHPMailer/src/SMTP.php';
        require 'vendors/PHPMailer/src/Exception.php';

        use Spipu\Html2Pdf\Html2Pdf;
        use Spipu\Html2Pdf\Exception\Html2PdfException;
        use Spipu\Html2Pdf\Exception\ExceptionFormatter;
        
        
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        
function generaFidelityCard() {

    $idCliente = getRequest("idCliente");

    if (isBlankOrNull($idCliente)) {

        ob_clean();
        header("location: index.php?action=listaFidelityCard");
        exit;
    }

    //VERIFICA SE IL CLIENTE HA UNA SCEDA 
    $idCardTMP = DAOFactory::getFidelityClienteDAO()->queryByIdCliente($idCliente);


    if (count($idCardTMP) > 0) {
        // ALERT IL CLIENTE POSSIEDE UNA TESSERA
        ob_clean();
        header("location: index.php?action=listaFidelityCard");
        exit;
    } else {
        //GENERO LA TESSERA

        $tessereNotNull = DAOFactory::getFidelityCardDAO()->queryByCodiceInternoNotNull();
        $numeroTessere = count($tessereNotNull);

        $progressivoTessera = str_pad($numeroTessere + 1, 5, "0", STR_PAD_LEFT);

        $prefissoTessera = "8035453";

        $barcodeTessera = $prefissoTessera . $progressivoTessera;

        $cifraControlloEAN13 = generaCifraControlloEAN13($barcodeTessera);

        $barcodeTessera = $barcodeTessera . $cifraControlloEAN13;

        $fidelityCard = new FidelityCard();
        $fidelityCard->codiceInterno = $progressivoTessera;
        $fidelityCard->codiceBarre = $barcodeTessera;
        $fidelityCard->dataEmissione = date("Y-m-d");
        $fidelityCard->saldoPunti = 0;
        $fidelityCard->isSospesa = '0';

        $idFidelityCard = DAOFactory::getFidelityCardDAO()->insert($fidelityCard);

        $fidelity_cliente = new FidelityCliente();
        $fidelity_cliente->idCliente = $idCliente;
        $fidelity_cliente->idCard = $idFidelityCard;

        DAOFactory::getFidelityClienteDAO()->insert($fidelity_cliente);
    }

    $cliente = DAOFactory::getClientiDAO()->load($idCliente);

    if (!isBlankOrNull($cliente->email)) {
        
        $emailCliente = $cliente->email;
        $nomeCliente = $cliente->nome;
        $cognomeCliente = $cliente->cognome;

        




       
        $nominativo = $nomeCliente." ".$cognomeCliente;


        $codiceCardVirtuale = $barcodeTessera;

        include_once('vendors/cardTemplate.php');
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

        if (!isBlankOrNull($emailCliente)) {
        


            // phpinfo();
            $mail = new PHPMailer;


            $corpoMail = "<div style='background-color:#366c88; color:white;width:90%;padding:30px;padding-top:30px; font-size:18px;'>
					<img src='https://agenda.lecameliebeautycenter.it/img/logo.png'>
					</div>";
            $corpoMail .= "<div style='width:90%;padding:20px;padding-top:30px; font-size:18px;'>
					Ciao<b>  $nomeCliente, </b><br>in allegato la Tua <b>FIDELITY CARD</b>!<br />
					<br>
                                        &bull; Accumuli punti per ogni trattamento effettuato;<br>
                                        &bull; Ricevi vantaggi esclusivi solo per Te;<br>
                                        &bull; Aggiornamenti sulle nostre novit&agrave; e promozioni;<br><br>
                                        Lo STAFF 
                                        <br>Supporto e informazioni: card@vanitylab.it<br>
                                        www.lecameliebeautycenter.it
					</div> ";
//Tell PHPMailer to use SMTP
            $mail->isSMTP();
            $mail->isHTML(true);
            $mail->setLanguage('it', 'language/');
            $mail->CharSet="iso-8859-1";
                    
                    //            $mail->IsHTML(true); // Formato HTML per il contenuto della mail.
//            $mail->SetLanguage('it', 'language/');
//            $mail->CharSet = "iso-8859-1";

            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//$mail->Host = 'localhost';


            try {
                //$mail->Host       = "out.postassl.it"; // SMTP server

                $mail->Host = "localhost";
                //$mail->SMTPDebug  = 3;                     // enables SMTP debug information (for testing)
                //$mail->SMTPAuth   = true;                  // enable SMTP authentication
                //$mail->SMTPSecure = "ssl";
                //$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
                $mail->SMTPAuth = false;
                $mail->SMTPAutoTLS = false;
                $mail->Port = 25;


                $mail->Username = ""; // SMTP account username
                $mail->Password = "";        // SMTP account password
                $mail->AddAddress($emailCliente);
                //$mail->AddAddress('sanginet@hotmail.com');
                //$mail->AddAddress('giuseppe@icomadv.com');
                //$mail->AddAddress($email);
                $mail->SetFrom('noreply@promosi.eu', 'Vanity Lab');
                //$mail->AddReplyTo('noreply@villacirimarco.it', 'Villa Cirimarco');
                $mail->AddReplyTo('giuseppe@icomadv.com');
                $mail->Subject = 'Fidelity Card ';
                $mail->AltBody = 'Fidelity Card '; // optional - MsgHTML will create an alternate automatically
                $mail->MsgHTML($corpoMail);
                $mail->addStringAttachment($pdf, 'fidelityCard.pdf');
                //$mail->AddAttachment('images/phpmailer.gif');      // attachment
                //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
                $mail->Send();
                //echo "<p style='font-size:1.3 em; color:#1CA4EA;'>Grazie!<br>Richiesta inviata con successo, a breve sar&agrave; elaborata</p>\n";
                //unset($_SESSION[cestino]); 
            } catch (phpmailerException $e) {
                echo $e->errorMessage(); //Pretty error messages from PHPMailer
            } catch (Exception $e) {
                echo $e->getMessage(); //Boring error messages from anything else!
            }
        }



//
//        //require_once(dirname(__FILE__).'/inc/html2pdf/html2pdf.class.php');
//        require_once ('vendors/html2pdf/html2pdf.class.php');
//
//        ///include "PHPMailer/PHPMailerPersonale.php";
//        include_once ('vendors/PHPMailer/PHPMailerPersonale.php');
//
//
//        $mittente = "noreply@vanitlylab.it";
//
//        $oggetto = "CARD Armony Beauty Center";
//
//
//        $corpo_mail = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
//"http://www.w3.org/TR/html4/loose.dtd">
//<head>
//<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
//<style type="text/css">
//<!--
//.Stile1 {font-family: Tahoma; font-size:15px; color:#FF0000}
//.Stile4 {font-family: Tahoma; font-size:10px; color:#000000}
//
//-->
//</style>
//</head>
//<body bgcolor="#CCCCCC">
//<table border="0" cellpadding="0" cellspacing="0" bgcolor="ffffff">
//  <tr>
//    <td colspan="3" class="Stile1">&nbsp;</td>
//  </tr>
//  <tr>
//    <td class="Stile1">&nbsp;</td>
//    <td class="Stile1">
//      <p align="center"><font color="white" size="2" class="Stile1"><b><br>
//        CARD ilike.city</b></font><br>
//        <br>
//      </p>
//      <div align="center"><br>
//      </div></td><td class="Stile1">&nbsp;</td>
//  </tr>
//  <tr>
//    <td>&nbsp;</td>
//    <td><div align="center">
//      <table width="96%" class="Stile6">
//        <tr height="20">
//          <td height="20" class="Stile4">Gentile &nbsp;' . $nome . '&nbsp;' . $cognome . '</td>
//        </tr>
//        <tr height="20">
//          <td height="20">&nbsp;</td>
//        </tr>
//        <tr height="20">
//          <td height="20"><p class="Stile4">In allegato la Tua <b>CARD</b>!<br />
//    Utilizzala presso i nostri partner convenzionati, promozioni e vantaggi a te dedicati. <br />RICORDATI di mostrare la CARD prima di effettuare ogni acquisto, per ricevere così il Tuo CASHBACK. <br />
//          </p></td>
//        </tr>
//        <tr height="20">
//          <td height="20"><p class="Stile4">&nbsp;</p></td>
//        </tr>
//        <tr height="20">
//          <td height="20"><p class="Stile4"><br>
//            Cordiali Saluti,<br>
//            lo staff vanitylab
//            <br>
//            </p></td>
//        </tr>
//      </table>
//      <br>
//    </div></td>
//    <td>&nbsp;</td>
//  </tr>
//  <tr>
//    <td colspan="3">&nbsp;</td>
//  </tr>
//</table>
//</body>
//</html>';
//        ?>
<!--        <style type="text/css">
            
            div.zone { border: none; border-radius: 6mm; background: #FFFFFF; border-collapse: collapse; padding:3mm; font-size: 2.7mm;}
            h1 { padding: 0; margin: 0; color: #DD0000; font-size: 7mm; }
            h2 { padding: 0; margin: 0; color: #222222; font-size: 5mm; position: relative; }
            
        </style>
        <page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm">
            <div style="width:100%; margin:0 auto;">
                <h2 style="line-height:25px;">La Tua Card Virtuale "I LIKE CITY"</h2>
                <p style="line-height:20px;">Ciao <b>//<?= $nome_struttura; ?>,</b><br />questa è la tua <b>I LIKE CITY CARD</b>!<br />
                    Utilizzala presso i nostri partner convenzionati, promozioni e vantaggi a te dedicati. <br />RICORDATI di mostrare la CARD prima di effettuare ogni acquisto, per ricevere così il Tuo CASHBACK. </p>
                <p style="height:40mm;">&nbsp;</p>
                <div style="background: url(images/card/cardVanity.jpg) no-repeat center center fixed; margin:0 auto;">
                    <p style="position: absolute; top: 165mm; font-size: 4mm; padding-left:106mm; "><qrcode value="//<?= $codiceCardVirtuale; ?>" ec="Q" style="width: 19mm; border: none;"></qrcode></p>
                    <p style="position: absolute; padding-left: 46mm; top: 164mm; font-size: 4mm;"><barcode type="EAN13" value="//<?= $codiceCardVirtuale; ?>" style="color: #000; width:45mm; height:16mm" ></barcode></p>
                    <p style="height:130mm;">&nbsp;</p>
                    <p>Lo STAFF I LIKE CITY<br />
                        www.ilike.city <br />
                        Supporto e informazioni: card@ilike.city</p>
                </div>
            </div>
        </page>-->
        //<?php
//        $content = ob_get_clean();
//
//
//
//
//
//        try {
//
//            $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', 0);
//            $html2pdf->pdf->SetDisplayMode('fullpage');
//            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
//            //$html2pdf->Output('ticket.pdf');
//            $content_PDF = $html2pdf->Output('laMiaCard.pdf', 'S');
//
//
//            $mail = new MyMailer(); //istanziamo la classe
//            $mail->Body = $corpo_mail;
//            $mail->IsHTML(true); // Formato HTML per il contenuto della mail.
//            $mail->SetLanguage('it', 'language/');
//            $mail->CharSet = "iso-8859-1";
//
//            $mail->AddAddress("$email"); // destinatario
////$mail->AddBCC("info@ilike.city");
//            $mail->AddBCC("giuseppe@icomadv.com");
//
//            $mail->Subject = "Card ilike.city";
//
////$mail->AddAttachment('/tmp/immagine.jpg', 'nome_file.jpg'); // Aggiungo allegato con un nome
//            $mail->IsHTML(true); // Formato HTML per il contenuto della mail.
//
//            $mail->addStringAttachment($content_PDF, 'laMiaCard.pdf', 'base64', 'application/pdf'); // Aggiungo allegato con un nome
//            $mail = new MyMailer();
//
//
//
//
//            if (!$mail->Send()) {
//                // echo 'Errore durante invio della mail: '.$mail->ErrorInfo;
//                echo 'Errore durante invio della mail, Riprova!';
//            } else {
//
//                echo "mail inviata";
//                /* echo '<script language="javaScript"> 
//                  alert ("Complimenti !!!\nLa registrazione non e\' terminata\na breve riceverai una e-mail per attivare il tuo account");
//                  document.location.href="index.php";
//                  </script>'; */
//            }
//            $mail->SmtpClose();
//            unset($mail);
//        } catch (HTML2PDF_exception $e) {
//            echo $e;
//            // exit;
//        }
//    } else {
//        echo 'else';
//    }
    }

    ob_clean();
    header("location: index.php?action=listaFidelityCard");
    exit;
}

function caricaListaFidelityCard() {
    global $listaFidelityCard;
    $listaFidelityCard = DAOFactory::getFidelityCardDAO()->queryAll();
}

function caricaFidelityCardCliente() {
    global $card, $cliente;
    
    $idCliente = getRequest("idCliente");

    $cliente = DAOFactory::getClientiDAO()->load($idCliente);

    $card_cliente = DAOFactory::getFidelityClienteDAO()->queryByIdCliente($idCliente);
    $idCard = $card_cliente[0]->idCard;

    $card = DAOFactory::getFidelityCardDAO()->load($idCard);
}


function caricaFidelityCardClienteCassa() {
    global $cliente;
    
    $idCliente = getRequest("idCliente");

    $cliente = DAOFactory::getClientiDAO()->load($idCliente);

    $card_cliente = DAOFactory::getFidelityClienteDAO()->queryByIdCliente($idCliente);
    $idCard = $card_cliente[0]->idCard;

    $card = DAOFactory::getFidelityCardDAO()->load($idCard);

    echo json_encode($card);
}
