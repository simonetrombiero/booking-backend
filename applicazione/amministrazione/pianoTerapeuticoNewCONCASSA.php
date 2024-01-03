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
            <link href="applicazione/css/jquery-calx/bootstrap.css" rel="stylesheet" type="text/css">
            <link href="applicazione/css/jquery-calx/sb-admin.css" rel="stylesheet" type="text/css">
            <script src="applicazione/js/jquery-calx/jquery-calx-sample-2.2.8.min.js" type="text/javascript"></script>
            <script src="applicazione/js/jquery-calx/bootstrap.js" type="text/javascript"></script>
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


            <form action="index.php" method="post" id="dynamic"  name="formPiano">
                <input type="hidden" name="action" value="salvaPianoTerapeutico"/>
                <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">
                <input type="hidden" name="nNuoviTrattamenti" id="nNuoviTrattamenti" value="0">
                <input type="hidden" name="idPiano" value="<?php
//if (isset($appuntamento)) {
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
                                            for ($kk = 0; $kk < count($stati); $kk++) {
                                                $stato = $stati[$kk];
                                                ?>
                                                <option value="<?php echo $stato->id; ?>" <?php //if($stato->id==$pianoTrattamento->stato){
                                            if ($stato->id == 'nesco') {
                                                ?> selected="" <?php } ?>><?php echo $stato->descrizione; ?></option>
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

                            *******


                            <table class="tablef">
                                <thead>
                                    <tr>
                                        <td style="width:  5%" class="text-center"><label>Qtà</label></td>
                                        <td style="width: 35%"><label>Descrizione</label></td>
                                        <td style="width: 15%" class="text-center"><label>Importo</label></td>
                                        <td style="width:  10%" class="text-center"><label>Sc. %</label></td>
                                        <td style="width: 15%" class="text-center"><label>Totale</label></td>
                                        <td style="width: 10%" class="text-center"><label>Iva</label></td>
                                        <td style="width:  5%" class="text-center"><label></label></td>
                                    </tr>
                                </thead>
                                 <tfoot>
                                    <tr style="margin-top:30px">
                                        <td>
                                            <!--<button id="add_item" class="btn btn-sm btn-primary">Add Item</button>-->
                                        </td>
                                        <td colspan="4" class="text-right">
                                            <!--<label for="total">Total Price - Discount :</label>-->
                                        </td>
                                        <td class="text-right">
                                            <!--                                            <label data-cell="G1" data-format="$ 0,0.00" data-formula="SUM(F1:F5)"></label>-->
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tfoot>
                            </table>

                            ********

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

/////

<div class="shoppingcart-container" style="height: 350px;  overflow-y: scroll;">

                            <div style="width:100%;" class="simpleCart_items">

                                <!--<form class="form-horizontal" id="dynamic">-->

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td style="width:  5%" class="text-center"><label>Qtà</label></td>
                                            <td style="width: 35%"><label>Descrizione</label></td>
                                            <td style="width: 15%" class="text-center"><label>Importo</label></td>
                                            <td style="width:  10%" class="text-center"><label>Sc. %</label></td>
                                            <td style="width: 15%" class="text-center"><label>Totale</label></td>
                                            <td style="width: 10%" class="text-center"><label>Iva</label></td>
                                            <td style="width:  5%" class="text-center"><label></label></td>
                                        </tr>
                                    </thead>
                                    <tbody id="itemlist">

                                        <?php
                                        $daPrenotazione='';
                                        $nTrattamenti=0;
                                        if ($daPrenotazione) {

                                            $trattamenti = DAOFactory::getPrenotazioniTrattamentiDAO()->queryByIdPrenotazione($appuntamento->id);
                                            $nTrattamenti = count($trattamenti);
                                            for ($i = 0; $i < count($trattamenti); $i++) {

                                                $trattamento = DAOFactory::getTrattamentiDAO()->load($trattamenti[$i]->idTrattamento);
                                                $aliquota = DAOFactory::getAliquotaDAO()->load($trattamento->idAliquota);
                                                ?>
                                                <tr>
                                                    <td><input class="form-control input-sm text-right" data-cell="A<?php echo $i + 1; ?>" data-format="0" value="1" name="quantita[]"></td>
                                                    <td><input class="form-control input-sm" data-cell="B<?php echo $i + 1; ?>" value="<?php echo $trattamento->trattamento; ?>" name="descrizione[]"></td>
                                                    <td><input class="form-control input-sm text-right" data-cell="C<?php echo $i + 1; ?>" data-format="€ 0,0.00" value="<?php echo $trattamento->costo; ?>" name="importo[]"></td>
                                                    <td><input class="form-control input-sm text-right" data-cell="D<?php echo $i + 1; ?>" data-format="0[.]00 %" name="sconto[]"></td>
                                                    <td><input class="form-control input-sm text-right" data-cell="E<?php echo $i + 1; ?>" data-format="€ 0,0.00" data-formula="A<?php echo $i + 1; ?>*(C<?php echo $i + 1; ?>-(C<?php echo $i + 1; ?>*D<?php echo $i + 1; ?>))" name="totale[]"></td>
                                                    <td><input class="form-control input-sm text-right" data-cell="F<?php echo $i + 1; ?>" data-format="0[.]00 %" value="<?php echo $aliquota->aliquota; ?>" name="aliquotaIva[]"><input type="hidden" name="iva[]" class="form-control input-sm text-right" data-cell="IVA<?php echo $i + 1; ?>" data-format="€ 0 0.00" data-formula="E<?php echo $i + 1; ?>-(E<?php echo $i + 1; ?>/(1+F<?php echo $i + 1; ?>))"></td>
                                                    <td class="text-center"><a class="btn-remove btn btn-sm btn-danger"><i class="fa fa-times fa-fw"></i></a></td>
                                                </tr>  



                                            <?php }
                                            ?>

                                        <input type="hidden" name="idAppuntamento" value="<?php echo $idAppuntamento; ?>">

                                        <?php
                                    }
                                    ?>              

                                    </tbody>
                                    <tfoot>
                                        <tr style="margin-top:30px">
                                            <td>
                                                <!--<button id="add_item" class="btn btn-sm btn-primary">Add Item</button>-->
                                            </td>
                                            <td colspan="4" class="text-right">
                                                <!--<label for="total">Total Price - Discount :</label>-->
                                            </td>
                                            <td class="text-right">
                                                <!--                                            <label data-cell="G1" data-format="$ 0,0.00" data-formula="SUM(F1:F5)"></label>-->
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <!--</form>-->

                            </div>
                        </div>


 <table style="width: 100%">
                                <tr>
                                    <td style="width: 50%"><b>Modalità di Pagamento</b><br> 
                                        <?php $pagamentiModalita = DAOFactory::getPagamentomodalitaDAO()->queryAllOrderBy("priorita"); ?>
                                        <select name="modalitaPagamento" id="modalitaPagamento" data-cell="MP1" class="pippo">
                                            <option value="0">-- Seleziona --</option>
                                            <?php
                                            for ($i = 0; $i < count($pagamentiModalita); $i++) {
                                                $pagamento = $pagamentiModalita[$i];
                                                ?>
                                                <option value="<?php echo $pagamento->id; ?>" ><?php echo $pagamento->descrizione; ?></option>
                                                <?php
                                            }
                                            ?>


                                        </select></td>
                                    <td style="width: 50%"><b>Importo Ricevuto</b><br><input type="text" name="importoPagato" id="importoPagato" data-cell="IMP1" data-format="€ 0,0.00" value="0" disabled=""></td>
                                </tr>
                            </table>



                            <input type="hidden" name="totaleDocumento" data-cell="TOTDOC1" />


                            
                        <div style="background: #ddd; width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">
                            <!--<input type="radio" name="tipoDoc">&nbsp;Preventivo&nbsp;<input type="radio" name="tipoDoc">&nbsp;Fattura&nbsp;<input type="radio" name="tipoDoc">&nbsp;Documento Commerciale di Vendita o Prestazione-->
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central; font-size: 1.3em"><strong>TOTALE DOCUMENTO&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                <?php if ($nTrattamenti > 0) { ?>
                                                    <label data-cell="G1" data-format="€ 0,0.00" data-formula="SUM(E1:E<?php echo $nTrattamenti; ?>)"></label>
                                                    <!---TOTALE DOCUMENTO, TOTALE IVA-->
                                                    <input type="hidden" name="totaleDocumento" data-cell="TOTDOC1" data-formula="SUM(E1:E<?php echo $nTrattamenti; ?>)" />
                                                    <input type="hidden" name="totaleIva" data-cell="TOTIVA1" data-formula="SUM(IVA1:IVA<?php echo $nTrattamenti; ?>)" />


                                                <?php } else { ?>
                                                    <label data-cell="G1" data-format="€ 0,0.00">0,00</label>
                                                <?php } ?>
                                            </strong></div></td>
                                </tr>
                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central;"><strong>di cui IVA&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                <?php if ($nTrattamenti > 0) { ?>
                                                    <label data-cell="G2" data-format="€ 0,0.00" data-formula="SUM(IVA1:IVA<?php echo $nTrattamenti; ?>)"></label>
                                                <?php } else { ?>
                                                    <label data-cell="G2" data-format="€ 0,0.00">0,00</label>
                                                <?php } ?>
                                            </strong></div></td>
                                </tr>
                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central;"><strong>Pagamento Contante&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                <?php if ($nTrattamenti > 0) { ?>
                                                    <label data-cell="G3" data-format="€ 0,0.00" data-formula="IF(MP1=2,0,IMP1)"></label>
                                                <?php } else { ?>
                                                    <label data-cell="G3" data-format="€ 0,0.00">0,00</label>
                                                <?php } ?>
                                            </strong></div></td>
                                </tr>

                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central;"><strong>Pagamento Elettronico&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                <?php if ($nTrattamenti > 0) { ?>
                                                    <label data-cell="G4" data-format="€ 0,0.00" data-formula="IF(MP1=2,G1,0)"></label>
                                                <?php } else { ?>
                                                    <label data-cell="G4" data-format="€ 0,0.00">0,00</label>
                                                <?php } ?>
                                            </strong></div></td>
                                </tr>
                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central;"><strong>Non Riscosso&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                <?php if ($nTrattamenti > 0) { ?>
                                                    <label data-cell="G5" data-format="€ 0,0.00" data-formula="IF(G1-IMP1<0,0,G1-IMP1)"></label>
                                                <?php } else { ?>
                                                    <label data-cell="G5" data-format="€ 0,0.00">0,00</label>
                                                <?php } ?>
                                            </strong></div></td>
                                </tr>

                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central;"><strong>Resto&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                <?php if ($nTrattamenti > 0) { ?>
                                                    <label data-cell="G6" data-format="€ 0,0.00" data-formula="IF(IMP1-G1<0,0, IMP1-G1)"></label>
                                                <?php } else { ?>
                                                    <label data-cell="G6" data-format="€ 0,0.00">0,00</label>
                                                <?php } ?>
                                            </strong></div></td>
                                </tr>

                                <tr>

                                    <td style="width: 50%; text-align: right; vertical-align: central;"><strong>Importo Pagato&nbsp;</strong></td>
                                    <td style="width: 50%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                <?php if ($nTrattamenti > 0) { ?>
                                                    <!--                                                <label data-cell="G7" data-format="€ 0,0.00" data-formula="IF(IMP1-G1=<0, IMP1, G1)"></label>-->
                                                    <label data-cell="G7" data-format="€ 0,0.00" data-formula="IF(IMP1-G1<=0, IMP1, G1)"></label>
                                                <?php } else { ?>
                                                    <label data-cell="G7" data-format="€ 0,0.00">0,00</label>
                                                <?php } ?>
                                            </strong></div></td>
                                </tr>


                            </table>

                        </div>

