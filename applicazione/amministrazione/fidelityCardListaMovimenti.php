<?php
global $listaMovimentiFidelity;
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
                        "order": [[0, "desc"]], //[0, "desc"]
                        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
                        "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
                    });

                });
            </script>




            
                <form action="index.php" id="gestioneFidelityCard" name="gestioneFidelityCard" method="post">
                    <input type="hidden" id="action" name="action">
                    <input type="hidden" id="id" name="idCard">
                </form>      


            <!--<div class="grid grid-pad">-->
            <!--<div class="col-1-1">-->
            <div>
                <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        LISTA EROGAZIONE PUNTI</h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="index.php?action=fidelityCard" class="btn btn-green" >Indietro</a>
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
                            <th>Data</th>
                            <th>Descrizione</th>
                            <th>Card N.</th>
                            <th>Cliente</th>
                            <th>Importo Speso</th>
                            <th>Punti Erogati</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($listaMovimentiFidelity); $i++) {
                            $rigaFidelity = $listaMovimentiFidelity[$i];
                            ?>
                            <tr>
                                <td>
                                    <?php echo '<span style="display: none">$rigaFidelity->id-$rigaFidelity->data</span>' . dateFromDb($rigaFidelity->data); ?>
                                </td>
                                <td>
                                    <?php echo $rigaFidelity->descrizione; ?>
                                </td>
                                <td>
                                    <?php
                                    if (!isBlankOrNull($rigaFidelity->idCard)) {
                                        $card = DAOFactory::getFidelityCardDAO()->load($rigaFidelity->idCard);
                                        echo $card->codiceBarre;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $idClienteTMP = '';

                                    $idClienteTMP = DAOFactory::getFidelityClienteDAO()->queryByIdCard($rigaFidelity->idCard);

                                    //if (!isBlankOrNull($idCard->id)) {   
                                    if (count($idClienteTMP) > 0) {
                                        $idCliente = $idClienteTMP[0];

                                        $cliente = DAOFactory::getClientiDAO()->load($idCliente->idCliente);
                                        echo $cliente->nome . " " . $cliente->cognome;
                                    }
                                    ?>
                                </td>
                                <td> <?php
                                if (isset($rigaFidelity)) {
                                    echo formattaImportoEuropeo($rigaFidelity->importo);
                                }
                                    ?></td>
                                <td><?php
                                    if (isset($rigaFidelity)) {
                                        echo formattaImportoEuropeo($rigaFidelity->punti);
                                    }
                                    ?></td>
                                <td>
                                     
                                                                <a href="#" onclick="document.getElementById('gestioneFidelityCard').idCard.value='<?php echo $card->id; ?>'; document.getElementById('gestioneFidelityCard').action.value = 'dettaglioFidelityCard'; document.getElementById('gestioneFidelityCard').submit();">
                                                                    <img src="applicazione/img/icone/view.png" alt="dettaglio" title="Visualizza" style="width: 20px"/>
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

