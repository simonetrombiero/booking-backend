<?php
global $appuntamenti, $postazioni, $operatori;
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
<script type="text/javascript">
    function setPrintAgenda() {
        var dataPrint = $("#dataStampa").val();
        var select = document.getElementById('tipologiaPlanner');
        var value = select.options[select.selectedIndex].value;
        if (value == 0) {
            alert("Seleziona il tipologia di Stampa");

        } else {
            //alert(dataPrint);
            $.ajax({

                url: 'index.php?action=caricaInfoStampeAppuntamenti',
                method: 'POST',

                data: {
                    tipoStampa: value,
                    giorno: dataPrint
                },
                headers: {
                    Accept: 'application/octet-stream',
                },
                dataType: "text",
                success: function (result) {
//                    let blob = new Blob([result], {type: "octet/stream"});
//
//                    let a = document.createElement('a');
//                    a.href = window.URL.createObjectURL(blob);
//                    a.download = "appuntament.pdf";
//                    document.body.appendChild(a);
//                    a.click();
//                    document.body.removeChild(a);
//                    window.URL.revokeObjectURL(a.href);
                    var link = document.createElement('a');
                    link.href = "/documentazione/appuntamenti.pdf";
                    //link.download = "file_" + new Date() + ".pdf";
                    link.download = "appuntamenti.pdf";
                    link.click();
                    link.remove();


                },
                //error: errorDialog
//                success: function (data) {
//                    console.log(val + "--" + data)
//                    // $('#printDiv').html(data);
//                }
            });
//            if (val == 3) {
//                $('#documentoDefinitivo option[value=0]').prop('selected', true);
//            } else {
//                $('#documentoDefinitivo option[value=1]').prop('selected', true);
//            }


        }

        /*
         $.ajax({
         url: 'index.php?action=verificaSospesi',
         method: 'POST',
         data: {idCliente: cliente},
         success: function (data) {
         $('#sospesiCliente').html(data);
         }
         
         });
         */


    }

</script>
<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->



            <div>
                <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">Stampa Appuntamenti</h2>
                    <div style=" text-align: right; padding: 10px 15px;"><input type="date" name="dataStampa" id="dataStampa" value="<?php echo date("Y-m-d"); ?>" placeholder="data">
                        <!--<select onchange="setPrintAgenda(this.value)" id="tipologiaPlanner">-->
                        <select id="tipologiaPlanner">
                            
                            <option value="0">-- Seleziona --</option>
                            <option value="planner">Planner Giornaliero</option>
                            <option value="operatori">Per Operatori</option>
                            <option value="postazioni">Per Postazioni</option>

                        </select>
                        <button onclick="setPrintAgenda()">Stampa</button>
                    </div>
                </div></div>
            <div id="printDiv">
                <form action="index.php" method="post" id="formCliente" name="formCliente">
                    <input type="hidden" name="action" value="printAgenda"/>
                    <input type="hidden" name="idAliquota" value="<?php
                    if (isset($aliquota)) {
                        echo $aliquota->id;
                    }
                    ?>"/>

                    <?php
                    $giorno = date("Y-m-d");
                    $operatori = DAOFactory::getDipendenteDAO()->queryAll();
                    $appuntamenti = array();
                    $operatoriArray = array();

                    for ($i = 0; $i < count($operatori); $i++) {
                        $operatore = $operatori[$i];
                        $appOp = DAOFactory::getPrenotazioniDAO()->queryPrenotazioniGiornoOperatoreOrderBYoraInizio($giorno, $operatore->id);
                        if (count($appOp) > 0) {

                            $operatoriArray[] = $operatore;
                            $appuntamenti[] = $appOp;
                        }
                    }
                    //exit;
//                    echo 'xxxx->' . count($appuntamenti);
//                    // echo '<pre>----->';
//                    print_r($operatoriArray);
//                    print_r($appuntamenti);

