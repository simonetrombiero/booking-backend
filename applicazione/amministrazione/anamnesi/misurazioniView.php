<?php
global $misurazioneHead, $misurazioni, $cliente;
?>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">
<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js"></script>-->

<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->
            <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                    Dati Cliente
                </h2>
                <div style=" text-align: right; padding: 10px 15px;">



                </div>

            </div>
            <table>
                <tr>
                    <td style="width: 15%;">Nome:</td>
                    <td style="width: 5%">&nbsp;</td>
                    <td style="width: 30%; font-weight: bold; text-align: left"><?php echo $cliente->nome; ?></td>
                    <td style="width: 15%;">Cognome:</td>
                    <td style="width: 5%;">&nbsp;</td>
                    <td style="width: 30%; font-weight: bold; text-align: left"><?php echo $cliente->cognome; ?></td>
                </tr>
                <tr>
                    <td>Telefono:</td>
                    <td>&nbsp;</td>
                    <td style="font-weight: bold;"><?php echo $cliente->cellulare; ?></td>
                    <td>Email:</td>
                    <td>&nbsp;</td>
                    <td style="font-weight: bold;"><?php echo $cliente->email; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Data di Nascita:</td>
                    <td>&nbsp;</td>
                    <td style="font-weight: bold;">
                        <?php
                        if ($cliente->dataNascita != '0000-00-00') {
                            echo dateFromDb($cliente->dataNascita) . " (" . getAge($cliente->dataNascita) . " anni)";
                            } else {
                                echo 'nd';
                                
                            }
                            ?>
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            <p>&nbsp;</p>


            <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                    Scheda Misurazione del <?php echo dateFromDb($misurazioneHead->data); ?>
                </h2>
                <div style=" text-align: right; padding: 10px 15px;">
                    <!--                                                <a href="#" class="btn btn-green" onclick="document.getElementById('gestioneQuestionario').action.value='nuovaMisurazioneCorpo'; document.getElementById('gestioneQuestionario').submit();">Salva Misurazione</a>-->


                </div>

            </div>


            <div style="clear:left;">&nbsp;</div>
            <div class="grid grid-pad">
                <div class="col-1-1">




        <!--<table border="0" cellspacing="0" cellpadding="0" style="width: 100%">-->
                    <table border="0" style="width: 100%">
<!--                        <tr>
                            <td>Data Misurazione</td>
                            <td>&nbsp;</td>
                            <td></td>
                        </tr>-->

                        <?php
                        for ($i = 0; $i < count($misurazioni); $i++) {
                            $misurazioneTMP = $misurazioni[$i];
                            ?>
                            <tr>
                                <td style="line-height: 35px; border-bottom: 1px dotted #366c88; width: 45%; text-align: left"><?php echo $misurazioneTMP->label; ?></td>
                                <td style="line-height: 35px; border-bottom: 1px dotted #366c88; width: 5%">&nbsp;</td>
                                <td style="line-height: 35px; border-bottom: 1px dotted #366c88; width: 50%; text-align: left;">
                            <?php echo $misurazioneTMP->descrizione; ?>
                                </td>
                            </tr>
<?php } ?>



                        <input type="hidden" name="numDomande" value="<?php echo count($arrayDomande); ?>">
                    </table>




                </div>
            </div>


            <div style="clear:left;">&nbsp;</div>


