<?php
global $misurazioneHead, $misurazioni, $cliente;

//echo '<pre>';
//print_r($misurazioneHead);
//print_r($misurazioni);
//print_r($cliente);

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
            <form action="index.php" method="post" id="nuovaMisurazione" name="salvaMisurazioneCorpo">
                <input type="hidden" name="action" value="salvaEditMisurazioneCorpo"/>
                <input type="hidden" name="idCorpoHead" value="<?php
                if (isset($misurazioneHead)) {
                    echo $misurazioneHead->id;
                }
                ?>"/>
                <input type="hidden" name="idCliente" value="<?php
                if (isset($cliente)) {
                    echo $cliente->id;
                }
                ?>"/>



                <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        Modifica Scheda Misurazione
                    </h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        <!--                                                <a href="#" class="btn btn-green" onclick="document.getElementById('gestioneQuestionario').action.value='nuovaMisurazioneCorpo'; document.getElementById('gestioneQuestionario').submit();">Salva Misurazione</a>-->
                        <a href="#" class="btn btn-green" onclick="document.getElementById('nuovaMisurazione').submit();">Salva Misurazione</a>

                    </div>

                </div>


                <div style="clear:left;">&nbsp;</div>
                <div class="grid grid-pad">
                    <div class="col-1-1">




        <!--<table border="0" cellspacing="0" cellpadding="0" style="width: 100%">-->
                        <table border="0" style="width: 100%">
                            <tr>
                                <td>Data Misurazione</td>
                                <td>&nbsp;</td>
                                <td><input type="text" name="dataMisurazione" id="dataMisurazione" value="<?php
                if (isset($misurazioneHead)) {
                    echo dateFromDb($misurazioneHead->data);
                }
                ?>" ></td>
                            </tr>

                            <?php
                            for ($i = 0; $i < count($misurazioni); $i++) {
                                $misurazione = $misurazioni[$i];
                                ?>
                                <tr>
                                    <td><?php echo $misurazione->label; ?></td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <input type="hidden" name="label<?php echo $i; ?>" value="<?php echo $misurazione->label; ?>">
                                        <input type="text" name="domanda<?php echo $i; ?>" value="<?php echo $misurazione->descrizione; ?>">
                                    </td>
                                </tr>
                            <?php } ?>



                            <input type="hidden" name="numDomande" value="<?php echo count($misurazioni); ?>">
                        </table>




                    </div>
                </div>
            </form>

            <div style="clear:left;">&nbsp;</div>


            <script type="text/javascript">

                $(document).ready(function () {
                    var userLang = navigator.language || navigator.userLanguage;

                    var options = $.extend({},
                            $.datepicker.regional["it"], {
                        currentText: 'Oggi',
                        monthNames: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
                        monthNamesShort: ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'],
                        dayNames: ['Domenica', 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato'],
                        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mer', 'Gio', 'Ven', 'Sab'],
                        dayNamesMin: ['Do', 'Lu', 'Ma', 'Me', 'Gio', 'Ve', 'Sa'],
                        dateFormat: "dd/mm/yy",
                        changeMonth: true,
                        changeYear: true,
                        highlightWeek: true
                    }
                    );

                    $("#dataMisurazione").datepicker(options);


                });


            </script>        