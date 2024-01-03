<?php
global $pianoTrattamento, $pianoTrattamentoDettaglio;

global $cliente;

$oggi = date("Y-m-d");

//print_r($listaPianoTattamenti);
 $appuntamentiAgenda = DAOFactory::getPrenotazioniDAO()->queryByIdPiano($pianoTrattamento->id);
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
    $(function() {
        $('#datatable').dataTable({
        "order": [[ 0, "desc"]], //[0, "desc"]
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


                 

<?php 

//echo '<pre>';
   // print_r($pianoTrattamento);
    
    //print_r($pianoTrattamentoDettaglio);
    //print_r($cliente);
 //   echo '</pre>';

//exit;
?>

<!--<div class="grid grid-pad">-->
    <!--<div class="col-1-1">--> 
        <div>
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                                            <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                                                    PIANO TRATTAMENTO CLIENTE: <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').id.value='<?php echo $cliente->id; ?>'; document.getElementById('gestionePianoTrattamenti').action.value='visualizzaCliente'; document.getElementById('gestionePianoTrattamenti').submit();" class="linkScheda"><?php echo $cliente->nome. " ".$cliente->cognome;  ?></a>

                                            </h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
<!--                                                <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idCliente.value='<?php //echo $cliente->id; ?>'; document.getElementById('gestionePianoTrattamenti').action.value='listaPianoTerapeutico'; document.getElementById('gestionePianoTrattamenti').submit();" class="btn btn-green" ><< Indietro</a>-->
                                                <a href="index.php?action=eliminaPiano&amp;id=<?php echo $pianoTrattamento->id; ?>" onclick="return confirm('Vuoi eliminare il Piano di cura e gli APPUNTAMENTI associati?');" class="btn btn-green" >Elimina</a>
                                                <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idPiano.value='<?php echo $pianoTrattamento->id; ?>'; document.getElementById('gestionePianoTrattamenti').action.value='modificaPiano'; document.getElementById('gestionePianoTrattamenti').submit();" class="btn btn-green" >Modifica</a>
                                            </div>
                                        </div>
            <p>&nbsp;</p>
        </div>
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
         <?php include 'applicazione/amministrazione/morfologica/schedaView.php'; ?>
          
                </div>
                <div class="col-6-12">
                     <p style="color: black; font-size: 1.1em; font-weight: bold;">DATI PAZIENTE</p>
                <table>
                    <tr><td>Nome</td><td><?php echo $cliente->nome;?></td></tr>
                    <tr><td>Cognome</td><td><?php echo $cliente->cognome;?></td></tr>
                    <tr><td>Telefono</td><td><?php echo $cliente->cellulare;?></td></tr>
                    <tr><td>Email</td><td><?php echo $cliente->email;?></td></tr>
                    <tr><td>Data di Nascita</td><td><?php echo dateFromDb($cliente->dataNascita)." (". getAge($cliente->dataNascita)." anni)";?></td></tr>
                    <tr><td>Note</td><td><?php //echo $cliente->note;?></td></tr>
                    
                </table>
                    <p style="color: black; font-size: 1.1em; font-weight: bold;">PIANO DI CURA</p>
                      <table>
                    <tr><td>Titolo</td><td><?php echo $pianoTrattamento->titolo;?></td></tr>
                    <tr><td>Data Creazione</td><td><?php echo dateFromDb($pianoTrattamento->data);?></td></tr>
                    <tr><td>Numero Sedute</td><td <td style="font-weight: bold;"><?php echo $pianoTrattamento->seduteNumero ?></td></tr>
                    <tr><td>Numero Trattamenti</td><td <td style="font-weight: bold;"><?php echo count($pianoTrattamentoDettaglio); ?></td></tr>
                    <?php if($pianoTrattamento->seduteNumero!=count($appuntamentiAgenda)){?>
                    <tr style="background: red; color: white">
                    <?php } else {?>
                    <tr>
                        <?php     } ?>
                        
                        <td>Appuntamenti Fissati</td><td <td style="font-weight: bold;"><?php echo count($appuntamentiAgenda); ?></td>
                    </tr>
                    <?php //if(isAdmin()){ ?>
<!--                    <tr><td>Totale Trattamento </td><td style="font-weight: bold;"><span><?php //echo formattaImportoEuro($pianoTrattamento->totaleTrattamento);?></span></td></tr>
                    <tr><td>Totale Saldato </td><td style="font-weight: bold;"><span style="font-weight: bold"><?php //echo formattaImportoEuro($pianoTrattamento->totaleSaldato);?></span></td></tr>
                    <tr><td>Totale da Saldare </td><td style="font-weight: bold;"><span style="font-weight: bold"><?php //echo formattaImportoEuro($pianoTrattamento->totaleDaSaldare);?></span></td></tr>-->
                    <?php //} ?>
                    <tr><td>Note</td><td><?php echo $pianoTrattamento->note;?></td></tr>
                    
                </table>
                    <p style="color: black; font-size: 1.1em; font-weight: bold;">DETTAGLIO PIANO DI CURA</p>
                    <table>
                        <?php
                                                    for ($i = 0; $i < count($pianoTrattamentoDettaglio); $i++) {
                                                        $richiamo = $pianoTrattamentoDettaglio[$i];
                                                        
                                                        
                                                        ?>
                                                        <tr>
                                                            
<!--                                                          <td style="border-bottom: 1px dotted #057fd0;">
                                                              <span style="display: none"><?php echo $richiamo->data; ?></span>
                                                            <?php 
                                                          //  echo dateFromDb($richiamo->data);
                                                                
                                                                ?>
                                                          
                                                        </td>-->
                                                            <td>
                                                                
                                                                <?php
                                                                echo $richiamo->trattamento;

                                                                ?>
                                                                 
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                    </table>
                    
                </div>
            </div>
        <div style="padding: 10px;">
            <p style="color: black; font-size: 1.1em; font-weight: bold; border-bottom: 1px solid #111111;">APPUNTAMENTI ASSOCIATI AL PIANO</p>

           
            
                                            <table style="width: 100%" id="datatable">
                                                <thead>
                                                    <tr>
                                                        
                                                      <!--<th align="left">N. </th>-->
                                                        <th style="text-align: center; width: 15%;">Seduta del </th>
                                                        
                                                        <th style="text-align: center; width: 10%;">
                                                            Ora
                                                        </th>
                                                        <th>Presenza</th>
                                                        <!--<th>Postazione</th>-->
                                                        <!--<th>Operatore</th>-->
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
                                                            
                                                            
<!--                                                          <td style="border-bottom: 1px dotted #057fd0;">
                                                              <span style="display: none"><?php echo $richiamo->data; ?></span>
                                                            <?php 
                                                          //  echo dateFromDb($richiamo->data);
                                                                
                                                                ?>
                                                          
                                                        </td>-->
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
                                                            <!--<td style="border-bottom: 1px dotted #057fd0;">-->
                                                                <?php
//                                                            if(!isBlankOrNull($richiamo->postazione)){
//                                                                    $stato = DAOFactory::getPostazioniDAO()->load($richiamo->postazione);
//                                                                    echo $stato->postazione;
//                                                                }
                                                                ?>
                                                            <!--</td>-->
                                                            <!--<td style="border-bottom: 1px dotted #057fd0;">-->
                                                                 <?php
//                                                            if(!isBlankOrNull($richiamo->operatore)){
//                                                                    $stato = DAOFactory::getDipendenteDAO()->load($richiamo->operatore);
//                                                                    echo $stato->nome." ".$stato->cognome;
//                                                                }
                                                                ?>
                                                            <!--</td>-->
                                                            <td style="border-bottom: 1px dotted #057fd0;"><?php echo $appuntamento->note; ?></td>
                                                            
                                                            <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">
                                                               

                                                              <!--  <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idPiano.value='<?php echo $richiamo->id; ?>'; document.getElementById('gestionePianoTrattamenti').action.value='visualizzaPiano'; document.getElementById('gestionePianoTrattamenti').submit();">
                                                                    <img src="img/icone/view.png" alt="Verifica Annuncio" title="Verifica Annuncio" style="width: 25px; padding: 2px"/></a>
                                                                <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').idPiano.value='<?php echo $richiamo->id; ?>'; document.getElementById('gestionePianoTrattamenti').action.value='modificaPiano'; document.getElementById('gestionePianoTrattamenti').submit();">
                                                                    <img src="applicazione/img/icone/edit.png" alt="Modifica" title="Modifica" style="width: 25px; padding: 2px"/></a>
                                                                
                                                                <a href="index.php?action=eliminaCliente&amp;id=<?php echo $richiamo->idclienti; ?>">
                                                                    <img src="applicazione/img/icone/delete.png" alt="Elimina" title="Elimina" style="width: 25px; padding: 2px"/></a>-->
                                                     <a href="index.php?action=visualizzaAppuntamento&id=<?php echo $appuntamento->id; ?>"><img src="img/icone/view.png" alt="Visualizza Appuntamento" title="Visualizza Appuntamento" style="width: 20px; padding: 2px"></a>
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
           
      