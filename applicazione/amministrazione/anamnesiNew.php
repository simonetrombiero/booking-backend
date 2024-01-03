<?php
//global $listaAnamnesi, $questionario, $cliente;
global $listaAnamnesi, $cliente, $clientePrivacy;

//echo '<pre>';
//print_r($cliente);
//print_r($questionario);
//print_r($listaAnamnesi);
$anmnesiCorpo = DAOFactory::getAnamnesticoDAO()->load("1"); //
//print_r($anmnesiCorpo);
//exit;
?>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">
<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js"></script>-->
<script type="text/javascript" src="../../_firma/jqueryUI/js/jquery.ui.touch-punch.min.js"></script>
<link href="../../_firma/jqueryUI/css/jquery.signature.css" rel="stylesheet">
<script src="../../_firma/jqueryUI/js/jquery.signature.js"></script>
<script type="text/javascript">
    $(function () {
        $("#tabs").tabs();
        var sig = $('#sig').signature();
        var sig2 = $('#sig2').signature();
        var sig3 = $('#sig3').signature();
        var sig0 = $('#sig0').signature();
        $('#disable').click(function () {
            var disable = $(this).text() === 'Disable';
            $(this).text(disable ? 'Enable' : 'Disable');
            sig.signature(disable ? 'disable' : 'enable');
        });
        $('#clearSig').click(function () {
            sig.signature('clear');
            //alert("ciao");
            return;
        });
        $('#clearSig2').click(function () {
            sig2.signature('clear');

        });
        $('#clearSig3').click(function () {
            sig3.signature('clear');

        });
        $('#clearSig0').click(function () {
            sig0.signature('clear');

        });
        $('#json').click(function () {
            alert(sig.signature('toJSON'));
        });
        $('#svg').click(function () {
            alert(sig.signature('toSVG'));
        });

    });
    function setQuestionario() {
        //var dataPrint = $("#dataStampa").val();
        var select = document.getElementById('tipoQuestionario');
        var value = select.options[select.selectedIndex].value;
        if (value == 0) {
            alert("Seleziona il Questionario da Compliare");

        } else {
            //alert(dataPrint);


            $.ajax({
                url: 'index.php?action=caricaInfoQuestionario',
                method: 'POST',
                data: {id: value},
                success: function (data) {
                    $('#divQuestionario').html(data);
                }

            });


            /* $.ajax({
             
             // url: 'index.php?action=caricaInfoStampeAppuntamenti',
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
             });*/
//            if (val == 3) {
//                $('#documentoDefinitivo option[value=0]').prop('selected', true);
//            } else {
//                $('#documentoDefinitivo option[value=1]').prop('selected', true);
//            }


        }




    }

</script>

<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->

            <form action="index.php" method="get" id="formAnamnesi" name="formAnamnesi">
                <input type="hidden" name="action" value="salvaAnamnesi"/>
                <input type="hidden" name="idCliente" value="<?php
if (isset($cliente)) {
    echo $cliente->id;
}
?>"/>

                <div>
                    <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                        <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                            <?php
                            if (!isset($questionario)) {
                                //echo "Nuovo Questionario Anamestico ".$cliente->nome." ".$cliente->cognome;
                                echo "Nuovo Questionario Anamnestico ";
                            } else {
                                echo "Modifica Questionario Anamnestico";
                            }
                            ?></h2>
                        <div style=" text-align: right; padding: 10px 15px;">
                            <a href="index.php?action=clientiList" class="btn btn-green" >Annulla</a>&nbsp;<input type="submit" class="btn btn-green" value="Salva">
                        </div>
                    </div></div>
                <div>





                    <!--</form>-->
                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">QUESTIONARIO ANAMNESTICO</a></li>
                            <li><a href="#tabs-2">ANAMNESI CORPO</a></li>
                            <li><a href="#tabs-3">CONSENSI</a></li>
                            <?php if (!$clientePrivacy) { ?>
                                <li><a href="#tabs-4">PRIVACY</a></li>
                            <?php } ?>

                        </ul>
                        <div id="tabs-1">
                            <?php
                            $questionarioGruppo = DAOFactory::getAnamnesticoQuestionarioGruppoDAO()->queryByIdAnamnestico("1");
                            include 'applicazione/amministrazione/anamnesi/anamnesiNew.php';
                            ?>

                        </div>
                        <div id="tabs-2">
                            <?php
                            //$questionarioGruppo = DAOFactory::getAnamnesticoQuestionarioGruppoDAO()->queryByIdAnamnestico("1");
                            include 'applicazione/amministrazione/anamnesi/anamnesiCorpoNew.php';
                            ?>            
                        </div>
                        <div id="tabs-3">
                            <?php
                           
                            include 'applicazione/amministrazione/anamnesi/consensoNew.php';
                            ?>             
                        </div>
                        <?php if (!$clientePrivacy) { ?>
                            <div id="tabs-4">
                                <?php
                                include 'applicazione/amministrazione/anamnesi/privacy.php';
                                ?>  

                            </div>
                        <?php } ?>

                    </div>


                    <div id="divQuestionario">


                    </div>


                </div>    
            </form>




        </div>
    </div>
    <div style="clear:left;">&nbsp;</div>
