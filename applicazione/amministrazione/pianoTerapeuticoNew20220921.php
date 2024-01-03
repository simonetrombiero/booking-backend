<?php
//global $cliente, $listaTrattamenti;
$idCliente = getRequest("idCliente");
$cliente = DAOFactory::getClientiDAO()->load($idCliente);

$listaTrattamenti = DAOFactory::getTrattamentiDAO()->queryAll();
?>
<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->

            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <!--                <link rel="stylesheet" type="text/css" href="applicazione/css/dataTable/jquery.dataTables.css">
                            <script type="text/javascript" language="javascript" src="applicazione/js/dataTable/jquery.dataTables.min.js"></script>
                            <script type="text/javascript">
                                $(function() {
                                    $('#datatable').dataTable({
                                        "order": [[ 0, "asc" ]], //[0, "desc"]
                                        "lengthMenu": [[-1,10, 25, 50, 100], ["Tutti", 10, 25, 50, 100]],
                                        "language": {"url": "applicazione/js/dataTable/languages/dataTables_IT.txt"}
                                    });
                                });
                            </script>-->
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





            <form action="index.php" id="gestioneSchedaLaser" name="gestioneSchedaLaser" method="post">
                <input type="hidden" id="action" name="action">
                <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">
                <input type="hidden" id="idScheda" name="idScheda">
            </form>  
            <form action="index.php" id="Cliente" name="Cliente" method="post">
                <input type="hidden" id="action" name="action">
                <input type="hidden" id="idCliente" name="id" value="<?php echo $cliente->id; ?>">

            </form> 



            <form action="index.php" method="post" id="formPiano" name="formPiano">
                <input type="hidden" name="action" value="salvaPianoTerapeutico"/>
                <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">
                <input type="hidden" name="nNuoviTrattamenti" id="nNuoviTrattamenti" value="0">
                <input type="hidden" name="idPiano" value="<?php //if (isset($appuntamento)) {
                                                                //  echo $appuntamento->id;
                                                                // }
?>"/>
                <div class="grid grid-pad">
                    <div class="col-1-1">
                        <div>
                            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                                <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                                    NUOVO PIANO TERAPEUTICO: <?php echo $cliente->nome . " " . $cliente->cognome; ?>
                                </h2>
                                <div style=" text-align: right; padding: 10px 15px;"> 
                                    <a href="index.php?action=clientiList" class="btn btn-green" >Annulla</a>
                                    <input type="submit" value="Salva Piano" class="btn btn-green">
                                </div>
                            </div></div>
                    </div>
                </div>


 
                <div class="grid grid-pad">
                    <!--<div class="col-1-1">-->
                    <div class="col-6-12">
                        <div>
                            <img src="img/schedaMorfologica.jpg">
                        </div>

                    </div>
                    <div class="col-6-12">
                        <div style="padding: 10px;">
                            <!--INIZIO--->  

                            <table>
                                <tr>
                                    <td>Titolo </td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="titoloPiano" id="titoloPiano" value="<?php
                if (isset($incarico)) {
                    echo $incarico->nome;
                }
?>"></td>
                                </tr>
                                 <tr>
                                <td>Stato</td>
                                <td>&nbsp;</td>
                                <?php 
                               $stati = DAOFactory::getPianoTrattamentoStatusDAO()->queryAll();
                                ?>
                                <td>
                                    <select name="statoPiano">
                                        <option>-- Seleziona --</option>
                                        <?php 
                                        for ($kk=0; $kk<count($stati);$kk++){
                                            $stato = $stati[$kk];
                                        ?>
                                        <option value="<?php echo $stato->id; ?>" <?php //if($stato->id==$pianoTrattamento->stato){
                                        if($stato->id=='nesco'){ ?> selected="" <?php } ?>><?php echo $stato->descrizione;?></option>
                                        <?php 
                                         }
                                        ?>
                                    </select>
                                   
                                    
                                </td>
                            </tr>
                                 <tr>
                                    <td>Data Creazione </td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="dataCreazione" id="dataCreazione" value="<?php
                if (isset($incarico)) {
                    echo $incarico->nome;
                }
?>"></td>
                                </tr>
                                <tr>
                                    <td>Data Inizio </td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="dataInizio" id="dataInizio" value="<?php
                if (isset($incarico)) {
                    echo $incarico->nome;
                }
