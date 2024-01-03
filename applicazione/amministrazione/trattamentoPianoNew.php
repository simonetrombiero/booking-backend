<?php
global $trattamentoRigaPiano;

//print_r($trattamentoRigaPiano);
$pianoTrattamento = DAOFactory::getPianoTrattamentoDAO()->load($trattamentoRigaPiano->trattamentoID);

$cliente = DAOFactory::getClientiDAO()->load($pianoTrattamento->idPaziente);

$oggi = date("Y-m-d");
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

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->



            <div>
                <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        <?php
                        if (!isset($trattamentoRigaPiano)) {
                            echo "Nuovo Appuntamento";
                        } else {
                            echo "Modifica Appuntamento: " . $cliente->nome . " " . $cliente->cognome;
                            ;
                        }
                        ?></h2>
                    <div style=" text-align: right; padding: 10px 15px;">

                        <a href="index.php?action=agenda" class="btn btn-green" ><< Agenda</a>


                    </div>
                </div></div>
            <div>
                
                <form action="index.php" method="post" name="FormSetPresenza" id="FormSetPresenza">
                    <input type="hidden" name="action" value="salvaRigaTrattamento"/>
                    <input type="hidden" name="idApputnamento" value="<?php if (isset($trattamentoRigaPiano->id)) {
                            echo $trattamentoRigaPiano->id;
                        } ?>">
                    
                    <table style="margin-left:auto; margin-right:auto;">

                        <tr>
                            <td style="width: 10%;"> </td>
                            <td>&nbsp;</td>
                            <td align="right">
                                <?php
//exit;
//$cliente = DAOFactory::getClientiDAO()->load($trattamentoRigaPiano->idCliente);
//echo $cliente->nome . " " . $cliente->cognome;
                                ?>

                            </td>
                        </tr>
                        <tr>
                            <td>Trattamento</td>
                            <td>&nbsp;</td>
                            <td>
                                <?php 
                                $trattamenti = DAOFactory::getTrattamentiDAO()->queryAll();
                                
                                ?>
                                <select name="trattamentoAppuntamento">
                                    <?php 
                                    for($jj=0; $jj<count($trattamenti); $jj++){ 
                                        $trattamentotmp = $trattamenti[$jj];
                                        
                                        ?>
                                    <option value="<?php echo $trattamentotmp->trattamento; ?>" <?php if($trattamentotmp->trattamento==$trattamentoRigaPiano->trattamento){ ?>selected=""<?php } ?>><?php echo $trattamentotmp->trattamento; ?></option>
                                    <?php  } ?>
                                    
                                </select>
                                
                                
                            </td>
                        </tr>
                        <tr>
                            <td>Data</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="dataAppuntamento" id="dataAppuntamento" value="<?php
                                if (isset($trattamentoRigaPiano->data)) {
                                    echo dateFromDb($trattamentoRigaPiano->data);
                                }
                                ?>"></td>
                        </tr>
                        <tr>
                            <td>Ora Inizio</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="oraInizio" value="<?php
                                if (isset($trattamentoRigaPiano)) {
                                    echo substr($trattamentoRigaPiano->oraInizio, 0, 5);
                                }
                                ?>" class="timepicker"></td>
                        </tr>
                        <tr>
                            <td>Ora Fine</td>
                            <td>&nbsp;</td>
                            <td><input type="text" name="oraFine" value="<?php
                                if (isset($trattamentoRigaPiano)) {
                                    echo substr($trattamentoRigaPiano->oreFine, 0, 5);
                                }
                                ?>" class="timepicker"></td>
                        </tr>
                        <tr>
                            <td>Postazione</td>
                            <td>&nbsp;</td>

                            <td>
                                    <?php
//$calendario = DAOFactory::getCalendariDAO()->load($trattamentoRigaPiano->idCalendario); 
//$postazione = DAOFactory::getPostazioniDAO()->load($trattamentoRigaPiano->postazione);
//
//echo $postazione->postazione;

                                    $postazioni = DAOFactory::getPostazioniDAO()->queryAll();
                                    ?>
                                <select name="postazioneAppuntamento">
<?php
for ($jj = 0; $jj < count($postazioni); $jj++) {
    $postazione = $postazioni[$jj];
    ?>

                                        <option value="<?php echo $postazione->id; ?>" <?php if($postazione->id==$trattamentoRigaPiano->postazione){ ?>selected=""<?php } ?>><?php echo $postazione->postazione; ?></option>
                                <?php } ?>
                                </select>


                            </td>
                        </tr>
                        <tr>
                            <td>Operatore</td>
                            <td>&nbsp;</td>

                            <td>
