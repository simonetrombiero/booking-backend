<?php
global $appuntamento;

global $listaTrattamenti;


$data = getRequest("data");
$ore = getRequest("ore");
$idPostazione = getRequest("id");
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
<link rel="stylesheet" type="text/css" href="vendors/dataTables/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="vendors/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datatable').dataTable({
            "order": [[0, "asc"]], //[0, "desc"]
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
            "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
        });
        
        $(".accordion h1").click(function(){
    var id = this.id;   /* getting heading id */

    /* looping through all elements which have class .accordion-content */
    $(".accordion-content").each(function(){

        if($("#"+id).next()[0].id != this.id){
            $(this).slideUp();
        }

    });

    $(this).next().toggle();  /* Selecting div after h1 */
});

    });
</script>
<style>
.accordion{
    width:70%;
    margin:0 auto;
}

/* accordion heading */
.accordion h1{
    font-size:26px;
    font-weight: normal;
    text-align: center;
    margin-bottom:0px;
    margin-top:0px;
    background-color:gainsboro;
    padding-top:7px;padding-bottom:7px;
    border:1px solid darkgrey;
    border-radius:3px;
}
.accordion h1:hover{
    cursor:pointer;
}

/* accordion section content */
.accordion div{
    display:none;
    padding:10px;
    height:200px;
    line-height:20px;
    border:1px solid gray;
    border-radius:3px;
}

@media screen and (max-width:480px){
    .accordion{
        width:100%;
        margin:0;
    }
}
</style>
<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->



            <div>
                <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        <?php
                        if (!isset($appuntamento)) {
                            echo "Nuovo Appuntamento";
                        } else {
                            echo "Modifica Appuntamento";
                        }
                        ?></h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="index.php?action=agenda" class="btn btn-green" >Annulla</a>
                    </div>
                </div></div>
            <div>
                <form action="index.php" method="post" id="formAppuntamento" name="formAppuntamento">
                    <input type="hidden" name="action" value="salvaAppuntamento"/>
                    <input type="hidden" name="nNuoviTrattamenti" id="nNuoviTrattamenti" value="0">
                    <input type="hidden" name="idAppuntamento" value="<?php
                    if (isset($appuntamento)) {
                        echo $appuntamento->id;
                    }
                    ?>"/>
                    <div class="slider"><span class="titleTasti">Cerca Cliente:</span>&nbsp;<input id="cliente" name="cliente" type="text" style="width:52%; height:30px; border:1px solid #CCC; border-radius: 5px; padding-left:5px; padding-right:5px;">&nbsp;<input type="image" src="img/icone/view.png" width="30">&nbsp;<a href="javascript: nuovoCliente()" class="btn btn-green" ><img src="img/icone/aggiungi.png" height="20"> Aggiungi Cliente</a>
                        <?php //include "slider.php";   ?>

                    </div>
                    <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px; display: none;" id="nuovoCliente">

                        <input type="text" name="nomeCliente"  id="nomeCliente" placeholder="Nome Cliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" required="" />&nbsp;<input type="text" name="cognomeCliente" id="cognomeCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Cognome Cliente" /><br>
                        <input type="text" name="telefonoCliente" id="telefonoCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Cellulare Cliente">&nbsp;<input type="text" name="emailCliente" id="emailCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Email Cliente">
                        <input type="hidden" id="idCliente" name="idCliente">
                    <!--<input type="text"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="nome@dominio.ext" required>-->


