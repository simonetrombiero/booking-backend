<?php
global $listaPianoTattamenti;
global $cliente;

//echo '<pre>';
//print_r($listaPianoTattamenti);
$coordinateTrattamenti = array();
$titleTrattamenti = array();
$idTrattamenti = array();
for($r=0; $r<count($listaPianoTattamenti);$r++){
    $vartmp = $listaPianoTattamenti[$r];
    
    if($vartmp->zonaTrattata!=''){
        $coordinateTrattamenti[]=$vartmp->zonaTrattata;
        $idTrattamenti[]=$vartmp->id;
        if($vartmp->titolo!=''){
           $titleTrattamenti[] = $vartmp->titolo; 
        } else {
            $titleTrattamenti[] = "piano del ".dateFromDb($vartmp->data); 
        }
    }
}

?>
<style>
    .textOver {
        max-width: 100px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>

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
                        "lengthMenu": [[50, 100, -1], [50, 100, "Tutti"]],
                        "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
                    });

                });
            </script>





            <form action="index.php" id="gestionePianoTrattamenti" name="gestionePianoTrattamenti" method="post">
                <input type="hidden" id="action" name="action">
                <input type="hidden" id="idCliente" name="idCliente">
                <input type="hidden" id="idPiano" name="idPiano">
                <input type="hidden" id="id" name="id">
            </form>   
            
            <form action="index.php" id="gestioneDocumentazione" name="gestioneDocumentazione" method="post">
                <input type="hidden" id="action" name="action">
                <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">
                <input type="hidden" id="idPiano" name="idPiano">
            </form>    






            <!--<div class="grid grid-pad">-->
            <!--<div class="col-1-1">-->
            <div>
                <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        LISTA PIANO TRATTAMENTI CLIENTE: <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').id.value='<?php echo $cliente->id; ?>'; document.getElementById('gestionePianoTrattamenti').action.value='visualizzaCliente'; document.getElementById('gestionePianoTrattamenti').submit();" class="linkScheda"><?php echo $cliente->nome . " " . $cliente->cognome; ?></a>

                    </h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idCliente.value = '<?php echo $cliente->id; ?>';
                                document.getElementById('gestionePianoTrattamenti').action.value = 'nuovoPianoTerapeutico';
                                document.getElementById('gestionePianoTrattamenti').submit();" class="btn btn-green" >Nuovo Piano</a>
<!--                                                <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idCliente.value='<?php echo $cliente->id; ?>'; document.getElementById('gestionePianoTrattamenti').action.value='nuovoAppuntamento'; document.getElementById('gestionePianoTrattamenti').submit();" class="btn btn-green" >Nuovo Piano</a>-->
                    </div>
                </div></div>
            <!--</div>-->
            <!--</div>-->

            <!--<div class="grid grid-pad">-->
            <!--<div class="col-1-1">-->

            <div class="grid grid-pad">
                <!--<div class="col-1-1">-->
                <div class="col-6-12">
<!--                    <div>
                        <img src="img/schedaMorfologica.jpg">
                    </div>-->

<?php include 'applicazione/amministrazione/morfologica/schedaList.php'; ?>
                </div>
                <div class="col-6-12" style="font-weight: bold;">DATI CLIENTE</div>
                <table>
                    <tr><td>Nome:</td><td>&nbsp;</td><td style="font-weight: bold;"><?php echo $cliente->nome; ?></td></tr>
                    <tr><td>Cognome:</td><td>&nbsp;</td><td style="font-weight: bold;"><?php echo $cliente->cognome; ?></td></tr>
                    <tr><td>Telefono:</td><td>&nbsp;</td><td style="font-weight: bold;"><?php echo $cliente->cellulare; ?></td></tr>
                    <tr><td>Email:</td><td>&nbsp;</td><td style="font-weight: bold;"><?php echo $cliente->email; ?></td></tr>
                    <tr><td>Data di Nascita:</td><td>&nbsp;</td><td style="font-weight: bold;"><?php if ($cliente->dataNascita != '0000-00-00') {
    echo dateFromDb($cliente->dataNascita) . " (" . getAge($cliente->dataNascita) . " anni)";
} else {
    echo 'nd';
} ?></td></tr>
                </table>

            </div>
            <div style="padding: 10px;">

                <table style="width: 100%" id="datatable">
                    <thead>
                        <tr>

                            <th align="left">Data </th>
                            <th align="left">
                                Piano di Trattamento 
                            </th>

                            <th>
                                Stato Piano
                            </th>
                            <th>N. Sedute</th>
                            <th>Doc.</th>
                            <!--<th>Totale Saldato</th>-->
                            <th>
                                Azioni
                            </th>
                        </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody>
