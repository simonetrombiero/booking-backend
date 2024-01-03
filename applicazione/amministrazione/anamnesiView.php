<?php
global $listaAnamnesi, $questionario, $cliente, $misurazioni;

//print_r($questionario);
//print_r($questionario);
//exit;

$nominativoCliente = '';
$sessoCliente = '';
$anamnesticoCorpo = array();
if (isset($questionario->paziente)) {
    $nominativo = DAOFactory::getClientiDAO()->load($questionario->paziente);
    $nominativoCliente = $nominativo->nome . " " . $nominativo->cognome . "</b> <br>";
    $sessoCliente = $nominativo->sesso;

    $tmpCorpo = DAOFactory::getAnamnesticoCorpoDAO()->queryByIdAnamnestico($questionario->id);
    //print_r($tmpCorpo);
    for ($g = 0; $g < count($tmpCorpo); $g++) {
        $corpo = $tmpCorpo[$g];
       // $anamnesticoCorpo[$corpo->riga] = $corpo->descrizione;
    }
}
?>



<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">
<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js"></script>-->
<link href="../../_firma/jqueryUI/css/jquery.signature.css" rel="stylesheet">
<script src="../../_firma/jqueryUI/js/jquery.signature.js"></script>
<script type="text/javascript">
    $(function () {
        $("#tabs").tabs();
        var sig = $('#sig').signature();
        var sig2 = $('#sig2').signature();
        var sig3 = $('#sig3').signature();
        $('#disable').click(function () {
            var disable = $(this).text() === 'Disable';
            $(this).text(disable ? 'Enable' : 'Disable');
            sig.signature(disable ? 'disable' : 'enable');
        });
        $('#clearSig').click(function () {
            sig.signature('clear');
            alert("ciao");
            return;
        });
        $('#clearSig2').click(function () {
            sig2.signature('clear');

        });
        $('#clearSig3').click(function () {
            sig3.signature('clear');

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
<form action="index.php" id="gestioneQuestionario" name="gestioneQuestionario" method="post">
    <input type="hidden" id="action" name="action">
    <input type="hidden" id="id" name="id">
</form>     

<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->

            <form action="index.php" method="post" id="formAnamnesi" name="formAnamnesi">
                <input type="hidden" name="action" value="salvaAnamnesi"/>
                <input type="hidden" name="idCliente" value="<?php
if (isset($cliente)) {
    echo $cliente->id;
}
?>"/>


                <div>
                    <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                        <h2 style="float: left; padding: 0px 15px; color: #366c88;">Questionario Anamnestico: 
                            <a href="#" onclick="document.getElementById('gestioneQuestionario').id.value = '<?php echo $questionario->paziente; ?>'; document.getElementById('gestioneQuestionario').action.value = 'visualizzaCliente'; document.getElementById('gestioneQuestionario').submit();" class="linkScheda"><?php echo $nominativoCliente; ?></a>
                        </h2>
                        <div style=" text-align: right; padding: 10px 15px;">
                            <a href="index.php?action=clientiList" class="btn btn-green" >Lista Clienti</a>&nbsp;
                        </div>
                    </div></div>
                <div>





                    <!--</form>-->
                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">QUESTIONARIO ANAMNESTICO</a></li>
                            <li><a href="#tabs-2">ANAMNESI CORPO</a></li>
                            <li><a href="#tabs-3">CONSENSI</a></li>

                        </ul>
                        <div id="tabs-1">
                            <?php
                            $questionarioGruppo = DAOFactory::getAnamnesticoQuestionarioGruppoDAO()->queryByIdAnamnestico("1");
                            include 'applicazione/amministrazione/anamnesi/anamnesiView.php';
                            ?>

                        </div>
                        <div id="tabs-2">
                            <?php
                            
                            //$questionarioGruppo = DAOFactory::getAnamnesticoQuestionarioGruppoDAO()->queryByIdAnamnestico("1");
                            if(isset($misurazioni)){
                                include 'applicazione/amministrazione/anamnesi/anamnesiCorpoView.php';
                            }else{
                                echo '<p>Nessun dato presente';
                            }
                            ?>            
                        </div>
                        <div id="tabs-3">
<?php
//$questionarioGruppo = DAOFactory::getAnamnesticoQuestionarioGruppoDAO()->queryByIdAnamnestico("1");
//include 'applicazione/amministrazione/anamnesi/privacy.php';
?>             
                        </div>

                    </div>


                    <div id="divQuestionario">


                    </div>


                </div>    
            </form>




        </div>
    </div>
    <div style="clear:left;">&nbsp;</div>
