<?php
global $questionario, $cliente;



$arrayDomande = array("Altezza", "Peso", "% Grasso Corpo", "% Tot. Ritenz. Idrica", "Massa Muscolare", "Punt. Fisico 1-9", "Massa Ossea", "BMR", "Età Metabolica", "Livello Grasso Viscerale", "M. Muscolare Tot.", "M. Muscolare Braccio DX", "M. Muscolare Braccio SX", "M. Muscolare Tronco", "M. Muscolare Gamba DX", "M. Muscolare Gamba SX", "% Grasso Totale", "% Grasso Braccio DX", "% Grasso Braccio SX", "% Grasso Tronco", "% Grasso Gamba DX", "% Grasso Gamba SX", "Peso Bilancia Mecc.", "BMI", "FAT", "Punto Vita CM.", "Addome CM.", "Fianchi CM.", "Inguinde DX", "Cosa Inferiore DX", "Caviglia DX", "Inguinde SX", "Cosa Inferiore SX", "Caviglia SX", "Polso DX", "Braccio DX", "Polso SX", "Braccio SX", "Collo Circonferenza");


?>
<!--<script src="../../../applicazione/js/sign.js"></script>-->

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
                <input type="hidden" name="action" value="salvaMisurazioneCorpo"/>
                <input type="hidden" name="idQuestionario" value="<?php
                if (isset($questionario)) {
                    echo $questionario->id;
                }
                ?>"/>
                <input type="hidden" name="idCliente" value="<?php
                if (isset($cliente)) {
                    echo $cliente->id;
                }
                ?>"/>



                <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        Nuova Scheda Misurazione
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
                                <td><input type="text" name="dataMisurazione" id="dataMisurazione" ></td>
                            </tr>

<?php for ($i = 0; $i < count($arrayDomande); $i++) { ?>
                                <tr>
                                    <td><?php echo $arrayDomande[$i]; ?></td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <input type="hidden" name="label<?php echo $i; ?>" value="<?php echo $arrayDomande[$i]; ?>">
                                        <input type="text" name="domanda<?php echo $i; ?>">
                                    </td>
                                </tr>
<?php } ?>



                                <input type="hidden" name="numDomande" value="<?php echo count($arrayDomande);?>">
                        </table>




                    </div>
                </div>
            </form>

            <div style="clear:left;">&nbsp;</div>


            <script type="text/javascript">

                //    $( function() {
                //
                //$( "#dataNascitaCliente" ).datepicker({
                //changeMonth: true,
                //changeYear: true,
                //yearRange: '1900:<?php //echo date("Y");        ?>',
                //closeText: 'Chiudi',
                //prevText: 'Prec',
                //nextText: 'Succ',
                //currentText: 'Oggi',
                //monthNames: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno', 'Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
                //monthNamesShort: ['Gen','Feb','Mar','Apr','Mag','Giu', 'Lug','Ago','Set','Ott','Nov','Dic'],
                //dayNames: ['Domenica','Lunedì','Martedì','Mercoledì','Giovedì','Venerdì','Sabato'],
                //dayNamesShort: ['Dom','Lun','Mar','Mer','Gio','Ven','Sab'],
                //dayNamesMin: ['Do','Lu','Ma','Me','Gio','Ve','Sa'],
                //dateFormat: 'dd/mm/yy',
                //firstDay: 1,
                //isRTL: false
                //});
                //
                //$.datepicker.setDefaults($.datepicker.regional['it']);
                //} );

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