<?php
//$operatore = DAOFactory::getDipendenteDAO()->load($trattamentoRigaPiano->operatore);
//
//echo $operatore->nome . " " . $operatore->cognome;
$operatori = DAOFactory::getDipendenteDAO()->queryAll();

?>


                                <select name="operatoreAppuntamento">
                                    
                                    <?php 
                                    for($jj=0; $jj<count($operatori); $jj++){ 
                                        $operatoretmp = $operatori[$jj];
                                        
                                        ?>

                                        <option value="<?php echo $operatoretmp->id; ?>" <?php if($operatoretmp->id==$trattamentoRigaPiano->operatore){ ?>selected=""<?php } ?>><?php echo $operatoretmp->nome." ".$operatoretmp->cognome ?></option>
                                    <?php  } ?>

                                </select>
                            </td>
                        </tr>
                        <tr><td colspan="3"><hr></td></tr>
                        <tr>
                            <td>STATUS</td>
                            <td>&nbsp;</td>

                            <td style="font-weight: bold;">
<?php
//$statotmp = DAOFactory::getPianoTrattamentoStatusDAO()->load($trattamentoRigaPiano->status);
//echo $statotmp->status;
//echo $statotmp->descrizione;
$stati = DAOFactory::getPianoTrattamentoStatusDAO()->queryAll();
?>
                                <select name="statusAppuntamento">
                                    
                                    <?php 
                                    for($jj=0; $jj<count($stati); $jj++){ 
                                        $statotmp = $stati[$jj];
                                        
                                        ?>
                                    <option value="<?php echo $statotmp->id; ?>" <?php if($statotmp->id==$trattamentoRigaPiano->status){ ?>selected=""<?php } ?>><?php echo $statotmp->descrizione; ?></option>
                                    <?php  } ?>

                                </select>
                            </td>
                        </tr>
<?php if ($trattamentoRigaPiano->data <= $oggi) { ?>
                            <tr><td colspan="3">&nbsp;</tr>
                            <tr>

                            <tr style="background: #CCC">
                                <td>PRESENZA</td>
                                <td>&nbsp;</td>
                                <td>

                                    <select name="presenzaAppuntamento" required="">
                                        <option>-- Seleziona --</option>
                                        <option value="0" <?php if ($trattamentoRigaPiano->noShow == 0) { ?> selected="" <?php } ?>>SI</option>
                                        <option value="1" <?php if ($trattamentoRigaPiano->noShow == 1) { ?> selected="" <?php } ?>>NO</option>
                                    </select>




                                </td>
                            </tr>

    <!--<tr><td colspan="3" style="border-top: 1px dotted gray;">&nbsp;</tr>-->
                                <?php } ?>
                        <tr><td colspan="3"><hr></td></tr>
                        <tr>
                            <td colspan="3">Note:</td>
                        </tr>

                        <tr>
                            <td colspan="3"><textarea name="noteAppuntamento" style="width: 100%"><?php echo $trattamentoRigaPiano->note; ?></textarea>



                            </td>
                        </tr>
                       <tr><td colspan="3"><hr></td></tr>
                        <tr>
                            <td colspan="3" align="right"><input type="button" value="SALVA" class="btn btn-green" onclick="document.getElementById('FormSetPresenza').submit();"></td>
                        </tr>
                        
<tr><td colspan="3"><hr></td></tr>
 
                        
                        
                      

                    </table>        

                </form>


            </div>    





        </div>
    </div>
    <div style="clear:left;">&nbsp;</div>


    <script type="text/javascript">
        function setPresenza(str) {
            var app = <?php echo $trattamentoRigaPiano->id; ?>;
            //alert("qui"+app);
            if (str == "") {
                //document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        //document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "index.php?action=setPresenza&app=" + app + "&q=" + str, true);
                xmlhttp.send();
            }
        }



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

            $("#dataAppuntamento").datepicker(options);
        });

        $('.timepicker').timepicker({
            timeFormat: 'HH:mm',
            interval: 15,
            minTime: '8:00',
            maxTime: '20:00',
            startTime: '8:00',
            //maxHour: '20',
            //maxMinutes: '30',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });

    </script>        