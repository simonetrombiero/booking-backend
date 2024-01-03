<?php
global $pianoTrattamento, $pianoTrattamentoDettaglio, $cliente;

/*
  echo '<pre>';
  print_r($pianoTrattamento);
  print_r($pianoTrattamentoDettaglio);
  echo '</pre>';

 */


$oggi = date("Y-m-d");

//print_r($listaPianoTattamenti);
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
                <input type="hidden" id="idRiga" name="idRiga">
                <input type="hidden" id="idCliente" name="idCliente">
                <input type="hidden" id="idPiano" name="idPiano" value="<?php
                if (isset($pianoTrattamento)) {
                    echo $pianoTrattamento->id;
                }
                ?>"/>
            </form>    





            <!--<div class="grid grid-pad">-->
            <!--<div class="col-1-1">-->
            <div>
                <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        MODIFICA PIANO TERAPEUTICO PAZIENTE: <?php echo $cliente->nome . " " . $cliente->cognome; ?>

                    </h2>
                    <div style=" text-align: right; padding: 10px 15px;">
<!--                                                <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idCliente.value='<?php echo $cliente->id; ?>'; document.getElementById('gestionePianoTrattamenti').action.value='nuovoPianoTerapeutico'; document.getElementById('gestionePianoTrattamenti').submit();" class="btn btn-green" >Nuovo Piano</a>-->
                        <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idCliente.value = '<?php echo $cliente->id; ?>';
                                document.getElementById('gestionePianoTrattamenti').action.value = 'listaPianoTerapeutico';
                                document.getElementById('gestionePianoTrattamenti').submit();" class="btn btn-green" ><< Torna alla Lista</a>
                    </div>
                </div>
                <p>&nbsp;</p>
            </div>
            <!--</div>-->
            <!--</div>-->

            <!--<div class="grid grid-pad">-->
            <!--<div class="col-1-1">-->
            <form action="index.php" method="post">
                <input type="hidden" id="action" name="action" value="salvaEditPiano">
                <input type="hidden" id="idCliente" name="idCliente" value="<?php if (isset($cliente)) {
                    echo $cliente->id;
                } ?>"/>
                <input type="hidden" id="idPiano" name="idPiano" value="<?php if (isset($pianoTrattamento)) {
                    echo $pianoTrattamento->id;
                } ?>"/>
                <div class="grid grid-pad">
                    <!--<div class="col-1-1">-->
                    <div class="col-6-12">
                        <div>
                            <img src="img/schedaMorfologica.jpg">
                        </div>

                    </div>
                    <div class="col-6-12">
    <!--                    <p style="color: black; font-size: 1.2em; font-weight: bold;">PIANO DI CURA</p>-->
                        <table>
                            <tr><td>Titolo</td><td><input type="text" name="titoloPiano" id="titoloPiano" value="<?php echo $pianoTrattamento->titolo; ?>"></td></tr>
                            <tr><td>Data Creazione</td><td><?php echo dateFromDb($pianoTrattamento->data); ?></td></tr>
                            <tr>
                                <td>Stato</td>
                                <?php 
                               $stati = DAOFactory::getPianoTrattamentoStatusDAO()->queryAll();
                                ?>
                                <td>
                                    <select name="statoPiano">
                                        <?php 
                                        for ($kk=0; $kk<count($stati);$kk++){
                                            $stato = $stati[$kk];
                                        ?>
                                        <option value="<?php echo $stato->id; ?>" <?php if($stato->id==$pianoTrattamento->stato){ ?> selected="" <?php } ?>><?php echo $stato->descrizione;?></option>
                                        <?php 
                                         }
                                        ?>
                                    </select>
                                   
                                    
                                </td>
                            </tr>
                            <tr><td>Numero Sedute</td><td <td style="font-weight: bold;"><?php echo count($pianoTrattamentoDettaglio); ?></td></tr>
                            <?php if(isAdmin()){ ?>
                            <tr><td>Totale Trattamento </td><td style="font-weight: bold;"><span><?php echo formattaImportoEuro($pianoTrattamento->totaleTrattamento); ?></span></td></tr>
                            <tr><td>Totale Saldato </td><td style="font-weight: bold;"><span style="font-weight: bold"><?php echo formattaImportoEuro($pianoTrattamento->totaleSaldato); ?></span></td></tr>
                            <tr><td>Totale da Saldare </td><td style="font-weight: bold;"><span style="font-weight: bold"><?php echo formattaImportoEuro($pianoTrattamento->totaleDaSaldare); ?></span></td></tr>
                            <?php } ?>
                            <tr><td>Note</td><td><textarea name="notePiano" id="notePiano"><?php echo $pianoTrattamento->note; ?></textarea></td></tr>

                        </table>
                        <p style="color: black; font-size: 1.1em; font-weight: bold;">DATI PAZIENTE</p>
                        <table>
                            <tr><td>Nome</td><td><?php echo $cliente->nome; ?></td></tr>
                            <tr><td>Cognome</td><td><?php echo $cliente->cognome; ?></td></tr>
                            <tr><td>Telefono</td><td><?php echo $cliente->cellulare; ?></td></tr>
                            <tr><td>Email</td><td><?php echo $cliente->email; ?></td></tr>
                            <tr><td>Data di Nascita</td><td><?php echo dateFromDb($cliente->dataNascita) . " (" . getAge($cliente->dataNascita) . " anni)"; ?></td></tr>
                            <tr><td>Note</td><td><?php //echo $cliente->note;   ?></td></tr>

                        </table>
                    </div>
                </div> <?php //exit;    ?>
                <div style="padding: 10px;">

                    <p style="color: black; font-size: 1.1em; font-weight: bold; border-bottom: 1px solid #111111;">DETTAGLIO PIANO DI CURA</p>



                    <table style="width: 100%" id="datatable">
                        <thead>
                            <tr>

                                <th align="left">Data</th>
                                <th align="left">Ora</th>
                                <th align="left">Trattamento</th>
                                <th>Postazione</th>
                                <th>Operatore</th>
                                <th>Stato</th>
                                <th>Presenza</th>
                                <th>Note</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot></tfoot>
                        <tbody>
