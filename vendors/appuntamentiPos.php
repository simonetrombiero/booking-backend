<?php
for ($i = 0; $i < count($postazioniArray); $i++) {
    $postazionetmp = $postazioniArray[$i];
    $appuntamentitmp = $appuntamenti[$i];
    ?>
    <page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm">
        <table style="width: 190mm;">
            <tr>
                <td style="width:40%;"><!--<img src="img/logo.png" />--></td>
                <td>&nbsp;</td>
                <td style="text-align: right;"><h3>Appuntamenti del <?php echo date("d-m-Y"); ?> </h3></td>
            </tr>
            <tr>
                <td style="width:40%;">&nbsp;</td>
                <td>&nbsp;</td>
                <td>Postazione: <?php echo $postazionetmp->postazione; ?></td>

            </tr>


        </table>

        <div style="font-size:9pt; line-height:20px;">
            <?php
            for ($k = 0; $k < count($appuntamentitmp); $k++) {
                $appuntamento = $appuntamentitmp[$k];
                // print_r($appuntamenti);
                
                $titoloTrattamento = '';
                $paziente = '';
                if (isset($appuntamento->idPiano)) {
                    $piano = DAOFactory::getPianoTrattamentoDAO()->load($appuntamento->idPiano);
                    if (isset($piano->titolo)) {
                        $titoloTrattamento = $piano->titolo;
                    }
                }
                if (isset($appuntamento->idCliente)) {
                    $cliente = DAOFactory::getClientiDAO()->load($appuntamento->idCliente);
                    if (isset($cliente->nome)) {
                        $paziente = $cliente->nome." ".$cliente->cognome;
                    }
                }
                $trattamento_postazione = DAOFactory::getPrenotazioniDettaglioDAO()->queryPrenotazioniDettaglioByPrenotazionePostazione($appuntamento->id,  $postazionetmp->id);
                //trattamento
                $trattamento='';
                //operatore
                $operatoreint='';
                for($h=0; $h<count($trattamento_postazione);$h++){
                    $tratt_post = $trattamento_postazione[$h];
                    
                   // $tratt = DAOFactory::getTrattamentiDAO()->load($tratt_post->idTrattamento);
                    $trattamento .="<b>".$tratt_post->trattamento."</b><br>";
                    
                    $post = DAOFactory::getDipendenteDAO()->load($tratt_post->idOperatore);
                    $trattamento .= "(".$post->nome." ".$post->cognome.")<br>";
                }
                ?>
                <table  style="width:190mm;">
                    <tr>
                        <td>&nbsp;</td>

                    </tr>
                    <tr>
                        <td>Paziente:&nbsp;<b><?php echo $paziente; ?></b>        
                        </td>

                    </tr>
                    <tr>
                        <td>Piano di Cura:&nbsp;<?php echo $titoloTrattamento; ?>        
                        </td>

                    </tr>
                    <tr>
                        <td>Inizio:&nbsp;<b><?php echo substr($appuntamento->oraInizio, 0, 5); ?></b>        
                        </td>

                    </tr>
                    <tr><td><?php echo $trattamento; ?></td></tr>
                    <tr><td style="border-bottom: 1px dotted #333; width: 100%">&nbsp;</td></tr>


                </table>
            <?php } ?>
        </div>

      
    </page>

<?php } ?>