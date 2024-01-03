<?php
global $richiamo;
//global $cliente;
global $dipendenti;
?>

<!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
-->

<!--  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<!--  <script type="text/javascript" src="applicazione/js/jquery-ui_completo.js"></script>
 <link rel="stylesheet" href="applicazione/css/jquery-ui_completo.css" media="all">-->

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">
  <!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js"></script>-->

<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->



            <div>
                <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        <?php
                        if (!isset($cliente)) {
                            echo "Nuovo Richiamo";
                        } else {
                            echo "Modifica Richiamo";
                        }
                        ?></h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="index.php?action=listaRichiami" class="btn btn-green" >Annulla</a>
                    </div>
                </div></div>
            <div>
                <form action="index.php" method="post" id="formRichiamo" name="formRichiamo">
                    <input type="hidden" name="action" value="salvaRichiamo"/>
                    <input type="hidden" name="idCliente" id="idCliente" />
                    <input type="hidden" name="idRichiamo" value="<?php
                    if (isset($richiamo)) {
                        echo $richiamo->id;
                    }
                    ?>"/>


                    <table style="margin-left:auto; margin-right:auto;">
<!--                        <div>
                    <span class="titleTasti">Cerca Cliente:</span>&nbsp;&nbsp;<input type="image" src="img/icone/view.png" width="30">


                </div>-->
                        <tr>
                            <td>Cerca Cliente (*)</td>
                            <td>&nbsp;</td>
                            <td><input id="cliente" name="cliente" type="text" style="width:80%; height:30px; border:1px solid #CCC; border-radius: 5px; padding-left:5px; padding-right:5px;" required=""></td>
                        </tr>
                        <tr>
                            
                            <td>Titolo Richiamo (*)</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="titoloRichiamo" id="titoloRichiamo" value="<?php
                                if (isset($richiamo)) {
                                    echo $richiamo->titolo;
                                }
                                ?>" required=""></td>
                        </tr>
                        <tr>
                            <td>Richiesto da (*)</td>
                            <td>&nbsp;</td>
                            <td><input type="hidden" name="ttttt" required="">
                                <select name="richiestoDa" id="richiestoDa">
                                    <option>-- Seleziona --</option>
                                    <?php
                                    for ($i = 0; $i < count($dipendenti); $i++) {
                                        $dipendente = $dipendenti[$i];
                                        ?>
                                        <option value="<?php echo $dipendente->id; ?>" <?php
                                        if (isset($richiamo)) {
                                            if ($dipendente->id == $richiamo->richiestoDa) {
                                                echo 'selected="selected"';
                                            }
                                        }
                                        ?>> <?php echo $dipendente->nome . " " . $dipendente->cognome; ?> 
                                        </option>

                                    <?php } ?>

                                </select>

                            </td>
                        </tr>


                        <tr>
                            <td>Motivo del Richiamo </td>
                            <td>&nbsp;</td>
                            <td><textarea name="motivoRichiamo" id="motivoRichiamo"><?php
                                    if (isset($richiamo->motivoRichiamo)) {
                                        echo $richiamo->motivoRichiamo;
                                    }
                                    ?></textarea></td>
                        </tr>
                        <tr><td colspan="3" style="border-bottom: #366c88 1px dotted">&nbsp;</td></tr>
                        <tr>
                            <td>Prossimo richiamo tra </td>
                            <td>&nbsp;</td>
                            <td>
                                <select name="mesiRichiamo" id="mesiRichiamo">
                                    <option value="0">-- Seleziona --</option>
                                    <?php
                                    for ($k = 1; $k <= 18; $k++) {
                                        ?>
                                        <option value="<?php echo $k; ?>"><?php echo $k; ?> mesi</option>
                                    <?php } ?> 
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><i>(Oppure indica la Data)</i></td>
                            <td>&nbsp;</td>
                            <td>
                                <input type="text" name="dataRichiamo" id="dataRichiamo" value="<?php
                                if (isset($richiamo->data)) {
                                    echo dateFromDb($richiamo->data);
                                }
                                ?>">
                            </td>
                        </tr>
                        <tr><td colspan="3" style="border-bottom: #366c88 1px dotted">&nbsp;</td></tr>
                        <tr>
                            <td>Status </td>
                            <td>&nbsp;</td>
                            <td>
                                <?php $statiRichiamo = DAOFactory::getRichiamoStatoDAO()->queryAll(); ?>
                                <select name="statoRichiamo" id="statoRichiamo">
                                    
                                    <option>-- Seleziona --</option>
                                    <?php
                                    for($h=0;$h<count($statiRichiamo);$h++){
                                        $statoRichiamo = $statiRichiamo[$h];
                                        
                                    ?>
                                    <option value="<?php echo $statoRichiamo->id; ?>"><?php echo $statoRichiamo->stato; ?></option>
                                    <?php
                                    }
                                                                        
                                    ?>
                                    
                                    
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="td">Note</td>
                            <td class="td">&nbsp;</td>
                            <td class="td"><textarea name="noteRichiamo" id="noteRichiamo"><?php
                                    if (isset($richiamo->note)) {
                                        echo $richiamo->note;
                                    }
                                    ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="td">&nbsp;</td>
                            <td class="td">&nbsp;</td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="3">(*) Campi Obbligatori</td>

                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="submit" class="btn btn-green" value="Salva"></td>
                        </tr>


                    </table>        

                </form>


            </div>    





        </div>
    </div>
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

            $("#dataRichiamo").datepicker(options);


            var comuniTMP = new Array();

            $.ajax({
                url: "index.php?action=caricaInfoComune",
                dataType: "json",
                data: {},
                success: function (data) {
                    //                alert(data["province"][0]["provincia"]);

                    for (var i = 0; i < data["comuni"].length; i++) {
                        comuniTMP[i] = {id: "" + data["comuni"][i]["id"] + "", comune: "" + data["comuni"][i]["comune"] + "", idProvincia: "" + data["comuni"][i]["idProvincia"] + "", idRegione: "" + data["comuni"][i]["idRegione"] + "", label: "" + data["comuni"][i]["comune"] + ""};
                    }

                    $("#cittaCliente").autocomplete({
                        source: comuniTMP,
                        select: function (event, ui) {
                            document.getElementById('idCittaCliente').value = '';

                            $("#idCittaCliente").val(ui.item.id);
                            //  $("#idProvinciaCliente").val(ui.item.idProvincia);

                        }
                    });
                },
                focus: function (event, ui) {

                    $("#cittaCliente").val(ui.item.label);

                    return false;
                }

            });

        });
        
        
         $("#cliente").autocomplete({
            source: "index.php?action=searchCliente",
            minLength: 3,
            select: function (event, ui) {
                document.getElementById('idCliente').value = '';

                $("#idCliente").val(ui.item.id);

//                $("#nomeCliente").val(ui.item.nome);
//                $("#nomeCliente").prop("disabled", true);
//
//                $("#cognomeCliente").val(ui.item.cognome);
//                $("#cognomeCliente").prop("disabled", true);
//
//                $("#telefonoCliente").val(ui.item.telefono);
//                $("#telefonoCliente").prop("disabled", true);
//
//                $("#codiceFiscaleCliente").val(ui.item.codiceFiscale);
//                $("#codiceFiscaleCliente").prop("disabled", true);
//
//                $('#nuovoCliente').css('display', 'block');


//
//                var cliente = $("#idCliente").val();
//
//                $.ajax({
//                    url: 'index.php?action=verificaSospesi',
//                    method: 'POST',
//                    data: {idCliente: cliente},
//                    success: function (data) {
//                        $('#sospesiCliente').html(data);
//                    }
//
//                });



            }
        });



    </script>        