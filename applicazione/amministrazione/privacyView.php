<?php

global $privacy, $cliente;

$idAzienda = 1;

$aziendaTmp = DAOFactory::getAziendaDAO()->load($idAzienda);
$citta = "";
$prov = "";
if (isset($aziendaTmp)) {
    if (!isBlankOrNull($aziendaTmp->idCitta)) {

        $cittaTMP = DAOFactory::getComuniDAO()->load($aziendaTmp->idCitta);
    }
    $citta = $cittaTMP->comune;
    $provTMP = DAOFactory::getProvinceDAO()->load($cittaTMP->idProvincia);
    $prov = $provTMP->sigla;
}
?>

<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<link href="../../_firma/jqueryUI/css/jquery.signature.css" rel="stylesheet">
<style>
    .kbw-signature { width: 400px; height: 200px; }
</style>
<!--[if IE]>
<script src="excanvas.js"></script>
<![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="../../_firma/jqueryUI/js/jquery.signature.js"></script>



<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->

            <form action="index.php" method="post" id="formAnamnesi" name="formAnamnesi">
                <input type="hidden" name="action" value="salvaConsensoPrivacy"/>
                <input type="hidden" name="idCliente" value="<?php
                if (isset($cliente)) {
                    echo $cliente->id;
                }
                ?>"/>

                <div>
                    <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                        <h2 style="float: left; padding: 0px 15px; color: #366c88;">Consenso Trattamento Dati Personali</h2>
                        <div style=" text-align: right; padding: 10px 15px;">
                            <a href="index.php?action=clientiList" class="btn btn-green" >Lista Clienti</a>
                        </div>
                    </div></div>
                <div>




                    <table border="0" cellspacing="0" cellpadding="0" style="width: 100%">

                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">Con riferimento all'informativa sulle modalità e finalità di trattamento dei propri dati personali  ricevuta - in conformità all'art. 13 del D.lgs. 196/2003 e all'art.13 del Regolamento UE 206/679 ("GDPR") - da. "<?php echo $aziendaTmp->ragioneSociale; ?>" con sede in <?php echo $citta . "&nbsp;(" . $prov . ")"; ?>&nbsp;<?php echo $aziendaTmp->indirizzo; ?>, quale Titolare del trattamento dei dati personali, <?php
                                if ($cliente->sesso == 'M') {
                                    echo 'il sottoscritto sig. ';
                                } else {
                                    echo 'la sottoscritta sig.ra ';
                                } echo $cliente->nome . ' ' . $cliente->cognome;
                                if (isset($cliente->cFiscale)) {
                                    echo ', Codice Fiscale: ' . strtoupper($cliente->cFiscale) . ",";
                                }
                                ?> </td>
                        </tr>

                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><?php if($privacy->trattamento=='s'){                                    echo 'Fornisce il Consenso';}else{    echo 'Nega il Consenso';} ?>
                                
                            </td>
                            <td>al trattamento dei propri dati per le finalità e con le modalità indicate nell'informativa </td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Data: <?php echo dateFromDb($privacy->dataCompilazione); ?></td>
                            <td style="text-align: left"><img src="<?php echo $privacy->firmaTrattamento; ?>">
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
                            <td><?php if($privacy->trattamento=='s'){                                    echo 'Fornisce il Consenso';}else{    echo 'Nega il Consenso';} ?>
                            </td>
                            <td>alla comunicazione dei propri dati e foto a partner commerciali;</td>
                        </tr>
                        <tr><td colspan="2">&nbsp;</td></tr>
                        <tr>
                            <td>Data: <?php echo dateFromDb($privacy->dataCompilazione); ?></td>
                            <td style="text-align: left"><img src="<?php echo $privacy->firmaComunicazione; ?>">
                        </tr>   
                        <tr>
                            <td>&nbsp;</td>
                            <td style="border-bottom: 1px dotted #999;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><?php if($privacy->trattamento=='s'){                                    echo 'Desidero';}else{    echo 'Non desidero';} ?>
                                
                            </td>
                            <td>entrare nel club esclusivo de "<?php echo $aziendaTmp->ragioneSociale; ?>" per essere <?php
                                if ($cliente->sesso == 'M') {
                                    echo 'informato';
                                } else {
                                    echo 'informata';
                                }
                                ?>; su promozioni, eventi, sconti, consulenza.</td>
                        </tr>
                        <tr><td colspan="2">&nbsp;</td></tr>
                        <tr>
                            <td>Data: <?php echo dateFromDb($privacy->dataCompilazione); ?></td>
                            <td style="text-align: left"><img src="<?php echo $privacy->firmaFidelity; ?>">
                        </tr>   
                        <tr>
                            <td>&nbsp;</td>
                            <td style="border-bottom: 1px dotted #999;">&nbsp;</td>
                        </tr>


                    </table>

                </div>    
                <div style="display: none">
                    <textarea id="firma1" name="firma1" readonly=""></textarea>
                    <textarea id="firma2" name="firma2" readonly=""></textarea>
                    <textarea id="firma3" name="firma3" readonly=""></textarea>
                </div>
            </form>




        </div>
    </div>
    <div style="clear:left;">&nbsp;</div>



    <script>
        $(function () {
            var sig = $('#sig').signature();
            var sig2 = $('#sig2').signature();
            var sig3 = $('#sig3').signature();

            $('#disable').click(function () {
                var disable = $(this).text() === 'Disable';
                $(this).text(disable ? 'Enable' : 'Disable');
                sig.signature(disable ? 'disable' : 'enable');
            });
            $('#clearSig').click(function () {
                sig.signature('clear');
                //alert("ciao");
                return;
            });
            $('#clearSig2').click(function () {
                sig2.signature('clear');

            });
            $('#clearSig3').click(function () {
                sig3.signature('clear');

            });

            $('#json').click(function () {
                alert(sig.signature('toJSON'));
            });
            $('#svg').click(function () {
                alert(sig.signature('toSVG'));
            });

            $('#sig').signature({syncField: '#firma1'});
            $('#sig').signature('option', 'syncFormat', 'JPEG');

            $('#sig2').signature({syncField: '#firma2'});
            $('#sig2').signature('option', 'syncFormat', 'JPEG');

            $('#sig3').signature({syncField: '#firma3'});
            $('#sig3').signature('option', 'syncFormat', 'JPEG');
        });
    </script>

