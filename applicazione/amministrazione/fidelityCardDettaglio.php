<?php
global $cliente, $cardCliente, $listaMovimentiCard;


?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!--</div> NON CANCELLARE QUESTO TAG - l'apertura è nelle file header-->

<link rel="stylesheet" type="text/css" href="vendors/dataTables/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="vendors/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datatableMovimentiCard').dataTable({
            "order": [[0, "desc"]], //[0, "desc"]
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
            "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
        });

        




    });
</script>

<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            <!--INIZIO--->


            <div>
                <div style="width: 100%; height: 60px; background-color: #F6F6F6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        FIDELITY CARD N: <?php echo $cardCliente->codiceBarre; ?> - TITOLARE: <?php echo $cliente->nome . " " . $cliente->cognome; ?></h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="index.php?action=listaFidelityCard" class="btn btn-green" >Torna alla Lista</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-2">
            <div class="content">

                <fieldset class="border">
                    <legend>Anagrafica Cliente</legend> 

                    <table style="margin-left:auto; margin-right:auto;">


                        <tr>
                            <td>Nome</td>
                            <td>&nbsp;</td>
                            <td><?php echo $cliente->nome; ?></td>
                        </tr>
                        <tr>
                            <td>Cognome </td>
                            <td>&nbsp;</td>
                            <td><?php echo $cliente->cognome; ?></td>
                        </tr>
<!--                        <tr>
                            <td>Telefono</td>
                            <td>&nbsp;</td>
                            <td><?php //echo $cliente->telefono;  ?></td>
                        </tr>-->
                        <tr>
                            <td>Cellulare</td>
                            <td>&nbsp;</td>
                            <td><?php echo $cliente->cellulare; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>&nbsp;</td>
                            <td><?php echo $cliente->email; ?></td>
                        </tr>
                        <tr>
                            <td>Data Nascita</td>
                            <td>&nbsp;</td>
                            <td><?php
                                if (isset($cliente->dataNascita)) {
                                    echo dateFromDb($cliente->dataNascita);
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td>Città</td>
                            <td>&nbsp;</td>
                            <td>
                                <?php
                                $cittaCliente = null;
                                if (isset($cliente)) {
                                    if (!isBlankOrNull($cliente->citta)) {
                                        $cittaCliente = DAOFactory::getComuniDAO()->load($cliente->citta);
                                        echo $cittaCliente->comune;
                                    }
                                }
                                ?>
                            </td>
                        </tr>


                        <tr>
                            <td>Codice Fiscale</td>
                            <td>&nbsp;</td>
                            <td><?php echo $cliente->cFiscale; ?></td>
                        </tr>


                    </table>   
                    
                </fieldset>

            </div>
        </div>

        <div class="col-1-2">
            <div class="content">
                <fieldset class="border">
                    <legend>Fidelity Card: </legend> 
                    <div style=" text-align: right; padding: 10px 15px;">
                       <table style="margin-left:auto; margin-right:auto;">


                        <tr>
                            <td>Saldo Punti </td>
                            <td>&nbsp;</td>
                            <td><?php echo formattaImportoEuropeo($cardCliente->saldoPunti); ?></td>
                        </tr>
                           <tr>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                           </tr>
                           <tr>
                            <td>Card N.</td>
                            <td>&nbsp;</td>
                            <td><?php echo $cardCliente->codiceBarre; ?></td>
                        </tr>
                        

                         <tr>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                         </tr>
                         <tr>
                            <td>Data Emissionre</td>
                            <td>&nbsp;</td>
                            <td><?php
                                if (isset($cardCliente->dataEmissione)) {
                                    echo dateFromDb($cardCliente->dataEmissione);
                                }
                                ?></td>
                        </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                         </tr>
                        


                      </table>    
                    </div>

                </fieldset>

               

            </div>
        </div>

    </div> 

    <div style="clear:left;">&nbsp;</div>
    <div class="grid grid-pad">
        <div class="col-1-1">
            
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                    LISTA MOVIMENTI FIDELITY CARD</h2>

                <table style="width: 100%" id="datatableMovimentiCard">
                    <thead>
                        <tr>

                            <th align="left">
                                Data </th>
                            <th>Descrizione</th>
                            <th align="left">Importo Speso</th>
                            <th align="left">Punti Erogati</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        for ($i = 0; $i < count($listaMovimentiCard); $i++) {
                            $movimento = $listaMovimentiCard[$i];
                            ?>
                            <tr>

                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <span style="display: none"><?php echo $movimento->data; ?></span>
                                    <?php
                                    if (!isBlankOrNull($movimento->data)) {
                                        echo dateFromDb($movimento->data);
                                    }
                                    ?>
                                </td>

                                <td style="border-bottom: 1px dotted #057fd0;">

                                    <?php
                                    echo $movimento->descrizione;
                                    ?>
                                </td>

                                
                                 <td style="border-bottom: 1px dotted #057fd0;">
                                    <?php
                                    if (isset($movimento)) {
                                      echo formattaImportoEuropeo($movimento->importo);
                                    }
                                    ?>
                                </td>
                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <?php
                                    if (isset($movimento)) {
                                      echo formattaImportoEuropeo($movimento->punti);
                                    }
                                    ?>
                                </td>

                            </tr>
                                  <?php
                                    
                                    }
                                    ?>
                                
                    </tbody>


                    <tfoot></tfoot>


                </table>

            </div>

        </div>
    </div>

    <div style="clear:left;">&nbsp;</div>
   
   