//////




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

                                    <span class="item_name" id="trattamento-<?php echo $i; ?>"><?php echo $trattamento->trattamento; ?>
                                        <?php
                                        if (!isBlankOrNull($trattamento->trattamento)) {
                                            echo $trattamento->trattamento;
                                        }
                                        ?>
                                    </span>
                                </td>

                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <?php
                                    if (!isBlankOrNull($trattamento->categoria)) {

                                        $categoria = DAOFactory::getCategorieTattamentiDAO()->load($trattamento->categoria);
                                        echo $categoria->categoria;
                                    }
                                    ?>
                                    <div class="simpleCart_shelfItem" style="height: 200px;">
                                    <h5 class="item_name" id="trattamento-<?php echo $i; ?>"><?php echo $trattamento->trattamento; ?></h5>

                                    <strong>€&nbsp;<span class="item_price" id="costo-<?php echo $i; ?>" ><?php echo $trattamento->costo; ?></span></strong>
                                    <br><input type="number" name="quantita" id="quantita-<?php echo $i; ?>" value="1" style="width: 35px; height: 35px;">
                                    <?php $iva = DAOFactory::getAliquotaDAO()->load($trattamento->idAliquota); ?>
                                    <input type="hidden" name="iva" id="iva-<?php echo $i; ?>" value="<?php echo $iva->aliquota; ?>">


                                    <button id="add_item" class="btn btn-sm btn-primary" value="<?php echo $i; ?>" data-bind="cart">Aggiungi</button>
                                    <!--<p class="item_Description">descrizione servizio</p>-->
                                </div>
                                </td>

                                <td style="border-bottom: 1px dotted #057fd0;"><?php echo $trattamento->tempo; ?></td>
                                <td style="border-bottom: 1px dotted #057fd0;"><?php echo $trattamento->costo; ?></td>
                                <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">
                                    <a href="javascript: associaTrattamento('<?php echo $trattamento->id; ?>')"> <img src='img/icone/aggiungi.png' height="20"> </a>

                                    <button id="add_item" class="btn btn-sm btn-primary" value="<?php echo $trattamento->id; ?>" data-bind="cart">Aggiungi</button>
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


            
           <script>
        $form = $('#dynamic').calx();
        $itemlist = $('#itemlist');

        //$counter = 0;
        $counter =<?php echo $nTrattamenti; ?>


        $('button').click(function (e) {
            //$(this + " div")
            var codice = $(this).attr("data-bind");
            var x = $(this).val();
            //var codice = $(this.item_name).html();

//                alert('conetuto ' + codice);

            if (codice == 'cart') {
                var qta = $('#quantita-' + x).val();
                var tratt = $('#trattamento-' + x).html();
                var cust = $('#costo-' + x).html();
                var iva = $('#iva-' + x).val();
                //var tot = cust*qta;
                //
//alert (tot);



                e.preventDefault();
                var keyCode = e.keyCode || e.which;

                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
                var i = ++$counter;



                $itemlist.append(
                        '<tr>\
                    <td><input class="form-control input-sm text-right" data-cell="A' + i + '" data-format="0" value="' + qta + '" name="quantita[]"></td>\
                    <td><input class="form-control input-sm" data-cell="B' + i + '" value="' + tratt + '" name="descrizione[]"></td>\
                    <td><input class="form-control input-sm text-right" data-cell="C' + i + '" data-format="€ 0,0.00" value="' + cust + '"  name="importo[]"></td>\
                    <td><input class="form-control input-sm text-right" data-cell="D' + i + '" data-format="0[.]00 %" name="sconto[]"></td>\
                    <td><input class="form-control input-sm text-right" data-cell="E' + i + '" data-format="€ 0,0.00" data-formula="A' + i + '*(C' + i + '-(C' + i + '*D' + i + '))" name="totale[]"></td>\
                    <td><input class="form-control input-sm text-right" data-cell="F' + i + '" data-format="0[.]00 %" value="' + iva + '" name="aliquotaIva[]"><input type="hidden" name="iva[]" class="form-control input-sm text-right" data-cell="IVA' + i + '" data-format="€ 0 0.00" data-formula="E' + i + '-(E' + i + '/(1+F' + i + '))"></td>\
                    <td class="text-center"><a class="btn-remove btn btn-sm btn-danger"><i class="fa fa-times fa-fw"></i></a></td>\
                </tr>'
                        );
                //console.log('new row appended');

                $form.calx('update');
                $form.calx('getCell', 'E' + i).calculate();
                $form.calx('getCell', 'IVA' + i).calculate();

                //if($)

                $form.calx('getCell', 'G1').setFormula('SUM(E1:E' + i + ')');
                $form.calx('getCell', 'G1').calculate();

                $form.calx('getCell', 'G2').setFormula('SUM(IVA1:IVA' + i + ')');
                $form.calx('getCell', 'G2').calculate();

                $form.calx('getCell', 'G3').setFormula('IF(MP1=0,G1,0)');
                $form.calx('getCell', 'G3').calculate();

                $form.calx('getCell', 'G4').setFormula('IF(MP1=2,G1,0)');

                $form.calx('getCell', 'G7').setFormula('IF(MP1=0, G1, 0)');
                $form.calx('getCell', 'G7').calculate();

                $form.calx('getCell', 'TOTDOC1').setFormula('SUM(E1:E' + i + ')');
                $form.calx('getCell', 'TOTDOC1').calculate();

                $form.calx('getCell', 'TOTIVA1').setFormula('SUM(IVA1:IVA' + i + ')');
                $form.calx('getCell', 'TOTIVA1').calculate();


//                $form.calx('getCell', 'G3').setFormula('IF(MP1=2,0,IMP1)');
//
//                $form.calx('getCell', 'G4').setFormula('IF(MP1=2,G1,0)');
//
//                $form.calx('getCell', 'G5').setFormula('IF(G1-IMP1<0,0,G1-IMP1)');
//                $form.calx('getCell', 'G5').calculate();
//
//                $form.calx('getCell', 'G6').setFormula('IF(IMP1-G1<0,0, IMP1-G1)');
//                $form.calx('getCell', 'G6').calculate();
//
//                $form.calx('getCell', 'G7').setFormula('IF(IMP1-G1<=0, IMP1, G1)');
//
//                $form.calx('getCell', 'G7').calculate();

            }
            //console.log($form.calx('getSheet'));




        });
        $('#dynamic').on('change', '#modalitaPagamento', function () {

            var modPag = $('#modalitaPagamento').val();

            if (modPag == 2) {
                //alert("Pag");

                document.getElementById('importoPagato').value = '0.00';

                $("#importoPagato").prop("disabled", true);

                $form.calx('getCell', 'G3').setFormula('IF(MP1=2,0,IMP1)');

                $form.calx('getCell', 'G4').setFormula('IF(MP1=2,G1,0)');

                $form.calx('getCell', 'G5').setFormula('IF(MP1=2,0,0)');
                $form.calx('getCell', 'G5').calculate();

                $form.calx('getCell', 'G6').setFormula('IF(MP1=2,0,0)');
                $form.calx('getCell', 'G6').calculate();

                $form.calx('getCell', 'G7').setFormula('IF(MP1=2,G1,0)');

                $form.calx('getCell', 'G7').calculate();

                $form.calx('getCell', 'TOTDOC1').setFormula('SUM(E1:E' + i + ')');
                $form.calx('getCell', 'TOTDOC1').calculate();

                $form.calx('getCell', 'TOTIVA1').setFormula('SUM(IVA1:IVA' + i + ')');
                $form.calx('getCell', 'TOTIVA1').calculate();

            } else if (modPag == 8) {
                $("#importoPagato").prop("disabled", true);
                $("#importoPagato").prop("required", false);
                $form.calx('getCell', 'G5').setFormula('IF(MP1=8,G1,G1)');
                //$form.calx('getCell', 'G5').calculate();
                $form.calx('getCell', 'G5').calculate();

                $form.calx('getCell', 'TOTDOC1').setFormula('SUM(E1:E' + i + ')');
                $form.calx('getCell', 'TOTDOC1').calculate();

                $form.calx('getCell', 'TOTIVA1').setFormula('SUM(IVA1:IVA' + i + ')');
                $form.calx('getCell', 'TOTIVA1').calculate();

            } else {
                document.getElementById('importoPagato').value = '';
                $("#importoPagato").prop("disabled", false);
                $("#importoPagato").prop("required", true);

//               if(modPag == 1) {
//                    
//                    $form.calx('getCell', 'IMP1').setFormula('IF(MP1=1,G1,0)');
//                    $form.calx('getCell', 'IMP1').calculate();
//                }
                $form.calx('getCell', 'G3').setFormula('IF(MP1=2,0,IMP1)');

                $form.calx('getCell', 'G4').setFormula('IF(MP1=2,G1,0)');

                $form.calx('getCell', 'G5').setFormula('IF(G1-IMP1<0,0,G1-IMP1)');
                $form.calx('getCell', 'G5').calculate();

                $form.calx('getCell', 'G6').setFormula('IF(IMP1-G1<0,0, IMP1-G1)');
                $form.calx('getCell', 'G6').calculate();

                $form.calx('getCell', 'G7').setFormula('IF(IMP1-G1<=0, IMP1, G1)');

                $form.calx('getCell', 'G7').calculate();


            }


        });


        $('#itemlist').on('click', '.btn-remove', function () {

            $(this).parent().parent().remove();
            $form.calx('update');
            $form.calx('getCell', 'G1').calculate();

            $form.calx('getCell', 'G2').calculate();

            $form.calx('getCell', 'G5').calculate();

            $form.calx('getCell', 'G6').calculate();

            $form.calx('getCell', 'G7').calculate();
        });

        $('#show_formula').click(function (e) {
            e.preventDefault();
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }

            if ($(this).attr('data-shown') == '0') {
                $('[data-formula],[data-cell]').each(function () {
                    $(this).after('<span class="formula">' + $(this).attr('data-cell') + ($(this).attr('data-formula') ? ' = ' + $(this).attr('data-formula') : '') + '&nbsp;</span>');
                });

                $(this).attr('data-shown', 1).html('Hide Formula');
            } else {
                $('span.formula').remove();
                $(this).attr('data-shown', 0).html('Show Formula');
            }
        });
//        $('#dynamic').on('keyup keypress', function(e) {
//  var keyCode = e.keyCode || e.which;
//  if (keyCode === 13) { 
//    e.preventDefault();
//    return false;
//  }
//});
    </script>