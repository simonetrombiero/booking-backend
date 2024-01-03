<?php
 global $cliente, $listaTrattamenti;
 
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
    $(function() {
        $('#datatable').dataTable({
        "order": [[ 0, "desc" ]], //[0, "desc"]
	"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
	"language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
    });
        
    });
</script>

                
                
                

                <form action="index.php" id="gestioneschedaVisoCorpo" name="gestioneschedaVisoCorpo" method="post">
                    <input type="hidden" id="action" name="action">
                    <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id;?>">
                    <input type="hidden" id="idScheda" name="idScheda">
                </form>   
  <form action="index.php" id="Cliente" name="Cliente" method="post">
                    <input type="hidden" id="action" name="action">
                    <input type="hidden" id="idCliente" name="id" value="<?php echo $cliente->id;?>">
                    
                </form>      




<!--<div class="grid grid-pad">-->
    <!--<div class="col-1-1">-->
        <div>
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                              <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                                                TRATTAMENTI VISO/CORPO: <a href="#" onclick="document.getElementById('gestionePianoTrattamenti').id.value='<?php echo $cliente->id; ?>'; document.getElementById('gestionePianoTrattamenti').action.value='visualizzaCliente'; document.getElementById('gestionePianoTrattamenti').submit();" class="linkScheda"><?php echo $cliente->nome . " " . $cliente->cognome; ?></a>
                                            </h2>
                <div style=" text-align: right; padding: 10px 15px;"><a href="#" onclick="document.getElementById('Cliente').action.value='visualizzaCliente'; document.getElementById('Cliente').submit();" class="btn btn-green" ><<</a>&nbsp;
                                                <a href="#" onclick="document.getElementById('gestioneschedaVisoCorpo').action.value='nuovaschedaVisoCorpo'; document.getElementById('gestioneschedaVisoCorpo').submit();" class="btn btn-green" >+</a>
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
                                                       <th align="left">Data</th>
                                                         
                                                        <th align="left">
                                                            Zona Trattata
                                                        </th>
                                                        <th align="left">
                                                            Durata
                                                        </th>
                                                       <th align="left">Misurazioni</th>
                                                       <th align="left">Peso Corporeo</th>
                                                       <th align="left">Annotazioni</th>
                                                      
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
                                                        ?>
                                                        <tr>
                                                            <td style="border-bottom: 1px dotted #057fd0;"><?php
                                                                echo dateFromDb($trattamento->data);
                                                                ?></td>
                                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                             <?php
                                                                if(!isBlankOrNull($trattamento->zonaTrattata)){
                                                                    echo $trattamento->zonaTrattata;
                                                                } 
                                                                ?>
                                                               
                                                            </td>
                                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                                <?php
                                                                if(!isBlankOrNull($trattamento->durata)){
                                                                    
                                                                    echo $trattamento->durata;
                                                                }
                                                               
                                                                ?>
                                                          </td>
                                                            <td style="border-bottom: 1px dotted #057fd0;"><?php
                                                                if(!isBlankOrNull($trattamento->misurazioni)){
                                                                    
                                                                    echo $trattamento->misurazioni;
                                                                }
                                                                ?>
                                                                </td>
                                                                  <td style="border-bottom: 1px dotted #057fd0;"><?php
                                                                if(!isBlankOrNull($trattamento->pesoCorporeo)){
                                                                    
                                                                    echo $trattamento->pesoCorporeo;
                                                                }
                                                                ?>
                                                                </td>
                                                               <td style="border-bottom: 1px dotted #057fd0;"><?php
                                                                if(!isBlankOrNull($trattamento->annotazioni)){
                                                                    
                                                                    echo $trattamento->annotazioni;
                                                                }
                                                                ?>
                                                                </td>
                                                           
                                                          
                                                          
                                                         
                                                            <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">

                                                                <a href="#" onclick="document.getElementById('gestioneschedaVisoCorpo').idScheda.value='<?php echo $trattamento->id; ?>'; document.getElementById('gestioneschedaVisoCorpo').action.value='visualizzaschedaVisoCorpo'; document.getElementById('gestioneschedaVisoCorpo').submit();"><img src="img/icone/view.png" alt="Visualizza" title="Visualizza" style="width: 25px; padding: 2px"/></a>
                                                                <a href="#" onclick="document.getElementById('gestioneschedaVisoCorpo').idScheda.value='<?php echo $trattamento->id; ?>'; document.getElementById('gestioneschedaVisoCorpo').action.value='modificaschedaVisoCorpo'; document.getElementById('gestioneschedaVisoCorpo').submit();">
                                                                    <img src="img/icone/edit.png" alt="Modifica" title="Elimina" style="width: 25px; padding: 2px"/>
                                                                </a>
                                                                <a href="#" onclick="document.getElementById('gestioneschedaVisoCorpo').idScheda.value='<?php echo $trattamento->id; ?>'; document.getElementById('gestioneschedaVisoCorpo').action.value='eliminaschedaVisoCorpo'; document.getElementById('gestioneschedaVisoCorpo').submit();">
                                                                    <img src="img/icone/delete.png" alt="Elimina" title="Elimina" style="width: 25px; padding: 2px"/>
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
           
       <form action="index.php" id="gestionePianoTrattamenti" name="gestionePianoTrattamenti" method="post">
                <input type="hidden" id="action" name="action">
                <input type="hidden" id="idCliente" name="idCliente">
                <input type="hidden" id="idPiano" name="idPiano">
                <input type="hidden" id="id" name="id">
            </form>