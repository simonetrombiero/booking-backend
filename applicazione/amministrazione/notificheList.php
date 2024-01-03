<?php
$compleanniClienti = array(); exit;
?>
<div style="clear:left;">&nbsp;</div>    
<div class="grid grid-pad">
    <div class="col-1-1">
        <div class="content">
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                    LISTA NOTIFICHE</h2>
            </div>
        </div>
    </div>
</div>


<div style="clear:left;">&nbsp;</div>    
<div class="grid grid-pad">
    <div class="col-1-1">
        <div class="content">
            <div style="width: 100%; height: 60px; background-color: #f6f6f6;">
                <h2 style="float: left; padding: 0px 15px; color: #366c88;">
                    PROSSIMI COMPLEANNI</h2>
            </div>
            <table style="width: 100%" id="datatableCompleanni">
                <thead>
                    <tr>
                        <th align="left">
                            Giorno</th>
                        <th align="left">
                            Paziente</th>

                        <th>  Azioni
                        </th>
                    </tr>
                </thead>
                <tfoot></tfoot>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($compleanniClienti); $i++) {
                        $compleanno = $compleanniClienti[$i];
                        ?>
                        <tr>
                            <td style="border-bottom: 1px dotted #057fd0;"><?php
                                $gg = explode("-", $compleanno->dataNascita);
                                echo $gg[2];
                                ?></td>
                            <td style="border-bottom: 1px dotted #057fd0;">
                                <?php
                                echo $compleanno->nome . " " . $compleanno->cognome;
                                ?>
                            </td>

                            <td style="vertical-align: middle; text-align: center; border-bottom: 1px dotted #057fd0;">
                                <a href="https://wa.me/39<?php echo $compleanno->cellulare; ?>" target="_blank">Contatta</a>

                                                                    <!--<a href="#" onclick="document.getElementById('gestionePrenotazione').id.value='<?php //echo $postazione->id;  ?>'; document.getElementById('gestionePrenotazione').action.value='visualizzaPostazione'; document.getElementById('gestionePrenotazione').submit();">
                                                                        <img src="img/icone/view.png" alt="Visualizza" title="Visualizza" style="width: 25px; padding: 2px"/></a>-->

    <!--                                                                <a href="#" onclick="document.getElementById('gestionePrenotazione').id.value='<?php echo $postazione->id; ?>'; document.getElementById('gestionePrenotazione').action.value='modificaPostazione'; document.getElementById('gestionePrenotazione').submit();">
         <img src="applicazione/img/icone/edit.png" alt="Modifica" title="Modifica" style="width: 25px; padding: 2px"/></a>
     <a href="#" onclick="document.getElementById('gestionePrenotazione').id.value='<?php echo $postazione->id; ?>'; document.getElementById('gestionePrenotazione').action.value='eliminaPostazione'; document.getElementById('gestionePrenotazione').submit();">

         <img src="applicazione/img/icone/delete.png" alt="Elimina" title="Elimina" style="width: 25px; padding: 2px"/></a>-->



                            </td>
                        </tr>
    <?php
}
?>
                </tbody>
            </table>

        </div>
    </div></div></div>
