<?php
global $appuntamento;



//global $listaTrattamenti;


  $listaTrattamenti = DAOFactory::getTrattamentiDAO()->queryAll();

 //print_r($listaTrattamenti);



header("location: index.php?action=appuntamnetomodifica");


exit;
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

    });
</script>
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
                    <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px; background: #366c88; color: #FFF; text-align: center;">
                        <span style="font-weight: bold;">STATUS Appuntamento</span>&nbsp;
                         <?php $status = DAOFactory::getPrenotazioneStatusDAO()->queryAll(); ?>
                        <select name="statusAppuntamento" id="statusAppuntamento" style="width: 25%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" required="" >
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
                    <div class="clear">&nbsp;</div>


                    <?php
                    $cliente = DAOFactory::getClientiDAO()->load($appuntamento->idCliente);
                    ?>
                    <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;" id="nuovoCliente">
                        <input type="text" name="nomeCliente"  id="nomeCliente" placeholder="Nome Cliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" required="" value="<?php echo $cliente->nome; ?>" disabled="" />&nbsp;
                        <input type="text" name="cognomeCliente" id="cognomeCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Cognome Cliente" value="<?php echo $cliente->cognome; ?>" disabled="" /><br><div style="clear:left;">&nbsp;</div>
                        <input type="text" name="telefonoCliente" id="telefonoCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Cellulare Cliente" value="<?php echo $cliente->cellulare; ?>" disabled="">&nbsp;
                        <input type="text" name="emailCliente" id="emailCliente" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Email Cliente" value="<?php echo $cliente->email; ?>" disabled="">
                        <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $appuntamento->idCliente; ?>">

                        
                    </div>
                    <div style="clear:left;">&nbsp;</div>
                    <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">

                        <span style="font-weight: bolder;">Postazione e Operatore</span> <br>


                        <?php 
                        $postazioni = DAOFactory::getPostazioniDAO()->queryAll(); 
                        $operatori = DAOFactory::getDipendenteDAO()->queryAll(); 
                        ?>

                        <select name="postazioneAppuntamento" id="postazioneAppuntamento" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" required="" >
                            <option value="0">-- Seleziona la Postazione --</option>
                            <?php
                            for ($i = 0; $i < count($postazioni); $i++) {
                                $postazione = $postazioni[$i];
                                ?>
                                <option value="<?php echo $postazione->id ?>" <?php
                            if (isset($appuntamento->idCalendario)) {
                                if ($appuntamento->idCalendario == $postazione->id) {
                                    echo "selected='selected'";
                                }
                            }
                                ?>><?php echo $postazione->postazione; ?></option>
                                    <?php } ?>
                        </select> 

                         <select name="operatoreAppuntamento" id="operatoreAppuntamento" style="width: 45%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" required="" >
                                    <option value="0">-- Seleziona l'Operatore --</option>
                                    <?php
                                    for ($k = 0; $k < count($operatori); $k++) {
                                        $operatore = $operatori[$k];
                                        ?>
                                        <option value="<?php echo $operatore->id ?>" <?php
                                                if (isset($appuntamento)) {
                                                    if ($operatore->id == $appuntamento->idOperatore) {
                                                        echo "selected='selected'";
                                                    }
                                                }
                                                ?>><?php echo $operatore->nome." ".$operatore->cognome; ?></option>
<?php } ?>
                                </select> 
                        <div style="clear:left;">&nbsp;</div>
                        <span style="font-weight: bolder;">Data Appuntamento, Ora Inizio e Fine</span> <br>
                        <input type="text" name="dataAppuntamento" id="dataAppuntamento" value="<?php if (isset($appuntamento->data)) {
                                        echo dateFromDb($appuntamento->data);
                                    } ?>" style="width: 30%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" placeholder="Data Appuntamento" required="" />
                        <input type="text" name="OraInizioAppuntamento" id="OraInizioAppuntamento" value="<?php if (isset($appuntamento)) {
                                        echo $appuntamento->oraInizio;
                                    } ?>" style="width: 30%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);" class="timepicker" required="">
                        <input type="text" name="OraFineAppuntamento" id="OraFineAppuntamento"  value="<?php if (isset($appuntamento)) {
                                        echo $appuntamento->oraFine;
                                    } ?>" class="timepicker" style="width: 30%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204);">
                    </div>

                    <div style="clear:left;">&nbsp;</div>
                    <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">

                        <textarea name="noteAppuntamento" id="noteAppuntamento" placeholder="Eventuali Note" style="border: 1px dotted #333333; padding: 5px; width: 100%;"><?php
                                    if (isset($appuntamento)) {
                                        echo $appuntamento->note;
                                    }
                                    ?></textarea>

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
                                        <td style="border-bottom: 1px dotted #057fd0;">
                                        <a href="javascript: associaTrattamento('<?php echo $trattamento->id; ?>')" style="font-weight: bold">       
    <?php
    if (!isBlankOrNull($trattamento->trattamento)) {
        echo $trattamento->trattamento;
    }
    ?>
                                        </a>
                                            
                                        </td>
                                        <td style="border-bottom: 1px dotted #057fd0;"></td>
                                        <td style="border-bottom: 1px dotted #057fd0;"><?php echo $trattamento->tempo; ?></td>
                                        <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">
                                            <a href="javascript: associaTrattamento('<?php echo $trattamento->id; ?>')"><img src='img/icone/aggiungi.png' height="20"></a>


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

                            <?php if (isset($appuntamento)) { 
                                
                                $trattamentiAppuntamento = DAOFactory::getPrenotazioniTrattamentiDAO()->queryByIdPrenotazione($appuntamento->id);

                                
                                
                                ?>
                            <div id="listaTrattamentiAssociati">
                                <?php
                                $trattamento = '';
                                $trattamentiAssociati = null;
                                $trattamentiAssociati = DAOFactory::getPrenotazioniTrattamentiDAO()->queryByIdPrenotazione($appuntamento->id);
                                

                                for ($i = 0; $i < count($trattamentiAssociati); $i++) {
                                   

                                    $trattamento = DAOFactory::getTrattamentiDAO()->load($trattamentiAssociati[$i]->idTrattamento);
                                   
                                    ?>
                                    <div style="display: table-row; height: 35px">
                                        <div style="display: table-cell; width: 130px;">Trattamento:</div>
                                        <div style="display: table-cell; width: 330px;"><?php echo $trattamento->trattamento ?></div>
                                        <div style="display: table-cell; width: 130px;"><?php echo "<img src='img/icone/delete.png' onclick='eliminaTrattamentoAssociato(" . $trattamentiAssociati[$i]->id . ")' height='20'>"; ?></div>
                                        <div style="display: table-cell;"></div>
                                    </div>

        <?php
    }
}
?>


                            <div id="listaTrattamenti"></div>
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

                    $("#idCliente").val(ui.item.id);

                    $("#nomeCliente").val(ui.item.nome);
                    $("#nomeCliente").prop("disabled", true);

                    $("#cognomeCliente").val(ui.item.cognome);
                    $("#cognomeCliente").prop("disabled", true);

                    $("#telefonoCliente").val(ui.item.telefono);
                    $("#telefonoCliente").prop("disabled", true);

                    $("#emailCliente").val(ui.item.email);
                    $("#emailCliente").prop("disabled", true);

                    //$('#nuovoCliente').css('display', 'block');

                }
            });

        });

        function nuovoCliente() {

            //$('#nuovoCliente').css('display', 'block');
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



        function associaTrattamento(id) {
//        alert(id);
//        alert(testo);
//        alert(trattamentiTMP11[id]);
            indiceTratt++;
            var rigaTrattamento = '';
            rigaTrattamento += '<div style="display: table-row; height: 35px;" id="rigaTrattamento_' + indiceTratt + '">';
            rigaTrattamento += '<div style="display: table-cell; width: 130px;">Trattamento: ';
            rigaTrattamento += '</div>';
            //rigaTrattamento += '<div style="display: table-cell; width: 130px;"><input id="trattamento' + indiceTratt + '" name="trattamento' + indiceTratt + '" value="' + trattamentiTMP11[id] + '" type="text">';
            rigaTrattamento += '<div style="display: table-cell; width: 330px;">' + trattamentiTMP11[id];
            rigaTrattamento += '</div>';
            rigaTrattamento += '<div style="display: table-cell; width: 130px;"><input id="idTrattamento' + indiceTratt + '" name="idTrattamento' + indiceTratt + '" value="' + id + '" type="hidden">';
            rigaTrattamento += '</div>';
            rigaTrattamento += '<div style="display: table-cell"><img src="img/icone/delete.png" height="20" id="eliminaTrattamento_' + indiceTratt + '" onclick="eliminaTrattamento(' + indiceTratt + ')"/>';
            rigaTrattamento += '</div>';
            rigaTrattamento += '</div>';

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

    </script>