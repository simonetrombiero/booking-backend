<?php
//global $privacy;

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
  
  
        
<div style="width: 100%; height: 60px; background-color: #F6F6F6;">
    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
        Nuova Scheda Misurazione
    </h2>
     <div style=" text-align: right; padding: 10px 15px;">
<!--                                                <a href="#" class="btn btn-green" onclick="document.getElementById('gestioneQuestionario').action.value='nuovaMisurazioneCorpo'; document.getElementById('gestioneQuestionario').submit();">Salva Misurazione</a>-->
                                                <a href="#" class="btn btn-green">Salva Misurazione</a>
                                               
                                            </div>

</div>
            

<div style="clear:left;">&nbsp;</div>
<div class="grid grid-pad">
    <div class="col-1-1">
        <!--INIZIO--->


        <!--<table border="0" cellspacing="0" cellpadding="0" style="width: 100%">-->
        <table border="0" style="width: 100%">
            <tr>
                <td>Data Misurazione</td>
                <td>&nbsp;</td>
                <td><input type="text" name="dataMisurazione" id="dataMisurazione" ></td>
            </tr>
            <tr>
                <td>Altezza</td>
                <td>&nbsp;</td>
                <td><input type="text" name="altezza"></td>
            </tr>
            <tr>
                <td>Peso</td>
                <td>&nbsp;</td>
                <td><input type="text" name="peso"></td>
            </tr>
            
            <tr>
                <td>% Grasso Corpo</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>% Tot. Ritenz. Idrica</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Massa Muscolare</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Punt. Fisico 1-9</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Massa Ossea</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>BMR</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Età Metabolica</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Livello Grasso Viscerale</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>M. Muscolare Tot.</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>M. Muscolare Braccio DX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>M. Muscolare Braccio SX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>M. Muscolare Tronco</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>M. Muscolare Gamba DX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>M. Muscolare Gamba SX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>% Grasso Totale</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>% Grasso Braccio DX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>% Grasso Braccio SX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>% Grasso Tronco</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>% Grasso Gamba DX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>% Grasso Gamba SX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Peso Bilancia Mecc.</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>BMI</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>FAT</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Punto Vita CM.</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Addome CM.</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Fianchi CM.</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Inguinde DX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Cosa Inferiore DX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Caviglia DX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Inguinde SX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Cosa Inferiore SX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Caviglia SX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Polso DX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Braccio DX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Polso SX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Braccio SX</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Collo Circonferenza</td>
                <td>&nbsp;</td>
                <td><input type="text"></td>
            </tr>
            

        </table>





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

            $("#dataMisurazione").datepicker(options);


        });


    </script>        