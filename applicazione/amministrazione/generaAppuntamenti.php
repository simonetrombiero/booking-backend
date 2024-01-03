<?php
global $pianoTrattamento, $pianoTrattamentoItem;

//echo '<pre>';
//print_r($pianoTrattamento);
//print_r($pianoTrattamentoItem);
?>


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
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                    GENERA APPUNTAMENTI - PIANO TERAPEUTICO
                </h2>
                <div style=" text-align: right; padding: 10px 15px;">
                    <!--<a href="#" class="btn btn-green" id="addAppuntamento" >Nuovo Appuntamento</a>-->

                </div>
            </div>

            <!--- -->
            <form action="index.php" method="post" id="generaAppuntamenti" name="generaAppuntamenti">
                <input type="hidden" name="action" value="salvaAppuntamenti"/>
                <input type="hidden" name="idPiano" value="<?php
                if (isset($pianoTrattamento)) {
                    echo $pianoTrattamento->id;
                }
                ?>"/>
                       <?php
//            print_r($pianoTrattamento); 
//            $pianoTrattamento->id;
                       $paziente = null;
                       if (!isBlankOrNull($pianoTrattamento->idPaziente)) {
                           $paziente = DAOFactory::getClientiDAO()->load($pianoTrattamento->idPaziente);
                       }
                       ?>
                <div class="form-group col-12-12">
                    <label for="dataAppuntamento">Paziente</label>
                    <b><?php
                        if ($paziente != null) {
                            echo $paziente->nome . " " . $paziente->cognome;
                        } else {
                            echo '-';
                        }
                        ?></b>
                </div> 
                <div style="clear:left;">&nbsp;</div>
                <div class="form-group col-6-12">
                    <!--<label for="dataAppuntamento">Titolo</label>-->
                    <b><?php echo $pianoTrattamento->titolo; ?></b>
                </div>
                
                <div class="form-group col-6-12">
                    <label for="dataAppuntamento">Numero Sedute</label>
                    <b><?php echo $pianoTrattamento->seduteNumero; ?></b>
                </div>
                <div style="clear:left;">&nbsp;</div>
                 <div class="form-group col-12-12">
                    <!--<label for="dataAppuntamento">note</label>-->
                    <b><?php
                        echo $pianoTrattamento->note;
                        ?></b>
                </div> 
