<?php
global $listaPianoTattamenti;
global $cliente;
global $listapagamenti;

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

if(isset($listapagamenti) && count($listapagamenti) > 0){ // Se ho cliccato sulla lente d'ingrandimento di un piano
$oggi = date("Y-m-d");
$idPiano = getRequest("idPiano");
$appuntamentiAgenda = DAOFactory::getPrenotazioniDAO()->queryByIdPiano($idPiano);
$pianoSelezionato = DAOFactory::getPianoTrattamentoDAO()->load($idPiano);
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
            <link rel="stylesheet" type="text/css" href="vendors/dataTables/jquery.dataTables.css">
            <script type="text/javascript" language="javascript" src="vendors/dataTables/jquery.dataTables.min.js"></script>
            <script src="applicazione/js/jquery-calx/bootstrap.js" type="text/javascript"></script>
            <link href="applicazione/css/jquery-calx/bootstrap.css" rel="stylesheet" type="text/css">

            <script>
                document.addEventListener("DOMContentLoaded", function(event) {
                    $('#nuovoAcconto').on('show.bs.modal', function () {
                        var piani = document.getElementsByName("piano");
                        var piano_selezionato = 0;

                        for(var piano of piani){
                            if (piano.checked) {
                                var id_piano = piano.value;
                                var totaleDaSaldare = document.getElementById("ds_"+id_piano).innerHTML.trim().replace("€","").replace(".","").replace(",",".");
                                var totale = document.getElementById(id_piano).innerHTML.trim().replace("€","").replace(".","").replace(",",".");

                                document.getElementById("importo").setAttribute("max", totaleDaSaldare);
                                document.getElementById("totaleDaSaldare").innerHTML = totaleDaSaldare;
                                document.getElementById("totale").innerHTML = totale;
                                document.getElementById("id_piano").value = id_piano;
                                piano_selezionato = 1;
                            }
                        }

                        if(piano_selezionato == 0){
                            alert('Seleziona il Piano a cui aggiungere l\'acconto');
                            //$('#nuovoAcconto').modal('hide');
                        }
                    })
                });
            </script>

            <script type="text/javascript">
                $(function () {
                    $('#datatable').dataTable({
                        "order": [[1, "desc"]],
                        "lengthMenu": [[10, 20, 50, 100, -1], [10, 20, 50, 100, "Tutti"]],
                        "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
                    });

                });
            </script>

            <?php if(isset($listapagamenti) && count($listapagamenti) > 0){ // Se ho cliccato sulla lente d'ingrandimento di un piano ?>
            <script type="text/javascript">
                $(function () {
                    $('#datatable_piano').dataTable({
                        "order": [[0, "desc"]],
                        "lengthMenu": [[10, 20, 50, 100, -1], [10, 20, 50, 100, "Tutti"]],
                        "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
                    });

                });
            </script>
        <?php } ?>

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

        <form action="index.php" id="gestionePagamenti" name="gestionePagamenti" method="post">
            <input type="hidden" id="action" name="action">
            <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">
            <input type="hidden" id="idPiano" name="idPiano">
        </form>

        <form action="index.php" id="schedaMorfologica" name="schedaMorfologica" method="post">
            <input type="hidden" id="action" name="action" value="schedaMofologicaCliente">
            <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">
        </form>


        <div>
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                    LISTA PIANO TRATTAMENTI CLIENTE: <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').id.value='<?php echo $cliente->id; ?>'; document.getElementById('gestionePianoTrattamenti').action.value='visualizzaCliente'; document.getElementById('gestionePianoTrattamenti').submit();" class="linkScheda"><?php echo $cliente->nome . " " . $cliente->cognome; ?></a>

                </h2>
                <div style=" text-align: right; padding: 10px 15px;">
                    <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idCliente.value = '<?php echo $cliente->id; ?>';
                    document.getElementById('gestionePianoTrattamenti').action.value = 'nuovoPianoTerapeutico';
                    document.getElementById('gestionePianoTrattamenti').submit();" class="btn btn-green" >Nuovo Piano</a>
                </div>
            </div>
        </div>

        <div class="grid grid-pad">
            <div class="col-6-12">

                <?php include 'applicazione/amministrazione/morfologica/schedaList.php'; ?>
            </div>
            <div class="col-6-12" style="font-weight: bold;">
                DATI CLIENTE
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

                <!-- Modal -->
                <div class="modal modal-primary fade" id="nuovoAcconto" tabindex="-1" role="dialog" aria-labelledby="nuovoAccontoLabel">
                    <div class="modal-dialog" role="document">
                        <form method="POST">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="nuovoAccontoLabel">Nuovo Acconto</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <h4 for="modalitaPagamento">Metodo Pagamento: </h4>
                                    </div>
                                    <div class="col-lg-6 text-left">
                                        <?php $pagamentiModalita = DAOFactory::getPagamentomodalitaDAO()->queryAllOrderBy("priorita"); ?>
                                        <select name="modalitaPagamento" id="modalitaPagamento" data-cell="MP1" class="form-control">
                                            <option value="0">-- Seleziona --</option>
                                            <?php
                                            for ($i = 0; $i < count($pagamentiModalita); $i++) {
                                                $pagamento = $pagamentiModalita[$i];
                                                ?>
                                                <option value="<?php echo $pagamento->id; ?>" ><?php echo $pagamento->descrizione; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <h4 style="margin:0">Totale: </h4>
                                    </div>
                                    <div class="col-lg-6 text-left">
                                        <h4 style="margin:0" id="totale"></h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <h4 style="margin:0">Da Saldare: </h4>
                                    </div>
                                    <div class="col-lg-6 text-left">
                                        <h4 style="margin:0" id="totaleDaSaldare"></h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6 text-right">
                                        <h4>Ricevuti: </h4>
                                    </div>
                                    <div class="col-lg-6 text-left">
                                        <div class="input-group">
                                          <input type="number" class="form-control" name="importo" id="importo" placeholder="Importo">
                                          <div class="input-group-addon">€</div>
                                      </div>
                                  </div>
                              </div>

                              <input type="hidden" name="idCliente" value="<?php echo $cliente->id; ?>">
                              <input type="hidden" name="id_piano" id="id_piano" value="">
                              <input type="hidden" name="action" value="nuovoPagamento">
                          </td>
                      </select>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-primary">Aggiungi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="table_na" class="col-6-12" style="text-align:center;display:none">
</div>
</div>

</div>

<?php if(isset($listapagamenti) && count($listapagamenti) > 0){ // Se ho cliccato sulla lente d'ingrandimento di un piano ?>
<div class="row" style="margin-top:20px">
    <div class="col-2-12">
        &nbsp;
    </div>
    <div class="col-8-12">
        <table class="table text-center" style="margin-bottom:0">
            <tr>
                <td colspan="3" style="border:1px solid #dddddd;margin: 0;font-weight:400;background-color:#366c88;color:#fff">
                    <h2 align="center" style="margin:0"><?php echo $pianoSelezionato->titolo; ?></h2>
                </td>
            </tr>
            <tr>
                <td style="border:1px solid #dddddd">
                    <p style="white-space:nowrap;">Data: <b>
                        <?php
                        echo dateFromDb($pianoSelezionato->data);
                    ?></b></p>
                </td>
                <td style="border:1px solid #dddddd">
                    <p style="white-space:nowrap;">Stato Piano: <b><?php
                    $statotmp = '';
                    if ($pianoSelezionato->stato > 0) {
                        $statotmp = DAOFactory::getPianoTrattamentoStatusDAO()->load($pianoSelezionato->stato);
                        echo $statotmp->descrizione;
                    }?></b></p>
                </td>
                <td style="border:1px solid #dddddd">
                    <p style="white-space:nowrap;">Pagamento: <b>
                        <?php
                        if($pianoSelezionato->totaleDaSaldare == 0){
                            $stato = "<span style='background-color:#dff0d8;border-radius:10px;padding:5px;color:#000'>Pagato</span>";
                        }elseif($pianoSelezionato->totaleDaSaldare > 0 && $pianoSelezionato->totaleDaSaldare < ($pianoSelezionato->totaleSaldato + $pianoSelezionato->totaleDaSaldare)){
                            $stato = "<span style='background-color:#fdf2b9;border-radius:10px;padding:5px;color:#000'>Incompleto</span>";
                        }else{
                            $stato = "<span style='background-color:#ebacac;border-radius:10px;padding:5px;color:#000'>Non Pagato</span>";
                        }
                        echo $stato;
                    ?></b></p>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-2-12">
        <div style="float: right; padding: 10px 15px;">
            <a href="#" onclick="document.getElementById('schedaMorfologica').submit();" class="btn btn-green" >Contabilità</a>
        </div>
    </div>
</div>
<div class="row">
    <h3 align="center" style="font-weight:400;background-color:#366c88;color:#fff">Acconti</h3>
    <table id="datatable_piano" align="center">
        <thead>
            <tr>
                <th style="display:none">id</th>
                <th>Data</th>
                <th style='text-align:center'>Metodo di Pagamento</th>
                <th style='text-align:right'>Importo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($listapagamenti as $pagamento){

                if($pagamento->modalitaPagamento == 0){$pagamento->modalitaPagamento = 1;}
                $pagamentoModalita = DAOFactory::getPagamentomodalitaDAO()->load($pagamento->modalitaPagamento);

                echo "<tr>
                <td style='display:none'>".$pagamento->id."</td>
                <td>".dateFromDb($pagamento->data)."</td>
                <td align='center'>".$pagamentoModalita->descrizione."</td>
                <td align='right'>".$pagamento->importo."€</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-3-12" style="text-align:center;border:1px solid #000;padding-right:0;margin:0 10px">
        <h2 style="margin: 0;font-weight:400;background-color:#366c88;color:#fff">Totale Importi</h2>
        <h2><b><?php echo number_format($pianoSelezionato->totaleSaldato + $pianoSelezionato->totaleDaSaldare, 2, ',', '.'); ?>€</b></h2>
    </div>
    <div class="col-1-12">&nbsp;</div>
    <div class="col-3-12" style="text-align:center;border:1px solid #000;padding-right:0;margin:0 10px">
        <h2 style="margin: 0;font-weight:400;background-color:#366c88;color:#fff">Totale Acconti</h2>
        <h2><b><?php echo number_format($pianoSelezionato->totaleSaldato, 2, ',', '.'); ?>€</b></h2>
    </div>
    <div class="col-1-12">&nbsp;</div>
    <div class="col-3-12" style="text-align:center;border:1px solid #000;padding-right:0;margin:0 10px">
        <h2 style="margin: 0;font-weight:400;background-color:#366c88;color:#fff">Totale Da Saldare</h2>
        <h2><b><?php echo number_format($pianoSelezionato->totaleDaSaldare, 2, ',', '.'); ?>€</b></h2>                        
    </div>
</div>

<br>
&nbsp;


<h3 align="center" style="font-weight:400;background-color:#366c88;color:#fff">Trattamenti Piano</h3>
<table style="width: 100%" id="datatable">
    <thead>
        <tr>
            <th style="text-align: center; width: 15%;">Seduta del </th>
            <th style="text-align: center; width: 10%;">
                Ora
            </th>
            <th>Presenza</th>
            <th>Note</th>
            <th style="text-align: center; width: 10%;">
                Azioni
            </th>
        </tr>
    </thead>
    <tfoot></tfoot>
    <tbody>
        <?php
        for ($i = 0; $i < count($appuntamentiAgenda); $i++) {
            $appuntamento = $appuntamentiAgenda[$i];


            ?>
            <tr>
                <td style="border-bottom: 1px dotted #057fd0; text-align: center;">
                    <span style="display: none;"> <?php echo $appuntamento->data; ?></span> 
                    <?php
                    echo dateFromDb($appuntamento->data);

                    ?>

                </td>

                <td style="border-bottom: 1px dotted #057fd0; text-align: center;">
                    <div class="textOver">
                        <?php 
                        echo substr($appuntamento->oraInizio, 0,5);
                        ?>
                    </div>
                </td>
                <td style="border-bottom: 1px dotted #057fd0; text-align: center; width: 50px">
                    <?php if($appuntamento->data>=$oggi){

                        $data = date('d-m-Y H:i:s');
                        $ora = date('H:i:s',strtotime("$data - 15 minutes"));
                        if(($appuntamento->data=$oggi)&&($appuntamento->oraInizio<$ora)){

                        }else{
                          echo "<span style='display: block; background: #057fd0; color:white; width: 100%; text-align: center; padding 5px;'>Da Eseguire</span>";
                      }

                  } else {
                    if($appuntamento->noShow==1){
                        echo "<span style='display: block; background: red; color:white; width: 100%; text-align: center; padding 15px; font-weight: bold'>ASSENTE</span>";
                    }else{
                      echo "<span style='display: block; background: green; color:white; width: 100%; text-align: center; margin 15px; font-weight: bold'>Presente</span>";  
                  }

              }
              ?>
          </td>
          <td style="border-bottom: 1px dotted #057fd0;"><?php echo $appuntamento->note; ?></td>
          <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">
           <a href="index.php?action=visualizzaAppuntamento&id=<?php echo $appuntamento->id; ?>"><img src="img/icone/view.png" alt="Visualizza Appuntamento" title="Visualizza Appuntamento" style="width: 20px; padding: 2px"></a>
       </td>
   </tr>
   <?php
}
?>
</tbody>
</table>
<?php }else{ ?>
    <div style="text-align:right">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuovoAcconto">
            Nuovo Acconto
        </button>
    </div>
    <div style="padding: 10px;">
        <table style="width: 100%" id="datatable">
            <thead>
                <tr>
                    <th>Sel.</th>
                    <th align="left">Data</th>
                    <th align="left">Piano di Trattamento</th>
                    <th>Stato Piano</th>
                    <th>Importo</th>
                    <th>Acconto</th>
                    <th>Da Saldare</th>
                    <th>Pagamenti</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totale = 0;
                $totaleSaldato = 0;
                $totaleDaSaldare = 0;

                for ($i = 0; $i < count($listaPianoTattamenti); $i++) {
                    $pianoSelezionato = $listaPianoTattamenti[$i];
                    ?>
                    <tr>
                        <td style="border-bottom: 1px dotted #057fd0; text-align: center">
                            <input type="radio" name="piano" value="<?php echo $pianoSelezionato->id; ?>" <?php if($pianoSelezionato->totaleDaSaldare == 0){echo "disabled";}elseif($i == count($listaPianoTattamenti) - 1){echo "checked";} ?>>
                        </td>
                        <td style="border-bottom: 1px dotted #057fd0;">
                            <span style="display: none"><?php echo $pianoSelezionato->data; ?></span>

                            <?php
                            echo dateFromDb($pianoSelezionato->data);
                            ?>

                        </td>
                        <td style="border-bottom: 1px dotted #057fd0;">

                            <?php
                            echo $pianoSelezionato->titolo;
                            ?>

                        </td>

                        <td style="border-bottom: 1px dotted #057fd0;">
                            <div class="textOver">
                                <?php
                                $statotmp = '';
                                if ($pianoSelezionato->stato > 0) {
                                    $statotmp = DAOFactory::getPianoTrattamentoStatusDAO()->load($pianoSelezionato->stato);
                                    echo $statotmp->descrizione;
                                }
                                ?>
                            </div>
                        </td>
                        <td style="border-bottom: 1px dotted #057fd0; text-align: center" id="<?php echo $pianoSelezionato->id; ?>">
                            <?php
                            $totale += $pianoSelezionato->totaleSaldato + $pianoSelezionato->totaleDaSaldare;
                            echo number_format($pianoSelezionato->totaleSaldato + $pianoSelezionato->totaleDaSaldare, 2, ',', '.').'€';
                            ?>


                        </td>
                        <td style="border-bottom: 1px dotted #057fd0; text-align: center">
                            <?php
                            $totaleSaldato += $pianoSelezionato->totaleSaldato;
                            echo number_format($pianoSelezionato->totaleSaldato, 2, ',', '.').'€';
                            ?>


                        </td>
                        <td style="border-bottom: 1px dotted #057fd0; text-align: center" id="ds_<?php echo $pianoSelezionato->id; ?>">
                            <?php
                            $totaleDaSaldare += $pianoSelezionato->totaleDaSaldare;
                            echo number_format($pianoSelezionato->totaleDaSaldare, 2, ',', '.').'€';
                            ?>


                        </td>
                        <td style="border-bottom: 1px dotted #057fd0; text-align: center;">
                            <?php
                            if($pianoSelezionato->totaleDaSaldare == 0){
                                $stato = "<span style='background-color:#dff0d8;border-radius:10px;padding:5px;color:#000'>Pagato</span>";
                            }elseif($pianoSelezionato->totaleDaSaldare > 0 && $pianoSelezionato->totaleDaSaldare < ($pianoSelezionato->totaleSaldato + $pianoSelezionato->totaleDaSaldare)){
                                $stato = "<span style='background-color:#fdf2b9;border-radius:10px;padding:5px;color:#000'>Incompleto</span>";
                            }else{
                                $stato = "<span style='background-color:#ebacac;border-radius:10px;padding:5px;color:#000'>Non Pagato</span>";
                            }
                            echo $stato;
                            ?>
                        </td>

                        <td style="vertical-align: middle; text-align: right; border-bottom: 1px dotted #057fd0;">
                            <?php if ($pianoSelezionato->prenotazioni != 1) { ?>
                                <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idPiano.value = '<?php echo $pianoSelezionato->id; ?>'; document.getElementById('gestionePianoTrattamenti').action.value = 'generaAppuntamenti'; document.getElementById('gestionePianoTrattamenti').submit();">
                                    <img src="img/icone/agenda.png" alt="Genera Appuntamenti" title="Genera Appuntamenti" style="width: 25px; padding: 2px"/>
                                </a>
                            <?php } ?>

                            <?php if ($pianoSelezionato->totaleSaldato > 0) { ?>
                                <a href="#" onclick="document.getElementById('gestionePagamenti').idPiano.value = '<?php echo $pianoSelezionato->id; ?>'; document.getElementById('gestionePagamenti').action.value = 'caricaPagamentiPiano'; document.getElementById('gestionePagamenti').submit();">
                                    <img src="img/icone/view.png" alt="Visualizza" title="Visualizza" style="width: 25px; padding: 2px"/>
                                </a>
                            <?php } ?>

                            <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idPiano.value = '<?php echo $pianoSelezionato->id; ?>'; document.getElementById('gestionePianoTrattamenti').action.value = 'modificaPiano'; document.getElementById('gestionePianoTrattamenti').submit();">
                                <img src="applicazione/img/icone/edit.png" alt="Modifica" title="Modifica" style="width: 25px; padding: 2px"/>
                            </a>

                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <!--FINE--->
        <br>
        &nbsp;
        <hr>
        &nbsp;
        <br>

        <div class="row">
            <div class="col-3-12" style="text-align:center;border:1px solid #000;padding-right:0;margin:0 10px">
                <h2 style="margin: 0;font-weight:400;background-color:#366c88;color:#fff">Totale Importi</h2>
                <h2><b><?php echo number_format($totale, 2, ',', '.'); ?>€</b></h2>
            </div>
            <div class="col-1-12">&nbsp;</div>
            <div class="col-3-12" style="text-align:center;border:1px solid #000;padding-right:0;margin:0 10px">
                <h2 style="margin: 0;font-weight:400;background-color:#366c88;color:#fff">Totale Acconti</h2>
                <h2><b><?php echo number_format($totaleSaldato, 2, ',', '.'); ?>€</b></h2>
            </div>
            <div class="col-1-12">&nbsp;</div>
            <div class="col-3-12" style="text-align:center;border:1px solid #000;padding-right:0;margin:0 10px">
                <h2 style="margin: 0;font-weight:400;background-color:#366c88;color:#fff">Totale Da Saldare</h2>
                <h2><b><?php echo number_format($totaleDaSaldare, 2, ',', '.'); ?>€</b></h2>                        
            </div>
        </div>
    </div>
<?php } ?>

</div>
<div style="clear:left;">&nbsp;</div>