<!--<span class="titleTasti">Cerca Cliente:</span>&nbsp;<input type="text" style="width:80%; height:30px; border:1px solid #CCC; border-radius: 5px; padding-left:5px; padding-right:5px;">&nbsp;<input type="image" src="img/icone/view.png" width="30">-->
                        <?php //include "slider.php";   ?>
                        
                       
                    </div>
                    <div style="clear:left;">&nbsp;</div>
                    <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px; display: none;" id="listaPianiInCorso">
                        
                        
                    </div>
                    
                   
                    <div style="clear:left;">&nbsp;</div>
               
                    <div style="clear:left;">&nbsp;</div>
                    <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">
                        <div>

                        <span style="font-weight: bolder;">Stato e Note Appuntamento</span> <br>


                        <?php $status = DAOFactory::getPrenotazioneStatusDAO()->queryAll(); ?>

                        <select name="statusAppuntamento" id="statusAppuntamento" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" required="" >
                            <option value="0">-- Seleziona Stato Appuntamento --</option>
                            <?php
                            for ($i = 0; $i < count($status); $i++) {
                                $stato = $status[$i];
                                ?>
                                <option value="<?php echo $stato->id ?>" <?php
                                if (isset($appuntamento)) {
                                    if ($stato->id == $appuntamento->status) {
                                        echo "selected='selected'";
                                    }
                                }
                            ?>><?php echo $stato->status; ?></option>
                                    <?php } ?>
                        </select> 


                    </div>
                        <div style="clear:left;">&nbsp;</div>
                        <div>

                        <textarea name="noteAppuntamento" id="noteAppuntamento" placeholder="Eventuali Note" style="border: 1px dotted #333333; padding: 5px; width: 100%;"><?php
                                    if (isset($appuntamento)) {
                                        echo $appuntamento->note;
                                    }
                                    ?></textarea>
                        </div>

                    </div>
                    <div style="clear:left;">&nbsp;</div>
                    <div style="width: 100%; height: 60px; background-color: #F6F6F6;  border-bottom: 1px dotted #CCC;">
                        <h2 style="float: left; padding: 0px 15px; color: #366c88;">Trattamenti</h2>

                    </div>
                    <div>

                        <table style="width: 100%" id="datatable">
                            <thead>
                                <tr>
                                    <th align="left">Descrizione</th>
                                    <th>Categoria</th>
                                    <th>Durata</th>
                                    <th>
                                        Azioni
                                    </th>
                                </tr>
                            </thead>
                            <tfoot></tfoot>
                            <tbody>
                                <?php
                                for ($i = 0; $i < count($listaTrattamenti); $i++) {
                                    $trattamento = $listaTrattamenti[$i];
                                    switch ($trattamento->classificazione){
                                    
                                    case "F":
                                        $backgroundTR = "style='background: #ffa4cd;'";
                                        break;
                                    
                                        case "M":
                                            $backgroundTR = "style='background: #c9d2ff;'";
                                            break;
                                        default :
                                            $backgroundTR = "style='background: none'";
                                        
                                    }
                                    
                                    ?>
                                <tr <?php echo $backgroundTR; ?>>
                                    <td style="border-bottom: 1px dotted #057fd0;"><input name="nSedute" id="nSedute<?php echo $i; ?>" type="text" style="min-width:30px; width: 30px;">
                                            <a href="javascript: associaTrattamento('<?php echo $trattamento->id; ?>', '<?php echo $i; ?>')" style="font-weight: bold">   
                                                <?php
                                                if (!isBlankOrNull($trattamento->trattamento)) {
                                                    echo $trattamento->trattamento;
                                                }
                                                ?>
                                            </a>
                                        </td>

                                        <td style="border-bottom: 1px dotted #057fd0;">
    <?php
    if (!isBlankOrNull($trattamento->categoria)) {

        $categoria = DAOFactory::getCategorieTattamentiDAO()->load($trattamento->categoria);
        echo $categoria->categoria;
    }
    ?>
                                        </td>

                                        <td style="border-bottom: 1px dotted #057fd0;"><?php echo $trattamento->tempo; ?></td>
                                        <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">
                                            <a href="javascript: associaTrattamento('<?php echo $trattamento->id; ?>', '<?php echo $i; ?>')"> <img src='img/icone/aggiungi.png' height="20"> </a>


                                        </td>
                                    </tr>
    <?php
}
?>
                            </tbody>
                        </table>

                    </div>

                    <div style="clear:left;">&nbsp;</div>
                    <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">
                        <span style="font-weight: bolder;">Trattamenti Associati alla Prenotazione</span> <br>

<?php if (isset($appuntamento)) { ?>
                            <div id="listaTrattamentiAssociati">
                            <?php
                            $trattamentiAssociati = null;
                            $trattamentiAssociati = DAOFactory::getPrenotazioniTrattamentiDAO()->queryByIdPrenotazione($appuntamento->id);

                            for ($i = 0; $i < count($trattamentiAssociati); $i++) {

                                $trattamento = DAOFactory::getTrattamentiDAO()->load($trattamentiAssociati[$i]->idPrenotazione)
                                ?>
                                    <div style="display: table-row; height: 35px">
                                        <div style="display: table-cell; width: 130px;">Trattamento:</div>
                                        <div style="display: table-cell; width: 130px;"><?php echo $trattamento->trattamento ?></div>
                                        <div style="display: table-cell; width: 130px;"><?php echo "<img src='img/icone/delete.png' onclick='eliminaTrattamentoAssociato(" . $trattamentiAssociati[$i]->id . ")'>"; ?></div>
                                        <div style="display: table-cell; width: 130px;"></div>
                                    </div>

        <?php
    }
}
?>


                                <div id="listaTrattamenti">
                                    <div class="accordion">
    <!-- accordion section 1 -->
    <h1 id="accordionhead_1">Trattamento 1</h1>
    <div id="accordioncontent_1" class="accordion-content">
        Content 1
    </div>

    <!-- accordion section 2 -->
    <h1 id="accordionhead_2">Trattamento 2</h1>
    <div id="accordioncontent_2" class="accordion-content">
        Content 2
    </div>

    <!-- accordion section 3 -->
    <h1 id="accordionhead_3">Trattamento 3</h1>
    <div id="accordioncontent_3" class="accordion-content">
        Content 3
    </div>

    <!-- accordion section 4 -->
    <h1 id="accordionhead_4">Trattamento 4</h1>
    <div id="accordioncontent_4" class="accordion-content">
        Content 4
    </div>
