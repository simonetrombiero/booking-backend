<?php

$arrayDomande = array("Altezza", "Peso", "% Grasso Corpo", "% Tot. Ritenz. Idrica", "Massa Muscolare", "Punt. Fisico 1-9", "Massa Ossea", "BMR", "Età Metabolica", "Livello Grasso Viscerale", "M. Muscolare Tot.", "M. Muscolare Braccio DX", "M. Muscolare Braccio SX", "M. Muscolare Tronco", "M. Muscolare Gamba DX", "M. Muscolare Gamba SX", "% Grasso Totale", "% Grasso Braccio DX", "% Grasso Braccio SX", "% Grasso Tronco", "% Grasso Gamba DX", "% Grasso Gamba SX", "Peso Bilancia Mecc.", "BMI", "FAT", "Punto Vita CM.", "Addome CM.", "Fianchi CM.", "Inguinde DX", "Cosa Inferiore DX", "Caviglia DX", "Inguinde SX", "Cosa Inferiore SX", "Caviglia SX", "Polso DX", "Braccio DX", "Polso SX", "Braccio SX", "Collo Circonferenza");


?>

  
        
<div style="width: 100%; height: 60px; background-color: #F6F6F6;">
    <h2 style="float: left; padding: 0px 15px; color: #366c88;">
        Scheda Misurazione
    </h2>

</div>
            

<div style="clear:left;">&nbsp;</div>
<div class="grid grid-pad">
    <div class="col-1-1">
        <!--INIZIO--->


        <!--<table border="0" cellspacing="0" cellpadding="0" style="width: 100%">-->
        <table border="0" style="width: 100%">
          
           
<?php for ($i = 0; $i < count($arrayDomande); $i++) { ?>
                                <tr>
                                    <td><?php echo $arrayDomande[$i]; ?></td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <input type="hidden" name="label<?php echo $i; ?>" value="<?php echo $arrayDomande[$i]; ?>">
                                        <input type="text" name="domanda<?php echo $i; ?>">
                                    </td>
                                </tr>
<?php } ?>



                                <input type="hidden" name="numDomande" value="<?php echo count($arrayDomande);?>">
                        </table>




    </div>
</div>
<div style="clear:left;">&nbsp;</div>

