<?php
global $documentiCliente, $cliente;

?>
<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->

            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <style>
                span.status-green {
                    background: none repeat scroll 0 0 #339900;
                    color: #ffffff;
                    display: block;
                    font-family: Arial,serif;
                    font-size: 13px;
                    height: 21px;
                    line-height: 21px;
                    text-align: center;
                }
                span.status-open {
                    color: #333333;
                    display: block;
                    font-family: Arial,serif;
                    font-size: 13px;
                    line-height: 21px;
                    text-align: center;
                    font-weight: bold;
                }

            </style>

            <link rel="stylesheet" type="text/css" href="vendors/dataTables/jquery.dataTables.css">
            <script type="text/javascript" language="javascript" src="vendors/dataTables/jquery.dataTables.min.js"></script>
            <script type="text/javascript">
                $(function() {
                    $('#datatable').dataTable({
                        "order": [[ 0, "desc" ]], 
                        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
                        "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"},
                    });
                });
            </script>




            <form action="index.php" id="gestioneDocumento" name="gestioneDocumento" method="post">
                <input type="hidden" id="action" name="action">
                <input type="hidden" id="id" name="id">
            </form>  

            <div>
                <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        SITUAZIONE CONTABILE: <?php echo $cliente->cognome . " " . $cliente->nome; ?></h2>
                        <div style=" text-align: right; padding: 10px 15px;">
                            <a href="index.php?action=contabilita" class="btn btn-green" ><<</a>
                        </div>
                    </div></div>
                    <div style="padding: 10px;">

                        <table style="width: 100%" id="datatable">
                            <thead>
                                <tr>
                                    <th style="width: 80px">
                                        Numero
                                    </th>
                                    <th style="width: 80px">
                                        Data
                                    </th>
                                    <th style="width: 80px">
                                        Stato
                                    </th>
                                    <th style="width: 100px">
                                        Importo
                                    </th>
                                    <th style="width: 100px">
                                        Importo Saldato
                                    </th>
                                    <th style="width: 100px">
                                        Importo Da Saldare
                                    </th>
                                    <th style="width: 70px">
                                        Azioni
                                    </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th colspan="3"></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                for ($i = 0; $i < count($documentiCliente); $i++) {
                                    $documento = $documentiCliente[$i];
                                    ?>
                                    <tr>
                                        <td>
                                            <div style="text-align: right; margin-right: 10px">
                                                <?php
                                                                    //echo $documento->progressivo . "/" . $documento->anno;
                                                echo $documento->id;
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: right; margin-right: 10px">
                                                <?php
                                                echo dateFromDb($documento->data);
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            if ($documento->totaleDocumento <= $documento->totaleSaldato) {
                                                ?>
                                                <span class="status-green">pagato</span>
                                            <?php } else {
                                                ?>
                                                <span class="status-open">
                                                    aperto
                                                </span>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div style="text-align: right; margin-right: 10px">
                                                <?php
                                                echo number_format($documento->totaleDocumento, 2, ",", "") . " €";
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: right; margin-right: 10px">
                                                <?php
//                                                                    $accontiDocumento = DAOFactory::getAccontodocumentoDAO()->queryByIdDocumento($documento->id);
//                                                                    $importoAcconti = 0;
//                                                                    for ($k = 0; $k < count($accontiDocumento); $k++) {
//                                                                        $acconto = $accontiDocumento[$k];
//                                                                        $importoAcconti += $acconto->importo;
//                                                                    }
//                                                                    echo number_format($documento->totaleSaldato + $importoAcconti, 2, ",", "") . " €";
                                                echo number_format($documento->totaleSaldato, 2, ",", "") . " €";
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: right; margin-right: 10px">
                                                <?php
                                                                   // echo number_format($documento->totaleDaSaldare - $importoAcconti, 2, ",", "") . " €";
                                                echo number_format($documento->totaleDaSaldare, 2, ",", "") . " €";
                                                ?>
                                            </div>
                                        </td>
                                        <td style="text-align: center">
                                            <a href="#" onclick="document.getElementById('gestioneDocumento').id.value = '<?php echo $documento->id; ?>';
                                            document.getElementById('gestioneDocumento').action.value = 'visualizzaDocumento';
                                            document.getElementById('gestioneDocumento').submit();">

                                            <img src="applicazione/img/icone/view.png" alt="Visualizza" title="Visualizza" style="width: 25px; padding: 2px"/>
                                        </a>
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