?>"></td>
                                </tr>
                                <tr>
                                    <td>Numero Sedute</td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="numeroSedute" id="numeroSedute" value="<?php
                                               if (isset($incarico)) {
                                                   echo $incarico->nome;
                                               }
                                               ?>"></td>
                                </tr>
                                <tr>
                                    <td>Importo </td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="importoPiano" id="importoPiano" value="<?php
                                               if (isset($incarico)) {
                                                   echo $incarico->nome;
                                               }
                                               ?>"></td>
                                </tr>
<!--                                <tr>
                                    <td>Stato </td>
                                    <td>&nbsp;</td>
                                    <td>

                                    </td>
                                </tr>-->
                                <tr>
                                    <td>Note </td>
                                    <td>&nbsp;</td>
                                    <td><textarea name="notePiano" id="notePiano"></textarea></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <!--<input type="submit" class="btn btn-green" value="Salva">-->
                                    </td>
                                </tr>


                            </table> 


                        </div>
                        <div style="width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">
                            <span style="font-weight: bolder;">Trattamenti Associati Al Piano Terapeutico</span> <br>

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


                                <div id="listaTrattamenti"></div>
                            </div>



                            <!--FINE--->




                        </div>

                    </div>
                </div>
            </form>
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
                            <th>Importo</th>
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
                            switch ($trattamento->classificazione) {

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

                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <?php
                                    if (!isBlankOrNull($trattamento->categoria)) {

                                        $categoria = DAOFactory::getCategorieTattamentiDAO()->load($trattamento->categoria);
                                        echo $categoria->categoria;
                                    }
                                    ?>
                                </td>

                                <td style="border-bottom: 1px dotted #057fd0;"><?php echo $trattamento->tempo; ?></td>
                                <td style="border-bottom: 1px dotted #057fd0;"><?php echo $trattamento->costo; ?></td>
                                <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">
                                    <a href="javascript: associaTrattamento('<?php echo $trattamento->id; ?>')"> <img src='img/icone/aggiungi.png' height="20"> </a>


                                </td>
                            </tr>
    <?php
}
?>
                    </tbody>
                </table>

            </div>

            <div style="clear:left;">&nbsp;</div>







            <script type="text/javascript">
                var indiceTratt = 0;
                var trattamentiTMP = new Array();
                var trattamentiTMP11 = new Array();
                var trattamentiTMPCosto = new Array();
                var trattamentiAss = new Array();
                var totaleTrattamento = 0;


                $.ajax({
                    url: "index.php?action=caricaInfoTrattamento",
                    dataType: "json",
                    data: {},
                    success: function (data) {


                        for (var i = 0; i < data["trattamenti"].length; i++) {
                            //OptionSelectCond += '<option value="'+data["condomini"][i]["id"]+'">'+data["condomini"][i]["nome"]+'</option>';
                            trattamentiTMP[i] = {id: "" + data["trattamenti"][i]["id"] + "", label: "" + data["trattamenti"][i]["trattamento"] + ""};

                            trattamentiTMP11[data["trattamenti"][i]["id"]] = data["trattamenti"][i]["trattamento"];
                            trattamentiTMPCosto[data["trattamenti"][i]["id"]] = data["trattamenti"][i]["costo"];
                        }

                    },
                });



                function associaTrattamento(id) {

                    var sedute = $('#numeroSedute').val();
                    //alert(sedute);
                    if ((isNaN(sedute)) || sedute == '') {
                        sedute = 1;
                        $('#numeroSedute').val(sedute);
                    }
                    // alert(sedute);
                    //alert(id);
                    //alert(testo); 
                    //alert(trattamentiTMPCosto[id]);
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
                    rigaTrattamento += '<div style="display: table-cell; width: 150px;">€ ' + trattamentiTMPCosto[id];
                    rigaTrattamento += '</div>';
                    rigaTrattamento += '<div style="display: table-cell; width: 150px;">€ ' + (trattamentiTMPCosto[id] * sedute).toFixed(2);
                    rigaTrattamento += '</div>';
                    rigaTrattamento += '<div style="display: table-cell"><img src="img/icone/delete.png" height="20" id="eliminaTrattamento_' + indiceTratt + '" onclick="eliminaTrattamento(' + indiceTratt + ')"/>';
                    rigaTrattamento += '</div>';
                    rigaTrattamento += '</div>';
                    
                    totaleTrattamento = totaleTrattamento + (trattamentiTMPCosto[id] * sedute);

                    $('#importoPiano').val(totaleTrattamento);
                    
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
                    
                    //var importo TMP = = $('#importoPiano').val();

                    $('#rigaTrattamento_' + indiceRiga).remove();
                    for (var k = indiceRiga + 1; k <= indiceTratt; k++) {
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

                    var dati1 = $('#postazioneAppuntamento').val();
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