<!--                <div style="clear:left;">&nbsp;</div>
                 <div class="form-group col-12-12">
                    <label for="dataAppuntamento">note</label>
                    <input type="radio" name="tipoTrattamento" value="congiunto" onclick="setDivTrattamento(this.value);" checked=""><b>TRATTAMENTI CONGIUNTI:</b> sono eseguiti nello stesso giorno dell'appuntamento<br>
                    <input type="radio" name="tipoTrattamento" value="disgiunto" onclick="setDivTrattamento(this.value);"><b>TRATTAMENTI DISGIUNTI:</b> sono eseguiti in giorni diversi
                </div> -->
                <div style="clear:left;">&nbsp;</div>
                <div id="trattamentoCongiunto">
                    
                     <div class="form-group col-4-12">
                    <label for="dataAppuntamento">Data Primo Appuntamento *</label>
                    <input type="text" class="form-control" id="dataAppuntamento" name="dataAppuntamento" placeholder="dd/mm/aaaa" required="">
                    <div id="dataCompresa" style="display: none"><input type="checkbox" name="dataSelezionata" value="si"> <b>Comprendi il giorno selezionato</b></div>
                </div>
                <div class="form-group col-4-12">
                    <label for="oraInizioAppuntamento">Ora Inizio *</label>
                    <input type="text" class="form-control timepicker" name="oraAppuntamento" id="oraAppuntamento" placeholder="hh:mm" required="">
                </div>

                <div class="form-group col-4-12">
                    <label for="giorniRipetizione">Ripetizioni *</label><br>
                    <select  style="width: 65%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" required="" onchange="setGiorniRipetizione(this.selectedIndex)" name="giorniRipetizione" id="giorniRipetizione">
                        <option value="g">giorno</option>
                        <option value="s">settimana</option>
                        <option value="m">mese</option>
                        <option value="a">anno</option>
                    </select>
                    <div id="divSelezioneGiorno" style="display: none">Seleziona il giorno<br>
                        <input type="checkbox" name="giornoSelezionato[]" value="1">&nbsp;L&nbsp;&nbsp;<input type="checkbox" name="giornoSelezionato[]" value="2">&nbsp;M&nbsp;&nbsp;<input type="checkbox" name="giornoSelezionato[]" value="3">&nbsp;M&nbsp;&nbsp;<input type="checkbox" name="giornoSelezionato[]" value="4">&nbsp;G&nbsp;&nbsp;<input type="checkbox" name="giornoSelezionato[]" value="5">&nbsp;V
                    </div>
                    
                </div>
                    
                    <!--<p><h4>Tutti i Trattamenti sono eseguito nella stessa seduta</h4></p>-->
 
                <p><h4>Lista Trattamenti </h4></p>
                <table style="width: 100%">
                    <tr>
                        <td><b>Trattamento</b></td>
                        <td><b>Operatore *</b></td>
                        <td><b>Postazione *</b></td>
                    </tr>

                    <?php
                    for ($i = 0; $i < count($pianoTrattamentoItem); $i++) {

                        $trattamentoItem = $pianoTrattamentoItem[$i];
                        ?>

                        <tr>
                            <td>
    <?php echo $trattamentoItem->trattamento; ?>
                                <input type="hidden" name="trattamentoID<?php echo $i; ?>" value="<?php echo $trattamentoItem->id; ?>">
                                <input type="hidden" name="trattamentoDescrizione<?php echo $i; ?>" value="<?php echo $trattamentoItem->trattamento; ?>">

                            </td>

                            <td>
                                <select name="operatoreAppuntamento<?php echo $i; ?>" id="operatoreAppuntamento" required="required">
                                    <option value="">-- Seleziona --</option>
                                    <?php
                                    $operatoriAll = DAOFactory::getDipendenteDAO()->queryAll();
                                    for ($kk = 0; $kk < count($operatoriAll); $kk++) {

                                        $operatore = $operatoriAll[$kk];
                                        ?>
                                        <option value="<?php echo $operatore->id; ?>"><?php echo $operatore->nome . " " . $operatore->cognome; ?></option>
    <?php } ?>
                                </select>

                            </td>
                            <td>
                                <select name="postazioneAppuntamento<?php echo $i; ?>" id="postazioneAppuntamento"  required="required">
                                    <option value="">-- Seleziona --</option>
                                    <?php
                                    $postazioniAll = DAOFactory::getPostazioniDAO()->queryAll();
                                    for ($kk = 0; $kk < count($postazioniAll); $kk++) {

                                        $postazione = $postazioniAll[$kk];
                                        ?>
                                        <option value="<?php echo $postazione->id; ?>"><?php echo $postazione->postazione; ?></option>
    <?php } ?>
                                </select>  

                            </td>
                        </tr>
<?php } ?>

                </table>
            
              </div>
                
                <div id="trattamentoDisgiunto" style="display: none;"><!--INIZIO TRATTAMENTI DISGIUNTI-->
                    
                    
                    
                </div><!--FINE TRATTAMENTI DISGIUNTI-->
                <input type="hidden" name="trattamentoN" value="<?php echo count($pianoTrattamentoItem); ?>">

                <p style="text-align: right"><input type="submit" value="salva" class="btn btn-green"></p>
            </form>                       
            <!--- -->


            <!--            <form id="formNewEvent" class="addEvent" role="form">
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="titoloAppuntamento">Titolo</label>
                                            <input type="text" class="form-control" id="titoloAppuntamento" name="titoloAppunamento" placeholder="Eventuale Titolo dell'appuntamento">
                                        </div>
                                        <div class="form-group">
                                            <label for="cliente">Paziente</label>
            
                                            <input type="text" id="cliente" name="cliente" class="input-sm form-control" id="eventName" placeholder="Nome e Cognome del Paziente">
                                            <input type="hidden" id="idCliente" name="idCliente">
                                        </div>
                                        <div class="form-group col-6-12">
                                            <label for="dataAppuntamento">Data</label>
                                            <input type="text" class="form-control" id="dataAppuntamento" name="dataAppuntamento" placeholder="dd/mm/aaaa">
                                        </div>
                                        <div class="form-group col-6-12">
                                            <label for="oraInizioAppuntamento">Ora Inizio</label>
                                            <input type="text" class="form-control timepicker" name="oraInizioAppuntamento" id="oraInizioAppuntamento" placeholder="hh:mm">
                                        </div>
                                        <div class="clear">&nbsp;</div>
            
                                    </div>                     
            
            
            
                                    <div class="form-row">
                                        <div class="form-group col-6-12">
                                            <label for="operatoreAppuntamento">Operatore</label>
                                            <div class="fg-line">
                                                <select name="operatoreAppuntamento" id="operatoreAppuntamento">
                                                    <option>-- Seleziona --</option>
            <?php
            $operatoriAll = DAOFactory::getDipendenteDAO()->queryAll();
            for ($kk = 0; $kk < count($operatoriAll); $kk++) {

                $operatore = $operatoriAll[$kk];
                ?>
                                                                        <option value="<?php echo $operatore->id; ?>"><?php echo $operatore->nome . " " . $operatore->cognome; ?></option>
<?php } ?>
                                                </select>
                                                <input type="text" class="input-sm form-control" id="eventName" placeholder="eg: Sports day">
            
                                            </div>
            
                                        </div>
                                        <div class="form-group col-6-12">
                                            <label for="postazioneAppuntamento">Postazione</label>
                                            <div class="fg-line">
                                                <select name="postazioneAppuntamento" id="postazioneAppuntamento">
                                                    <option>-- Seleziona --</option>
            <?php
            $postazioniAll = DAOFactory::getPostazioniDAO()->queryAll();
            for ($kk = 0; $kk < count($postazioniAll); $kk++) {

                $postazione = $postazioniAll[$kk];
                ?>
                                                                        <option value="<?php echo $postazione->id; ?>"><?php echo $postazione->postazione; ?></option>
<?php } ?>
                                                </select>
                                            </div>
                                        </div>
            
                                    </div>
            
            
            
                                    <div class="form-group">
                                        <label for="trattamentiAppuntamento">Trattamenti</label>
                                        <div class="fg-line">
                                            <select class="js-example-basic-multiple" name="trattamentiAppuntamento[]" id="trattamentiAppuntamento" multiple="multiple" style="width: 100%">
            <?php
            $trattamentiAll = DAOFactory::getTrattamentiDAO()->queryAllOrderBy("trattamento");
            for ($kk = 0; $kk < count($trattamentiAll); $kk++) {

                $trattamento = $trattamentiAll[$kk];
                ?>
                                                                    <option value="<?php echo $trattamento->id; ?>"><?php echo $trattamento->trattamento; ?></option>
<?php } ?>
                                            </select>
                                            <input type="text" class="input-sm form-control" id="eventName" trattamentiAppuntamento="eg: Sports day">
            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       
                                        <div class="fg-line">
                                            <div class="col-3-12">
                                                 <label for="seduteAppuntamento">Numero Sedute</label>
                                                <input name="ripetizione" id="ripetizione" type="number" value="1" min="1" style="width: 60%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204); min-width: 30px;">
                                            </div>
            
                                            <div class="col-4-12">
                                                <label for="giorniRipetizione">Ripetizioni</label>
                                                <select  style="width: 65%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" required="" onchange="setGiorniRipetizione(this.selectedIndex)" name="giorniRipetizione" id="giorniRipetizione">
                                                    <option value="g">giorno</option>
                                                    <option value="s">settimana</option>
                                                    <option value="m">mese</option>
                                                    <option value="a">anno</option>
                                                </select>
                                            </div>
                                            <div class="col-5-12">
                                                <div id="divSelezioneGiorno" style="display: none">Seleziona il giorno<br>
                                                    <input type="checkbox">&nbsp;L&nbsp;&nbsp;<input type="checkbox">&nbsp;M&nbsp;&nbsp;<input type="checkbox">&nbsp;M&nbsp;&nbsp;<input type="checkbox">&nbsp;G&nbsp;&nbsp;<input type="checkbox">&nbsp;V
                                                </div>
                                            </div>
                                        </div>
            
                                    </div>
                                    <div style="clear: left;">&nbsp;<br></div>
                                    <div class="form-group">
                                        <label for="presenzaAppuntamento">Presenza</label> 
                                        <div class="fg-line">
                                            <input class="form-check-input" type="radio" name="presenzaAppuntamento" id="presenzaAppuntamento" value="si">
                                            <label class="form-check-label" for="inlineRadio1">si</label>&nbsp;&nbsp;
            
                                            <input class="form-check-input" type="radio" name="presenzaAppuntamento" id="presenzaAppuntamento" value="no">
                                            <label class="form-check-label" for="inlineRadio2">no</label>
                                        </div>
                                    </div>    
            
                                                                            <div class="form-group">
                                                                                <label for="eventName">Tag Color</label>
                                                                                <div class="event-tag">
                                                                                    <span data-tag="bgm-teal" class="bgm-teal selected"></span>
                                                                                    <span data-tag="bgm-red" class="bgm-red"></span>
                                                                                    <span data-tag="bgm-pink" class="bgm-pink"></span>
                                                                                    <span data-tag="bgm-blue" class="bgm-blue"></span>
                                                                                    <span data-tag="bgm-lime" class="bgm-lime"></span>
                                                                                    <span data-tag="bgm-green" class="bgm-green"></span>
                                                                                    <span data-tag="bgm-cyan" class="bgm-cyan"></span>
                                                                                    <span data-tag="bgm-orange" class="bgm-orange"></span>
                                                                                    <span data-tag="bgm-purple" class="bgm-purple"></span>
                                                                                    <span data-tag="bgm-gray" class="bgm-gray"></span>
                                                                                    <span data-tag="bgm-black" class="bgm-black"></span>
                                                                                </div>
                                                                            </div>
            
                                    <input type="hidden" id="getStart" />
                                    <input type="hidden" id="getEnd" />
                                </form>-->

        </div>
    </div>
    <div style="clear:left;">&nbsp;</div>


    <script type="text/javascript">
        function setGiorniRipetizione(idSelezionato) {
            //alert("www");
            //alert(aaa);
            //alert(posizione)
            //var giornoSel =$('#giorniRipetizione_'+posizione).val();
            //alert(giornoSel);
            if (idSelezionato == '1') {
                //  alert("QUI");
                document.getElementById("divSelezioneGiorno").style.display = "block";
                document.getElementById("dataCompresa").style.display = "block";
                
            } else {
                //alert("no");
                document.getElementById("divSelezioneGiorno").style.display = "none";
                document.getElementById("dataCompresa").style.display = "none";
            }

        }
        function setDivTrattamento(tipoTrattamento) {
            if(tipoTrattamento=='disgiunto'){
                document.getElementById("trattamentoDisgiunto").style.display = "block";
                document.getElementById("trattamentoCongiunto").style.display = "none";
            }else{
                document.getElementById("trattamentoDisgiunto").style.display = "none";
                document.getElementById("trattamentoCongiunto").style.display = "block";
            }
            
        }
    </script>

    <script type="text/javascript">

        //    $( function() {


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
            interval: 5,
            minTime: '9:00',
            maxTime: '20:00',
            startTime: '9:00',
            //maxHour: '20',
            //maxMinutes: '30',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    </script>