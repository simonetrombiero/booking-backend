<?php
//global $privacy;
?>
<!--<script src="../../../applicazione/js/sign.js"></script>-->
<div style="width: 100%; height: 60px; background-color: #F6F6F6;">
    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
        Consensi
    </h2>

</div>

<div style="clear:left;">&nbsp;</div>
<div class="grid grid-pad">
    <div class="col-1-1">
        <!--INIZIO--->


        <table border="0" cellspacing="0" cellpadding="0" style="width: 100%">
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; font-weight: bold;">DICHIARA</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <input type="radio"> di essere<br> 
                    <input type="radio"> di non essere
                </td>
                <td>portatore di pace-maker o di altri dispositivi elettronici impiantati; </td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom: 1px dotted #999;">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <input type="radio"> di aver<br> 
                    <input type="radio"> di non aver
                </td>
                <td>malattie cardiache; </td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom: 1px dotted #999;">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <input type="radio"> di essere<br> 
                    <input type="radio"> di non essere
                </td>
                <td>in gravidanza; </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="border: 1px dotted #999;"></td>
            </tr>
            <tr>
                <td>
                    <input type="radio"> di essere<br> 
                    <input type="radio"> di non essere
                </td>
                <td>epilettico; </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="border: 1px dotted #999;"></td>
            </tr>
            <tr>
                <td>
                    <input type="radio"> di avere<br> 
                    <input type="radio"> di non avere
                </td>
                <td>alterazioni dei nervi periferici; </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="border: 1px dotted #999;"></td>
            </tr>
            <tr>
                <td>
                    <input type="radio"> di avere<br> 
                    <input type="radio"> di non avere
                </td>
                <td>problemi al sistema nervoso; </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="border: 1px dotted #999;"></td>
            </tr>
            <tr>
                <td>
                    <input type="radio"> di avere<br> 
                    <input type="radio"> di non avere
                </td>
                <td>protesi e sintesi metalliche; </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="border: 1px dotted #999;"></td>
            </tr>
            <tr>
                <td>
                    <input type="radio"> di avere<br> 
                    <input type="radio"> di non avere
                </td>
                <td>danni alla pelle; </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="border: 1px dotted #999;"></td>
            </tr>
            <tr>
                <td>
                    <input type="radio"> di avere<br> 
                    <input type="radio"> di non avere
                </td>
                <td>neoplasia; </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="border: 1px dotted #999;"></td>
            </tr>
            <tr>
                <td>
                    <input type="radio"> di avere<br> 
                    <input type="radio"> di non avere
                </td>
                <td>focolai tumorali; </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="border: 1px dotted #999;"></td>
            </tr>
            <tr>
                <td>
                    <input type="radio"> di avere<br> 
                    <input type="radio"> di non avere
                </td>
                <td>impianti acustici; </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="border: 1px dotted #999;"></td>
            </tr>
            <tr>
                <td>
                    <input type="radio"> di assumere<br> 
                    <input type="radio"> di non assumere
                </td>
                <td>farmaci che aumentano la sensibilità della pelle; </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="border: 1px dotted #999;"></td>
            </tr>
            <tr>
                <td>
                    <input type="radio"> di godere<br> 
                    <input type="radio"> di non godere
                </td>
                <td>di buona salute. </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="border: 1px dotted #999;"></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">Con riferimento all'informativa sulle modalità e finalità di trattamento dei propri dati personali  ricevuta - in conformità all'art. 13 del D.lgs. 196/2003 e all'art.13 del Regolamento UE 206/679 ("GDPR") - dal centro estetico "Le Camelie Beauty Center" con sede in Cirella di Diamante (CS) Via V. Veneto 142, quale Titolare del trattamento dei dati personali, <?php
                    if ($cliente->sesso == 'M') {
                        echo 'il sottoscritto sig. ';
                    } else {
                        echo 'la sottoscritta sig.ra ';
                    } echo $cliente->nome . ' ' . $cliente->cognome;
                    ?> </td>
            </tr>

            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="trattamentoDati" value="s"> Fornisce il Consenso<br> 
                    <input type="radio" name="trattamentoDati" value="n"> Nega il Consenso 
                </td>
                <td>al trattamento dei propri dati per le finalità e con le modalità indicate nell'informativa </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td>Data: <?php echo date("d/m/Y"); ?></td>
                <td style="text-align: left">

                    <div id="sig"></div>
                    <!--<div id="sig2"></div>-->
                    <p style="clear: both;">
                        <!--<button id="disable">Disable</button>--> 
                        <!--<button id="clear">Annulla</button>--> 
                        <!--<button id="json">To JSON</button>-->
                        <!--<button id="svg">To SVG</button>-->
                        <a href="#" id="clearSig" class="btn btn-grigio">Annulla Firma</a>
                    </p>
                </td>
            </tr>   
            <tr>
                <td>&nbsp;</td>
                <td style="border-bottom: 1px dotted #999;">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="consensoComunicazione" value="s"> Fornisce il Consenso <br> 
                    <input type="radio" name="consensoComunicazione" value="n"> Nega il Consenso 
                </td>
                <td>alla comunicazione dei propri dati e foto a partener commerciali;</td>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
                <td>Data: <?php echo date("d/m/Y"); ?></td>
                <td style="text-align: left">

                    <div id="sig2"></div>
                    <p style="clear: both;">

                        <!--<button id="clear">Annulla</button>--> 
                        <a href="#" id="clearSig2" class="btn btn-grigio">Annulla Firma</a>

                    </p>
                </td>
            </tr>   
            <tr>
                <td>&nbsp;</td>
                <td style="border-bottom: 1px dotted #999;">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="consensoFidelity" value="s"> Desidero <br> 
                    <input type="radio" name="consensoFidelity" value="n"> Non desidero 
                </td>
                <td>entrare nel club esclusivo de "LE CAMELIE BEAUTY CENTER" per essere <?php
                    if ($cliente->sesso == 'M') {
                        echo 'informato ';
                    } else {
                        echo 'informata ';
                    }
                    ?>; su promozioni, eventi, sconti, consulenza.</td>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
                <td>Data: <?php echo date("d/m/Y"); ?></td>
                <td style="text-align: left">

                    <div id="sig3"></div>
                    <p style="clear: both;">

<!--                        <button id="clear">Annulla</button> -->
                        <a href="#" id="clearSig3" class="btn btn-grigio">Annulla Firma</a>

                    </p>
                </td>
            </tr>   
            <tr>
                <td>&nbsp;</td>
                <td style="border-bottom: 1px dotted #999;">&nbsp;</td>
            </tr>


        </table>





    </div>
</div>
<div style="clear:left;">&nbsp;</div>


