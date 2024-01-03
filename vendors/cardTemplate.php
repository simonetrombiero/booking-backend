<style type="text/css">
<!--
    div.zone { border: none; border-radius: 6mm; background: #FFFFFF; border-collapse: collapse; padding:3mm; font-size: 2.7mm;}
    h1 { padding: 0; margin: 0; color: #DD0000; font-size: 7mm; }
    h2 { padding: 0; margin: 0; color: #222222; font-size: 5mm; position: relative; }
-->
</style>
<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm">
<div style="width:100%; margin:0 auto;">
	<h2 style="line-height:25px;">La Tua Card Virtuale "LE CAMELIE BEAUTY CENTER"</h2>
    <p style="line-height:20px;">Ciao <b><?php echo $nominativo;?>,</b><br />questa è la tua <b>FIDELITY CARD</b>!<br />
    Utilizzala presso il nostro centro, promozioni e vantaggi a te dedicati. <br />RICORDATI di mostrare la CARD prima di effettuare ogni acquisto, per accumulare i punti. </p>
    <p style="height:40mm;">&nbsp;</p>
    <div style="background: url(images/card/cardLeCamelie.png) no-repeat center center fixed; margin:0 auto;">
    	<p style="position: absolute; top: 154mm; font-size: 4mm; padding-left:96mm; "><qrcode value="<?php echo $codiceCardVirtuale;?>" ec="Q" style="width: 19mm; border: none;"></qrcode></p>
        <p style="position: absolute; padding-left: 40mm; top: 154mm; font-size: 4mm;"><barcode type="EAN13" value="<?php echo $codiceCardVirtuale;?>" style="color: #000; width:45mm; height:16mm" ></barcode></p>
    <p style="height:130mm;">&nbsp;</p>
        <p>Lo STAFF LE CAMELIE BEAUTY CENTER<br />
        www.lecameliebeautycenter.it <br />
        Supporto e informazioni: card@vanitylab.it</p>
    </div>
</div>
</page>