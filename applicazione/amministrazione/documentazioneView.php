<?php
global $documentazione;
global $cliente;


$sottodir = str_pad($documentazione->idPaziente, 6, '0', STR_PAD_LEFT);
$file = "documentazione/" . $sottodir . "/" . $documentazione->allegato;
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
<form action="index.php" id="gestioneDocumentazione" name="gestioneDocumentazione" method="post">
    <input type="hidden" id="action" name="action" value="listaDocumentazione">
    <!--<input type="hidden" id="id" name="id">-->
    <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">
</form>

<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->




            <div>
                <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">DOCUMENTAZIONE</h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="#" onclick="document.getElementById('gestioneDocumentazione').submit();" class="btn btn-green" ><< Documenti</a>
                    </div>
                </div></div>
            <div>


                <table>
                    <tr>
                        <td>Cliente</td>
                        <td>&nbsp;</td>
                        <td><?php echo $cliente->nome . " " . $cliente->cognome; ?></td>
                    </tr>
                    <tr>
                        <td>Descrizione Documento </td>
                        <td>&nbsp;</td>
                        <td><?php
                            if (isset($documentazione)) {
                                echo $documentazione->descrizione;
                            }
                            ?></td>
                    </tr>
                    <tr>
                        <td>Data Caricamento Documento</td>
                        <td>&nbsp;</td>
                        <td><?php
                            if (isset($documentazione)) {
                                echo dateFromDb($documentazione->dataAcquisizione);
                            }
                            ?></td> 
                    </tr>


                    <tr>
                        <td>Piano Cura</td>
                        <td>&nbsp;</td>
                        <td>
                            <?php
                            $piani='';
                                                                $piani = DAOFactory::getDocumentazionePianoTrattamentoDAO()->queryByIdDocumentazione($documentazione->id);
                                                               
                                                                if(count($piani)>0){
                                                                    for($x=0;$x<count($piani);$x++){
                                                                        $piano=$piani[$x];
                                                                        
                                                                        if(!isBlankOrNull($piano->idPianoTrattamento)){
                                                                            
                                                                          $tmp = DAOFactory::getPianoTrattamentoDAO()->load($piano->idPianoTrattamento);
                                                                          echo $tmp->titolo." del ".dateFromDb($tmp->data)."<br>";
                                                                        }
                                                                        
                                                                        
                                                                    }
                                                                    
                                                                    
                                                                }else{
                                                                    echo 'Documento Generico';
                                                                }
                                                                ?>

                        </td> 
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                    </tr>



                </table>        




            </div>    
            <div>
                <embed src="<?php echo $file; ?>" style="width: 100%; height: 800px;">
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

        //$(document).ready(function () {
        //  var userLang = navigator.language || navigator.userLanguage;
        //
        //  var options = $.extend({},
        //    $.datepicker.regional["it"], {
        //      currentText: 'Oggi',
        //      monthNames: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno', 'Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
        //      monthNamesShort: ['Gen','Feb','Mar','Apr','Mag','Giu', 'Lug','Ago','Set','Ott','Nov','Dic'],
        //      dayNames: ['Domenica','Lunedì','Martedì','Mercoledì','Giovedì','Venerdì','Sabato'],
        //      dayNamesShort: ['Dom','Lun','Mar','Mer','Gio','Ven','Sab'],
        //      dayNamesMin: ['Do','Lu','Ma','Me','Gio','Ve','Sa'],  
        //      dateFormat: "dd/mm/yy",
        //      changeMonth: true,
        //      changeYear: true,
        //      highlightWeek: true
        //    }
        //  );
        //
        //  $("#dataNascitaCliente").datepicker(options);
        //});
        //         
    </script>        