<?php
for ($i = 0; $i < count($listaPianoTattamenti); $i++) {
    $richiamo = $listaPianoTattamenti[$i];
    ?>
                            <tr>

                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <span style="display: none"><?php echo $richiamo->data; ?></span>

    <?php
    echo dateFromDb($richiamo->data);
    ?>

                                </td>
                                <td style="border-bottom: 1px dotted #057fd0;">

    <?php
    echo $richiamo->titolo;
    ?>

                                </td>

                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <div class="textOver">
                                        <?php
                                        $statotmp = '';
                                        //if(!isBlankOrNull($richiamo->stato)){
                                        if ($richiamo->stato > 0) {
                                            $statotmp = DAOFactory::getPianoTrattamentoStatusDAO()->load($richiamo->stato);
                                            echo $statotmp->descrizione;
                                        }
                                        ?>
                                    </div>
                                </td>
                                <td style="border-bottom: 1px dotted #057fd0; text-align: center">
                                    <?php
//                                                               $totSedute = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryByTrattamentoID($richiamo->id);
//                                                               echo count($totSedute);

                                    echo $richiamo->seduteNumero;
                                    ?>


                                </td>
                                <td style="border-bottom: 1px dotted #057fd0; text-align: center;">
                                    <?php
                                    $tp = '';
                                    $tp = DAOFactory::getDocumentazionePianoTrattamentoDAO()->queryByIdPianoTrattamento($richiamo->id);
                                    if(count($tp)>0){
                                        echo 'si';
                                    } else {
                                        echo 'no';
                                        
                                    }
                                    
                                    ?>
                                    
                                    
                                </td>
    <!--                             <td style="border-bottom: 1px dotted #057fd0;"></td>-->

                                <td style="vertical-align: middle; text-align: right; border-bottom: 1px dotted #057fd0;">
                                    <?php if ($richiamo->prenotazioni != 1) { ?>
                                        <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idPiano.value = '<?php echo $richiamo->id; ?>'; document.getElementById('gestionePianoTrattamenti').action.value = 'generaAppuntamenti'; document.getElementById('gestionePianoTrattamenti').submit();">
                                            <img src="img/icone/agenda.png" alt="Genera Appuntamenti" title="Genera Appuntamenti" style="width: 25px; padding: 2px"/>
                                        </a>
    <?php } ?>
                                    <a href="#" onclick="document.getElementById('gestioneDocumentazione').idPiano.value = '<?php echo $richiamo->id; ?>'; document.getElementById('gestioneDocumentazione').action.value = 'nuovaDocumentazione'; document.getElementById('gestioneDocumentazione').submit();">
                                            <img src="img/icone/documentazione.png" alt="Aggiungi Documentazione" title="Aggiungi Documentazione" style="width: 25px; padding: 2px"/>
                                        </a>

                                    <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idPiano.value = '<?php echo $richiamo->id; ?>'; document.getElementById('gestionePianoTrattamenti').action.value = 'visualizzaPiano'; document.getElementById('gestionePianoTrattamenti').submit();">
                                        <img src="img/icone/view.png" alt="Visualizza" title="Visualizza" style="width: 25px; padding: 2px"/>
                                    </a>

                                    <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idPiano.value = '<?php echo $richiamo->id; ?>'; document.getElementById('gestionePianoTrattamenti').action.value = 'modificaPiano'; document.getElementById('gestionePianoTrattamenti').submit();">
                                        <img src="applicazione/img/icone/edit.png" alt="Modifica" title="Modifica" style="width: 25px; padding: 2px"/>
                                    </a>

                                    <a href="index.php?action=eliminaPiano&amp;id=<?php echo $richiamo->id; ?>" onclick="return confirm('Vuoi eliminare il Piano di cura e gli APPUNTAMENTI associati?');">
                                        <img src="applicazione/img/icone/delete.png" alt="Elimina" title="Elimina" style="width: 25px; padding: 2px"/>
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

