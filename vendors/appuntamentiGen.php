
<page backtop="8mm" backbottom="8mm" backleft="10mm" backright="10mm" orientation="paysage" >
    <table style="width: 290mm;">
        <tr>
            <td style="width:40%;"><!--<img src="img/logo.png" />--></td>
            <td>&nbsp;</td>
            <td style="text-align: right;"><h3>Appuntamenti del <?php echo dateFromDb($giorno); ?> </h3></td>
        </tr>



    </table> 
    <table>
        <tr>
            <td></td>
            <?php
            for ($xv = 0; $xv < count($postazioni); $xv++) {
                $postazione = $postazioni[$xv];
                ?>
                <td style="text-align: center;"><b><?php echo $postazione->postazione; ?></b></td>
            <?php } ?>
        </tr>


        <?php
        for ($k = 0; $k < count($orari); $k++) {
            //$postazionetmp = $postazioniArray[$i];
            //$appuntamentitmp = $appuntamenti[$i];
            ?>
            <tr><td style="border: red 1px solid;"><?php echo $orari[$k]; ?></td>

                <?php
                for ($xc = 0; $xc < count($postazioni); $xc++) {
                    $postazione = $postazioni[$xc];
                    //echo
                    ?>
                    <td style="border: red 1px solid; width: 40mm; height: 35mm; vertical-align:top;">
                        <div style="font-size:7pt; line-height:13px;">
                            <?php
                            $tmp = DAOFactory::getPrenotazioniDAO()->queryPrenotazioniGiornoPostazioneOraInizio($giorno, $postazione->id, $orari[$k], $orariFine[$k]);

                            if (count($tmp) > 0) {
                                //for ($k = 0; $k < count($appuntamentitmp); $k++) {
                                $appuntamento = $tmp[0];
                                // print_r($appuntamenti);

                                $titoloTrattamento = '';
                                $paziente = '';
                                if (isset($appuntamento->idPiano)) {
                                    $piano = DAOFactory::getPianoTrattamentoDAO()->load($appuntamento->idPiano);
                                    if (isset($piano->titolo)) {
                                       $titoloTrattamento =  troncaStringa($piano->titolo,30);
                                    }
                                }
                                if (isset($appuntamento->idCliente)) {
                                    $cliente = DAOFactory::getClientiDAO()->load($appuntamento->idCliente);
                                    if (isset($cliente->nome)) {
                                        $paziente = $cliente->nome . " " . $cliente->cognome;
                                    }
                                }
                                $trattamento_postazione = DAOFactory::getPrenotazioniDettaglioDAO()->queryPrenotazioniDettaglioByPrenotazionePostazione($appuntamento->id, $postazione->id);
                                //trattamento
                                $trattamento = '';
                                //operatore
                                $operatoreint = '';
                                for ($h = 0; $h < count($trattamento_postazione); $h++) {
                                    $tratt_post = $trattamento_postazione[$h];

                                    // $tratt = DAOFactory::getTrattamentiDAO()->load($tratt_post->idTrattamento);
                                    $trattamento .= troncaStringa($tratt_post->trattamento, 25) . "<br>";

                                    $post = DAOFactory::getDipendenteDAO()->load($tratt_post->idOperatore);
                                    $trattamento .= "(" . $post->nome . " " . $post->cognome . ")<br>";
                                }
                                ?>
                                <table  style="max-width:40mm;">
                                    <!--<tr><td>&nbsp;</td></tr>-->
                                    <tr><td style="font-weight: bold;"><?php echo $paziente; ?></td></tr>
                                    <tr><td><?php echo $titoloTrattamento; ?></td></tr>
                                    <tr><td style="font-weight: bold;">Inizio:<?php echo substr($appuntamento->oraInizio, 0, 5); ?></td></tr>
                                    <tr><td><?php echo $trattamento; ?></td></tr>
                                </table>
                            <?php } else { ?>

            <!--                                <table  style="width:43mm;">
                                                <tr><td style="border-bottom: 1px dotted #333; width: 100%">1.&nbsp;</td></tr>
                                                <tr><td style="border-bottom: 1px dotted #333; width: 100%">2.&nbsp;</td></tr>
                                                <tr><td style="border-bottom: 1px dotted #333; width: 100%">3&nbsp;</td></tr>
                                                <tr><td style="border-bottom: 1px dotted #333; width: 100%">4.&nbsp;</td></tr>
                                                <tr><td style="border-bottom: 1px dotted #333; width: 100%">5.&nbsp;</td></tr>
                                            </table>-->

                            <?php } ?>
                        </div>
                    </td>
                <?php } //fine for postazioni  ?>
            </tr>



        <?php } // fine for orari  ?>
    </table>
</page>