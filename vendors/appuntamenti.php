<?php
for ($i = 0; $i < count($operatoriArray); $i++) {
    $operatoretmp = $operatoriArray[$i];
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
                <td>Operatore: <?php echo $operatoretmp->nome . " " . $operatoretmp->cognome; ?></td>

            </tr>


        </table>

        <div style="font-size:9pt; line-height:20px;">
            <?php
            for ($k = 0; $k < count($appuntamentitmp); $k++) {
                $appuntamento = $appuntamentitmp[$k];
                // print_r($appuntamenti);
                //Array ( [0] => Prenotazioni Object ( [id] => 329 [idPiano] => 32 [idCliente] => 2 [data] => 2022-12-14 [oraInizio] => 17:00:00 [oraFine]=> 18:00:00 [note] => [status] => 0 [noShow] => 0 ) )
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
                        $paziente = $cliente->nome . " " . $cliente->cognome;
                    }
                }
                $trattamento_postazione = DAOFactory::getPrenotazioniDettaglioDAO()->queryPrenotazioniDettaglioByPrenotazioneOperatore($appuntamento->id, $operatoretmp->id);
                //trattamento
                $trattamento='';
                //postazione
                $postazione='';
                for($h=0; $h<count($trattamento_postazione);$h++){
                    $tratt_post = $trattamento_postazione[$h];
                    //print_r($tratt_post);
                    //echo 'qui'.$tratt_post->idTrattamento;
                    //$tratt = DAOFactory::getTrattamentiDAO()->load($tratt_post->idTrattamento);
                    $trattamento .=$tratt_post->trattamento."; ";
                    
                    $post = DAOFactory::getPostazioniDAO()->load($tratt_post->idPostazione);
                    $postazione .= $post->postazione."; ";
                }
                ?>
                <table  style="width:190mm;">
                    <tr>
                        <td>&nbsp;</td>

                    </tr>
                    <tr>
                        <td>Paziente:&nbsp;<b><?php echo $paziente; ?></b></td>

                    </tr>
                    <tr>
                        <td>Piano di Cura:&nbsp;<?php echo $titoloTrattamento; ?></td>

                    </tr>
                    <tr>
                        <td>Inizio:&nbsp;<b><?php echo substr($appuntamento->oraInizio, 0, 5); ?></b></td>

                    </tr>
                    <tr><td>Trattamento:&nbsp;<b><?php echo $trattamento; ?></b></td></tr>
                    <tr><td>Postazione:&nbsp;<b><?php echo $postazione; ?></b></td></tr>
                    <tr><td style="border-bottom: 1px dotted #333; width: 100%">&nbsp;</td></tr>


                </table>
            <?php } ?>
        </div>


    </page>

<?php } ?>