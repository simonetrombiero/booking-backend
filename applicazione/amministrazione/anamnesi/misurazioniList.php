<?php
global $listaMisurazione, $cliente, $questionario;

//print_r($listaMisurazione);

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
        "order": [[ 0, "asc" ]], //[0, "desc"]
	"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
	"language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
    });
        
    });
</script>

                
                
                

                <form action="index.php" id="gestioneQuestionario" name="gestioneQuestionario" method="post">
                    <input type="hidden" id="action" name="action">
                    <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $cliente->id; ?>">
                    <input type="hidden" name="idQuestionario" value="<?php if (isset($questionario)) { echo $questionario->id; } ?>"/>
                    <input type="hidden" id="id" name="id">
                </form>      



<!--<div class="grid grid-pad">-->
    <!--<div class="col-1-1">-->
        <div>
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                                            <h2 style="float: left; padding: 0px 15px; color: #366c88;"> <?php echo $cliente->nome." ".$cliente->cognome; ?> - MISURAZIONI QUESTIONARIO DEL <?php echo $questionario->dataCompilazione; ?>
                                            </h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
                                                <a href="#" class="btn btn-green" onclick="document.getElementById('gestioneQuestionario').action.value='nuovaMisurazioneCorpo'; document.getElementById('gestioneQuestionario').submit();">Nuova Misurazione</a>
                                                <!--<a href="index.php?action=nuovoQuestionario" class="btn btn-green" >Nuovo Questionario</a>-->
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
                                                        <th align="left">Data Misurazione</th>
                                                        <th align="left">Note</th>
                                                        <th>Azioni</th>
                                                    </tr>
                                                </thead>
                                                <tfoot></tfoot>
                                                <tbody>
                                                    <?php
                                                    for ($i = 0; $i < count($listaMisurazione); $i++) {
                                                        $anamnesi = $listaMisurazione[$i];
                                                        ?>
                                                        <tr>
                                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                                <?php
                                                                
                                                                   echo dateFromDb($anamnesi->data); 
                                                               

                                                                ?>
                                                            </td>
                                                            <td style="border-bottom: 1px dotted #057fd0;">
                                                             <?php
                                                                if(!isBlankOrNull($anamnesi->note)){
                                                                    
                                                                    echo $anamnesi->note;
                                                                }
                                                                
                                                                ?>
                                                               
                                                            </td>
                                                            <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">

                                                                <a href="#" onclick="document.getElementById('gestioneQuestionario').id.value='<?php echo $anamnesi->id; ?>'; document.getElementById('gestioneQuestionario').action.value='visualizzaMisurazione'; document.getElementById('gestioneQuestionario').submit();">
                                                                    <img src="img/icone/view.png" alt="Visualizza Misurazione" title="Visualizza Misurazione" style="width: 25px; padding: 2px"/></a>
                                                                      <a href="#" onclick="document.getElementById('gestioneQuestionario').id.value='<?php echo $anamnesi->id; ?>'; document.getElementById('gestioneQuestionario').action.value='modificaMisurazione'; document.getElementById('gestioneQuestionario').submit();">
                                                                    <img src="img/icone/edit.png" alt="Modifica Misurazione" title="Modifica Misurazione" style="width: 25px; padding: 2px"/></a>
<!--                                                                    <a href="#" onclick="document.getElementById('gestioneQuestionario').id.value='<?php //echo $anamnesi->id; ?>'; document.getElementById('gestioneQuestionario').action.value='stampaAnamnesi'; document.getElementById('gestioneQuestionario').submit();">
                                                                    <img src="img/icone/print-icon.png" alt="Stampa Questionario" title="Stampa Questionario" style="width: 25px; padding: 2px"/></a>-->
<!--                                                                <a href="#" onclick="document.getElementById('gestioneQuestionario').id.value='<?php //echo $anamnesi->id; ?>'; document.getElementById('gestioneQuestionario').action.value='modificaCalendario'; document.getElementById('gestioneQuestionario').submit();">
                                                                    <img src="applicazione/img/icone/edit.png" alt="Modifica" title="Modifica" style="width: 25px; padding: 2px"/></a>-->
                                                                
                                                                <a href="index.php?action=eliminaMisurazione&amp;id=<?php echo $anamnesi->id; ?>" onclick="return confirm('Vuoi eliminare le misurazioni del <?php echo dateFromDb($anamnesi->data);                            ?>?');">
                                                                    <img src="applicazione/img/icone/delete.png" alt="Elimina Misurazione" title="Elimina Misurazione" style="width: 25px; padding: 2px"/></a>
                                                    
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
           
       