//                    for ($i = 0; $i < count($operatoriArray); $i++) {
//                        $operatoretmp = $operatoriArray[$i];
//                        $appuntamentitmp = $appuntamenti[$i];
//                        $titoloTrattamento = '';
//       
//                        echo "<br>". $operatoretmp->nome;
//                       
//                        
//                        for ($k = 0; $k < count($appuntamentitmp); $k++) {
//                            $appuntamento = $appuntamentitmp[$k];
//                            // print_r($appuntamenti);
//                             if (isset($appuntamento->idPiano)) {
//            $piano = DAOFactory::getPianoTrattamentoDAO()->load($id);
//            if(isset($piano->titolo)){
//                $titoloTrattamento = $piano->titolo;
//            }
//        }
//         echo "<br>". $titoloTrattamento;
//
//                            echo "-----".$appuntamento->oraInizio;
//                        }
//                    }
                    //$postazioni = DAOFactory::getPostazioniDAO()->queryAll();
                    //print_r($postazioni);
                    /* echo $operatori->nome;

                      //print_r($appuntamenti);
                      print_r($postazioni);
                      echo $operatori->cognome;
                      echo $operatori->nome; */
                    ?>                 


                </form>
                <?php
                $orari = array("08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00");
                $orariFine = array("08:59", "09:59", "10:59", "11:59", "12:59", "13:59", "14:59", "15:59", "16:59", "17:59", "18:59", "19:59", "20:59");
                $postazioni = DAOFactory::getPostazioniDAO()->queryAll();
                //$appuntamenti = array();
                //$postazioniArray = array();
               // echo '<br>';
                //print_r($postazioni);
                ?>

                <table style="width: 190mm;">
                    <tr>
                        <td style="width:40%;"><!--<img src="img/logo.png" />-->
                            <?php
                            for ($i = 0; $i < count($postazioni); $i++) {
                                $postazione = $postazioni[$i];
                                //echo $postazione->postazione;
                            }
                            ?>

                        </td>
                        <td>&nbsp;</td>
                        <td style="text-align: right;"><h3>Appuntamenti del <?php echo $giorno; ?> </h3></td>
                    </tr>



                </table> 
                <table>
                    <tr>
                        <td></td>
                        <?php
                        for ($xv = 0; $xv < count($postazioni); $xv++) {
                            $postazione = $postazioni[$xv];
                            ?>
                            <td style="text-align: center; font-weight: bold;"><?php echo $postazione->postazione; ?></td>
                        <?php } ?>
                    </tr>


                    <?php
                    for ($k = 0; $k < count($orari); $k++) {
                        //$postazionetmp = $postazioniArray[$i];
                        //$appuntamentitmp = $appuntamenti[$i];
                        ?>
                        <tr><td style="border: red 1px solid;"><?php echo $orari[$k]; ?></td>

                            <?php
                            for ($xc = 0; $xc < count($postazioni); $xc++) {
                                $postazione = $postazioni[$xc];
                                //echo
                                ?>
                                <td style="border: red 1px solid;">
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
                                                    $paziente = $cliente->nome ." ". $cliente->cognome;
                                                }
                                            }
                                            $trattamento_postazione = DAOFactory::getPrenotazioniDettaglioDAO()->queryPrenotazioniDettaglioByPrenotazionePostazione($appuntamento->id,  $postazione->id);
                //trattamento
                $trattamento='';
                //operatore
                $operatoreint='';
                for($h=0; $h<count($trattamento_postazione);$h++){
                    $tratt_post = $trattamento_postazione[$h];
                    
                   // $tratt = DAOFactory::getTrattamentiDAO()->load($tratt_post->idTrattamento);
                    $trattamento .=$tratt_post->trattamento." ";
                    
                    $post = DAOFactory::getDipendenteDAO()->load($tratt_post->idOperatore);
                    $trattamento .= "(".$post->nome." ".$post->cognome.")<br>";
                }
                                            ?>
                                            <table  style="width:40mm;">
                                                <tr>
                                                    <td>&nbsp;</td>

                                                </tr>
                                                <tr>
                                                    <td><?php echo $paziente; ?></td>

                                                </tr>
                                                <tr>
                                                    <td>Piano di Cura      <?php echo $titoloTrattamento; ?>        
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Inizio:      <?php echo substr($appuntamento->oraInizio, 0, 5); ?>        
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td><?php echo $trattamento; ?>        
                                                    </td>

                                                </tr>
                                                
                                                <tr><td>&nbsp;</td></tr>


                                            </table>
                                        <?php } else { ?>

                                            <table  style="width:40mm;">

                                                <tr><td style="border-bottom: 1px dotted #333; width: 100%">&nbsp;</td></tr>
                                                <tr><td style="border-bottom: 1px dotted #333; width: 100%">&nbsp;</td></tr>
                                                <tr><td style="border-bottom: 1px dotted #333; width: 100%">&nbsp;</td></tr>
                                                <tr><td style="border-bottom: 1px dotted #333; width: 100%">&nbsp;</td></tr>
                                                <tr><td style="border-bottom: 1px dotted #333; width: 100%">&nbsp;</td></tr>


                                            </table>


                                        <?php } ?>
                                    </div>
                                </td>
                            <?php } //fine for postazioni  ?>
                        </tr>



                    <?php } // fine for orari  ?>
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
        //yearRange: '1900:<?php //echo date("Y");         ?>',
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
        });

    </script>        