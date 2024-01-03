<?php
global $richiamo;
global $cliente;
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
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">Scheda Richiamo
                        <?php
                         echo " - " . $cliente->nome . " " . $cliente->cognome;
                        ?></h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="index.php?action=listaRichiami" class="btn btn-green" >Annulla</a>
                    </div>
                </div></div>
            <div>
              


                    <table style="margin-left:auto; margin-right:auto;">
                        <tr>
                            <td>Titolo Richiamo (*)</td>
                            <td>&nbsp;</td>
                            <td><?php
                        if (isset($richiamo)) {
                        echo $richiamo->titolo;
                        }
                        ?></td>
                        </tr>
                        <tr>
                            <td>Richiesto da (*)</td>
                            <td>&nbsp;</td>
                            <td>
                                
                                    <?php
                                    for ($i = 0; $i < count($dipendenti); $i++) {
                                        $dipendente = $dipendenti[$i];
                                        ?>
                                    <?php if(isset($richiamo)){if($dipendente->id == $richiamo->richiestoDa){ echo $dipendente->nome." ".$dipendente->cognome; }} ?>

                                    <?php } ?>

                                </select>

                            </td>
                        </tr>


                        <tr>
                            <td>Motivo del Richiamo </td>
                            <td>&nbsp;</td>
                            <td><?php if (isset($richiamo->motivoRichiamo)) { echo $richiamo->motivoRichiamo;} ?></td>
                        </tr>
                        
                        <tr>
                            <td>Data Richiamo</td>
                            <td>&nbsp;</td>
                            <td>
                                <?php
                                if (isset($richiamo->dataPrevista)) {
                                echo dateFromDb($richiamo->dataPrevista);
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Stato</td>
                            <td>&nbsp;</td>
                            <td>
                                 <?php
                                                                $status='';
                                                                if(!isBlankOrNull($richiamo->status)){
                                                                    $statustmp = DAOFactory::getRichiamoStatoDAO()->load($richiamo->status);
                                                                    $status = $statustmp->stato;
                                                                }
                                                                echo $status;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td">Note</td>
                            <td class="td">&nbsp;</td>
                            <td class="td"><?php
                                if (isset($richiamo->note)) {
                                echo $richiamo->note;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td">&nbsp;</td>
                            <td class="td">&nbsp;</td>
                            <td></td>
                        </tr>
                        
                        
                    </table>        

               


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
        //yearRange: '1900:<?php //echo date("Y");   ?>',
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


    </script>        