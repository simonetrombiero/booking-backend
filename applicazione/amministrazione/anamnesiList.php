<?php
global $listaAnamnesiPZ, $paziente;
//print_r($listaAnamnesiPZ);
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
                        "order": [[0, "desc"]], //[0, "asc"]
                        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
                        "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
                    });

                });
            </script>





            <form action="index.php" id="gestioneQuestionario" name="gestioneQuestionario" method="post">
                <input type="hidden" id="action" name="action">
                <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $paziente->id; ?>">
                <input type="hidden" id="id" name="id">
            </form>      



            <!--<div class="grid grid-pad">-->
            <!--<div class="col-1-1">-->
            <div>
                <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">QUESTIONARI: <a href="#" onclick="document.getElementById('gestioneQuestionario').id.value='<?php echo $paziente->id; ?>'; document.getElementById('gestioneQuestionario').action.value='visualizzaCliente'; document.getElementById('gestioneQuestionario').submit();" class="linkScheda"><?php                        echo $paziente->nome.' '.$paziente->cognome; ?></a>
                    </h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="#" class="btn btn-green" onclick="document.getElementById('gestioneQuestionario').action.value = 'nuovoQuestionario'; document.getElementById('gestioneQuestionario').submit();">Nuovo Questionario</a>
                        <!--<a href="index.php?action=nuovoQuestionario" class="btn btn-green" >Nuovo Questionario</a>-->
                    </div>
                </div></div>
            <!--</div>-->
            <!--</div>-->

            <!--<div class="grid grid-pad">-->
            <!--<div class="col-1-1">-->
            <div style="padding: 10px;">

                <table style="width: 100%" id="datatable">
                    <thead>
                        <tr>
                            <th align="left">Data</th>
                            <th align="left">Questionario Anamnestico</th>
                            <th>Misurazioni</th>
                            <th style="width: 15%; text-align: left;">Azioni</th>
                        </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($listaAnamnesiPZ); $i++) {
                            $anamnesi = $listaAnamnesiPZ[$i];
                            ?>
                            <tr>
                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <span style="display: none"><?php echo $anamnesi->dataCompilazione; ?></span>
                                    <?php
                                    echo dateFromDb($anamnesi->dataCompilazione);
                                    ?>
                                </td>
                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <?php
                                    if (!isBlankOrNull($anamnesi->idAnamnestico)) {
                                        $questionario = DAOFactory::getAnamnesticoDAO()->load($anamnesi->idAnamnestico);
                                        echo $questionario->descrizione;
                                    }
                                    ?>

                                </td>
                                <td style="border-bottom: 1px dotted #057fd0; text-align: center">
                                    <?php
                                    $numMisusazione = 0;
                                    $tmp = DAOFactory::getAnamnesticoCorpoHeadDAO()->queryByIdQuestionario($anamnesi->id);
                                    $numMisusazione = count($tmp);
                                    if ($numMisusazione > 0) {

                                        echo $numMisusazione;
                                    } else {
                                        echo ' nessuna ';
                                    }
                                    ?>
                                </td>
                                <td style="vertical-align: middle; text-align: left; border-bottom: 1px dotted #057fd0;">

                                    <a href="#" onclick="document.getElementById('gestioneQuestionario').id.value = '<?php echo $anamnesi->id; ?>';
                                            document.getElementById('gestioneQuestionario').action.value = 'visualizzaAnamnesi';
                                            document.getElementById('gestioneQuestionario').submit();">
                                        <img src="img/icone/view.png" alt="Visualizza Questionario" title="Visualizza Questionario" style="width: 25px; padding: 2px"/></a>
                                         <a href="#" onclick="document.getElementById('gestioneQuestionario').id.value = '<?php echo $anamnesi->id; ?>';
                                            document.getElementById('gestioneQuestionario').action.value = 'eliminaAnamnesi';
                                            document.getElementById('gestioneQuestionario').submit();">
                                        <img src="img/icone/delete.png" alt="Elimina Questionario" title="Elimina Questionario" style="width: 25px; padding: 2px"/></a>
                                    <a href="#" onclick="document.getElementById('gestioneQuestionario').id.value = '<?php echo $anamnesi->id; ?>';
                                            document.getElementById('gestioneQuestionario').action.value = 'listaMisurazioneCorpo';
                                            document.getElementById('gestioneQuestionario').submit();">
                                        <img src="img/icone/misurazioni.png" alt="Misurazioni" title="Misurazioni" style="width: 25px; padding: 2px"/></a>
                                    <?php if ($numMisusazione > 1) { ?>

                                        <a href="#" onclick="document.getElementById('gestioneQuestionario').id.value = '<?php echo $anamnesi->id; ?>';
                                            document.getElementById('gestioneQuestionario').action.value = 'confrontaMisurazioni';
                                            document.getElementById('gestioneQuestionario').submit();">
                                            <img src="img/icone/check.png" alt="Confronta Misurazioni" title="Confronta Misurazioni" style="width: 25px; padding: 2px"/></a>


                                    <?php } ?>

                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>


                <!--FINE--->




            </div>
        </div>
        <div style="clear:left;">&nbsp;</div>

