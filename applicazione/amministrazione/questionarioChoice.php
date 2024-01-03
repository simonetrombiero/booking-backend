<?php
global $cliente;
//print_r($cliente);
?>
<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
        <div style="clear:left;">&nbsp;</div>
        <div class="grid grid-pad">
            <div class="col-1-1">
                
            <!--INIZIO--->
            
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">
<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js"></script>-->

<link rel="stylesheet" type="text/css" href="vendors/dataTables/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="vendors/dataTables/jquery.dataTables.min.js"></script>

<form action="index.php" id="gestioneQuestionario" name="gestioneQuestionario" method="post">
    <input type="hidden" id="action" name="action">
    <input type="hidden" id="idQuestionario" name="idQuestionario"> 
    <input type="hidden" id="id" name="idCliente" value="<?php echo $cliente->id; ?>">

</form>    
<div>
    <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
        <h2 style="float: left; padding: 0px 15px; color: #366c88;">
            CLIENTE: <?php echo $cliente->nome . " " . $cliente->cognome; ?>
        </h2>
        <div style=" text-align: right; padding: 10px 15px;">
            <a href="index.php?action=clientiList" class="btn btn-green">Lista Clienti</a>

        </div>
    </div>
</div>

<div class="grid grid-pad" style="background-color: #FFF; padding-left: 5px;">
    <div style="clear:left;">&nbsp;</div>

    <p style="border-bottom: 1px dotted #333;">&nbsp;</p>
    <div style="clear:left;">&nbsp;</div>

    <div class="grid grid-pad">

        <div class="col-1-3">
            <div class="content">
                <a href="#" onclick="document.getElementById('gestioneQuestionario').action.value = 'nuovoQuestionarioCorpo'; document.getElementById('gestioneQuestionario').idQuestionario.value = '1'; document.getElementById('gestioneQuestionario').submit();">
                    <div class="box textCenter">


                        <p><img src="img/anamnestico_corpo.png"></p>
                        <span class="titleTasti">CHECK UP - CORPO</span>


                    </div>
                </a>

            </div>
        </div>
        <div class="col-1-3">
            <div class="content">
                <a href="#">
                    <div class="box textCenter">
                        <p><img src="img/anamnestico_viso.png"></p>
                        <span class="titleTasti">CHECK UP - VISO</span>
                    </div>
                </a> 
            </div>
        </div>


        <div class="col-1-3">
            <a href="#">

                <div class="box textCenter">
                    <p><img src="img/misurazioni.png"></p>
                    <span class="titleTasti">MISURAZIONI</span>
                </div>
            </a>
        </div>
    </div>
  
            <!--FINE--->
   
</div>
</div>
        <div style="clear:left;">&nbsp;</div>
           