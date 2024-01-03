<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" orientation="paysage" >
    <table style="width: 190mm;">
        <tr>
            <td style="width:40%;"><!--<img src="img/logo.png" />--></td>
            <td>&nbsp;</td>
            <td style="text-align: right;"><h3>Appuntamenti del <?php echo $giorno; ?> </h3></td>
        </tr>



    </table> 
    <table>
        <tr>
            <td></td>
            <?php
            for ($i = 0; $i < count($postazioni); $i++) {
                $postazione = $postazioni[$i];
                ?>
                <td><?php echo $postazione->postazione; ?></td>
            <?php } ?>
        </tr>


        <?php
        for ($k = 0; $k < count($orari); $k++) {
            //$postazionetmp = $postazioniArray[$i];
            //$appuntamentitmp = $appuntamenti[$i];
            ?>
            <tr><td><?php echo $orari[$k]; ?></td>

                <?php
                for ($i = 0; $i < count($postazioni); $i++) {
                    $postazione = $postazioni[$i];
                    ?>
                    <td>
                        <div style="font-size:9pt; line-height:20px;">
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
                                        $titoloTrattamento = $piano->titolo;
                                    }
                                }
                                if (isset($appuntamento->idCliente)) {
                                    $cliente = DAOFactory::getClientiDAO()->load($appuntamento->idCliente);
                                    if (isset($cliente->nome)) {
                                        $paziente = $cliente->nome . " ...";
                                    }
                                }
                                ?>
                                <table  style="width:190mm;">
                                    <tr>
                                        <td>&nbsp;</td>

                                    </tr>
                                    <tr>
                                        <td>Paziente      <?php echo $paziente; ?>        
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Piano di Cura      <?php echo $titoloTrattamento; ?>        
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Inizio:      <?php echo substr($appuntamento->oraInizio, 0, 5); ?>        
                                        </td>

                                    </tr>
                                    <tr><td style="border-bottom: 1px dotted #333; width: 100%">&nbsp;</td></tr>


                                </table>
                            <?php } else { ?>
                            <td>
                                <table  style="width:190mm;">
                                    
                                    <tr><td style="border-bottom: 1px dotted #333; width: 100%">&nbsp;</td></tr>


                                </table>
                                
                            </td>
                            <?php } ?>
                        </div>
                    </td>
                <?php } ?>
            </tr>



        <?php } ?>
    </table>
</page>