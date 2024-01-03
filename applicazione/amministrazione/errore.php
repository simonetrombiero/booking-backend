<?php

$codiceErrore = getRequest("cod");

switch ($codiceErrore){
    case "001":
        $messaggio = "Non sono stati complilati alcuni campi obbligatori!";
        break;
    
    case "002":
        $messaggio = "Cliente già presente nel database";
        break;
    
     case "003":
        $messaggio = "Attenzione esiste una prenotazione precedente";
        break;
            
    
    default :
        $messaggio = "Errore imprevisto";
}


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
                
                
                
              
<!--<div class="grid grid-pad">-->
    <!--<div class="col-1-1">-->
        <div>
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                                            <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                                                SI E' VERIFICATO UN ERRORE</h2>
                                            <div style=" text-align: right; padding: 10px 15px;">
                                                <a href="index.php?action=applicazione" class="btn btn-green" >Inizio</a>
                                            </div>
                                        </div></div>
    <!--</div>-->
<!--</div>-->

<!--<div class="grid grid-pad">-->
    <!--<div class="col-1-1">-->
        <div style="padding: 10px;">
            
            <p><?php echo $messaggio; ?></p>
            
                                          
    
    
    
                
</div>
        </div>
        <div style="clear:left;">&nbsp;</div>
           
       