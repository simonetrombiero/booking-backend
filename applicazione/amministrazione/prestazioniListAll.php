<?php
global $listaPrestazioni;

//print_r($listaPrestazioni);
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
                        "order": [[1, "desc"]], //[0, "desc"]
                        "lengthMenu": [[-1, 10, 25, 50, 100], ["Tutti", 10, 25, 50, 100]],
                        "language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
                    });

                });
            </script>





            <form action="index.php" id="gestionePrestazione" name="gestionePrestazione" method="post">
                <input type="hidden" id="action" name="action">
                <input type="hidden" id="idPiano" name="idPiano">
            </form>    
            
             <form action="index.php" id="gestioneClienti" name="gestioneClienti" method="post">
                <input type="hidden" id="action" name="action" value="visualizzaCliente">
                <input type="hidden" id="id" name="id">
            </form>    




            <!--<div class="grid grid-pad">-->
            <!--<div class="col-1-1">-->
            <div>
                <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                        LISTA PRESTAZIONI</h2>
                    <div style=" text-align: right; padding: 10px 15px;">
                        <a href="index.php?action=prestazioniPazienti" class="btn btn-green" >Prestazioni in Corso</a>
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
                            <th align="left">Cliente</th>
                            <th align="left">Data</th>
                            <th align="left">Trattamento</th>
                            <th>Stato</th>
                            <th align="left">Trattamenti Eseguiti</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($listaPrestazioni); $i++) {
                            $prestazione = $listaPrestazioni[$i];
                            ?>
                            <tr>

                                <td style="border-bottom: 1px dotted #057fd0;">
                                     <?php
                                    if (!isBlankOrNull($prestazione->idPaziente)) {
                                        $paziente = DAOFactory::getClientiDAO()->load($prestazione->idPaziente);
                                        ?>
                                    <a href="#" onclick="document.getElementById('gestioneClienti').id.value = '<?php echo $paziente->id; ?>';
                                                    document.getElementById('gestioneClienti').submit();">
                                    <?php
                                        echo $paziente->nome . " " . $paziente->cognome;
                                    }
                                    ?>
                                    </a>
                                </td>
                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <span style="display: none"><?php echo $prestazione->data; ?></span>
    <?php
    echo dateFromDb($prestazione->data);

//                                                                if(!isBlankOrNull($prestazione->nome)){
//                                                                    echo $prestazione->nome;
//                                                                } 
    ?>
                                </td>
                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <?php
                                    echo $prestazione->titolo
                                    ?>
                                </td>
                                <td style="border-bottom: 1px dotted #057fd0;">
                                    <?php
                                    $statotmp='';
    

                                                                if($prestazione->stato>0){
                                                                    $statotmp = DAOFactory::getPianoTrattamentoStatusDAO()->load($prestazione->stato);
                                                                    echo $statotmp->descrizione;
                                                                } 
    ?>
                                </td>

                                 <td style="border-bottom: 1px dotted #057fd0; width: 20%;">
    <?php
    //$presenza = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryPresenzaTrattamentoID($prestazione->id);
    //$totSedute = DAOFactory::getPianoTrattamentoDettaglioDAO()->queryByTrattamentoID($prestazione->id);
    $presenza = DAOFactory::getPrenotazioniDAO()->queryPresenza($prestazione->id);     
    $assenza = DAOFactory::getPrenotazioniDAO()->queryAssenza($prestazione->id);
    $totSedute = $prestazione->seduteNumero;
    $rps=count($presenza)/$totSedute;
    
    
    ?>
                                    
                                    
       
     
               <div style="background: red; color: #fff; width: 100%; height: 40px;">
                   <div style="background: #008000; color: #fff; width: <?php echo round($rps*100);?>%; padding-left: 0px; height: 40px; line-height:40px">
                       <div style="background: transparent; color: #fff; width: 100%; height: 40px; padding-left: 5px;">
                       <span style="display: none"><?php echo $rps; ?></span>
                       <?php //echo count($presenza) . "/" . $totSedute." (".round($rps*100) . "%)"; ?>
                       <?php // echo count($presenza) . "/" . $totSedute; ?>
                       <?php 
                                                if(count($assenza)>0){
                                                    echo count($presenza)+count($assenza)."(-".count($assenza).")"."/". $totSedute; 
                                                } else {
                                                    echo count($presenza) . "/" . $totSedute; 
                                                }
                                               
                                                ?>
                       </div>
                   </div>
               </div>                     
         
     
                                </td>
                                <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">

                                    <a href="#" onclick="document.getElementById('gestionePrestazione').idPiano.value = '<?php echo $prestazione->id; ?>';
                                            document.getElementById('gestionePrestazione').action.value = 'visualizzaPiano';
                                            document.getElementById('gestionePrestazione').submit();">
                                        <img src="img/icone/view.png" alt="Visualizza" title="Visualizza" style="width: 25px; padding: 2px"/></a>
    <!--                                                                <a href="#" onclick="document.getElementById('gestionePrestazione').id.value='<?php echo $prestazione->id; ?>'; document.getElementById('gestionePrestazione').action.value='modificaIncarico'; document.getElementById('gestionePrestazione').submit();">
                                        <img src="applicazione/img/icone/edit.png" alt="Modifica" title="Modifica" style="width: 25px; padding: 2px"/></a>
                                    <a href="#" onclick="document.getElementById('gestionePrestazione').id.value='<?php echo $prestazione->id; ?>'; document.getElementById('gestionePrestazione').action.value='eliminaIncarico'; document.getElementById('gestionePrestazione').submit();">
                                   
                                        <img src="applicazione/img/icone/delete.png" alt="Elimina" title="Elimina" style="width: 25px; padding: 2px"/></a>-->

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

