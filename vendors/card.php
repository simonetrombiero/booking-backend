
        <?php

         require_once ('autoload.php');

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
		 
		 
		 
		 $nominativo = "ciccio";
		 
		 
		 $codiceCardVirtuale="8035453000026";
		 
        ?>




<style type="text/css">
<!--
    div.zone { border: none; border-radius: 6mm; background: #FFFFFF; border-collapse: collapse; padding:3mm; font-size: 2.7mm;}
    h1 { padding: 0; margin: 0; color: #DD0000; font-size: 7mm; }
    h2 { padding: 0; margin: 0; color: #222222; font-size: 5mm; position: relative; }
-->
</style>
<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm">
<div style="width:100%; margin:0 auto;">
	<h2 style="line-height:25px;">La Tua Card Virtuale "ARMONY BEAUTY CENTER"</h2>
    <p style="line-height:20px;">Ciao <b><?php echo $nominativo;?>,</b><br />questa è la tua <b>FIDELITY CARD</b>!<br />
    Utilizzala presso il nostro centro, promozioni e vantaggi a te dedicati. <br />RICORDATI di mostrare la CARD prima di effettuare ogni acquisto, per accumulare i punti. </p>
    <p style="height:40mm;">&nbsp;</p>
    <div style="background: url(../images/card/cardVanity.jpg) no-repeat center center fixed; margin:0 auto;">
    	<p style="position: absolute; top: 154mm; font-size: 4mm; padding-left:96mm; "><qrcode value="<?php echo $codiceCardVirtuale;?>" ec="Q" style="width: 19mm; border: none;"></qrcode></p>
        <p style="position: absolute; padding-left: 40mm; top: 154mm; font-size: 4mm;"><barcode type="EAN13" value="<?php echo $codiceCardVirtuale;?>" style="color: #000; width:45mm; height:16mm" ></barcode></p>
    <p style="height:130mm;">&nbsp;</p>
        <p>Lo STAFF AROMINY BEAUTY CENTER<br />
        www.armonybeautycenter.vanitylab.it <br />
        Supporto e informazioni: card@vanitylab.it</p>
    </div>
</div>
</page>



<?php
     $content = ob_get_clean();
	 
	 
	 //content = ob_get_clean();
 try
    {
    $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 0);
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->output('ticket.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
	 
/*


 try
    {
     
     $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', 0);
     $html2pdf->pdf->SetDisplayMode('fullpage');
        //$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->writeHTML($content);
        //$html2pdf->Output('ticket.pdf');
		$content_PDF = $html2pdf->Output('laMiaCard.pdf', 'S');  

	
				



	}
    catch(HTML2PDF_exception $e) {
        echo $e;
       // exit;
    }	
    
	*/
	?>