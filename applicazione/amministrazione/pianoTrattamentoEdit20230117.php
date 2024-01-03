<?php
global $pianoTrattamento, $pianoTrattamentoDettaglio, $cliente;
$listaTrattamenti = DAOFactory::getTrattamentiDAO()->queryAll();

/*   echo '<pre>';
  print_r($pianoTrattamento);
  print_r($pianoTrattamentoDettaglio);
  echo '</pre>';
/*
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
            <form action="index.php" method="post" id="dynamic">
                <input type="hidden" id="action" name="action" value="salvaEditPiano">
                <input type="hidden" id="idCliente" name="idCliente" value="<?php
                if (isset($cliente)) {
                    echo $cliente->id;
                }
                ?>"/>
                <input type="hidden" id="idPiano" name="idPiano" value="<?php
                if (isset($pianoTrattamento)) {
                    echo $pianoTrattamento->id;
                }
                ?>"/>
                <input type="hidden" id="righeDaEliminare" name="righeDaEliminare">
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
                                        for ($kk = 0; $kk < count($stati); $kk++) {
                                            $stato = $stati[$kk];
                                            ?>
                                            <option value="<?php echo $stato->id; ?>" <?php if ($stato->id == $pianoTrattamento->stato) { ?> selected="" <?php } ?>><?php echo $stato->descrizione; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>


                                </td>
                            </tr>
                            <tr><td>Numero Sedute</td><td <td style="font-weight: bold;"><?php echo $pianoTrattamento->seduteNumero; ?></td></tr>
                            <?php if (isAdmin()) { ?>
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
                            <tr><td>Note</td><td><?php //echo $cliente->note;      ?></td></tr>

                        </table>
                    </div>
                </div> <?php //exit;      ?>

                <div style="padding: 10px;">
                    <div class="shoppingcart-container" style="height: 350px;  overflow-y: scroll;">

                        <div style="width:100%;" class="simpleCart_items">

                            <!--<form class="form-horizontal" id="dynamic">-->

                            <table class="table">
                                <thead>
                                    <tr>
                                        <td style="width: 15%" class="text-center"><label>Qtà</label></td>
                                        <td style="width: 50%"><label>Descrizione</label></td>
                                        <td style="width: 15%" class="text-center"><label>Importo</label></td>
                                        <!--<td style="width: 15%" class="text-center"><label>Sc. %</label></td>-->
                                        <td style="width: 15%" class="text-center"><label>Totale</label></td>

                                        <td style="width: 5%" class="text-center"><label></label></td>
                                    </tr>
                                </thead>
                                <tbody id="itemlist">

                                    <?php
                                    $nTrattamenti = count($pianoTrattamentoDettaglio);
                                    for ($t = 0; $t < count($pianoTrattamentoDettaglio); $t++) {
                                        $trattDett = $pianoTrattamentoDettaglio[$t];
                                        ?>
<!--                                        <tr>
                                            <td><input type="text" value="<?php //echo $trattDett->qta; ?>"></td>
                                            <td><?php //echo $trattDett->trattamento; ?></td>
                                            <td><?php //echo $trattDett->prezzoUnitario; ?></td>
                                            <td><?php //echo $trattDett->totaleRiga; ?></td>
                                            <td></td>
                                        </tr>-->
                                        <tr>
                                            <td><input type="hidden" id="rigaDaEliminare" name="idRiga[]" value="<?php echo $trattDett->id; ?>"><input class="form-control input-sm text-right" data-cell="A<?php echo $t + 1; ?>" data-format="0" value="<?php echo $trattDett->qta; ?>" name="quantitaRiga[]"></td>
                                            <td><input type="hidden" name="trattamenti[]" value="<?php echo $trattDett->idTrattamentoPiano; ?>"><input class="form-control input-sm" data-cell="B<?php echo $t + 1; ?>" value="<?php echo $trattDett->trattamento; ?>" name="descrizione[]"></td>
                                            <td><input class="form-control input-sm text-right" data-cell="C<?php echo $t + 1; ?>" data-format="€ 0,0.00" value="<?php echo $trattDett->prezzoUnitario; ?>" name="importo[]"></td>
                                            <!--<td><input class="form-control input-sm text-right" data-cell="D<?php echo $t + 1; ?>" data-format="0[.]00 %" name="sconto[]"></td>-->
                                            <td><input class="form-control input-sm text-right" data-cell="E<?php echo $t + 1; ?>" data-format="€ 0,0.00" data-formula="A<?php echo $t + 1; ?>*(C<?php echo $t + 1; ?>-(C<?php echo $t + 1; ?>*D<?php echo $t + 1; ?>))" value="<?php echo $trattDett->totaleRiga; ?>" name="totaleRiga[]"></td>

                                            <td class="text-center"><a class="btn-remove btn btn-sm btn-danger"><i class="fa fa-times fa-fw"></i><b>X</b></a></td>
                                        </tr>  
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
      
                        <div style="background: #ddd; width: 100%; border: 1px solid #CCC; border-radius: 10px; padding: 10px;">
                            <!--<input type="radio" name="tipoDoc">&nbsp;Preventivo&nbsp;<input type="radio" name="tipoDoc">&nbsp;Fattura&nbsp;<input type="radio" name="tipoDoc">&nbsp;Documento Commerciale di Vendita o Prestazione-->
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>

                                    <td style="width: 60%; text-align: right; vertical-align: central; font-size: 1.2em"><strong>TOTALE PIANO TERAPEUTICO&nbsp;</strong></td>
                                    <td style="width: 40%; text-align: right; vertical-align: central;"><div id="cartTotal"><strong>€&nbsp;
                                                <?php if (count($pianoTrattamentoDettaglio) > 0) { ?>
                                                    <label data-cell="G1" data-format="€ 0,0.00" data-formula="SUM(E1:E<?php echo $nTrattamenti; ?>)"></label>
                                                    <!---TOTALE DOCUMENTO, TOTALE IVA-->
                                                    <input type="hidden" name="totaleDocumento" data-cell="TOTDOC1" data-formula="SUM(E1:E<?php echo $nTrattamenti; ?>)" />
                                                    


                                                <?php } else { ?>
                                                    <label data-cell="G1" data-format="€ 0,0.00">0,00</label>
                                                <?php } ?>
                                            </strong></div></td>
                                </tr>
                                
             
                            </table>
                           

                        </div>
                     <p style="text-align: right;"><input type="submit" class="btn btn-green" value="SALVA"></p>
                     <p style="border-bottom: 1px dotted #333;">&nbsp;</p>
                    

                    
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
                        <div class="simpleCart_shelfItem">
                            <tr <?php echo $backgroundTR; ?>>
                                <td style="border-bottom: 1px dotted #057fd0;">

                                   
                                        <?php
                                        if (!isBlankOrNull($trattamento->trattamento)) {
                                           ?>
                                     <span class="item_name" id="trattamento-<?php echo $i; ?>"><?php echo $trattamento->trattamento; ?></span>
                                         <?php
                                            //echo $trattamento->trattamento;
                                        }
                                        ?>
                                    
                                </td>

                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <?php
                                    if (!isBlankOrNull($trattamento->categoria)) {

                                        $categoria = DAOFactory::getCategorieTattamentiDAO()->load($trattamento->categoria);
                                        echo $categoria->categoria;
                                    }
                                    ?>
                                    
                                        

                                   
                                    
                                    <!--<p class="item_Description">descrizione servizio</p>-->
                                
                                </td>

                                <td style="border-bottom: 1px dotted #057fd0;"><?php echo $trattamento->tempo; ?></td>
                                <td style="border-bottom: 1px dotted #057fd0;">€&nbsp;<span class="item_price" id="costo-<?php echo $i; ?>" ><?php echo $trattamento->costo; ?></span></td>
                                <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">
                                    <br><input type="number" name="quantita" id="quantita-<?php echo $i; ?>" value="1" style="width: 35px; height: 35px;">
                                   
                                    <input type="hidden" name="idTratt" id="idTratt-<?php echo $i; ?>" value="<?php echo $trattamento->id; ?>">


                                    <button id="add_item" class="btn btn-sm btn-primary" value="<?php echo $i; ?>" data-bind="cart">Aggiungi</button>
                                </td>
                            </tr>
                            </div>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>
                    <?php
                   /*
                    echo '<pre>';
                    //print_r($pianoTrattamento);
                    print_r($pianoTrattamentoDettaglio);
                    echo '</pre>';
                    * 
                    */
                    ?>











                    <!--FINE--->


                    

                </div>

            </form>
        </div>
        <div style="clear:left;">&nbsp;</div>

          
           <script>
               //alert("bbbbbb");
        $form = $('#dynamic').calx();
        $itemlist = $('#itemlist');
        let righeDaEliminareArray = [];

        //$counter = 0;
        $counter =<?php echo count($pianoTrattamentoDettaglio); ?>


        $('button').click(function (e) {
            //$(this + " div")
            var codice = $(this).attr("data-bind");
            var x = $(this).val();
            //var codice = $(this.item_name).html();

//                alert('conetuto ' + codice);

            if (codice == 'cart') {
                var qta = $('#quantita-' + x).val();
                if(qta==1){ 
                    
                    var sedute = $('#numeroSedute').val();
                    //alert(sedute);
                    if ((isNaN(sedute)) || sedute == '') {
                        qta = 1;
                        $('#numeroSedute').val(sedute);
                    } else{
                       qta =sedute; 
                    }
                                
                }
                var tratt = $('#trattamento-' + x).html();
                var cust = $('#costo-' + x).html();
                var idTratt = $('#idTratt-' + x).val();
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
                    <td><input type="hidden" name="trattamenti[]" value="' + idTratt + '"><input class="form-control input-sm text-right" data-cell="A' + i + '" data-format="0" value="' + qta + '" name="quantitaRiga[]"><input type="hidden" name="idRiga[]" value="new"></td>\
                    <td><input class="form-control input-sm" data-cell="B' + i + '" value="' + tratt + '" name="descrizione[]"></td>\
                    <td><input class="form-control input-sm text-right" data-cell="C' + i + '" data-format="€ 0,0.00" value="' + cust + '"  name="importo[]"></td>\
                    <td><input class="form-control input-sm text-right" data-cell="E' + i + '" data-format="€ 0,0.00" data-formula="A' + i + '*(C' + i + '-(C' + i + '*D' + i + '))" name="totaleRiga[]"></td>\
                    <td class="text-center"><a class="btn-remove btn btn-sm btn-danger"><i class="fa fa-times fa-fw"></i><b>X</b></a></td>\
                </tr>'
                        );
                //console.log('new row appended');

                $form.calx('update');
                $form.calx('getCell', 'E' + i).calculate();
                //$form.calx('getCell', 'IVA' + i).calculate();

                //if($)

                $form.calx('getCell', 'G1').setFormula('SUM(E1:E' + i + ')');
                $form.calx('getCell', 'G1').calculate();

//                $form.calx('getCell', 'G2').setFormula('SUM(IVA1:IVA' + i + ')');
//                $form.calx('getCell', 'G2').calculate();

//                $form.calx('getCell', 'G3').setFormula('IF(MP1=0,G1,0)');
//                $form.calx('getCell', 'G3').calculate();
//
//                $form.calx('getCell', 'G4').setFormula('IF(MP1=2,G1,0)');

                //$form.calx('getCell', 'G7').setFormula('IF(MP1=0, G1, 0)');
                //$form.calx('getCell', 'G7').calculate();

                $form.calx('getCell', 'TOTDOC1').setFormula('SUM(E1:E' + i + ')');
                $form.calx('getCell', 'TOTDOC1').calculate();

//                $form.calx('getCell', 'TOTIVA1').setFormula('SUM(IVA1:IVA' + i + ')');
//                $form.calx('getCell', 'TOTIVA1').calculate();


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
        
//        $('#dynamic').on('change', '#modalitaPagamento', function () {
//
//            var modPag = $('#modalitaPagamento').val();
//
//            if (modPag == 2) {
//                //alert("Pag");
//
//                document.getElementById('importoPagato').value = '0.00';
//
//                $("#importoPagato").prop("disabled", true);
//
//                $form.calx('getCell', 'G3').setFormula('IF(MP1=2,0,IMP1)');
//
//                $form.calx('getCell', 'G4').setFormula('IF(MP1=2,G1,0)');
//
//                $form.calx('getCell', 'G5').setFormula('IF(MP1=2,0,0)');
//                $form.calx('getCell', 'G5').calculate();
//
//                $form.calx('getCell', 'G6').setFormula('IF(MP1=2,0,0)');
//                $form.calx('getCell', 'G6').calculate();
//
//                $form.calx('getCell', 'G7').setFormula('IF(MP1=2,G1,0)');
//
//                $form.calx('getCell', 'G7').calculate();
//
//                $form.calx('getCell', 'TOTDOC1').setFormula('SUM(E1:E' + i + ')');
//                $form.calx('getCell', 'TOTDOC1').calculate();
//
//                $form.calx('getCell', 'TOTIVA1').setFormula('SUM(IVA1:IVA' + i + ')');
//                $form.calx('getCell', 'TOTIVA1').calculate();
//
//            } else if (modPag == 8) {
//                $("#importoPagato").prop("disabled", true);
//                $("#importoPagato").prop("required", false);
//                $form.calx('getCell', 'G5').setFormula('IF(MP1=8,G1,G1)');
//                //$form.calx('getCell', 'G5').calculate();
//                $form.calx('getCell', 'G5').calculate();
//
//                $form.calx('getCell', 'TOTDOC1').setFormula('SUM(E1:E' + i + ')');
//                $form.calx('getCell', 'TOTDOC1').calculate();
//
//                $form.calx('getCell', 'TOTIVA1').setFormula('SUM(IVA1:IVA' + i + ')');
//                $form.calx('getCell', 'TOTIVA1').calculate();
//
//            } else {
//                document.getElementById('importoPagato').value = '';
//                $("#importoPagato").prop("disabled", false);
//                $("#importoPagato").prop("required", true);
//
////               if(modPag == 1) {
////                    
////                    $form.calx('getCell', 'IMP1').setFormula('IF(MP1=1,G1,0)');
////                    $form.calx('getCell', 'IMP1').calculate();
////                }
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
//
//
//            }
//
//
//        });


        $('#itemlist').on('click', '.btn-remove', function () {
            
            

            $(this).parent().parent().remove();
            
            var varEl = $(this).parent().parent().children().children('#rigaDaEliminare').val();
            
            if (varEl != undefined) {
               righeDaEliminareArray.push(varEl);
            }
            
            $('#righeDaEliminare').val(righeDaEliminareArray);
             
            $form.calx('update');
            $form.calx('getCell', 'G1').calculate();
            $form.calx('getCell', 'TOTDOC1').calculate();

            //$form.calx('getCell', 'G2').calculate();

            //$form.calx('getCell', 'G5').calculate();

            //$form.calx('getCell', 'G6').calculate();

           // $form.calx('getCell', 'G7').calculate();
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