</div>
                                    
                                </div>
                        </div>


                        <table style="margin-left:auto; margin-right:auto;">



                            <tr>
                                <td colspan="3">



                                </td>
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
        //$( "#dataAppuntamento" ).datepicker({
        //changeMonth: true,
        //changeYear: true,
        //yearRange: '1900:<?php //echo date("Y");    ?>',
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





        $(function () {
            
            $("#cliente").autocomplete({
                source: "index.php?action=searchCliente",
                minLength: 3,
                select: function (event, ui) {
                    document.getElementById('idCliente').value = '';
                    
                    //var idClienteTMP =ui.item.id;
                    //alert(idClienteTMP);

                    $("#idCliente").val(ui.item.id);

                    $("#nomeCliente").val(ui.item.nome);
                    $("#nomeCliente").prop("disabled", true);

                    $("#cognomeCliente").val(ui.item.cognome);
                    $("#cognomeCliente").prop("disabled", true);

                    $("#telefonoCliente").val(ui.item.telefono);
                    $("#telefonoCliente").prop("disabled", true);

                    $("#emailCliente").val(ui.item.email);
                    $("#emailCliente").prop("disabled", true);

                    $('#nuovoCliente').css('display', 'block');
                    $('#listaPianiInCorso').css('display', 'block');
                    
                     $.ajax({
                    url: 'index.php?action=caricaPianoCuraInCorso',
                    method: 'POST',
                    data: {idCliente: ui.item.id},
                    success: function (data) {
                        $('#listaPianiInCorso').html(data);
                        
                    }

                });
               

                }
            });
  
        });

      

        function nuovoCliente() {

            $('#nuovoCliente').css('display', 'block');
            $('#listaPianiInCorso').css('display', 'block');
            $("#cliente").val('');

            $("#idCliente").val('');

            $("#nomeCliente").prop("disabled", false);
            $("#nomeCliente").val('');
            $("#cognomeCliente").prop("disabled", false);
            $("#cognomeCliente").val('');
            $("#telefonoCliente").prop("disabled", false);
            $("#telefonoCliente").val('');
            $("#emailCliente").prop("disabled", false);
            $("#emailCliente").val('');

        }


    </script>      

    <script type="text/javascript">
        var indiceTratt = 0;
        var trattamentiTMP = new Array();
        var trattamentiTMP11 = new Array();
        var trattamentiAss = new Array();


        $.ajax({
            url: "index.php?action=caricaInfoTrattamento",
            dataType: "json",
            data: {},
            success: function (data) {


                for (var i = 0; i < data["trattamenti"].length; i++) {
                    //OptionSelectCond += '<option value="'+data["condomini"][i]["id"]+'">'+data["condomini"][i]["nome"]+'</option>';
                    trattamentiTMP[i] = {id: "" + data["trattamenti"][i]["id"] + "", label: "" + data["trattamenti"][i]["trattamento"] + ""};

                    trattamentiTMP11[data["trattamenti"][i]["id"]] = data["trattamenti"][i]["trattamento"];
                }

            },
        });



        function associaTrattamento(id, riga) {
        //alert(id);
//        alert(testo);
//        alert(trattamentiTMP11[id]);
alert(riga);
var dati1xyy = $('#nSedute'+riga).val();
alert(dati1xyy);
            indiceTratt++;
            var rigaTrattamento = '';
//            rigaTrattamento += '<div style="display: table-row; height: 35px;" id="rigaTrattamento_' + indiceTratt + '">';
//            //rigaTrattamento += '<div style="display: table-cell; width: 130px;">Trattamento: ';
//            //rigaTrattamento += '</div>';
//            //rigaTrattamento += '<div style="display: table-cell; width: 130px;"><input id="trattamento' + indiceTratt + '" name="trattamento' + indiceTratt + '" value="' + trattamentiTMP11[id] + '" type="text">';
//            rigaTrattamento += '<div style="display: table-cell; width: 330px;">' + trattamentiTMP11[id];
//            rigaTrattamento += '</div>';
//            //------
//            rigaTrattamento += '<div style="display: table-cell; width: 130px;"><input id="data' + indiceTratt + '" name="data' + indiceTratt + '" placeholder="data appuntamento" type="text">';
//            rigaTrattamento += '</div>';
//            rigaTrattamento += '<div style="display: table-cell; width: 130px;"><input id="oraInizio' + indiceTratt + '" name="OraInizio' + indiceTratt + '" placeholder="Ora Inizio" type="text">';
//            rigaTrattamento += '</div>';
//            rigaTrattamento += '<div style="display: table-cell; width: 130px;"><input id="operatore' + indiceTratt + '" name="operatore' + indiceTratt + '" placeholder="operatore" type="text">';
//            rigaTrattamento += '</div>';
//             rigaTrattamento += '<div style="display: table-cell; width: 130px;"><input id="postazione' + indiceTratt + '" name="postazione' + indiceTratt + '" placeholder="postazione" type="text">';
//            rigaTrattamento += '</div>';
//            //------
//            rigaTrattamento += '<div style="display: table-cell; width: 130px;"><input id="idTrattamento' + indiceTratt + '" name="idTrattamento' + indiceTratt + '" value="' + id + '" type="hidden">';
//            rigaTrattamento += '</div>';
//            rigaTrattamento += '<div style="display: table-cell"><img src="img/icone/delete.png" height="20" id="eliminaTrattamento_' + indiceTratt + '" onclick="eliminaTrattamento(' + indiceTratt + ')"/>';
//            rigaTrattamento += '</div>';
//            rigaTrattamento += '</div>';

            $('#nNuoviTrattamenti').val(indiceTratt);

            $('#listaTrattamenti').append(rigaTrattamento);

            /*
             $('#trattamento'+indiceTratt).autocomplete({
             source: trattamentiTMP,
             select: function(event, ui) {
             // document.getElementById('idTrattamento'+indiceTratt).value = '';
             
             $('#idTrattamento'+indiceTratt).val(ui.item.id);
             
             }
             
             });
             
             */



        }
        function eliminaTrattamento(indiceRiga) {

            $('#rigaTrattamento_' + indiceRiga).remove();
            for (var k = indiceRiga + 1; k < indiceTratt; k++) {
                $('#rigaTrattamento_' + k).attr("id", "rigaTrattamento_" + (k - 1));
                $('#trattamento' + k).attr("name", "trattamento" + (k - 1));
                $('#trattamento' + k).attr("id", "trattamento" + (k - 1));
                $('#idTrattamento' + k).attr("name", "idTrattamento" + (k - 1));
                $('#idTrattamento' + k).attr("id", "idTrattamento" + (k - 1));
                $('#eliminaTrattamento_' + k).attr("onclick", "eliminaTrattamento(" + (k - 1) + ")");
                $('#eliminaTrattamento_' + k).attr("id", "eliminaTrattamento_" + (k - 1));
            }
            indiceTratt--;
            $('#nNuoviTrattamenti').val(indiceTratt);
        }





//VERIFICA PRESENZA APPUNTAMENTO
        function verificaDisponibilita() {
            //$("#delibera_del").change(function() { da verificare
            //alert("sssss"); 
            // assegno alla variabile dati, il contenuto del campo di input #testo
            // dal momento che questa funzione viene richiamata ogni volta che
            // scriviamo dentro il campo input, questo contenuto si aggiorna sempre

            
            var dati2 = $('#operatoreAppuntamento').val();
            var dati3 = $('#dataAppuntamento').val();
            // la semplicità con cui jquery tratta con ajax è imbarazzante
            // per non parlare dei problemi di compatibilità tra browser di cui
            // se ne occupa totalmente

            var data_send = "dato1=" + dati1 + "&dato2=" + dati2 + "&dato3=" + dati3;

            $.ajax({
                type: "POST",
                url: "index.php?action=infoVerificaAppuntamento",
                data: data_send,
                success: function (data) {
                    $('#verificaApp').html(data);
                }
            });
        }
        
        
    </script>