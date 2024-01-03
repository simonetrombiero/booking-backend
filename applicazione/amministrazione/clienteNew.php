<?php
global $cliente;
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
                        <?php if (!isset($cliente)) {
                            echo "Nuovo Cliente";
                        } else {
                            echo "Modifica Cliente";
                        } ?></h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="index.php?action=clientiList" class="btn btn-green" >Annulla</a>
                    </div>
                </div></div>
            <div>
                <form action="index.php" method="post" id="formCliente" name="formCliente">
                    <input type="hidden" name="action" value="salvaCliente"/>
                    <input type="hidden" name="idCliente" value="<?php if (isset($cliente)) {
                            echo $cliente->id;
                        } ?>"/>
                    <input type="hidden" name="codiceCliente" value="<?php if (isset($cliente)) {
                            echo $cliente->codice;
                        } ?>"/>

                    <table style="margin-left:auto; margin-right:auto;">
                        <tr>
                            <td>Nome (*)</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="nomeCliente" id="nomeCliente" value="<?php if (isset($cliente)) {
                            echo $cliente->nome;
                        } ?>" required=""></td>
                        </tr>
                        <tr>
                            <td>Cognome (*)</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="cognomeCliente" id="cognomeCliente" value="<?php if (isset($cliente)) {
                            echo $cliente->cognome;
                        } ?>" required=""></td>
                        </tr>
                        <tr>
                            <td>Sesso</td>
                            <td>&nbsp;</td>
                            
                            <td>
                                <select name="sessoCliente" id="sessoCliente">
                                    <option value="">-- Seleziona --</option>
                                    <option value="F" <?php if(isset($cliente->sesso)){ if($cliente->sesso=='F'){ echo "selected=''";}} ?>>Donna</option>
                                    <option value="M" <?php if(isset($cliente->sesso)){if($cliente->sesso=='M'){ echo "selected=''";}} ?>>Uomo</option>
                                </select>
                            
                            </td>
                        </tr>

<!--              <tr>
      <td>Telefono</td>
      <td>&nbsp;</td>
      <td><input type="text" name="telefonoCliente" id="telefonoCliente" value="<?php //if(isset($cliente)){ echo $cliente->telefono; }  ?>" required=""> </td>
  </tr>-->
                        <tr>
                            <td>Cellulare (*)</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="cellulareCliente" id="cellulareCliente" value="<?php if (isset($cliente)) {
                            echo $cliente->cellulare;
                        } ?>" required=""></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="emailCliente" id="emailCliente" value="<?php if (isset($cliente)) {
                            echo $cliente->email;
                        } ?>"> </td>
                        </tr>
                        <tr>
                            <td>Data Nascita</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="dataNascitaCliente" id="dataNascitaCliente" value="<?php if (isset($cliente->dataNascita)) {
                                    echo dateFromDb($cliente->dataNascita);
                                } ?>"></td>
                        </tr>
                        <tr>
                            <td class="td">Città</td>
                            <td class="td">&nbsp;</td>
                            <td class="td">
                                       <?php
                                       $cittaAgente = null;
                                       if (isset($cliente)) {
                                           if (!isBlankOrNull($cliente->citta)) {
                                               $cittaAgente = DAOFactory::getComuniDAO()->load($cliente->citta);
                                           }
                                       }
                                       ?>
                                <input type="text" name="cittaCliente" id="cittaCliente" value="<?php
                                       if ($cittaAgente != null) {
                                           echo $cittaAgente->comune;
                                       }
                                       ?>" />
                                <input id="idCittaCliente" type="hidden" name="idCittaCliente"  value="<?php
                                       if (isset($cliente)) {
                                           echo $cliente->citta;
                                       }
                                       ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Codice Fiscale</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="codiceFiscaleCliente" id="codiceFiscaleCliente" value="<?php if (isset($cliente)) {
                                           echo $cliente->cFiscale;
                                       } ?>"></td>
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
 //yearRange: '1900:<?php //echo date("Y");  ?>',
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

            $("#dataNascitaCliente").datepicker(options);


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