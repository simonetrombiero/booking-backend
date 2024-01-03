<?php
global $listaPrimaNota;
$arrayModalita = array(1=>"Contante/Cassa", 2=>"Banca");

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
<script type="text/javascript" src="applicazione/js/php.js"></script>
<script type="text/javascript">
//    $(function() {
//        $('#datatable').dataTable({
//        "order": [[ 0, "asc" ]], //[0, "desc"]
//	"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tutti"]],
//	"language": {"url": "vendors/dataTables/languages/dataTables_IT.txt"}
//    });
//        
//    });

 $(function() {
        $('#datatable').dataTable({
             "order": [[ 0, "desc" ]], //[0, "desc"]
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(), data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    
//                    return parseFloat(strip_tags(i, "<div></div>"));
                     return typeof i === 'string' ? parseFloat(strip_tags(i)) : typeof i === 'number' ? i : 0;
                    
//                    return parseFloat(i);
                };

                // Total over all pages
                total = api
                        .column(2, {page: 'current'})
                        .data()
                        .reduce(function(a, b) {
                          //return number_format(intVal(a) + intVal(b), 2, ",", ".");
                    return intVal(a) + intVal(b);
                        });

                // Total over this page
                pageTotalCol4 = api
                        .column(3, {page: 'current'})
                        .data()
                        .reduce(function(a, b) {
                            //return number_format(intVal(a) + intVal(b), 2, ",", ".");
                    return intVal(a) + intVal(b);
                        }, 0);

//                pageTotalCol5 = api
//                        .column(5, {page: 'current'})
//                        .data()
//                        .reduce(function(a, b) {
//                            return number_format(intVal(a) + intVal(b), 2, ",", "");
//                        }, 0);


                // Update footer
               // $(api.column(1).footer()).html('<div style="text-align: right; margin-right: 10px">Tot. Gen.</div>');
                $(api.column(2).footer()).html('<div style="text-align: center; margin-right: 10px">' + number_format(total, 2, ",", " ") + ' € </div>');
                $(api.column(3).footer()).html('<div style="text-align: center; margin-right: 10px">' + number_format(pageTotalCol4, 2, ",", " ") + ' € </div>');
                $(api.column(4).footer()).html('<div style="text-align: left; margin-right: 10px">Saldo: ' +number_format(total-pageTotalCol4, 2, ",", " ")  + ' € </div>');
            }
        });
    });
</script>

                
                
                

                <form action="index.php" id="gestionePrimaNota" name="gestionePrimaNota" method="post">
                    <input type="hidden" id="action" name="action">
                    <input type="hidden" id="id" name="id">
                </form>      



<!--<div class="grid grid-pad">-->
    <!--<div class="col-1-1">-->
        <div>
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                                            <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                                                PRIMA NOTA</h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
                                                <a href="index.php?action=nuovaPrimaNota" class="btn btn-green" >Nuova Registrazione</a>
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
                                                        <th align="left">
                                                           Data</th>
                                                        
                                                        <th align="left">
                                                           Causale</th>
                                                        <th>
                                                           Entrate</th>
                                                        <th>
                                                           Uscite</th>
                                                        
                                                        <th align="left">Modalità Pagamento</th>
                                                        <th>
                                                            Azioni
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="2"></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th colspan="2"></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php
                                                    
                                                    for ($i = 0; $i < count($listaPrimaNota); $i++) {
                                                        $primaNota = $listaPrimaNota[$i];
                                                        ?>
                                                    <tr>
                                                            <td style="border-bottom: 1px dotted #057fd0;"><?php
                                                                if(!isBlankOrNull($primaNota->data)){
                                                                    echo "<span style='display:none;'>$primaNota->data</span>". dateFromDb($primaNota->data);
                                                                } 

                                                                ?></td>
                                                             <td style="border-bottom: 1px dotted #057fd0;"> <?php
                                                                if(!isBlankOrNull($primaNota->descrizione)){
                                                                    echo $primaNota->descrizione;
                                                                } 

                                                                ?></td>
                                                            <td style="border-bottom: 1px dotted #057fd0; text-align: center;">
                                                                <?php
                                                                if(strtoupper($primaNota->movimento)=="E"){
                                                                    //echo formattaImportoEuropeo($primaNota->importo);
                                                                    echo $primaNota->importo;
                                                                    
                                                                } else {
                                                                echo "0.00"; 
                                                                }

                                                                ?>
                                                            </td>
                                                            <td style="border-bottom: 1px dotted #057fd0; text-align: center;">  <?php
                                                            
                                                                if(strtoupper($primaNota->movimento)=='U'){
                                                                    //echo formattaImportoEuropeo($primaNota->importo);
                                                                     echo $primaNota->importo;
                                                                }else {
                                                                echo "0.00"; 
                                                                }
                                                               

                                                                ?></td>
                                                           
                                                           
                                                            <td style="border-bottom: 1px dotted #057fd0;"> <?php
                                                                if(!isBlankOrNull($primaNota->modalitaPagamento)){
                                                                    echo $arrayModalita[$primaNota->modalitaPagamento];
                                                                } 

                                                                ?></td>
                                                            <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">

                                                                <!--<a href="#" onclick="document.getElementById('gestionePrimaNota').id.value='<?php //echo $primaNota->id; ?>'; document.getElementById('gestionePrimaNota').action.value='visualizzaPrimaNota'; document.getElementById('gestionePrimaNota').submit();">
                                                                    <img src="img/icone/view.png" alt="Visualizza" title="Visualizza" style="width: 25px; padding: 2px"/></a>-->
                                                                <a href="#" onclick="document.getElementById('gestionePrimaNota').id.value='<?php echo $primaNota->id; ?>'; document.getElementById('gestionePrimaNota').action.value='modificaPrimaNota'; document.getElementById('gestionePrimaNota').submit();">
                                                                    <img src="applicazione/img/icone/edit.png" alt="Modifica" title="Modifica" style="width: 25px; padding: 2px"/></a>
                                                                <a href="#" onclick="document.getElementById('gestionePrimaNota').id.value='<?php echo $primaNota->id; ?>'; document.getElementById('gestionePrimaNota').action.value='eliminaPrimaNota'; document.getElementById('gestionePrimaNota').submit();">
                                                               
                                                                    <img src="applicazione/img/icone/delete.png" alt="Elimina" title="Elimina" style="width: 25px; padding: 2px"/></a>
                                                    
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
           
       