<?php
for ($i = 0; $i < count($pianoTrattamentoDettaglio); $i++) {
    $richiamo = $pianoTrattamentoDettaglio[$i];
    ?>
                                <tr>

                                    <td style="border-bottom: 1px dotted #057fd0;">
                                        <span style="display: none"><?php echo $richiamo->data; ?></span>
                                        <input type="text" name="dataPiano<?php echo $i; ?>" value="<?php echo dateFromDb($richiamo->data); ?>" style="width: 90%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204); min-width: 50px;">

                                    </td>
                                    <td style="border-bottom: 1px dotted #057fd0;">
                                        <input type="text" name="oraPiano<?php echo $i; ?>" value="<?php echo substr($richiamo->oraInizio, 0, 5); ?>" style="width: 90%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204); min-width: 50px; width: 55px;"></td>
                                    <td style="border-bottom: 1px dotted #057fd0;">

    <?php
    echo $richiamo->trattamento;
    ?>

                                    </td>

                                    
                                    
                                    <td style="border-bottom: 1px dotted #057fd0;">
                                        <select>
                                            <?php
                                            $postazioni = DAOFactory::getPostazioniDAO()->queryAll();
                                            // echo $stato->postazione;

                                            for ($k = 0; $k < count($postazioni); $k++) {
                                                $postazione = $postazioni[$k];
                                                ?>
                                                <option value="<?php echo $postazione->id; ?>" <?php
                                                if ($richiamo->postazione == $postazione->id) {
                                                    echo "selected=''";
                                                }
                                                ?>><?php echo $postazione->postazione; ?> </option>


                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td style="border-bottom: 1px dotted #057fd0;">
                                        <select name="operatorePiano<?php echo $i; ?>">
                                            <?php
                                            $operatori = DAOFactory::getDipendenteDAO()->queryAll();

                                            for ($k = 0; $k < count($operatori); $k++) {
                                                $operatore = $operatori[$k];
                                                ?>
                                                <option value="<?php echo $operatore->id; ?>" <?php
                                        if ($richiamo->operatore == $operatore->id) {
                                            echo "selected=''";
                                        }
                                        ?>><?php echo $operatore->nome . " " . $operatore->cognome; ?></option>

    <?php } ?>
                                        </select>
                                    </td>
                                    <td style="border-bottom: 1px dotted #057fd0;">
                                        <div class="textOver">
                                            <select name="statoPiano<?php echo $i; ?>">
                                                <?php
                                                $trattamentiStatus = DAOFactory::getPianoTrattamentoStatusDAO()->queryAll();
                                                for ($j = 0; $j < count($trattamentiStatus); $j++) {
                                                    $statusTrattamento = $trattamentiStatus[$j];
                                                    ?>
                                                    <option value="<?php echo $statusTrattamento->id; ?>" <?php
                                                    if ($richiamo->status == $statusTrattamento->id) {
                                                        echo "selected=''";
                                                    }
                                                    ?>><?php echo $statusTrattamento->descrizione; ?></option>
                                        <?php } ?>
                                            </select>

                                        </div>
                                    </td>
                                    <td style="border-bottom: 1px dotted #057fd0; text-align: center; width: 50px">
                                        <?php if ($richiamo->noShow == 1) { ?>
                                            <input type="radio" name="presenzaPiano<?php echo $i; ?>" value="0">si&nbsp; <input type="radio" name="presenzaPiano<?php echo $i; ?>" value="1" checked="">no
    <?php } else {
        ?>
                                            <input type="radio" name="presenzaPiano<?php echo $i; ?>" value="0" checked="">si&nbsp; <input type="radio" name="presenzaPiano<?php echo $i; ?>" value="1">no
                                                <?php }
                                            ?>

                                    </td>
                                    <td style="border-bottom: 1px dotted #057fd0;">
                                        <input type="hidden" id="idDettaglio<?php echo $i; ?>" name="idDettaglio<?php echo $i; ?>" value="<?php echo $richiamo->id; ?>">
                                        <input type="text" name="notePiano<?php echo $i; ?>" style="width: 90%; padding: 5px; border-radius: 5px; border: solid 1px rgb(204, 204, 204); min-width: 50px;" value="<?php echo $richiamo->note; ?>">
                                    </td>

                                    <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">
                                        <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idRiga.value = '<?php echo $richiamo->id; ?>';
                                                document.getElementById('gestionePianoTrattamenti').action.value = 'eliminaTrattamentoPiano';
                                                document.getElementById('gestionePianoTrattamenti').submit();">

                                            <img src="applicazione/img/icone/delete.png" alt="Elimina Trattamento" title="Elimina Trattamento" style="width: 25px; padding: 2px"/></a>

                                    </td>
                                </tr>
    <?php
}
?>
                        </tbody>
                    </table>


                    <!--FINE--->


                    <p style="text-align: right;"><input type="hidden" name="numRighe" value="<?php echo count($pianoTrattamentoDettaglio); ?>"><input type="submit" class="btn btn-green" value="Salva"></p>

                </div>

            </form>
        </div>
        <div style="clear:left;">&nbsp;</div>

